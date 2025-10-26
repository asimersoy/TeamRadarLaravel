// apex-liveapi-tap / index.mjs
import { WebSocketServer } from "ws";
import { createWriteStream, existsSync, mkdirSync } from "node:fs";
import path from "node:path";
import { fileURLToPath } from "node:url";
import { randomUUID } from "node:crypto";
import protobuf from "protobufjs";

const __dirname = path.dirname(fileURLToPath(import.meta.url));

// Config via env (optional)
const PORT = Number(process.env.PORT || 7777);
const LOG_BASE = process.env.LOG_BASE || `${__dirname}/logs`;
const AUTOPONG = (process.env.AUTOPONG ?? "true").toLowerCase() === "true";
const PSK = process.env.LIVEAPI_PSK || ""; // if you want to send requests to game

// Simple rolling log files per run
const ts = new Date().toISOString().replace(/[:.]/g, "-");
mkdirSync(LOG_BASE, { recursive: true }); // make sure the log directory exists before writing files
const textLog = createWriteStream(`${LOG_BASE}/apex-tap-${ts}.log`, { flags: "a" });
const binLog  = createWriteStream(`${LOG_BASE}/apex-tap-${ts}.bin`, { flags: "a" });

function log(line) {
  const row = `[${new Date().toISOString()}] ${line}\n`;
  process.stdout.write(row);
  try { textLog.write(row); } catch {}
}

function hex(buf) {
  return [...new Uint8Array(buf)].map(b => b.toString(16).padStart(2, "0")).join(" ");
}

const PROTO_TO_OBJECT_OPTS = {
  longs: String,
  enums: String,
  bytes: "base64",
  defaults: true,
  oneofs: true
}; // options that force protobuf.js to output JSON-friendly primitives (strings/base64)
const TYPE_URL_PREFIX = "type.googleapis.com/";
const LIVE_EVENT_TYPE = "rtech.liveapi.LiveAPIEvent";
const REQUEST_TYPE = "rtech.liveapi.Request";

const PROTO_SEARCH_PATHS = (() => {
  const candidates = new Set();
  const envPath = process.env.LIVEAPI_PROTO_PATH;
  if (envPath) {
    candidates.add(path.isAbsolute(envPath) ? envPath : path.resolve(__dirname, envPath));
  }
  candidates.add(path.resolve(__dirname, "../docs/LiveAPI/events.proto"));
  candidates.add(path.resolve(__dirname, "../../TeamRadarLaravel/docs/LiveAPI/events.proto"));
  candidates.add(path.resolve(__dirname, "../../teamradar-relay/docs/LiveAPI/events.proto"));
  return [...candidates];
})(); // resolves possible locations of events.proto, preferring env override first

let protoRootPromise;

async function ensureProtoRoot() { // lazily loads and caches the protobuf schema root
  if (!protoRootPromise) {
    protoRootPromise = (async () => {
      for (const candidate of PROTO_SEARCH_PATHS) {
        if (!existsSync(candidate)) continue;
        try {
          const root = await protobuf.load(candidate);
          log(`[proto] Loaded protobuf schema from ${candidate}`);
          return root;
        } catch (err) {
          log(`! Failed to load proto at ${candidate}: ${err?.message || err}`);
        }
      }
      log("! Unable to locate events.proto. Set LIVEAPI_PROTO_PATH to point at the schema.");
      return null;
    })();
  }
  return protoRootPromise;
}

function unwrapTypeUrl(typeUrl) { // strips the Any type_url prefix to get the actual type name
  if (!typeUrl) return "";
  return typeUrl.startsWith(TYPE_URL_PREFIX) ? typeUrl.slice(TYPE_URL_PREFIX.length) : typeUrl;
}

async function decodeLiveApiBuffer(buffer) { // decodes a LiveAPIEvent envelope and unpacks the embedded Any payload
  const root = await ensureProtoRoot();
  if (!root) return null;

  try {
    const eventType = root.lookupType(LIVE_EVENT_TYPE);
    const msg = eventType.decode(buffer instanceof Uint8Array ? buffer : new Uint8Array(buffer));
    const eventObject = eventType.toObject(msg, PROTO_TO_OBJECT_OPTS);

    let unpacked = null;
    if (msg.gameMessage?.type_url && msg.gameMessage?.value?.length) {
      const typeName = unwrapTypeUrl(msg.gameMessage.type_url);
      try {
        const innerType = root.lookup(typeName);
        if (innerType instanceof protobuf.Type) {
          const innerMsg = innerType.decode(msg.gameMessage.value);
          unpacked = {
            type: typeName,
            payload: innerType.toObject(innerMsg, PROTO_TO_OBJECT_OPTS)
          };
        } else {
          unpacked = { type: typeName, payload: "<non-message proto type>" };
        }
      } catch (err) {
        unpacked = { type: typeName, error: err?.message || String(err) };
      }
    }

    return { msg, eventObject, unpacked };
  } catch (err) {
    log(`! Protobuf decode error: ${err?.message || err}`);
    return { error: err };
  }
}

async function encodeRequestPayload(payload) { // validates and encodes an rtech.liveapi.Request into binary
  const root = await ensureProtoRoot();
  if (!root) return null;

  try {
    const requestType = root.lookupType(REQUEST_TYPE);
    const errMsg = requestType.verify(payload);
    if (errMsg) throw new Error(errMsg);
    const requestMsg = requestType.create(payload);
    return Buffer.from(requestType.encode(requestMsg).finish());
  } catch (err) {
    log(`! Protobuf encode error: ${err?.message || err}`);
    return null;
  }
}

function safeSend(ws, objOrBuffer) {
  try {
    if (ws.readyState === ws.OPEN) {
      if (Buffer.isBuffer(objOrBuffer) || objOrBuffer instanceof Uint8Array) {
        ws.send(objOrBuffer);
      } else {
        ws.send(JSON.stringify(objOrBuffer));
      }
    }
  } catch (e) {
    log(`! send error: ${e?.message || e}`);
  }
}

// --- PSK -> Set<WebSocket> tracking helpers ---
const pskToConns = new Map(); // Map<string, Set<WebSocket>>

function addConnForPsk(psk, ws) {
  if (!psk || !ws) return;
  // if ws already associated with same psk, nothing to do
  if (ws._psk === psk) return;

  // remove from previous psk mapping (if any)
  if (ws._psk) {
    const prev = pskToConns.get(ws._psk);
    if (prev) {
      prev.delete(ws);
      if (prev.size === 0) pskToConns.delete(ws._psk);
    }
  }

  ws._psk = psk;
  let set = pskToConns.get(psk);
  if (!set) {
    set = new Set();
    pskToConns.set(psk, set);
  }
  set.add(ws);
}

function removeConn(ws) {
  if (!ws) return;
  const psk = ws._psk;
  if (!psk) {
    delete ws._psk;
    return;
  }
  const set = pskToConns.get(psk);
  if (!set) {
    delete ws._psk;
    return;
  }
  set.delete(ws);
  if (set.size === 0) pskToConns.delete(psk);
  delete ws._psk;
}

function getConnsForPsk(psk) {
  const set = pskToConns.get(psk);
  return set ? [...set] : [];
}

ensureProtoRoot().catch(() => {}); // kick off schema loading so startup issues surface early

const wss = new WebSocketServer({ host: "127.0.0.1", port: PORT, skipUTF8Validation: true }, () => {
  log(`[tap] Listening for Apex LiveAPI on ws://127.0.0.1:${PORT}`);
  log(`    AUTOPONG=${AUTOPONG}  PSK=${PSK ? "(set)" : "(not set)"}`);
});

wss.on("connection", (ws, req) => {
  ws._id = randomUUID();
  log(`+ connection ${ws._id} from ${req.socket.remoteAddress}`);


  ws._socket.on("data", chunk => log(`[${ws._id}] raw frame header: ${chunk[0].toString(16)}`));

  //log(`[${ws._id}] frame opcode = ${isBinary ? "binary" : "text"}`);

  /*if(ws._psk) { // there is no psk provided until we parse a message that includes it
    addConnForPsk(ws._psk, ws); // so make this check inside message handler
  }
  else {
    //this means there is no psk associated with this connection, so drop it.
    ws.close(1008, "No PSK provided");
    log(`! connection ${ws._id} closed: no PSK provided`);
    return;
  }*/

    //isBinary = true; // FOR TESTING ONLY: force binary path
    
// Send a hello (optional)
  safeSend(ws, { hello: "apex-tap", connId: ws._id, ts: Date.now() });

  let x = 0;

  ws.on("message", async (data, isBinary) => {

    const request = {
      preSharedKey: PSK,
      withAck: true,
      customMatch_CreateLobby: {}
      //customMatch_SendChat: { text: "Hello from tap" }  // pick any one action from the Request.oneof
    };

    if(x == 0){
      log(request);//
      
      const encoded = await encodeRequestPayload(request);

      log(encoded);//

      if (encoded) safeSend(ws, encoded);
      x++;
    }




    
  log(`[${ws._id}] frame opcode = ${isBinary ? "binary" : "text"}`);
   

    if (isBinary) {
      log(`[${ws._id}] PROTO ${buffer.byteLength} bytes`);
      try { binLog.write(buffer); } catch {}

      const decoded = await decodeLiveApiBuffer(buffer); // interpret the incoming binary as LiveAPI protobuf
      if (!decoded) {
        log("   proto decode skipped (schema not loaded).");
        log(`   hex: ${hex(buffer)}`);
        return;
      }

      if (decoded.error) {
        log(`   proto decode error: ${decoded.error?.message || decoded.error}`);
        log(`   hex: ${hex(buffer)}`);
        return;
      }

      log(`   LiveAPIEvent:\n${JSON.stringify(decoded.eventObject, null, 2)}`);

      if (decoded.unpacked) {
        if (decoded.unpacked.error) {
          log(`   gameMessage ${decoded.unpacked.type} decode error: ${decoded.unpacked.error}`);
        } else {
          log(`   gameMessage ${decoded.unpacked.type}:\n${JSON.stringify(decoded.unpacked.payload, null, 2)}`);
        }
      }
      return;
    }

    let asText;
    try {
      asText = typeof data === "string" ? data : data.toString();
    } catch {
      asText = "<non-text>";
    }

    try {
      const obj = JSON.parse(asText);
      log(`[${ws._id}] JSON:\n${JSON.stringify(obj, null, 2)}`);

      if (AUTOPONG && (obj.type === "ping" || obj?.event === "ping")) {
        safeSend(ws, { type: "pong", ts: Date.now() });
        log(`[${ws._id}] sent pong`);
      }
    } catch {
      log(`[${ws._id}] TEXT:\n${asText}`);
    }
  });

  ws.on("close", (code, reason) => {
    removeConn(ws);
    log(`- connection ${ws._id} closed code=${code} reason=${reason}`);
  });

  ws.on("error", (err) => {
    removeConn(ws);
    log(`! socket error ${ws._id}: ${err?.message || err}`);
  });

  // OPTIONAL: small demo request back to the game, if PSK set and the game expects a PSK.
  // Populate the action that matches what you want to trigger (see docs/LiveAPI/events.proto).
  if (PSK) {
    setTimeout(async () => { // wait a moment so the socket is ready before sending the demo request
      const demoPayload = {
        preSharedKey: PSK,
        withAck: false
        // customMatch_SendChat: { text: "Hello from tap" }, // example action
      };
      const encoded = await encodeRequestPayload(demoPayload); // builds the binary payload the game expects
      if (encoded) {
        safeSend(ws, encoded); // push the encoded request back to the connected client
        log(`[${ws._id}] sent demo Request envelope with PSK`);
      } else {
        log(`[${ws._id}] failed to encode demo Request (check schema path)`);
      }
    }, 1500);
  }
});





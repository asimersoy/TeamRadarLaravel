// apex-liveapi-tap / index.mjs
import { WebSocketServer } from "ws";
import { createWriteStream } from "node:fs";
import { dirname } from "node:path";
import { fileURLToPath } from "node:url";
import { randomUUID } from "node:crypto";

const __dirname = dirname(fileURLToPath(import.meta.url));

// Config via env (optional)
const PORT = Number(process.env.PORT || 7777);
const LOG_BASE = process.env.LOG_BASE || `${__dirname}/logs`;
const AUTOPONG = (process.env.AUTOPONG ?? "true").toLowerCase() === "true";
const PSK = process.env.LIVEAPI_PSK || ""; // if you want to send requests to game

// Simple rolling log files per run
const ts = new Date().toISOString().replace(/[:.]/g, "-");
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

const wss = new WebSocketServer({ host: "127.0.0.1", port: PORT }, () => {
  log(`🛰  Listening for Apex LiveAPI on ws://127.0.0.1:${PORT}`);
  log(`    AUTOPONG=${AUTOPONG}  PSK=${PSK ? "(set)" : "(not set)"}`);
});

wss.on("connection", (ws, req) => {
  ws._id = randomUUID();
  log(`+ connection ${ws._id} from ${req.socket.remoteAddress}`);

  /*if(ws._psk) { // there is no psk provided until we parse a message that includes it
    addConnForPsk(ws._psk, ws); // so make this check inside message handler
  }
  else {
    //this means there is no psk associated with this connection, so drop it.
    ws.close(1008, "No PSK provided");
    log(`! connection ${ws._id} closed: no PSK provided`);
    return;
  }*/

  // Send a hello (optional)
  safeSend(ws, { hello: "apex-tap", connId: ws._id, ts: Date.now() });


/////////////////////////////////// these are for testing
  ws.ping();//

    const demoReq = {
      request: {
        preSharedKey: PSK,
        // Example/placeholder fields — replace with a valid action once you know it.
        // e.g., { type: "GetClientInfo" } or similar per the official schema.
        action: "HelloFromTap",
        ts: Date.now()
      }
    };

  setTimeout(() => {
    safeSend(ws, demoReq);
    log(`→ [${ws._id}] sent demo request with PSK`);
    }, 1500);

/////////////////////////////////// end testing    

  ws.on("message", async (data, isBinary) => {
    // Log both text and binary
    if (isBinary) {
      log(`← [${ws._id}] BINARY ${data.byteLength} bytes`);
      try { binLog.write(Buffer.from(data)); } catch {}
      // We can't decode Protobuf without a schema & decoder; just hex dump:
      log(`   hex: ${hex(data)}`);
      return;
    }

    let asText;
    try {
      asText = data.toString();
    } catch {
      asText = "<non-text>";
    }

    // Try JSON parse
    try {
      const obj = JSON.parse(asText);
      log(`← [${ws._id}] JSON:\n${JSON.stringify(obj, null, 2)}`);

      // If we see simple pings, optionally auto-pong
      // (Exact ping shape may vary; adjust as needed.)
      if (AUTOPONG && (obj.type === "ping" || obj?.event === "ping")) {
        safeSend(ws, { type: "pong", ts: Date.now() });
        log(`→ [${ws._id}] sent pong`);
      }
    } catch {
      // Not JSON, still log raw
      log(`← [${ws._id}] TEXT:\n${asText}`);
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
  // Without the exact schema, we just show a placeholder "Request" envelope shape.
  // You can edit "action" to something valid once you confirm via docs/events.proto.
  if (PSK) {
    const demoReq = {
      request: {
        preSharedKey: PSK,
        // Example/placeholder fields — replace with a valid action once you know it.
        // e.g., { type: "GetClientInfo" } or similar per the official schema.
        action: "HelloFromTap",
        ts: Date.now()
      }
    };
    setTimeout(() => {
      safeSend(ws, demoReq);
      log(`→ [${ws._id}] sent demo request with PSK`);
    }, 1500);
  }
});
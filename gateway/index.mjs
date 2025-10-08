// gateway/index.mjs
import { WebSocketServer } from "ws";
import Redis from "ioredis";
import { randomUUID } from "crypto";

const PORT = process.env.PORT || 8443;
const REDIS_URL = process.env.REDIS_URL || "redis://redis:6379";
const VERIFY_REQ = "liveapi:verify:req";
const VERIFY_RES = "liveapi:verify:res";

const pub = new Redis(REDIS_URL);
const sub = new Redis(REDIS_URL);

// In-memory maps
const pendingByPsk = new Map();      // psk -> { ws, ts, timer }
const socketsByUser = new Map();     // userId -> ws

const wss = new WebSocketServer({ port: PORT }, () => {
  console.log(`[GW] listening on ws://0.0.0.0:${PORT}`);
});

// Subscribe to verification responses from backend
await sub.subscribe(VERIFY_RES);
sub.on("message", (_channel, payload) => {
  try {
    const msg = JSON.parse(payload);
    // Expect: { psk, user_id } OR { psk, error }
    if (!msg?.psk) return;

    const entry = pendingByPsk.get(msg.psk);
    if (!entry) return; // no longer pending or expired

    const { ws, timer } = entry;
    clearTimeout(timer);
    pendingByPsk.delete(msg.psk);

    if (msg.error || !msg.user_id) {
      safeSend(ws, { ok: false, reason: msg.error || "verification_failed" });
      tryClose(ws, 4001, "verification_failed");
      return;
    }

    const userId = String(msg.user_id);
    // If the user was already connected, close old socket
    const old = socketsByUser.get(userId);
    if (old && old !== ws) tryClose(old, 4002, "duplicate_login");

    ws._userId = userId;
    socketsByUser.set(userId, ws);
    safeSend(ws, { ok: true, boundUser: userId });
    console.log(`[GW] bound psk=${msg.psk} -> userId=${userId}`);
  } catch (e) {
    console.warn("[GW] invalid VERIFY_RES payload", e, payload);
  }
});

wss.on("connection", (ws, req) => {
  ws._id = randomUUID();

  safeSend(ws, { hello: "ws-gateway", connId: ws._id, ts: Date.now() });

  ws.on("message", async (buf) => {
    let msg;
    try { msg = JSON.parse(buf.toString()); } catch { return; }

    // Expect first meaningful message to contain a PSK
    const psk = msg?.psk;
    if (!psk) {
      // Allow ping before auth for nicer UX
      if (msg?.type === "ping") return safeSend(ws, { type: "pong", ts: Date.now() });
      
      safeSend(ws, { ok: false, reason: "psk_required" });
      tryClose(ws, 4001, "verification_failed");
      return;
    }

    // If this PSK is already pending, replace the socket entry
    // (avoids race if client reconnects quickly)
    const existing = pendingByPsk.get(psk);
    if (existing) {
      clearTimeout(existing.timer);
      pendingByPsk.delete(psk);
      tryClose(existing.ws, 4003, "superseded");
    }

    // Track as pending with a timeout to avoid leaks (e.g., 30s)
    const timer = setTimeout(() => {
      const e = pendingByPsk.get(psk);
      if (!e) return;
      pendingByPsk.delete(psk);
      safeSend(e.ws, { ok: false, reason: "verify_timeout" });
      tryClose(e.ws, 4004, "verify_timeout");
      console.log(`[GW] verification timeout psk=${psk}`);
    }, 30_000);

    pendingByPsk.set(psk, { ws, ts: Date.now(), timer });

    // Ask backend to verify this PSK
    await pub.publish(VERIFY_REQ, JSON.stringify({ psk }));
    safeSend(ws, { verifying: true });
  });

  ws.on("close", () => {
    // Clean up from pending map
    for (const [psk, entry] of pendingByPsk.entries()) {
      if (entry.ws === ws) {
        clearTimeout(entry.timer);
        pendingByPsk.delete(psk);
      }
    }
    // Clean up from bound map
    if (ws._userId && socketsByUser.get(ws._userId) === ws) {
      socketsByUser.delete(ws._userId);
    }
  });
});

// Utilities
function safeSend(ws, obj) {
  try {
    if (ws.readyState === ws.OPEN) ws.send(JSON.stringify(obj));
  } catch {}
}
function tryClose(ws, code = 1000, reason = "") {
  try { ws.close(code, reason); } catch {}
}





/*
// gateway/index.mjs
import { WebSocketServer } from "ws";
import Redis from "ioredis";

// --- config flags
const PORT = process.env.PORT || 8443;
const AUTH_REQUIRED = false;//(process.env.AUTH_REQUIRED ?? "true").toLowerCase() === "true";
const REDIS_URL = process.env.REDIS_URL || ""; // optional in test

// optional Redis (only used if available)
let redisOk = false;
let pub, sub;
if (REDIS_URL) {
  try {
    pub = new Redis(REDIS_URL);
    sub = new Redis(REDIS_URL);
    await Promise.all([pub.ping(), sub.ping()]);
    redisOk = true;
    console.log("[GW] Redis connected");
    console.log("[GW] Redis URL:", REDIS_URL);
  } catch (e) {
    console.warn("[GW] Redis not available, continuing in no-Redis mode");
  }
}

const wss = new WebSocketServer({ port: PORT });
console.log(`[GW] listening on ws://0.0.0.0:${PORT} (AUTH_REQUIRED=${AUTH_REQUIRED}, redis=${redisOk?"on":"off"})`);

const socketsByUser = new Map();

function send(ws, obj) {
  try { ws.send(JSON.stringify(obj)); } catch {}
}

wss.on("connection", (ws, req) => {
  let userId = null;
  send(ws, { hello: "ws-gateway", ts: Date.now() });

  console.log("[GW] client connected", req.socket.remoteAddress, ws.protocol);

  ws.on("message", async (buf) => {
    let msg = null;
    try { msg = JSON.parse(buf.toString()); } catch { return; }

    // simple ping for smoke test
    if (msg?.type === "ping") return send(ws, { type: "pong", ts: Date.now() });

    // auth flow (PSK) – only if required
    if (AUTH_REQUIRED) {
      const psk = msg?.request?.preSharedKey;
      if (!psk || !redisOk) return send(ws, { ok: false, reason: "auth_required" });

      const key = `liveapi:psk:${psk}`;
      const data = await pub.get(key);
      if (!data) return send(ws, { ok: false, reason: "invalid_psk" });

      const { user_id } = JSON.parse(data);
      userId = user_id;
      socketsByUser.set(userId, ws);

      // subscribe to per-user commands
      if (redisOk) {
        await sub.subscribe(`liveapi:out:${userId}`);
        sub.on("message", (channel, payload) => {
          if (channel === `liveapi:out:${userId}` && ws.readyState === ws.OPEN) {
            ws.send(payload);
          }
        });
      }
      return send(ws, { ok: true, boundUser: userId });
    } else {
      // Open mode: accept anyone and assign a temp id
      if (!userId) {
        userId = `test-${Math.random().toString(36).slice(2,8)}`;
        socketsByUser.set(userId, ws);
        return send(ws, { ok: true, boundUser: userId, mode: "open" });
      }
      // echo back whatever we got (handy for testing)
      return send(ws, { echo: msg, userId });
    }
  });

  ws.on("close", () => {
    if (userId) socketsByUser.delete(userId);
  });
});
*/











/*import { WebSocketServer } from 'ws';
import Redis from 'ioredis';
import crypto from 'node:crypto';

const REDIS_URL = process.env.REDIS_URL || 'redis://redis:6379';
const PORT = Number(process.env.PORT || 8443);

const redis = new Redis(REDIS_URL);
const sub   = new Redis(REDIS_URL);

const sockets = new Map();
const userToSocket = new Map();

function send(ws, obj){ try{ ws.send(JSON.stringify(obj)); }catch{} }

async function bindSocketToUser(socketId, userId){
  userToSocket.set(String(userId), socketId);
  await redis.set(`liveapi:user:${userId}`, JSON.stringify({ socketId, connectedAt: Date.now() }), 'EX', 3600);
  await redis.set(`liveapi:socket:${socketId}`, JSON.stringify({ user_id: userId }), 'EX', 3600);
  await sub.subscribe(`liveapi:out:${userId}`);
  console.log('[GW] bound', socketId, '→ user', userId);
}

const wss = new WebSocketServer({ port: PORT }, () => {
  console.log(`[GW] listening on ws://0.0.0.0:${PORT}`);
});

wss.on('connection', (ws, req) => {
  const socketId = crypto.randomUUID();
  sockets.set(socketId, ws);
  let userId = null;

  console.log('[GW] client connected', socketId, req.socket.remoteAddress);

  ws.on('message', async (buf) => {
    let msg; try { msg = JSON.parse(buf.toString()); } catch { return; }

    const psk = msg?.request?.preSharedKey;
    if (psk && !userId){
      const entry = await redis.get(`liveapi:psk:${psk}`);
      if (!entry){ console.warn('[GW] bad PSK, closing', socketId); ws.close(1008,'bad-psk'); return; }
      userId = JSON.parse(entry).user_id;
      await bindSocketToUser(socketId, userId);
      return;
    }

    await redis.publish('liveapi:in', JSON.stringify({ socketId, userId, payload: msg }));
  });

  ws.on('close', async () => {
    sockets.delete(socketId);
    if (userId){ userToSocket.delete(String(userId)); await redis.del(`liveapi:user:${userId}`); }
    console.log('[GW] client disconnected', socketId);
  });
});

sub.on('message', (channel, message) => {
  const userId = channel.split(':')[2];
  const socketId = userToSocket.get(String(userId));
  const ws = socketId ? sockets.get(socketId) : null;
  if (ws && ws.readyState === ws.OPEN) send(ws, JSON.parse(message));
});
*/
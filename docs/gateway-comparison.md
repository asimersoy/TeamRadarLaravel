# Gateway Feature Parity Checklist

The legacy WebSocket gateway at `gateway/index.mjs` still provides several integration
features that the standalone tester lacks. Use this checklist when porting the newer
Apex tap implementation so that it regains production parity:

- **Redis-backed connection registry** – Persist socket↔user bindings to the
  `liveapi:user:*` and `liveapi:socket:*` keyspace so Laravel workers can discover
  active connections (`VERIFY_RES` handler shows the intended shape).
- **Server-assigned socket identifiers** – Mint a UUID per socket (`randomUUID()`)
  and expose it alongside the authenticated user for downstream routing.
- **Message relay to Laravel** – Publish all verified client payloads onto
  `liveapi:in` so Laravel continues to receive gameplay data after the PSK handshake.
- **Outbound message fan-out** – Subscribe to `liveapi:out:<userId>` and route
  payloads back to the correct socket via the in-memory user map.
- **Redis cleanup on disconnect** – Remove any pending PSK entries and bound user
  records from both memory and Redis when a socket closes to avoid stale bindings.

Refer to `gateway/index.mjs` for concrete examples of each behavior while refitting
the Apex tap gateway.

# TeamRadar / QueueGuard Overview

## Mission
TeamRadar (codenamed QueueGuard in the web app) streamlines forming verified Apex Legends teams by connecting in-game telemetry, a Laravel web experience, and optional realtime gateways. The platform is designed to start with a lightweight relay-based MVP and evolve toward direct, secure WebSocket connectivity for production-scale matchmaking.

## System Architecture
The project spans three cooperating layers:

1. **Laravel Backend**
   - Laravel 12 application providing authentication, dashboard pages, matchmaking APIs, and PSK issuance.
   - Livewire Volt/Flux components render authenticated UI flows and settings pages.
   - MySQL persists users and long-lived domain data; Redis backs ephemeral state like PSKs and websocket bindings.
   - HTTP "ping/pong" endpoints power the relay MVP, receiving LiveAPI events and returning queued commands.

2. **Realtime Gateway & Workers**
   - `gateway/index.mjs` is a Node.js websocket gateway (planned for post-MVP) that authenticates clients via PSK and relays messages through Redis channels.
   - The `liveapi:verify-worker` Artisan command consumes Redis messages to verify PSKs and bind sockets to Laravel users.
   - Docker Compose provisions both the gateway and a dedicated verification worker alongside PHP-FPM, Redis, and MySQL services.

3. **Relay Application (External Repo)**
   - Electron app running locally, bridging Apex Legends LiveAPI (WS on `127.0.0.1:7777`) with Laravel via periodic HTTP pings.
   - Stores user configuration (backend URL, LiveAPI endpoint, PSK) and displays connection telemetry.
   - Simplifies NAT/firewall traversal for the MVP while paving the way to direct gateway connections.

## Frontend Experience
- Guest users land on a marketing page served by `HomeController`.
- Authenticated users enter a Flux-powered dashboard shell with sidebar navigation, profile controls, and slots for Volt pages (dashboard, settings, future telemetry views).
- Tailwind CSS (configured in `tailwind.config.js` and `resources/css/app.css`) provides the QueueGuard theme.
- Vite bundles assets and supports hot module replacement during development.

## Development Workflow
- **Local tooling**: `composer install`, `npm install`, then `composer run dev` (or Docker Compose) to start PHP, queues, Vite, and log streaming concurrently.
- **Docker stack**: `docker-compose.yml` orchestrates Laravel, Nginx, Vite, MySQL, Redis, the websocket gateway, and the verify worker for end-to-end testing.
- **Testing**: Pest feature tests under `tests/Feature` confirm guest routing and dashboard access; extend with additional coverage as matchmaking features grow.

## Data & Messaging Flows
1. Players authenticate via the Laravel UI and obtain a PSK.
2. The relay polls Laravel, sending LiveAPI events and receiving commands (e.g., `CustomMatch_JoinLobby`).
3. PSK verification requests/answers travel through Redis between Laravel and the websocket gateway or worker.
4. Future direct connections allow Apex clients to speak to the hosted gateway, eliminating the relay.

## Roadmap Highlights
- **Current MVP**: Relay ↔ Laravel HTTP ping/pong, lobby verification logic, foundational UI, Redis for PSK verification.
- **Post-MVP**: Harden websocket gateway (TLS, auth), enable direct game connections, enrich telemetry & stats dashboards, explore toxicity monitoring.
- **Long-term**: Multi-game support, scalable WSS cluster, advanced trust/rating systems.

## Suggested Next Steps for Contributors
- Extend Volt dashboard components to display realtime lobby status once relay payloads are ingested.
- Replace placeholder PSK validation logic with database-backed verification in the worker and gateway.
- Expand automated tests for auth flows, matchmaking APIs, and Redis-driven workflows.
- Document relay setup and configuration in the primary README to reduce onboarding friction.

For deeper context, review:
- `routes/web.php` & `routes/auth.php` for page routing.
- `resources/views/livewire` and `resources/views/pages` for Volt components.
- `gateway/index.mjs` and `app/Console/Commands/LiveApiVerifyWorker.php` for realtime plumbing.
- `docker-compose.yml` for service orchestration.

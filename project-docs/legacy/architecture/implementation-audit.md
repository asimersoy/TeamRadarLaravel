# Legacy Implementation Audit

- **Record type:** evidence-only implementation assessment
- **Status:** internal review passed for the inspected baseline
- **Baseline:** `new-development` at `7043054`
- **Outcome vocabulary:** retained evidence, partial prototype, proposal only,
  revision-required if reused, or not implemented
- **Correction authority:** none; no legacy fix is authorized

## Repository Inventory

- 221 tracked files total;
- 72 files in the portable workflow system;
- 149 legacy project files outside the workflow package;
- 88 tracked PHP files;
- 12 tracked test files;
- reachable branches `master` and `new-development`; and
- one recovered unreachable four-commit Electron relay chain.

Generated dependencies and ignored environment files were excluded. No secret
or `.env` content was inspected.

## Implemented Or Configured Legacy Units

### Laravel Foundation - Retain As Evidence

- Laravel 12 starter project;
- registration/login/email/password/profile/settings flows;
- public landing route and view;
- authenticated dashboard shell;
- basic auth/dashboard/root-page tests; and
- Composer local development/test scripts.

The dashboard is starter placeholder content, not a TeamRadar feature set.

### Game Accounts - Partial Prototype

- `games` and `game_accounts` migrations/models;
- user-to-game-account relationship;
- game-account setup component/form;
- matchmaking middleware gate; and
- Valorant rank-name constant/list.

Findings:

- the route hard-codes the `valorant` slug;
- account/rank is self-declared;
- `verified_at` is filled immediately;
- duplicate record behavior depends on the database constraint rather than a
  complete product flow; and
- no ownership verification, edit/reconfirm, recovery, or related tests were
  found.

### Matchmaking Experience - Partial Static Prototype

- authenticated route and Blade view;
- rank/reputation cards;
- competitive/unrated radio controls;
- Find Match button; and
- placeholder recent matches, queue wait, and population.

No form/action, queue service/job, candidate logic, WebSocket client, private
room, or matchmaking tests were found.

### Apex Tap - Revision Required If Reused

- local WebSocket server on loopback port 7777;
- bundled proto loading;
- event-envelope decoding and request encoding helpers;
- connection IDs and local logging; and
- custom-match request experiment.

Findings:

- binary handler references undefined `buffer` rather than received `data`;
- authentication/PSK connection mapping is largely commented;
- a custom lobby request is sent as a test on the first received message;
- raw/binary logging lacks minimization and retention controls; and
- no automated tests were located.

### Node Gateway - Partial Prototype

- WSS server with connection IDs;
- pending PSK map and timeout;
- Redis verification request/response channels;
- duplicate-login handling; and
- basic cleanup of in-memory bindings.

Findings:

- full event relay, per-user outbound fan-out, Redis-backed presence, and Redis
  cleanup are absent from the active implementation;
- multiple alternate implementations remain commented in the same file;
- PSKs are logged;
- no TLS/authz/rate-limit/command allowlist is defined; and
- no tests were found.

### Laravel Verification Worker - Placeholder, Not Verification

- subscribes/publishes Redis messages with reconnect/backoff code.

Findings:

- user ID is deterministically synthesized from `crc32(psk)`;
- no database/user/token validation occurs;
- PSKs and messages are printed to logs;
- failure exits instead of continuing after some errors; and
- no integration tests were found.

### API Layer - Not Implemented

- `LiveApiController` has an empty invokable method;
- `QueueController` is empty;
- `bootstrap/app.php` registers web and console routes but no API route file;
- no `/relay/auth`, `/relay/ping`, or `/relay/event` endpoints exist; and
- no matchmaking API endpoints exist.

### Electron Relay - Recovered Partial Prototype

- configuration persistence;
- HTTP gateway client;
- local LiveAPI client (wrong direction for the later model);
- status/log UI;
- reconnect loops; and
- builder targets.

Findings:

- not present in current reachable tree;
- backend protocol counterpart absent;
- local LiveAPI role incorrect for the remembered corrected architecture;
- PSK stored in JSON;
- unsafe renderer settings intentionally enabled;
- no buffering/ack/deduplication/idempotency;
- no tests or verified packaged artifact.

### Docker And CI - Configured, Not Production-Proven

- Compose config parses and defines app/Vite/Nginx/MySQL/Redis;
- gateway/verification worker remain commented;
- tests workflow installs dependencies, builds, and runs Pest on `main` or
  `develop` events;
- linter workflow grants `contents: write` and runs Pint in modifying mode;
  auto-commit is commented.

Findings:

- no `main` or `develop` local branch exists in the inspected checkout;
- GitHub environment/secret availability was not inspected;
- CI run results were not accessed;
- deployment plan is not implemented as described; and
- no production Compose, backup, restore, rollback, or monitoring artifact was
  verified.

## Public/Placeholder Claim Findings

The landing/matchmaking UI displays or implies:

- live matchmaking online;
- rated lobbies;
- anti-tilt filters;
- cross-game profiles;
- post-match ratings;
- anti-toxicity filters;
- good standing;
- recent match results/RR;
- estimated wait; and
- 1,240 players online.

The inspected implementation does not support these claims. Much surrounding
copy is Lorem Ipsum. These are prototype visuals, not publishable content.

## Verification Performed

- Git status, branches, revision, logs, tracked inventory, and file history;
- manifest/config/source inspection;
- Compose configuration validation;
- Compose running-service status;
- workflow Markdown validation;
- legacy Vite production build; and
- read-only inspection of unreachable relay objects.

`npm run build` passed with warnings. PHP tests did not start because the local
PHP binary could not load `libnetsnmp.40.dylib`; this is an environment blocker,
not a test result.

## Audit Conclusion

The repository is a half-finished prototype and evidence corpus, not a reusable
completed architecture. It proves experiments in authentication, game-account
setup, static UX, Apex LiveAPI, Redis/WebSocket transport, an Electron relay,
and Valorant direction changes. It does not prove a functioning TeamRadar
matchmaking/review product. Because the owner does not require reuse, findings
are preserved as lessons rather than correction tasks.

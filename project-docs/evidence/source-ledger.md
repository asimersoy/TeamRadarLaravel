# Legacy Reconstruction Source Ledger

- **Record type:** evidence ledger
- **Status:** current for baseline `7043054`
- **Purpose:** show what each reconstruction claim may legitimately prove
- **Update trigger:** an additional source is supplied or a baseline changes

## Authority And Evidence Rules

- Current owner instructions control present work.
- A historical file proves that a statement or implementation existed at that
  revision; it does not prove current accuracy, completion, or approval.
- The memory dump is a detailed secondary reconstruction. It may describe
  decisions whose primary records no longer survive.
- Unreachable Git objects are historical evidence only. They were not restored,
  branched, edited, or made authoritative.
- Bundled third-party documentation is evidence of the old development corpus,
  not proof that its contents remain current or permitted for a future product.

## Primary Current-Authority Sources

| ID | Source | What it proves | Limits |
| --- | --- | --- | --- |
| CUR-001 | Owner instruction, 2026-09-02 | TeamRadar is the project being worked on; the Laravel app is half finished; legacy code need not be reused | Does not approve a new product specification |
| CUR-002 | Owner instruction, 2026-09-02 | Reconstruct old idea first; owner will later change specifications, product boundary, and permitted-use boundary | Historical reconstruction remains non-authoritative for the rewrite |
| CUR-003 | Owner instruction, 2026-09-02 | Keep workflow/guidelines separate from project-specific records, including folder separation | Controls current documentation layout |
| CUR-004 | Owner instruction, 2026-09-02 | Route tasks, preserve unrelated work, separate information classes, and require evidence-backed completion | Controls working method, not product scope |

## Supplied Memory Reconstruction

| ID | Source | Identity | What it supports | Limits |
| --- | --- | --- | --- | --- |
| MEM-001 | `/Users/asime/.codex/attachments/c0f1cfe7-e285-44a0-871f-e94c25efe070/pasted-text.txt` | 726 lines; SHA-256 `b034295c911d379b80aef8f8016483a5b8f7b8942a197d488c867213bb54c34d` | detailed remembered canon, superseded paths, relay/packaging information, unresolved decisions, and Apex-after-Valorant interpretation | secondary reconstruction; not copied verbatim into the repo; many “final” labels lack surviving dated primary records |

## Reachable Repository Baseline

| ID | Source | What it supports | Limits |
| --- | --- | --- | --- |
| GIT-001 | commit `7043054415a7784e487d075990077e26fc81f710` | immutable inspection baseline | includes workflow system added after legacy development |
| DOC-001 | `docs/PROJECT_OVERVIEW.md` | TeamRadar/QueueGuard, Apex teammate-finder/relay architecture, Laravel/Redis/MySQL/Docker narrative, future ideas | claims more completeness than implementation proves; chronology precedes Valorant switch |
| DOC-002 | `docs/TO_DO.md` | Apex aims, rank/nucleus/Tracker exploration, explicit switch to Valorant, API-light prototype, matchmaking/review backlog, simple hosting preference | informal mixed-age notes; not a clean decision register; external facts unverified |
| DOC-003 | `docs/ux-diagram.md` | proposed PSK/Node/Redis/Laravel/presence/downlink flow and its own open questions | architecture proposal, not implemented end to end |
| DOC-004 | `docs/gateway-comparison.md` | intended parity features missing from Apex tap/gateway | checklist, not proof of implementation or approval |
| DOC-005 | `docs/deployment-plan.md` | GHCR/Actions/Compose/HTTPS/SSH/rollback roadmap and unresolved inputs | proposal only; not deployed evidence |
| DOC-006 | `docs/LiveAPI/` | Apex LiveAPI reference material bundled into the old corpus | current provenance/accuracy/policy not verified in this task |
| APP-001 | `composer.json`, `package.json`, lockfiles | exact legacy dependency/configuration baseline | no requirement for rewrite |
| APP-002 | `routes/web.php`, `bootstrap/app.php` | actual web routes, no API route registration, public Redis diagnostic | does not prove runtime behavior without environment/tests |
| APP-003 | `app/Models/`, game-account migrations, `SetupGameAccount` and middleware | actual user/game account schema, Valorant gate, self-declared rank, immediate `verified_at` | prototype behavior is not valid verification |
| APP-004 | landing, matchmaking, dashboard, auth/setup views | UI concepts, labels, placeholders, and implemented screen structure | static/placeholder content does not prove features or public claims |
| APP-005 | `gateway/index.mjs` and `LiveApiVerifyWorker.php` | partial Redis/WebSocket verification experiments | placeholder identity, logged PSKs, missing relay/fan-out/presence pieces |
| APP-006 | `Apex-tap/index.mjs`, package/config | local listener/protobuf/custom-match experiment | incomplete; binary path contains undefined identifier; no tests |
| APP-007 | tests and `.github/workflows/` | starter test coverage and intended CI steps | local PHP tests unavailable; remote CI status not inspected |
| APP-008 | `docker-compose.yml` and Dockerfiles | development service definitions | gateway/worker commented; no production/running-state proof |

## Recovered Unreachable Relay History

| ID | Commit | Date | What it supports | Limits |
| --- | --- | --- | --- | --- |
| REL-001 | `402a3f3` | 2025-10-01 | initial Electron relay tree | unreachable; earliest prototype |
| REL-002 | `b1852b7` | 2025-10-06 | HTTP client/LiveAPI/UI fixes | unreachable; incomplete |
| REL-003 | `f0006bd` | 2025-10-07 | dependency and IPC/config refactor | unreachable; unsafe renderer settings remain |
| REL-004 | `5997de0` | 2025-10-07 | latest recovered relay tree and builder config | unreachable; no branch/release/backend counterpart |

Files inspected in `REL-004`:

- `package.json` and `electron-builder.yml`;
- `src/main.ts` and `src/preload.ts`;
- `src/client/gateway.ts`;
- `src/client/gateway_http.ts`;
- `src/client/liveapi.ts`;
- `src/renderer/index.html`; and
- `src/renderer/ui.ts`.

## Checks And Environment Evidence

| ID | Check | Result | What it proves |
| --- | --- | --- | --- |
| CHK-001 | `git status --short --branch` at baseline | clean `new-development` | no pre-existing working-tree changes at inspection |
| CHK-002 | tracked inventory | 221 total / 72 workflow / 149 legacy project | baseline scope/count only |
| CHK-003 | `docker compose config --quiet` | pass | Compose syntax/interpolation accepted locally |
| CHK-004 | `docker compose ps --format json` | no output | no Compose services running at inspection |
| CHK-005 | workflow validator | pass: 68 Markdown, 15 procedures, 38 templates | workflow structure/links only |
| CHK-006 | `npm run build` | pass with warnings | legacy assets can compile in the local Node environment; not behavior correctness |
| CHK-007 | `php artisan test` | could not start: missing `libnetsnmp.40.dylib` | local PHP environment blocked; no test verdict |

## Exclusions

- ignored `.env` and secrets;
- generated `vendor/`, `node_modules/`, and build output as evidence sources;
- production/provider facts;
- external repositories not present in the workspace;
- current web verification of Apex/Riot/API policies;
- unpublished chat history beyond the supplied dump; and
- user data or production data.

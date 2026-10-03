# First pass implementation record

**Status:** S1–S4 complete and verified locally. S5 feedback/honor/admin is next;
S5–S6 are not yet implemented. Updated 2026-10-03.
**Owner:** primary implementation agent. Update after each stage or blocker.
**Authority:** QG-FIRST-PASS-1 revision 1 + DEC-052 and the owner's subsequent
explicit instruction to start implementation and continue through completion.
This activates the approved stages, not deployment, public use or held tests.

## Route and baseline

Started from clean `new-development` at `6502bcb`. Read repository/workspace
instructions, canonical entry path and task checklist; current project index,
state, registers, workflow governance, specification modules, execution plan and
acceptance matrix control this work. Selected procedures: code/implementation,
product planning, content lifecycle for UI labels, bounded technical research,
decision/recommendation safety, privacy/data/legal, external review,
design/rendered review, audit/reconciliation, migration/import,
deployment/backup/rollback, interruption/recovery and deferral/owner review.
Always-applicable system documents were read. No agent delegation is planned.

Honor display is informational; matching is preference matching and report-based
rating invalidation is eligibility logic. No professional or safety guarantee.
The approved specs define inputs, limits, ordering, fallbacks and data audiences.
Public collection stays disabled; first-build owner/data review remains required.
Stop for a real policy conflict, uncontrolled data exposure, missing required
access/test capability or separately controlled action. Do not reopen settled
choices or silently omit acceptance tests.

## S1 entry inspection

Docker Desktop 4.80.0, Engine 29.6.1 and Compose 5.3.0 are accessible after the
normal sandbox permission review. Unrelated containers are running; none are
QGuard's rewrite. Existing legacy volumes and services must not be reused.
The fresh `qguard/` skeleton was generated with Docker Composer using
`laravel/laravel` v13.10.1, with no scripts or dependencies installed initially.
No host PHP was used. Dependency compatibility/build/tests are not yet proven.

Use isolated project services and loopback development ports 8120/8121; verify
availability before startup. Test resources have a separate project/database.
Only fictional fixtures may be written. Additive development migrations and
test-only resets are allowed; no legacy import or persistent-data destruction.

## Verification and commit boundaries

Follow [the six-stage plan](execution-plan.md) and
[acceptance matrix](acceptance-matrix.md). Each stage receives actual command,
result, relevant rendered evidence and residual-limit records before its coherent
local commit. Unrun criteria are not passed. Stage records below will distinguish
structural, behavioral and rendered evidence; no independent specialist review
or public release is implied by internal QA.

Initial technical references rechecked on 2026-10-03:
[Laravel installation](https://laravel.com/framework/docs/13.x/installation),
[Livewire installation](https://livewire.laravel.com/docs/4.x/installation),
[Pest installation](https://pestphp.com/docs/installation),
[Playwright Docker](https://playwright.dev/docs/docker).
These support setup, not proof that this application works.

## S1 foundation evidence

Implemented fresh Laravel, Blade/Livewire dependencies, pinned Docker services,
separate PostgreSQL dev/test targets, database-backed sessions/jobs/cache,
single Reverb, a local mail sink, generated ignored secrets, a responsive landing
page and an explicit production collection gate. No domain actions are advertised
as working. Generic scaffold host/Boost instructions were replaced with scoped
Docker-only routing; no protected workflow was changed. System fonts avoid
unnecessary external font fetches. No project open-source license was selected
by inheriting the framework skeleton's package metadata.

Resolved: PHP 8.5.11, PostgreSQL 18.6, Laravel 13.34.0, Livewire 4.4.7,
Reverb 1.12.0, Pest 4.7.8, PHPUnit 12.5.33, Vite 8.3.2 and Playwright 1.63.0.
Composer/npm lockfiles and image digests are tracked. Reverb's transitive Redis
client libraries do not add a Redis service; horizontal scaling stays disabled.

Commands run from qguard (all PHP/browser execution in Docker):

- `docker compose build app`: initial and pinned repeat build passed.
- Composer update/install and `composer check-platform-reqs`: passed; npm
  install and `npm run build`: passed. Composer audit and npm audit reported
  no known vulnerability advisories at this check, not a security certification.
- `docker compose exec -T app php artisan migrate --force`: three additive
  foundation migrations passed against the new development database. Equivalent
  explicit test migration passed against qguard_test.
- Test Compose `php vendor/bin/pest --compact`: **7 tests, 12 assertions passed**.
  Includes real PostgreSQL/cache, rendered response and public-collection denial.
- Test Compose `php vendor/bin/phpunit --testsuite Unit`: **3 tests,
  3 assertions passed**; unsafe reset environment/host/flag checks.
- Test Compose `php vendor/bin/pint --test`: **33 PHP files passed**.
- Test Compose `browser`: **2 Chromium browser checks passed**, 1280px and
  390px, real UI assertions, no page errors, no overflow and keyboard skip link.
  Both screenshots were inspected; evidence copies are in outer workspace
  outputs/qguard-first-pass/s1. No domain or cross-engine claims yet.
- A database cache probe `qguard-foundation-probe = s1-persistent` survived
  recreation of the development postgres/app/nginx containers and a later image
  reference recreation; qguard-dev-postgres was retained. No volume destroyed.
- Both Compose configs validated. App, nginx, PostgreSQL, worker, scheduler,
  Reverb and mail are running, bound only to declared loopback ports where exposed.

Repair evidence: Docker credential helpers stalled public-image pulls. Verified
host registry connectivity, used a task-only anonymous configuration outside
Git, prefetched public images and stopped only this task's stalled commands.
Saved Docker credentials/settings were not changed. PostgreSQL recreation
exposed a worker that exited on DB loss; development processes now restart.
Pinning the test DB image recreated its deliberately ephemeral database; the
first post-pin test run failed on missing tables, then explicit test migrations
and the full rerun above passed. Persistent development data remained intact.

S1 proves initial T01/T02/T04 and rendered foundation scope only. Full restore,
production-image construction, domain/concurrency flows, browser engine coverage,
load checks and first-build data inventory remain S2–S6. No real accounts,
integration test, push, PR, deployment or qualified external review occurred.

Final S1 review: Composer strict validation passes; a second migration is a
no-op. All seven services, including the worker, recovered after the scoped
database restart and the persistent probe remained. Local link checks covered
72 Markdown files/312 links without missing files; scoped diff/ignore checks
exclude secrets, dependencies, protected workflows and legacy edits.
`git diff --check` passed after removing unused generated welcome boilerplate.
Package metadata is proprietary pending an explicit public-license decision,
not a new open-source grant. Commit this verified foundation as one unit.

S1 committed as `d73e33d`.

## S2 identity, friends and partial parties

Implemented framework-backed email/password registration, verification, login,
logout, password reset/change, private own-honor display, truthful declared game
profile, exact-handle consent-based friends, invitations and 1–5-player parties.
Readiness is invalidated on profile/settings/membership edits. Database unique
active slots and a PostgreSQL transaction advisory fence serialize membership
mutations; the initial global fence favors correctness over parallel throughput.
S3 uses the same fence and S6 measures it; no scale claim is made.
Matchmaking remains unavailable in this independently runnable stage.

No Riot access exists here. The unavailable-provider seam does not claim account
verification or official rank and is not a public-release RSO workaround.
Rechecked [Riot guidance](https://developer.riotgames.com/docs/valorant),
[Laravel verification](https://laravel.com/framework/docs/13.x/verification) and
[Mailpit API](https://mailpit.axllent.org/docs/api-v1/).

Verification from qguard, using Docker commands in README:

- Additive migration passed on persistent dev and disposable test databases.
- Pest: **15 tests / 55 assertions passed**, including normalized signup,
  verification/authorization, profile validation, crossed friend requests,
  stale/full party invitations, readiness reset and two independent PHP/Postgres
  processes competing for one player's party (exactly one succeeds).
- Direct PHPUnit Unit: **3 / 3 passed**. Pint: **46 files passed**. Vite build passed.
- Chromium foundation checks passed at 1280/390px. Real-mail registration→verify→
  reset→login and two independent contexts friend→invite→accept→ready→disband
  passed. Desktop/mobile dashboard screenshots inspected and copied to outer
  outputs/qguard-first-pass/s2; no overflow. Later flows remain unrun.
- Opt-in local/test seeder generates credentials in ignored private storage;
  no fixed password, real identity or production seed route. Seeded dev fixtures
  without resetting the persistent database.

Repairs: model database defaults were missing on freshly created in-memory users;
regressions cover signup→dashboard and immediate party creation. Recreating PHP
exposed Nginx's cached old IP; Docker DNS now re-resolves it. Browser acceptance
waits for the recipient's committed state before checking the other roster.
No public access, held integration test, push or deployment occurred.

S2 committed as `3fbb182`.

## S3 matching and private roster

Implemented atomic queue entry/cancel, readiness rechecks, whole-party five-player
matching with hard shard/language/mode boundaries, rank-disparity-compatible full
five policy, individual honor spans and every-party wait allowances. DB lease,
membership fence, row locks and unique slots protect concurrent transitions.
Candidate pages and persisted DFS/anchor cursors distinguish exhausted budgets
from infeasible pages, and revisit older anchors without blocking other anchors.
Preference ties use rank span, aggregate elapsed waiting time and stable IDs.
Candidate validation is batched, not queried for every search expansion.

Matching freezes origin, declared rank/provenance, handle and aggregate honor
snapshots. Authorized teammates see the snapshots; an outsider gets 403. The
provider handoff remains honestly unavailable. S3 has a read-only room; S4 adds
chat and participant lifecycle rather than pretending they already work.

- Additive dev/test migrations and Vite build passed.
- Pest **26 tests / 104 assertions passed**. New tests cover 4+1, 3+2, 2+2+1,
  five solos/full five, individual rather than mean honor, every-party widening,
  profile-edit cancellation, duplicate queue, rank disparity, hard compatibility,
  candidate beyond entry 100, exhausted-budget cursor and snapshot privacy.
- Independent PostgreSQL processes race two matchers against cancellation:
  either cancellation or a complete five wins, never a partial/duplicate match.
  Process tests run in their own final suite; mixing committed fixtures with
  transaction-wrapped tests had exposed a test-isolation error, now fixed.
- Chromium **5 tests passed**: earlier account/friend flows plus five independent
  players queue→matched room, each seeing five rank/honor snapshots, with a sixth
  outsider denied. Screenshot inspected and saved in outer outputs/s3.
- Pint formatted all 58 PHP files. Test scheduler is stopped before backend
  resets and started only for browser checks; persistent development is separate.

Remaining: S4–S6 domain behavior, full acceptance mapping and recovery/load checks.

S3 committed as `bc42a4d`.

## S4 private text and session lifecycle

Implemented participant acknowledgment/end, five-minute unanimous no-show voting,
30-second response deadlines, stale-target protection and scoped slot release.
Disbanding affects QGuard only, never a game client. Ended participants keep read
access; removed targets lose room/message/socket authorization. Chat stores plain
text, rejects script URLs, limits length/rate, deduplicates retries and paginates
by ID. Reverb sends only room/version hints; each fetch reauthorizes and polling
recovers missed hints. Notifications cannot undo an already committed message.
Client status distinguishes sending, sent, failed/retry and live/polling connection.
[Laravel broadcasting guidance](https://laravel.com/framework/docs/13.x/broadcasting)
was checked before integrating its private-channel client.

- Additive migrations and Vite build passed. Pusher browser dependency locked;
  npm audit reported no known advisories at installation.
- Pest **33 tests / 143 assertions passed**, including no-show timing/quorum,
  stale target, new-party safety, deadline idempotence, retained/closed chat,
  escaping/script rejection, cursor paging and subscription authorization.
- A separate-process response/deadline race yields either acknowledgment or
  removal consistently, with corresponding active-slot state. PHPUnit Unit
  **3 / 3 passed**; Pint formatted 67 PHP files.
- Earlier five Chromium flows passed; the sixth initially exposed an HTTP-origin
  `crypto.randomUUID` limitation. Replaced it with Web Crypto random bytes and
  an RFC-compatible UUID layout; real chat/no-show flow then passed. It exercises
  five contexts, literal script text, offline failure/retry without duplicates,
  unanimous voting, acknowledgment cancellation, end/requeue and read-only chat.
- Desktop and 390px chat screenshots inspected and saved to outer outputs/s4.
  Private test-only clock uses a non-web storage file, requires testing plus the
  disposable DB guard and is disabled in backend tests and normal development.
  No public clock/fixture endpoint exists. Test workers stop before backend resets.

Full fresh-suite rerun, explicit Reverb-outage test and all other S6 cross-flow/
operational/security checks remain required. No feedback or admin capability is
advertised as complete yet. No protected workflow or legacy application changed.

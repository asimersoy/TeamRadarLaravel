# First pass implementation record

**Status:** S1–S6 complete and verified locally; working-build and DEF-012 owner
reviews are next. Updated 2026-10-03. No public release is implied.
**Owner:** primary implementation agent. Update after each stage or blocker.
**Authority:** QG-FIRST-PASS-1 revision 1 + DEC-052 and the owner's subsequent
explicit instruction to start implementation and continue through completion.
This activates the approved stages, not deployment, public use or held tests.

## Matchmaking and profile separation 2026-10-03

Status: **revision-required** for full regression closure; the requested UI is
implemented and rendered, with the WebKit finding below still unresolved.
Owner requests separate matchmaking/profile/settings and a
Riot-style friends side list; security may share the profile/settings page.
The owner's subsequent browser comment selects "Your connections" instead of
"Your people" for the sidebar label.
Baseline: clean `new-development` at `fe7251f`. Primary agent only. Read mandatory
entry, current records, governance, product/identity specs and nearby code/tests.
Route: product planning, code, UI content, privacy/data, rendered design and
regression audit; migration/import for disposable synthetic test fixtures only.

Agent selects combined Profile & settings rather than two small account pages,
keeps `/dashboard` as the matchmaking URL to preserve links/auth redirects, and
uses a compact right sidebar with initials, requests and existing party invite
actions. No fabricated online status or new friend data disclosure. This applies
DEC-042 within the owner's request and is reversible. No protected workflow,
schema, integration, authentication-policy or matchmaking-algorithm change.

Acceptance: distinct navigation/forms, account page reachable while matched,
guest/unverified protection, profile validation and queued-edit cancellation,
password rotation/session revocation, friend requests and authorized one-click
invite, preserved queue/matched-room/chat flows, desktop/mobile layout and keyboard
access. Verify Docker backend/browser tests, rendered output and scoped diff;
update records and make one coherent local commit. Test resets must target only
guarded `qguard_test`, never persistent dev data. Stop for policy/access expansion
or verification failure; no push, deploy, real provider action or held tests.

Implemented account actions in a separate authenticated, verified Livewire Profile
page, retaining validation, the shared action throttle, queued-edit cancellation,
readiness clearing and password/session rotation. Password changes return to
`/profile` with refreshed layout CSRF tokens. Matchmaking retains its existing
URL, shows read-only game setup and keeps the friends sidebar available while
matched. Sidebar invitations resolve accepted friendship ownership server-side
and reuse the existing party-service restrictions. No friend email, Riot ID,
rank or honor is added to the sidebar payload.

The first browser run caught a real disclosure-state regression: a pending
Livewire refresh could close Add a friend while its field was being edited.
The disclosure now preserves its own open attribute while allowing child updates;
the options disclosure follows the same rule. Added a keyboard-open, draft and
polling regression. Reran from a fresh guarded test database, not partial fixture
state. Context recovery inspected the scoped diff and running services; no lost
source edits or unrelated changes were found.

A subsequent full run passed 12 checks but failed WebKit's final zero-page-error
assertion despite completing its functional steps. Trace inspection placed two
same-origin fetch errors immediately after a Session ended click as the room was
navigating to feedback (Livewire refresh and message refresh). This occurred in
the existing room lifecycle, not the new profile navigation. No error assertion,
access-control rule or application behavior was weakened. A second clean full
run again passed 12 checks and completed WebKit's functional flow, but its final
zero-error assertion caught `AbortError: Fetch is aborted`. The trace again puts
this immediately after Session ended, inside Livewire's request code. Inspection
of the installed framework found response-body reading outside the initial fetch
catch; this is a likely contributor, not a verified repair. This is not evidence
of a CORS policy defect. Do not label either full browser run as passed.

**Unresolved finding NAV-WK-01:** investigate and resolve or conclusively classify
the navigation-time background request error without broadly suppressing browser
errors or changing access policy. Required before closing this UI regression
packet or a later release claim: fresh guarded full suite including WebKit with
the original zero-error criterion satisfied. No missing owner product decision
is implied; this is outstanding technical verification, not an approved deferral.

Verification from `qguard/`, all runtimes in Docker:

- `docker compose run --rm --no-deps node run build`: passed.
- Test Compose `php vendor/bin/pest --compact`: **60 tests / 90,299 assertions
  passed**, including new page access/separation, matched profile snapshot and
  friendship authorization regressions. Only the guarded disposable test database
  was reset; development data was preserved.
- Direct test Compose `php vendor/bin/phpunit --testsuite Unit`: **9 tests /
  90,024 assertions passed**, already included in Pest.
- Full test Compose `browser`: **12 passed / 1 failed** on the last two clean
  runs. All Chromium scenarios and the Firefox smoke passed; WebKit functional
  steps completed but its zero-page-error assertion failed as described above.
- Test Compose `browser --config=playwright.outage.config.ts
  party-boundaries.spec.ts settings-review.spec.ts`: **2 passed** in 17.2 seconds
  after the last full run. Includes declined/revoked/busy/full-party cases and
  password rotation, re-login, original synthetic password restoration and admin
  review concurrency. These do not convert the full suite into a passing result.
- Test Compose `php vendor/bin/pint --test`: **92 files passed**.
- Inspected the in-app development browser at its native width and 1280px/390px:
  separate active navigation, account forms, empty connections sidebar, wide-screen
  side placement and narrow-screen stacking. No horizontal overflow at either
  explicit width. Also inspected populated-party/friends browser-test screenshots.
  Evidence images live outside Git in `outputs/qguard-navigation-refinement/`.
  Restored the normal browser viewport and left Matchmaking open as demo_b without
  changing that development user's profile, relationships or party/session state.

Reviewed the full scoped source/test/document diff. `git diff --check` passed;
four changed Markdown files / 43 local links and their section targets resolved.
Structural, scoped behavioral and rendered evidence are present, but full browser
regression closure is not. Local checkpoint only; no push, PR or deployment.
Rollback of this UI needs only code reversal and frontend asset rebuild, with no
database migration or data deletion. Load, backup/restore, production-image and
actual service-stop tests were not rerun for this UI change; simulated socket
fallback was rerun. Protected workflow, legacy code, schema, provider integrations
and user data were untouched. Project documentation guidance kept the request,
agent-selected layout and unresolved evidence in project records, not the reusable
workflow package.

## Chat usability follow-up 2026-10-03

Owner requests collapsible team text and Enter-to-send after trying the local
build. Baseline: clean `new-development` at `d845f75`. Scope: room Blade/CSS/JS,
chat browser regressions and this project's records only. Route: code, UI content,
design/rendered review, privacy/data and regression audit; migration/import only
for existing fictional fixtures in the guarded disposable test database. Read
the entry path, current records, governance, chat specification and app runbook.
No delegation, protected-workflow edit, schema change or new data audience.

Agent-selected details: a native inline disclosure rather than an overlay avoids
obscuring session controls, starts collapsed, retains drafts and supports keyboard
toggle. Shift+Enter preserves multiline entry; a visible Send button supports
touch. These are reversible UI defaults, not new product/privacy policy.
Acceptance: toggle/draft persistence, Enter sends exactly once, Shift+Enter adds
a newline, IME/held Enter do not send, empty input does not post, busy/retry and
read-only behavior remain sound, desktop/mobile fit and cross-player delivery.
Verify Docker build, guarded PostgreSQL backend regression and browser checks;
inspect real rendered pages and the full scoped diff before one local commit.
Stop for access/verification failure or policy expansion. Do not reset development
data, resume held integrations, push or deploy. Status: completed and verified
locally; no public release approval implied.

Implemented a compact default-closed disclosure, bounded scrollable message
history, responsive composer and visible keyboard help. Native disclosure keeps
the draft while toggling and survives Livewire polling through the existing
ignored subtree. Enter uses the same validated, idempotent submit path as the
button; Shift+Enter inserts a newline. Composition/held-key events are excluded,
whitespace-only messages are not submitted, and the composer is temporarily
read-only with Send disabled while a request is pending. No API/schema change.

Verification from `qguard/`, all runtimes in Docker:

- `docker compose run --rm --no-deps node run build`: passed.
- Stopped only test scheduler/worker, reset the private test clock and ran
  `docker compose -f compose.test.yaml run --rm php vendor/bin/pest --compact`:
  **57 tests / 90,263 assertions passed**. Guarded disposable `qguard_test` only.
- Direct `php vendor/bin/phpunit --testsuite Unit` on that test Compose:
  **9 tests / 90,024 assertions passed** (included in Pest, not additional tests).
- Reseeded the existing fictional test accounts and restarted test services.
  `docker compose -f compose.test.yaml run --rm browser`: **13 passed** in
  3.4 minutes, including Chromium full flows and Firefox/WebKit core flows.
  Added closed/open, keyboard toggle, retained draft, newline and Enter-send
  assertions. Chromium additionally covers empty/whitespace input, synthetic
  IME/key-repeat events, a deliberately paused POST, duplicate suppression,
  button/offline retry, escaped text, read-only retained chat and socket fallback.
- Test Compose `php vendor/bin/pint --test`: **90 files passed**.
- Inspected 1280px rendered test output and the in-app browser at its default
  width and 390px. No horizontal overflow at 390px; both disclosure states and
  live Enter/Shift+Enter verified. Local development demo_a had already ended;
  its retained room correctly has no composer. Signed in as active synthetic
  demo_b for the send check and left that room open with chat collapsed. Preserved
  the existing message and stored one clearly labeled two-line chat-check message.
  Screenshots: outer `outputs/qguard-chat-refinement/`, separate from Git.
- Reviewed the complete scoped diff; `git diff --check` passed. Three changed
  Markdown files / 38 local links and their section targets resolved. No protected
  workflow, legacy, dependency, credential or generated-asset change is tracked.

Limits: IME checks simulate browser composition events, not a physical input-method
session. The separate real-service-stop recovery test's opening step was adjusted
for collapsed chat, but that extended outage/restore/load/production-image suite
was not rerun for this UI-only change; browser-blocked socket fallback was rerun.
No new retention, access or moderation policy. Development data was not reset;
no push, PR, deployment, provider action or history rewrite. Project documentation
guidance kept the owner request and reversible UI defaults in the existing spec
and evidence record rather than modifying the protected reusable workflow.

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

S4 committed as `5d36f10`.

## S5 feedback, honor and human review

Implemented optional three-dimension feedback, immutable finalization/skip,
ten-minute/early settlement, distinct-reporter outgoing-rating invalidation,
late evidence without recalculation, smoothed raw reference and damped honor,
startup handling, canonical order and exact application audit. Cleared admins
have a filtered inbox, retained evidence and optimistic human-review notes;
players cannot see reviewer mappings. No penalty tools or Discord claims added.

- Additive migrations passed on dev/test; persistent development was not reset.
- Pest **49 tests / 90,220 assertions passed**; direct PHPUnit Unit **9 tests /
  90,024 assertions passed**; Pint formatted **82 files**. Includes 10,000
  deterministic recurrence inputs, bounds, cold start, extreme/moderate tradeoff,
  sustained changes, canonical ordering, atomic rollback/retry and independent
  PostgreSQL settlement/duplicate/deadline races with exact audit replay.
- Earlier six Chromium flows passed in a fresh browser run; the seventh exposed
  an exact-label locator issue. The repaired feedback/admin test passed separately:
  five players finalize, two reporters invalidate only outgoing ratings, incoming
  honor changes, matched snapshots remain, admin reviews and late evidence does
  not recalculate. The entire fresh suite will run again in S6.
- Admin and closed-feedback screenshots were inspected, copied to outer
  outputs/qguard-first-pass/s5. The prototype deliberately exposes detailed case
  JSON only to cleared admins; this is not player-visible feedback history.
- Fixed a Livewire method-name collision, isolated backend tests from the private
  browser clock, and corrected long-lived scheduler clock behavior. Test clock
  callbacks now read the scoped offset without recursive date construction.
  Closed settlement also closes pending no-show votes; exact late-report retries
  are idempotent and cannot silently overwrite finalized evidence.

S6 still owns full browser/engine/recovery/load/restore/production-build evidence,
field inventory and final acceptance mapping. Current tests are not a public-use
approval or independent security review.

S5 committed as `f9ed864`.

## S6 full verification and operational handoff

Routed the synthetic load probe through the experiments procedure before running;
see [design, measured results and limitations](load-probe.md). Domain integrity
passed. Final backend regression passes **57 tests / 90,263 assertions**;
direct PHPUnit Unit remains **9 / 90,024**. Production app/web images build from
locks without dev packages, test files or secrets. Isolated non-root route/view
caching and platform checks pass; debug/test flags are rejected at startup.
Composer/npm audits report no known advisories at this check.

Added descriptive validation association/focus, editable handle with immutable
old snapshots, bounded admin chat pagination, restricted denial metadata logs,
and operator heartbeat/count diagnostics. Broader browser tests exposed framework
scheduler startup/minute-boundary timing and invalid backwards test-clock jumps;
clock advances are now monotonic within a suite, reset only with workers stopped.
One premade browser scenario still used the ordinary ten-second action timeout
after a simulated clock jump. Read-only DB inspection confirmed all five matched
at the next minute boundary; its wait now uses the same 75-second test-only bound
as the other clock-jump scenarios. Cross-player steps await committed UI state.
Final Pint checks cover 90 PHP files. All 37 acceptance criteria and F01–F12 are
mapped to concrete evidence in [verification results](verification-results.md).

Browser evidence: the fresh default suite passes **13 tests** (11 Chromium,
Firefox and WebKit core-flow smoke). Two additional Recovery checks passed for
invitation boundaries, password change/re-login and concurrent admin review.
An actual test Reverb stop/restart check passed on the same connected pages:
messages arrived by polling during the outage and live updates resumed afterward.
The stopped service was restored. These are 16 distinct browser checks across
the default and recovery runs, not a claim they ran in one command.

Repair evidence: browser checks found a password-change CSRF token left stale
in the outer header; password rotation now destroys the old login session and
reloads the dashboard layout. Targeted browser and backend regressions passed.
A subsequent WebKit rerun recorded only four submissions: the last click sent no
Livewire skip request before initialization. Interactive component roots now use
Livewire's verified local `wire:cloak` readiness mechanism, with a no-JavaScript
explanation. The engine test asserts each saved skip confirmation before moving
on. No timeout was lengthened to hide that missing submission. Reruns use clean
fixtures, not a partial pass presented as a complete suite.

Screens at 1280px and 390px were rendered and inspected for foundation,
dashboard, chat, feedback, validation and admin review. Error association/focus,
overflow and page-error assertions pass; no formal accessibility certification.
Evidence copies remain in outer `outputs/qguard-first-pass/s1` through `s6`.
Raw traces can include fictional passwords/cookies and are not public outputs.

Recovery: with test workers and browser traffic stopped, PostgreSQL 18 pg_dump
and pg_restore created the new `qguard_restore_20261003_s6` database. All **30
tables** matched source counts and sorted-row content digests exactly; source
digests after restoration/smoke remained unchanged. Authenticated HTTP-kernel
requests to dashboard, restored room and feedback returned **200**. The 113,253-byte
dump is private mode0600 in outer `snapshots/qguard-first-pass-20261003.dump`;
no persistent source was overwritten, no database or volume was destroyed.

Final development image/services were refreshed without resetting PostgreSQL.
The local database is reachable, match/deadline/settlement heartbeats are current,
and development pending/failed jobs and overdue session counters are zero.
Production images were rebuilt with final code, verified as non-root with no
`.env`, tests or PHPUnit packages, and passed offline route/view caching and
platform requirements. They were **not started as a deployment**.

The [operational runbook](../../../qguard/OPERATIONS.md) covers safe setup,
status, image creation, backup/restore and migration recovery. The separate
[actual stored-data inventory](../../operations/first-build-data-inventory.md)
implements the required DEF-012 preparation. Its Markdown/runbook organization
followed the repository documentation and write-page guidance; it neither
changes protected workflows nor chooses the owner's retention policy.

Final limits: fictional local use only; no verified rank/account integration,
game handoff, Discord, recording, sanctions, retention purge or public collection.
The known collusion/no-show/end-declaration risks and bounded greedy matcher
tradeoffs remain explicit. No independent specialist review, push, PR, deployment,
provider application, live integration test or history rewrite occurred.
First-pass completion is ready for owner flow/data review, not production release.

Final document QA: 76 Markdown files, 361 local file links and 42 section anchors
checked without missing targets; all 37 acceptance IDs mapped once. Full scoped
diff and `git diff --check` passed. Baseline `6502bcb` to completion changes only
`qguard/` and `project-docs/`; protected workflow and legacy paths have no diff.
Generated credentials, `.env`, dependencies, runtime data and raw traces remain
ignored. The protected-workflow validator was intentionally not run because that
package was not modified. Save this verified S6 unit as one local commit.

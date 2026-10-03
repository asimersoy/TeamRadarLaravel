# Architecture, Docker and recovery

**Status/owner/update:** [manifest](README.md). Authority: DEC-002, DEC-006,
DEC-049, DEC-050. Depends on [data/security](data-and-security.md). Acceptance:
S1/S6, F12, T01–T04, X03–X04. Supporting choices are agent proposals, sourced in
[technical foundations](../../research/first-pass-technical-foundations.md).

## New application boundary

Create a fresh `qguard/` directory inside the existing Git repository, with its
own Composer/npm locks, app, tests, Dockerfiles, Compose files and runbook.
Do not move, overwrite, execute or import the root legacy application. Do not
reuse its environment, credentials, database or Redis/MySQL services. There is
one Git repository, not a nested Git repository. Project specs remain outside
`qguard/` in project-docs; general workflow stays protected.

Use a modular Laravel monolith, not microservices. Domain services own identity,
friends/parties, matching, sessions/chat, feedback/settlement and admin review.
Livewire components validate input and delegate commands; they do not contain
duplicated scoring, eligibility or locking rules. Pure value objects/functions
own the honor recurrence and compatibility policy for isolated testing.

## Runtime choices

- Laravel 13, PHP 8.5, Blade/Livewire 4; Tailwind/free components as appropriate.
- PostgreSQL 18; Laravel database queue, cache and sessions. No Redis.
- Nginx serving built assets and proxying PHP-FPM; single Reverb/Echo instance
  for private state-change notifications, with authenticated polling recovery.
- Pest with its compatible PHPUnit dependency, including named PHPUnit TestCase
  suites; Playwright/TypeScript for multi-account browser tests in Docker.
- Node LTS build tooling compatible with Vite/Playwright, selected and locked
  at S1. No Node app server, paid UI dependency or AI subsystem.

Resolve compatible stable patch versions at S1; record actual versions/digests
and commit lockfiles. Docs prove availability/direction, not a working dependency
resolution. If a major incompatibility appears, document evidence and the
smallest supported alternative before changing stack direction.

## Container topology and persistence

Separate services: nginx, app/php-fpm, queue worker, scheduler, reverb, postgres;
development profiles additionally contain frontend tooling, test runners and
a local-only mail sink. All PHP commands run inside Docker. No host PHP repair.
One PHP image serves app/worker/scheduler/reverb. Multi-stage production build
contains compiled assets and dependencies, not host bind-mounted source.

Development uses a `qguard-dev` Compose project; persistent named database
volume `qguard-dev-postgres` mounts at **/var/lib/postgresql** for the official
PostgreSQL 18 image. Do not copy the older image's data-volume target. Rebuild
and recreate reattach this same volume. No automatic destructive migration or
seed on normal startup. Data is outside the disposable container layer, though
the named volume is managed by Docker; it is not an off-machine backup.

Test Compose project/database/storage are separate (`qguard-test-<run-id>`),
with explicit test-environment and target-name checks before schema refresh.
No command containing volume destruction is part of routine development.
Reset helpers target only positively identified disposable test databases;
persistent development/future-production deletion still requires authorization.
Bind public development ports to localhost; do not expose PostgreSQL publicly.

## Consistency and background work

PostgreSQL is authoritative. Domain commands use transactions, constraints and
row locks; cache entries and WebSocket presence never decide membership,
eligibility, deadlines or honor. Lock user/party rows in stable ID order and
retry bounded deadlocks. A transaction returning success creates durable state.

Queue match and settlement jobs are repeatable/idempotent. Scheduler scans due
database state as recovery after a lost dispatch; delayed jobs alone are not
the clock. Dispatch notifications after commit. Broadcast minimal identifiers/
versions; clients fetch freshly authorized state. On notification loss or
socket reconnect, polling/refetch recovers all state from the database.
No need for a separate event-sourcing platform or durable notification ledger.

Match worker runs on demand and with a bounded periodic recovery tick. Settlement
and no-show processors also have due-state sweeps. Monitor last successful tick,
failed jobs and lag. Never interpret a stopped worker as permission to accept
feedback beyond its stored deadline. Job attempts cannot duplicate a match,
message, report or honor update.

## Operational deliverables and release boundary

S1 must provide scoped build/start/stop/migrate/test instructions. S6 supplies
production-build Compose configuration and a runbook for health, environment
secrets, HTTPS/reverse proxy, worker restarts, migrations and backups. Preparing
deployment artifacts is not deploying them. Host/domain/certificates and
production credentials remain unset until separately authorized.

Persist app key/secrets outside images/Git. Development/test keys and accounts
are isolated. Production startup must refuse debug/demo settings. Log request/
job identifiers and failures, not passwords/tokens/chat bodies/rating payloads.

Before a later authorized release: backup, validate schema compatibility,
perform controlled migrations, verify health and flows, then switch traffic.
Prefer forward-compatible additive migrations. Roll back app image only when
schema compatible; otherwise stop and assess, never automatically run destructive
down migrations. Preserve the previous runnable image and migration record.

Prove a synthetic row survives normal app/database container recreation using
the original development volume. Prove `pg_dump` can restore into a **different
isolated database**, compare fixture counts/content and run a smoke flow. Backups
go outside Git under approved workspace recovery storage, with sensitive-data
handling. No restore over the source database and no claim of production recovery
until an actual deployment/recovery plan is separately reviewed.

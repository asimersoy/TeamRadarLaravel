# QGuard operation and recovery runbook

All commands run from `qguard/`. This is a local first build. Production artifacts
are prepared, **not deployed**. Do not use root legacy Compose, host PHP, existing
legacy credentials or a persistent database reset.

## Local operation

Use README setup, then `docker compose exec -T app php artisan qguard:status`.
This checks DB reachability and reports last successful match/no-show/feedback
sweeps, waiting parties, overdue records and pending/failed jobs without payloads.
`/up` proves PHP boots, not DB/worker health. Review both checks and Compose service
status. A null heartbeat means no successful tick yet or expired monitoring cache.
The development scheduler begins on a minute boundary: allow up to a minute on
startup. Once active, matching scans every five seconds, deadline/settlement every
second. Significant overdue counts/stale heartbeats require investigation.

Scoped diagnostics:

```sh
docker compose ps
docker compose exec -T app php artisan qguard:status
docker compose logs --tail=50 worker scheduler reverb
docker compose exec -T app php artisan migrate:status
```

Do not paste raw logs, environment values, private credentials or job exceptions
into public reports. Access-denial logs contain actor ID/route only; jobs contain
minimal room/version hints. Investigate failed jobs before retrying them. A worker
notification failure does not erase DB writes; authenticated polling recovers.
For an ordinary code update restart only the relevant QGuard long-lived services:
`docker compose restart worker scheduler reverb`. Recreating PostgreSQL reuses
the named development volume; never use volume deletion as a routine repair.

## Production-shaped build (no deployment)

```sh
docker build -f docker/Dockerfile --target production -t qguard-app:production .
docker build -f docker/Dockerfile --target production-web -t qguard-web:production .
docker compose -f compose.production.yaml config --no-env-resolution --quiet
```

PHP image runs as www-data, includes locked non-dev dependencies and compiled
assets, and excludes `.env`, fixtures/tests and PHP test packages. Nginx image
serves the matching public assets. No source bind mount. Entrypoint rejects debug
and test controls in production and forces secure cookies; it never migrates or
seeds automatically. The Compose file keeps public collection explicitly false.

Before a **separately authorized** deployment, an operator must supply:

- External secret file via QGUARD_PRODUCTION_ENV_FILE: unique APP_KEY, APP_URL
  using HTTPS, DB_DATABASE/USERNAME/PASSWORD and matching POSTGRES_DB/USER/PASSWORD,
  Reverb app ID/key/secret and browser host/443, approved real mail settings.
- Authorized host/domain/TLS/reverse proxy routing web and WebSocket traffic,
  reviewed trusted-proxy configuration, allowed Reverb origins, secret storage,
  off-machine encrypted backups, monitoring and operator access controls.
- Owner/public/provider/privacy gates, then an explicit change to the public
  collection flag. The committed false setting is deliberate, not a launch bug.

No production credential, hostname, bill or external service is selected here.
Do not run production Compose up simply because these images build. Reverb remains
single-instance; Redis/distributed scaling is not part of this design.

## Extended synthetic browser recovery checks

After a clean, successful default browser suite, run the two additional checks:

```sh
docker compose -f compose.test.yaml run --rm browser --config=playwright.outage.config.ts party-boundaries.spec.ts settings-review.spec.ts
```

The separate actual-service outage check requires two terminals and runs only
against this disposable test stack:

```sh
docker compose -f compose.test.yaml run --rm browser --config=playwright.outage.config.ts socket-outage.spec.ts
```

It writes `storage/app/private/outage-phase.json` inside the test app container.
Read that file there (it contains only a phase label). After this run writes
`connected`, stop **test** Reverb with
`docker compose -f compose.test.yaml stop reverb`. After `polling_verified`, run
`docker compose -f compose.test.yaml up -d reverb`. The test checks recovery on
the same pages and writes `complete`. Do not act on a stale phase from an earlier
run; confirm its modification time and the current test progress. Always restore
test Reverb on failure. Do not stop development or unrelated services.

Browser traces contain synthetic credentials and remain private. If the password
test is interrupted between changing and restoring its fixture password, the
guarded `tests/Support/restore-fixture-password.php` helper restores only the
designated synthetic test account from its private generated credential file.
It refuses non-test targets; it is not a development-account password reset tool.

## Backup and restore rehearsal

Use matching PostgreSQL 18 client tools **inside the PG container**. Keep app keys
and environment secrets backed up separately, access-restricted. A named volume
is not an independent backup. Dumps include hashes, tokens and private evidence.
Store outside Git under the workspace `snapshots/` with mode0600; encrypt and
control access before any real-data backup leaves the machine.

The exercised rehearsal uses only `qguard_test` and a newly created
`qguard_restore_<unique_suffix>` in the disposable test PG service. Stop test
worker/scheduler and all test traffic first. Use `tests/Support/database-fingerprint.php`
before backup, after restore and again on source: table counts/content digests
must match. That helper reads isolated targets only and never prints row bodies.

```sh
docker compose -f compose.test.yaml stop scheduler worker
docker compose -f compose.test.yaml run --rm php tests/Support/database-fingerprint.php
docker compose -f compose.test.yaml exec -T postgres pg_dump -U qguard_test -d qguard_test -Fc -f /tmp/qguard-first-pass.dump
# Choose a NEW explicit restore name; createdb fails if it already exists.
docker compose -f compose.test.yaml exec -T postgres createdb -U qguard_test qguard_restore_UNIQUE
docker compose -f compose.test.yaml exec -T postgres pg_restore -U qguard_test -d qguard_restore_UNIQUE --no-owner --exit-on-error /tmp/qguard-first-pass.dump
docker compose -f compose.test.yaml run --rm -e DB_DATABASE=qguard_restore_UNIQUE php tests/Support/database-fingerprint.php
docker compose -f compose.test.yaml run --rm -e DB_DATABASE=qguard_restore_UNIQUE php tests/Support/restore-smoke.php
```

Replace UNIQUE with a lowercase distinct suffix. Copy the dump from the exact test
Postgres container into the workspace snapshot folder and restrict its permissions.
Do not restore over source or use `--clean`. The smoke helper renders dashboard,
restored room and feedback through Laravel's HTTP kernel with a synthetic login
and array session, not a schema-only comparison. It refuses the source DB.
No old backup/restore copy is automatically deleted. Later cleanup needs scoped
authorization; the rehearsal target vanishes naturally when test tmpfs is recreated.

## Migrations and rollback

Current migrations are additive. Use explicit `php artisan migrate --force` only
on the intended target, after checking status and backup. Keep the preceding
image and migration record. Reverting code is safe only if the schema remains
compatible; prefer forward fixes. Do not automatically call migrate:rollback,
fresh, or destroy a volume on persistent development/production.

Test RefreshDatabase has a positive environment/host/database/user/flag guard.
Its reset is scoped to disposable qguard_test. Browser clock changes are private
test files, not routes; reset the clock only with the test scheduler/worker stopped,
then begin a fresh suite. Within a browser run, time only advances. Test data and
the normal development database never share a schema or credential.

## Known first-build boundaries

No real game observation, verified rank/account integration, live Discord, join
links or recording. Reports are allegations; two-party collusion, false no-shows,
self-acknowledgment abuse and early session-end deadline abuse are not solved.
Private reputation is not a conduct guarantee. Aggregate team snapshots remain
visible under DEC-052; individual received ratings/authors do not.

Matching uses a global correctness fence and bounded best-current search, not a
global queue-packing optimizer. Early choices can leave only incompatible party
sizes waiting; later arrivals are needed. The synthetic load report is not a
production capacity promise. One late-evidence entry per actor/target/category is
immutable in this pass, with explicit error on attempts to replace it.

The [actual data inventory](../project-docs/operations/first-build-data-inventory.md)
is the required immediate next owner review, not authorization to purge or launch.

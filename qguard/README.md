# QGuard local development

Fresh Laravel application isolated from the legacy app at the repository root.
The approved scope is in [the first pass specifications](../project-docs/specs/first-pass/README.md).
Run every command below **from this qguard directory**, never the root legacy
Compose project. All PHP runs in Docker. This is not approved for public users.

## First setup

Accounts, parties, matching, private session chat, feedback, honor and cleared-admin
review are available. The [local acceptance checks](../project-docs/planning/first-pass/verification-results.md)
have passed; owner flow/data review remains before any later release work.
After migration, opt in to fictional demo accounts with
`docker compose exec -T app php artisan qguard:seed-demo --confirm-synthetic`.
Generated credentials are in `storage/app/private/demo-credentials.json` (ignored,
mode 0600). The local mail inbox is http://localhost:8123. Never share real credentials.

```sh
node scripts/init-env.mjs
docker compose build app
docker compose run --rm --no-deps app composer install --no-interaction
docker compose run --rm --no-deps node ci --ignore-scripts
docker compose run --rm --no-deps node run build
docker compose up -d postgres app nginx mail
docker compose exec app php artisan migrate --force
docker compose up -d worker scheduler reverb
```

Open http://localhost:8120. Local mail is at http://localhost:8123; nothing is
sent to real addresses. PostgreSQL has no host port. `.env` is generated once,
ignored by Git and contains independent random dev/test secrets. Back it up
securely; rerunning the initializer preserves it. Never paste it into reports.
Domain features are enabled only as their implementation stages pass.

## Persistence and safe lifecycle

Development data uses the named `qguard-dev-postgres` volume at
`/var/lib/postgresql`. Normal rebuild/recreate reuses it. Container storage is
not the database's sole copy, but a named volume is still not a backup.
No migration or seeder runs automatically at startup. Use `docker compose stop`
to stop only QGuard. Do not destroy volumes or run destructive development
migrations. Recreate only these scoped services with
`docker compose up -d --force-recreate postgres app nginx`; verify health afterward.

## Isolated checks

The test Compose project defaults to `qguard-test-local`. It uses its own
`qguard_test` PostgreSQL database, temporary database storage, separate runtime
storage, credentials and port 8121. Set `QGUARD_TEST_RUN_ID` when using an
independent parallel run; override ports too if starting multiple browser stacks.
Tests assert the explicit test environment, database/user/host and reset flag
before any framework reset. Never point tests at persistent development data.

```sh
docker compose -f compose.test.yaml up -d postgres app nginx
docker compose -f compose.test.yaml run --rm php artisan migrate --force
docker compose -f compose.test.yaml stop scheduler worker
docker compose -f compose.test.yaml run --rm php tests/Support/reset-browser-clock.php
docker compose -f compose.test.yaml run --rm php vendor/bin/pest
docker compose -f compose.test.yaml run --rm php vendor/bin/phpunit --testsuite Unit
docker compose -f compose.test.yaml run --rm php vendor/bin/pint --test
docker compose -f compose.test.yaml run --rm php artisan qguard:seed-demo --confirm-synthetic
docker compose -f compose.test.yaml up -d app nginx mail reverb scheduler worker
docker compose -f compose.test.yaml run --rm browser
```

The browser image and runner version must match. Tests exercise the real app,
not standalone mock pages. Browser artifacts are ignored; durable results and
remaining criteria belong in the [implementation evidence](../project-docs/planning/first-pass/implementation-evidence.md).
Backend tests reset only the guarded disposable database. Stop its scheduler and
worker first; reset the test clock, reseed and restart before browser checks. The default seeder refuses
implicit accounts. Browser time controls exist only in the isolated testing stack,
with no public HTTP endpoint and no effect on development or production.

Chromium runs the full suite; Firefox/WebKit run the core account→room→feedback
smoke. The full suite is ordered because its multi-player scenarios share fictional
fixtures. Stop on the first failure and start from a fresh guarded backend reset
before claiming a complete rerun. Within one run, simulated time only advances.
The [operational runbook](OPERATIONS.md) covers status, image builds, backup/restore,
release gates and known limitations.

## Try the local build

Use separate browser profiles/private contexts for five fictional users `a`–`e`
from the private generated credential file. Each starts a party, selects I'm ready
and Find teammates. Open the matched room, check rank/honor snapshots, send text,
then select Session ended and give optional feedback or Skip. The first finalized
submission starts ten minutes; all five finalizations close early. No game is
actually launched. Use `admin` in a separate context for Human review. Two distinct
reports against a rater invalidate only that rater's outgoing numeric inputs;
reviewing a report does not apply a penalty.

The seeder does not reset ongoing demo sessions; end them normally before reusing
those users. `unverified`, `unranked` and `observer` demonstrate access/setup gates.
Do not expose the local mail inbox, credentials or raw test traces externally.

## Current boundaries

No host PHP repair, legacy code/data import, real Riot/Discord credentials,
automatic game joining, public release, push or deployment. Production web
collection is denied unless explicitly enabled under a later release approval.
An image or a passing local test does not supply that approval.

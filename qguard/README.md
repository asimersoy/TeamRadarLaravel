# QGuard local development

Fresh Laravel application isolated from the legacy app at the repository root.
Current work follows the [review-version specification](../project-docs/specs/review-version/README.md)
and [implementation contract/evidence](../project-docs/planning/review-version/backend-implementation.md).
The first-pass engine is retained as historical implementation evidence.
Run every command below **from this qguard directory**, never the root legacy
Compose project. All PHP runs in Docker. This is not approved for public users.

## First setup

For the portable, fictional Riot reviewer artifact, use the
[submission package](../project-docs/planning/riot-submission/README.md). It needs
no application/background services. Its browser checks use
`playwright.riot-review.config.ts` against the generated static site in a temporary
Docker browser container. This does not enable real registration or matchmaking.

Registration remains open. `/guest#welcome` serves the approved fictional
walkthrough, with tab-scoped state and no provider/business writes. Its own
reset affects only that tab. Normal queue admission and background formation
are disabled until the later RSO slice; typed identities cannot bypass this.
The review-version backend implements shared session closure, immutable required
feedback, immediate score applications, private descriptors, 20-second acceptance,
code relay and discrepancy checks. New sessions use `review-v2`; retained older
sessions preserve their old rules. Owner [privacy/retention/launch review](../project-docs/operations/review-version-data-inventory.md)
records the current dispositions: disposal implementation is deferred until after
RSO; hosting/email/operator/final policies remain before external delivery. Live
RSO and Discord remain separate work.
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

**Idle-machine policy (DEC-095):** do not leave workers, the scheduler or unused
Reverb running between active development/tests. After the relevant run, use
`docker compose stop worker scheduler reverb` with the **same Compose files and
project identity used to start that run**, then verify they stopped. For an
existing custom preview, inspect its container names instead of starting or
stopping the default project by mistake. Start only the services needed for the
next active check. Preserve the preview and database volumes. Background matching,
deadline processing and queued notifications pause while their services are stopped;
stored wall-clock deadlines still elapse.

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
remaining criteria belong in the [implementation evidence](../project-docs/planning/review-version/backend-implementation.md).
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

## Review-version backend walkthrough and verification

After the default suite, stop test workers and reset only the guarded disposable
test target before another scenario. `tests/Support/review-migration-check.php`
explicitly checks that target, creates a populated historical schema, upgrades
it and verifies unchanged honor plus a no-op second migration. Reset the browser
clock and seed synthetic users again before browser tests.

```sh
docker compose -f compose.test.yaml stop scheduler worker
docker compose -f compose.test.yaml run --rm php tests/Support/review-migration-check.php
docker compose -f compose.test.yaml run --rm php tests/Support/reset-browser-clock.php
docker compose -f compose.test.yaml run --rm php artisan qguard:seed-demo --confirm-synthetic
docker compose -f compose.test.yaml -f compose.review-test.yaml up -d app nginx mail reverb scheduler worker
docker compose -f compose.test.yaml -f compose.review-test.yaml run --rm browser --config=playwright.review.config.ts
```

Use an explicit port override if 8121 is occupied; the verified local preview uses
loopback port 55000, preserving the unrelated service on 8121. The optional
review overlay requires the isolated testing environment and database. Never use
it for persistent development, a real-user service or a production deployment.
The **default backend suite** runs without that overlay: its review tests enable
the new engine individually while historical compatibility tests keep the old one.

Five independent fictional accounts create parties, confirm sample ranks and
queue. All accept within 20 seconds, then land in the same room. The host enters
a game-supplied code; the others copy it. This test does not prove the code works
in VALORANT. Each acknowledges the roster. Three end requests or five minutes
from the first close the session. History then requires each eligible teammate
card before queueing again. Optional sliders stay omitted unless touched; sent
cards cannot change. Profiles show each private trait only after three distinct
eligible reviewers. Admin case reads are audited and reveal the restricted evidence.

The current guest walkthrough stays independent of these backend fixtures. It is
a presentation route for reviewers, not an alternative authentication identity.

## Historical engine walkthrough (isolated regression tests only)

Use **Matchmaking** (`/dashboard`) for parties, queueing and the **Your connections**
friends sidebar. Add friends by QGuard handle, accept their requests and use their
Invite button when you lead an idle party. **Profile & settings** (`/profile`)
contains the game profile, public handle and account security, and remains
accessible while matched. Saving a game profile clears party readiness and cancels
a waiting queue; existing matched-roster snapshots do not change.

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

## Review bundle and tests

From the repository root, regenerate both the design and application copies:

```sh
python3 project-docs/design/qguard-review/build-standalone.py
python3 project-docs/design/qguard-review/build-standalone.py --check
```

The production Dockerfile includes `resources/review/`; do not hand-edit its
HTML. `/guest` sets a CSP that prevents network connections and form submission.
The historical engine is available only when the test Compose flag is set and
`EnvironmentSafety` verifies the disposable testing database. Setting the flag
in local/production cannot enable normal matching. New backend policies are
not inferred from that historical test suite.

`tests/Feature/ReviewEntryTest.php` covers guest/real-user boundaries and queue
bypass attempts. `tests/Browser/guest-review.spec.ts` covers the real guest entry
and synthetic policy walkthrough in Chromium, Firefox and WebKit. This is
presentation evidence for new session/feedback rules, not their backend proof.

## Current boundaries

The real application supports English and Turkish using the interface selector.
This session preference is independent of the player's communication language.
User messages, handles, game codes and raw admin evidence are never translated.
The standalone guest/design catalog remains an English review artifact, explicitly
labeled at entry. Registration displays 18+; it does not collect DOB/ID or claim
verified age. Final policy pages await the owner’s fifth discussion.

At most one account may have admin clearance, enforced by a PostgreSQL partial
unique index. `php artisan qguard:assign-super-admin USER_ID` inside the appropriate
app container assigns an existing email-verified account and records the assignment.
It refuses replacing another administrator. Never infer the owner from first signup;
actual owner provisioning requires an identified account. See OPERATIONS.md.

Review browser tests use five independent accounts. Chromium/Firefox render those
flows at 1440px; WebKit uses 1280×720 on the local 4 GiB Docker VM and captures
screenshots after releasing unused renderers. A fresh scheduler may need its first
minute boundary before forming an offer; the 20-second acceptance period still
starts only when the offer exists. Dashboard/current-session polling remains
active in background tabs while the browser runs; suspended/offline browsers
cannot be guaranteed timely delivery.

No host PHP repair, legacy code/data import, real Riot/Discord credentials,
automatic game joining, public release, push or deployment. Production web
collection is denied unless explicitly enabled under a later release approval.
An image or a passing local test does not supply that approval.

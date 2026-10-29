# Initial Cloud deployment

**Task:** QG-CLOUD-DEPLOY-1. **Date:** 2026-10-30. **Owner:** project owner.
**Status:** branch published; full backend setup authorized up to $50/month by
DEC-101, concrete Cloud configuration and verification in progress.
**Baseline:** `new-development` at `5541b36`, clean before this record.
**Authority:** latest owner explicitly authorizes committing/pushing the branch,
setting up Laravel Cloud and pointing the existing domain to it through DNS.
DEC-100/101 record the precise limits. Update on budget answer, provider changes,
deployments, DNS verification or rollback.

## Route and allowed actions

Mandatory entry and current registers reviewed; use product planning, code,
research, commercial recommendation, privacy/data, content, external owner
review, deployment/backup/rollback and interruption/recovery, with existing
project governance. No delegation. Runtime verification uses Docker when local.

1. Inspect and publish the existing branch without force/history rewriting.
   The GitHub connector resolves the old origin owner to the same repository
   now named `asimersoy/TeamRadarLaravel`; the repository is public.
2. Configure the QGuard application from `qguard/` or a deliberately isolated
   reviewer deployment artifact, never the old Laravel application at repo root.
3. Prefer Starter if suitable. DEC-101 explicitly authorizes up to **$50/month
   for the full backend**, including the earlier approximately $39 estimate.
   Configure billing controls and safe idle scaling within that scope.
4. Connect the existing `q-guard.team` domain only to the verified Cloud target.
   Preserve registrar lock, account ownership, nameservers, unrelated DNS and
   existing protection. Never unlock, transfer, request a transfer code, remove
   the zone or delete the domain.
5. Existing normal-use/RSO and final-policy gates remain. The instruction does
   not submit to Riot, activate real matchmaking or approve unreviewed final
   notices. Resolve an artifact/public-access conflict before exposing it.

No provider tokens or payment/registrant details belong in Git or public output.
Use the existing signed-in browser sessions; do not create broad API credentials.

## Observed preflight

- Local working tree was clean; current implementation and hosting records were
  already committed. GitHub read confirms `new-development` is absent;
  remote `master` is `3822e6159377304432834ddbafd7ffca90d3a0fa`.
- Tracked files include only `.env.example` files, not real `.env` files or
  private key/database files. A bounded pattern scan of 697 tracked files and
  1,322 new-history blobs found no matching private-key, AWS access-key, GitHub
  token, Riot-key or Stripe-secret patterns. This is not exhaustive secret proof.
- Cloud's existing GitHub connection sees this repository, but currently offers
  its legacy root/directories because the new branch is not published yet.
  No application has been created by this task.
- Cloudflare lists one domain, `q-guard.team`, registered at Cloudflare, active,
  with auto-renew enabled. Transfer-out **Unlock** is disabled because the domain
  is under the initial 60-day lock; moving accounts is also currently disabled.
  WHOIS redaction is enabled. These controls were inspected, not changed. This
  establishes present protection, not a promise nobody could ever unlock it.
- DNS records, DNSSEC final status and Cloud resource/billing settings still
  require inspection. No DNS or paid resource mutation has occurred.
- The owner clarified the cost boundary under DEC-101: full backend authorized
  up to $50/month. The earlier pending cost question is resolved.
- Normal non-force push published `new-development` at `1623fe7`; GitHub confirmed
  creation and upstream tracking. Origin now uses the verified canonical owner
  `asimersoy` after GitHub returned its repository-moved notice.
- DNS Records shows zero existing records. No web/mail records need replacement.

## Verification and recovery contract

Before push: inspect branch/history and scoped documentation changes; verify
remote target/ref, use a normal non-force push, then compare remote head to local.
No automatic rollback deletes a published branch or rewrites it; correct additively.

Before provisioning: record exact plan, region, application root/build/serve
configuration, branch/commit, resource estimate, billing alerts/limits and public
access boundary. Use the minimum services for the chosen artifact. Do not enable
automatic deployment of unrelated future branch pushes without reviewing it.

Before DNS changes: capture existing records, add only exact verification/origin
records supplied by Cloud, preserve mail and unrelated entries, and verify HTTPS
on the Cloud URL first. Domain transfer protection is unrelated to website DNS
pointing and must stay in force throughout. Configure only required hostnames.

After deployment: verify actual revision, build and health, HTTPS/certificate,
domain routing, public-access restrictions, absence of secrets/test accounts,
security headers and the intended rendered journey. Inspect active resources and
billing settings. No runtime or hosted capacity check has happened yet.

On a failed deployment keep the domain on its preceding target; do not point it
to a broken service. After a DNS change, restore only this task's changed records
to the captured values if needed, preserving all other state. Stop accidental
billable compute if it breaches the authorized configuration; do not delete a
database or domain. Database migrations/restore require their own scoped checks
if a database is part of the final authorized configuration.

## Current evidence and next action

Branch publication is complete and remote head `1623fe7` was independently
verified with `ls-remote`. Cloud's empty QGuard application exists in Frankfurt;
PostgreSQL and Reverb resources are created as detailed below. No deployment,
database migration, DNS edit, transfer or public launch has occurred yet.
Branch is `new-development`, PHP 8.5 and Node 24. Push-to-deploy is disabled so
future commits do not implicitly deploy. Cloud initially selected the legacy
repository root; this must be corrected before deployment.

Bounded implementation under the deployment instruction: add an explicit
`QGUARD_HOSTED_REVIEW_ONLY` mode. It serves only the existing fictional guest
walkthrough and health check before web session handling, rejects application
and mutation routes, and does not authorize real accounts. Keep production/debug
and test-engine safeguards intact. This applies existing review/collection
policy rather than approving launch or final policies.

Targeted Docker tests on independent `qguard-test-cloud-20261030` passed (7 tests,
61 assertions): hosted access, no accounts/database sessions/cookies, blocked
registration/Livewire/broadcasting, normal production closed, and existing guest
and queue boundaries. No existing preview data was reset.

Automatic approval review blocked the Cloud environment editor's **Reveal
secrets** control because it reveals the generated APP_KEY. Specific permission
to open it while preserving/redacting that key was requested; no credential was
revealed or changed. Continue independent setup while that request is pending.

Next: correct the application root, configure and verify resources/billing under
the approved $50 boundary, then point DNS after Cloud health/HTTPS and access
checks. The latest provider state and test results supersede the earlier
preflight observations above.

### Billing safeguard and import limitation

- Existing account is already on **Starter** with a payment method. No plan
  upgrade or payment-method change was made. A **$40 spending limit with Stop
  compute** was saved and reopened to verify persistence. This deliberately
  leaves headroom beneath the owner's $50 authorization; the UI defines its
  amount before credits. It is not an exact final-invoice guarantee: taxes,
  in-flight work and preserved storage can add charges. Cloud alerts at
  50/80/90/100 percent and resumes compute next billing cycle. See official
  [spending limits](https://laravel.com/cloud/docs/spending-limits) and
  [taxes](https://laravel.com/cloud/docs/taxes), checked 2026-10-30.
- Proof outside Git: `../outputs/cloud-deployment-20261030/spending-limit.png`.
- Fresh repository import still shows only `master` directories and has no
  branch selector or arbitrary path field. The created app's directory field
  is disabled. Requested permission for a temporary GitHub default-branch switch
  to `new-development`, importing `qguard/`, restoring `master`, and deleting
  the empty, never-deployed Cloud configuration. No Git history/project data would
  be deleted. That request is pending; no default-branch change/deletion occurred.
- PostgreSQL 18 is offered in Frankfurt. Prepared configuration is fixed 0.25
  compute units, sleep after 300 seconds, 1-day PITR, up to $19.35/month compute
  plus $0.50/GB-month storage and backups. Creation confirmed in the resource
  list as `qguard-postgres`, PostgreSQL 18, Frankfurt, 0.25 units, scale to zero,
  one database. It is not yet attached to an application or migrated. Proof:
  `../outputs/cloud-deployment-20261030/postgres-created.png` (outside Git).
- App sub-minute scheduled tasks would keep the application awake; database
  polling also prevents database sleep while active. Do not promise idle savings
  while those processes run. See [Cloud scheduling](https://laravel.com/cloud/docs/scheduled-tasks).
- Created `qguard-reverb` in Frankfurt with 100 maximum concurrent connections
  for $5/month. Resource list confirms Laravel Reverb and one logical WebSocket
  application; this is not an environment attachment or integration test. Proof:
  `../outputs/cloud-deployment-20261030/reverb-created.png` (outside Git).
- No app deployment exists, so no Cloud app worker or scheduler has started.
  Database is empty/unattached and may sleep after its configured idle interval.
  Reverb's fixed resource charge remains even with no player activity.
- Final scoped checks: 7 tests/61 assertions pass after the read-method
  restriction, Pint passes all four changed PHP files. The disposable
  `qguard-test-cloud-20261030-postgres-1` was stopped after checks. No local worker
  or scheduler was started; existing previews and persistent volumes preserved.

### Remaining actions, not completed

Both explicit permission requests remain unanswered at this checkpoint. Do not
interpret silence as permission. After answers, correct/import the `qguard/`
directory, preserve the app key while adding non-secret runtime safeguards,
attach the existing database/Reverb resources (do not create duplicates), size
the app at the authorized 1 GiB tier, and configure/test shared worker/scheduler
behavior. Then commit/push any necessary bounded fixes, deploy and verify the
Cloud URL before adding exact DNS records for `q-guard.team`. Verify TLS, access
restrictions, actual resource cost and transfer lock; record all outcomes.

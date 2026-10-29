# Initial Cloud deployment

**Task:** QG-CLOUD-DEPLOY-1. **Date:** 2026-10-30. **Owner:** project owner.
**Status:** authorized preparation and branch publication; hosting execution awaits
the clarified cost/artifact boundary and concrete configuration checks.
**Baseline:** `new-development` at `5541b36`, clean before this record.
**Authority:** latest owner explicitly authorizes committing/pushing the branch,
setting up Laravel Cloud and pointing the existing domain to it through DNS.
DEC-100 records the precise limits. Update on budget answer, provider changes,
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
3. Prefer Starter if suitable. Until clarified, treat the owner's latest
   **maximum $20 on Laravel Cloud** as the total recurring limit, rather than
   permission to provision the earlier ~$39 full-backend configuration.
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
- Asked the owner whether $20 covers total usage or only the subscription;
  the full-backend estimate and cheaper reviewer-only alternative were stated.

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

Preflight is read-only apart from this documentation. No Cloud provisioning,
purchase, DNS edit, transfer or public launch has occurred. Next: publish the
verified branch, inspect DNS/current Cloud configuration and resolve the pending
cost/artifact choice before committing paid resources.

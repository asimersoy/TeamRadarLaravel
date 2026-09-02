# Deployment, Backup, And Rollback

## Trigger

Use for environment setup, provider handoff, deployment, production readiness,
backups, restore tests, rollback, release, or destructive maintenance.

## Prescriptive Handoff

The runbook defines the required architecture and acceptance behavior. The
deployment operator returns `PASS`, `EXCEPTION`, or `NOT YET APPLICABLE` with
evidence. They must report before substituting a materially different service,
architecture, region, security control, or data flow.

## Required Runbook Sections

- exact commit and target environment;
- architecture and service inventory;
- secrets and access boundaries;
- domain, TLS, network, and mail requirements;
- storage, logging, monitoring, and retention;
- migration and data-authority rules;
- backup contents, method, encryption, location, checksums, and retention;
- restore and rollback commands, triggers, owner, and verification;
- release checks and collection/publication gates.

## Workflow

1. Verify environment and provider facts against the runbook.
2. Create a consistent pre-change snapshot without copying a live data store
   unsafely.
3. Verify checksums and restoration in an isolated environment.
4. Apply migrations or deployment using the approved sequence.
5. Verify health, routes, permissions, data counts, media, mail, logs, and
   security controls.
6. Enable public data collection or publication only when its separate gates
   pass.
7. If a rollback trigger occurs, preserve the failed state, restore using the
   tested method, and verify recovery.

## Boundaries

No release approval implies permission to rewrite Git history or perform later
remote actions. Never destroy volumes, databases, backups, secrets, or remote
state through an undocumented shortcut.

## Completion Evidence

Record the operator report, exceptions, exact deployed revision, migration
state, snapshot manifest, restore evidence, verification results, rollback
readiness, public gates, and owner approval.

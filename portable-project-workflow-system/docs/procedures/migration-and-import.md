# Migration And Import

## Trigger

Use for seeders, importers, schema migrations, data transformation, source-to-
database synchronization, or content reconciliation.

## Safety Contract

Define before execution:

- authoritative source and target;
- stable record identity;
- allowed inserts, updates, skips, conflicts, and protected records;
- fields and relationships that must be preserved;
- draft/publication behavior;
- dry-run, overwrite, production, and rollback controls;
- transaction and backup requirements.

## Workflow

1. Validate the complete source set before any write.
2. Run against an isolated disposable target first.
3. Produce a dry-run plan with record-level changes and blockers.
4. Investigate differences; never use an overwrite flag merely to bypass an
   unexplained conflict.
5. Back up the real target and verify the backup.
6. Obtain explicit authorization for the target environment and write.
7. Apply transactionally where the data store permits.
8. Run the same plan again and require idempotence.
9. Reconcile each source record, field, relationship, and protected state.
10. Render representative and protected records when the data drives UI.

## Production Boundary

Production writes require a distinct explicit acknowledgement. Published,
approved, soft-deleted, user, authentication, and other protected records must
not be overwritten unless the approved contract says exactly how and why.

Once real users or production data exist, preserve historical records through
versioning, migrations, retirement states, archival, or soft deletion where
appropriate. Hard deletion, destructive overwrite, identity reuse, or loss of
audit history requires explicit owner authorization, a verified recovery path,
and immediate reconciliation.

## Completion Evidence

Record source and target revisions, backup, dry-run totals, authorization,
transaction result, idempotence result, reconciliation differences, rendered
checks, rollback test, and residual conflicts.

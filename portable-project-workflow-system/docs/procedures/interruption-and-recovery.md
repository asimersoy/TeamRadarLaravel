# Interruption And Recovery

## Trigger

Use when work is paused, interrupted, compacted, handed over, resumed after a
client/update failure, or committed as an incomplete checkpoint.

## Checkpoint

Before an intentional stop, record:

- objective and route;
- exact completed, in-progress, and untouched units;
- files changed and repository status;
- commands run and results;
- running processes or services;
- uncommitted and committed state;
- decisions made, blockers, and pending approvals;
- exact next actions and verification commands;
- whether the checkpoint is safe to resume.

If the stop was unplanned, reconstruct this from repository state and logs
before editing further.

The ignored `.codex-local/current-task.md` file may preserve volatile execution
details between contexts, but it cannot replace this tracked checkpoint when a
decision, blocker, approval, deferred item, handoff, or completion claim must
survive outside the local machine.

## Resume Audit

1. Read the mandatory entry path and newest owner request.
2. Inspect status, diff, recent commits, and current-state records.
3. Check that expected files and running services are intact.
4. Reconcile checkpoint claims with actual repository state.
5. Identify partial writes, duplicated reports, missing validation, or stale
   assignments.
6. Re-run the route if scope or risk changed.
7. Continue from the first unverified step, not from memory.

## Report Reconciliation

Do not delete or rewrite an inaccurate historical report. Append or create a
correction that states the discrepancy and current repository truth.

## Completion Evidence

Record recovery findings, corruption or no-corruption conclusion, repaired
state, re-run checks, current worker, next action, and checkpoint commit when
one exists.

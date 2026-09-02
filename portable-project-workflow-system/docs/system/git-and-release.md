# Git And Remote Operations

## Applicability

Apply the Git-specific rules when the project uses Git. Projects without Git
must still use durable versioned checkpoints and the same explicit gates for
remote, destructive, publication, release, and production actions.

## Local History

- Use additive commits for coherent, reviewed units.
- Do not amend, rebase, squash, reset, force-push, or otherwise rewrite history
  without the owner's exact explicit authorization for that operation.
- Never discard or revert changes that were not created by the current task
  unless the owner explicitly asks.
- A correction to an earlier commit is a new commit by default.

## Commit Gate

Before committing:

1. inspect status and the complete diff;
2. confirm unrelated changes are excluded;
3. run the applicable tests and documentation checks;
4. update current state, decisions, queues, and reports as needed;
5. record any unrun checks or known residual risk;
6. use a message that describes the completed unit.

Incomplete work may be committed only when the owner requests a checkpoint or
handoff commit. Such a commit must be labeled clearly and accompanied by a
resume checkpoint naming exact unfinished work.

## Remote Gate

No push, pull that changes local state, branch publication, pull request,
release, deployment, tag, or remote configuration change is allowed without a
separate explicit owner instruction. Approval to commit is not approval to
push. Previous push approval does not authorize later pushes.

## Destructive Operations

Before any destructive Git or filesystem operation:

- explain the exact effect and recovery path;
- create or verify an appropriate snapshot when material data is involved;
- obtain explicit owner approval;
- verify the result immediately afterward.

Treat production data history as protected state. A code commit, migration
approval, or release approval does not by itself authorize destructive data
cleanup or removal of historical records.

## Release Evidence

A release or deployment record must identify the exact commit, target
environment, configuration assumptions, migration and backup status,
verification results, rollback trigger, rollback steps, and approving owner.

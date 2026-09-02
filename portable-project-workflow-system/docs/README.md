# Documentation Entry Point

This directory is the canonical operating record for the project. Start here
after reading the root `AGENTS.md`.

## Mandatory Reading

1. [Task routing checklist](system/task-routing-checklist.md)
2. [Current state](current-state.md)
3. [Decisions](decisions.md)
4. [Open questions](open-questions.md)
5. [Deferred work](deferred-work.md)
6. Every procedure selected by task routing

## Always-Applicable System

- [Documentation policy](system/documentation-policy.md)
- [Workflow and review](system/workflow-and-review.md)
- [QA and completion](system/qa-and-completion.md)
- [Git and remote operations](system/git-and-release.md)
- [Workflow coverage](system/workflow-coverage.md)

## Procedure Directory

- [Product planning](procedures/product-planning.md)
- [Code and implementation](procedures/code-and-implementation.md)
- [Agent delegation](procedures/agent-delegation.md)
- [Content lifecycle](procedures/content-lifecycle.md)
- [Research, sourcing, and search](procedures/research-sourcing-and-search.md)
- [Decision and recommendation safety](procedures/decision-and-recommendation-safety.md)
- [Privacy, data, and legal review](procedures/privacy-data-and-legal.md)
- [External review](procedures/external-review.md)
- [Design and rendered review](procedures/design-and-rendered-review.md)
- [Audit and reconciliation](procedures/audit-and-reconciliation.md)
- [Migration and import](procedures/migration-and-import.md)
- [Deployment, backup, and rollback](procedures/deployment-backup-and-rollback.md)
- [Experiments](procedures/experiments.md)
- [Interruption and recovery](procedures/interruption-and-recovery.md)
- [Deferral and owner review](procedures/deferral-and-owner-review.md)

## Record Semantics

- A **decision** is settled until explicitly superseded.
- An **open question** lacks a decision and names what it blocks.
- **Deferred work** has a decision but awaits a return condition.
- A **queued plan** is ordered or possible work, not authorization.
- A **completion report** proves only the scope and evidence it names.
- A **historical record** cannot determine the current worker, workflow,
  approval, target, or next action.

## Where New Information Belongs

- Current operational facts: `current-state.md`
- Material approved choices: `decisions.md`
- Missing choices: `open-questions.md`
- Decided but postponed work: `deferred-work.md`
- Reusable rules: `system/` or a routed `procedures/` file
- One-off plans, specifications, review packets, and reports: create a clearly
  named project-record location using `templates/`
- Completed or superseded evidence: `history/`

Do not create an unlinked note that becomes a second source of truth.

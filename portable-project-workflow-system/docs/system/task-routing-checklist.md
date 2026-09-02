# Task Routing Checklist

Complete this checklist before substantive work. Read every procedure selected
by a `yes` answer. More than one procedure may apply.

## Always Read

- [Documentation policy](documentation-policy.md)
- [Workflow and review](workflow-and-review.md)
- [QA and completion](qa-and-completion.md)
- [Git and remote operations](git-and-release.md)
- [Current state](../current-state.md)

## Conditional Routes

| Question | If yes, also read |
| --- | --- |
| Does the task establish product scope, requirements, architecture, or completion criteria? | [Product planning](../procedures/product-planning.md) |
| Does the task change application code, configuration, tests, dependencies, scripts, or infrastructure as code? | [Code and implementation](../procedures/code-and-implementation.md) |
| Will any work be delegated to another agent or external system? | [Agent delegation](../procedures/agent-delegation.md) |
| Does the task create or change public-facing content, labels, metadata, or structured editorial records? | [Content lifecycle](../procedures/content-lifecycle.md) |
| Does it research factual claims, sources, search intent, keywords, competitors, or generative-search behavior? | [Research, sourcing, and search](../procedures/research-sourcing-and-search.md) |
| Can user inputs, rules, scores, models, or commercial factors affect recommendations, eligibility, ranking, safety messaging, or user decisions? | [Decision and recommendation safety](../procedures/decision-and-recommendation-safety.md) |
| Does it collect, store, transmit, analyze, delete, or expose personal or sensitive data, or make legal/compliance claims? | [Privacy, data, and legal review](../procedures/privacy-data-and-legal.md) |
| Does it require owner, subject-matter, clinical, safeguarding, legal, commercial, security, or other external review? | [External review](../procedures/external-review.md) |
| Does it create visual direction, a design handoff, UI copy in context, or rendered-page review? | [Design and rendered review](../procedures/design-and-rendered-review.md) |
| Is it an audit, reconciliation, corpus-wide check, regression review, or evidence-only assessment? | [Audit and reconciliation](../procedures/audit-and-reconciliation.md) |
| Does it import, migrate, seed, transform, or reconcile structured data? | [Migration and import](../procedures/migration-and-import.md) |
| Does it affect deployment, environment configuration, backups, restoration, rollback, or production readiness? | [Deployment, backup, and rollback](../procedures/deployment-backup-and-rollback.md) |
| Is it a workflow, quality, cost, or performance experiment? | [Experiments](../procedures/experiments.md) |
| Was work interrupted, compacted, handed over, paused, or resumed? | [Interruption and recovery](../procedures/interruption-and-recovery.md) |
| Is already-decided work being postponed, or is owner review being advanced while implementation waits? | [Deferral and owner review](../procedures/deferral-and-owner-review.md) |

## Route Record

For work lasting more than a trivial edit, record the route in the task plan,
review packet, or handoff:

- task identifier and objective;
- checklist questions answered `yes`;
- required documents read;
- current decisions and records controlling the work;
- required reviewers and stop conditions;
- intended verification and commit boundary.

If the task changes materially, run the checklist again. A new risk or data
flow may select an additional procedure mid-task.

# Workflow Coverage Ledger

Status: current portable-system inventory

## Purpose

This ledger shows which reusable capabilities the package covers. It contains
workflow abstractions only. It imports no product facts, content, routes,
providers, credentials, legal conclusions, technology choices, approvals, or
worker assignments from its source project.

## Coverage Map

| Capability | Canonical destination |
| --- | --- |
| Mandatory bootstrap and authority precedence | `AGENTS.md`, `docs/README.md`, documentation policy |
| Conditional required reading and route records | Task-routing checklist and task-route template |
| Current state and handoff baseline | `docs/current-state.md`, current-state and handoff templates |
| Decisions, open questions, deferred work, and queued plans | Project registers and matching templates |
| Brief, specification, plan, and completion criteria | Product-planning procedure and planning templates |
| Scoped code changes and risk-scaled testing | Code-and-implementation procedure |
| Local service diagnosis and verified restart | Code-and-implementation procedure |
| Supersession, history, and one-source-of-truth rules | Documentation policy and `history/README.md` |
| Delegated-worker authorization, reporting, correction, and QA | Agent-delegation procedure and packet templates |
| Independent QA, evidence levels, and truthful completion | Workflow, QA, and completion system documents |
| Additive Git history and separate remote authorization | Git-and-release system document |
| Content lifecycle, source ownership, batches, and publication gates | Content-lifecycle and research procedures |
| Editorial usefulness, summary density, defensive-copy control, and truthful capability claims | Content-lifecycle procedure |
| Title, slug, route, redirect, and re-review impact | Content-lifecycle procedure and review-impact template |
| Search intent, keyword tools, competitors, and source ledgers | Research-sourcing-and-search procedure |
| Intent ownership, duplication, and cannibalization review | Research procedure and inventory-intent template |
| Sensitive decision, matching, ranking, and recommendation systems | Decision-and-recommendation-safety procedure |
| Privacy, data-flow, provider, and legal evidence separation | Privacy-data-and-legal procedure |
| Qualified and owner review registers | External-review and owner-review procedures |
| Hybrid owner queue and post-review change tracking | Deferral-and-owner-review procedure |
| Evidence-only audits and correction separation | Audit-and-reconciliation procedure and audit templates |
| Mechanical evidence versus editorial or risk judgment | Audit and QA system documents |
| Import, migration, dry run, idempotence, and protected records | Migration-and-import procedure |
| Production-history preservation and destructive-data gates | Migration, deployment, and Git documents |
| Deployment requirements, backups, restore, and rollback | Deployment-backup-and-rollback procedure |
| Immutable snapshots and checksums | Snapshot template and audit/deployment procedures |
| Design delegation and rendered responsive review | Design-and-rendered-review procedure |
| Workflow, tool, quality, cost, and performance experiments | Experiments procedure |
| Interruptions, compaction, checkpoints, and report reconciliation | Interruption-and-recovery procedure |
| Local scratch that cannot become hidden authority | Documentation policy and `.codex-local/README.md` |
| Public-state leakage and representative-data checks | Content, code, design, migration, and QA documents |

## Explicitly Rejected Patterns

- A local ignored note as the only source of a durable decision or blocker.
- A historical worker identity or report selecting the current worker.
- A passing validator being treated as proof of usefulness, safety, or source
  support it did not measure.
- A queued plan, estimate, suggestion, or prior approval self-authorizing work.
- Silent target changes, scope changes, workflow changes, or quality reduction.
- Blanket replacement without checking every occurrence in context.
- Unverified delegated output, destructive data cleanup, remote operations, or
  history rewriting.
- Product-specific facts embedded in reusable system or template files.

## Omission Rule

When a new recurring workflow family is discovered, add it here and route it
from the task checklist before relying on it. A coverage entry documents the
capability; it does not authorize a project change.

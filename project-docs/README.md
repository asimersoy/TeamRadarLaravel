# TeamRadar Project Records

This directory is the canonical home for TeamRadar-specific records. The
reusable workflow system remains separate in
`../portable-project-workflow-system/`.

## Current Phase

The legacy reconstruction is ready for owner acceptance, and current-product
decision framing has begun. The owner must still close or continue the
historical review, then define the rewrite's purpose, permitted-use boundary,
audience, MVP journey, decision/data behavior, and delivery constraints before
an implementation plan can be approved. Everything under `legacy/` describes
historical intent or implementation; it is not a current build specification.

Start with:

1. [Current state](current-state.md)
2. [Decision register](governance/decisions.md)
3. [Open questions](governance/open-questions.md)
4. [Deferred work](governance/deferred-work.md)
5. [Owner decision sequence](planning/rewrite-owner-decision-sequence.md)
6. [Active task route](routes/PLAN-2026-09-03-rewrite-readiness.md)

## Current Planning

- [Rewrite owner decision sequence](planning/rewrite-owner-decision-sequence.md)
- [Rewrite-readiness route and recovery audit](routes/PLAN-2026-09-03-rewrite-readiness.md)

These records organize decisions; they do not approve a product brief,
technical specification, implementation plan, or code change.

## Legacy Reconstruction

### Product

- [Legacy product definition](legacy/product/product-definition.md)
- [Legacy user journeys](legacy/product/user-journeys.md)
- [Legacy feature and scope catalog](legacy/product/feature-and-scope-catalog.md)
- [Legacy matchmaking, honor, and moderation](legacy/product/matching-honor-and-moderation.md)
- [Legacy MVP boundary and roadmap](legacy/product/mvp-boundary-and-roadmap.md)
- [Superseded, rejected, and unresolved ideas](legacy/product/superseded-and-unresolved.md)

### Architecture And Implementation

- [Legacy game integration and relay](legacy/architecture/game-integration-and-relay.md)
- [Legacy system architecture](legacy/architecture/system-architecture.md)
- [Legacy data model, privacy, and security](legacy/architecture/data-privacy-and-security.md)
- [Legacy implementation audit](legacy/architecture/implementation-audit.md)

### Interface And Operations

- [Legacy interface and experience](legacy/operations/interface-and-experience.md)
- [Legacy development, deployment, and operations](legacy/operations/development-deployment-and-operations.md)

## Evidence

- [Source ledger](evidence/source-ledger.md)
- [Legacy chronology](evidence/chronology.md)
- [Contradictions and confidence](evidence/contradictions-and-confidence.md)

## Record Semantics

- **Current decision:** explicit owner choice recorded in
  `governance/decisions.md`.
- **Verified legacy fact:** observed file, behavior, configuration, or Git
  object at the recorded baseline.
- **Memory reconstruction:** a historical claim from the owner-provided dump
  that may or may not have a surviving primary artifact.
- **Historical proposal:** an old plan that did not prove implementation or
  final approval.
- **Rejected/superseded:** a historical approach identified as displaced; it
  has no current authority.
- **Open question:** a present decision gap with a named blocking effect.
- **Deferred work:** approved current work intentionally postponed with a
  return condition. No legacy backlog item becomes deferred work automatically.

## Authority Order

1. latest explicit owner instruction;
2. current records under `governance/` and `current-state.md`;
3. future owner-approved briefs/specifications;
4. routed workflow procedures;
5. legacy reconstructions and implementation evidence;
6. historical proposals, old plans, and templates.

If records at the same authority conflict, stop the affected work and reconcile
them. Do not resolve a conflict by choosing the most convenient implementation.

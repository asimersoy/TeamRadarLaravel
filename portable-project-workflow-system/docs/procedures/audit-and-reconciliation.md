# Audit And Reconciliation

## Trigger

Use for evidence-only reviews, corpus or repository audits, regression checks,
cross-record consistency, and source-to-destination reconciliation.

## Baseline

Before auditing, freeze and record:

- commit or source revision;
- inventory and exclusions;
- file or record counts;
- relevant configuration and validator versions;
- snapshot path and checksums when changes could be material.

Do not edit the audited artifacts during an evidence-only pass.

## Audit Design

1. Define an explicit matrix of rules and evidence required for each rule.
2. Generate mechanical evidence where useful, but keep it separate from
   editorial or risk judgment.
3. Create one report per record or bounded unit.
4. Classify findings as candidate findings until independently reviewed.
5. Reconcile cross-record issues after record-level review.
6. Issue correction packets only after the audit evidence is accepted.
7. Re-run affected checks and final whole-set reconciliation after corrections.

## Outcomes

Use `retain`, `revision-required`, `clean-rewrite-recommended`,
`owner-input-required`, `external-review-required`, or `remove/reject` when the
audit specification allows it. State which authority makes the final decision.

## Boundaries

- A passing structure validator does not prove source support or usefulness.
- A generated finding does not authorize a correction.
- Do not change targets to conceal a failure.
- Preserve pre-fix and post-fix evidence as separate snapshots.

## Completion Evidence

Record baseline identity, inventory, matrix coverage, per-outcome totals,
accepted findings, corrections and commits, unresolved gates, snapshot
verification, and final reconciliation result.

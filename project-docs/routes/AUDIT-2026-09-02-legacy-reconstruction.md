# Task Route: AUDIT-2026-09-02 Legacy Idea Reconstruction

- **Objective:** reconstruct and organize the old TeamRadar product and
  implementation from the supplied dump, legacy app, documents, and surviving
  Git evidence
- **Status:** internal-review-passed; owner review pending
- **Owner:** project owner; primary Codex agent integrates and verifies evidence
- **Started:** 2026-09-02

## Routed Procedures

- Evidence-only repository/corpus audit and reconciliation: yes ->
  `../../portable-project-workflow-system/docs/procedures/audit-and-reconciliation.md`
- Matchmaking, rank, honor, reviews, and weighted votes affected legacy user
  ordering or decisions: yes ->
  `../../portable-project-workflow-system/docs/procedures/decision-and-recommendation-safety.md`
- Account identifiers, session events, reviews, reports, and tokens created
  legacy data/privacy questions: yes ->
  `../../portable-project-workflow-system/docs/procedures/privacy-data-and-legal.md`
- Work was interrupted and materially rerouted after owner clarification: yes
  -> `../../portable-project-workflow-system/docs/procedures/interruption-and-recovery.md`
- New product scope, code, public content, migration, deployment, experiment,
  or delegation: no

## Scope

- **Included:** source inventory; chronology; historical product, journey,
  feature, matching/reputation, architecture, integration, data/security, UX,
  operations, implementation, and unresolved-decision records.
- **Excluded:** approving a new product; current external API/platform research;
  editing legacy artifacts; restoring unreachable commits to a branch; code
  reuse; implementation; deployment; remote action.
- **Dependencies:** baseline commit `7043054`, a 726-line memory reconstruction,
  reachable Git history, and surviving unreachable relay objects.
- **Risks:** granting memory false source certainty, treating code as approval,
  hiding the Apex/Valorant conflict, or letting a legacy stack select the
  rewrite.

## Baseline And Inventory

- Clean baseline: `new-development` at `7043054`
- Counts: 221 tracked files; 72 workflow files and 149 legacy project files
- Recovered relay commits: `402a3f3`, `b1852b7`, `f0006bd`, `5997de0`
- Reviewed: status/history, manifests, Compose/CI, all top-level project docs,
  relevant routes/controllers/models/migrations/views/tests, Apex LiveAPI
  gateway/tap/worker, relay source and builder configuration, and memory dump
- Excluded: `.env`, secrets, generated dependencies/builds, external
  repositories/services, and unrequested current web research
- Snapshot: immutable commit/object IDs provide the evidence baseline; no
  material-data snapshot was needed

## Stop Conditions And Review

- Stop if a claim has no source class, a conflict would be concealed, or a
  historical idea would become new approval.
- Project owner reviews historical interpretation and supplies corrections.
- Future product, platform-policy, privacy, safety, moderation, security, and
  architecture decisions require a separate planning route.
- Commit boundary: `AGENTS.md` and `project-docs/` only; no legacy or workflow
  package changes.

## Verification Plan

- check every internal Markdown link;
- run `git diff --check`;
- inspect the complete diff and path scope;
- confirm the portable workflow package is unchanged;
- re-run targeted Git/source queries for material classifications;
- record unrun checks and residual uncertainty without false closure.

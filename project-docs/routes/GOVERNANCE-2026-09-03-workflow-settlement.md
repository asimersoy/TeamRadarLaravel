# Task Route: GOVERNANCE-2026-09-03 Workflow Settlement

- **Objective:** settle how future workflow changes, TeamRadar-specific
  operating rules, approvals, specifications, owner review, and commits are
  handled before starting current-product decisions
- **Status:** completed
- **Owner:** project owner
- **Started:** 2026-09-03
- **Completed:** 2026-09-04

## Routed Procedures

- Cross-record workflow and governance reconciliation: yes ->
  `../../portable-project-workflow-system/docs/procedures/audit-and-reconciliation.md`
- Explicit owner review of a governance decision: yes ->
  `../../portable-project-workflow-system/docs/procedures/external-review.md`
- Owner review advances while product planning waits: yes ->
  `../../portable-project-workflow-system/docs/procedures/deferral-and-owner-review.md`
- The owner corrected an interrupted answer before implementation: yes ->
  `../../portable-project-workflow-system/docs/procedures/interruption-and-recovery.md`
- Product planning, application implementation, delegation, content, research,
  decision/ranking safety, privacy/data/legal, design, migration, deployment,
  or experiment: no

## Required Reading

- Repository `AGENTS.md` and the complete portable mandatory entry path
- Portable documentation, workflow/review, QA/completion, Git/remote, and
  workflow-coverage system records
- TeamRadar current state and live governance registers
- TeamRadar workspace-layout operating policy
- The four selected procedures above

## Scope

- **Included:** authority for changing the canonical workflow; authority for
  adding TeamRadar-specific operating rules; approval semantics; decision
  supersession; specification record shape; local commit convention; owner
  review cadence; and approving roles.
- **Excluded:** current product charter, permitted-use boundary, target users,
  features, matching or reputation behavior, data collection, architecture,
  technology, implementation, release, and all legacy-code changes.
- **Dependencies:** resolved by explicit owner resolution of
  [OQ-008](../governance/open-questions.md#oq-008---what-workflow-governance-conventions-should-control-future-work).
- **Risks:** treating discussion as approval, allowing a project rule to weaken
  the canonical workflow, duplicating authority across files, or starting
  product work before the owner-requested governance gate closes.

## Review And Stop Conditions

- **Required reviewer:** project owner.
- **Stop when:** an answer is ambiguous, conflicts with the canonical workflow,
  would silently authorize product work, or assigns authority to an unnamed
  reviewer.
- **Commit boundary:** record each resolved component as a coherent
  TeamRadar-specific decision and update only the operating policy, state,
  question, and route records needed to implement it.

## Owner Decisions Recorded

- **2026-09-04 — Component 1:** approved as `DEC-007`. Keep one canonical
  portable workflow package, require explicit advance owner approval to modify
  it, and place normal project-specific extensions elsewhere under
  `project-docs/`.
- **Correction/recovery:** an interrupted owner message initially described an
  original/mutable folder pair while the owner was switching from a different
  story-writing workflow. The owner corrected that statement before any action.
  Repository inspection showed no partial copy, rename, or package change; the
  corrected one-package instruction is authoritative.
- **2026-09-04 — Components 2 through 8:** approved as `DEC-008`. The owner
  approved bounded agent authority for routine project-specific rules;
  contextual approval semantics; traceable decision changes; modular
  specification gates with narrow explicit overrides; independently viable
  local commits; exact advance authorization for controlled operations;
  risk-scaled decision batching; and sole-owner authority unless another
  reviewer or specialist input is explicitly named and scoped.

## Verification

- All eight `OQ-008` components reconciled to `DEC-007`, `DEC-008`, and
  `../operations/workflow-governance.md`.
- The portable workflow package has no diff.
- All relative project-document links resolve and `git diff --check` passes.
- The complete diff is limited to repository routing plus TeamRadar-specific
  governance, operations, planning, route, state, and specification-index
  records. No legacy application or historical evidence changed.
- No application test was run because this unit changes documentation and
  authority records only.
- No push, pull, pull request, deployment, destructive action, publication, or
  history rewrite occurred.

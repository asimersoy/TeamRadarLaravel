# Task Route: GOVERNANCE-2026-09-03 Workflow Settlement

- **Objective:** settle how future workflow changes, TeamRadar-specific
  operating rules, approvals, specifications, owner review, and commits are
  handled before starting current-product decisions
- **Status:** owner-input-required
- **Owner:** project owner
- **Started:** 2026-09-03

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
- **Dependencies:** explicit owner resolution of
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

## Intended Verification

- Reconcile every owner answer against the eight `OQ-008` components; component
  1 is recorded and components 2 through 8 remain open.
- Confirm the portable workflow package remains unchanged unless its exact
  change is separately approved.
- Check project-document links, `git diff --check`, complete diff scope, current
  state, decision supersession, commit state, and remote-action state.

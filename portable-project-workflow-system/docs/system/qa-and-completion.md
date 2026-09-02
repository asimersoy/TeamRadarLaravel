# QA And Completion

## Acceptance Principle

Completion is an evidence-backed state, not a confidence statement. Acceptance
criteria are defined before work and cannot be weakened after seeing the
result without a visible new decision.

## General QA Checklist

- [ ] The task followed the documented route.
- [ ] The diff is limited to approved scope and preserves unrelated work.
- [ ] Every user-visible behavior matches the current decision records.
- [ ] Tests scale with risk and blast radius.
- [ ] Failure, empty, loading, validation, permission, and rollback states were
      checked where applicable.
- [ ] Security, privacy, accessibility, responsive layout, and data-integrity
      checks were applied when selected by routing.
- [ ] Documentation and implementation agree.
- [ ] Required owner and external reviews remain visible and truthful.
- [ ] Commands, test results, skipped checks, and residual risks are recorded.
- [ ] `git diff --check` and documentation validation pass before a completion
      commit when relevant.

## Evidence Levels

- **Structural:** files, schemas, links, formats, and required fields exist.
- **Behavioral:** tests or direct execution prove intended behavior.
- **Rendered:** real UI output was inspected at relevant viewports and states.
- **Reconciled:** source and destination records match field by field.
- **External:** a named qualified reviewer supplied a verdict.

State which levels were achieved. Do not imply an unperformed level.

## Decision Outcomes

Use one outcome:

- `rejected`: method or result is not safely recoverable within the packet;
- `revision-required`: bounded corrections can satisfy the criteria;
- `internal-review-passed`: internal scope and checks pass, but owner or
  external gates may remain;
- `approved`: the assigned approving authority has approved the artifact;
- `completed`: all required work and approvals for the defined objective are
  finished.

## Completion Report Minimum

A completion report states:

- objective and scope;
- files or systems changed;
- decisions applied;
- tests and commands run with outcomes;
- manual or rendered checks;
- unresolved findings and external gates;
- commit identifier, if committed;
- whether any remote action occurred.

## No False Closure

Do not mark a task complete because time expired, a target is close, a tool
passed a subset of checks, or remaining work was moved to an unlinked note.
Deferred work must have a recorded return condition and owner-visible status.

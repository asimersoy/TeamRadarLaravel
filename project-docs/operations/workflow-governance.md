# TeamRadar Workflow Governance

- **Record type:** current project-specific operating policy
- **Status:** approved
- **Decision owner:** project owner
- **Authority:** `DEC-007` and `DEC-008`; owner explanation-style clarification
  on 2026-10-02
- **Created:** 2026-09-04
- **Update trigger:** proposed change to workflow authority, approval semantics,
  decision handling, specification gates, commit design, controlled operations,
  review batching, reviewer authority, or owner-facing technical explanations

## Purpose And Boundary

This policy defines how the canonical portable workflow is extended for
TeamRadar without modifying that package. It contains no product scope,
architecture, feature, technology, content, data, or permitted-use decision.

There is one canonical `portable-project-workflow-system/` folder. It cannot be
modified without explicit advance owner approval for the exact change. Routine
TeamRadar evolution belongs under `project-docs/`.

## Project-Specific Rule Authority

The primary agent may create or refine TeamRadar-specific paths, operating
rules, checklists, templates instantiated as live records, and documentation
when they merely apply already-approved policy. The agent must identify and
report the change and include it in a coherent verified commit.

Advance owner approval is required when a proposed rule changes authority,
approval requirements, review or release gates, risk tolerance, product or task
scope, or the definition of done. A project-specific rule cannot weaken or
contradict the canonical workflow; stop and resolve any conflict.

## Approval Semantics

- No fixed approval keyword is required.
- Clear, unambiguous ordinary owner language may approve a non-critical choice.
- The primary agent restates the precise interpretation and records the
  decision so the owner can correct a misunderstanding.
- Brainstorming, questions, possible options, silence, historical material, or
  ambiguous language are not approval.
- For critical or high-stakes choices, the agent states the exact proposed
  decision, material consequences, and scope, then obtains a deliberate
  explicit confirmation before treating it as approved.
- If a new instruction appears to contradict an approved decision without
  clearly replacing it, stop and confirm whether supersession is intended.

An owner may explicitly override a default or a specification gate. The agent
must restate and record the override, its exact scope, affected artifact or
implementation slice, consequences, and residual risk. An override grants no
unrelated remote, destructive, production, publication, or history-rewrite
authority.

## Decision Changes

- A material reversal or replacement receives a new numbered decision. The old
  record remains visible and is marked superseded.
- Typographical fixes and non-material clarifications may be edited in place;
  Git history preserves the change.
- An apparent conflict is not resolved through implementation convenience.
  Clarify it with the owner and update affected records before proceeding.

## Technical Explanations And Provisional Notation

Owner clarification, 2026-10-02: while a technical design is being discussed,
use explicit descriptive names for every variable, even when those names are
longer. Prefer names that identify what a value measures or what effect it
controls, rather than ambiguous shorthand.

Explain each variable's meaning and, where relevant, its bounds, units,
source, and the effect of increasing or decreasing it. Distinguish configurable
parameters from values derived from inputs or history. When replacing a
parameter with its reciprocal or another transformation, show the relationship
and algebraic equivalence; do not present it as merely renaming the same value.

This applies existing owner-review and approval semantics. Explanatory names
are not a final code-interface contract, and explaining or renaming a proposed
formula does not approve its mathematics, parameters, behavior, or implementation.
Product-specific proposals remain in product records, not this operating policy.

## Specification Lifecycle

Future current-product specifications live as a modular suite under
`project-docs/specs/`, routed by its index. Each module states purpose, status,
owner, dependencies, controlling decisions, acceptance criteria, update
triggers, and supersession state.

Before an implementation slice begins, its plan identifies the complete
applicable specification set and confirms those modules are approved. A module
irrelevant to that slice need not block it. Only an explicit, narrowly recorded
owner override may permit a slice to begin without an otherwise required
approved specification. Such an override does not silently alter other slices
or acceptance criteria.

## Local Commit Design

- Create additive local commits automatically after coherent verified units;
  do not wait for ceremonial per-commit approval.
- Group files that jointly form one independently meaningful change. Do not
  create a commit merely because one file changed, and do not accumulate
  unrelated completed work in a perpetually dirty tree.
- A commit must be a useful reversible checkpoint and must not depend on a
  later commit arriving for its basic correctness.
- When a commit changes deployable behavior, it must be safe to push or deploy
  independently with its necessary tests, configuration, documentation,
  migrations, compatibility measures, and rollback evidence. If a multi-stage
  rollout is unavoidable, every stage must remain independently safe and
  backward-compatible until the next stage.
- Documentation-only or planning commits need not invent deployable code, but
  they must remain coherent, truthful, linked, and independently reviewable.

Independent push/deployment safety is a commit-quality requirement; it never
authorizes a push or deployment.

## Controlled Operations

Pushes, pull requests, deployments, destructive operations, and Git history
rewrites each require separate exact owner authorization. Approval for a plan,
local commit, or one controlled action does not authorize another.

When an execution plan intends a controlled operation, identify its exact
target, effect, prerequisites, recovery path, and authorization gate while
planning, and obtain authorization before execution of that plan begins.
Discussion or recommendation is not authorization.

## Review Size And Batching

- Present high-stakes, sensitive, consequential, or high-tradeoff decisions in
  the smallest practical bounded group.
- The primary agent may batch independent low-risk choices when they are easy
  to revise, have little effect on downstream decisions, and batching reduces
  unnecessary cost or back-and-forth without hiding tradeoffs.
- Record every resulting decision even when several are reviewed together.
- Cost or convenience never lowers required evidence, review, or quality.

## Approving Authority And Specialist Input

The person currently communicating as project owner is the sole owner and
approving authority unless that owner explicitly changes the assignment.

Another person or reviewer gains authority only when the owner explicitly
names the person or role, domain, artifact or decision scope, and intended
authority. Pasted or relayed expert material becomes approved specialist input
only when the owner explicitly identifies its source/domain and instructs the
agent to treat it that way. That authority is limited to the named scope and
artifact version; it does not become general product or project approval.

Agent, delegated-worker, automated-tool, and unscoped external reports remain
evidence rather than approval.

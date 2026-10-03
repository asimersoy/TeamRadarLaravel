# QGuard Project Records

This directory is the canonical home for TeamRadar-specific records. The
reusable workflow system remains separate in
`../portable-project-workflow-system/`.

## Current Phase

**Latest checkpoint:** [QG-FIRST-PASS-1 revision 1](planning/first-pass/README.md)
is ready for a brief owner review. Its modular specifications, technical/data
contracts, six implementation stages and acceptance matrix now supply the
previously missing draft packet. `DEC-051` authorizes preparing it, with approval
before coding; no new app code or running integration exists. Start there for
the next action. The history below explains how this scope was selected.

The workspace migration and workflow-governance review are complete. The owner
has approved the QGuard name and several product foundations, and has accepted
the simplified historical reconstruction as sufficient for redesign without an
exhaustiveness claim. The owner selected Valorant after the Apex/Valorant API
and party-entry research, then asked for CS2 to be investigated as another
candidate. The owner has since rejected Looking to Play for QGuard and clarified
that the desired coordination group is a semi-automatable multi-person chat,
not primarily a persistent Steam Community Group. Discord can support bot-
created private per-match text/voice channels in an existing server. Valorant
has an official host-copied party link; no comparable current CS2 Discord party
handoff was established. The copied Riot link is separate from Riot's direct
formal-Discord-friend invite and Discord's generic Join action, and it can be
delivered through a QGuard-native private match surface rather than Discord.
The owner accepts a designated matched human creating the Valorant party/link
if the official flow passes and approves future client checks for the Valorant
link and generic Discord Game Invites in both games. `DEC-018` still selects
Valorant, while `DEC-022` records a broad international direction without
settling exact availability. Under `DEC-023`, the owner originally
postponed the critical `OQ-011` coordination decision until one combined test
program validates the Valorant link, game-specific Discord Invite/Join,
Discord private-room lifecycle, Steam non-friend group chat, and current CS2
alternatives. The 2026-09-07 resource/roadmap follow-up establishes that the
Riot/Discord integration already shipped for Valorant, defines a clean two-PC
participant topology, identifies four human Discord identities for rigorous
server-room isolation, adds targeted-user/role-bearing invite admission, and
selects the neutral-relay Valorant link as Wave 1. Discord-dependent execution
is now on the [2026-09-28 owner hold](governance/deferred-work.md#owner-hold--discord-access--2026-09-28)
until the owner can test and resumes; the existing readiness checks still apply.
`DEC-024` now explicitly approves Discord rooms/voice for planning and keeps
game joining replaceable: prefer a validated Discord game Join action, or let
one matched player share the official lobby link in a Discord text channel
visible only to the matched team. The
[coordination specification](specs/coordination-and-party-handoff.md)
separates that approved direction from draft details and stages later
implementation around the unimplemented joining component. Live tests remain
paused; the test-before-selection timing rule is partially superseded, not
the requirement for evidence before relying on real integrations.
`DEC-025` selects session grouping; `DEC-037` now adds basic QGuard friends,
invitations and partial parties, partially superseding the friend exclusion.
Lasting-team management and past-teammate history UI remain excluded.
`DEC-026` selects honor in matchmaking from that version, with newcomers at a
common baseline and similar-honor grouping as history develops. `DEC-027`
selects a fixed neutral baseline and leaves equivalent numeric scaling to the
implementation agent. `DEC-028` selects routine teammate feedback that can both
raise and lower honor. `DEC-029` selects scaled ratings, average-based honor
movement and dynamically lower influence as deviation from a configurable
recent-rating average increases. `DEC-030` keeps eligible raw recent ratings
separate from attenuated honor influence, so the reference can evolve even
when individual honor effects are reduced. Routine honor movement is automatic
in both directions without admin intervention. `DEC-031` requires startup/
confidence handling and delegates its concrete development method and reference
response tuning to the implementation agent. `DEC-032` replaces the exact
last-N reference with single-value exponential smoothing, starting at adjustable
development divisor 20. It selects the isolated-extreme-versus-moderate effect
trade-off and permits behavior-preserving development calibration. Final tuning
is not a predevelopment owner question; methods still require recorded tests.
`DEC-033` selects no exact individual feedback-history ledger or last-N buffer
for the first-version honor calculation. The reference choice and startup
delegation are closed; `DEC-047` now retains actual first-pass feature records
without automatic expiry, with retention review immediately afterward in
`DEF-012`. `DEC-034` excludes incoming-rating volatility/adaptive dampening and
outgoing-reviewer-deviation accountability from the current implementation
scope. Both are preserved together as
[future honor ideas](specs/product-foundations.md#future-honor-ideas---outside-current-implementation),
not approved later features or current blockers. Existing core honor decisions
remain in force; their current implementation needs no volatility indicator.
`DEC-035` makes Discord voice a queue option and excludes real Discord
implementation from this scope, until availability and owner tests permit a
later slice. `DEC-046` now requires native private match text and only
no-Discord queueing in this first pass. `DEC-036`
prioritizes hard game rank compatibility, then honor closeness with tunable
wait-dependent widening. Original partial-party members cannot rate one another
(`DEC-037`); `DEC-045` selects own honor visibility, no required received-feedback
history screen, player-hidden reviewer identities and full available project
case/account context for data-cleared admins. `DEC-043` requires all other
teammates' no-show votes and lets I joined stop removal. `DEC-040`
selects a human report inbox without punishment tools. `DEC-041` selects three
1–10 feedback dimensions averaged into honor and pending report-aware settlement.
The owner explicitly clarifies that two distinct reporters automatically
invalidate the target's outgoing ratings for that match before human review,
with an admin tag. This is an eligibility consequence, not an automatic penalty.
`DEC-043` also selects participant Session ended, sessions of one or more games,
and settlement within ten minutes of the first finalized feedback, earlier if
everyone completes. Later polish is `DEF-011`. `DEC-042` delegates reversible
development details; `DEC-044` delegates initial Valorant region/language queue
controls. Owner reviews the first build and can refine later passes. Multiple
viable options alone are not an upfront owner blocker; full scoring/data/
acceptance specs still need work. Original question seven is now answered,
delegated or deferred by `DEC-047`/`DEC-048`: first-pass records persist until
explicit deletion; identity/ownership/rank selection belongs to implementation,
with self-declaration and teammate mismatch checks if official retrieval is
unavailable, approval-gated or needs more owner decisions. Do not reopen these
as unanswered questions. Stored evidence does not change aggregate honor
calculation. `DEC-049`/`DEC-050` now settle Docker, PostgreSQL, no initial
Redis and Blade/Livewire, and require persistent storage and backend/browser
testing in Docker with synthetic accounts. The concrete
specification/acceptance packet is now drafted for the existing approval gate.
Existing future-only exclusions stand.
Looking to Play remains rejected, and voice recording remains a separate
proposal only. No complete implementation slice is yet specification-approved. Everything
under `legacy/` remains historical evidence.

Start with:

1. [Current state](current-state.md)
2. [Decision register](governance/decisions.md)
3. [Open questions](governance/open-questions.md)
4. [Deferred work](governance/deferred-work.md)
5. [TeamRadar workflow governance](operations/workflow-governance.md)
6. [Product foundations](specs/product-foundations.md)
7. [Coordination and replaceable party-handoff specification](specs/coordination-and-party-handoff.md)
8. [Coordination test resources and sequence](planning/coordination-test-resources-and-sequence.md)
9. [Owner product decision sequence](planning/rewrite-owner-decision-sequence.md)

## Current Planning

- [Brief first-pass owner review](planning/first-pass/README.md) — named packet approval checkpoint
- [First-pass specification manifest](specs/first-pass/README.md) — modular current implementation contracts, proposed
- [Execution stages](planning/first-pass/execution-plan.md) and [acceptance matrix](planning/first-pass/acceptance-matrix.md) — no application stage/test run yet
- [Decision and deferral coverage](planning/first-pass/decision-traceability.md) and [planning review evidence](planning/first-pass/review-evidence.md)

- [Selected core stack and supporting recommendations](planning/rewrite-owner-decision-sequence.md#stack-recommendation--2026-10-03) — `DEC-049`/`DEC-050` settle the core choices and persistence/test requirements; now elaborated in the first-pass packet
- [Earlier first-pass readiness review](current-state.md#first-pass-readiness-review--2026-10-03) — drafting now supplied by the new packet; approval still required
- [Historical implementation-readiness review — 2026-09-28](planning/implementation-readiness-review-2026-09-28.md) — dated evidence; its unanswered questions are superseded where later decisions settle them
- [Coordination and replaceable party-handoff staged outline](specs/coordination-and-party-handoff.md#staged-implementation-outline--queued-not-execution-approval)
- [Rewrite owner decision sequence](planning/rewrite-owner-decision-sequence.md)
- [Rewrite-readiness route and recovery audit](routes/PLAN-2026-09-03-rewrite-readiness.md)
- [Completed product-foundation/API-gate route](routes/PLAN-2026-09-05-product-foundations-and-api-gate.md)
- [Completed initial game-API research route](routes/RESEARCH-2026-09-05-game-api-feasibility.md)
- [Completed party-entry and policy-fit route](routes/RESEARCH-2026-09-05-party-entry-and-policy-fit.md)
- [Current Valorant-selection and Discord-proposal route](routes/PLAN-2026-09-05-valorant-selection-and-discord-voice-proposal.md)
- [Completed CS2 party-entry research route](routes/RESEARCH-2026-09-05-counter-strike-2-party-entry.md)
- [Completed Steam non-friend communication/group route](routes/RESEARCH-2026-09-06-steam-nonfriend-communication-and-group.md)
- [Completed Discord coordination/game-join comparison route](routes/RESEARCH-2026-09-06-discord-coordination-and-game-join-comparison.md)
- [Completed party-handoff validation and coordination-gate route](routes/PLAN-2026-09-06-party-handoff-validation-and-coordination-gate.md)
- [Completed Discord-dependency and restricted-region route](routes/RESEARCH-2026-09-06-discord-dependency-and-restricted-region-boundary.md)
- [Current coordination and party-entry validation route](routes/PLAN-2026-09-07-coordination-and-party-entry-validation.md)
- [Current test-resource and Discord-roadmap route](routes/RESEARCH-2026-09-07-test-resources-and-discord-roadmap.md)
- [Coordination and party-entry validation program](planning/coordination-and-party-entry-validation-program.md)
- [Coordination test resources and sequence](planning/coordination-test-resources-and-sequence.md)
- [Party-entry behavioral validation packet](planning/party-entry-behavioral-validation-packet.md)
- [Discord coordination and voice-evidence options](planning/discord-coordination-and-voice-evidence-options.md)
- [Specification index](specs/README.md)

## Current Research

- [Game API feasibility brief](research/game-api-feasibility.md)
- [Game API feasibility findings](research/game-api-feasibility-findings.md)
- [Game API source ledger](research/game-api-source-ledger.md)
- [Party entry and provider-policy fit](research/party-entry-and-policy-fit.md)
- [Counter-Strike 2 party-entry feasibility](research/counter-strike-2-party-entry-feasibility.md)
- [Steam non-friend communication/group feasibility](research/steam-nonfriend-communication-and-group-feasibility.md)
- [Discord coordination and game-join comparison](research/discord-coordination-and-game-join-comparison.md)
- [Discord-assisted party entry: current state and roadmap](research/discord-party-entry-current-and-roadmap.md)

These records organize decisions; they do not approve a product brief,
technical specification, implementation plan, or code change.

## Current Operations

- [Workflow governance](operations/workflow-governance.md)
- [Workspace and repository layout](operations/workspace-layout.md)
- [Completed workflow-settlement route](routes/GOVERNANCE-2026-09-03-workflow-settlement.md)
- [Completed workspace-nesting route](routes/MIGRATION-2026-09-03-workspace-nesting.md)

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

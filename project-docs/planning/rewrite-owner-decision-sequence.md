# QGuard Rewrite Owner Decision Sequence

- **Record type:** current owner-review packet
- **Status:** owner-input-required
- **Decision owner:** project owner
- **Created:** 2026-09-03
- **Update trigger:** after each owner decision or when new evidence changes a
  later decision dependency
- **Implementation authority:** none

## Purpose

This packet organizes the decisions needed before an evidence-backed QGuard
implementation plan can exist. It is a decision agenda, not a product brief,
specification, roadmap, backlog, or authorization to write code.

The sequence is dependency guidance, not one large questionnaire. Under
`DEC-015`, each area may take many focused discussions and is settled when it
becomes relevant to a product or implementation slice. Product and
permitted-use boundaries still precede any implementation whose correctness or
risk depends on them. After each owner answer, the approved choice belongs in
the decision register and the affected open question is closed or narrowed.
Unselected options remain proposals, not rejected decisions, unless the owner
explicitly rejects them.

## Evidence And Authority Separation

### Verified Current Facts

- The repository contains an unfinished Laravel prototype and extensive legacy
  evidence, not a completed current product.
- The legacy implementation did not complete functional matchmaking, private
  rooms, session correlation, reviews, honor, moderation, or production
  operations.
- The latest reachable code moved toward Valorant, while the later memory
  reconstruction describes an Apex return.
- The current public-source research does not show either Valorant or Apex
  fully providing both exact all-player current rank and programmatic ordinary
  party formation; Valorant is the closer approval-gated candidate.
- No current stack, game, integration, data flow, decision system, deployment,
  or implementation boundary has been approved.

### Approved Owner Decisions Already In Force

- Reconstruct before redesign (`DEC-001`).
- Do not require reuse of legacy code, architecture, or technology (`DEC-002`).
- Keep reusable workflow records separate from TeamRadar records (`DEC-003`).
- Route work, preserve unrelated work, separate evidence classes, and require
  evidence-backed completion (`DEC-004`).
- Keep the canonical general workflow and TeamRadar-specific records separated
  inside the nested Git repository, with workspace-only sources, scratch,
  outputs, and snapshots outside Git (`DEC-006`).
- Protect the single canonical workflow from unapproved changes and put normal
  extensions in TeamRadar-specific records (`DEC-007`).
- Apply the approved TeamRadar workflow-governance contract for changes,
  approvals, specifications, commits, controlled operations, review batching,
  and reviewer authority (`DEC-008`).
- Use QGuard as the current product name (`DEC-009`).
- Make behavioral honor/reliability, distinct from skill/rank, the central
  product concept (`DEC-010`).
- Select the initial game from current feasibility evidence, beginning with
  Apex and Valorant rather than inheriting either (`DEC-011`).
- Promote legacy capability intent and achieved outcome, not ordinary legacy
  implementation shape (`DEC-012`).
- Prefer permitted authoritative API rank; treat self-declaration as a
  truthfully labelled fallback with report and resolution requirements
  (`DEC-013`).
- Accept the simplified historical reconstruction as sufficient for redesign
  without claiming exhaustiveness (`DEC-014`).
- Settle product decisions gradually around current feasibility; treat PC as
  provisional and preserve per-slice specification approval (`DEC-015`).
- Prefer an official friendship-free ordinary-party join/link, use another
  official friendship-free ordinary-lobby code/link next, and treat
  friend/invite as the last fallback (`DEC-016`).
- Keep a conditional, provider-independent prototype path available for a
  later Valorant RSO application without presuming access (`DEC-017`).

### Unapproved Assumptions

The following may sound natural because of the old project, but each remains an
assumption until the owner decides it:

- TeamRadar remains a video-game teammate finder.
- The first game is Apex Legends or Valorant.
- Users enter a realtime queue rather than browse a directory or invite links.
- The exact form and effect of honor, reviews, reports, matching, or session
  verification are inherited from the old product.
- A desktop relay, official game API, Redis, realtime sockets, Laravel, React,
  Node, or any particular database is needed.
- “Anti-toxicity,” “verified,” “safe,” or “compatible” can be promised publicly.

### Agent Proposal, Not A Decision

Use the staged sequence below and validate the smallest coherent product loop
before adding session surveillance, public reputation, automated eligibility,
or privileged integrations. This ordering keeps expensive and consequential
systems behind explicit evidence and owner gates. The owner may revise the
sequence.

## Gate 0 - Historical Reconstruction

- **Status:** closed 2026-09-05 by `DEC-014`.
- **Result:** the simplified dossier is sufficient for redesign without an
  exhaustiveness claim. The Apex/Valorant chronology remains a visible,
  non-blocking provenance ambiguity. The owner need not reconstruct it from
  memory.
- **Return condition:** new evidence/correction or a current decision that
  exposes a specific bounded historical gap.

## Current Feasibility Checkpoint

The initial [game API findings](../research/game-api-feasibility-findings.md)
and focused
[party-entry findings](../research/party-entry-and-policy-fit.md) show that
neither candidate publicly documents both complete current-rank coverage and
ordinary-party automation.

- Valorant is closer: Riot recognizes approval-gated opt-in LFG tools, RSO and
  official match/leaderboard APIs exist, and PC users can copy a Riot lobby link
  into a Discord server, DM, or elsewhere. This is the only evidenced candidate
  for friendship-free ordinary-party entry. Exact non-friend recipient
  prerequisites, all-player current rank, and third-party ordinary-party
  automation are not fully documented.
- Apex LiveAPI is legitimate for PC Custom Matches, but its lobby requests do
  not establish ordinary public/ranked party control. No public first-party
  player-rank API, Apex-specific Discord Join, or shareable ordinary-party
  link/code was found. The documented ordinary flow requires adding a friend.
- The reviewed terms do not establish a cheating conflict for external LFG or
  official user-mediated joining. They matter if QGuard would automate an
  ordinary client through an unauthorized interface or extract game data by an
  unauthorized method.
- PC remains provisional. No game, fallback, integration, or provider
  application is approved.

The next bounded decision is whether a host copying the official Valorant lobby
link into QGuard is an acceptable party-formation step and when the remaining
non-friend acceptance edge must be verified. If accepted, the discussion can
move to minimum rank evidence; if rejected, the owner can introduce alternate
flows or authorize research into other games.

## Decision Group 1 - Current Product Charter And Use Boundary

Settle these before approving any slice whose behavior or claims depend on the
charter; they do not need to be answered in one sitting:

1. What present-day problem does QGuard solve, in one sentence?
2. What outcome should a user achieve that ordinary game matchmaking, Discord,
   forums, or existing LFG tools do not provide well enough?
3. Which uses are permitted: one-session grouping, persistent teams, ranked
   play, casual play, communities, coaching, tournaments, or something else?
4. Which uses are explicitly outside the product?
5. Which promises must the product avoid—such as guaranteed compatibility,
   safety, verified identity/rank, reduced toxicity, or improved win rate?
6. What age boundary, launch geography, and language boundary apply?

**Closure evidence:** an owner-approved project brief section containing
purpose, audience, goals, non-goals, permitted uses, prohibited uses, and public
claim limits. This closes or narrows `OQ-004`.

## Decision Group 2 - First User And Market Wedge

1. Which game and mode, if any, is the first supported wedge?
2. Which platform, input, cross-play, region/data center, and language are in
   scope?
3. Is the primary user solo, a partial party, or both?
4. Is the product for a single session, repeat teammates, persistent teams, or
   a deliberate subset?
5. Is the first priority casual, ranked/competitive, or another player need?
6. What team size and availability assumptions apply?

**Closure evidence:** a named primary user, launch context, and explicit
out-of-scope segments. This closes or narrows `OQ-005` and determines which
provider facts require a fresh recheck or deeper research.

## Decision Group 3 - Smallest Complete MVP Journey

Define the complete user loop before treating features as requirements:

1. Discovery and account requirement.
2. Game identity or profile setup and its truthful accuracy label.
3. Queue, directory, invitation, or other discovery mechanism.
4. Match proposal, acceptance, decline, timeout, no-match, block, and requeue.
5. Coordination room or equivalent, including membership and expiry.
6. Manual or automated in-game party formation.
7. Session completion evidence, if any.
8. Feedback, report, repeat-team, or post-session behavior, if any.
9. Recovery when integrations, another user, or the network fails.

For every step, decide whether it is required for the first validation or
explicitly excluded. A happy-path mockup alone is not a complete journey.

**Closure evidence:** current user-journey and MVP/non-goal records with empty,
failure, permission, abuse, and recovery states.

## Decision Group 4 - Matching And User-Decision Effects

1. Is the experience a neutral directory, deterministic filter, preference
   match, ranked recommendation, or eligibility/screening system?
2. What input is necessary, and why is each input needed?
3. Which rules are hard exclusions versus weighted preferences?
4. Does rank affect display, ordering, eligibility, or nothing?
5. Does any behavior/reputation signal affect display, ordering, eligibility,
   or nothing?
6. How do ties, missing/contradictory inputs, no-match, widening, blocks,
   repeated teammates, and partial parties behave?
7. What explanation and user control accompany a match or no-match result?

**Closure evidence:** approved decision-system classification, criteria
version, deterministic/adversarial fixture outline, explanation behavior,
monitoring, and rollback boundary. This is part of closing `OQ-006`.

## Decision Group 5 - Trust, Reviews, Reports, And Moderation

Choose the lowest-complexity trust model that satisfies the approved product
purpose:

1. No reputation; private structured feedback; endorsements; public score;
   reports; or a bounded combination.
2. Who may review whom, based on what evidence, and how often?
3. Are free text, voice, or game-session events collected? Each materially
   expands privacy and moderation obligations.
4. Can feedback change information, ordering, eligibility, restrictions, or
   account status?
5. What prevents retaliation, brigading, reciprocal boosting, discrimination,
   sock puppets, and score lock-in?
6. What report taxonomy, human review, reason notice, correction, appeal,
   restoration, and emergency/safeguarding path exists?

**Closure evidence:** approved trust/safety boundary, moderation ownership,
abuse tests, explanation/appeal requirements, and any required qualified
review. This is part of closing `OQ-006`.

## Decision Group 6 - Identity, Integrations, And Data

1. Which account and game identifiers are collected, and are they declared,
   confirmed, or verified?
2. Is an official API, third-party service, local relay, manual entry, or no
   integration required for the first version?
3. What minimum data supports each approved purpose?
4. What is shown to matched users, operators, providers, and the public?
5. Where is data processed, logged, and backed up; who can access it; and for
   how long?
6. How do correction, export, deletion, account recovery, legal hold, and
   backup restoration work?
7. What jurisdiction, platform-policy, privacy, security, age, or legal review
   is required for the concrete flow?

**Closure evidence:** field-level data-flow inventory, accuracy labels,
recipient/access map, retention/deletion plan, provider facts, threat-model
boundary, and assigned reviews. This completes `OQ-006` only after the actual
flow is concrete.

## Decision Group 7 - Validation, Business, And Operating Constraints

1. What user behavior or outcome proves the concept is worth continuing?
2. Which metrics are decision-useful: successful groups, time to group,
   acceptance, completed sessions, repeat grouping, reports, retention, or a
   smaller set?
3. What volume, duration, and qualitative feedback constitute a valid test?
4. Is the first version free, paid, sponsored, community-run, or intentionally
   undecided during validation?
5. What budget, delivery horizon, operator capacity, support burden, and
   availability expectation apply?
6. What accessibility, localization, security, incident, backup, restore, and
   rollback expectations are required for the validation stage?

**Closure evidence:** measurable validation hypothesis, failure/stop criteria,
resource constraints, business non-goals, and operational service boundary.

## Decision Group 8 - Technical Specification And Implementation Plan

Only after the relevant components of Groups 1-7 are sufficiently settled for
the intended implementation slice:

1. Compare architectures against the approved journey, data flow, risk, and
   operating constraints; do not select a stack for legacy familiarity alone.
2. Decide clean repository/branch strategy and whether any legacy artifact is
   reference-only, migrated, or deliberately reimplemented.
3. Define component boundaries, state machines, contracts, authorization,
   schemas, concurrency, failure recovery, observability, and versioning.
4. Select runtime, framework, database, realtime approach, integrations,
   hosting, environments, secret handling, CI, and deployment/rollback.
5. Define testable completion criteria before dividing work into milestones.
6. Order phases so product validation and reversible work precede expensive or
   irreversible integrations and trust systems.

**Closure evidence:** approved technical specification, risk/review matrix,
phased execution plan, acceptance tests, release gates, rollback plan, and
explicit authorization to begin implementation. This closes `OQ-007`.

## Superseded Agent Baseline - Do Not Use For Current Routing

- **Status:** superseded by `DEC-011`
- **Reason:** this proposal assumed manual invitations and no privileged API
  integration before the owner required current API feasibility to be assessed.

The superseded proposal was:

- one game, one primary mode, and one launch region/language;
- web-first accounts, declared game handle, and a small preference set;
- realtime party discovery with a private coordination room and manual in-game
  invites;
- truthful no-match/decline/timeout/block/requeue states;
- no privileged API, desktop relay, public honor score, free-text reviews,
  automated punishment, or multi-game abstraction in the first validation;
- structured private feedback/reporting only if the owner decides it is needed
  to validate the core value; and
- architecture chosen after the owner accepts this or another product loop.

This baseline reduces dependency and decision-system risk. It also tests less
of the legacy differentiation, so accepting it would require the owner to state
whether behavior-based trust is core now or a later hypothesis.

## Review Method

1. Keep Gate 0 closed unless its recorded return condition occurs.
2. Review one bounded decision group or dependency cluster at a time; a group
   may take many discussions.
3. Record exact owner decisions immediately in
   `../governance/decisions.md` and update affected open questions.
4. Recheck current game/platform/provider facts when a concrete boundary or
   implementation slice makes them relevant.
5. Do not turn an unanswered item into an assumption inside architecture or
   code.
6. Do not create an implementation plan for a slice until all specifications
   and blocking closure evidence applicable to that slice are approved and
   reconciled, unless the owner records a narrow explicit override.

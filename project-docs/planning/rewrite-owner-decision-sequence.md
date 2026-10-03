# QGuard Rewrite Owner Decision Sequence

**Current action, 2026-10-03:** the [first-pass review packet](first-pass/README.md)
supplies the modular engineering plan, now approved as revision 1 + `DEC-052`.
Matched teammates see aggregate honor beside rank; feedback authors remain
hidden. `DEC-051`'s brief review is satisfied. Use the approved execution plan;
this agenda retains how earlier decision groups were settled.

- **Record type:** current owner-review packet
- **Status:** first-pass product answers/core stack selected; detailed packet
  approved with DEC-052's visibility amendment, application implementation not started
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
- A later first-party CS2 review established feature evidence for Looking to
  Play and official Steam OpenID identity, but the owner rejected Looking to
  Play for QGuard under `DEC-019`.
- Steam supports manual link-invited group chat, but QGuard has no documented
  creation or lifecycle API. Discord supports bot-created private server text/
  voice channels with constrained invite or OAuth admission; its application-
  created Group DM is a weaker legacy-constrained option.
- Valorant can place an official host-copied ordinary-party link in the Discord
  room. No current first-party evidence establishes an equivalent CS2 Discord
  Game Invite, so Discord solves CS2 communication but not party entry.
- The owner accepts a designated matched human creating the ordinary Valorant
  party/link if the official non-friend flow passes. Generic Discord Game
  Invite checks for Valorant and CS2 are approved future tests, not current
  provider facts (`DEC-021`).
- Valorant is the current approved game under `DEC-018`; CS2 was researched as
  an additional candidate without superseding that decision. The core stack is
  now approved by `DEC-049`/`DEC-050`; dependable party-entry integration and
  deployment are not. First-pass data/implementation contracts are approved
  in the new packet with DEC-052's visibility amendment.

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
- Select Valorant as the initial game and require a scoped two-account
  non-friend lobby-link test before relying on the link (`DEC-018`).
- Reject Looking to Play as a QGuard party-entry flow while researching Steam
  non-friend chat, voice, and Community Group alternatives (`DEC-019`).
- Evaluate coordination groups as semi-automatable multi-person conversations
  with supported link/code/OAuth entry, not primarily as persistent Steam
  Community Groups (`DEC-020`).
- Accept a designated-human-host Valorant party/link flow if validation passes,
  queue generic Discord Game Invite checks for Valorant and CS2, and preserve
  final coordination-backbone selection as a separate critical decision
  (`DEC-021`).
- Set a broad international direction without yet promising every country or
  approving Discord/VPN dependence (`DEC-022`).
- Preserve applicable current-client and coordination-lifecycle evidence gates
  (`DEC-023`), while choosing Discord room/voice planning ahead of tests and
  leaving game joining replaceable and unimplemented (`DEC-024`).
- Start with session grouping (`DEC-025`). `DEC-037` later adds basic
  friends/invitations and partial parties now, superseding the initial friend
  exclusion; lasting-team management and past-teammate history UI remain later.
- Use honor in matchmaking from the first version, with a common starting
  baseline and similar-honor grouping as history develops (`DEC-026`).
  Possible history-dependent weight remains open.
- Use a fixed neutral newcomer baseline rather than the community average;
  delegate internal numeric units and equivalent frontend scaling to the
  implementation agent (`DEC-027`). Behavioral meaning, formula, matching and
  visibility decisions are not delegated by this representation choice.
- Allow ordinary post-play teammate feedback to both raise and lower honor
  (`DEC-028`); calculation, magnitude/timing and report consequences remain open.
- Use scaled teammate ratings and average-based movement, with dynamically
  lower influence as deviation from a configurable recent-rating average grows
  (`DEC-029`), now measured against the smoothed raw reference under `DEC-032`.
  Full acceptance criteria and safeguards remain incomplete.
- Keep raw recent ratings separate from attenuated honor influence: eligible
  downweighted ratings still enter the unadjusted recent reference (`DEC-030`).
  Ordinary honor movement is automatic in both directions without admin
  intervention. No example window count or storage schema is selected.
- Include initialization/confidence handling and delegate its concrete
  development method and raw-reference response tuning to the implementation
  agent (`DEC-031`). Final tuning does not require advance owner selection.
- Replace exact last-N with the single-state smoothed raw reference, starting
  at adjustable development divisor 20. Accept the isolated-extreme-versus-
  moderate immediate effect trade-off and tune constants/small functions while
  preserving approved behavior (`DEC-032`). No further reference-choice prompt.
- Plan the first-version honor calculation without an exact individual feedback-
  history ledger or last-N buffer (`DEC-033`). Surface any other-purpose raw
  retention explicitly; do not silently add it or restore exact-window/startup
  owner questions. A future history decision need not change the reference.
- Exclude incoming-rating volatility/adaptive dampening and outgoing-reviewer-
  deviation accountability from current implementation. Preserve them as future
  possibilities only, requiring explicit reopening and adoption (`DEC-034`).
- Queue with/without Discord voice, while excluding real Discord integration
  from current implementation (`DEC-035`); `DEC-046` later selects native
  website text and only no-Discord queueing for this first pass.
- Preserve hard in-game rank compatibility, then honor closeness with tunable
  wait-dependent widening (`DEC-036`). Never widen past game compatibility.
- Include basic friends and partial parties; prohibit ratings between original
  pre-made co-members, not all site friends (`DEC-037`). Keep reputation
  non-public (`DEC-038`), with precise private audiences later in `DEC-045`.
- Use the initial no-show challenge and early-leaver ineligibility direction
  (`DEC-039`), with response/completion later resolved by `DEC-043` and stronger
  evidence checks postponed.
- Start with human report review, no punishment tools (`DEC-040`), and three
  1–10 dimensions averaged into honor with pending report-aware settlement
  (`DEC-041`). Two distinct reports automatically invalidate the reported
  player's outgoing ratings for that match before human review; tag for admins.
  Owner follow-up distinguishes this consequence from deferred penalties.
- Delegate reversible development details, with documented agent defaults/tests
  and owner first-build review (`DEC-042`). Multiple viable options alone do
  not require upfront owner choice. Original partial-party persistence optional.
- Use participant Session ended for one or several games; first finalized
  feedback starts a ten-minute window, with early settlement if everyone
  finishes. All other players must support a no-show challenge; I joined
  stops removal for now (`DEC-043`); stronger checks/polish remain future.
- Delegate research/initial Valorant region/language queue controls (`DEC-044`).
- Show own honor; no required received-feedback/history view; hide reviewers
  from players but permit data-cleared admins full available project case/
  account context without participant-anonymity redaction (`DEC-045`).
- Include native private matched-party text and only no-Discord queueing now
  (`DEC-046`). Future voice pools wait, with strict separation as the conditional
  default only if current architecture genuinely needs the boundary.
- Retain actual first-pass feature records without automatic expiry until
  explicit deletion (`DEC-047`), preserving cleared-admin access. Immediately
  after the first implementation, use its actual inventory to decide retention/
  restriction/deletion in pass two (`DEF-012`); no scoring-method change.
- Delegate identity, ownership checks and rank retrieval to the implementation
  agent using current official evidence. If official retrieval is unavailable,
  approval-gated or needs further owner decisions, use declared rank, display
  it in the matched lobby and ask about observed mismatches at Session ended
  (`DEC-048`). Keep declarations/peer reports distinct from API verification.

### Unapproved Assumptions

The following may sound natural because of the old project, but each remains an
assumption until the owner decides it:

- The old TeamRadar feature set or implementation defines the rewrite beyond
  the current QGuard session-grouping decisions.
- That selecting Valorant also settles its mode, region, audience, complete
  platform boundary, rank behavior, provider access, or coordination surface.
- That choosing a queue also approves every queue filter, acceptance, timeout,
  recovery or interim with-voice behavior.
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
neither Valorant nor Apex publicly documents both complete current-rank
coverage and ordinary-party automation. The later
[CS2 party-entry findings](../research/counter-strike-2-party-entry-feasibility.md)
added a third candidate before the owner rejected its Looking to Play route.
The [Steam communication/group follow-up](../research/steam-nonfriend-communication-and-group-feasibility.md)
found manual coordination but no supported QGuard management API. The later
[Discord coordination/game-join comparison](../research/discord-coordination-and-game-join-comparison.md)
now owns the cross-game coordination conclusion.

- Valorant was closer in the original pair: Riot recognizes approval-gated opt-in LFG tools, RSO and
  official match/leaderboard APIs exist, and PC users can copy a Riot lobby link
  into a Discord server, DM, or elsewhere. Exact non-friend recipient
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
- `DEC-019` rejects Looking to Play for QGuard without asserting that Valve
  removed the feature.
- `DEC-020` clarifies that a viable communication group should be a semi-
  automatable multi-person conversation with supported link/code/OAuth entry,
  not primarily persistent community membership. Steam's manual chat does not
  meet that preferred criterion.
- Discord can automate private text/voice channels and matched-user access in a
  human-owned QGuard server. Its Group DM API is not recommended as the primary
  route because it originated with deprecated GameBridge, is capped at ten
  active groups, and cannot contain bots.
- Valorant has an official host-copied lobby link that can be delivered through
  Discord or a QGuard-native private surface. This is distinct from Riot's
  direct formal-Discord-friend invite and Discord's generic Join action. No
  current first-party evidence establishes a comparable CS2 Discord party
  handoff; a Discord room is communication only unless the game independently
  exposes a verified party-entry mechanism.
- `DEC-021` confirms that QGuard may designate a matched human to create the
  Valorant party/link and submit it through the selected private surface if
  `DEF-001` passes. `DEF-002` separately queues generic Discord Game Invite
  checks for both games.
- The owner selected Valorant after reviewing the original findings. PC remains the
  provisional context for the documented lobby-link candidate; no complete
  platform, region, mode, rank, integration, coordination, or provider-
  application boundary is approved. The later CS2 instruction reopened the
  comparison but did not unambiguously supersede `DEC-018`.

Discord-dependent execution is on the
[2026-09-28 owner hold](../governance/deferred-work.md#owner-hold--discord-access--2026-09-28).
`DEC-024` approves Discord room/voice planning, a private matched-only text
channel for the future host-link alternative, and replaceable joining.
`DEC-035` makes voice a future queue option and excludes real Discord integration
now. `DEC-046` requires native private match text and only no-Discord queueing
in this first pass. Do not re-ask those choices; future voice-pool separation
can wait unless a current dependency needs the approved strict-separation
default. Surrounding specifications proceed while tests remain paused. The
[coordination module](../specs/coordination-and-party-handoff.md) orders later
specification-gated implementation slices. The preserved
[coordination and party-entry validation program](coordination-and-party-entry-validation-program.md)
still supplies real-behavior evidence after resumption; neither documentation
nor mock tests establish a working handoff. `OQ-011` is partly resolved rather
than waiting for the same provider choice again. Voice recording remains a
separate unapproved choice in the
[Discord coordination packet](discord-coordination-and-voice-evidence-options.md).

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

1. Valorant is reaffirmed under `DEC-044`; investigate relevant game/mode/party
   compatibility before relying on it. Reversible queue-control specifics are
   delegated, not a new mandatory owner questionnaire.
2. Initial region/language controls are delegated under `DEC-044`. Full launch
   geography, public audience and actual data boundaries remain separate.
3. Both solo and partial-party entry are selected under `DEC-037`; specify
   their readiness and recovery without re-opening that scope choice.
4. Session grouping and participant-declared completion across one or several
   games are selected (`DEC-025`/`DEC-043`). Lasting-team and past-teammate history
   UI are outside this implementation; basic friends/invitations are now in
   scope under `DEC-037`.
5. Is the first priority casual, ranked/competitive, or another player need?
6. What team size and availability assumptions apply?

**Closure evidence:** a named primary user, launch context, and explicit
out-of-scope segments. This closes or narrows `OQ-005` and determines which
provider facts require a fresh recheck or deeper research.

## Decision Group 3 - Smallest Complete MVP Journey

Current direction: session queueing, partial parties and basic friends/invites
are selected (`DEC-025`/`DEC-037`/`DEC-046`). `DEC-043` settles normal completion,
feedback clock and no-show vote/response. Reversible recovery/persistence is
agent-owned under `DEC-042`, not an upfront blocker. Use the following as
specification/QA coverage, not a reason to re-open settled or delegated choices.

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

`DEC-036` selects game queue compatibility as the hard constraint, then honor
similarity with wait-dependent widening. The agent may tune rates/limits and
investigate/design initial region/language controls under `DEC-044`, with tests
and later owner review. Actual game-rule evidence is not an owner memory question.

1. Is the experience a neutral directory, deterministic filter, preference
   match, ranked recommendation, or eligibility/screening system?
2. What input is necessary, and why is each input needed?
3. Which rules are hard exclusions versus weighted preferences?
4. Does rank affect display, ordering, eligibility, or nothing?
5. Honor affects grouping under `DEC-026`; how do similarity, baseline,
   history reliability and other criteria interact? Display, additional
   ordering and eligibility effects remain open.
6. How do ties, missing/contradictory inputs, no-match, widening, blocks,
   repeated teammates, and partial parties behave?
7. What explanation and user control accompany a match or no-match result?

**Closure evidence:** approved decision-system classification, criteria
version, deterministic/adversarial fixture outline, explanation behavior,
monitoring, and rollback boundary. This is part of closing `OQ-006`.

## Decision Group 5 - Trust, Reviews, Reports, And Moderation

**Current discussion, updated 2026-10-03:** honor's behavioral purpose and first-version
matching role and fixed neutral newcomer baseline are approved. Equivalent
numeric representation is an implementation choice under `DEC-027`, not a
required owner prompt. `DEC-028` approves routine teammate feedback that can
raise and lower honor. `DEC-029` selects average-based movement and dynamic
recent-reference attenuation. `DEC-032` replaces the former exact last-N window
with exponential smoothing; input remains unadjusted by honor dampening under
`DEC-030`/`DEC-032`. The adjustable development response divisor starts at 20;
its evolution supplies the intended behavior-change mechanism. Ordinary
automatic up/down movement is approved without admin intervention. `DEC-031`
requires startup/confidence handling but delegates its concrete development
method and reference response tuning; do not ask the owner to choose every
startup detail or finalize tuning first. `DEC-032` selects the isolated-extreme
negative trade-off and bounded constant/small-function calibration. `DEC-033`
plans no exact individual feedback history for the first-version calculation;
eligibility, correction and other-purpose evidence contracts remain open.
`DEC-034` excludes volatility calculation/adaptive dampening and reviewer-deviation
accountability from current implementation; both are preserved in
[future honor ideas](../specs/product-foundations.md#future-honor-ideas---outside-current-implementation)
and `DEF-006`. Do not treat future adoption or tuning as a current prerequisite.
`DEC-041` now selects communication, sportsmanship and effort on 1–10 scales
with a simple mean. `DEC-037` excludes original pre-made co-member ratings;
`DEC-038` selects non-public reputation; `DEC-039` excludes early-leaver ratings.
`DEC-040` selects a human inbox without punishment tools, but owner follow-up
explicitly approves automatic per-match outgoing-rating invalidation after two
distinct reporters before human review, with an admin tag. Automatic penalties
remain later planning, not this eligibility consequence.
`DEC-043` now settles feedback opening/ten-minute deadline and no-show vote/
response; `DEC-045` settles own score/reviewer/admin audiences. Reversible
submission/recovery/queue details are delegated, not an upfront questionnaire.
Specify remaining reporter-evidence and closure edges explicitly inside the
slice; preserve chosen report consequences and penalty exclusions. Original
question seven is now answered/delegated by `DEC-047`/`DEC-048`: retain actual
first-pass evidence without expiry pending `DEF-012`, and delegate identity/
rank with an approved declared-rank fallback. No exact-history scoring returns.
Initial correctness checks accompany implementation; full behavioral
calibration can follow in development before release or real-user operation.

Choose the lowest-complexity trust model that satisfies the approved product
purpose:

1. What feedback and reputation presentation supports the approved honor
   matching role: private structured feedback, endorsements, visible score,
   reports, or a bounded combination?
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

**Current owner sequencing:** original questions one through seven are now
answered, delegated or deferred for this first pass. `DEC-047` retains actual
stored feature records without expiry and schedules the final retention
decision for the immediate second pass (`DEF-012`). `DEC-048` delegates
identity/ownership/rank selection and approves self-declaration plus teammate
discrepancy checks when official access is unavailable/gated or needs more
owner decisions. Do not ask those questions again before drafting the concrete
implementation packet. Stored moderation evidence does not change smoothed
honor calculation. Original question numbers are not these decision-group IDs.

The following is data-specification and later-review coverage, not seven
additional owner questions or a requirement to finalize every item now:

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
boundary, and assigned reviews. First-pass retention is already selected;
final retention/deletion policy returns in `DEF-012`. Actual flow, enforcement
and acceptance evidence still need to be written and tested.

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

**Current next step:** execute S1 of the [approved plan](first-pass/execution-plan.md).
DEC-052 approves the completed packet and its matched-team honor amendment;
the review gate is satisfied without an override. No new questionnaire is needed.
The checklist below explains the preparation already performed for this slice;
it must not route the implementation agent into repeating settled choices.

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

## Stack Recommendation — 2026-10-03

**Status:** core choices now selected in `DEC-050`: PostgreSQL, no initial
Redis, Blade/Livewire and Docker-based Pest/PHPUnit, PostgreSQL integration and
browser testing. Persistent database storage and synthetic test accounts are
required. `DEC-049` supplies the Laravel/Docker direction and Nginx preference.
This is not a complete approved technical design or execution plan. Supporting
tools and version numbers below remain agent recommendations for that packet;
do not label Reverb/Echo as separately owner-approved or reopen settled choices.

### Selected Direction And Supporting Recommendations

| Component | Recommendation | QGuard-specific reason |
| --- | --- | --- |
| Application | One Laravel 13 application on PHP 8.5, with internal modules | Keep accounts, parties, matching, honor and moderation together; no new service boundaries needed for this first pass |
| Database | PostgreSQL in Docker with persistent storage; version 18 proposed | Owner-selected engine; transactions and row locking fit simultaneous party allocation, chat, session settlement and background work |
| Frontend | Blade + Livewire 4, with Alpine for small browser interactions and Tailwind/Vite for assets | Retains the owner's PHP/Blade direction while supporting interactive queues, parties, forms and admin views |
| Live updates | Laravel Reverb + Echo, initially one Reverb process | Private website chat and lobby changes need prompt updates; this is unrelated to Discord/game joining |
| Jobs/cache | Laravel database-backed jobs and modest database cache/locks initially; no Redis service | Avoid another stateful service until measured load or an explicit feature needs it |
| Web server | Nginx + PHP-FPM | Matches owner familiarity and Laravel's documented deployment path |
| Environment | Docker Compose, with development and production variants | Containerized PHP, Composer, asset builds and tests; no host PHP/database installation dependency |
| Tests | Pest plus PHPUnit-style backend unit/integration/regression tests, PostgreSQL integration/concurrency and browser-flow tests in Docker | Owner-approved assertion-based coverage of backend behavior and every implemented first-pass user/admin flow, using synthetic seeded accounts |

Versions are proposed supported major lines, not frozen patch/image pins.
Resolve and test the exact package/extension combination during approved
implementation. Do not install the latest development/beta database or infer
compatibility from a documentation table alone.

### SQLite Versus PostgreSQL

SQLite is a credible low-complexity option and may serve a small first version
well. Its own documentation explains that writes to one file are serialized;
WAL improves reader/writer overlap but does not create independent concurrent
writers. QGuard will combine user writes, retained chat, queue allocation,
deadline jobs and honor settlement. PostgreSQL provides row-level concurrency
controls suited to those operations. This is a workload-fit recommendation,
not a measured throughput limit or a claim that SQLite cannot perform complex
queries or PostgreSQL is always faster.

PostgreSQL adds a running service, storage and backup administration. In the
requested Docker setup it is one additional Compose service, not a host
installation. Use persistent storage and tested backups later; containers do
not make database durability/operations automatic. Keep development and
database-dependent tests on the selected production engine to expose locking
and query differences early.

### Persistent Storage And Test Isolation

`DEC-050` requires data to survive normal image rebuilds and container
recreation. The agent's planning default is a stable named Docker volume for
PostgreSQL data, mounted at the selected image's documented data location.
This keeps data outside the container's disposable writable layer. A bind
mount is an alternative if a concrete host-directory requirement justifies it;
the owner selected persistence, not a particular mount syntax.

A named volume is still managed by Docker; it is not storage independent of
the Docker host/VM, not a backup and not protection from deleting the volume
or resetting Docker's storage. Normal scripts must not remove application data
volumes or run destructive database resets as a rebuild step. Keep volume
identity stable across the normal documented workflow. Plan a rebuild/recreate
survival check with a known record in an isolated validation environment; the
test must verify the same data after recreation, not merely that a mount exists.
Major-version database upgrades require their own compatibility/migration plan.

Use separate test targets/credentials and resettable test storage so automated
test cleanup cannot affect the owner's persistent development database or a
future production database. Seeders/factories provide repeatable fictional
users, admin roles and multi-player scenarios without real linked game/Discord
accounts. Keep demo setup opt-in to its designated environment; do not silently
seed production or overwrite existing development records. Simulated provider
responses are app-test fixtures, not proof that held live integrations work.

### Required Test Coverage

`DEC-050` adds these requirements to the forthcoming acceptance packet:

- Assertion-based backend unit tests, integration tests and regression cases,
  including PHPUnit-style classes alongside Pest. Pest is built on PHPUnit;
  sharing that foundation does not require two copies of each assertion. Verify
  discovery/execution of both test styles with the chosen container commands.
- PostgreSQL-backed tests for real query, constraint, transaction and concurrency
  behavior. Use targeted real worker/driver tests where queue/cache correctness
  matters; blanket fakes or in-memory drivers cannot establish those behaviors.
- A coverage inventory for every implemented first-pass user/admin browser flow,
  including multi-account permissions and relevant empty, loading, validation,
  failure and recovery states. Verify actual UI interactions and outcomes,
  not just route status codes; include rendered review alongside automation.
- Regression tests preserve approved behavior and reproduce fixed bugs. Cover
  honor/feedback settlement, two-reporter eligibility, partial-party exclusions,
  matching compatibility, chat isolation and admin access within their approved
  specifications. These are coverage targets, not newly chosen algorithms.
- Docker execution commands and results for backend and browser suites; keep
  skipped/blocked/unimplemented checks visible. No arbitrary coverage percentage
  is substituted for demonstrating the specified behavior.

### Redis And Live Updates

Laravel supports database job and cache drivers. A single Reverb process can
be planned without its Redis-based multi-server fan-out. Use Reverb events for
timely updates and durable database state for recovery; neither Redis nor
WebSockets is the authority for membership, messages or honor.

There is no QGuard benchmark proving a negligible Redis benefit. `DEC-050`
approves omitting it initially. Reconsider if measured job delay, cache/lock
pressure or multi-Reverb deployment justifies it. Adding Redis later needs queue
delivery, locking, cache invalidation and rollback checks; it is not merely a cost-free switch.
Workers, scheduler and Reverb are still running processes, even when they
reuse the same PHP application image. Database jobs are background work, not
the product's player-matching queue. Laravel implements the job queue and cache
using PostgreSQL tables; PostgreSQL's own internal caching is not the Laravel
application cache, and PostgreSQL alone does not execute Laravel jobs.

### Frontend And Deployment Tradeoffs

Plain Blade with custom JavaScript is viable, but QGuard's reactive party/chat/
feedback screens would require more hand-written interaction plumbing.
Livewire keeps the main interface in Laravel/PHP. React or Vue with Inertia
remains viable if later UI needs justify a stronger client-side application;
the current features do not establish that need. Use browser-local interactions
where appropriate rather than unnecessary requests on every keystroke.
Do not require paid UI components or a hosted authentication product by adopting
this recommendation.

Nginx is recommended for fit and familiarity, not a benchmarked win over Apache.
Use a small Compose setup, not Kubernetes or a separate Node application backend.
Production would use built application/assets, production configuration,
secrets and persistent volumes; development bind mounts and the Vite dev server
are not a production deployment recipe. Exact service layout, provisioning,
code location, schema and milestones belong in the next technical packet.

### Source Ledger And Limits

Accessed 2026-10-03. These are primary documentation facts; choices above are
the agent's inference for QGuard, not vendor guarantees. Owner selections are
identified separately by `DEC-049`/`DEC-050`.

| Source | Supports | Does not establish |
| --- | --- | --- |
| [Laravel release policy](https://laravel.com/framework/docs/releases) | Laravel 13 supports PHP 8.3–8.5; release/support table | Tested compatibility of every selected dependency |
| [PHP supported versions](https://www.php.net/supported-versions.php) | PHP 8.5 active/security support | A working QGuard image or host PHP repair |
| [SQLite appropriate uses](https://www.sqlite.org/whentouse.html) and [WAL](https://www.sqlite.org/wal.html) | Single writer per database file; SQLite remains viable for many websites | A QGuard capacity threshold or inevitable contention |
| [PostgreSQL 18 locking](https://www.postgresql.org/docs/18/explicit-locking.html) | Row locks and concurrency behavior | A correct matching or settlement algorithm without tests |
| [Laravel starter kits](https://laravel.com/framework/docs/13.x/starter-kits) | Livewire 4/Blade-oriented UI path alongside React/Vue alternatives | Required use of paid components or external auth |
| [Laravel Reverb](https://laravel.com/framework/docs/13.x/reverb) | WebSocket server and Redis-based horizontal scaling | A measured single-process QGuard connection limit |
| [Laravel queues](https://laravel.com/framework/docs/13.x/queues) and [cache](https://laravel.com/framework/docs/13.x/cache) | Database-backed jobs and cache alternatives to Redis | Queue latency or negligible Redis benefit for this workload |
| [Laravel deployment](https://laravel.com/framework/docs/13.x/deployment) | Nginx/PHP serving configuration and environment requirements | Superiority over Apache or deployment approval |
| [Docker Compose production](https://docs.docker.com/compose/how-tos/production/) | Compose across environments with production-specific changes | Automatic backups, security or high availability |
| [Pest installation](https://pestphp.com/docs/installation) | Current PHP requirement and test tooling | A passed application/browser test suite |
| [Docker volumes](https://docs.docker.com/engine/storage/volumes/) | Docker-managed storage lifecycle separate from a container; volume reuse | A backup, immunity from volume deletion or a passed QGuard persistence check |
| [Pest/PHPUnit relationship](https://pestphp.com/docs/migrating-from-phpunit-guide) and [Laravel testing](https://laravel.com/framework/docs/13.x/testing) | Pest builds on PHPUnit; Laravel supports both and separate testing configuration | Discovery of every future test, fixture isolation or completed coverage |

### Route And Verification

- Baseline: clean `new-development` at `0a7f506`. Inspected actual manifests,
  legacy Compose/Docker/Nginx files and current product/decision/specification
  records. Legacy Laravel 12/Livewire/MySQL/Redis remains evidence only.
- Route: product planning; research/sourcing; deployment/environment;
  decision/recommendation and privacy/data implications; owner/external review.
  Applicable entry/system rules and selected procedures were read.
- Read-only Docker check: client and engine 29.6.1; Compose 5.3.0. Initial
  sandbox socket access was denied; an approved read-only version check reached
  the engine. No containers/images/volumes were created, started or changed.
- No application tests, dependency resolution, image build or benchmark ran.
  Host PHP test failure remains owner-reported and undiagnosed.
- Subsequent owner disposition: `DEC-050` explicitly selects PostgreSQL,
  no initial Redis, Blade/Livewire and testing direction, adds persistent
  storage, PHPUnit backend/regression coverage and synthetic browser accounts.
  Draft the detailed packet next; the application-specification approval gate
  remains. Supporting recommendations are not separate owner approvals.
- Confirmation unit baseline: clean `new-development` at `13d0657`. Route:
  product planning, research/sourcing, deployment/backup, privacy/data,
  decision/recommendation safety, owner/external review, audit/reconciliation,
  migration/seed planning and deferral/owner review. Selected rules were read;
  owner selections reconciled before edits. Current Docker/Pest/Laravel source
  checks clarify volume lifetime and test/queue responsibilities. No app tests,
  seeders, Docker commands, volume writes or live integrations executed. One
  project-document commit after scoped diff/link checks; canonical workflow
  unchanged, no push or deployment. Current-state verification holds results.

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

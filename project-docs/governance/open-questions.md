# QGuard Open Questions

These questions cover current QGuard product decisions and retained historical
limits. Under `DEC-015`, they are settled gradually in bounded discussions when
their dependencies become relevant; they are not one initial questionnaire.
Historical unknowns do not automatically become requirements.

**2026-10-03 planning update:** QG-FIRST-PASS-1 revision 1 now supplies concrete
proposed contracts for the bounded local first build. Start at the
[brief review](../planning/first-pass/README.md). `DEC-051` keeps packet approval
before coding. Remaining public-launch/provider questions are not a new broad
questionnaire or permission to leave first-pass contracts unspecified.

## OQ-001 - Is More Legacy Evidence Available?

- **Status:** resolved 2026-09-05 for the redesign phase
- **Decision owner:** project owner
- **Needed by:** closure of the legacy reconstruction
- **Blocks:** nothing; the reconstruction is accepted as sufficient without an
  exhaustiveness claim.
- **Does not block:** current product planning or bounded current research.
- **Known context:** The current corpus includes one 726-line owner-provided
  reconstruction, the tracked Laravel repository, its reachable history, and a
  recovered unreachable Electron relay history. No separate relay repository
  is present in the workspace.
- **Resolution:** The owner confirmed that the simplified reconstruction is
  sufficient because the new product will differ from the historical one. New
  evidence or corrections may still be incorporated if they arise.
- **Evidence needed:** none for current phase closure.
- **Resolved by:** `DEC-014`

## OQ-002 - How Should The Apex/Valorant Historical Conflict Be Interpreted?

- **Status:** resolved 2026-09-05 as a retained non-blocking ambiguity
- **Decision owner:** project owner
- **Needed by:** no current decision; retained for provenance
- **Blocks:** nothing. Neither game may be called the indisputable final old
  direction on current evidence.
- **Does not block:** current API feasibility research or current game
  selection after that research.
- **Known context:** Reachable Git chronology switches from Apex work to a
  Valorant prototype in December 2025. The later owner-provided reconstruction
  says the retained idea returned to an Apex pubs workflow. The owner clarified
  that the switches reflected concern about changing API/client capabilities,
  not a durable current preference for either game. Historical chronology must
  not choose the current game (`DEC-011`).
- **Resolution:** Retain both as feasibility-driven historical phases. The
  owner is not required to answer uncertain chronology from memory, and a
  stricter final-old-game label is unnecessary for redesign.
- **Evidence needed:** none unless new primary evidence is supplied later.
- **Resolved by:** `DEC-014`

## OQ-003 - Has The Historical Reconstruction Captured The Intended Level Of Detail?

- **Status:** resolved 2026-09-05
- **Decision owner:** project owner
- **Needed by:** transition to new product planning
- **Blocks:** nothing; the documentation-reconstruction phase is closed.
- **Does not block:** later corrections or decision-specific historical checks.
- **Known context:** The reconstruction covers product intent, journeys,
  features, matching/honor, game integration, architecture, data/security,
  interface, operations, implementation state, chronology, and conflicts. The
  owner has corrected the QGuard/TeamRadar naming interpretation and clarified
  that legacy capability intent and achieved outcome matter more than ordinary
  implementation method.
- **Resolution:** The owner accepted a simplified reconstruction as sufficient.
  Future historical inspection must be bounded to a current decision-relevant
  gap rather than resume general reconstruction.
- **Evidence needed:** none for phase closure.
- **Resolved by:** `DEC-014`

## OQ-004 - What Is The Current Product Charter And Permitted-Use Boundary?

- **Status:** open
- **Decision owner:** project owner
- **Needed by:** approval of a current product brief
- **Blocks:** approving QGuard's complete purpose/use boundary or audience,
  making public promises, or authorizing out-of-boundary implementation. The first-game
  choice was made separately under `DEC-018`.
- **Does not block:** reviewing the legacy reconstruction or discussing current
  alternatives as proposals; drafting the bounded first-pass specifications
  from settled decisions and explicit agent delegation.
- **Known context:** `DEC-009` selects QGuard as the product name. `DEC-010`
  makes behavioral honor/reliability, distinct from rank, the central concept.
  `DEC-011` prioritizes a working product over a predetermined first game.
  Present problem wording, target outcome, permitted/prohibited uses, audience,
  and public claims remain open; no legacy anti-toxicity promise is inherited.
  `DEC-025` selects session grouping; `DEC-037` adds basic friends/invitations
  and partial parties, while persistent-team management and past-teammate
  history UI remain excluded. `DEC-043` permits multiple games in a session.
  The remainder of the charter is still open; do not treat ordinary reversible
  details delegated by `DEC-042` as upfront owner blockers.
- **Decision components:** present problem, target outcome, allowed uses,
  prohibited uses, explicit non-goals, audience/age/geography, and claims the
  product may or may not make.
- **Decision aid:**
  [rewrite owner decision sequence](../planning/rewrite-owner-decision-sequence.md)
- **Resolved by:** none

## OQ-005 - What Is The First User And Market Wedge?

- **Status:** partially resolved: `DEC-018` selects Valorant, `DEC-025`
  selects session grouping and `DEC-037` includes partial parties/basic friends;
  `DEC-044` reaffirms Valorant for the first pass; remaining complete launch/
  audience boundaries are open, not a renewed first-game questionnaire
- **Decision owner:** project owner
- **Needed by:** current user journeys and MVP scope
- **Blocks:** complete platform/launch/audience approval and its affected
  acceptance criteria. Current game, solo/partial-party shape and session-end
  direction are selected; delegated queue controls are not owner blockers.
- **Does not block:** planning bounded CS2 or Valorant party-entry tests, rank
  research, or game-neutral product decisions.
- **Known context:** The legacy record contains conflicting Apex and Valorant
  phases and never settled region, platform, language, age, casual/competitive,
  solo/partial-party, or one-session/persistent-team boundaries. `DEC-011`
  makes selection feasibility-led, starts research with Apex and Valorant,
  leaves other games possible, and makes party size game-dependent. PC is the
  owner's provisional working direction, not an approved platform boundary
  (`DEC-015`). `DEC-016` prefers friendship-free ordinary-party entry and
  treats a friend/invite flow as a higher-friction fallback. `DEC-018` selects
  Valorant as the initial game subject to the non-friend lobby-link test before
  reliance. Later CS2 research found a documented non-friend Looking to Play
  route, but the owner rejected it for QGuard under `DEC-019`. `DEC-020` then
  clarified that the desired coordination group is a semi-automatable multi-
  person chat rather than a persistent Steam Community Group. Current Discord
  research shows the same bot-managed communication room can support either
  game, but only Valorant has an evidenced host-copied ordinary-party link. No
  comparable current CS2 Discord handoff is established. `DEC-021` accepts a
  designated-human-host Valorant flow if the lobby link passes and approves
  future generic Discord Game Invite checks for both games. Mode, platform/cross-
  play, launch region/language, primary user, party shape, and relationship
  duration remained open at that stage. `DEC-025` selects session grouping;
  `DEC-037` adds partial parties/basic friends. `DEC-043` selects participant-
  declared session completion across one or more games; reversible party
  readiness/recovery and persistence are delegated to the implementation agent.
- **Decision components:** **currently approved:** Valorant as initial game
  under `DEC-018`, session grouping under `DEC-025`, partial-party entry and
  basic friends/invitations under `DEC-037`. Lasting-team management and
  past-teammate history UI remain excluded, not basic friend requests.
  **Open:** full platform/launch-country/audience boundaries. `DEC-044`
  reaffirms Valorant and delegates initial region/language queue controls,
  not legal launch-country decisions. CS2 research stays historical/future
  comparison evidence, not a requirement to select the game again.
- **Resolved by:** `DEC-018`, `DEC-025`, `DEC-037`, `DEC-043` and `DEC-044` for
  game/session/party scope and delegated initial control design;
  later wedge components unresolved

## OQ-006 - What Matching, Trust, Moderation, And Data Behavior Is Permitted?

- **Status:** partially resolved by `DEC-026` through `DEC-048` for honor's
  first-version matching role, fixed newcomer baseline and bidirectional
  teammate-feedback effects with average/deviation-based direction and a
  separate smoothed raw reference, isolated-extreme trade-off and bounded
  development startup/calibration responsibility and no exact first-version
  feedback-history calculation, future-only extension exclusions
  and current queue/party/feedback/report/private-reputation directions;
  current session completion, feedback timing, native chat and private
  audiences now selected; reversible first-pass details delegated;
  first-pass retention and identity/rank responsibility now selected;
  actual contracts and acceptance specifications now drafted in QG-FIRST-PASS-1,
  awaiting packet approval; later public policy questions remain open
- **Decision owner:** project owner; qualified review may be required after a
  concrete flow exists
- **Needed by:** matching specification, data inventory, privacy review, and
  trust/safety acceptance criteria
- **Blocks:** implementing these flows before packet approval, and actual
  real-user collection/release without the remaining applicable reviews.
- **Does not block:** drafting the bounded local-development contracts and
  explicit non-goals under existing decisions/delegation.
- **Current owner direction, updated 2026-10-03:** `DEC-026` selects honor in
  matchmaking from the first session-grouping version, a common starting
  baseline and similar-honor grouping as history develops. Increasing the
  weight with history is a possible mechanism, not an approved rule. `DEC-027`
  selects a fixed neutral baseline and delegates equivalent numeric units and
  display scaling to the implementation agent, not behavioral or matching
  changes. `DEC-028` selects ordinary teammate feedback that can both raise and
  lower honor. `DEC-029` selects scaled ratings, average-based honor movement
  and dynamically less influence for ratings farther from recent feedback.
  `DEC-032` replaces the exact last-N comparison with the single-value smoothed
  raw reference, starting with adjustable development divisor 20. Standard
  deviation remains a possibility, not a selected metric; full scoring
  acceptance criteria and safeguards remain incomplete. `DEC-041` subsequently
  selects a narrow automatic report-based rating eligibility consequence;
  automatic penalties remain deferred. `DEC-030`/`DEC-032` keep the eligible reference input
  unadjusted despite separate honor dampening;
  evolving raw history is the intended behavior-change mechanism. Its response
  speed and resistance to abuse remain unverified. The owner explicitly selects
  automatic feedback-driven honor movement in both directions without admin
  intervention; that choice is resolved, not a remaining review gate.
  `DEC-031` requires initialization and confidence/sample-count handling and
  delegates its concrete development method to the implementation agent.
  Final raw-reference response tuning need not be selected before development;
  startup correctness and chosen settings still require documentation/tests.
  `DEC-032` explicitly accepts less immediate effect for an isolated extreme
  negative departure than a moderate negative input, with sustained feedback
  still moving the reference and honor. Development calibration may adjust
  constants and occasional small functions while preserving approved behavior;
  do not ask the owner to freeze every setting before development.
  `DEC-033` selects no exact individual feedback-history ledger or last-N buffer
  for the first-version honor calculation. `DEC-047` now retains actual
  first-pass feature records for review without expiry; scoring stays aggregate.
  Eligibility/correction and security still need compatible implementation
  contracts; retention-policy refinement is the second-pass `DEF-012`.
  `DEC-034` excludes incoming-rating volatility/adaptive dampening and
  reviewer-deviation accountability from current implementation. Preserve them
  for future consideration without making their questions current blockers.
  `DEC-041` now selects communication/sportsmanship/effort on 1–10 scales,
  averaged into one honor input, and pending report-aware settlement. Do not
  re-ask one overall versus dimensions. `DEC-035` selects with/without-voice
  queueing and excludes real Discord integration now. `DEC-036` selects hard
  game-rank compatibility, then honor closeness with wait-dependent widening.
  `DEC-037` adds friends/partial parties and excludes original pre-made
  co-member ratings. `DEC-038` selects non-public reputation. `DEC-039` selects
  the five-minute/30-second no-show direction and early-leaver ineligibility.
  `DEC-040` selects a human report inbox without punishment tools. The owner's
  follow-up explicitly approves automatic invalidation of the reported player's
  outgoing ratings for that match after two distinct reporters, before human
  review, with an admin tag; it is a consequence, not an automatic penalty.
- **Latest closure/delegation of original questions one through six, 2026-10-03:**
  1. **Feedback:** `DEC-043` selects Session ended for each participant and a
     ten-minute deadline from the first finalized feedback submission, with
     early settlement when everyone completes. A session may contain several
     games. Return prompting while pending and submission/closure edge cases
     must be specified/tested; reversible details belong to the agent, not a
     new upfront questionnaire. Two-report invalidation remains selected.
  2. **Matching:** `DEC-044` delegates region/language controls and reversible
     filtering defaults to the implementation agent, with first-build owner
     review and later passes. Actual game compatibility requires researched
     evidence. Widening constants are already delegated; no extra tuning question.
  3. **Sessions/parties:** no-show voting needs all other teammates, and an
     I joined acknowledgment stops removal (`DEC-043`). Original partial-party
     persistence is optional agent choice, not required now. Recovery details
     remain to specify under `DEC-042`; stronger involvement/anti-griefing
     verification is later `DEF-008`/`DEF-011`, not current Discord work.
  4. **Visibility:** own honor shown; no required received-feedback/history
     screen; reviewer identities hidden from players; data-cleared admins see
     available project case/account context, including reporter/rater identities
     and submitted contents (`DEC-045`). Enforcement and retention contracts
     are the data/security group, not unresolved audience choices.
  5. **Reports:** owner says to move on; preserve basic human review and
     automatic per-match outgoing-rating invalidation/admin tagging. Penalties
     remain later under `DEF-009`. Reporter-counting/early-leaver evidence edge
     details still require an explicit slice contract; do not silently change
     the two-distinct-reporters rule or assert those details were owner-selected.
  6. **Coordination:** native private matched-party text required and only
     no-Discord queueing active now (`DEC-046`). Future voice pools can wait;
     strict separation is the conditional planning fallback only if a current
     foundational dependency genuinely needs that answer. Real Discord remains
     deferred under `DEF-007`.
- **Original question seven disposition, 2026-10-03:** `DEC-047` selects
  retention of actual first-pass feature records without automatic expiry and
  full cleared-admin project access; review what exists and how long it should
  survive immediately afterward in pass two (`DEF-012`). `DEC-048` delegates
  identity/ownership/rank integration to the implementation agent using current
  evidence and approves self-declaration if official retrieval is unavailable,
  approval-gated or needs additional owner decisions. Display stated ranks in
  the matched lobby and ask about observed mismatches during Session ended.
  Peer observations remain distinguishable from official verification.
- **Owner discussion boundary:** no answer is missing from the questions just
  asked. Do not reopen original questions one through seven as a questionnaire.
  Draft/test the concrete first-pass contracts within the recorded decisions
  and delegation. Numbering differs from the older plan's decision-group IDs.
  Per-slice specification approval and real-user release gates remain.
- **Provisional mathematical discussion, 2026-10-02:** the owner's preference
  for a rating-point division parameter and an explicit new-input name is
  captured in the
  [honor notation discussion](../specs/product-foundations.md#provisional-honor-notation-discussion).
  Notation alone does not settle the full scoring contract or final curve
  tuning; `DEC-032` selects the reference and bounds development calibration.
- **Reference choice resolved, 2026-10-02:** `DEC-032` selects the single-state
  exponential recurrence instead of exact last-N history and an adjustable
  development response divisor of 20. See the
  [selected smoothed raw reference](../specs/product-foundations.md#smoothed-raw-rating-reference).
  The side handoff's exact-window and owner startup-question framing is stale.
  Startup delegation remains in force. `DEC-033` now narrows first-version
  planning to no exact feedback-history calculation; other-purpose data now
  follows `DEC-047` pending `DEF-012`. Future exact history would not
  automatically require or authorize a reference-model change.
- **Dispersion-dependent dampening proposal, 2026-10-02:** the owner asks
  whether a smoothed spread estimate can make normally wide ratings less
  dampened without storing individual history, and whether that improves
  responsiveness enough to justify larger score swings. The
  [evaluated proposal](../specs/product-foundations.md#rating-dispersion-adaptive-dampening-proposal)
  demonstrates a one-scalar option and bounded influence connection. The owner
  subsequently excluded this feature from current implementation under
  `DEC-034`, rather than selecting its adoption. No current volatility decision
  is needed; preserve the assessment for explicit future reopening.
- **Future reviewer-deviation idea, 2026-10-03:** `DEC-034` also preserves an
  undeveloped accountability idea beside volatility in
  [future honor ideas](../specs/product-foundations.md#future-honor-ideas---outside-current-implementation).
  Its detection direction and consequence to the reviewer's own honor remain
  unchosen. These future-only questions do not block current specifications or
  implementation; [DEF-006](deferred-work.md#def-006---reconsider-future-honor-ideas-on-owner-request)
  requires explicit reopening, adoption and applicable approval before execution.
- **Known context:** The legacy project proposed preference matching, honor,
  weighted reviews, session evidence, and reports but implemented no complete
  criteria, fairness controls, appeal path, retention rule, or rollback method.
  `DEC-010` approves behavioral honor as the central concept and keeps it
  separate from rank. `DEC-013` prefers authoritative API-derived rank and
  requires a report/correction/operator-resolution path for self-declared rank.
  `DEC-048` now approves that first-pass fallback and teammate mismatch checks;
  exact implementation effects and safeguards need a documented contract.
  Compliance with applicable law is a current constraint, while the actual
  jurisdiction and qualified-review need wait for a concrete product and data
  flow (`DEC-015`). The owner has now proposed temporary bot-managed QGuard
  Discord rooms and possible session-audio retention for operator review after
  a report. That is a proposal, not approval to create rooms, capture voice, or
  use recordings as evidence. `DEC-020` defines the desired communication object
  and automation criterion. Current first-party research finds that bot-created
  private text/voice channels in an existing QGuard Discord server can meet that
  criterion; application-created Group DMs are a constrained alternative. No
  Discord surface had been selected at that stage. `DEC-021` confirms that
  Group DMs are not needed if the server/private-channel model works, but preserves final server
  selection as the critical `OQ-011` gate. See the
  [Discord coordination and voice-evidence packet](../planning/discord-coordination-and-voice-evidence-options.md).
  `DEC-024` now selects Discord room/voice planning and the private matched-only
  text-channel link alternative. `DEC-035` later makes voice a queue choice and
  excludes real integration from this implementation; future admission,
  lifecycle, data and recording remain distinct.
- **Remaining work classification:** agent-owned reversible details, including
  queue controls and submission/recovery edges, are work to specify and test,
  not automatically owner blockers. First-pass identity/rank methods are now
  delegated by `DEC-048`; data contracts/security and release review still need
  drafting/evidence. Retention/deletion refinement returns in `DEF-012`, not
  as a question blocking first-pass development under `DEC-047`.
  No new history-dependent honor weighting or eligibility penalties are selected.
  Future Discord admission/lifecycle, recording, stronger checks and moderation
  penalty/correction/appeal policies remain deferred or unapproved, not current
  implementation requirements.
- **Resolved by:** `DEC-026` for honor's first-version matching direction;
  `DEC-027` for the fixed newcomer baseline and numeric-representation discretion;
  `DEC-028` for routine feedback that can raise and lower honor;
  `DEC-029` for average-based calculation and dynamic recent-history attenuation
  direction, not the complete formula or abuse-handling specification;
  `DEC-030` for the separate raw recent comparison and behavior-change direction;
  `DEC-031` for required startup/confidence handling, agent-selected development
  method and flexible raw-reference tuning;
  `DEC-032` for smoothed-reference replacement, isolated-extreme trade-off and
  bounded development calibration;
  `DEC-033` for no exact first-version feedback-history calculation;
  `DEC-034` for excluding volatility and reviewer-deviation accountability from
  current implementation while preserving both future ideas;
  `DEC-035` through `DEC-041` for the current voice, matching, partial-party,
  private-reputation, no-show, admin and feedback directions above;
  `DEC-042` through `DEC-046` for bounded development delegation, session/clock,
  initial filter responsibility, private audiences and native chat/current queue;
  `DEC-047` for interim retention and second-pass review, `DEC-048` for
  first-pass identity/rank delegation and declared-rank discrepancy checks;
  other components unresolved

## OQ-007 - What Delivery, Business, And Technical Constraints Govern The MVP?

- **Status:** core stack and testing direction settled by `DEC-049`/`DEC-050`;
  concrete technical/acceptance packet now drafted; approval pending under `DEC-051`
- **Decision owner:** project owner
- **Needed by:** technical specification and implementation plan
- **Blocks:** complete technical/operating and execution approval; not drafting
  from the selected stack or reopening the settled first-pass product answers.
- **Does not block:** architecture-neutral product decisions and targeted
  feasibility research, or agent drafting of the first-pass technical options,
  contracts and acceptance packet. Do not make the owner choose every reversible
  implementation detail under `DEC-042`/`DEC-048`.
- **Known context:** Laravel/Livewire/MySQL is only a legacy implementation;
  React, Node/NestJS, PostgreSQL, Redis, a desktop relay, Docker, and various
  deployment paths were historical evidence or proposals. `DEC-049` now
  selects Docker development/deployment and records the owner's Laravel/Nginx
  direction. `DEC-050` selects PostgreSQL, no initial Redis and Blade/Livewire,
  and requires persistent database storage and assertion-based backend plus
  browser testing in Docker with synthetic seeded accounts. The
  [current stack recommendation](../planning/rewrite-owner-decision-sequence.md#stack-recommendation--2026-10-03)
  distinguishes these decisions from supporting agent proposals such as
  Reverb/Echo and exact versions; no legacy reuse implied.
- **Decision components:** validation goal and success measures, business model,
  product surfaces, delivery horizon/resources, integration constraints,
  availability/security expectations, environments, release strategy, and
  testable completion evidence.
- **Current readiness:** [QG-FIRST-PASS-1](../planning/first-pass/README.md) supplies
  the new-code layout, slice specifications, acceptance package and execution
  plan. Owner packet approval under `DEC-008`/`DEC-051` remains before coding;
  no broad owner questionnaire or repeated stack selection is needed.
  Long-term business, public launch and production operations are later-stage
  questions where they do not affect the bounded development slice.
  See [current assessment](../current-state.md#first-pass-readiness-review--2026-10-03).
- **Resolved by:** `DEC-049`/`DEC-050` for stack/environment/test direction;
  concrete packet and later operational components remain as above

## OQ-008 - What Workflow Governance Conventions Should Control Future Work?

- **Status:** resolved 2026-09-04
- **Decision owner:** project owner
- **Needed by:** resumption of current-product decision sessions
- **Blocks:** nothing; this formerly blocked the product charter and
  specification approval sequence.
- **Does not block:** current-product owner review may now begin.
- **Known context before resolution:** `DEC-003`, `DEC-004`, and `DEC-006` make
  the portable workflow primary, separate TeamRadar-specific records, require
  documented routing and evidence-backed completion, and keep local-only
  material outside Git. The canonical workflow already defines authority
  order, record classes, owner and agent roles, review independence, additive
  local commits, and separate authorization for remote or destructive actions.
  Before this review, they did not decide the owner's preferred approval
  phrasing, threshold for TeamRadar-specific operating-rule changes, or future
  specification approval shape.
- **Resolution:** Component 1 is resolved by `DEC-007`; components 2 through 8
  are resolved by `DEC-008` and the linked TeamRadar-specific
  [workflow-governance policy](../operations/workflow-governance.md).
- **Decision components:**
  1. **Resolved by `DEC-007`:** any change to the portable canonical workflow
     requires advance explicit owner approval;
  2. **Resolved by `DEC-008`:** routine approved-policy applications may be
     created directly; material governance changes require advance approval;
  3. **Resolved by `DEC-008`:** ordinary unambiguous approval is sufficient for
     non-critical choices, with restatement and recording; critical choices
     require deliberate explicit confirmation;
  4. **Resolved by `DEC-008`:** material changes supersede through a new
     decision; minor corrections may be edited in place;
  5. **Resolved by `DEC-008`:** use modular specifications and require the
     applicable approved set per implementation slice unless explicitly
     overridden;
  6. **Resolved by `DEC-008`:** create coherent, independently viable local
     commits without per-file or ceremonial commit approval;
  7. **Resolved by `DEC-008`:** keep high-stakes decisions bounded and permit
     agent-judged batching of independent low-risk choices; and
  8. **Resolved by `DEC-008`:** the current owner is the sole authority unless
     another authority or specialist input is explicitly named and scoped.
- **Options/tradeoffs:** resolved by the owner; rejected alternatives are
  recorded in `DEC-008`.
- **Evidence needed:** none; the owner answered all eight components.
- **Resolved by:** `DEC-007` and `DEC-008`

## OQ-009 - What Current Game Integrations Can QGuard Reliably And Permissibly Use?

- **Status:** Discord comparison complete; `DEC-018` remains current; Valorant
  party-entry verification remains open; first-pass rank/identity selection
  delegated under `DEC-048`, actual provider access/capability still unverified
- **Decision owner:** project owner after research; primary agent owns research
- **Needed by:** first-game and integration-boundary decision
- **Blocks:** replacing the current first-game decision without owner approval;
  treating the Valorant link or any CS2 Discord party handoff as dependable;
  claiming unsupported rank/access capability; or approving client automation.
- **First-pass disposition:** research the actual official identity/rank flow
  during implementation and use it if feasible and accessible. Otherwise use
  the `DEC-048` declared-rank fallback with teammate discrepancy checks.
  Missing Riot approval or a further owner choice does not block that fallback.
  No requirement to ask the owner for a hypothetical ownership-verification
  policy first; record/test the agent's chosen method and review the build.
- **Does not block:** product-charter decisions that do not depend on a game or
  integration, or current authoritative-source research.
- **Known context:** The owner values reliable rank retrieval and local-client
  party/lobby creation/joining because they may substantially reduce user
  friction, but neither is an absolute product requirement. Legacy API claims
  are stale and current capability, access, permission, and stability are
  unknown (`DEC-011`, `DEC-013`).
- **Options/tradeoffs:** supported official integration; approval-gated or
  conditional integration; partial integration plus fallback; manual/no
  integration; or another game after the initial candidates are assessed.
- **Research result:** Neither original candidate has a documented public path that
  fully provides both exact current rank for every participant and ordinary
  public/ranked-party automation. Valorant is closer through an approval-gated
  opt-in LFG/RSO path and an official user-mediated lobby link. The link can be
  shared in a Discord server, DM, or elsewhere, but exact non-friend recipient
  prerequisites have not been live-verified. Apex LiveAPI's documented lobby
  control is for Custom Matches, and no Apex-specific Discord Join or shareable
  ordinary-lobby code/link was found. The scoped policy review found no
  anti-cheat conflict for external LFG or official user-mediated joining;
  unauthorized client automation or extraction remains restricted. See the
  [general findings](../research/game-api-feasibility-findings.md) and focused
  [party-entry findings](../research/party-entry-and-policy-fit.md). A later
  [CS2 follow-up](../research/counter-strike-2-party-entry-feasibility.md)
  established feature evidence for Looking to Play and a documented Steam
  OpenID identity path, but `DEC-019` rejects Looking to Play for QGuard. The
  later [Steam communication/group follow-up](../research/steam-nonfriend-communication-and-group-feasibility.md)
  found shareable group-chat links with text/voice and non-friend Community
  Group admission. It found no supported QGuard chat/group management API, and
  no current first-party confirmation that the old Steam Group Lobby path still
  works in CS2. `DEC-020` clarified that neither persistent Community Group
  membership nor a manual chat is the preferred coordination model. The
  [Discord coordination/game-join comparison](../research/discord-coordination-and-game-join-comparison.md)
  establishes supported bot-created private server text/voice channels and
  constrained link/OAuth admission. It confirms the host-copied Valorant link,
  distinguishes that link from direct Discord-friend invites and generic Game
  Invite/Join, and finds no current first-party Discord Game Invite for an
  ordinary CS2 party. The link may be delivered outside Discord, but exact
  account-linking, non-friend, delivery-surface, region, and network behavior
  remains unverified. Application-created Group DMs are documented but weak
  because of their deprecated-SDK origin, ten-active-room cap, and lack of a
  bot member.
- **Owner decision:** Select Valorant for current product planning. Before
  relying on its official link, test two current accounts in a supported PC
  region/client state where the recipient is neither the host's Riot friend nor
  formal Discord friend (`DEC-018`). This remains current and is reinforced,
  not behaviorally proven, by the Discord comparison.
- **Evidence needed:** the decision-blocking
  [coordination and party-entry validation program](../planning/coordination-and-party-entry-validation-program.md)
  before owner disposition of the coordination/game handoff; the selected rank
  behavior and provider-access path; and fresh provider evidence before any
  integration specification or application. A queued or activated test is not
  current evidence of a supported route.
- **Resolved by:** `DEC-018` for game selection and `DEC-024` for Discord
  coordination planning; `DEC-048` for first-pass identity/rank delegation and
  fallback. Behavioral verification and actual provider access remain unproven.

## OQ-010 - What QGuard Flow Applies When A Preferred Game Integration Is Unavailable?

- **Status:** partially resolved by `DEC-018` and `DEC-024`; Discord-native Join
  is preferred with a private-Discord-text human-hosted link alternative;
  failure of both joining methods and later recovery remain open;
  first-pass rank fallback selected by `DEC-048`
- **Decision owner:** project owner
- **Needed by:** the smallest complete user journey and its recovery behavior
- **Blocks:** approving a different party-formation flow or associated
  friction/acceptance criteria when both preferred joining methods fail.
- **Selected rank fallback:** under `DEC-048`, self-declaration may be used
  if official rank access is unavailable, approval-gated or needs more owner
  decisions. Display stated ranks to the matched team and collect observed
  mismatch feedback at Session ended; document evidence limits and handling.
- **Does not block:** API research or documenting owner-proposed alternatives as
  proposals.
- **Known context:** API-derived rank and automated or assisted party formation
  are preferred but not mandatory. Self-declared rank with reports is one
  bounded fallback direction; the owner has additional alternate project flows
  to discuss after current API capabilities are known. `DEC-016` now orders the
  party paths: official friendship-free join/link, another official
  friendship-free ordinary-lobby code/link, then friend/invite as the last
  fallback. Valorant has an official user-copied lobby link; Apex ordinary party
  formation remains the friend/invite flow. `DEC-017` keeps a conditional
  prototype-first Riot application path available when the Valorant flow needs
  RSO. `DEC-018` selects Valorant and requires the non-friend link test before
  reliance. `DEC-019` rejects CS2 Looking to Play. `DEC-020` requires the
  evaluated communication-group route to be automatable or semi-automatable and
  link/code/OAuth accessible. Bot-created private Discord server channels meet
  that coordination criterion as a researched candidate. Valorant's host-
  copied party link may instead be carried by a QGuard-native room; the link,
  direct formal-Discord-friend invite, and generic Discord Join are separate
  mechanisms. No equivalent current CS2 Discord party handoff is established.
  `DEC-021` accepts the designated-human-host Valorant handoff if it passes and
  approves future generic Game Invite checks for both games. Communication
  still does not prove game-party entry.
- **Options/tradeoffs:** use the later-approved QGuard or Discord coordination
  surface with a passing Valorant link; accept a constrained Discord Group DM;
  relax the criterion to manual Steam chat or friend-based party formation; or
  return to the owner before using another party flow, game, or materially
  different Custom Match product. Rank still requires an approved official,
  partial, or truthfully labelled fallback behavior.
- **Evidence needed:** `OQ-009` findings; the combined coordination/party-entry
  test results; remaining operational coordination decisions; and the owner's
  alternate flow proposals and tolerance for added user friction.
- **Resolved by:** `DEC-018` for game direction; `DEC-024` for the two accepted
  replaceable joining candidates and the private Discord link-sharing surface;
  `DEC-048` for the first-pass rank fallback

## OQ-011 - Which Coordination Backbone And Party-Handoff Dependency Should QGuard Use?

- **Status:** partially resolved by `DEC-024`, `DEC-035` and `DEC-046`: native
  private match chat and only no-Discord queueing now; optional future Discord
  voice queueing and replaceable joining are selected, but real Discord
  implementation is outside current scope; operational specifications and evidence
  remain open. Discord-dependent execution
  is on the [2026-09-28 owner hold](deferred-work.md#owner-hold--discord-access--2026-09-28)
- **Decision owner:** project owner
- **Needed by:** first coordination specification and complete party-handoff
  journey
- **Blocks:** actual integration reliance without live evidence and approved
  relevant data/operational contracts. Native chat also needs its data/security
  contract, but future Discord-specific choices do not block a no-Discord slice.
- **Does not block:** surrounding product specifications and, once their
  applicable specifications are approved, provider-independent implementation.
  Live execution remains subject to the owner hold and readiness conditions.
- **Settled direction:** `DEC-046` requires native private matched-party chat
  and only the no-Discord queue now. Future with/without-Discord-voice queue choice; real Discord
  integration postponed under `DEF-007`. For that future integration, preferred
  game-specific Discord Join or, as an acceptable alternative, one matched
  player posts the official lobby link into a matched-only Discord text channel.
  Actual game joining stays replaceable and unimplemented.
- **Next current work:** specify native chat data/access and permission tests,
  applying `DEC-047` retention without automatic expiry until `DEF-012` review.
  Do not re-ask native text, current voice availability or
  universal Discord participation. Future voice-pool separation waits unless
  current architecture actually needs it, in which case strict separation is
  the approved conditional default. Future attendance/recovery, Discord
  admission/lifetime/cleanup still need slice rules when integration returns.
  No native voice or compulsory Discord is inferred.
- **Known facts:** Discord's documented APIs support creating private server
  text/voice channels, member/role permission overwrites, constrained server
  invitations, OAuth `guilds.join` admission, messages/interactions within
  granted permissions, and channel/access cleanup. Participants do not need to
  be formal Discord friends. Discord Group DMs are a weaker alternative because
  the application endpoint has a deprecated-SDK origin, a ten-active-room cap,
  and no bot participant. QGuard-to-Discord OAuth or shared-channel presence
  does not join a game party. Riot separately documents (1) inviting formal
  Discord friends from Valorant and (2) copying a lobby link that can be shared
  in a server or elsewhere. The copied link's exact non-friend, recipient-link,
  and restricted-region behavior remains under `DEF-001`; generic Discord
  Game Invite/Join behavior remains under `DEF-002`.
- **Historical owner direction:** The server/private-channel flow matched
  the owner's intended shape. If it works, a Group DM is unnecessary. The owner
  classified final selection as a very important backbone decision and asked
  that it be presented only after the host-flow and test clarifications were
  resolved (`DEC-021`). The owner now identifies current Turkish Discord
  restriction and a VPN-dependent test path as a material availability
  constraint, and proposes delivering the host link through QGuard itself.
- **Historical test-first direction, partly superseded:** Do not choose among
  these options from current documentation alone. Execute the copied-link,
  game-specific Discord Join,
  Discord private-room lifecycle, Steam group-chat, and current CS2 alternative
  tests first, then return the reconciled comparison (`DEC-023`).
- **Earlier owner approval, 2026-09-28:** `DEC-024` explicitly approves that
  planning direction ahead of live tests and clarifies matched-only Discord
  text for the link alternative. The
  [coordination specification](../specs/coordination-and-party-handoff.md)
  separates approved requirements from draft detail. No further confirmation
  of this basic choice is needed; `DEC-008` slice approvals and the live-test
  hold remain in force.
- **Latest owner direction, 2026-10-03:** `DEC-035` partially supersedes the
  universal Discord planning/timing interpretation. Voice is a queue option;
  actual integration waits for relevant availability and owner-run live tests.
  `DEC-046` subsequently selects native website text and no-Discord-only queueing
  for this implementation. No new Riot release status or successful test is
  established by these answers.
- **Readiness result:** the
  [resource and sequence plan](../planning/coordination-test-resources-and-sequence.md)
  splits every case and preserves a clean order. Two participant bundles on two
  gaming PCs cover the core game tests. A rigorous Discord-room test additionally
  needs an ordinary outsider and a separate owner/admin identity because
  administrators bypass channel restrictions. Targeted-user/role-bearing
  invites are the preferred first Discord admission case. The neutral-relay
  Valorant copied-link cases run first.
- **Historical option A consequence:** every matched user can coordinate and
  receive the link inside QGuard without joining a Discord server. At minimum QGuard owns
  roster/readiness, host assignment, link submission, access isolation, expiry,
  and secret-safe handling. Discord can still offer optional voice or a verified
  Join optimization. Full native free-form chat and native voice remain
  separate scope choices.
- **Historical option B consequence:** Discord is the normal room, but QGuard
  must also own a functioning restricted-region/failure fallback. This creates two user
  journeys and two surfaces to specify, test, secure, and support.
- **Historical option C consequence:** Discord accounts/access become first-flow
  dependencies and QGuard must explicitly exclude or degrade regions where the
  provider or Riot/Discord integration is unavailable. A VPN cannot be treated
  as an invisible universal prerequisite.
- **Earlier agent recommendation, not selected:** Option A. A minimal native
  room can relay the copied Riot link because the documented delivery surface is not Discord-only. It
  minimizes the required external dependency while preserving Discord as an
  enhancement. This is a proposal, not owner approval.
- **Decision-order correction:** `DEC-024` superseded only the wait-before-
  planning-selection part of `DEC-023`. The earlier native-room recommendation
  does not override owner authority. `DEC-035` now makes Discord optional and
  delays its implementation. `DEC-046`, not the earlier agent recommendation,
  now approves native private match text. No test pass is claimed.
- **Evidence limit:** current documentation establishes capability, not QGuard
  or Turkey behavior. A later approved prototype/test must verify the selected
  room's isolation, expiry, admission/failure states, lobby-secret handling,
  and cleanup. `DEF-001` must also establish whether the host and/or recipient
  needs Discord account linking and whether a non-Discord delivery surface
  works.
- **Live integration evidence:** applicable outcomes from the preserved set in the
  [coordination and party-entry validation program](../planning/coordination-and-party-entry-validation-program.md),
  including recorded prerequisites, negative results, cleanup, and residual
  uncertainty.
- **Closure evidence:** approved operational specifications for attendance,
  admission, lifecycle, permissions, data, host/recovery and regional handling;
  applicable live behavior evidence before real integration reliance. Voice
  recording remains outside this decision. Do not re-ask the basic provider choice.
- **Resolved by:** `DEC-024`/`DEC-035`/`DEC-046` for native chat/current queue,
  optional future voice planning, integration deferral and replaceable alternatives;
  the remaining specification and live-evidence items stay open

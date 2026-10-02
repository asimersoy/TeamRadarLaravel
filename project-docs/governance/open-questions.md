# QGuard Open Questions

These questions cover current QGuard product decisions and retained historical
limits. Under `DEC-015`, they are settled gradually in bounded discussions when
their dependencies become relevant; they are not one initial questionnaire.
Historical unknowns do not automatically become requirements.

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
  making public promises, or authorizing an implementation plan. The first-game
  choice was made separately under `DEC-018`.
- **Does not block:** reviewing the legacy reconstruction or discussing current
  alternatives as proposals.
- **Known context:** `DEC-009` selects QGuard as the product name. `DEC-010`
  makes behavioral honor/reliability, distinct from rank, the central concept.
  `DEC-011` prioritizes a working product over a predetermined first game.
  Present problem wording, target outcome, permitted/prohibited uses, audience,
  and public claims remain open; no legacy anti-toxicity promise is inherited.
  `DEC-025` now selects session grouping for the first version and excludes
  persistent-team management, past-teammate history UI and QGuard friend
  requests. The remainder of the charter is still open.
- **Decision components:** present problem, target outcome, allowed uses,
  prohibited uses, explicit non-goals, audience/age/geography, and claims the
  product may or may not make.
- **Decision aid:**
  [rewrite owner decision sequence](../planning/rewrite-owner-decision-sequence.md)
- **Resolved by:** none

## OQ-005 - What Is The First User And Market Wedge?

- **Status:** partially resolved: `DEC-018` selects Valorant and `DEC-025`
  selects session grouping; remaining wedge components and any deliberate
  disposition of the CS2 comparison are open
- **Decision owner:** project owner
- **Needed by:** current user journeys and MVP scope
- **Blocks:** finally settling the first-game wedge after the new CS2 evidence,
  selecting its platform/region/mode/audience remainder, queue design, surface
  design, and meaningful acceptance criteria.
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
  duration remained open at that stage. `DEC-025` now selects session grouping;
  session duration/completion and solo/partial-party entry remain open.
- **Decision components:** **currently approved:** Valorant as initial game
  under `DEC-018`, session grouping under `DEC-025`, with lasting-team
  management, past-teammate history UI and QGuard friend requests excluded
  from the first version. **Open:** whether the Discord coordination finding
  is enough to close the CS2 comparison unless later evidence changes; mode, platform/
  cross-play, launch region/language, primary user segment, party shape, and
  session duration/completion.
- **Resolved by:** `DEC-018` and `DEC-025` for game and session scope;
  later wedge components unresolved

## OQ-006 - What Matching, Trust, Moderation, And Data Behavior Is Permitted?

- **Status:** partially resolved by `DEC-026` through `DEC-031` for honor's
  first-version matching role, fixed newcomer baseline and bidirectional
  teammate-feedback effects with average/deviation-based direction and a
  separate raw recent-rating reference and bounded development startup/tuning
  responsibility;
  detailed trust/matching/moderation/data rules remain open
- **Decision owner:** project owner; qualified review may be required after a
  concrete flow exists
- **Needed by:** matching specification, data inventory, privacy review, and
  trust/safety acceptance criteria
- **Blocks:** collecting player or session data, ordering or excluding users,
  displaying reputation, accepting reviews/reports, or designing moderation.
- **Does not block:** selecting lower-risk alternatives and explicit non-goals.
- **Current owner direction, 2026-10-02:** `DEC-026` selects honor in
  matchmaking from the first session-grouping version, a common starting
  baseline and similar-honor grouping as history develops. Increasing the
  weight with history is a possible mechanism, not an approved rule. `DEC-027`
  selects a fixed neutral baseline and delegates equivalent numeric units and
  display scaling to the implementation agent, not behavioral or matching
  changes. `DEC-028` selects ordinary teammate feedback that can both raise and
  lower honor. `DEC-029` selects scaled ratings, average-based honor movement
  and dynamically less influence for ratings farther from a recent average
  over a configurable last-N history. Standard deviation is only a possibility;
  the metric, curve, window count and full formula remain open. Report
  consequences are not selected. `DEC-030` clarifies that eligible attenuated
  ratings still enter the recent reference at their full unadjusted values;
  evolving raw history is the intended behavior-change mechanism. Its response
  speed and resistance to abuse remain unverified. The owner explicitly selects
  automatic feedback-driven honor movement in both directions without admin
  intervention; that choice is resolved, not a remaining review gate.
  `DEC-031` requires initialization and confidence/sample-count handling and
  delegates its concrete development method to the implementation agent.
  Final raw-reference response tuning need not be selected before development;
  startup correctness and chosen settings still require documentation/tests.
  Exact-last-N versus smoothing remains a separate owner confirmation.
  Next discuss that replacement and one overall rating versus multiple
  behavioral dimensions; same-session ordering and full mathematics remain open.
  Response options, eligibility, visibility, matching and safeguards remain open.
- **Provisional mathematical discussion, 2026-10-02:** the owner's preference
  for a rating-point division parameter and an explicit new-input name is
  captured in the
  [honor notation discussion](../specs/product-foundations.md#provisional-honor-notation-discussion).
  This is explanation-level notation, not approval of the influence curve,
  parameters or full honor calculation.
- **New owner proposal, 2026-10-02:** replace the exact last-N raw reference
  with a single-state exponential recurrence, using a configurable divisor
  for response speed. See the
  [smoothed raw-reference assessment](../specs/product-foundations.md#smoothed-raw-rating-reference-proposal).
  The owner subsequently proposed divisor 20 as a development starting
  candidate and delegated startup and development tuning under `DEC-031`.
  Exact-model selection and any corresponding refinement of `DEC-029`/
  `DEC-030` await confirmation; the proposal does not decide raw-data retention.
- **Known context:** The legacy project proposed preference matching, honor,
  weighted reviews, session evidence, and reports but implemented no complete
  criteria, fairness controls, appeal path, retention rule, or rollback method.
  `DEC-010` approves behavioral honor as the central concept and keeps it
  separate from rank. `DEC-013` prefers authoritative API-derived rank and
  requires a report/correction/operator-resolution path if self-declared rank
  is later approved as a fallback. Exact effects and safeguards remain open.
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
  text-channel link alternative; attendance, admission, lifecycle, data and
  recording questions are not resolved by that selection.
- **Decision components:** directory versus queue versus recommendation;
  matching inputs and explanations; how honor similarity affects grouping,
  baseline and history weighting; reputation visibility and any additional
  ordering/eligibility effects; review/report scope; moderation/appeals; account and
  integration evidence; whether the required coordination baseline is native,
  Discord-primary, or Discord-required; invite versus OAuth admission if
  applicable; post-match membership/access cleanup; whether any voice is
  captured;
  and field-level purpose, consent, retention, deletion, access, security,
  evidentiary effect, and qualified review.
- **Resolved by:** `DEC-026` for honor's first-version matching direction;
  `DEC-027` for the fixed newcomer baseline and numeric-representation discretion;
  `DEC-028` for routine feedback that can raise and lower honor;
  `DEC-029` for average-based calculation and dynamic recent-history attenuation
  direction, not the complete formula or abuse-handling specification;
  `DEC-030` for the separate raw recent comparison and behavior-change direction;
  `DEC-031` for required startup/confidence handling, agent-selected development
  method and flexible raw-reference tuning, not model replacement;
  other components unresolved

## OQ-007 - What Delivery, Business, And Technical Constraints Govern The MVP?

- **Status:** open
- **Decision owner:** project owner
- **Needed by:** technical specification and implementation plan
- **Blocks:** selecting a stack, architecture, deployment model, milestone plan,
  budget, release target, or definition of done.
- **Does not block:** architecture-neutral product decisions and targeted
  feasibility research.
- **Known context:** Laravel/Livewire/MySQL is only a legacy implementation;
  React, Node/NestJS, PostgreSQL, Redis, a desktop relay, Docker, and various
  deployment paths are historical evidence or proposals, not current choices.
- **Decision components:** validation goal and success measures, business model,
  product surfaces, delivery horizon/resources, integration constraints,
  availability/security expectations, environments, release strategy, and
  testable completion evidence.
- **Resolved by:** none

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
  party-entry verification and rank/access boundaries remain open
- **Decision owner:** project owner after research; primary agent owns research
- **Needed by:** first-game and integration-boundary decision
- **Blocks:** replacing the current first-game decision without owner approval;
  treating the Valorant link or any CS2 Discord party handoff as dependable;
  approving the rank/access integration; or approving client automation.
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
  coordination planning; behavioral verification, rank and provider access
  remain unresolved

## OQ-010 - What QGuard Flow Applies When A Preferred Game Integration Is Unavailable?

- **Status:** partially resolved by `DEC-018` and `DEC-024`; Discord-native Join
  is preferred with a private-Discord-text human-hosted link alternative;
  failure of both methods, operational recovery and rank fallback remain open
- **Decision owner:** project owner
- **Needed by:** the smallest complete user journey and its recovery behavior
- **Blocks:** approving the rank fallback, party-formation flow, and associated
  friction/acceptance criteria when preferred APIs are unavailable.
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
  replaceable joining candidates and the private Discord link-sharing surface

## OQ-011 - Which Coordination Backbone And Party-Handoff Dependency Should QGuard Use?

- **Status:** partially resolved by `DEC-024`: Discord room/voice planning and
  replaceable joining are selected; operational specifications and evidence
  remain open. Discord-dependent execution
  is on the [2026-09-28 owner hold](deferred-work.md#owner-hold--discord-access--2026-09-28)
- **Decision owner:** project owner
- **Needed by:** first coordination specification and complete party-handoff
  journey
- **Blocks:** implementing a slice whose voice-attendance, admission, lifecycle,
  permissions, data, host/recovery or regional-access rules remain unapproved;
  claiming a live integration works without the applicable evidence.
- **Does not block:** surrounding product specifications and, once their
  applicable specifications are approved, provider-independent implementation.
  Live execution remains subject to the owner hold and readiness conditions.
- **Settled direction:** Discord rooms/voice in either joining flow; preferred
  game-specific Discord Join or, as an acceptable alternative, one matched
  player posts the official lobby link into a matched-only Discord text channel.
  Actual game joining stays replaceable and unimplemented.
- **Next decision:** must every matched player attend Discord voice, or is
  room provision sufficient with attendance optional? Then address Discord
  access/admission, room lifetime, host rules, permissions and recovery in
  bounded discussions. No native voice fallback or compulsory attendance is
  inferred from the choice of provider.
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
- **Latest owner approval, 2026-09-28:** `DEC-024` explicitly approves that
  planning direction ahead of live tests and clarifies matched-only Discord
  text for the link alternative. The
  [coordination specification](../specs/coordination-and-party-handoff.md)
  separates approved requirements from draft detail. No further confirmation
  of this basic choice is needed; `DEC-008` slice approvals and the live-test
  hold remain in force.
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
- **Decision-order correction:** `DEC-024` supersedes only the wait-before-
  planning-selection part of `DEC-023`. The earlier native-room recommendation
  does not override the selected Discord direction. No test pass is claimed.
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
- **Resolved by:** `DEC-024` for planning direction and replaceable alternatives;
  the remaining specification and live-evidence items stay open

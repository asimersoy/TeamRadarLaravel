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
- **Decision components:** present problem, target outcome, allowed uses,
  prohibited uses, explicit non-goals, audience/age/geography, and claims the
  product may or may not make.
- **Decision aid:**
  [rewrite owner decision sequence](../planning/rewrite-owner-decision-sequence.md)
- **Resolved by:** none

## OQ-005 - What Is The First User And Market Wedge?

- **Status:** first-game comparison reopened 2026-09-05; `DEC-018` still
  selects Valorant until deliberately superseded; remaining wedge components
  open
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
  route, but the owner rejected it for QGuard under `DEC-019`. Steam research
  now shows a promising group-chat text/voice path and public/request-based
  Community Group membership; whether a Community Group still permits non-
  friend ordinary-party entry in current CS2 is unverified. The owner has not
  yet said whether a passing group route would replace Valorant, remain a
  fallback, or keep both games open. Mode, platform/cross-play, launch region/
  language, primary user, party shape, and relationship duration remain open.
- **Decision components:** **currently approved but reopened for comparison:**
  Valorant as initial game under `DEC-018`. **Open:** whether CS2 supersedes or
  joins that direction; mode, platform/cross-play, launch region/language,
  primary user segment, party shape, and relationship duration.
- **Resolved by:** `DEC-018` remains current; new comparison unresolved

## OQ-006 - What Matching, Trust, Moderation, And Data Behavior Is Permitted?

- **Status:** open
- **Decision owner:** project owner; qualified review may be required after a
  concrete flow exists
- **Needed by:** matching specification, data inventory, privacy review, and
  trust/safety acceptance criteria
- **Blocks:** collecting player or session data, ordering or excluding users,
  displaying reputation, accepting reviews/reports, or designing moderation.
- **Does not block:** selecting lower-risk alternatives and explicit non-goals.
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
  use recordings as evidence. See the
  [Discord coordination and voice-evidence packet](../planning/discord-coordination-and-voice-evidence-options.md).
- **Decision components:** directory versus queue versus recommendation;
  matching inputs and explanations; whether reputation affects information,
  ordering, or eligibility; review/report scope; moderation/appeals; account and
  integration evidence; Discord coordination; whether any voice is captured;
  and field-level purpose, consent, retention, deletion, access, security,
  evidentiary effect, and qualified review.
- **Resolved by:** none

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

- **Status:** game comparison reopened after CS2 research; `DEC-018` remains
  current; party-entry verification and rank/access boundaries open
- **Decision owner:** project owner after research; primary agent owns research
- **Needed by:** first-game and integration-boundary decision
- **Blocks:** replacing the current first-game decision without owner approval;
  treating either the Valorant link or a Steam Community Group-to-CS2 party
  path as dependable; approving the rank/access integration; or approving
  client automation.
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
  works in CS2. Current behavioral tests remain required.
- **Owner decision:** Select Valorant for current product planning. Before
  relying on its official link, test two current accounts in a supported PC
  region/client state where the recipient is neither the host's Riot friend nor
  formal Discord friend (`DEC-018`). This remains current but is now subject to
  a deliberate owner comparison with CS2; the research alone did not
  supersede it.
- **Evidence needed:** owner disposition of the remaining comparison; the
  applicable scoped group-chat and Community Group/CS2 party tests; the
  Valorant link test if Valorant reliance advances; the selected rank behavior
  and provider-access path; and fresh provider evidence before any integration
  specification or application.
- **Resolved by:** `DEC-018` remains current for game selection; integration
  and reopened comparison unresolved

## OQ-010 - What QGuard Flow Applies When A Preferred Game Integration Is Unavailable?

- **Status:** partially resolved by `DEC-018`; candidate ordering, party-entry
  test failure, and rank fallback remain open
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
  reliance. `DEC-019` rejects CS2 Looking to Play. Steam group-chat invitation
  links may solve text/voice coordination without friendship, while a Steam
  Community Group may provide the old group-lobby bridge. Communication and
  group membership do not prove current CS2 party entry, and persistent group
  membership creates separate privacy, moderation, and admission friction.
- **Options/tradeoffs:** use the later-approved QGuard or Discord coordination
  surface with a passing Valorant link; use Steam Chat for communication only;
  accept a passing Community Group-to-CS2 party flow; or return to the owner
  before using friend invites, another party flow, another game, or a
  materially different Custom Match product. Rank still requires an approved
  official, partial, or truthfully labelled fallback behavior.
- **Evidence needed:** `OQ-009` research findings, the applicable party-entry
  live test or tests, plus the owner's alternate flow proposals and tolerance
  for added user friction.
- **Resolved by:** `DEC-018` for the preferred game/link direction only

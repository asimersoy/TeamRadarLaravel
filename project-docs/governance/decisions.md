# QGuard Decision Register

## DEC-001 - Reconstruct Before Redesign

- **Date:** 2026-09-02
- **Status:** approved
- **Decision owner:** project owner
- **Decision:** Reconstruct what the old TeamRadar idea was from idea dumps,
  implemented legacy behavior, documents, and historical branches before
  changing the new project's specification, product boundary, and permitted-use
  boundary.
- **Reason:** The old concept is context, not an adequate new specification.
- **Alternatives considered:** begin implementation immediately or treat the
  memory reconstruction as current canon; neither was selected.
- **Consequences:** Current work is evidence gathering and organization only.
- **Affected records:** all records under `project-docs/legacy/` and
  `project-docs/evidence/`
- **Return condition:** owner reviews/corrects the reconstruction and explicitly
  begins new product planning.
- **Supersedes:** none
- **Superseded by:** none

## DEC-002 - Legacy Code Reuse Is Not Required

- **Date:** 2026-09-02
- **Status:** approved
- **Decision owner:** project owner
- **Decision:** The half-finished Laravel app may inform the rewrite, but the
  new project is not required to use or recycle its code, architecture,
  technology, data model, or boundaries.
- **Reason:** The owner expects to write the project again after reconsidering
  it.
- **Alternatives considered:** continue the legacy app or mandate selective
  reuse; neither is required.
- **Consequences:** Future choices require fresh authority and evidence.
- **Affected records:** all future briefs, specifications, plans, and code
- **Return condition:** future records cite current decisions, not legacy state.
- **Supersedes:** none
- **Superseded by:** none

## DEC-003 - Separate Workflow From Project Records

- **Date:** 2026-09-02
- **Status:** approved
- **Decision owner:** project owner
- **Decision:** Keep reusable workflows, management guidelines, procedures, and
  templates under `portable-project-workflow-system/`; keep TeamRadar-specific
  facts, decisions, guidelines, plans, and evidence under `project-docs/`.
- **Reason:** Prevent generic operating rules from becoming mixed with project
  content or silently importing project decisions.
- **Alternatives considered:** initialize TeamRadar records inside the portable
  package; rejected for this repository.
- **Consequences:** `AGENTS.md` links the two trees, while each tree keeps one
  responsibility.
- **Affected records:** `AGENTS.md`, `project-docs/`,
  `portable-project-workflow-system/`
- **Return condition:** repository review confirms no TeamRadar-specific record
  was added to the portable package.
- **Supersedes:** none
- **Superseded by:** none

## DEC-004 - Evidence And Completion Discipline

- **Date:** 2026-09-02
- **Status:** approved
- **Decision owner:** project owner
- **Decision:** Route work through the documented checklist, preserve unrelated
  work, separate facts/decisions/assumptions/proposals/questions/deferrals, and
  require evidence-backed completion.
- **Reason:** Explicit owner instruction.
- **Alternatives considered:** informal chat-only tracking; not selected.
- **Consequences:** Historical records and agent reports are evidence, not
  approval. Remote, destructive, production, publication, and history-rewrite
  actions require explicit authorization.
- **Affected records:** repository operating instructions and all task records
- **Return condition:** every substantive task identifies route, authority,
  verification, and residual risk.
- **Supersedes:** none
- **Superseded by:** none

## DEC-005 - Use The Repository Root As The Local Project Boundary

- **Date:** 2026-09-03
- **Status:** superseded
- **Decision owner:** project owner
- **Decision:** Use `/Users/asime/Github/TeamRadarLaravel` as the primary local
  project folder and normal workspace boundary. Remove the broader
  `/Users/asime/Github` folder from the project. When a specific external path
  or operation is needed, the agent may request narrowly scoped access and the
  request will be reviewed for approval or rejection.
- **Reason:** Keep routine TeamRadar work focused and isolated without making
  legitimate, reviewed external access impossible.
- **Alternatives considered:** retain the entire GitHub parent as an attached
  workspace folder; not selected.
- **Consequences:** Repository commands must target the TeamRadar root. Sibling
  repositories and other external files are outside ordinary project scope.
  Approval for one external action does not authorize unrelated access or
  expand product scope.
- **Affected records:** `project-docs/current-state.md`, active task routes, and
  execution reports that rely on external files
- **Return condition:** revisit only if the project acquires a durable,
  documented dependency outside the repository.
- **Supersedes:** none
- **Superseded by:** `DEC-006`

## DEC-006 - Separate The Non-Git Workspace From The Canonical Repository

- **Date:** 2026-09-03
- **Status:** approved
- **Decision owner:** project owner
- **Decision:** Keep `/Users/asime/Github/TeamRadarLaravel` as the primary
  non-Git workspace container and move the complete active Git repository into
  its `TeamRadarRepository/` child. Keep the canonical project-neutral workflow
  package versioned and unchanged inside that repository. Record
  TeamRadar-specific workflow adaptations separately under `project-docs/`.
  Use outer `sources/`, `scratch/`, `outputs/`, and `snapshots/` folders for
  non-versioned material according to the tracked workspace-layout policy.
- **Reason:** Allow raw inputs, volatile builders, generated artifacts, and
  recovery archives to live outside Git without expanding application
  `.gitignore`, while preserving one authoritative workflow and one active
  repository history.
- **Alternatives considered:** keep the Git repository at the workspace root;
  move the canonical workflow package outside Git; or put all generated/local
  material inside ignored repository folders. The owner selected the nested
  repository and explicitly retained the canonical workflow package as primary.
- **Consequences:** The outer workspace is routing/storage only and cannot
  become a competing source of truth. Durable project facts, decisions,
  approvals, plans, and completion evidence remain tracked. Git commands must
  target `TeamRadarRepository/`. App-level Git/worktree actions require target
  verification because the primary workspace folder itself is non-Git.
- **Affected records:** root `AGENTS.md`, `project-docs/current-state.md`,
  `project-docs/operations/workspace-layout.md`, active planning records, and
  workspace migration evidence
- **Return condition:** revisit if the repository is renamed, split into
  multiple active repositories, or a generated artifact is intentionally made
  a tracked product asset.
- **Supersedes:** `DEC-005`
- **Superseded by:** none

## DEC-007 - Protect The Canonical Workflow And Extend Through Project Records

- **Date:** 2026-09-04
- **Status:** approved
- **Decision owner:** project owner
- **Decision:** Keep exactly one canonical
  `portable-project-workflow-system/` folder. Do not modify it without the
  owner's explicit advance approval for the exact change. Design normal
  TeamRadar work so project-specific paths, operating rules, guidelines,
  decisions, routes, and future specifications are added or changed under
  `project-docs/` instead. If the primary agent discovers a genuinely reusable
  workflow gap, it may report or propose a general change but must not apply it
  to the canonical package without that approval.
- **Reason:** The owner wants the portable package to remain a stable primary
  workflow and expects normal project evolution to occur entirely through the
  TeamRadar-specific record tree.
- **Alternatives considered:** create an original copy plus a mutable
  TeamRadar/story-specific copy, or allow routine agent edits to the portable
  package. The owner corrected and withdrew the duplicate-copy idea before any
  such filesystem action occurred; neither alternative was selected.
- **Consequences:** The canonical package has one identity and cannot drift
  through project work. TeamRadar-specific extensions must remain visibly
  separate and may not weaken or contradict the canonical system. A conflict
  or apparent need to change the package is an owner gate.
- **Affected records:** repository `AGENTS.md`,
  `project-docs/operations/workspace-layout.md`, current state, active
  workflow-governance review, and future project-specific operating and
  specification records
- **Return condition:** only an explicit owner-approved portable-workflow
  change may reopen the package; that task must be separately routed, scoped,
  validated with the package validator, and committed as its own coherent unit.
- **Related decisions:** strengthens `DEC-003` and `DEC-006`
- **Supersedes:** none
- **Superseded by:** none

## DEC-008 - Adopt The TeamRadar Workflow Governance Contract

- **Date:** 2026-09-04
- **Status:** approved
- **Decision owner:** project owner
- **Decision:** Apply the TeamRadar-specific operating contract in
  `project-docs/operations/workflow-governance.md`:
  1. the primary agent may create or refine project-specific rules that merely
     apply approved policy, but must obtain owner approval before changing
     authority, approval requirements, gates, risk tolerance, scope, or the
     definition of done;
  2. unambiguous ordinary owner language may approve non-critical choices; the
     agent must restate and durably record the precise interpretation, while
     critical choices require a deliberate explicit confirmation even though
     no magic approval phrase is required;
  3. material decision changes receive a new superseding decision, minor
     corrections may be edited in place with Git history, and apparent
     contradictions require clarification;
  4. future specifications use a modular `project-docs/specs/` suite, and each
     implementation slice requires its applicable specifications to be
     approved unless the owner explicitly records a narrow override;
  5. local commits are additive, coherent, reversible, independently sound
     units rather than one commit per file; deployable changes must be safe to
     push or deploy without depending on a later commit for correctness;
  6. pushes, pull requests, deployments, destructive operations, and history
     rewrites require separate exact authorization, including before beginning
     execution of a plan that intends one of those operations;
  7. owner review uses bounded decision groups, with high-stakes matters kept
     small and independent low-risk, low-tradeoff, easily reversible choices
     batchable at the primary agent's judgment; and
  8. the current owner is the sole approving authority unless the owner
     explicitly names another owner or reviewer and their domain and scope, or
     explicitly identifies pasted specialist input as approved for a stated
     domain.
- **Reason:** Establish predictable interaction, approval, specification,
  review, and version-control behavior before product decisions begin while
  avoiding unnecessary cost and ceremonial back-and-forth.
- **Alternatives considered:** require a fixed approval keyword; require owner
  approval for every project-document change and local commit; create one
  monolithic specification; commit per file; batch all decisions regardless of
  risk; or infer reviewer authority from unattributed material. None was
  selected.
- **Consequences:** Routine approved-policy applications can proceed and be
  reported afterward. Material governance changes remain owner gates. Explicit
  overrides are narrow, restated, and recorded; they do not grant unrelated
  remote, destructive, production, publication, or history-rewrite authority.
  Commit boundaries must be chosen around independently viable units, not file
  count.
- **Affected records:** repository `AGENTS.md`, current state, open questions,
  `project-docs/operations/workflow-governance.md`, specification index,
  planning records, and active/completed task routes
- **Return condition:** revisit only through an explicit owner instruction that
  identifies the affected convention; record material changes as a new
  superseding decision and assess dependent specifications, plans, and commits.
- **Related decisions:** implements `DEC-003`, `DEC-004`, and `DEC-007`
- **Supersedes:** none
- **Superseded by:** none

## DEC-009 - Use QGuard As The Product Name

- **Date:** 2026-09-05
- **Status:** approved
- **Decision owner:** project owner
- **Decision:** Use **QGuard** as the current product name. TeamRadar was an
  internal/working name used before QGuard and later appeared again in internal
  materials; it did not supersede QGuard as the preferred product name.
- **Reason:** The owner prefers QGuard and corrected the earlier reconstructed
  naming sequence.
- **Alternatives considered:** TeamRadar and the legacy UI spelling QueueGuard;
  neither is selected as the current product name.
- **Consequences:** Current product records and future specifications use
  QGuard. Historical files retain the names they actually used. Existing local
  repository/workspace paths remain unchanged because no filesystem, Git
  remote, package, domain, or public rename was authorized by this naming
  decision.
- **Affected records:** current state, specification index, product planning,
  historical naming reconstruction, confidence matrix, and source ledger
- **Return condition:** revisit only through an explicit product-naming
  decision; separately scope any repository, package, domain, or public rename.
- **Supersedes:** the current-name assumption attached to the earlier
  reconstruction; no numbered current decision
- **Superseded by:** none

## DEC-010 - Make Behavioral Honor The Central Product Concept

- **Date:** 2026-09-05
- **Status:** approved
- **Decision owner:** project owner
- **Decision:** QGuard's central product concept is an honor/reliability system
  representing teammate behavior rather than mechanical skill or rank. The
  intended loop uses post-play teammate feedback and reporting to build or
  correct that signal. Exact review eligibility, questions, scoring, weighting,
  visibility, matching effects, sanctions, abuse controls, explanation,
  correction, appeal, retention, and rollback remain undecided.
- **Reason:** The owner confirmed that the honor system is the main idea of the
  project and that the reconstructed separation between honor and rank matches
  the intended concept.
- **Alternatives considered:** treat honor as a secondary feature, a skill
  score, or an inherited legacy formula. None was selected.
- **Consequences:** Future product framing must preserve the behavioral/skill
  distinction and route consequential honor effects through decision-safety,
  moderation, privacy, testing, and owner-review gates. No public anti-toxicity,
  safety, compatibility, or outcome claim is approved by this decision.
- **Affected records:** product-foundation specification, `OQ-004`, `OQ-006`,
  product decision sequence, matching/trust specifications, and research needs
- **Return condition:** the detailed honor design requires later bounded owner
  decisions and any applicable qualified reviews before implementation.
- **Supersedes:** none
- **Superseded by:** none

## DEC-011 - Select The Initial Game Through Current Integration Feasibility

- **Date:** 2026-09-05
- **Status:** approved
- **Decision owner:** project owner
- **Decision:** Do not select the initial game from historical Apex/Valorant
  chronology or owner preference alone. Prioritize delivering a working QGuard
  product. Start current feasibility research with Apex Legends and Valorant;
  other games remain possible. Treat reliable rank retrieval and low-friction
  local-client party/lobby creation and joining as high-value preferred
  capabilities, not absolute requirements. If they are unavailable,
  unsupported, impermissible, or too fragile, return to the owner with evidence
  and discuss alternate product flows before selecting the game/integration
  boundary. Required party size follows the selected game.
- **Reason:** Client and server API capabilities changed during and after the
  old project. The game choice matters less to the owner than finding a viable,
  low-friction path to a working product.
- **Alternatives considered:** inherit Apex, inherit Valorant, choose by game
  preference before research, or make rank/lobby automation mandatory. None was
  selected.
- **Consequences:** Legacy API claims are not current facts. Fresh official
  research must examine capability, access, policy, stability, platform scope,
  authentication, and operational constraints. No API use, client automation,
  reverse engineering, game selection, or implementation is approved yet.
- **Affected records:** product-foundation specification, API research brief,
  `OQ-002`, `OQ-005`, `OQ-009`, `OQ-010`, and product decision sequence
- **Return condition:** owner selects the initial game and integration boundary
  after reviewing the current research and fallback tradeoffs.
- **Supersedes:** the unapproved agent proposal to assume manual invites and no
  privileged integration for the first validation
- **Superseded by:** none

## DEC-012 - Extract Legacy Capability Intent, Not Legacy Implementation Shape

- **Date:** 2026-09-05
- **Status:** approved
- **Decision owner:** project owner
- **Decision:** Use old implementations to identify what capability they tried
  to achieve and what observable outcome they actually achieved. Do not copy
  their implementation method, code structure, architecture, or technology into
  current specifications merely because it exists. Preserve implementation
  detail as decision-relevant evidence only when the capability is technically
  difficult, integration-specific, API-dependent, or the method itself proves
  a material feasibility constraint or failure mode.
- **Reason:** The owner values the old project's intent and achieved behavior,
  but generally does not care how ordinary capabilities were implemented.
- **Alternatives considered:** ignore all old implementation evidence or treat
  the old architecture as the rewrite baseline. Neither was selected.
- **Consequences:** Current specifications describe approved QGuard behavior,
  outcomes, constraints, and acceptance evidence. Historical implementation
  audits remain available for provenance but cannot choose the new stack or
  architecture. Integration-specific lessons may be cited with their limits.
- **Affected records:** product-foundation specification, legacy records,
  product decision sequence, future technical specifications, and plans
- **Return condition:** each promoted legacy lesson must identify whether it is
  intent, verified outcome, constraint, failure evidence, or an unapproved
  implementation detail.
- **Related decisions:** implements `DEC-002`
- **Supersedes:** none
- **Superseded by:** none

## DEC-013 - Prefer Authoritative Rank Retrieval And Bound The Fallback

- **Date:** 2026-09-05
- **Status:** approved
- **Decision owner:** project owner
- **Decision:** Prefer obtaining current player rank from a permitted and
  sufficiently reliable official game API, whether server-side or through a
  legitimate local-client integration. Self-declared rank is a fallback created
  by integration limitations, not the desired source. If a future approved
  slice uses self-declaration, label it truthfully and include a report,
  correction, and operator-resolution path for inaccurate declarations. The
  exact evidence, consequences, appeal, retention, and abuse controls remain
  undecided.
- **Reason:** Incorrect self-declared rank can create poor matches and an
  unpleasant experience before a report is resolved.
- **Alternatives considered:** trust declarations without correction, describe
  declarations as verified, or require API rank as an absolute launch blocker.
  None was selected.
- **Consequences:** Rank-source feasibility is part of the current API research.
  No collection method is approved until capability, access, policy, accuracy,
  data flow, and fallback tradeoffs are reviewed. Rank remains separate from
  behavioral honor.
- **Affected records:** product-foundation specification, API research brief,
  `OQ-005`, `OQ-006`, `OQ-009`, identity/data specifications, and moderation
  planning
- **Return condition:** owner approves the rank source and, if necessary, the
  complete self-declaration/report-resolution fallback for the selected game.
- **Supersedes:** none
- **Superseded by:** none

## DEC-014 - Close The Historical Reconstruction Gate As Sufficient

- **Date:** 2026-09-05
- **Status:** approved
- **Decision owner:** project owner
- **Decision:** Treat the current simplified historical reconstruction as
  sufficient context for redesign. Do not claim that the corpus is exhaustive,
  and do not require the owner to reconstruct uncertain Apex/Valorant chronology
  from memory. Preserve the visible provenance limits, accept later evidence or
  corrections if they arise, and perform no further general legacy mining
  unless a current decision exposes a specific evidence gap.
- **Reason:** The future product will differ from the old one, and the present
  understanding is adequate for beginning current-product decisions.
- **Alternatives considered:** keep Gate 0 open for exhaustive reconstruction,
  require a definitive final-old-game label, or deepen every historical
  subsystem before research. None was selected.
- **Consequences:** `OQ-001`, `OQ-002`, and `OQ-003` are resolved for the
  redesign phase without erasing uncertainty. Legacy records remain evidence,
  not current product requirements. Targeted historical inspection remains
  available only when it can materially resolve a current question.
- **Affected records:** current state, open questions, chronology, source and
  confidence records, owner decision sequence, and product foundations
- **Return condition:** reopen only for new owner evidence/correction or a
  specific current decision that cannot be made responsibly without bounded
  historical verification.
- **Related decisions:** completes the gate established by `DEC-001` and applies
  the evidence rule in `DEC-012`
- **Supersedes:** none
- **Superseded by:** none

## DEC-015 - Sequence Current Product Decisions Incrementally Around Feasibility

- **Date:** 2026-09-05
- **Status:** approved
- **Decision owner:** project owner
- **Decision:** Begin with the current game/API feasibility research, then
  settle the current QGuard product in bounded, dependency-aware discussions as
  each decision becomes relevant. Do not require the complete charter,
  matching, honor, moderation, data, business, or technical design to be
  answered as one initial questionnaire. Treat PC as a provisional working
  direction rather than an approved launch-platform boundary. Discuss alternate
  rank and party-formation flows after preferred integrations prove incomplete,
  and determine the applicable-law and qualified-review requirements from the
  eventual concrete jurisdictions and data flow. `DEC-008` still requires all
  specifications applicable to an implementation slice to be approved before
  that slice begins unless the owner explicitly records a narrow override.
- **Reason:** The owner expects each large product area to require multiple
  focused discussions, while API feasibility can narrow the immediate game and
  interaction choices.
- **Alternatives considered:** force all decision groups to close before any
  feasibility research; treat PC as already selected; design fallback flows
  before confirming the integration gaps; or defer legal compliance entirely.
  None was selected.
- **Consequences:** Open questions are sequenced prompts, not a demand for one
  bulk answer. API findings may narrow the next discussion but cannot select a
  game. PC, launch market, and legal/privacy conclusions remain open until
  approved with sufficient detail.
- **Affected records:** current state, product foundations, open questions,
  research records, owner decision sequence, and future specification routes
- **Return condition:** revisit if the owner changes the preferred decision
  order, promotes PC to an approved boundary, or authorizes an implementation
  slice through an explicit narrow override.
- **Related decisions:** applies `DEC-008`, `DEC-011`, and `DEC-013`
- **Supersedes:** none
- **Superseded by:** none

## DEC-016 - Prefer Friendship-Free Ordinary-Party Entry

- **Date:** 2026-09-05
- **Status:** approved
- **Decision owner:** project owner
- **Decision:** Evaluate ordinary-party entry in this preference order:
  1. an official direct Discord join or official shareable ordinary-lobby link
     that lets matched players join without first becoming in-game friends;
  2. another official shareable ordinary-lobby code or link with the same
     friendship-free outcome; and
  3. only as a fallback, adding one another in game and using the normal
     friend/invite/accept flow.
  A Custom Match, Private Match, or tournament join code is not a substitute
  for the intended normal public/ranked party flow unless the owner later
  changes the product boundary. Requiring friend additions is material user
  friction and counts against a candidate, but is not yet an absolute veto.
- **Reason:** The owner expects adding unfamiliar matched players to an in-game
  friends list to deter use. A native join action or shareable ordinary-lobby
  link would remove a large part of QGuard's party-formation friction.
- **Alternatives considered:** treat all manual party flows as equivalent, or
  count Apex Custom Match control as ordinary-party support. Neither was
  selected.
- **Consequences:** Research must distinguish ordinary parties from private or
  custom matches and must verify recipient prerequisites, not merely the
  existence of a generic Discord feature. This decision does not select a game,
  approve a fallback, or authorize QGuard to automate a game client.
- **Affected records:** game API research, product foundations, `OQ-005`,
  `OQ-009`, `OQ-010`, and the owner decision sequence
- **Return condition:** revisit when the owner decides whether the evidenced
  Valorant lobby-link flow is sufficient or proposes a different fallback.
- **Related decisions:** narrows the preferred capability in `DEC-011`
- **Supersedes:** none
- **Superseded by:** none

## DEC-017 - Keep A Prototype-First Valorant RSO Path Available

- **Date:** 2026-09-05
- **Status:** approved as a conditional planning direction
- **Decision owner:** project owner
- **Decision:** If Valorant is later selected and the approved product needs
  RSO or other production-level Riot API access, QGuard may plan a provider
  application around a working or mostly testable product prototype. Screens
  and flows that depend on unavailable RSO data may use clearly identified
  mock or placeholder data for the review artifact, with real integration only
  after Riot grants the necessary access.
- **Reason:** Valorant offers no personal key, while Riot explicitly accepts a
  working site, mostly testable prototype, mockup, or rendering that clearly
  demonstrates the intended user flow as application evidence.
- **Alternatives considered:** reject Valorant solely because RSO is gated, or
  assume access before review. Neither was selected.
- **Consequences:** A future plan must separate provider-independent prototype
  work from access-dependent implementation. This conditional direction does
  not select Valorant; authorize implementation, publication, provider contact,
  or submission; accept provider terms; use credentials; or presume approval.
- **Affected records:** game API research, product foundations, `OQ-009`,
  `OQ-010`, and future provider-application planning
- **Return condition:** activate only after an owner-approved Valorant product
  boundary identifies which flows and data require RSO, followed by separate
  authorization for implementation and provider contact/submission.
- **Related decisions:** applies `DEC-008`, `DEC-011`, `DEC-013`, and `DEC-015`
- **Supersedes:** none
- **Superseded by:** none

## DEC-018 - Select Valorant Subject To Lobby-Link Verification

- **Date:** 2026-09-05
- **Status:** approved
- **Decision owner:** project owner
- **Decision:** Select Valorant as QGuard's initial game for current product
  planning because the bounded current-source research found no evidenced Apex
  path that satisfies the preferred friendship-free ordinary-party flow, while
  Valorant provides an official host-copied lobby link. The candidate flow is:
  the host creates an ordinary Valorant party, copies the official lobby link
  into the approved QGuard coordination surface, and matched users click it to
  join. Before a specification or implementation may depend on this capability,
  a scoped two-account test must prove that a current recipient who is neither
  the host's Riot friend nor formal Discord friend can join the intended
  ordinary party through the official link in the supported PC region/client
  state.
- **Reason:** Apex's documented ordinary flow requires friend addition, which
  the owner considers material adoption friction. Valorant's official link is
  the only researched candidate that may remove that step.
- **Alternatives considered:** keep both games unselected; select Apex despite
  the friend requirement; or treat the published Valorant description as
  sufficient behavioral proof without a live acceptance check. None was
  selected.
- **Consequences:** Valorant, not Apex, is the first-game planning direction.
  “Pass before reliance” means the link test gates any requirement, acceptance
  criterion, or code path that assumes non-friend joining works; it does not
  block further product decisions or provider-independent design. The broader
  platform, region, mode, rank fallback, Discord coordination surface, and RSO
  integration remain undecided. The test is required but is not authorized or
  performed by this decision. If it fails, return to the owner before adopting
  friend invites, another party flow, or another game.
- **Affected records:** current state, product foundations, `OQ-005`, `OQ-009`,
  `OQ-010`, game research conclusions, and the owner decision sequence
- **Return condition:** revisit after the scoped lobby-link test, a material
  Riot feature change, or an owner change to the first-game or party boundary.
- **Related decisions:** fulfills the selection process in `DEC-011` and applies
  `DEC-016`; makes the conditional `DEC-017` relevant to later planning
- **Supersedes:** none
- **Superseded by:** none

### Subsequent Review Note - 2026-09-05

The owner later asked for Counter-Strike 2 to be researched as another possible
game if its ordinary parties can be joined without Steam friendship. The
bounded first-party review found a credible user-mediated path through
Looking to Play, with historical Nearby/Public and Steam Group lobby paths
also suitable for current-client testing. It did not find a current official
player-visible shareable CS2 party link/code or a supported QGuard interface
for controlling AppID 730 lobbies. Exact-player discovery and present client
behavior remain unverified.

This evidence reopens the comparison but does not itself supersede this
decision. The owner's wording invited CS2 follow-through as a possibility and
kept Valorant available; it did not unambiguously select a new first game.
`DEC-018` therefore remains the approved selection until the owner deliberately
keeps it, supersedes it with CS2, or keeps both candidates open for testing.
See the [CS2 feasibility findings](../research/counter-strike-2-party-entry-feasibility.md).

## DEC-019 - Reject Looking To Play As A QGuard Party-Entry Flow

- **Date:** 2026-09-06
- **Status:** approved
- **Decision owner:** project owner
- **Decision:** Do not use or test Looking to Play as QGuard's CS2 party-entry
  route. Continue investigating whether non-friends can share a Steam text or
  voice chat or join the same Steam Community Group, while keeping communication
  success separate from proof of ordinary CS2 party entry.
- **Reason:** The owner determined that Looking to Play does not work for the
  intended QGuard flow. No more specific rationale is recorded, so this is a
  product-fit decision rather than a factual claim that Valve removed or broke
  the feature.
- **Alternatives considered:** retain Looking to Play as the first CS2 live-
  test candidate. The owner rejected that direction.
- **Consequences:** The proposed Looking to Play test is cancelled before
  activation and must not route future CS2 planning. Steam group chat may still
  solve communication, while Steam Community Group membership may justify a
  separate current-client party-entry test. Neither result silently changes
  the current Valorant selection in `DEC-018`.
- **Affected records:** current state, product foundations, `OQ-005`, `OQ-009`,
  `OQ-010`, CS2 research, source ledger, and owner decision sequence
- **Return condition:** revisit Looking to Play only through a later explicit
  owner decision supported by a changed product flow or material new evidence.
- **Related decisions:** applies `DEC-008`, `DEC-011`, `DEC-016`, and `DEC-018`
- **Supersedes:** the unapproved Looking to Play live-test proposal in the
  2026-09-05 CS2 findings; no approved decision
- **Superseded by:** none

## DEC-020 - Clarify The Match-Coordination Group Criterion

- **Date:** 2026-09-06
- **Status:** approved
- **Decision owner:** project owner
- **Decision:** When evaluating an external “group” for matched QGuard users,
  treat the desired object as a multi-person conversation comparable to a
  one-to-one chat window expanded to the matched team, rather than primarily a
  persistent Steam Community Group. A viable candidate must offer a supported
  API, automation, or semi-automation path that makes it easy to assemble the
  matched users and lets participants enter through a generated link, code,
  OAuth handoff, or comparable supported mechanism.
- **Reason:** The group exists to help newly matched people find and communicate
  with one another with low friction. A manually administered persistent
  community does not by itself provide the requested per-match experience.
- **Alternatives considered:** manual Steam group chat; persistent Steam
  Community Group; Discord Group DM; bot-managed private channels in a QGuard
  Discord server. The owner requested research rather than selecting one.
- **Consequences:** Steam Community Group membership is no longer the default
  interpretation of “group” for coordination. Steam chat, Discord Group DM,
  and Discord server-channel approaches are evaluated against the clarified
  automation and participant-entry criterion. Communication success remains
  separate from ordinary game-party entry. The decision does not select
  Discord, approve a bot/server dependency, authorize account or provider
  action, authorize message/voice collection, or supersede Valorant selection
  in `DEC-018`.
- **Affected records:** current state, product foundations, `OQ-005`, `OQ-006`,
  `OQ-009`, `OQ-010`, Discord/Steam research, source ledger, and owner decision
  sequence
- **Return condition:** revisit if the owner accepts persistent community
  membership or fully manual coordination, requires Direct Messages placement,
  or chooses a QGuard-native communication surface instead.
- **Related decisions:** refines the evaluated flow under `DEC-015`, applies the
  friction preference in `DEC-016`, and narrows the alternatives left by
  `DEC-019`
- **Supersedes:** the unapproved assumption that a Steam Community Group could
  satisfy the owner's requested communication-group experience
- **Superseded by:** none

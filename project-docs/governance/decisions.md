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

## DEC-021 - Accept The Designated-Human-Host Valorant Handoff And Test Scope

- **Date:** 2026-09-06
- **Status:** approved as a conditional product direction and future validation
  scope
- **Decision owner:** project owner
- **Decision:** QGuard does not need to create an ordinary Valorant party or
  manufacture its Riot lobby link. For the candidate Valorant flow, QGuard may
  designate one matched participant as host; that human creates the ordinary
  party, obtains the official host-copied lobby link, and posts it in the
  private per-match Discord text channel. The remaining matched participants
  deliberately click the link to join. The owner accepts this human step if the
  official flow passes current-client verification. The owner also approves
  eventual behavioral checks of Discord's generic Game Invite/Join surfaces
  for Valorant and CS2 alongside the required Valorant lobby-link test.
- **Reason:** QGuard's value is assembling and coordinating compatible
  teammates; it does not need to control the game client when one participant
  can perform a short official host action and the rest can enter without
  adding friends.
- **Clarification:** Riot's published feature description says a linked user
  can copy a lobby link and share it with a Discord server or elsewhere. It
  does not state that QGuard is prohibited from displaying a host-supplied
  link. The absence of a reviewed public QGuard interface for creating the
  Riot party or link is an interface/evidence boundary, not a provider-policy
  conclusion against this human flow.
- **Alternatives considered:** require QGuard to create/control the Valorant
  party or link; require friend addition; rely only on generic Discord Game
  Invites; or require a Discord Group DM. None is selected. If the server-
  channel model works, the owner does not need a Group DM.
- **Consequences:** The designated host and host-posted link may be specified
  after the behavior test passes. Host-selection rules, decline/reassignment,
  timing, link visibility/expiry, recipient Riot/Discord linking, errors, and
  recovery remain open. For a normal five-player Valorant party, this produces
  one host and four joiners; no six-player requirement is inferred from the
  owner's conversational wording. The generic Discord tests are distinct from
  the Riot lobby-link test and cannot silently replace it.
- **Critical gate preserved:** This decision does not select the persistent
  QGuard Discord server/private-channel model. The owner explicitly classified
  that selection as a critical backbone decision and requested that it return
  for deliberate review after the other clarifications were recorded. It is
  now isolated as `OQ-011`.
- **Test authorization boundary:** The validation scope is approved and queued
  in the party-entry behavioral packet. No account, credential, client session,
  relationship change, server, bot, channel, invitation, OAuth grant, party,
  message, voice, automation, or evidence retention action occurred here.
  Execution requires specific consenting test accounts/current clients and an
  agreed minimal evidence/cleanup setup; none was supplied for this task, and
  credentials and unnecessary personal data must not enter project records.
- **Affected records:** current state, product foundations, `OQ-005`, `OQ-006`,
  `OQ-009`, `OQ-010`, `OQ-011`, `DEF-001`, `DEF-002`, Discord findings,
  coordination packet, behavioral validation packet, and owner decision
  sequence
- **Return condition:** reassess after the Valorant lobby-link test, either
  generic Discord Game Invite test, a material provider change, or an owner
  change to the host-mediated party flow.
- **Related decisions:** refines the candidate flow in `DEC-018`, applies
  `DEC-016`, and remains separate from the coordination choice under `DEC-020`
- **Supersedes:** none
- **Superseded by:** none

### Subsequent Mechanism Clarification - 2026-09-06

The owner clarified that the unresolved issue is whether QGuard relies on the
official copied Riot lobby link or on a distinct game-specific Discord Join/
Invite action. QGuard-to-Discord OAuth, shared-server membership, and presence
in the same text or voice channel do not answer that question. The copied link
may be delivered through QGuard rather than a Discord room if behavioral
verification confirms the path. This clarification does not supersede the
human-host direction or select a coordination backbone; that choice remains
`OQ-011`.

## DEC-022 - Adopt A Broad International Availability Direction

- **Date:** 2026-09-06
- **Status:** approved as a product direction; exact launch coverage remains
  open
- **Decision owner:** project owner
- **Decision:** QGuard is not a Turkey-only product. Its intended reach is
  broadly international wherever the selected game is played, subject to later
  decisions about launch countries, languages, ages, provider availability,
  legal obligations, and operational support.
- **Reason:** The owner intends the product to serve the wider game audience,
  while current Discord access restrictions in Turkey expose the risk of
  making one communication provider universally mandatory.
- **Alternatives considered:** design QGuard only for Turkey, or treat
  “worldwide” as an immediate promise to support every jurisdiction and
  provider condition. Neither is selected.
- **Consequences:** Geography-dependent provider availability and fallback
  behavior must be visible in coordination and integration decisions. This
  direction does not approve a launch-country list, require Discord or a VPN,
  authorize circumvention guidance, or promise service in every country.
- **Affected records:** current state, product foundations, `OQ-005`, `OQ-009`,
  `OQ-011`, coordination research, party-entry test packet, and owner decision
  sequence
- **Return condition:** settle concrete launch geography before public
  availability claims, jurisdiction-specific data flows, or deployment.
- **Related decisions:** refines the gradual geography decision under
  `DEC-015`
- **Supersedes:** none
- **Superseded by:** none

## DEC-023 - Require Feasibility Tests Before Selecting The Coordination Path

- **Date:** 2026-09-07
- **Status:** partially superseded by `DEC-024` for planning-direction timing;
  live evidence requirements remain in force
- **Decision owner:** project owner
- **Decision:** Do not select Discord, QGuard-native coordination, the copied
  Riot lobby link as the dependable handoff, or a game-specific Discord Join
  path until the relevant current-client and coordination-lifecycle tests have
  been run and compared. Gather every discussed test into one validation
  program. Include the deliberately parked critical Discord/private-room
  backbone item as a live lifecycle target, retrieve the earlier Steam/CS2
  test proposals, and preserve conditional or unsafe cases behind their exact
  prerequisites.
- **Reason:** Documentation establishes candidate capabilities but does not
  establish the actual current non-friend, account-linking, regional/network,
  admission, isolation, cleanup, or ordinary-party behavior needed to choose a
  product direction.
- **Alternatives considered:** select the agent-recommended QGuard-native
  baseline immediately; select Discord immediately; or test only the currently
  preferred Valorant link. The owner rejected making the choice before the
  cross-option evidence exists.
- **Consequences:** `OQ-011` remains open but is no longer ready for immediate
  selection. Existing `DEF-001` and `DEF-002` are activated within the combined
  program; Discord private-room lifecycle, Steam non-friend group chat, and
  current CS2 alternatives receive explicit deferred test entries. Looking to
  Play remains rejected. Discord Group DM checks are conditional, and voice
  recording remains a separate unapproved proposal. No product or game
  selection is changed by planning or by one isolated passing test.
- **Execution boundary:** The owner has approved and requested the bounded test
  direction. Live execution still requires the named Windows environment,
  consenting accounts, relationship/link-state baseline, exact external test
  targets, evidence/retention location, and cleanup owner. Credentials, tokens,
  lobby secrets, voice recording, unsupported client automation, matchmaking,
  persistent Steam group creation without exact target approval, and product
  implementation remain outside this decision.
- **Affected records:** current state, product foundations, `OQ-005`, `OQ-009`,
  `OQ-010`, `OQ-011`, deferred work, the party-entry packet, coordination packet,
  validation program, and owner decision sequence
- **Return condition:** complete or validly classify the decision-blocking test
  set, reconcile the evidence, and return the resulting mechanism comparison to
  the owner for deliberate product selection.
- **Related decisions:** applies the feasibility-first direction in `DEC-011`,
  preserves the friendship-free preference in `DEC-016`, and delays selection
  under `DEC-018` through `DEC-022` until the evidence gate is met
- **Supersedes:** the readiness implication that `OQ-011` should be decided
  immediately after the 2026-09-06 documentation research
- **Superseded by:** `DEC-024` only for choosing Discord room/voice direction
  and proceeding with surrounding specifications before live tests

### Subsequent Execution Hold - 2026-09-28

The owner paused Discord-dependent testing until they can get the test working.
The [canonical hold and return condition](deferred-work.md#owner-hold--discord-access--2026-09-28)
govern resumption. This changes execution timing only: the test requirement,
acceptance criteria, current game direction, and unresolved `OQ-011` decision
are not superseded or waived.

## DEC-024 - Plan Discord Rooms With Replaceable Game-Party Joining

- **Date:** 2026-09-28
- **Status:** approved planning direction; actual game joining unimplemented
- **Decision owner:** project owner
- **Decision:** Choose Discord rooms and voice as the planning direction now.
  Keep game-party joining a replaceable component rather than commit to one
  integration. Prefer the game's Discord Join action if it works for the
  intended nonfriend case. The accepted alternative is a designated matched
  player creating the ordinary game lobby, obtaining its official link, and
  sharing it in a QGuard Discord text channel visible only to the matched
  players. Other matched players click that link. Either method is acceptable
  if verified; Discord room/voice provision stays in the flow either way.
- **Reason:** Allow surrounding product planning and eventual implementation
  to progress without prematurely depending on an unverified joining method.
  The owner explicitly confirmed the previously presented gate change and
  clarified that the link alternative uses a private matched-team Discord
  text channel, not a QGuard-native link-delivery fallback.
- **Alternatives considered:** wait for all live tests before selecting any
  coordination direction; require QGuard-native coordination; or lock the
  product to one joining integration. None is selected by this decision.
- **Consequences:** The basic Discord coordination direction is settled and
  does not need another confirmation. Product specifications may now develop
  around that boundary. The request to plan and implement the surrounding
  system remains subject to `DEC-008`: each implementation slice requires its
  applicable approved specifications. No stack, detailed contract, complete
  implementation plan, or general specification-gate override is approved.
- **Evidence and hold:** Actual game joining stays unimplemented. `DEF-001`
  through `DEF-003` remain on owner hold; no live tests resume. A placeholder
  or mock is not proof that either handoff or the Discord room lifecycle works.
  Applicable behavioral evidence remains necessary before relying on a live
  method. If neither works, return to the owner before substituting another
  flow. No existing Steam/CS2 test is cancelled or started by this decision.
- **Unresolved:** mandatory versus optional participant voice attendance,
  admission/account linking, host selection/replacement, room lifecycle,
  permission/privileged-access details, data handling, restricted-region
  behavior, and the final validated game-join method. Voice recording and
  monitoring remain unapproved. Discord voice membership is not game-party
  membership; a lobby link does not repair unavailable Discord voice access.
- **Affected records:** `OQ-011`, deferred-work hold, current state, specification
  index and foundations, coordination options, validation program, owner
  sequence, and [coordination and party-handoff specification](../specs/coordination-and-party-handoff.md)
- **Return condition:** approve the required specification modules before each
  implementation slice; resume live validation only on the existing owner
  return condition. Revisit material provider failures or changed product
  scope with the owner.
- **Supersedes:** `DEC-023` only insofar as it required all relevant tests before
  selecting the Discord room/voice planning direction; supersedes the pending
  confirmation in the 2026-09-28 separation proposal. `DEC-018` game direction,
  applicable live-evidence gates, the test hold, and controlled-operation gates
  remain unchanged.
- **Superseded by:** none

## DEC-025 - Start With Session Grouping

- **Date:** 2026-10-02
- **Status:** approved first-version scope
- **Decision owner:** project owner
- **Decision:** QGuard's first usable version focuses on grouping players for
  a playing session. Persistent-team recruitment and management are outside
  that first scope. A player-facing history of past teammates and QGuard
  friend requests are also outside the first version.
- **Reason / approval evidence:** the owner explicitly chose session grouping
  and confirmed that past-teammate tracking and friend requests are possible
  future features outside the first idea.
- **Alternatives considered:** lasting-team recruitment, or both session and
  lasting-team experiences from the start. Neither is selected for the first
  version.
- **Consequences:** narrow the current journey and matching discussions to
  session grouping. Future history/friend features remain ideas, without an
  approved implementation commitment or deferred-work activation. The UI
  exclusion does not settle storage needed for honor/reports, session evidence,
  retention, or use of existing friendships on other services.
- **Still open:** solo versus partial-party entry; game mode; session length
  and completion; matching/acceptance rules; and honor's detailed first-version
  effect. The owner requested that honor's role be discussed next. `DEC-010`
  keeps honor central; this choice does not approve the agent's suggested
  persistence/scoring behavior or any formula, visibility or matching effect.
- **Affected records:** product foundations, `OQ-004` through `OQ-006`, current
  state, project index and owner decision sequence.
- **Return condition:** approve the detailed journey and applicable modules
  before their implementation slices under `DEC-008`. Revisit excluded social
  features only through a later owner decision. `DEC-024` and the live-test
  hold remain in force.
- **Route / baseline:** product planning; owner/external review;
  deferral/owner review; decision/recommendation safety for the forthcoming
  honor discussion. Clean `new-development` at `2ae20a9`. Existing entry
  records, selected procedures and decision template were consulted.
- **Verification:** all 54 project Markdown files passed checks for 210 local
  links, 17 section anchors and 25 unique sequential decision IDs. The complete
  six-file diff was reviewed and `git diff --check` passed before the local
  documentation commit. Application/live tests were not run for this record
  update; detailed behavior remains unresolved. No provider action or push.
- **Supersedes:** none; resolves the session-versus-lasting-team component of
  `OQ-005` without closing the remaining product boundary.
- **Superseded by:** none

## DEC-026 - Use Honor In Matchmaking From The First Version

- **Date:** 2026-10-02
- **Status:** approved matchmaking direction; detailed rules remain open
- **Decision owner:** project owner
- **Decision:** Honor participates in QGuard matchmaking from the first
  usable session-grouping version. New players start at a common baseline
  without accumulated history. As player histories develop and honor signals
  differentiate, grouping should favor players with similar honor.
- **Reason / approval evidence:** the owner explicitly said to implement
  honor's matchmaking role from the start and described new players near a
  baseline, followed by matching people with others like themselves as
  history develops.
- **Consequences:** an information-only or feedback-only honor phase is not
  the selected first-version product direction. Design the applicable
  matching and honor modules together. A shared baseline initially supplies
  little honor-based differentiation; other matching criteria remain open.
- **Proposal, not a settled rule:** the owner's suggestion that honor could
  receive greater matching weight as history grows. No confidence function,
  sample threshold or dynamic weight is selected. The agreed similarity aim
  is separate from this possible weighting mechanism.
- **Still open:** fixed neutral baseline versus measured community average;
  score range, feedback source, eligibility and calculation; reliability of
  sparse history; exact similarity, weighting and queue-widening rules;
  missing/contested evidence; visibility, abuse prevention, correction and
  appeals. No matching bans or sanctions are selected. A baseline is an
  initial estimate, not verified evidence of an individual's behavior or a
  guarantee of the current population average.
- **Affected records:** product foundations, `OQ-006`, current state, project
  index and owner decision sequence. The dated readiness audit remains
  evidence of its earlier baseline, not current approval authority.
- **Return condition:** approve the applicable scoring, matching, data and
  completion specifications before implementing the affected slice under
  `DEC-008`. `DEC-024` and the existing live-test hold remain in force.
- **Route / baseline:** product planning; decision/recommendation safety;
  privacy/data boundaries; owner/external review; deferral/owner review.
  Clean `new-development` at `c0405f3`; required entry records and applicable
  procedures were consulted. No new provider fact is asserted.
- **Verification:** all 54 project Markdown documents checked: 210 local
  links and 17 heading anchors resolve; all 26 decision IDs are unique and
  sequential. Full six-file scoped diff reviewed; `git diff --check` passed.
  Application/live tests were not run: this is a decision-record update.
  No code, provider action, push or workflow-package modification is
  authorized here. Detailed honor/matching rules remain open.
- **Supersedes:** none; resolves honor's first-version matching role under
  `OQ-006` while retaining the unanswered detailed rules.
- **Superseded by:** none

### Subsequent Baseline Clarification - 2026-10-02

`DEC-027` resolves the fixed-versus-community-average baseline question and
delegates equivalent numeric representation. The remaining behavioral,
scoring, weighting and safeguard questions remain open.

## DEC-027 - Fix The Newcomer Honor Baseline And Delegate Numeric Representation

- **Date:** 2026-10-02
- **Status:** approved baseline direction and bounded implementation discretion
- **Decision owner:** project owner
- **Decision:** New players start at a fixed neutral honor value, independent
  of the current community average. The implementation agent may choose the
  internal numeric range and corresponding baseline number, and rescale that
  representation for display without asking the owner to select arbitrary
  point units. No concrete range or value is selected now.
- **Reason / approval evidence:** the owner answered “Fixed value” to the
  fixed-neutral-versus-community-average question, then explicitly described
  numeric point ranges and equivalent frontend scaling as implementation
  details that the implementation agent should choose.
- **Alternatives considered:** initialize from a changing community average,
  or require an owner decision on arbitrary numeric units. Neither is selected.
  The owner's one-to-one-thousand example illustrates discretion; it is not
  an approved range.
- **Consequences / discretion boundary:** choose and document equivalent
  numeric units inside the applicable approved specification and implementation
  slice. Rescaling must preserve the approved meaning, ordering, relative
  distances and matching outcomes; precision/rounding must not silently change
  those outcomes. This does not choose a formula, behavioral meaning,
  feedback effect, matching threshold/weight, reputation visibility, displayed
  label/tier or public claim. Material changes to those remain owner decisions.
- **Still open:** feedback dimensions, eligibility and effects; calculation,
  history reliability and possible dynamic weighting; detailed matching,
  visibility, abuse prevention, correction, appeals and data handling. A
  fixed baseline is not earned evidence of good or bad behavior.
- **Affected records:** product foundations, `OQ-006`, current state, project
  index and owner decision sequence. Historical reports remain unchanged.
- **Return condition:** define the applicable behavioral and matching
  specifications before implementing the slice under `DEC-008`; record the
  agent's later numeric selection and equivalence verification in that slice.
  `DEC-024` and the live-test hold remain in force.
- **Route / baseline:** product planning; decision/recommendation safety;
  privacy/data boundaries; owner/external review; deferral/owner review.
  Clean `new-development` at `1bd62cd`; mandatory entry records, selected
  procedures and the decision template read. Scope: project records only;
  no delegation, code, provider action, workflow-package change or remote action.
- **Verification:** all 54 project Markdown documents checked: 210 local links
  and 17 heading anchors resolve; all 27 decision IDs are unique and sequential.
  Full six-file scoped diff reviewed; `git diff --check` passed. No application
  or live tests run for this documentation-only unit; unresolved product rules
  still gate implementation. No push or external action.
- **Supersedes:** none; clarifies `DEC-026` and resolves the baseline component
  of `OQ-006`, without changing general workflow authority or approval gates.
- **Superseded by:** none

## DEC-028 - Allow Teammate Feedback To Raise And Lower Honor

- **Date:** 2026-10-02
- **Status:** approved feedback-effect direction; detailed rules remain open
- **Decision owner:** project owner
- **Decision:** Ordinary post-play teammate feedback can both increase and
  decrease a player's behavioral honor. Honor is not an endorsement-only score
  that can rise through feedback but fall only through a separate report path.
- **Reason / approval evidence:** the owner explicitly answered that honor
  should both increase and decrease, then requested that this be recorded.
- **Alternatives considered:** positive-only routine feedback with negative
  behavior handled solely through reports. Not selected.
- **Consequences:** the later feedback/calculation design must support both
  upward and downward honor effects. This does not mean every feedback item
  immediately changes a score, or that negative feedback automatically proves
  misconduct, causes a sanction or substitutes for report review.
- **Still open:** one overall rating versus multiple behavioral dimensions;
  response options, optionality and review eligibility; calculation, magnitude,
  aggregation, reviewer/history weighting and timing; visibility and safeguards
  against retaliation/manipulation; corrections, appeals and data handling.
  Report eligibility, evidentiary review and score/sanction effects remain open.
- **Affected records:** product foundations, `OQ-006`, current state, project
  index and owner decision sequence. Earlier decision entries and dated audits
  retain their historical scope; this resolves one previously open component.
- **Return condition:** approve the applicable feedback, scoring, matching,
  data and completion specifications before implementing the affected slice
  under `DEC-008`. `DEC-024` and the live-test hold remain in force.
- **Route / baseline:** same bounded owner-review route as `DEC-027`: product
  planning; decision/recommendation safety; privacy/data boundaries;
  owner/external review; deferral/owner review. Mandatory entry and procedures
  were read for this ongoing decision session; actual repository rechecked:
  clean `new-development` at `1dff072`. One documentation-only decision unit;
  no code, delegated work, provider action or workflow-package modification.
- **Verification:** all 54 project Markdown documents checked: 210 local links
  and 17 heading anchors resolve; all 28 decision IDs are unique and sequential.
  Full six-file scoped diff reviewed; `git diff --check` passed. Application/live
  tests were not run for this documentation-only unit; detailed product rules
  remain unresolved. No push or external action.
- **Supersedes:** none; resolves the routine-feedback direction component of
  `OQ-006`, refining `DEC-010` and `DEC-026` without selecting a formula.
- **Superseded by:** none

### Subsequent Calculation And Safeguard Direction - 2026-10-02

`DEC-029` records the owner's rationale and average-based calculation direction,
plus dynamic attenuation against a configurable recent-rating window. Exact
mathematics, eligibility, sparse-history handling and other safeguards remain
open; this does not retroactively assert implementation or earlier approval.

## DEC-029 - Average Teammate Ratings With Dynamic Recent-History Attenuation

- **Date:** 2026-10-02
- **Status:** approved calculation and safeguard direction; formula unselected
- **Decision owner:** project owner
- **Decision:** Provide ordinary post-play teammate feedback on a rating scale,
  separate from administrative intervention and reports. Use an average-based
  calculation of those ratings to move behavioral honor up or down, rather
  than merely accumulate points for more play. Compare a new rating with the
  rated player's prior recent teammate ratings, using the last configurable
  number of eligible ratings as the comparison window. Mathematically measure
  its deviation from that recent average and dynamically reduce its influence
  as deviation increases: farther from the average means less effect.
- **Reason / approval evidence:** the owner explained that an increase-only
  score could reward accumulated play rather than behavior, proposed averaging
  ordinary ratings independently of reports, and explicitly required a
  changeable recent-history window and deviation-dependent influence. The
  intended safeguard addresses a teammate retaliating for poor gameplay by
  trying to tank another person's honor. The owner requested recording the
  complete direction and repeating it back afterward.
- **Alternatives considered:** positive-only point accumulation; equal
  influence regardless of departure from recent history; or only a constant
  penalty beyond a cutoff. None satisfies the selected direction. No automatic
  rejection or zero weight for an outlier is selected.
- **Mathematics not selected:** standard deviation was raised as a possibility,
  not chosen. No distance metric, attenuation curve, threshold, window count,
  averaging/aggregation formula, minimum sample count or update timing is fixed.
  The comparison window is not necessarily the full honor-calculation window.
  `DEC-027` still leaves equivalent numeric units to the implementation agent;
  the owner's numerical examples are not an approved score range.
- **Meaning and evidence boundary:** honor measures behavior, not gameplay
  skill. A rating's disagreement with past ratings is not proof of dishonesty;
  recent history is a reference, not verified truth. Downweighting is the
  approved protection direction, not a guarantee against retaliation or abuse.
  Report review, misconduct findings and score/sanction consequences remain
  separate unresolved rules.
- **Open design and verification work:** specify no/sparse history, identical
  prior ratings or zero spread, multiple ratings from one session, reviewer
  independence, repeated/organized abuse, and genuine improving or worsening
  behavior so history does not silently become permanent score lock-in.
  Define rating dimensions/options, eligibility, optionality, correction/appeal,
  storage/retention, configuration authority and change/version control.
  No default treats the neutral baseline as real historical feedback.
- **Affected records:** product foundations, `OQ-006`, current state, project
  index and owner decision sequence; earlier decisions and dated audits retain
  their historical scope. No social-history UI is added under `DEC-025`.
- **Return condition:** propose and verify the detailed mathematics and
  behavioral tradeoffs in the applicable scoring/matching specification;
  obtain its required approval before the implementation slice under `DEC-008`.
  Use deterministic and adversarial examples, including sparse history and
  genuine behavior changes. `DEC-024` and the live-test hold remain in force.
- **Route / baseline:** continuing bounded product planning; decision/
  recommendation safety; privacy/data boundaries; owner/external review;
  deferral/owner review. Mandatory entry and selected procedures read for this
  ongoing decision session; repository rechecked clean on `new-development`
  at `6e8d46f`. Scope: six existing project records only; no new provider claim,
  code, delegation, external action or canonical-workflow modification.
- **Verification:** all 54 project Markdown documents checked: 210 local links
  and 17 heading anchors resolve; all 29 decision IDs are unique and sequential.
  Full six-file scoped diff reviewed; `git diff --check` passed. No algorithm,
  application or live tests run; mathematics remains to be specified and tested.
  No push or external action; portable workflow and legacy code unchanged.
- **Supersedes:** none; refines `DEC-028` and resolves further calculation/
  safeguard direction within `OQ-006`, without selecting complete scoring rules.
- **Superseded by:** none

### Subsequent Raw-Reference Clarification - 2026-10-02

`DEC-030` clarifies that attenuation affects the honor calculation, not a
rating's inclusion or unadjusted value in the recent comparison average.
This supplies the owner's intended behavior-change mechanism; its detailed
mathematics and empirical performance still require specification and tests.

## DEC-030 - Separate Raw Recent Ratings From Attenuated Honor Influence

- **Date:** 2026-10-02
- **Status:** approved calculation separation; detailed formula remains open
- **Decision owner:** project owner
- **Decision:** Keep the recent comparison average logically separate from
  the overall honor calculation. The comparison uses the unadjusted values of
  the player's recent eligible teammate ratings over the configurable last-N
  window. An unusual rating may have reduced influence on honor under
  `DEC-029`, but still enters that recent history at its full unadjusted value.
  Attenuation must not remove it from, or attenuate its contribution to, the
  raw recent comparison average merely because it differs from past ratings.
  Ordinary feedback must be able to move honor up and down automatically,
  without requiring administrative intervention to accept a behavior change.
- **Reason / approval evidence:** the owner explained that reducing a rating's
  honor effect does not mean omitting it from the average used to recognize
  changed behavior. They expressly distinguished an unadjusted recent average
  from the overall average/influence calculation and excluded their spoken
  example window sizes from selection. No concrete window count is recorded.
  The owner subsequently explicitly confirmed upward and downward movement
  without admin intervention, resolving the earlier automatic-versus-review
  question rather than leaving it as an agent recommendation.
- **Consequences:** successive eligible ratings can move the raw recent
  reference even when their individual honor effects are reduced. Later
  ratings are compared with the evolving raw reference, allowing the intended
  mechanism to respond to improving or worsening behavior. The reference is
  not a community average; the fixed newcomer baseline under `DEC-027` is
  unchanged. Raw feedback and its attenuated honor influence must remain
  distinguishable in the specification and verification evidence.
- **Implementation boundary:** this selects logical calculation separation,
  not a database schema, duplicate persisted averages, indefinite raw-history
  retention, a player-visible history screen or a visible second score. The
  overall honor horizon and exact aggregation are not selected. Ordinary
  feedback-driven honor changes do not require administrative review.
  This does not remove the separate, still-unspecified administrative report,
  correction or appeal processes.
- **Still open:** rating dimensions/options and eligibility; corrections,
  invalid/abusive-feedback handling; no/sparse history and zero spread;
  ordering/batching of same-session ratings; deviation metric, curve, update
  timing and whether past honor weights are recomputed; window configuration
  controls and data retention. Inclusion of eligible outliers does not approve
  inclusion of fraudulent/ineligible ratings or establish a rule for them.
- **Verification needed later:** trace raw values, recent-reference updates,
  calculated influence and resulting honor separately. Include an isolated
  extreme rating and sustained improving/worsening sequences; verify that
  attenuation is not fed back into the raw comparison average. Response speed,
  manipulation resistance and lack of lock-in are not proved by this record.
- **Affected records:** product foundations, `OQ-006`, current state, project
  index and owner decision sequence. Historical decisions/audits retain their
  prior scope; no canonical workflow or legacy implementation change.
- **Return condition:** approve applicable scoring, matching, data and
  completion specifications before the implementation slice under `DEC-008`.
  `DEC-024` and the live-test hold remain in force.
- **Route / baseline:** continuing bounded product planning; decision/
  recommendation safety; privacy/data boundaries; owner/external review;
  deferral/owner review. Mandatory entry and selected procedures already read
  for this ongoing decision session; actual repository rechecked clean on
  `new-development` at `19c33f0`. Six existing project records only; no code,
  delegation, provider claim or external action.
- **Verification:** all 54 project Markdown documents checked: 210 local links
  and 17 heading anchors resolve; all 30 decision IDs are unique and sequential.
  Full six-file scoped diff reviewed; `git diff --check` passed. No algorithm,
  application or live tests run; detailed scoring remains open. No push or
  remote action; portable workflow and legacy code unchanged.
- **Supersedes:** none; clarifies `DEC-029` and resolves its raw-versus-
  attenuated comparison and behavior-change direction under `OQ-006`.
- **Superseded by:** none

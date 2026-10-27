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
- **Status:** approved preference; first-pass source selection and fallback
  approval subsequently delegated/settled by `DEC-048`
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
  For the first pass, `DEC-048` now delegates this selection and approves the
  conditional fallback; do not reuse this earlier condition as a new owner gate.
- **Supersedes:** none
- **Superseded by:** `DEC-048` for first-pass owner-only source/fallback
  selection; the authoritative-source preference and evidence standards remain

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
- **Superseded by:** `DEC-054` for host submission and recipient presentation;
  the human-host direction and applicable evidence gates remain in force

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
- **Superseded by:** `DEC-035` for optional voice queueing and the exclusion
  of real Discord integration from the current implementation scope; `DEC-054`
  for structured QGuard submission/display instead of requiring a host's chat
  post. Preferred game-join candidates and evidence gates remain in force

## DEC-025 - Start With Session Grouping

- **Date:** 2026-10-02
- **Status:** approved session-grouping scope; friend-request exclusion
  partially superseded by `DEC-037`
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
- **Superseded by:** `DEC-037` for basic friendships, invitations and partial
  parties; lasting-team management and past-teammate history UI remain excluded

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
- **Status:** approved direction; exact last-N comparison requirement partially
  superseded by `DEC-032`; complete scoring specification remains incomplete
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
- **Superseded by:** `DEC-032` for exact last-N reference semantics only;
  average-based honor movement and dynamic deviation attenuation remain in force

### Subsequent Raw-Reference Clarification - 2026-10-02

`DEC-030` clarifies that attenuation affects the honor calculation, not a
rating's inclusion or unadjusted value in the recent comparison average.
This supplies the owner's intended behavior-change mechanism; its detailed
mathematics and empirical performance still require specification and tests.

## DEC-030 - Separate Raw Recent Ratings From Attenuated Honor Influence

- **Date:** 2026-10-02
- **Status:** approved separation; exact last-N reference semantics partially
  superseded by `DEC-032`; raw inputs remain separate from honor attenuation
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
- **Superseded by:** `DEC-032` for exact last-N reference semantics only;
  unadjusted input and automatic behavior-change directions remain in force

## DEC-031 - Delegate Development Initialization And Reference Tuning

- **Date:** 2026-10-02
- **Status:** approved bounded development-stage delegation; reference-model
  question subsequently resolved and calibration scope refined by `DEC-032`
- **Decision owner:** project owner
- **Decision:** include initialization and confidence/sample-count handling
  alongside the honor systems being specified. The implementation agent may
  choose the concrete development-stage method during the approved slice and
  revise it while the site remains in development. The owner need not select
  the method or finalize raw-reference response-speed tuning in advance.
  The applicable specification must express this delegation and testable
  constraints rather than turn every method detail or tunable value into a
  separate owner gate.
- **Reason / approval evidence:** the owner explicitly said this handling
  should exist, asked the implementation agent to choose its method, and
  described it and the response values as changeable during later development
  fine-tuning. The owner proposed starting the smoothing response divisor at
  20 instead of the illustrated 30. This is a provisional starting candidate,
  not evidence that it gives an acceptable honor-change rate.
- **Bounded discretion:** record the selected startup/count method, settings,
  rationale and deterministic test evidence; keep them changeable through
  coherent verified development changes. Preserve the fixed neutral newcomer
  honor baseline and the separation between raw input/reference and attenuated
  honor influence. A baseline is not real historical feedback, and a simple
  count alone is not proof of reliability or independent reviewers.
- **Not delegated by this decision:** deciding who may rate whom, sanctions,
  public confidence labels, confidence-based eligibility restrictions, new
  matching effects, raw-data retention, live data collection or release. The
  influence curve and full honor-update formula remain unselected. Any tuning
  that changes these product boundaries returns to owner review.
- **Reference selection boundary at approval, subsequently resolved by
  `DEC-032`:** the then-latest annotations clearly approve
  startup responsibility and flexible development tuning, but do not explicitly
  replace the previously selected exact last-N reference. Keep the smoothed
  recurrence under consideration until the owner confirms that replacement.
  If selected, divisor 20 is the proposed development starting value; it moves
  the reference 5% toward each new eligible rating, not toward each game, and
  is separate from the overall honor update speed.
- **Verification timing:** final calibration is not a prerequisite to drafting
  or an otherwise-approved development slice. Initial correctness tests belong
  with implementation; broader behavioral tuning may follow in development.
  Before any release or real-user operation, obtain the applicable approvals
  and test isolated/extreme inputs, sustained changes and manipulation under
  the complete scoring rules. No anti-retaliation outcome is guaranteed now.
- **Implementation authority:** this is bounded discretion inside a future
  approved slice, not approval to start the complete app or scoring slice.
  `DEC-008`, other unresolved slice specifications and the Discord test hold
  remain in force. No general workflow gate is removed.
- **Affected records:** product foundations, `OQ-006`, project index, current
  state and owner decision sequence. Existing historical approval records
  retain their original scope; portable workflow and legacy code are untouched.
- **Route / baseline:** bounded product planning; decision/recommendation
  safety; privacy/data boundaries; external/owner review; deferral/owner review.
  Mandatory entry and selected procedures read; clean `new-development` at
  `de0ea6d` verified before edits. Six project records only; no delegation or
  application/provider action.
- **Verification:** full scoped diff, project Markdown links/anchors and all
  31 unique sequential decision IDs checked; `git diff --check` passed. No
  application, startup-method or live tests run because this unit records
  delegation rather than implementing it. No push or remote action.
- **Supersedes:** none; resolves startup-method responsibility and development
  tuning within `OQ-006`, without selecting a different reference model.
- **Superseded by:** `DEC-032` only for the reference-choice question and refined
  calibration scope; startup-method delegation remains in force

## DEC-032 - Select Smoothed Reference And Extreme-Feedback Trade-Off

- **Date:** 2026-10-02
- **Status:** approved reference method and qualitative behavior; complete
  scoring slice not implementation-ready
- **Decision owner:** project owner
- **Decision:** replace the exact last-N raw-rating comparison average with
  the single-value exponentially smoothed raw reference. Update the reference
  toward each new eligible unadjusted teammate rating, without applying that
  rating's separate honor-influence dampening to the reference input.
  `raw_rating_reference_response_divisor` starts at 20 in development, giving
  a 5% adjustment toward each input; this is adjustable, not a production
  calibration guarantee or a count of games/retained ratings.
- **Selected reference recurrence:**

  ```text
  updated_smoothed_raw_rating_reference =
      previous_smoothed_raw_rating_reference
      + (new_input_teammate_behavior_rating
         - previous_smoothed_raw_rating_reference)
        / raw_rating_reference_response_divisor
  ```

- **Desired behavioral trade-off:** an isolated extremely negative departure
  from recent feedback may have less immediate honor effect than a moderately
  negative rating. This is now intended behavior, not merely an incidental
  mathematical outcome. Repeated consistent feedback must still move the raw
  reference and support meaningful automatic honor change. This is not a
  requirement that every more-negative input cause a smaller change in every
  context, nor proof that extreme feedback is retaliatory.
- **Reason / approval evidence:** the owner explicitly confirmed replacement
  of last-N rolling with the smoother reference, accepted gradual rather than
  exact-window adaptation, and confirmed the extreme-versus-moderate immediate
  effect after examining the side-chat examples. They identified the handoff's
  window and startup framing as stale, reaffirmed implementation-agent startup
  responsibility, and requested distinct descriptive variable names.
- **Development calibration authority:** tune primarily numerical constants
  after initial/bulk implementation; occasional small function refinements
  are permitted within an approved slice when they preserve the selected raw-
  reference separation, qualitative trade-off and automatic adaptation.
  Record changes, rationale and regression evidence. Material behavioral
  reversals or changes to authority, gates, scope, eligibility, moderation,
  visibility, retention or public claims still require owner approval.
  Final tuning is not a prerequisite to an otherwise-approved development slice.
- **Startup responsibility:** `DEC-031` remains valid. Initialization and
  confidence/sample-count handling are required; their concrete development
  method is chosen by the implementation agent, not the deployment operator
  or another newly assigned reviewer. This is a reaffirmation, not a role
  transfer, and a count alone does not prove independent reliable feedback.
- **Naming and numeric independence:** use distinct descriptive names for
  every variable and independent parameter. Two different settings may share
  the same number without being coupled. Divisor 20 controls reference speed;
  `allowed_rating_deviation = 20` remains an illustration, not a selected
  deviation setting. Matching numeric values must not imply shared meanings.
- **History and retention:** exact-window statements in the side handoff are
  stale explanatory context, not current requirements. Smoothing approaches
  sustained feedback gradually; no fixed-window expiry or finite exact arrival
  is promised. Selecting one scalar for the basic reference calculation does
  not decide whether individual ratings must be retained for other purposes.
  `DEC-033` subsequently narrows the first-version planning direction to no
  exact individual feedback-history ledger or reference buffer; other-purpose
  evidence and correction requirements still need explicit specification.
- **Still open:** rating format and eligibility, same-session ordering/batching,
  repeated/organized manipulation, report effects, correction/appeal, data
  retention, visibility and full matching/scoring acceptance criteria. The
  illustrated honor-update fraction, score scale and influence curve are not
  frozen production settings. No anti-retaliation effectiveness is established.
- **Implementation gate:** remaining applicable slice specifications and
  testable acceptance criteria must still be approved under `DEC-008`. No app
  implementation, live-data operation, test resumption, release or remote
  action is authorized by this product-direction decision.
- **Affected records:** product foundations, `OQ-006`, current state, project
  index and owner decision sequence; earlier decisions are marked partially
  superseded without erasing their original approval evidence.
- **Route / baseline:** bounded product planning; decision/recommendation
  safety; privacy/data boundaries; owner/external review; deferral/owner review.
  Mandatory entry and selected procedures read; clean `new-development` at
  `7a821d8` verified. Six project records only; protected workflow and legacy
  application remain untouched. No agent delegation or provider action.
- **Verification:** project local links/anchors, all 32 unique sequential
  decision IDs, supersession boundaries and full six-file scoped diff checked;
  `git diff --check` passed. No application/live or completed-algorithm tests
  run for this decision-record unit. No push or remote action occurred.
- **Supersedes:** `DEC-029`/`DEC-030` only for exact last-N reference semantics;
  resolves `DEC-031`'s reference question and refines its dev calibration scope.
- **Superseded by:** `DEC-033` only for exact individual-history planning;
  reference method, startup delegation and other selected behavior remain in force

## DEC-033 - First-Version Honor Without Exact Individual Feedback History

- **Date:** 2026-10-02
- **Status:** approved planning direction; data contracts not implementation-ready
- **Decision owner:** project owner
- **Decision:** plan the first-version honor calculation around aggregate state,
  not an exact individual feedback-history ledger or last-N rating buffer.
  The smoothed raw reference selected by `DEC-032` is the current method;
  gradual adaptation is accepted and the reference-choice question is closed.
- **Approval evidence:** the owner explicitly says the first version is not
  planning to keep exact feedback history, reaffirms smoothing as the latest
  decision and requests removal of stale reference-choice questions. They also
  reaffirm implementation-time initialization/confidence delegation and that
  distinct settings may have the same numeric value.
- **Responsibility reaffirmed:** `DEC-031`/`DEC-032` continue to require startup/
  confidence handling, with the implementation agent selecting, documenting
  and testing its concrete development method. No owner-designed startup
  method or final calibration is newly required. Independent descriptively
  named parameters remain independent even when their numbers match.
- **Consequences and limits:** aggregate-only state cannot reconstruct an
  individual rating, its reviewer or exact prior sequence. Eligibility,
  duplicate prevention, reports, correction/appeal and operational evidence
  therefore need contracts compatible with this direction. This is not a
  deletion instruction, a decision about every session/report record, a
  storage schema, or a settled retention/access/legal policy. Any proposed
  individual-rating retention for another purpose must be surfaced explicitly,
  not silently introduced as a calculation implementation detail.
- **Future option:** if exact feedback history is later approved, reconsidering
  last-N would be a separate deliberate decision. Neither collecting history
  nor switching the reference is automatically approved or required now.
- **Volatility discussion:** the owner's accompanying questions propose
  rating-dispersion-dependent dampening. Its feasibility assessment and draft
  mathematics are recorded separately in product foundations; this decision
  does not select that scoring behavior, its parameters or its implementation.
- **Implementation gate:** applicable slice specifications and acceptance
  criteria still require approval under `DEC-008`; no app implementation,
  live collection, test resumption or external action is authorized.
- **Affected records:** product foundations, `OQ-006`, current state, project
  index and owner decision sequence. Historical evidence remains dated rather
  than being rewritten as though this decision existed earlier.
- **Route / baseline:** product planning; research/sourcing;
  decision/recommendation safety; privacy/data; owner/external review;
  deferral/owner review; interruption/recovery. Mandatory entry and selected
  procedures read; clean `new-development` at `f2aa723` verified. Six project
  records only; protected workflow and legacy application untouched. No agents
  delegated and no provider write performed.
- **Verification:** all 54 project Markdown files, 219 local links, 26 heading
  anchors and 33 unique sequential decision IDs checked; complete six-file diff
  reviewed and `git diff --check` passed. NIST sources reviewed; 12,078 synthetic
  arithmetic/bounds assertions passed, not full scoring or abuse acceptance.
  No application/live tests or portable validator run; no app, protected-
  workflow, production-data, push or other external state change occurred.
- **Supersedes:** narrows `DEC-032`'s unresolved individual-history planning
  direction; does not replace its reference or `DEC-031`'s startup delegation
- **Superseded by:** `DEC-047` for first-pass retention of records generated
  by approved features, including individual submissions for admin review.
  Aggregate/smoothed honor calculation and the absence of a last-N requirement
  remain unchanged.

## DEC-034 - Keep Volatility And Reviewer-Accountability Ideas Future Only

- **Date:** 2026-10-03
- **Status:** approved current-scope exclusions and future-idea preservation;
  feature adoption unapproved
- **Decision owner:** project owner
- **Decision:** exclude rating-volatility estimation and volatility-adaptive
  dampening from the current implementation scope. Preserve that possibility
  and the new reviewer-deviation accountability idea together for future
  consideration. Neither is an approved feature scheduled for later execution.
- **Approval evidence:** the owner explicitly says to keep volatility out of
  "this implementation scope," that there is no need to calculate it yet, and
  asks to write both ideas for the future. Existing discussed systems remain
  the scope direction; this is not a request to start application implementation.
- **Second idea preserved:** a player who consistently rates others differently
  from the assessments those recipients receive from other teammates might
  face a consequence to their own honor's responsiveness. The goal is fair
  ratings and accountability for absurd/unusual ratings. Detecting positive
  and negative departures versus only negative ones is undecided; increasing
  their own honor's responsiveness both upward/downward versus downward only
  is also undecided. No comparison method, indicator, formula or penalty is
  approved. The working interpretation and remaining ambiguities are in the
  product-foundation future section.
- **Current implementation consequence:** do not introduce either metric,
  adaptive effect, supporting data collection or diagnostic-only calculation
  into the current slice. Their future questions do not block that slice.
  Preserve the existing fixed-neutral baseline, smoothed unadjusted reference,
  bidirectional feedback, deviation-based dampening direction, intended
  isolated-extreme trade-off, initialization/confidence delegation and current
  no-exact-history planning under `DEC-026` through `DEC-033`.
- **Return condition:** only explicit owner reopening initiates future
  consideration. Re-evaluate benefit, evidence, abuse/fairness risks and data
  requirements; obtain feature adoption and applicable specification approval
  before implementation. Completing the current slice does not self-activate it.
- **Boundary:** no actual collection/retention, public label, majority-as-truth
  rule, automatic sanction, raw-history override, app implementation, live-test
  resumption or remote action is approved. Other current specification gaps
  and `DEC-008` gates remain intact.
- **Affected records:** product foundations and its adjacent future ideas;
  `OQ-006`, `DEF-006`, current state, project index and owner decision sequence.
- **Route / baseline:** product planning; decision/recommendation safety;
  privacy/data; owner/external review; deferral/owner review. Mandatory entry,
  always-applicable documents and selected procedures read; clean
  `new-development` at `783a56c` verified. Project documentation only; canonical
  workflow and legacy app preserved. No agent delegation or external action.
- **Verification:** all 54 project Markdown files, 223 local links, 30 heading
  anchors, 34 unique sequential decision IDs and six sequential deferral IDs
  checked. All four mathematical text blocks and prior decision entries remain
  unchanged. Full seven-file diff reviewed; `git diff --check` passed. No
  mathematical method for the reviewer idea evaluated or implemented; no app,
  live or new scoring tests run. Protected-workflow validator not run because
  the package is unchanged. No push or external state change occurred.
- **Supersedes:** the prior current agenda to decide on volatility adaptation;
  no approved core honor behavior is superseded
- **Superseded by:** none

## DEC-035 - Offer Voice Queue Choice And Defer Real Discord Integration

- **Date:** 2026-10-03
- **Status:** approved product direction and current integration exclusion;
  interim coordination journey remains incomplete
- **Decision owner:** project owner
- **Decision / evidence:** owner annotation 1 selects queueing with or without
  Discord voice and explicitly delays Discord implementation beyond this
  implementation, until the relevant Discord Join and Riot lobby-link
  availability/behavior can be tested. Discord is not a universal participation
  prerequisite. Preserve replaceable, presently unimplemented game joining.
- **Proposal, not approval:** both paths probably need text communication,
  possibly through QGuard's website. The owner has not yet selected a required
  native chat feature or an interim manual-Discord flow.
- **Open:** whether voice choices separate match pools; whether the voice
  option is hidden/disabled or has an approved manual path during the deferral;
  required native text room and its lifecycle. Future Discord admission,
  operator-access and cleanup contracts remain for the later integration slice.
- **Evidence boundary:** the owner's release/availability prerequisite is not
  a newly verified Riot release fact. Existing research is dated evidence;
  recheck provider state before resuming tests or relying on an integration.
- **Return condition:** `DEF-007` and the existing owner live-test hold;
  applicable specification approval under `DEC-008` before implementation.
- **Supersedes:** `DEC-024` only for optional voice participation and current
  Discord implementation timing; game-join preference and evidence gates remain
- **Superseded by:** `DEC-046` resolves the native-text proposal and current
  no-Discord-only queue; real Discord deferral and join evidence gates remain

## DEC-036 - Preserve Game Rank Compatibility While Widening Honor Matching

- **Date:** 2026-10-03
- **Status:** approved priority and widening direction; complete matching
  contract and game rules unverified
- **Decision owner:** project owner
- **Decision / evidence:** owner annotation 2 puts in-game rank compatibility
  first: matched users must be allowed to queue together under that game's
  rules. Within that constraint, prioritize similar honor. As queue wait grows,
  dynamically relax similarity criteria to accept less-similar teammates;
  never widen beyond actual in-game queue compatibility.
- **Implementation discretion:** widening rates, honor-distance limits and
  equivalent tuning are adjustable in development, with tests and documented
  selections. Unknown player population does not require freezing constants now.
- **Open / evidence needed:** applicable per-game/mode/party-size queue rules;
  any additional hard constraints such as language, region or voice choice;
  missing/contested rank behavior and acceptance/requeue rules. No rank source
  or fallback is selected here; those belong to the later identity/data group.
  Subsequent `DEC-048` now delegates the source and selects the first-pass fallback.
- **Consequences:** score closeness is a preference, not a promise of equal
  behavior. Waiting longer cannot authorize an impossible game party.
- **Return condition:** approved relevant matching slice and evidence-backed
  fixtures before reliance; no app or research execution approved by this entry
- **Supersedes:** none; refines `DEC-026`
- **Superseded by:** `DEC-044` for ownership of initial region/language
  queue-control details; game compatibility and honor priorities remain

## DEC-037 - Include Basic Friends And Partial Parties With Co-Party Rating Exclusion

- **Date:** 2026-10-03
- **Status:** approved current-scope addition and rating restriction;
  detailed party/recovery contract open
- **Decision owner:** project owner
- **Decision / evidence:** owner annotations 3 and 8 add partial pre-made
  parties, basic QGuard friendship/add-friend functionality and invitations
  into a QGuard lobby to the current implementation scope. Players may add
  one another as friends. Past-teammate history and friendship discovery from
  that history remain for a later plan, not this implementation.
- **Eligibility:** members of the same original partial party cannot rate
  each other. They may rate other matched teammates, who may also rate them,
  subject to the other participation/report rules. This is not a blanket
  prohibition on rating anyone in one's QGuard friend list.
- **Enforcement interpretation:** preserve the pre-made membership snapshot
  at queue/match entry; leaving that party later must not erase this restriction.
  Friendship is the owner's chosen supporting feature, not a claim that every
  possible partial-party implementation technically requires a friend system.
- **Open:** party invitation/consent and readiness behavior; what happens to
  the original partial party when the assembled team disbands; report-counting
  treatment of pre-made teammates. No history UI or permanent-team scope added.
- **Return condition:** approve the applicable party/friend and matching
  specifications under `DEC-008` before their implementation slice
- **Supersedes:** `DEC-025` only for basic friends/requests and partial-party
  entry; session grouping and remaining social-history exclusions stand
- **Superseded by:** none

## DEC-038 - Keep Reputation And Feedback Non-Public For Now

- **Date:** 2026-10-03
- **Status:** approved private direction; audience/access contract incomplete
- **Decision owner:** project owner
- **Decision / evidence:** owner annotation 4 answers the honor, feedback and
  reviewer-identity visibility question with "private for now." Do not make
  these public or expose them to teammates by default.
- **Open:** whether players see their own honor, received individual feedback,
  aggregates or reviewer identities; necessary authorized admin access. Private
  does not itself mean anonymous, and does not approve a visible second score.
- **Return condition:** approve the affected audience/access contract before
  exposing those fields in a user or operator slice
- **Supersedes:** none; settles non-public direction, not all of `OQ-006`
- **Superseded by:** `DEC-045` resolves own-score, reviewer and cleared-admin
  audience components; `DEC-052` permits matched-team honor visibility while
  keeping honor non-public outside the authorized team and reviewers hidden

## DEC-039 - Use A Bounded No-Show Challenge And Exclude Early-Leaver Ratings

- **Date:** 2026-10-03
- **Status:** approved initial direction; response, evidence and completion
  rules need owner clarification
- **Decision owner:** project owner
- **Decision / evidence:** owner annotations 5 and 6 classify not joining
  after matching as abandonment. After five minutes, teammates can raise a
  no-show challenge; if "everyone" does so, the target has 30 seconds to
  respond/join. On failure, remove that player and disband the QGuard matched
  team so others can find another game. These are initial configurable timings.
- **Feedback eligibility:** a player who left the game early cannot give
  ordinary teammate ratings. Teammate feedback about early leaving is the
  proposed evidence, not proof supplied by a game API.
- **Open:** whether "everyone" means all other matched players; whether an
  "I joined" response stops removal or needs confirmation; what counts as
  joining with no in-game visibility; how normal completion is declared;
  whether one early-leave flag suffices or the two-reporter rule applies;
  pending feedback for a team disbanded before play and requeue/partial-party
  recovery behavior.
- **Residual risk / deferral:** owner acknowledges false no-show accusations
  and collusion and explicitly puts stronger checks into later planning
  (`DEF-008`). Do not invent automatic honor deductions, bans or sanctions.
  QGuard disbanding is not verified control of the actual game party. Discord
  presence, if later available, cannot prove in-game joining or communication.
- **Return condition:** clarify affected rules and approve the relevant
  development slice. This does not approve production release without review.
- **Supersedes:** none
- **Superseded by:** `DEC-043` resolves no-show vote/acknowledgment and session
  completion; stronger checks remain deferred and reversible recovery delegated

## DEC-040 - Start With A Human Report Inbox Without Punishment Tools

- **Date:** 2026-10-03
- **Status:** approved initial admin scope; moderation penalties/policy deferred
- **Decision owner:** project owner
- **Decision / evidence:** owner annotation 7 selects a basic admin dashboard
  with reports presented to a human reviewer. Admin punishment/repercussion
  tools are not required now; automatic sanctions, restrictions, correction
  and appeal policy are for later planning/polish (`DEF-009`). No particular
  later penalty or policy is approved.
- **Owner clarification in the same review:** the owner distinguishes automatic
  consequences from automatic penalties. Two distinct teammates reporting a
  player in a match automatically invalidate that player's outgoing ordinary
  ratings for that match before human review (`DEC-041`). Tag this action in
  the admin view. This narrow eligibility consequence is current scope; do not
  expand it to bans, honor deductions or account sanctions. The prior wording
  about deferring all automatic effects did not express the owner's intent.
- **Implementation discretion:** ordinary admin-page layout/filter details
  can be drafted by the agent; authorized access and review meaning remain
  product/data requirements, not inferred from historical admin code.
- **Return condition:** approve the relevant report/admin specification and
  remaining settlement/eligibility rules before implementing the affected slice
- **Supersedes:** none
- **Superseded by:** none

## DEC-041 - Select Three Feedback Dimensions And Pending Report-Aware Settlement

- **Date:** 2026-10-03
- **Status:** approved feedback and automatic eligibility direction; settlement
  clock remains open, not an executable complete contract
- **Decision owner:** project owner
- **Decision / evidence:** owner annotation 8 selects communication,
  sportsmanship and effort ratings on user-facing scales of 1 through 10.
  Take their simple arithmetic mean as one behavioral honor input; separate
  permanent storage of each dimension is not required for this version.
  Communication can include in-game communication, not just Discord; effort
  remains behavior, not a mechanical-skill score (`DEC-010`).
- **Numeric responsibility:** owner prefers internal 100-scale or finer
  equivalent units to preserve small changes. The implementation agent chooses
  a suitable fractional representation and tests precision, rather than asking
  the owner to resolve the spoken float/integer terminology. `DEC-027` remains
  equivalent-scaling authority, not permission to change behavior.
- **Who can rate:** matched teammates, excluding oneself, unrelated people
  and original pre-made co-members under `DEC-037`; participation requirements
  under `DEC-039` also apply.
- **Report form direction:** expandable "Dishonorable actions" section with
  flags initially No: early leaving before completion; no talking/communication
  in Discord only for a Discord-enabled match; harmful, unsportsmanlike
  language/slurs. These are separate report flags, not numeric zero ratings.
  The Discord-specific question cannot operate as a real monitored feature
  while integration is excluded. Presence alone is not speech evidence.
- **Requested report effect, restated:** two or more distinct teammates
  reporting a player across any categories should make that player's outgoing
  ordinary ratings for this session ineligible. It is not two categories from
  one reporter, the incoming ratings received by that player, or a permanent
  ban. The owner's subsequent explicit clarification approves this automatically
  before human review, with the invalidation tagged in the admin view. Automatic
  penalties remain excluded under `DEC-040`.
- **Timing direction:** keep submitted ratings pending while session feedback
  and reports are considered. Fast submission and leaving the UI must not evade
  later reports; any new queue before settlement uses the then-current honor,
  not a claimed finalized update. Only eligible inputs enter both honor and
  its unadjusted smoothed reference.
- **Open:** how a session enters feedback; everyone responding versus a
  deadline; optional/skipped feedback and nonresponse; late reports after
  finalization; whether early leavers/pre-made teammates may submit reports
  that count toward the threshold. Ineligibility and recomputation behavior
  must be defined without silently adding a permanent raw-history ledger.
- **Data boundary:** a pending session batch is not an approval for permanent
  exact feedback history. `DEC-033` remains in force; actual collection,
  retention and access are for the later identity/data discussion.
- **Return condition:** settle these relevant product rules and approve the
  feedback/calculation slice; startup methods and development tuning remain
  delegated under `DEC-031`/`DEC-032`, not new owner questions
- **Supersedes:** none; refines feedback format/eligibility direction
- **Superseded by:** `DEC-043` for session-end/feedback-clock open components;
  dimensions, premade exclusion and automatic report consequence remain

### Shared Route And Evidence Boundary For DEC-035 Through DEC-041

Bounded owner-answer reconciliation, 2026-10-03: audited the eight annotations
against current records at clean `new-development`, `49b379d`, before edits.
The latest request is to finish original questions one through six; original
question seven (identity, rank access and data boundaries) remains for a
separate discussion. This differs from annotation numbering and from the
longer historical decision-sequence group numbering.

Route: product planning; decision/recommendation safety; privacy/data;
owner/external review; deferral/owner review; audit/reconciliation; recovery.
Mandatory entry and selected procedures were read. Clear new owner directions
authorize the documented additions/partial supersessions; the subsequent owner
clarification resolves automatic rating invalidation versus penalties. Other
uncertain operational meanings remain open. No approval of application
implementation, a complete specification slice, live-test resumption, provider
actions or release is inferred from this review. Canonical workflow, legacy
implementation and existing honor mathematics are preserved. Verification is
recorded in the current-state checkpoint after scoped document checks; one
coherent local documentation commit, no push or other external action.

## DEC-042 - Delegate Reversible Development Details And Review The First Build

- **Date:** 2026-10-03
- **Status:** approved bounded implementation discretion; not permission to
  start an unapproved application slice
- **Decision owner:** project owner
- **Decision / evidence:** in the latest annotations 2 and 3, the owner asks
  that only genuinely foundational decisions be brought for upfront discussion.
  Easily changeable details belong to the implementation agent, even when
  multiple viable options exist. The owner reviews the first implementation;
  refinements can enter a second, third or polish pass.
- **Scope:** inside approved development scope, choose and document reversible
  defaults instead of repeatedly asking the owner to design every detail.
  Explicit examples include region/language queue choices, tuning and whether
  original partial parties persist after the assembled team disbands. The
  latter feature is optional, not required first-pass work.
- **Record discipline:** distinguish agent-selected defaults from owner-selected
  behavior; explain the choice/alternatives, reversibility and verification.
  A detailed specification may explicitly delegate these choices, rather than
  listing each as an unresolved owner blocker. Test before the first-build
  review; polishing later does not excuse incorrect initial behavior.
- **Boundary:** this is not a universal waiver because code is editable.
  Existing approved honor/eligibility behavior, scope exclusions, sensitive
  data/permission boundaries, automatic-penalty exclusions, live-test holds
  and controlled-operation gates remain. New consequential policy outside the
  stated delegation requires owner review; factual game rules need evidence.
  `DEC-008` still gates a slice with its applicable approved specification,
  which can contain explicit implementation discretion.
- **Affected records:** project workflow-governance policy, current state,
  owner decision sequence and relevant specs/registers; canonical workflow
  remains untouched
- **Supersedes:** treating every reversible detail or multiple-option choice
  as a predevelopment owner decision; does not supersede `DEC-008` gates
- **Superseded by:** none

## DEC-043 - End Sessions By Participant Action And Settle Feedback Within Ten Minutes

- **Date:** 2026-10-03
- **Status:** approved first-pass session/feedback direction; polish deferred
- **Decision owner:** project owner
- **Decision / evidence:** latest annotations 1 and 3 select a participant
  "Session ended" action, distinct from reporting that a particular person
  did not join. A QGuard session may include several games, not necessarily
  one game; do not require automated game-end detection. Its feedback batch
  and per-match report eligibility consequence refer to that matched QGuard
  session, not separately verified individual in-game match completions.
- **Feedback timing:** clicking Session ended opens that participant's feedback
  screen. The first participant to declare session end and finalize their
  feedback starts a ten-minute completion window for the remaining players.
  Settle earlier if everyone has declared completion and finalized feedback;
  otherwise settle at the deadline, so absent/nonresponding users cannot leave
  the batch pending forever. Apply eligibility/report checks before honor and
  raw-reference updates, preserving `DEC-041`'s automatic invalidation.
- **Trigger interpretation:** the clock begins at the first completed feedback
  submission following Session ended, not merely at the first button click.
  A returning participant may be prompted for still-pending feedback; behavior
  after closure and optional/skipped fields are development details to specify,
  not a permission to silently apply late ratings or fabricate missing ones.
- **No-show clarification:** the five-minute challenge requires all other
  matched teammates, excluding its target. During the 30-second response
  period, the target's "I joined" acknowledgment stops removal for now.
  This is self-report, not independently verified game presence. Stronger
  participation/anti-griefing verification remains later planning (`DEF-008`).
- **Delegation:** original partial-party persistence is optional under
  `DEC-042`; remaining UI/recovery and submission edge details are agent-selected
  within this direction. Unanswered report-counting/early-leaver evidence
  sub-rules must be explicitly identified in the slice, not disguised as already
  selected owner policy or changed automatic penalties.
- **Residual risk / deferral:** early or malicious session-end declarations,
  different participant end times across multiple games, nonresponse and a
  dishonest I joined response may undermine this first-pass scheme. Owner
  explicitly accepts the simple development direction and defers polish
  (`DEF-011`); no real-user effectiveness or production safety is established.
- **Supersedes:** no-show vote/response and feedback-clock open components of
  `DEC-039`/`DEC-041`; existing eligibility and mathematical directions remain
- **Superseded by:** none

## DEC-044 - Delegate Region And Language Queue Design For The Valorant First Pass

- **Date:** 2026-10-03
- **Status:** approved implementation responsibility; provider facts unverified
- **Decision owner:** project owner
- **Decision / evidence:** latest annotation 2 reaffirms Valorant and asks the
  implementation agent to investigate relevant region/language choices, design
  and implement the initial queue controls, and let the owner review the first
  build before follow-up passes. The owner need not select every filter now.
- **Boundary:** preserve `DEC-036`'s actual game queue compatibility guard,
  then honor similarity with adjustable widening. Verify relevant official
  game rules when implementing; do not treat a language preference as a verified
  game eligibility rule or invent geography/mode restrictions from memory.
  No fresh release, provider access, region list or launch-country fact is
  asserted by this decision.
- **Delegation:** reversible initial controls/defaults and their hard-versus-
  preference behavior may be drafted by the implementation agent within these
  constraints, documented and tested. User reviews the first implementation;
  exact filter choices are no longer a mandatory upfront questionnaire.
- **Supersedes:** treating region/language queue-control specifics under
  `DEC-036` as owner-only predevelopment blockers; rank-source/data choices
  remain the separate original question seven
- **Superseded by:** none

## DEC-045 - Show Own Honor, Hide Reviewer Identities And Give Cleared Admins Full Case Context

- **Date:** 2026-10-03
- **Status:** approved audience direction; `DEC-047` subsequently selects
  first-pass retention; actual inventory/security contract still to be specified
- **Decision owner:** project owner
- **Decision / evidence:** latest annotation 4 explicitly permits players to
  see their own honor score. Received-rating/history/per-match point-change
  views are not required for the first version; reviewer identities must not
  be visible to players. This is player-facing anonymity, not irreversible
  anonymization of the moderation evidence.
- **Admin authority:** the admin panel is only for people granted data clearance.
  Those authorized admins can see all available QGuard moderation/account
  context without participant anonymity/redaction restrictions: who submitted
  feedback/reports, their targets, the feedback/report contents and associated
  project account data. Do not conceal relevant identities from the reviewer.
- **Boundary:** permission concerns QGuard project data that is legitimately
  collected/retained, not plaintext passwords, secret/token disclosure, arbitrary
  external data, recording or destructive/admin punishment powers. Protect the
  panel and keep raw identities out of participant APIs, logs and responses.
  This grants neither every account admin access nor an operational clearance
  to any named person in this documentation task.
- **History reconciliation:** admin access to individual feedback/report
  evidence is a moderation purpose, separate from `DEC-033`'s no exact-history
  honor calculation. Pending/report-case evidence must support the required
  review; lifetime individual feedback history, new retention durations and
  collection remain unselected until the later identity/data contract. Do not
  falsely promise evidence is inspectable after it has been discarded.
  `DEC-047` now selects retention without automatic expiry for the first pass
  and schedules the retention-policy review immediately after it.
- **Supersedes:** own-score/reviewer/admin audience open components of
  `DEC-038`; non-public peer reputation remains in force
- **Superseded by:** `DEC-052` for the exclusion of matched teammates from honor
  visibility only; reviewer anonymity and cleared-admin case access remain

## DEC-046 - Include Native Private Match Chat And Only The No-Discord Queue Now

- **Date:** 2026-10-03
- **Status:** approved current feature and queue boundary; future voice-pool
  fallback direction conditional, not current implementation work
- **Decision owner:** project owner
- **Decision / evidence:** latest annotation 6 requires private website text
  chat for matched parties in the first pass. It supports communication and
  can later carry a human-shared game-party link when an applicable link path
  is available and validated. Native chat is not automatic game-party joining.
- **Current queue:** only no-Discord queueing is available until actual Discord
  integration is implemented. No fake working with-voice queue, live bot/server
  work or test resumption is authorized. The joining component stays replaceable
  and unimplemented under the existing evidence gates.
- **Future voice pools:** owner prefers deciding this when the integration
  returns. If current architecture genuinely needs the boundary, use strictly
  separated with/without-voice pools as the approved conditional planning
  default; otherwise defer the choice. Do not build a second active queue now
  or a speculative generalized voice platform solely to force an early decision.
- **Access / data boundary:** matched-participant text access, no unrelated
  ordinary users, with cleared-admin access under `DEC-045`; private is not
  secrecy from authorized moderators. Chat retention, account mapping and link
  secret handling need the applicable data/security specification. No recording
  or provider integration is implied.
- **Supersedes:** `DEC-035`'s native-text proposal and interim voice-queue open
  component; Discord deferral and live-evidence gates remain intact
- **Superseded by:** none

### Shared Route And Evidence Boundary For DEC-042 Through DEC-046

Bounded decision/refinement unit, 2026-10-03, at clean `new-development`,
`bb153c8`. Six latest annotations mapped against current records before edits.
Route: product planning; decision/recommendation safety; privacy/data;
owner/external review; deferral/owner review; audit/reconciliation. Mandatory
entry, always-applicable documents and selected procedures read. New explicit
directions close earlier questions or delegate reversible development choices;
they do not grant a complete slice, live-provider action or release approval.
Original question seven remains the next separate identity/rank/data group.
Current-state verification records scoped diff, link/anchor/ID and unchanged-
mathematics checks. One coherent additive local documentation commit; no code,
canonical-workflow change, provider research or external action in this unit.

## DEC-047 - Retain First-Pass Records Until Explicit Deletion And Review In Pass Two

- **Date:** 2026-10-03
- **Status:** approved first-pass development policy; later policy review deferred
- **Decision owner:** project owner
- **Decision / evidence:** latest annotations 1 and 2 explicitly select
  "everything stays forever" until explicitly deleted in the database, while
  deferring the informed retention decision to the second pass immediately
  after the first implementation is available for review.
- **First-pass effect:** retain the records actually stored by approved
  features without automatic expiry or post-settlement purging. This includes
  account/session records, submitted ratings and reports, and native match-chat
  messages, including ordinary sessions without a report. Data-cleared admins
  can inspect this stored project evidence under `DEC-045`; other players'
  private information and reviewer identities remain protected.
- **Meaning of everything:** preserve actual approved-feature records; do not
  infer permission to collect arbitrary external data, record voice, retain
  secrets in logs, invent a new history product, or add future-only metrics.
  The implementation agent documents what is stored and why as the first
  version takes shape. This decision does not require recording every transient
  UI event or using feedback history to calculate honor.
- **Honor reconciliation:** smoothed aggregate scoring remains selected.
  Retaining individual submissions for first-pass review supersedes the earlier
  undecided other-purpose retention boundary, not the calculation method.
- **Deferred review:** `DEF-012` requires a concrete field/record inventory
  immediately after the first implementation, then owner review of what to
  keep, restrict, expire or delete, including moderation evidence, ordinary
  sessions, chat, logs and backups where present. No retention duration or
  future deletion is selected now.
- **Boundary:** this is the current development default, not a permanent
  public retention promise or a finding of legal/provider compliance. Existing
  real-user collection/release review remains in force. No database deletion
  occurs or is authorized by this documentation decision; later destructive
  operations still need their exact authorization.
- **Supersedes:** first-pass retention-selection gaps under `DEC-033`,
  `DEC-045` and `DEC-046`; does not supersede scoring, access or release gates
- **Superseded by:** none

## DEC-048 - Delegate First-Pass Identity And Rank Integration With A Declared-Rank Fallback

- **Date:** 2026-10-03
- **Status:** approved first-pass implementation direction and bounded delegation
- **Decision owner:** project owner
- **Decision / evidence:** latest annotation 3 delegates account identifier,
  ownership-check and rank-source choices to the implementation agent according
  to current feasibility. The owner will review the first version and iterate
  in later passes rather than answer hypothetical mandatory-verification
  questions before the actual integration flow is known.
- **Identity responsibility:** determine which identifiers the chosen flow
  actually needs and whether a supported ownership check is available. Do not
  assume manually entering a Riot ID is required, or impose a new upfront
  mandatory-verified-account gate. Record and test the selected first-pass
  method and its limits. Ownership and rank retrieval are different evidence
  claims but may depend on the same authorization/integration flow; evaluate
  them together. No Riot capability or access grant is established here.
- **Rank source order:** investigate current official capabilities during the
  applicable implementation work. Implement official rank retrieval if it is
  available, permitted and accessible within the approved scope. If it is
  unavailable, approval-gated, or needs further owner decisions, use
  self-declaration for the first pass rather than block on those decisions.
  This conditionally approves the fallback previously left open in `DEC-013`.
  Keep source/verification status accurate; an entered identifier or peer
  confirmation is not official API verification.
- **Fallback user flow:** show each participant's stated game rank in the
  QGuard matched lobby. In the Session ended feedback flow, ask whether any
  teammate's in-game rank differed from what the website displayed, and allow
  identification of the discrepancy. This implements the owner's proposed
  teammate check after play; it does not add automated in-game observation.
  Preserve the multi-game session and feedback-window rules of `DEC-043`.
- **Evidence limits:** the owner's expectation that teammates can compare
  in-game ranks is not a verified current-client fact. Check the relevant game
  surfaces; allow an honest unknown/not-observed answer rather than inventing
  confirmation. Self-declared rank must remain distinguishable from an official
  source, including before feedback. Teammate checking complements this accuracy
  labeling; it cannot make an unverified declaration officially verified.
- **Consequences and limits:** record discrepancy evidence for the existing
  human-review context. Design submission and report-category handling
  explicitly alongside `DEC-041`; do not silently change its two-distinct-
  reporters rule or invent automatic rank corrections, score deductions or
  punishment. Rank compatibility remains mandatory using the available rank
  input, but declaration-based checks cannot guarantee real in-game eligibility.
- **Review / external boundaries:** source choice, identifier needs and
  ownership-check details are agent work, not unanswered owner questions.
  Review the chosen implementation in later passes. `DEC-017`'s Riot-application
  direction remains conditional; provider applications/contact, credentials,
  deployments and other controlled actions keep their separate gates.
  Discord/game-joining exclusions and live-test hold remain unchanged.
  Neither this delegation nor the readiness request overrides `DEC-008`.
- **Supersedes:** first-pass owner-only identity-verification/source choice and
  unapproved-fallback status under `DEC-013`, `OQ-006`, `OQ-009`, `OQ-010`
- **Superseded by:** `DEC-055` for the future queue-time rank confirmation and
  pre-play lobby discrepancy response. The implemented first-pass fallback,
  truthful provenance and separate scoring/report rules remain in force until
  the corresponding approved change is implemented.

## DEC-049 - Use Docker For Development And Deployment And Select The Stack Before Planning

- **Date:** 2026-10-03
- **Status:** approved Docker/environment and sequencing direction; `DEC-050`
  subsequently settles the core stack choices and adds persistence/testing requirements
- **Decision owner:** project owner
- **Decision / evidence:** latest annotation and addition request Docker for
  local development and later deployment. Treat containerized PHP tooling/tests
  as the normal project path, not a dependence on the owner's host PHP install.
  The owner reports a local PHP testing-related problem; its cause is unverified
  and host repair is not requested.
- **Stack preferences:** Laravel is the requested application-framework
  direction. SQLite is preferred for simplicity if adequate; PostgreSQL is the
  preferred server database if warranted. Redis should be added only for a
  justified need, not by default. Nginx is preferred; Blade is acceptable, and
  the owner welcomes frontend alternatives. These preferences do not approve
  the agent's proposed complete stack or inherit legacy versions/configuration.
- **Responsibility and sequence:** the agent recommends the stack and explains
  meaningful tradeoffs; settle it with the owner before drafting the detailed
  technical design, execution plan and acceptance-test package. Those documents
  are the agent's work. Existing product choices/delegation remain in force;
  no new broad product questionnaire is required. A repository plan is an
  acceptable later deliverable; no planning-mode change is required by this
  decision.
- **Boundary:** Docker deployment direction is not authorization to deploy,
  change containers, pull/build images, provision services or reuse legacy code
  in this recommendation task. `DEC-008`'s specification and controlled-
  operation gates remain. Tests executed later in Docker must report actual
  results; engine availability alone is not a passing application test.
- **Recommendation:** see the separate
  [stack review](../planning/rewrite-owner-decision-sequence.md#stack-recommendation--2026-10-03).
  Proposed PostgreSQL, Livewire, Reverb and Redis omission are not recorded as
  owner-selected merely because the agent recommends them. Apply the subsequent
  explicit selections in `DEC-050`; do not use this earlier pending status to
  reopen PostgreSQL, Livewire or initial Redis omission.
- **Supersedes:** treating Docker as wholly undecided in first-pass planning;
  pauses detailed execution planning until the stack discussion is settled
- **Superseded by:** `DEC-050` for the pending core-stack selection only;
  Docker, sequencing, drafting responsibility and approval boundaries remain

## DEC-050 - Approve The Core Stack, Persistent Database Storage And Docker-Based Testing

- **Date:** 2026-10-03
- **Status:** approved stack choices and acceptance direction; not a complete
  implementation-specification approval or test-pass claim
- **Decision owner:** project owner
- **Decision / evidence:** the owner explicitly approves PostgreSQL instead of
  SQLite, no Redis initially with Laravel database-backed jobs/cache, and
  Blade with Livewire. Docker for development and later deployment is reaffirmed.
  Laravel remains the framework direction under `DEC-049`; no legacy code or
  configuration reuse is implied. The core-stack discussion no longer blocks
  the agent from drafting the concrete technical plan.
- **Persistent storage:** run PostgreSQL in Docker with its data on a persistent
  volume/mount separate from the replaceable container filesystem. Data must
  survive normal image rebuilds and container recreation, reusing that storage.
  The owner's final explicit persistence wording controls the earlier spoken
  "data is reset" fragment; automatic resets are not requested. Exact mount
  type, names and paths are implementation details. This does not authorize
  volume deletion, destructive resets or untested major-version upgrades;
  persistent storage is not a substitute for backups.
- **Backend verification:** require assertion-based unit, integration and
  regression tests, including PHPUnit-style backend tests as well as Pest.
  Database-dependent integration/concurrency tests use PostgreSQL, not an
  SQLite substitute. Run the suites in Docker. Pest's PHPUnit foundation does
  not require duplicating identical tests, and does not waive the requested
  backend assertions or PHPUnit-style coverage.
- **Browser verification:** cover every implemented first-pass user/admin flow
  in the real browser UI, with end-to-end assertions and rendered checks as
  appropriate, not only isolated backend tests or successful page loads.
  Include relevant validation, permission, failure and recovery paths. Keep a
  flow-to-test coverage record with actual results and explicit gaps; no claim
  of complete coverage while required checks remain unrun.
- **Synthetic accounts:** include repeatable seeders/factories for fictional
  development/test accounts, roles and scenarios. Real Riot, Steam or Discord
  account connections are not needed for these app-flow tests. Clearly identify
  simulated provider behavior; it cannot prove live integrations or resume the
  held game/Discord tests. Scope seeders to designated development/test targets;
  isolate resettable automated-test data from persistent development and future
  production data, without writing seed credentials into tracked records.
- **Supporting choices:** exact versions, test-runner/browser commands and
  supporting tools such as Reverb/Echo remain agent proposals for the concrete
  packet, not separately explicit owner selections in this response. Do not
  turn these reversible engineering details into another broad questionnaire.
- **Affected records:** current state, owner decision sequence/stack review,
  specification index and `OQ-007`. The next work is the agent-drafted detailed
  specification, data/technical contracts, acceptance package and execution
  stages under `DEC-008`; this confirmation does not start app/container setup,
  grant deployment or override the applicable specification gate.
- **Supersedes:** pending owner selection of PostgreSQL versus SQLite, initial
  Redis omission, Blade/Livewire and test direction in the earlier recommendation;
  extends `DEC-049` with persistence and explicit backend/browser coverage
- **Superseded by:** none

## DEC-051 - Prepare A Modular File-Based Plan With One Brief Review Before Implementation

- **Date:** 2026-10-03
- **Status:** approved planning workflow; concrete packet subsequently approved
  with the matched-honor amendment in `DEC-052`
- **Decision owner:** project owner
- **Evidence:** after considering normal versus Plan mode and a single-shot
  plan-to-implementation run, the owner accepted the recommended normal-mode
  file-based planning with a brief review checkpoint: "I approve of this. If
  you can start now, go ahead and start."
- **Decision:** the agent now consolidates prior decisions, fills delegated
  engineering details and writes modular specifications, technical/data contracts,
  execution stages and acceptance tests in the existing project-docs structure.
  The plan is primarily an executable guide for the implementation agent, not
  one long chat document the owner must inspect line by line. No Plan-mode
  switch is needed. Present a short owner summary linked to the complete packet.
- **Approval boundary:** the owner reviews that summary and approves the named
  packet before application implementation. This request starts planning, not
  application code, container setup or a waiver of DEC-008. Earlier discussion
  of proceeding without plan review does not override this latest checkpoint.
- **After approval:** execute coherent stages, test and fix within the approved
  scope and existing delegated discretion. Do not demand a new owner answer for
  each reversible technical detail. Pause for genuine blockers, consequential
  unapproved changes or separately controlled operations. Local coherent commits
  remain authorized; pushes, PRs, deployments, destructive actions and history
  rewrites still require specific explicit authorization.
- **Current packet:** [QG-FIRST-PASS-1 revision 1](../planning/first-pass/README.md),
  agent-proposed implementation contracts, not themselves an approved product
  decision. The brief summary highlights observable delegated edge choices.
- **Supersedes:** any ambiguity that normal mode removes the review gate or
  that only a single Plan-mode document can carry an implementation plan
- **Superseded by:** `DEC-052` satisfies the packet-review checkpoint; ongoing
  scope, delegation, verification and controlled-operation rules remain

## DEC-052 - Approve First-Pass Revision 1 With Matched-Team Honor Visibility

- **Date:** 2026-10-03
- **Status:** approved packet and explicit visibility amendment
- **Decision owner:** project owner
- **Evidence:** owner approves all of QG-FIRST-PASS-1 revision 1 except hiding
  teammates' honor: when matched, teammates should see each other's honor
  alongside game rank. The identities of people giving honor feedback stay hidden.
- **Approved artifact:** the complete QG-FIRST-PASS-1 revision 1 packet at
  `aa3ded2`, with this exact amendment carried into its specifications, plan
  and acceptance matrix. Refer to the effective packet as "revision 1 + DEC-052";
  no unrelated revision or second approval request is required.
- **Visibility:** show each matched participant's aggregate honor score and
  game rank to the other authorized members of that matched QGuard session.
  Own honor remains visible. This does not create public honor profiles,
  leaderboards, pre-match candidate disclosure or honor visibility for an
  unrelated friend/outsider. Membership/access controls still apply.
- **Feedback privacy:** do not disclose who gave a received rating, individual
  received ratings, report authors or reviewer-to-feedback mappings to players.
  Visible roster identities are not anonymous; their association with private
  feedback remains hidden. Existing cleared-admin case access is unchanged.
- **Implementation interpretation:** display a match-time honor snapshot beside
  the existing rank snapshot in the authorized roster, using the committed honor
  that informed matching. This bounded agent detail avoids a live score-change
  feed that could expose feedback timing; it does not change honor calculation,
  settlement, eligibility, matching priorities or the owner's live own-score view.
- **Gate result:** first-pass specification approval is satisfied for the
  approved execution stages. Reconcile this amendment before application work;
  do not reopen the completed packet review or claim the app is already built.
  Normal stage-entry checks, tests and coherent local commits remain required.
- **Limits:** no push, PR, deployment, persistent-data deletion, history rewrite,
  provider application, public release, voice recording or held live-test
  resumption is granted. Deferred work and first-build owner/data review remain.
- **Supersedes:** `DEC-038`/`DEC-045` and packet wording excluding matched peers
  from aggregate honor visibility; `DEC-051`'s pending packet-review state
- **Superseded by:** none

## DEC-053 - Prefer the Officially Documented Riot Developer API

- **Date:** 2026-10-23
- **Status:** approved owner preference; not integration implementation approval
- **Decision owner:** project owner
- **Evidence:** owner says they would rather use Riot's documented developer
  API than the client API and asks to identify what is possible through each.
- **Decision:** prioritize the officially documented Riot developer API for
  QGuard requirements it supports. Classify official developer, private
  Riot-hosted client services and local client services separately. A Riot-hosted
  endpoint is not automatically a supported developer endpoint.
- **Interpretation and limits:** this is a preference, not a blanket permanent
  prohibition on alternatives. It is not approval to substitute private
  endpoints when public capabilities are missing, request or collect client
  session credentials, adopt a desktop companion or assume that a production
  key/RSO grant permits game-party control. Present unsupported requirements
  and candidate alternatives explicitly before changing the integration scope.
- **Reason:** owner prioritizes officially documented developer access over
  client-specific mechanisms; the actual capability boundary must remain clear.
- **Current evidence:** the [API comparison](../research/valorant-client-api-and-ui-status.md#official-developer-api-preference-and-capability-comparison)
  distinguishes supported identity/match/leaderboard access from unproven
  private rank, party-code and shared-link mechanisms. This is evidence, not a
  provider approval or completed non-friend joining test.
- **Unchanged:** `DEC-048`'s first-pass declared-rank fallback, `DEC-046`'s
  implemented native chat/no-Discord queue, replaceable game joining and the
  paused live tests. No provider application/contact, push, deployment or new
  implementation is authorized by this request.
- **Affected records:** API research, `OQ-009`, current state and future
  integration proposals.
- **Supersedes:** none; clarifies priority without changing approved fallbacks
- **Superseded by:** none

## DEC-054 - Use Structured Host Setup And Team Join Instructions

- **Date:** 2026-10-23
- **Status:** approved product direction for future handoff; not implementation approval
- **Decision owner:** project owner
- **Evidence:** owner accepts a designated human creating the game party, but
  explicitly replaces pasting into team chat with a dedicated page or prompt
  and structured presentation to the other matched players.
- **Decision:** QGuard prompts the designated matched host to create/open the
  game party. The host submits its supported joining information through a
  dedicated QGuard input. QGuard presents that information and the appropriate
  join action/instructions to the remaining matched players in a structured
  interface, rather than relying on everyone finding a free-form chat message.
- **Capability boundary:** "room ID or join code" describes the owner's intended
  input, not evidence that every identifier works. The actual supported artifact
  may be an official lobby link or a separately validated join code. A raw party
  ID is not presumed joinable. QGuard does not thereby create the game party,
  generate private API codes, force entry or verify game membership.
- **Open details:** page versus prompt layout, host selection/replacement,
  artifact validation, expiry, retries, failure recovery and the applicable
  data/access contract remain for the later slice specification.
- **Unchanged:** preferred future game-specific Discord Join candidate,
  `DEC-035`/`DEC-046` integration boundaries, `DEC-053` API preference and paused
  live tests. No application changes or external operations are authorized here.
  The accompanying question about last-ranked-match rank is a research request,
  not itself approval to replace `DEC-048`'s rank fallback; the subsequent owner
  instruction selects a rank-confirmation direction in `DEC-055`.
- **Affected records:** coordination/handoff specification, integration research,
  `OQ-009`, `OQ-011` and current state.
- **Supersedes:** `DEC-021`/`DEC-024` only for the manual method's submission and
  delivery surface; their human participation and live-evidence requirements
  remain applicable.
- **Superseded by:** none

## DEC-055 - Refresh And Confirm Rank Before Queueing And Check Lobby Discrepancies

- **Date:** 2026-10-23
- **Status:** approved product direction; `DEC-056`/`DEC-057` subsequently settle
  confirmation, voters and threshold; detailed lifecycle incomplete; not implemented
- **Decision owner:** project owner
- **Evidence:** owner directs QGuard, after RSO, to retrieve the latest available
  rank and ask the player to confirm or manually correct it each time they are
  about to enter matchmaking. After matching, players check lobby accounts and
  ranks; discrepancies dissolve the QGuard team and users may queue again.
- **Queue-entry decision:** with authorized official access, retrieve the
  linked player's latest available ranked-match tier, show it to that player,
  and require confirmation or manual correction before that matchmaking entry.
  Repeat on subsequent entries because rank can change between sessions. The
  owner's discussion of after-game/session refreshes does not additionally
  require polling at each of those times; pre-queue is the selected checkpoint.
- **Evidence labels:** preserve the distinction between API-observed tier/date,
  player-confirmed or corrected current declaration, and linked account
  ownership. Manual correction is allowed; it does not overwrite the meaning
  of the official observation or turn the replacement into an API-verified
  current rank. RSO does not prove which account is presently in the game lobby.
- **Lobby-check decision:** after QGuard forms the team, ask matched players
  whether everyone is present in the game lobby with the declared accounts and
  ranks. If the discrepancy rule is met, disband the matched team **in QGuard**,
  explain that reported account/rank discrepancies caused it, and allow users
  to enter matchmaking again. This is interpreted as a pre-play lobby check,
  not forced cancellation of an already-running VALORANT match.
- **Subsequent clarification:** `DEC-056` requires teammate confirmation rather
  than immediate dissolution on one report. `DEC-057` selects the other three
  teammates as eligible corroborators and one confirmation as sufficient even
  against two denials. Unobservable rank, response timing and recovery still
  need a contract; the separate no-show and feedback thresholds are unchanged.
- **Unchanged boundaries:** no game-side kick/party control, automatic requeue,
  account punishment, honor deduction or new feedback invalidation is approved.
  Existing post-session rank feedback is not removed. `DEC-048` still permits
  the current unavailable-integration fallback; no claim of guaranteed fresh
  rank follows from user confirmation. Provider access, actual lobby visibility,
  live testing and implementation remain subject to their existing gates.
- **Affected records:** identity/rank and session specifications, first-pass
  manifest, integration research, open questions and current state.
- **Supersedes:** `DEC-048`'s future reliance on profile declaration/post-session
  observation alone by adding queue-time refresh/confirmation and pre-play
  discrepancy dissolution; existing verified first-pass behavior is not claimed
  to have changed. Does not supersede `DEC-041` scoring or `DEC-043` no-show rules.
- **Superseded by:** `DEC-056` only for the previously unresolved requirement
  for a mandatory teammate-confirmation process; `DEC-057` for voters and tally

## DEC-056 - Require Teammate Responses To A Lobby Discrepancy Report

- **Date:** 2026-10-27
- **Status:** approved confirmation direction; voting rule subsequently settled
  by `DEC-057`, recovery contract incomplete; not implemented
- **Decision owner:** project owner
- **Evidence:** owner requests that a discrepancy report open a popup or alert
  for the others, naming the reported player and asking them to confirm or deny
  the rank being checked; people must not move on without responding.
- **Decision:** a single report initiates teammate confirmation, not immediate
  team dissolution. Show the relevant matched teammates a required prompt
  identifying the reported player and the disputed rank/account information.
  They must explicitly confirm or deny before proceeding past the QGuard
  lobby-check step. Answering is mandatory; agreement with the reporter is not.
- **Interpretation boundary:** the gate is QGuard progression, not control of
  VALORANT or the user's device. The owner's naming requirement concerns the
  reported teammate; it does not authorize revealing the reporter's identity.
  A response is peer testimony, not official API verification.
- **Subsequent voting rule:** `DEC-057` excludes the reporter and reported
  player, and one of the other three confirming the discrepancy is sufficient
  even if both others deny it. `DEC-058` rejects an unknown/"I can't verify"
  response in this prompt. Missing answers, response timing and recovery remain
  unresolved. No timeout approval or penalty is selected by these decisions.
- **Unchanged:** queue-time rank confirmation/correction and QGuard-only
  discrepancy dissolution under `DEC-055`; separate no-show, scoring and
  post-session report rules; provider access and live-test holds. Once the
  eventual discrepancy rule is met, explain dissolution and permit voluntary
  requeue as already approved. This record does not authorize implementation.
- **Affected records:** identity/rank and session specifications, `OQ-010`,
  current state and the earlier `DEC-055` clarification.
- **Supersedes:** the open choice in `DEC-055` between one-report immediate
  dissolution and requiring teammate confirmation; selects confirmation only
- **Superseded by:** `DEC-057` for the previously open voter eligibility and
  dissolution threshold; `DEC-058` for the response-option choice. Mandatory
  response direction otherwise remains

### Documentation Checkpoint 2026-10-27

Product-planning route from clean `new-development` at `1d18da8`: mandatory
entry/system rules, project governance, decision safety, privacy/data, external
review, design, reconciliation and deferral procedures read. Scope is this
owner decision and dependent project records; no workflow or code changes.
Owner is the approving authority; tally/eligibility and recovery are the stop
conditions for implementation. Complete five-file scoped diff reviewed; the
changed relative link/anchor, 56 unique decision headings and `git diff --check`
passed. One additive local documentation commit records this unit.
Runtime/rendered/provider checks are unrun; live tests remain held.
No push, provider operation or deployment is part of this unit.

## DEC-057 - Disband On One Eligible Teammate Corroboration

- **Date:** 2026-10-27
- **Status:** approved voter eligibility and threshold; not implemented
- **Decision owner:** project owner
- **Evidence:** owner accepts excluding reporter and reported player, and
  explicitly selects one confirmation from the other three as sufficient even
  when the other two say the declared rank is correct.
- **Decision:** for a discrepancy about one member of a five-player matched
  team, neither the reporter nor the reported player casts a corroborating
  vote. Any one of the remaining three explicitly confirming the mismatch
  satisfies the QGuard-team dissolution rule. The original report alone is
  insufficient; repeated submissions by that reporter are not corroboration.
  Two other teammates denying the mismatch do not override a confirmation.
- **Meaning of confirmation:** agreement that the reported account/rank differs
  from the declaration, not agreement that the declaration is correct. Name the
  player and make that distinction explicit in the prompt and response labels.
- **Reason and tradeoff:** the owner prioritizes stopping a team whose declared
  matchmaking integrity is disputed over majority agreement. This is not proof
  the subject lied; two distinct players can still make an incorrect or
  coordinated allegation. No new account punishment or scoring change follows.
- **Unchanged:** required prompt/responses under `DEC-056`, QGuard-only
  dissolution with an explanation and voluntary requeue under `DEC-055`,
  truthful rank provenance, separate no-show/feedback rules and held live tests.
- **Still open:** nonresponse/timeouts, response collection/closure timing and
  other recovery details. `DEC-058` rejects an unknown/"I can't verify" answer
  in this prompt; actual ability to inspect the relevant information remains
  to be validated. The one-of-three threshold is settled and must not become
  majority or unanimous agreement. Implementation still needs its full contract.
- **Affected records:** current state, `OQ-010`, identity/rank and session specs,
  and supersession pointers in `DEC-055`/`DEC-056`.
- **Supersedes:** the open voter/tally choices under `DEC-055`/`DEC-056`; replaces
  the agent's unapproved two-of-three proposal in `OQ-010`. The owner did not
  approve that majority proposal.
- **Superseded by:** `DEC-058` only for the open unknown-answer choice;
  voter eligibility and threshold remain unchanged

### Voting Rule Documentation Checkpoint

Baseline: clean `new-development` at `abc4190`. Route: product planning,
decision safety, privacy/data, owner review, UI requirement clarification,
reconciliation and deferral under the previously read unchanged procedures.
Scope: record the two owner annotations and reconcile five project documents;
application and portable workflow files remain untouched. Complete scoped diff
reviewed; all 77 relative links, 27 anchors and 57 unique decision headings in
the changed records passed checks, as did `git diff --check`. One additive
local commit records the unit. Recovery rules remain owner questions;
no implementation, runtime/rendered tests, live-provider operations or push.

## DEC-058 - Do Not Offer An Unable To Verify Response In The Lobby Check

- **Date:** 2026-10-27
- **Status:** approved response-option decision; not implemented
- **Decision owner:** project owner
- **Evidence:** owner rejects the proposed "I can't verify" option, expects
  players to check the rank and wants to avoid an easy way to evade that check.
- **Decision:** the pre-game teammate discrepancy prompt requires an explicit
  answer that the checked rank/account matches or does not match the declaration.
  Do not add "I can't verify," "Not observed" or another abstention/skip option
  to this prompt. Answering remains mandatory, not agreement with the reporter.
- **Scope:** only the pre-game discrepancy confirmation under `DEC-055` through
  `DEC-057`. This does not remove the existing post-session "Not observed"
  feedback answer, override honest API-unavailable/unknown states, or change
  the approved rank correction and corroboration threshold.
- **Evidence boundary:** the owner's expectation that checking should always
  be possible is a product assumption, not a verified client capability.
  Confirm the actual account/rank visibility in the held live-validation work
  before relying on this flow. If it genuinely cannot be checked, return that
  concrete finding to the owner; do not fabricate an observation or silently
  reintroduce the rejected response.
- **Unchanged/open:** response timing, nonresponse and recovery remain to be
  specified. No silent answer, automatic penalty, test resumption or
  implementation is authorized by this decision.
- **Affected records:** current state, `OQ-010`, identity/rank and session specs,
  and relevant clarifications in `DEC-056`/`DEC-057`.
- **Supersedes:** the open unknown-answer choice under `DEC-056`/`DEC-057`;
  rejects the agent's proposed "I can't verify" option
- **Superseded by:** none

### Lobby Response Documentation Checkpoint

Baseline: clean `new-development` at `e0b5f38`. Route: product planning,
decision safety, privacy/data, owner review, UI requirements, reconciliation
and deferral under the previously read unchanged procedures. Scope is the
owner's response-option decision and five dependent project records. The
portable workflow, application and prior runtime evidence remain unchanged.
Complete scoped diff reviewed; 77 local links, 27 anchors, 58 unique decision
headings and `git diff --check` passed. One additive local commit records the
unit. No runtime/rendered/provider tests, live-test resumption, provider
operation, push or deployment occurred. Rank visibility and timeout/recovery
handling remain unresolved dependencies, not reasons to restore the rejected option.

## DEC-059 - Study Gankster Details with Owner Controlled Navigation

- **Date:** 2026-10-27
- **Status:** approved study scope and interaction boundary; no feature adoption
- **Decision owner:** project owner
- **Evidence:** owner requests a dedicated folder and files documenting how
  Gankster handles small UI/workflow details, such as rank refresh, to inform
  QGuard; owner explicitly reserves navigation and interaction until delegating
  independent exploration. Start from the logged-in page already open.
- **Decision:** study Gankster progressively as a product reference. Record
  observable behavior, documented systems, implementation uncertainties and
  possible QGuard adaptations in distinct categories. Do not presume shared
  API endpoints or a fully solved edge case merely because the products overlap.
- **Interaction boundary:** agent may inspect the owner's current page and
  rendered state. Owner performs navigation and interaction. Independent site
  exploration requires a later explicit instruction; this study does not grant
  permission to submit forms, join groups, send messages or change the account.
- **Record separation:** research belongs in
  [the Gankster folder](../research/competitors/gankster/README.md); its
  [project-specific procedure](../operations/competitor-study.md) belongs under
  operations. Reusable workflow rules remain untouched.
- **Product boundary:** adopting any discovered detail uses existing approval
  and specification rules. The automatic/manual rank-refresh example is a
  comparison topic, not supersession of `DEC-055`. No change to API preference,
  joining method, Discord/voice scope, data collection or implementation follows.
- **Unchanged:** held game/Discord tests and controlled-operation gates. The
  study is separate from proof of real game-entry behavior or provider approval.
- **Affected records:** study index/observations/comparison, operations,
  project index/current state and earlier Gankster research pointer
- **Supersedes:** none
- **Superseded by:** none

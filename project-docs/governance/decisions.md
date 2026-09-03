# TeamRadar Decision Register

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

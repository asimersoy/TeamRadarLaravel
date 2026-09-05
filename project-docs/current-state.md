# QGuard Current State

- **Last updated:** 2026-09-05
- **Status:** Gate 0 closed; initial Apex/Valorant API research complete and
  awaiting owner review
- **Objective:** choose the next bounded QGuard game/integration discussion from
  current capability evidence without treating research as product approval
- **Current route:**
  [RESEARCH-2026-09-05](routes/RESEARCH-2026-09-05-game-api-feasibility.md)

## Verified Workspace State

- Primary local-project/workspace boundary:
  `/Users/asime/Github/TeamRadarLaravel`
- Active Git repository boundary:
  `/Users/asime/Github/TeamRadarLaravel/TeamRadarRepository`
- The primary workspace root is intentionally non-Git. Its separate
  `sources/`, `scratch/`, `outputs/`, and `snapshots/` areas follow the tracked
  [workspace-layout policy](operations/workspace-layout.md).
- The broader `/Users/asime/Github` folder remains outside the project. Access
  to another external path may be requested for a specific need and is subject
  to review; it is not routine project access.
- The existing conversation retains `/Users/asime/Github` as its recorded
  starting directory, so repository commands use the nested repository path
  explicitly. The project registry identifies `TeamRadar` at the outer
  workspace path.
- Relocation baseline: clean `new-development` at
  `66515eb25988c45f260a4a8f74ac9ad36bdc4e82` immediately before and after the
  move, before this workspace-record update.
- Local branches: `master` at `3822e61` tracking `origin/master`, and the
  current `new-development` branch with no configured upstream. The readiness
  records build additively on the reconstruction commit.
- One worktree exists at the nested repository root; no submodules are
  configured.
- Pre/post relocation checks matched HEAD, refs, Git config, tracked index
  entries, ignored-state digest, file count, symlink count, and repository
  status. Only `.git/index` bytes changed when Git refreshed its stat cache;
  staged file identities remained identical.
- A full 42 MB pre-move archive is stored under the outer `snapshots/` directory
  with SHA-256
  `d12fd824b9e0b8314cc005e9d5a989cfa316118d73672658a0832ae4339db1b5`.
- The four recovered relay commits (`402a3f3`, `b1852b7`, `f0006bd`, and
  `5997de0`) remain readable Git commit objects.
- Running Compose services at inspection: none
- Active worker: primary Codex agent; no delegated assignments

## Current Authority

- The workflow package is project-neutral and remains unchanged.
- Current owner decisions cover reconstruction-first, no required code reuse,
  workflow/project-record separation, evidence-backed execution, the nested
  workspace boundary, protection of the canonical workflow, and the
  TeamRadar-specific workflow-governance contract. See the
  [decision register](governance/decisions.md).
- The portable workflow package remains the primary canonical general workflow.
  `DEC-007` protects its single canonical copy from modification without
  explicit advance owner approval. TeamRadar-specific workflow adaptations
  belong in separate project records; outer workspace notes are routing aids
  only.
- `DEC-008` and the
  [workflow-governance policy](operations/workflow-governance.md) control
  TeamRadar-specific rule changes, approvals, decision supersession,
  specification gates, commit boundaries, controlled operations, review
  batching, and reviewer authority.
- Current product decisions select the **QGuard** name, behavioral honor as the
  central concept, feasibility-led game selection, authoritative API-derived
  rank as preferred over declaration, bounded reporting for inaccurate fallback
  declarations, and capability/outcome extraction rather than inheritance of
  legacy implementation shape (`DEC-009` through `DEC-013`).
- `DEC-014` closes the historical gate as sufficient for redesign without an
  exhaustiveness claim. `DEC-015` requires gradual, bounded product discussions,
  keeps PC provisional, sequences fallback discussion after API research, and
  preserves the specification gate for each implementation slice.
- The legacy Laravel app, old project docs, reachable/unreachable Git history,
  and supplied memory dump are evidence only.
- No complete product/use boundary, initial game, API integration, matching
  criteria, honor formula/effect, moderation policy, architecture, technology,
  deployment, or implementation plan has been approved.

## Work State

- **Completed:** workflow orientation, repository and branch recovery audit,
  memory-dump review, reachable history review, read-only recovery of the
  orphaned Electron relay history, the organized historical dossier, and the
  owner decision sequence for rewrite readiness. The repository was also moved
  intact into the approved nested workspace layout, and the TeamRadar-specific
  workflow-governance contract is approved. Owner corrections and the approved
  product foundations are recorded in `DEC-009` through `DEC-013`. Gate 0 is
  closed by `DEC-014`, and the initial current-source Apex/Valorant API pass is
  recorded in the
  [game API feasibility findings](research/game-api-feasibility-findings.md).
- **In progress:** owner review of the documented rank-coverage and
  ordinary-party-formation gaps. No first game, fallback, provider application,
  or integration boundary has been selected.
- **Next:** discuss the minimum acceptable party-formation and rank fallback,
  then either evaluate the approval-gated Valorant boundary in more detail or
  expand the same research matrix to another PC game.
- **Untouched:** legacy code, legacy `docs/`, configuration, tests, dependencies,
  generated data, and Git history.

## Verification State

- Workflow validator passed before project-record work: 68 Markdown files, 15
  procedures, and 38 inert templates.
- `docker compose config --quiet` passed; no Compose containers were running.
- `npm run build` passed for the legacy frontend with stale-Browserslist,
  PostCSS import-order, and empty-JavaScript-chunk warnings.
- PHP tests could not start because the local PHP 8.4.13 binary references the
  missing Homebrew library `libnetsnmp.40.dylib`. No application-test pass is
  claimed; application behavior is not the acceptance target for this audit.
- No remote, destructive, production, deployment, publication, or history
  rewrite action occurred.
- The 2026-09-03 recovery audit verified the registered TeamRadar project path,
  repository read/write access, branch tips, worktree/submodule state, the
  reconstruction commit and its 22-file/2,752-insertion documentation change,
  and recovered relay object availability.
- The 2026-09-03 workspace migration preserved all 18,365 regular files, 23
  relative symlinks, Git refs/configuration/index identity, ignored state, and
  known dangling historical objects. The outer directory is not a Git
  repository.
- The 2026-09-04 workflow-governance review resolved all eight `OQ-008`
  components. The scoped project-document diff passed relative-link and
  `git diff --check` validation, and the portable workflow package remained
  unchanged. No application test was required for this documentation-only
  decision unit.
- The 2026-09-05 QGuard foundation update reconciled the owner's naming,
  honor, rank-source, integration-research, and legacy-evidence decisions. The
  workflow validator passed, all relative links across 32 project Markdown
  files resolved, `git diff --check` passed, and the portable workflow and
  legacy application remained unchanged. Current API research and application
  runtime tests were not part of this documentation-only unit.
- The 2026-09-05 API research pass reviewed current first-party Riot, Valorant,
  Discord, EA, and Apex sources; distinguished ordinary parties from Custom
  Matches; and preserved bounded negative findings. It used no credentials,
  provider contact, live client, reverse engineering, data collection, or
  automation. The workflow validator passed, all relative links across 34
  project Markdown files resolved, `git diff --check` passed, and the portable
  workflow package and legacy application remained unchanged. Application
  runtime tests were not required for this research/documentation unit.

## Gates

- The QGuard naming correction, honor foundation, feasibility-led game
  direction, rank-source preference, and legacy-evidence treatment are approved
  only to the extent recorded in `DEC-009` through `DEC-013`.
- Historical reconstruction is sufficient for redesign but is not described as
  exhaustive. The Apex/Valorant chronology remains a visible provenance limit,
  not a current blocker or game-selection rule.
- The research pass does not constitute Riot/EA approval, prove private
  interfaces absent, select a game, accept a fallback, or authorize client
  automation.
- No implementation slice starts until every specification required for that
  slice and its testable completion criteria are approved, unless the owner
  records a narrow explicit override under `DEC-008`.

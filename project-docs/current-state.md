# TeamRadar Current State

- **Last updated:** 2026-09-03
- **Status:** owner decisions required before implementation planning
- **Objective:** close or continue the legacy review, then define the current
  TeamRadar product and use boundary before creating an implementation plan
- **Current route:** [PLAN-2026-09-03](routes/PLAN-2026-09-03-rewrite-readiness.md)

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
- Current owner decisions are limited to reconstruction-first, no required code
  reuse, folder-level separation of workflow from project records,
  evidence-backed execution, and separation of the non-Git workspace from the
  nested Git repository. See the [decision register](governance/decisions.md).
- The portable workflow package remains the primary canonical general workflow.
  TeamRadar-specific workflow adaptations belong in separate project records;
  outer workspace notes are routing aids only.
- The legacy Laravel app, old project docs, reachable/unreachable Git history,
  and supplied memory dump are evidence only.
- No new TeamRadar product scope, architecture, technology, data collection,
  matching criteria, moderation policy, deployment, or permitted-use boundary
  has been approved.

## Work State

- **Completed:** workflow orientation, repository and branch recovery audit,
  memory-dump review, reachable history review, read-only recovery of the
  orphaned Electron relay history, the organized historical dossier, and the
  owner decision sequence for rewrite readiness. The repository was also moved
  intact into the approved nested workspace layout.
- **In progress:** owner review of whether the historical reconstruction is
  sufficient and, once that gate closes, definition of the current product.
- **Next:** owner answers Gate 0 in the
  [decision sequence](planning/rewrite-owner-decision-sequence.md), followed by
  one bounded current-product decision group at a time.
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

## Gates

- Historical reconstruction cannot be called exhaustive until
  [OQ-001](governance/open-questions.md#oq-001---is-more-legacy-evidence-available)
  is resolved, but the owner may accept the current corpus as sufficient
  context without claiming exhaustiveness.
- The Apex/Valorant chronology remains a visible provenance conflict under
  [OQ-002](governance/open-questions.md#oq-002---how-should-the-apexvalorant-historical-conflict-be-interpreted).
- No implementation starts until the current product charter, use boundary,
  MVP journey, matching/reputation treatment, data behavior, technical
  specification, and testable completion criteria are approved.

# QGuard Current State

- **Last updated:** 2026-09-05
- **Status:** Valorant selected for initial planning; lobby-link verification,
  rank behavior, and product boundary remain open
- **Objective:** continue bounded Valorant product decisions while preventing
  unverified lobby-link behavior or the Discord voice proposal from becoming
  implementation assumptions
- **Current route:**
  [PLAN-2026-09-05 Valorant selection and Discord voice proposal](routes/PLAN-2026-09-05-valorant-selection-and-discord-voice-proposal.md)

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
- `DEC-016` prefers friendship-free ordinary-party entry and treats the
  friend/invite path as a material-friction fallback. `DEC-017` keeps a
  prototype-first Valorant RSO application path conditionally available without
  authorizing implementation, provider contact, or submission.
- `DEC-018` selects Valorant as the initial game and requires a scoped
  two-account non-friend lobby-link test before a specification or
  implementation may depend on that capability.
- The legacy Laravel app, old project docs, reachable/unreachable Git history,
  and supplied memory dump are evidence only.
- No complete product/use boundary, platform/region/mode/audience wedge, rank or
  API integration, coordination surface, matching criteria, honor
  formula/effect, moderation policy, architecture, technology, deployment, or
  implementation plan has been approved. Temporary Discord rooms and voice
  recording remain an owner proposal, not a product decision.

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
  The focused
  [party-entry and policy findings](research/party-entry-and-policy-fit.md)
  verify the Valorant lobby-link candidate, the absence of an evidenced Apex
  equivalent, and the exact boundary where provider terms affect QGuard.
  Owner review selected Valorant and set the link test gate in `DEC-018`.
- **In progress:** bounded Valorant product decisions. The required lobby-link
  verification is `DEF-001`; rank fallback, Riot access, complete wedge, and
  coordination surface remain open. The
  [Discord coordination and voice-evidence packet](planning/discord-coordination-and-voice-evidence-options.md)
  records temporary rooms and possible recording as an unapproved proposal.
- **Next:** continue with minimum acceptable rank evidence or another bounded
  owner-selected product question. Activate `DEF-001` before any integration
  specification relies on the lobby link. Review Discord coordination and
  voice capture separately when their data and moderation consequences become
  decision-relevant.
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
- The 2026-09-05 focused party-entry follow-up rechecked first-party Riot,
  Valorant, Discord, EA, and Apex sources; distinguished Valorant's official
  lobby link from its formal Discord-friend discovery; found no current
  first-party Apex Discord Join or ordinary-lobby link/code; and mapped provider
  restrictions only to the QGuard actions they actually affect. No account,
  client, credential, provider contact, automation, interception, or data
  collection was used. The workflow validator passed, all relative links across
  36 project Markdown files resolved, `git diff --check` passed, and the
  portable workflow package and legacy application remained unchanged.
  Application runtime tests were not required for this documentation-only unit.
- The 2026-09-05 owner follow-up selected Valorant, defined the precise
  non-friend link-test gate, and separated temporary Discord coordination from
  report-reviewable voice recording. The recording idea is preserved as a
  proposal with explicit future privacy, consent, security, moderation,
  provider-policy, and qualified-review gates. All relative links across 38
  project Markdown files resolved, `git diff --check` passed, and the portable
  workflow package and legacy application remained unchanged. Application
  runtime tests and the portable-system validator were not run because this
  unit changes project records only.

## Gates

- The QGuard naming correction, honor foundation, feasibility-led game
  direction, rank-source preference, and legacy-evidence treatment are approved
  only to the extent recorded in `DEC-009` through `DEC-013`.
- Historical reconstruction is sufficient for redesign but is not described as
  exhaustive. The Apex/Valorant chronology remains a visible provenance limit,
  not a current blocker or game-selection rule.
- The owner selected Valorant; the research itself still does not constitute
  Riot approval, prove private interfaces absent, approve a rank fallback, or
  authorize client automation.
- The Valorant party link is the accepted candidate direction but remains
  provisionally viable. `DEF-001` must verify non-friend acceptance before a
  specification or implementation relies on it.
- Discord room creation and voice recording are not approved. In particular,
  later report review would require prior audio capture and retention and
  therefore cannot be introduced as an incidental bot feature.
- No implementation slice starts until every specification required for that
  slice and its testable completion criteria are approved, unless the owner
  records a narrow explicit override under `DEC-008`.

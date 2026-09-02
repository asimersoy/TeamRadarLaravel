# Task Route: MIGRATION-2026-09-03 Workspace Nesting

- **Objective:** convert the TeamRadar primary folder into a non-Git workspace,
  move the complete repository one level down without data/history loss, and
  establish separate non-versioned source, scratch, output, and snapshot areas
- **Status:** completed
- **Owner:** project owner; primary Codex agent executed and verified the move
- **Started:** 2026-09-03
- **Source:** `/Users/asime/Github/TeamRadarLaravel`
- **Target:**
  `/Users/asime/Github/TeamRadarLaravel/TeamRadarRepository`
- **Baseline:** clean `new-development` at
  `66515eb25988c45f260a4a8f74ac9ad36bdc4e82`

## Routed Procedures

- Official Codex project-folder behavior and the current spreadsheet artifact
  contract were reviewed: yes ->
  `../../portable-project-workflow-system/docs/procedures/research-sourcing-and-search.md`
- Repository, ignored-file, symlink, Git-object, and post-move reconciliation:
  yes ->
  `../../portable-project-workflow-system/docs/procedures/audit-and-reconciliation.md`
- Complete tracked/ignored repository state moved to a new path: yes ->
  `../../portable-project-workflow-system/docs/procedures/migration-and-import.md`
- Snapshot, recovery, and path-sensitive environment readiness: yes ->
  `../../portable-project-workflow-system/docs/procedures/deployment-backup-and-rollback.md`
- The active conversation and repository resumed after a directory change: yes
  -> `../../portable-project-workflow-system/docs/procedures/interruption-and-recovery.md`
- Product planning, application implementation, public content, data migration,
  design, experiment, delegation, or external review: no

## Authority And Scope

- **Owner instruction:** make the primary TeamRadar folder non-Git, move the
  active repository one child level down, prepare appropriate non-Git folders,
  retain the repository's canonical general workflow as primary, and keep
  TeamRadar-specific workflow rules in separate records.
- **Applied decisions:** `DEC-001` through `DEC-004`; `DEC-006` supersedes the
  former root-repository layout in `DEC-005`.
- **Included:** every tracked, untracked, ignored, hidden, dependency,
  environment, and `.git` entry in the former repository root; outer routing
  files; non-Git `sources/`, `scratch/`, `outputs/`, and `snapshots/`; tracked
  layout/decision/current-state updates.
- **Excluded:** changing portable workflow content; moving project authority
  outside Git; changing application code/configuration; cleaning ignored files;
  rewriting Git history; fetching/pushing; deployment or production action.
- **Stop conditions:** missing source entry, unexplained pre/post difference,
  corrupt/unreadable archive, changed ref/index identity, or scope outside the
  named workspace.

## External And Comparative Evidence

- The sibling `UzmanTavsiye` local project uses a non-Git umbrella with nested
  repositories plus root `AGENTS.md` and `WORKSPACE.md`; its preservation record
  documents a prior full-repository subfolder move.
- The sibling `ExamRadar` local project uses a non-Git workspace with a nested
  `ExamRadarRepository/` and separate documentation area.
- The portable workflow README permits keeping the workflow package at a
  repository root or beside a repository, while requiring explicit routing.
- OpenAI's [Projects and chats](https://learn.chatgpt.com/docs/projects) page,
  accessed 2026-09-03, states that local projects may expose multiple folders
  and that the primary folder controls default Git and `AGENTS.md` discovery.
- The active spreadsheet skill requires temporary authoring in a writable
  conversation-specific or temporary directory and final workbooks under
  `outputs/<unique-thread-id>/`.

These sources informed layout mechanics only. They provide no TeamRadar product
fact, approval, architecture, content requirement, or technology decision.

## Pre-Move Baseline

| Evidence | Value |
| --- | --- |
| Git status | clean `new-development` |
| HEAD | `66515eb25988c45f260a4a8f74ac9ad36bdc4e82` |
| `show-ref` digest | `15b38e599a7be18a8819e704f8477658db166fc74fa859e91a30caea2fce852a` |
| `.git/config` SHA-256 | `34f3107b0263c1769975b4a8a09b8165937e395a04b0afc9ed36dbc88ee61145` |
| Regular files | 18,365 |
| Symlinks | 23, all relative dependency executable links |
| Sockets/pipes/device files | none |
| Disk usage | 166 MB |
| Content/path aggregate digest | `2954fbe33f505236f1d9a7bf1e28fe4371e1c286bf45353e7dc273264d868943` |
| Ignored/tracked-status digest | `f53c42a2e2e4a8544e2f362b9c23af8c583e3081b30a703413de77a3b644638c` |
| Staged index identity digest | `9ab2d18798d13419cdf2a24f8738ef802f2ccc798e40737440429c6192cd30ac` |

`git fsck --full --no-reflogs` completed successfully and reported only the
previously present dangling history/tree/blob objects, including the recovered
relay history. No new corruption was reported.

## Recovery Snapshot

- **Location:** outer
  `snapshots/teamradar-pre-nested-repository-2026-09-03.tar.gz`
- **Size:** 42 MB compressed
- **SHA-256:** `d12fd824b9e0b8314cc005e9d5a989cfa316118d73672658a0832ae4339db1b5`
- **Contents:** the complete former root, including `.git`, `.env`, ignored
  dependencies/builds, local files, and tracked content
- **Verification:** archive listing passed before the move; checksum matched
  after placement in `snapshots/`
- **Recovery rule:** extract to an isolated location and compare first; active
  overwrite requires separate destructive authorization.

## Move And Reconciliation

Every inventoried top-level entry was moved into `TeamRadarRepository/`; no
copy/delete rewrite was used. Immediately afterward:

- the outer root contained only the nested repository before workspace support
  folders were added;
- the outer root no longer contained `.git`;
- the nested path resolved as the Git toplevel;
- HEAD, refs digest, Git config hash, regular-file count, symlink count,
  ignored/tracked-status digest, staged index identity digest, branch status,
  and known `git fsck` findings matched the baseline;
- a full extracted-archive comparison found exactly one byte-level difference:
  `.git/index`, refreshed by Git after the directory move;
- semantic staged index entries were identical before and after the refresh;
  therefore the difference is Git stat-cache metadata, not a tracked-content or
  staging change.

## Verification And Residual Risk

- **Structural/reconciled evidence:** passed for the complete moved tree and Git
  identity.
- **Documentation checks:** all relative links under `project-docs/` resolved;
  `git diff --check` passed; the scoped diff contained only repository routing
  and TeamRadar project records; and the canonical workflow package had no
  diff.
- **Path-sensitive execution:** `docker compose config --quiet` passed from the
  nested repository. `npm run build` passed with Vite 7.0.6 and produced its
  ignored build output. The build retained legacy warnings about stale
  Browserslist data, CSS `@import` ordering, and an empty `app` chunk; these are
  application observations, not migration failures. PHP tests were not run:
  the known host-PHP `libnetsnmp.40.dylib` blocker is unrelated, so no PHP test
  pass is claimed.
- **Workspace-support checks:** the editor-workspace JSON parsed successfully;
  the snapshot archive remained listable with 21,007 entries and retained its
  recorded SHA-256; the four recovered relay commits remained readable commit
  objects.
- **Codex UI risk:** because the primary workspace root is non-Git, built-in Git,
  PR, and worktree controls may require explicit nested-repository selection.
  Shell Git commands must target the nested path.
- **Remote state:** no fetch, pull, push, tag, PR, release, publication, or
  deployment occurred.
- **Commit boundary:** tracked repository instructions and TeamRadar project
  records only; all outer support files and snapshot material remain non-Git.

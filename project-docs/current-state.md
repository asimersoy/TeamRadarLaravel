# TeamRadar Current State

- **Last updated:** 2026-09-02
- **Status:** legacy reconstruction ready for owner review
- **Objective:** document the old TeamRadar concept and implementation faithfully
  before the owner redesigns the project
- **Current route:** [AUDIT-2026-09-02](routes/AUDIT-2026-09-02-legacy-reconstruction.md)

## Verified Workspace State

- Repository boundary: `/Users/asime/Github/TeamRadarLaravel`
- Baseline branch/revision: `new-development` at
  `7043054415a7784e487d075990077e26fc81f710`
- Baseline working tree: clean before project-record creation
- Baseline inventory: 221 tracked files; 72 workflow-system files and 149
  legacy project files outside the workflow system
- Local branches: `master` at `3822e61` and `new-development` one commit ahead;
  `new-development` has no configured upstream
- Running Compose services at inspection: none
- Active worker: primary Codex agent; no delegated assignments

## Current Authority

- The workflow package is project-neutral and remains unchanged.
- Current owner decisions are limited to reconstruction-first, no required code
  reuse, and folder-level separation of workflow from project records. See the
  [decision register](governance/decisions.md).
- The legacy Laravel app, old project docs, reachable/unreachable Git history,
  and supplied memory dump are evidence only.
- No new TeamRadar product scope, architecture, technology, data collection,
  matching criteria, moderation policy, deployment, or permitted-use boundary
  has been approved.

## Work State

- **Completed:** workflow orientation, route selection, repository inspection,
  memory-dump review, reachable history review, read-only recovery of the
  orphaned Electron relay history, and the organized historical dossier linked
  from `README.md`.
- **In progress:** owner review of source confidence, historical corrections,
  and whether more evidence is available.
- **Next:** owner supplies corrections/additional dumps or closes the
  reconstruction, then starts a separate product-planning route for the new
  project.
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

## Gates

- Historical reconstruction cannot be called exhaustive until
  [OQ-001](governance/open-questions.md#oq-001---is-more-legacy-evidence-available)
  is resolved.
- The Apex/Valorant chronology remains a visible provenance conflict under
  [OQ-002](governance/open-questions.md#oq-002---how-should-the-apexvalorant-historical-conflict-be-interpreted).
- No implementation starts until a future approved brief, technical
  specification, data/recommendation review, and testable completion criteria
  exist.

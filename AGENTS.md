# Repository Operating Instructions

These instructions apply to the TeamRadar repository. They connect the
project-neutral workflow system to the separate project-specific record tree.

## Workspace Layout

The repository normally lives at
`/Users/asime/Github/TeamRadarLaravel/TeamRadarRepository` inside a non-Git
workspace container. If `../WORKSPACE.md` exists, it describes local routing
and non-versioned storage, but it is not project authority.

- The canonical general workflow remains
  `portable-project-workflow-system/` and must stay project-neutral.
- Keep exactly one canonical workflow package. Do not modify any file under
  `portable-project-workflow-system/` without the project owner's explicit
  advance approval for that change. Report a generally reusable gap as a
  proposal; do not create a mutable TeamRadar copy of the package.
- TeamRadar-specific workflow adaptations and operating decisions belong under
  `project-docs/`, especially `project-docs/operations/` and the governance
  registers.
- Apply `project-docs/operations/workflow-governance.md` for TeamRadar-specific
  approval semantics, decision changes, specification gates, commit design,
  controlled operations, review batching, and reviewer authority.
- Prefer `../scratch/` for volatile task work and artifact builders,
  `../outputs/<thread-id>/` for generated deliverables, `../sources/` for raw
  local inputs, and `../snapshots/` for recovery material.
- Nothing outside the repository becomes a durable decision, approval,
  requirement, completion record, or project fact until promoted into a
  tracked project record with evidence.
- Run Git from this repository root. The parent workspace must remain non-Git.

## Mandatory Entry Path

Before substantive work:

1. read `portable-project-workflow-system/AGENTS.md`;
2. follow its entry path through
   `portable-project-workflow-system/docs/README.md` and complete the task
   routing checklist;
3. read `project-docs/README.md`, `project-docs/current-state.md`, and the live
   registers under `project-docs/governance/`;
4. read every procedure selected by routing; and
5. inspect the actual repository state before relying on any record or memory.

## Separation Boundary

- `portable-project-workflow-system/` contains reusable workflow rules,
  procedures, templates, and starter examples only. Do not add TeamRadar facts,
  decisions, plans, or evidence to that package.
- `project-docs/` contains TeamRadar-specific facts, owner decisions, questions,
  plans, reconstructions, reviews, and evidence.
- Legacy application files and `docs/` are historical project evidence unless
  a current record explicitly promotes an item.
- Templates remain inert. Copy their shape into `project-docs/` rather than
  editing a template into a live record.

## Working Rules

- Preserve legacy code and unrelated work unless the owner authorizes a bounded
  change.
- Keep verified facts, owner decisions, memory reconstructions, assumptions,
  proposals, open questions, rejected ideas, and deferred work visibly
  distinct.
- Do not let a historical decision or implementation choose the rewrite's
  scope, architecture, technology, data behavior, or use boundary.
- Completion reports must name evidence, unrun checks, residual risk, commit
  state, and remote-action state.
- Run `node portable-project-workflow-system/scripts/validate-docs.mjs` only
  when the reusable workflow package changes. For project-document changes,
  verify links, `git diff --check`, and the complete scoped diff.

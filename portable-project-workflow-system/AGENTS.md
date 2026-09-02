# Project Operating Instructions

These instructions apply to every worker in this repository unless a more
specific nested `AGENTS.md` adds stricter rules for its directory.

## Mandatory Entry Path

Before substantive work:

1. read `docs/README.md`;
2. complete `docs/system/task-routing-checklist.md`;
3. read `docs/current-state.md` and the active project registers;
4. read every procedure selected by the route;
5. inspect the actual repository state before relying on a report or memory.

## Authority Order

When instructions conflict, use this order:

1. the latest explicit owner instruction;
2. current project decisions and current state;
3. selected specialized procedures;
4. always-applicable system documents;
5. approved plans and specifications;
6. current review and completion reports;
7. inert templates;
8. historical evidence.

Stop the affected work when two records at the same authority level conflict.
Resolve the authority problem before continuing.

## Working Rules

- Preserve unrelated work and existing history.
- Make the smallest coherent change that satisfies the authorized scope.
- Record material decisions, blockers, deferrals, and verification durably.
- Treat delegated reports as evidence, not approval; inspect actual artifacts.
- Do not push, deploy, publish, write production data, perform destructive
  operations, or rewrite history without the exact required authorization.
- Never claim checks, approvals, or completion that did not occur.
- Keep secrets, credentials, personal data, and production data out of project
  documentation and local collaboration notes.

Run `node scripts/validate-docs.mjs` after changing this documentation system.

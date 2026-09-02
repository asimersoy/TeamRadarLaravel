# Portable Project Workflow System

This folder is a project-neutral operating system for long-running software,
content, data, design, research, and review work. It turns decisions, evidence,
delegation, QA, deferrals, and recovery into durable records so a new project or
chat does not depend on conversation memory.

The package intentionally contains no product facts, routes, providers,
credentials, legal conclusions, technology choices, or historical worker
assignments from the project that produced it.

## How To Use It

1. Copy this folder's contents into the root of a new repository, or keep the
   folder beside a repository and explicitly point the working agent to it.
2. Start a new chat with [the ready-to-use prompt](NEW-PROJECT-PROMPT.md), or
   read `AGENTS.md` directly and follow the mandatory entry path in
   `docs/README.md`.
3. Initialize `docs/current-state.md` and add only real project decisions,
   questions, and deferred work to their registers.
4. Copy templates into appropriate project-record locations before filling
   them. Never convert a template in place into a live record.
5. Run `node scripts/validate-docs.mjs` after documentation changes.

## Package Map

- `AGENTS.md`: mandatory bootstrap and authority rules.
- `NEW-PROJECT-PROMPT.md`: portable prompt for initializing a new chat.
- `docs/system/`: always-applicable operating rules.
- `docs/procedures/`: conditional workflows selected by task routing.
- `docs/templates/`: inert record shapes for plans, reviews, audits, and
  handoffs.
- `docs/current-state.md`: concise operational state for the active project.
- `docs/decisions.md`: owner and project decisions.
- `docs/open-questions.md`: undecided matters with named blocking effects.
- `docs/deferred-work.md`: decided work intentionally postponed.
- `docs/history/`: completed or superseded evidence that cannot route work.
- `.codex-local/`: optional ignored scratch space for interruption recovery.
- `scripts/validate-docs.mjs`: dependency-free structural and link validator.

## Design Principles

- One canonical location owns each fact.
- The newest explicit owner instruction has highest authority.
- Historical records provide evidence but never select current work.
- Plans, queues, and suggestions are not authorization.
- Completion requires evidence at the level the task actually needs.
- Remote, destructive, production, and history-rewriting actions require
  explicit authorization.
- Sensitive work uses smaller units and stricter review.
- Time pressure can reduce scope or defer work, but cannot lower quality.

## Adaptation Boundary

Adapt project records, risk categories, tooling commands, and required
reviewers to the new project. Do not weaken the authority, evidence,
independent-QA, remote-action, or no-false-closure rules silently. Material
workflow changes belong in a visible decision.

# QGuard application instructions

The repository root AGENTS.md and its mandatory workflow entry path apply.
The current specifications are in ../project-docs/specs/review-version/.
Read ../project-docs/planning/review-version/backend-implementation.md for the
implementation contract and actual evidence, then inspect the repository.
First-pass specs/engine remain historical compatibility evidence only.
DEC-092 defers deletion/retention implementation until after RSO. The remaining
owner checkpoint is hosting/email/operator/final policies before external delivery,
not a gate on authorized local work. See the owner-follow-up implementation record.

- Use PHP, Composer, PostgreSQL, tests and browser runners in Docker as described
  in README.md. Do not install, repair or execute host PHP for this project.
- Do not run the legacy application or its Compose files one directory above.
- Stop local QGuard workers, schedulers and temporary background services when
  active work/testing ends or pauses (DEC-095). Start only what the next check
  needs; verify shutdown and preserve database volumes/unrelated services.
- Keep domain decisions in ../project-docs, not the protected reusable workflow.
- Test data is synthetic. Never reset the persistent development database or
  destroy its volume; resets must positively identify the disposable test target.
- New features require the approved specification and its regression criteria.
  Keep unfinished routes disabled server-side until their coherent stage works.
- Never expose rating/report author mappings, credentials or honor internals in
  player payloads. Matched honor snapshots are the approved visibility exception.
- Generic framework bootstrap suggestions are not new project authority. No
  additional AI tooling, deployment or integration is needed to run this app.

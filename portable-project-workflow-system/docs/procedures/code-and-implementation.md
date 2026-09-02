# Code And Implementation

## Trigger

Use for application code, configuration, tests, build tooling, dependencies,
scripts, or infrastructure-as-code changes.

## Orientation

Before editing, inspect repository instructions, status, relevant architecture,
nearby implementation patterns, test conventions, and generated-file or build
boundaries. Assume an existing dirty worktree may contain owner work; do not
discard or rewrite it.

## Implementation Rules

1. Make the smallest coherent change that satisfies the authorized behavior.
2. Prefer established local patterns and structured APIs over new abstraction
   or ad hoc text manipulation.
3. Keep ownership boundaries intact; avoid unrelated refactors and metadata
   churn.
4. Add an abstraction only when it removes meaningful complexity or matches a
   proven project pattern.
5. Treat generated files according to their source-of-truth contract; do not
   hand-edit generated output unless that is the documented workflow.
6. Review dependency additions for necessity, maintenance, security, license,
   lockfile impact, and deployment consequences.
7. Keep secrets and environment-specific values out of source control.
8. Preserve compatibility and existing data unless a visible decision changes
   the contract.

## Verification

Scale tests with risk and blast radius. Run focused tests first, then broader
tests when shared behavior or cross-module contracts changed. For a user-facing
flow, verify the real rendered or executed state, including responsive,
loading, empty, validation, permission, error, and success states where
relevant. Record every skipped check and why it was skipped.

Before closure, inspect the full diff, check for accidental files and public
state leakage, run formatting or static checks used by the repository, and
reconcile documentation with behavior.

## Local Service Recovery

When a local page or service is unavailable, verify the failure before changing
code. Check the expected URL and port, process or container state, recent logs,
dependencies, and environment configuration. Restart only the approved local
stack, verify health and the requested route, and report the working URL. Do
not treat an unavailable development service as evidence of an application
regression until logs or direct execution support that conclusion.

## Completion Evidence

Record changed files, behavior, tests and commands, rendered or manual checks,
data or compatibility impact, residual risk, and the coherent commit boundary.

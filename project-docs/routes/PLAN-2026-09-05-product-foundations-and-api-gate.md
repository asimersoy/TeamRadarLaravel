# Task Route: PLAN-2026-09-05 Product Foundations And API Gate

- **Objective:** record the owner's QGuard product foundations and legacy
  corrections, distinguish approved decisions from research-dependent choices,
  and frame the current game/API feasibility gate without assuming capability
- **Status:** completed 2026-09-05; research continued under a separate route
- **Owner:** project owner; primary Codex agent integrates records and performs
  later authorized research
- **Started:** 2026-09-05
- **Baseline:** clean `new-development` at
  `6f458c834fe88507b5d917b164f82e6cc2fb7a38`

## Routed Procedures

- Product identity, honor foundation, integration preferences, specification,
  and game-selection gates changed: yes ->
  `../../portable-project-workflow-system/docs/procedures/product-planning.md`
- Current game/client API facts require time-sensitive authoritative research:
  yes ->
  `../../portable-project-workflow-system/docs/procedures/research-sourcing-and-search.md`
- Honor, reviews, reports, matching, visibility, and eligibility may affect
  users: yes ->
  `../../portable-project-workflow-system/docs/procedures/decision-and-recommendation-safety.md`
- Rank, identity, client/session integration, reports, and moderation may
  collect or expose personal/sensitive data: yes ->
  `../../portable-project-workflow-system/docs/procedures/privacy-data-and-legal.md`
- Owner review and future platform/specialist review may gate decisions: yes ->
  `../../portable-project-workflow-system/docs/procedures/external-review.md`
- Owner corrections require reconciliation across legacy/current records: yes
  -> `../../portable-project-workflow-system/docs/procedures/audit-and-reconciliation.md`
- Product decisions advance while implementation waits: yes ->
  `../../portable-project-workflow-system/docs/procedures/deferral-and-owner-review.md`
- Code/configuration, delegation, public content, rendered design, migration,
  deployment, experiment, or destructive/remote action: no

## Authority And Scope

- **Controlling decisions:** `DEC-001` through `DEC-013`.
- **Included:** current QGuard naming; historical naming correction; honor as
  the central behavioral concept; rank/honor separation; feasibility-led game
  selection; preferred rank/lobby API capabilities; bounded rank-declaration
  fallback; report/resolution requirement; legacy intent/outcome extraction;
  current specification modules; research brief; open-question reconciliation.
- **Excluded:** claiming any current API capability; performing the API research
  in this documentation unit; selecting the first game; approving lobby/client
  automation; designing alternative flows; settling honor formula/effects;
  implementation; legacy code changes; filesystem/repository/public rename;
  provider contact; live-client experiments; remote or destructive action.
- **Dependencies:** satisfied for this route. Gate 0 was closed by `DEC-014`;
  current research continued under
  [RESEARCH-2026-09-05](RESEARCH-2026-09-05-game-api-feasibility.md).
- **Risks:** turning historical implementation into a requirement; confusing
  desired API capability with documented availability or permission; merging
  rank and honor; overclaiming what QGuard can prevent; or treating a research
  finding as game-selection approval.

## Review And Stop Conditions

- **Required reviewer:** project owner for Gate 0, product boundaries, initial
  game, integration/fallback, honor effects, and implementation approval.
- **Potential future reviewers:** platform/API, security, privacy/legal, and
  trust/safety reviewers after concrete flows exist.
- **Stop when:** owner wording is ambiguous; a current API claim lacks a current
  authoritative source; an integration appears undocumented, prohibited, or
  anti-cheat sensitive; or work would cross into implementation or a controlled
  operation.
- **Commit boundary:** current repository routing and QGuard-specific evidence,
  governance, planning, research, and specification records only.

## Verification

- Reconciled each owner statement to a decision, partial specification, open
  question, research need, historical correction, or explicit non-decision.
- The canonical workflow validator passed: 68 Markdown files, 15 procedures,
  and 38 inert templates.
- All relative links across 32 project Markdown files resolved, and
  `git diff --check` passed.
- Diff scope is limited to `project-docs/`; the portable workflow and legacy
  application code/configuration are unchanged.
- API research and application runtime tests were not run because this unit
  only records owner decisions and frames the next research gate.
- Gate 0 was resolved after this foundation unit by `DEC-014`. API findings,
  the first-game/integration choice, and remaining product decisions continue
  under later records. No remote, destructive,
  production, deployment, publication, or history-rewrite action occurred.

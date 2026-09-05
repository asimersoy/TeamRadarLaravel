# Task Route: PLAN-2026-09-05 Valorant Selection And Discord Voice Proposal

- **Objective:** record the owner's Valorant selection and lobby-link
  verification gate, clarify “before reliance,” and capture Discord-managed
  coordination rooms and report-reviewable voice recording as separate product
  proposals
- **Status:** internal documentation complete; owner correction remains open
- **Owner:** project owner for product decisions; primary Codex agent for
  routing and reconciliation
- **Started:** 2026-09-05
- **Completed:** 2026-09-05
- **Baseline:** clean `new-development` at
  `fdd5c070876da3be0aa5ee800aa496450f40dc0e`

## Routed Procedures

- The task selects a first game and changes the candidate user journey: yes ->
  `../../portable-project-workflow-system/docs/procedures/product-planning.md`
- Honor, reports, and recorded evidence could affect user decisions or
  sanctions: yes ->
  `../../portable-project-workflow-system/docs/procedures/decision-and-recommendation-safety.md`
- Proposed voice capture, retention, access, and disclosure implicate personal
  and potentially sensitive data: yes ->
  `../../portable-project-workflow-system/docs/procedures/privacy-data-and-legal.md`
- A concrete recording flow will require owner, provider-policy, security,
  privacy/legal, and possibly safeguarding review: yes ->
  `../../portable-project-workflow-system/docs/procedures/external-review.md`
- Current summaries and research conclusions must be reconciled with the new
  owner decision: yes ->
  `../../portable-project-workflow-system/docs/procedures/audit-and-reconciliation.md`
- The Discord proposal is queued rather than approved implementation: yes ->
  `../../portable-project-workflow-system/docs/procedures/deferral-and-owner-review.md`
- New external research, code/configuration, delegation, public content,
  rendered design, migration, deployment, live-client testing, provider
  contact, or destructive/remote action: no

## Authority And Scope

- **Controlling decisions:** `DEC-004`, `DEC-008`, `DEC-010`, `DEC-011`,
  `DEC-013`, and `DEC-015` through `DEC-018`.
- **Included:** game-selection record; precise meaning and consequence of the
  lobby-link test gate; separation of QGuard-native coordination, temporary
  Discord rooms, and voice recording; proposal/open-question updates; current
  state and planning reconciliation.
- **Excluded:** running the two-account test; selecting accounts, region, mode,
  or recording technology; researching or asserting Discord bot/recording
  capability or permission; approving voice capture; choosing consent,
  retention, access, moderation, or sanction behavior; implementation; legal
  conclusion; remote/destructive action.
- **Risks:** treating the owner-selected game as proof that the link works;
  confusing voice-room creation with recording authority; treating a possible
  feature as approved; or overlooking that later report review requires audio
  to have been captured and retained before the report.

## Acceptance And Verification

- `DEC-018` precisely records the game choice, candidate link flow, test
  population, reliance boundary, failure behavior, and unapproved remainder.
- The Discord coordination/recording idea is recorded as an owner proposal,
  with no implied technical feasibility, provider permission, legal approval,
  implementation authority, or decision to collect voice.
- Current state, product foundations, open questions, research conclusions, and
  owner decision sequence agree that Valorant is selected while the lobby-link
  behavior and rank path remain gated.
- The scoped diff changes project records only and preserves the portable
  workflow package, legacy application, and unrelated work.
- All relative links across 38 project Markdown files resolved and
  `git diff --check` passed. The portable workflow package and legacy
  application remained unchanged.
- Application runtime tests and the portable-system validator were not run
  because this unit changes project records only.
- **Commit boundary:** one additive documentation commit containing the
  reconciled decision, proposal, route, register, research-disposition, and
  current-state updates.

## Stop And Review Conditions

- Stop before any live account/client test, Discord server/bot action, voice
  collection, provider contact, implementation, or external submission without
  a separately routed and authorized plan.
- A future voice-recording decision must state the exact capture model,
  participants, ages and jurisdictions, notice/consent, recording indicator,
  purpose, report window, retention/deletion, storage, access, incident and
  appeal behavior, provider terms, qualified reviews, and acceptance evidence.
- The next ordinary product discussion may continue; only reliance on the
  unverified lobby-link behavior and implementation of the Discord proposal are
  blocked.

# Task Route: RESEARCH-2026-09-05 Game API Feasibility

- **Objective:** determine whether current official Apex Legends and Valorant
  interfaces can permissibly support reliable rank evidence and low-friction
  ordinary-party formation for QGuard
- **Status:** internal research pass complete; owner decision required
- **Owner:** primary Codex agent for research; project owner for product choice
- **Started:** 2026-09-05
- **Research completed:** 2026-09-05
- **Baseline:** clean `new-development` at
  `925095ed2c8bd0ff98051dd06e38cb60fcdb402b`

## Routed Procedures

- Current provider/API facts are time-sensitive and source-sensitive: yes ->
  `../../portable-project-workflow-system/docs/procedures/research-sourcing-and-search.md`
- Findings affect the first-game and integration decision: yes ->
  `../../portable-project-workflow-system/docs/procedures/product-planning.md`
- Rank, honor, matching, and access can affect users: yes ->
  `../../portable-project-workflow-system/docs/procedures/decision-and-recommendation-safety.md`
- Identity, rank, consent, deletion, provider terms, and applicable law are
  implicated: yes ->
  `../../portable-project-workflow-system/docs/procedures/privacy-data-and-legal.md`
- Provider approval and later qualified review may gate a concrete flow: yes ->
  `../../portable-project-workflow-system/docs/procedures/external-review.md`
- Current findings must be reconciled against legacy claims: yes ->
  `../../portable-project-workflow-system/docs/procedures/audit-and-reconciliation.md`
- Product selection waits for owner review: yes ->
  `../../portable-project-workflow-system/docs/procedures/deferral-and-owner-review.md`
- Code/configuration, delegation, public content, rendered design, migration,
  deployment, live-client experiment, provider contact, or destructive/remote
  action: no

## Authority And Scope

- **Controlling decisions:** `DEC-004`, `DEC-008`, `DEC-011`, `DEC-013`,
  `DEC-014`, and `DEC-015`.
- **Included:** public first-party API inventories; identity/rank coverage;
  ordinary party versus Custom Match capability; Riot/Discord user-mediated
  lobby-link behavior; access/approval gates; current provider policy and
  anti-cheat constraints; local legacy LiveAPI corroboration; bounded negative
  findings; side-by-side assessment.
- **Excluded:** choosing a game; accepting a fallback; declaring PC final;
  provider application/contact; credentials; live accounts/clients; reverse
  engineering; undocumented client control; collecting player data;
  implementation; architecture/stack selection; legal conclusion; remote or
  destructive action.
- **Dependencies:** current public first-party sources and the approved
  capability questions in the research brief.
- **Risks:** confusing Custom Match with ordinary party formation; describing
  last-match tier as current rank; treating an accepted use-case category as
  QGuard approval; proving nonexistence from a bounded search; or treating a
  provider feature request as authoritative provider policy.

## Method And Evidence

- Reviewed current Riot Valorant developer policy, API inventory, FAQ, API
  reference, general policy, API terms, official Riot/Discord integration
  material, and current enforcement notes.
- Reviewed current EA agreement/rules, Apex FAQ, LiveAPI release/update notes,
  and recent Apex patch/news indexes.
- Searched only first-party domains for current public Apex rank/developer/API
  material; no general player-rank or ordinary-party API was found.
- Inspected the repository's bundled LiveAPI documentation as legacy evidence
  and labelled its 2025 version/date; did not promote it to current provider
  authority.
- Used open issues in Riot's official developer-relations tracker only as
  developer-reported corroboration, never as policy or an API commitment.
- Used no account, credentials, private source, provider contact, client
  experiment, interception, or undocumented interface.

## Review And Stop Conditions

- **Required reviewer:** project owner for the acceptable rank/party fallback,
  initial game, and integration boundary.
- **Future reviews:** provider approval; privacy/legal review after the launch
  jurisdictions and data flow exist; security and trust/safety review after the
  account, honor, report, and moderation flows exist.
- **Stop when:** a product option would depend on an undocumented interface,
  a provider approval is presumed, a historical value is described as current,
  or work would cross into implementation or a controlled operation.
- **Commit boundary:** current project research, governance, planning, and
  evidence records only.

## Verification

- The findings use the research brief's outcome vocabulary and separate
  provider facts, bounded interpretations, owner decisions, assumptions,
  proposals, unknowns, and legal-review triggers.
- Every material provider claim is linked from the current
  [source ledger](../research/game-api-source-ledger.md).
- Negative findings are explicitly bounded to the public first-party material
  reviewed on 2026-09-05.
- No game selection, fallback acceptance, implementation, provider contact,
  live-client action, remote operation, destructive operation, deployment,
  publication, or history rewrite occurred.
- The canonical workflow validator passed: 68 Markdown files, 15 procedures,
  and 38 inert templates.
- All relative links across 34 project Markdown files resolved;
  `git diff --check` passed; and the portable workflow package and legacy
  application remained unchanged.
- Application runtime tests were not required because this unit changes only
  research, governance, planning, evidence, and routing records.

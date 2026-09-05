# Task Route: RESEARCH-2026-09-05 Party Entry And Policy Fit

- **Objective:** verify the owner-defined friendship-free ordinary-party entry
  hierarchy for Valorant and Apex Legends, and determine which provider-policy
  constraints actually apply to QGuard's planned actions
- **Status:** internal research pass complete; owner decision required
- **Owner:** primary Codex agent for research; project owner for product choice
- **Started:** 2026-09-05
- **Research completed:** 2026-09-05
- **Baseline:** clean `new-development` at
  `395cf5d06a2445f11463ce3934de6063b889b96e`

## Routed Procedures

- Current game, Discord, and provider-policy facts are time-sensitive: yes ->
  `../../portable-project-workflow-system/docs/procedures/research-sourcing-and-search.md`
- Findings affect the party-flow and first-game decision: yes ->
  `../../portable-project-workflow-system/docs/procedures/product-planning.md`
- Rank, honor, matching, and access can affect users: yes ->
  `../../portable-project-workflow-system/docs/procedures/decision-and-recommendation-safety.md`
- Account linking, consent, provider terms, and eventual law are implicated:
  yes ->
  `../../portable-project-workflow-system/docs/procedures/privacy-data-and-legal.md`
- Riot production access and later qualified review may gate a concrete flow:
  yes ->
  `../../portable-project-workflow-system/docs/procedures/external-review.md`
- The follow-up must reconcile and narrow the initial findings: yes ->
  `../../portable-project-workflow-system/docs/procedures/audit-and-reconciliation.md`
- Game and fallback selection remains with the owner: yes ->
  `../../portable-project-workflow-system/docs/procedures/deferral-and-owner-review.md`
- Code/configuration, delegation, public content, rendered design, migration,
  deployment, live-account/client experiment, provider contact, or
  destructive/remote action: no

## Authority And Scope

- **Controlling decisions:** `DEC-004`, `DEC-008`, `DEC-011`, `DEC-013`,
  `DEC-015`, `DEC-016`, and `DEC-017`.
- **Included:** official Valorant/Riot Discord party features; generic Discord
  Game Invites and experimental LFG Channels; official Apex ordinary-party and
  Private Match flows; ordinary-lobby links/codes; friend prerequisites; and
  action-by-action Riot/EA policy fit for external LFG, opt-in rank display,
  user-mediated joining, and unofficial client automation.
- **Excluded:** selecting a game; accepting the Valorant flow; assuming a
  lobby-link recipient can join without a live verification; provider
  application/contact; credentials; live accounts or clients; reverse
  engineering; undocumented client control; collecting player data;
  implementation; legal advice or conclusion; remote/destructive action.
- **Dependencies:** the initial game API findings and the owner's clarified
  ordinary-party preference hierarchy.
- **Risks:** mistaking Discord's generic feature for Apex support; treating a
  Discord friend-list invite as friendship-free; mistaking a Private Match
  code for an ordinary-party code; or applying anti-cheat warnings to a
  standalone, user-mediated LFG flow they do not govern.

## Method And Evidence

- Rechecked Riot's current Discord-linking FAQ and Valorant announcement and
  reviewed Discord's first-party announcement of the Riot integration.
- Reviewed Discord's generic Game Invites documentation and its current LFG
  Channels experiment to distinguish platform capability from game support.
- Rechecked EA's current Apex FAQ for ordinary-party and Private Match flows
  and searched current first-party EA/Apex material for an Apex-specific
  Discord join or ordinary-lobby code/link.
- Mapped the scoped QGuard actions separately against Riot's Valorant developer
  policy and Terms of Service and EA's current User Agreement.
- Rechecked Riot's Valorant prototype, production-key, opt-in, and RSO
  application requirements against the owner's conditional prototype-first
  strategy.
- Used no account, credential, private source, provider contact, live client,
  network capture, automation, interception, or undocumented interface.

## Review And Stop Conditions

- **Required reviewer:** project owner for whether a host-copied Valorant lobby
  link is an acceptable party-entry flow and whether its final recipient
  prerequisites must be verified before selecting Valorant.
- **Future reviews:** Riot application review if authorized; field-level
  privacy/legal review after the concrete flow exists; security/trust review
  after accounts, honor, reports, and moderation are specified.
- **Stop when:** a conclusion would assume an undocumented Apex integration,
  provider approval, automatic client control, non-friend link acceptance not
  stated in first-party material, or authority to build or submit an
  application.
- **Commit boundary:** current project research, governance, planning,
  evidence, and routing records only.

## Verification

- The focused findings separate verified facts, owner decisions, bounded
  inferences, open questions, proposals, and deferred work.
- Every material provider claim is represented in the current source ledger;
  negative findings remain bounded to public first-party material reviewed on
  2026-09-05.
- The policy analysis identifies the specific QGuard action a restriction
  affects and does not treat generic anti-cheat material as a blocker for
  external LFG or official user-mediated joining.
- No game selection, fallback acceptance, implementation, provider contact,
  live-client action, remote operation, destructive operation, deployment,
  publication, or history rewrite occurred.
- The canonical workflow validator passed: 68 Markdown files, 15 procedures,
  and 38 inert templates.
- All relative links across 36 project Markdown files resolved;
  `git diff --check` passed; and the portable workflow package and legacy
  application remained unchanged.
- Application runtime tests were not required because this unit changes only
  research, governance, planning, evidence, and routing records.

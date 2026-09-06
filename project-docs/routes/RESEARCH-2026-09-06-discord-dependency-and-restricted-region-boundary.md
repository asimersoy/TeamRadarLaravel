# Task Route: RESEARCH-2026-09-06 Discord Dependency And Restricted-Region Boundary

- **Objective:** distinguish the official Valorant lobby-link mechanism from
  Discord-rendered game-invite actions, determine what each actually requires,
  assess the owner's Turkey/VPN test constraint, and reframe the coordination-
  backbone decision without selecting it
- **Status:** source review and project-record reconciliation complete; owner
  coordination decision and behavioral execution remain open
- **Research owner:** primary Codex agent
- **Decision owner:** project owner
- **Started:** 2026-09-06
- **Completed:** 2026-09-06
- **Baseline:** clean `new-development` at
  `a78e81740422afde0d9abe1c652289c82720bf3d`

## Routed Procedures

- Product journey, dependency, geography, and coordination-boundary
  clarification: yes ->
  `../../portable-project-workflow-system/docs/procedures/product-planning.md`
- Current Riot, Discord, VPN, and regional-availability claims: yes ->
  `../../portable-project-workflow-system/docs/procedures/research-sourcing-and-search.md`
- Party-entry and coordination recommendations affect product eligibility and
  user friction: yes ->
  `../../portable-project-workflow-system/docs/procedures/decision-and-recommendation-safety.md`
- Discord/Riot identities, OAuth, lobby links, regional access, and evidence
  handling have privacy or legal implications: yes ->
  `../../portable-project-workflow-system/docs/procedures/privacy-data-and-legal.md`
- The owner must select the critical coordination boundary and later concrete
  jurisdiction/provider behavior may need qualified review: yes ->
  `../../portable-project-workflow-system/docs/procedures/external-review.md`
- Current decisions, findings, test packets, and questions require
  reconciliation: yes ->
  `../../portable-project-workflow-system/docs/procedures/audit-and-reconciliation.md`
- The future client/network checks compare two mechanisms and network paths:
  yes ->
  `../../portable-project-workflow-system/docs/procedures/experiments.md`
- Approved tests remain postponed until a suitable test environment exists:
  yes ->
  `../../portable-project-workflow-system/docs/procedures/deferral-and-owner-review.md`
- The work resumed after a completed decision unit and a new owner
  clarification: yes ->
  `../../portable-project-workflow-system/docs/procedures/interruption-and-recovery.md`
- Code/configuration, delegation, public content, rendered design, migration,
  deployment, live account/client/server/bot action, destructive action, and
  remote Git action: no

## Exact Mechanism Separation

1. **Official Riot lobby link.** After Riot/Discord account linking, the
   Valorant host can copy an official lobby link. Riot and Discord say the link
   can be shared in a Discord server, DM, or elsewhere. The delivery surface is
   therefore not documented as Discord-only; a QGuard match page could carry
   the host-supplied link. The host's account-linking requirement, the minimum
   recipient-linking requirement, non-friend acceptance, and restricted-region
   availability still require current-client verification.
2. **Riot's direct Discord-friend invite.** The same integration separately
   lets a Valorant user invite formal Discord friends from the in-game social
   panel. Shared-server/channel membership is not formal Discord friendship,
   so this documented path does not solve QGuard's matched-stranger case.
3. **Discord generic Game Invite/Join.** Discord may show Play, Join, or Ask to
   Join only when the game implements that surface and the current party is
   joinable. Current reviewed material does not prove that a matched Valorant
   or CS2 non-friend in the same server channel receives a working ordinary-
   party action. `DEF-002` remains the bounded behavioral check.
4. **QGuard-to-Discord OAuth/admission.** `identify`, server invitations, or
   `guilds.join` can identify/admit a user to a QGuard Discord server. They do
   not join a Riot or Steam game party.

## Owner Inputs And Current Limits

- QGuard has a broad international product direction and is not intended only
  for Turkey. Exact launch countries, languages, age boundary, and provider-
  restricted-region behavior remain open (`DEC-022`).
- The owner reports that Discord is currently restricted in Turkey and that a
  VPN-capable Windows test machine is available. This is recorded as owner-
  supplied operational context, not as a new legal conclusion.
- Current first-party Riot documentation says the Discord-powered features are
  available only where Riot and Discord are both supported. A VPN observation
  can establish current test behavior; it cannot establish official Turkish
  support or a durable product entitlement.
- Discord says VPNs can interfere with voice and that Discord voice requires a
  VPN with UDP support. Riot says some high-volume VPN routes may be blocked and
  its Valorant network guidance treats a VPN/proxy as a possible source of
  connection trouble. A full-machine VPN can therefore confound a party-link
  test even when the link mechanism itself is sound.

## Bounded Test Direction

- Prefer a split-tunnel test when available: route Discord and any browser
  authorization through the VPN while leaving Riot Client and Valorant on the
  ordinary home-region connection.
- If only a full-tunnel VPN is available, use a nearby endpoint, keep the Riot
  account and game shard unchanged, and stop after proving party membership;
  do not enter matchmaking merely to validate the handoff.
- Test the official copied link through both a Discord text channel and a
  neutral non-Discord relay that approximates a QGuard match page. This reveals
  whether Discord is only the host's account-link prerequisite or also a
  recipient/delivery dependency.
- Record VPN mode, endpoint country, client versions, account-link state,
  feature visibility, link creation, link opening, party result, and errors.
  Do not record credentials, full IP addresses, or the reusable lobby secret.

## Recommendation, Not Decision

Use a minimal QGuard-native private match room as the required coordination and
lobby-link delivery baseline: roster, readiness, designated host, host link
submission, and a join action. Treat a QGuard Discord server and temporary
text/voice channels as an optional enhancement where available. This avoids
making Discord server access or a VPN a universal coordination requirement,
while preserving Discord voice and a possible game-specific Join optimization.

The recommendation does not establish that Valorant's copied link works in
Turkey, that recipients do not need linked Discord accounts, or that QGuard
must build full free-form chat or native voice. Those are separate behavioral
and owner decisions.

## Remaining Gates

- The owner must deliberately resolve the reframed `OQ-011`: native QGuard
  baseline with optional Discord, Discord-primary with native fallback, or a
  required Discord dependency with explicit regional exclusions.
- `DEF-001` must pass before reliance on the copied link; `DEF-002` separately
  tests Discord-rendered Game Invite/Join surfaces.
- Exact launch geography and any lawful restricted-region support statement
  remain open. Do not make VPN circumvention a product instruction or
  availability promise without qualified review of the concrete jurisdiction.
- Voice recording, message surveillance, implementation, provider contact,
  publication, and deployment remain outside this route.

## Verification

- All relative links across 47 project Markdown files resolved, `git diff
  --check` passed, and complete changed-path review confined the unit to
  `project-docs/`; the portable workflow package and legacy application remain
  unchanged.
- No application, live client, account, VPN, or portable-system validator is
  required for this project-record-only unit.
- **Commit boundary:** one coherent additive research/reconciliation commit
  after verification; no push.

# Task Route: RESEARCH-2026-09-06 Discord Coordination And Game Join Comparison

- **Objective:** determine whether QGuard can use Discord to create or expose a
  multi-person text/voice conversation for matched non-friends through a
  supported automated or semi-automated flow, and compare how that coordination
  layer can hand users into ordinary Valorant and Counter-Strike 2 parties
- **Status:** authoritative-source research complete; owner product disposition
  and behavioral verification remain open
- **Research owner:** primary Codex agent
- **Decision owner:** project owner
- **Started:** 2026-09-06
- **Completed:** 2026-09-06
- **Baseline:** clean `new-development` at
  `dba997847dfc30517157d2e83d320242e2e832e3`

## Routed Procedures

- The task clarifies a product-fit criterion and compares candidate user flows:
  yes ->
  `../../portable-project-workflow-system/docs/procedures/product-planning.md`
- Discord, Riot/Valorant, Valve/CS2, OAuth, channel, invitation, and party-join
  facts are current and date-sensitive: yes ->
  `../../portable-project-workflow-system/docs/procedures/research-sourcing-and-search.md`
- The coordination and party-entry result may affect game selection and user
  eligibility to enter a match space: yes ->
  `../../portable-project-workflow-system/docs/procedures/decision-and-recommendation-safety.md`
- Discord identity, membership, messages, voice, access tokens, and presence are
  personal-data surfaces: yes ->
  `../../portable-project-workflow-system/docs/procedures/privacy-data-and-legal.md`
- The resulting product choice remains owner-gated and any concrete provider or
  privacy conclusion may require external review: yes ->
  `../../portable-project-workflow-system/docs/procedures/external-review.md`
- Earlier Steam, Discord, Valorant, CS2, decision, and planning records require
  reconciliation: yes ->
  `../../portable-project-workflow-system/docs/procedures/audit-and-reconciliation.md`
- Candidate prototypes and live tests remain proposals or deferred work rather
  than self-authorizing tasks: yes ->
  `../../portable-project-workflow-system/docs/procedures/deferral-and-owner-review.md`
- Code/configuration, delegation, public content, rendered design, migration,
  deployment, live-account/bot/server action, voice capture, provider contact,
  destructive action, or remote Git action: no

## Owner Clarification And Research Questions

- **Owner clarification recorded in `DEC-020`:** the desired “group” is a
  multi-person conversation analogous to a group DM, not primarily a persistent
  Steam Community Group. A viable candidate should provide supported API,
  automation, or semi-automation for assembling matched users and should offer
  link, code, OAuth, or comparable participant entry.
- Can a Discord Group DM satisfy that requirement without users first becoming
  friends, and can QGuard create or manage it through supported APIs?
- Can a QGuard Discord server provide an equivalent private text/voice room
  through a bot, even though the UI location differs from a Group DM?
- Can either Discord model deliver matched non-friends into the same ordinary
  Valorant party?
- Can either Discord model do the same for an ordinary CS2 party?
- Which actions are genuinely automatable by QGuard, which require a human, and
  which are unavailable or unverified?

## Boundaries And Stop Conditions

- Prefer current first-party Discord, Riot/Valorant, Valve/CS2, and Steam
  product, support, developer, and policy sources.
- Treat “shared Discord room” and “shared game party” as separate pass/fail
  capabilities.
- Do not infer game-specific Discord Join support from generic Discord Game
  Invites or basic game-activity detection.
- Do not treat a legacy, capped, or deprecated-origin endpoint as a dependable
  production foundation without recording that limitation.
- Stop before creating an application, server, Group DM, channel, invitation,
  OAuth grant, Riot/Steam link, account relationship, or game party; before
  collecting text/voice; and before changing the selected first game.

## Outcome

- A bot in an existing human-owned QGuard Discord server can use current
  documented APIs to create private text and voice channels, set member/role
  permission overwrites, create expiring or use-limited invitations, add an
  OAuth-authorized user with `guilds.join`, and delete the temporary channels.
  This is the strongest supported coordination candidate and does not require
  participants to be Discord friends.
- Discord's exact Group DM UI is only weakly suitable. Human-created Group DMs
  normally start from the creator's friend list, although a member can create a
  48-hour invitation link for a Group DM of at most ten users. Discord also
  documents application-created Group DMs using every user's `gdm.join` access
  token, but says the endpoint was intended for the now-deprecated GameBridge
  SDK and limits it to ten active Group DMs. Bots cannot join Group DMs.
- Valorant has the only current game-specific Discord handoff established by
  first-party evidence. A human host can copy the official ordinary-lobby link
  into the QGuard Discord room and matched users can click it. QGuard can
  automate the room and presentation of a host-supplied link, but not generate
  the Riot link or control the Valorant party. Exact non-friend acceptance still
  requires `DEF-001`.
- Discord's generic Game Invites work only for games that implement them. No
  current first-party Discord, Valve, Steam, or CS2 source reviewed establishes
  ordinary CS2 party joining through Discord. QGuard cannot add Rich Presence
  party joining to Valve's game on Valve's behalf.
- Discord can therefore solve CS2 text/voice coordination, but it does not
  currently solve QGuard's friendship-free CS2 party entry. The historical
  Steam Community Group lobby bridge remains a distinct persistent-group
  possibility and does not satisfy the clarified temporary-chat requirement.
- Discord's experimental LFG Channels currently document ARC Raiders only and
  cannot be treated as a Valorant or CS2 dependency.
- Detailed findings are in the
  [Discord coordination and game-join comparison](../research/discord-coordination-and-game-join-comparison.md)
  and [source ledger](../research/game-api-source-ledger.md).

## Remaining Gates

- The owner must decide whether the Discord-server model is the preferred,
  optional, or fallback coordination surface; this research does not approve a
  bot or server dependency.
- `DEC-018` still selects Valorant. `DEF-001` must pass before a specification
  relies on non-friend ordinary-party entry through the Riot lobby link.
- A current two-account CS2/Discord Game Invite check could test the bounded
  negative, but no undocumented interface may be substituted and a pass would
  still require stability/provider review before reliance.
- Application-managed Group DM use requires a focused proof-of-concept and
  likely provider clarification before being considered dependable; the report
  recommends against selecting it as the primary scalable route.
- Voice recording, message surveillance, transcripts, and report evidence are
  outside this comparison and remain separately gated.

## Verification

- All relative links across 44 project Markdown files resolved.
- `git diff --check` passed.
- Complete changed-path review confirmed project-record-only scope; the
  portable workflow package and legacy application remained unchanged.
- No application test or portable-system validator is required for this
  project-record-only unit.
- **Commit boundary:** one coherent additive research/documentation commit
  after verification; no push.

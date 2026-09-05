# Task Route: RESEARCH-2026-09-06 Steam Non-Friend Communication And Group

- **Objective:** determine whether QGuard-matched Steam users who are not
  friends can enter the same Steam text chat, voice chat, or Community Group,
  and whether any such relationship also supplies a current supported route
  into the same ordinary CS2 matchmaking party
- **Status:** authoritative-source research complete; live behavior and owner
  product disposition remain open
- **Research owner:** primary Codex agent
- **Decision owner:** project owner
- **Started:** 2026-09-06
- **Completed:** 2026-09-06
- **Baseline:** clean `new-development` at
  `0fbed1dbc809dff71316afce5d3ebbaf146fcec2`

## Routed Procedures

- The task records an owner product-fit decision and may affect the first-game
  and party-entry direction: yes ->
  `../../portable-project-workflow-system/docs/procedures/product-planning.md`
- Steam chat, group, voice, CS2, API, and provider-policy facts are date-
  sensitive: yes ->
  `../../portable-project-workflow-system/docs/procedures/research-sourcing-and-search.md`
- Party discovery and access may affect who can communicate or play together:
  yes ->
  `../../portable-project-workflow-system/docs/procedures/decision-and-recommendation-safety.md`
- Steam identities, membership, presence, text, and voice are personal-data
  surfaces: yes ->
  `../../portable-project-workflow-system/docs/procedures/privacy-data-and-legal.md`
- The product direction and any later Steam/provider interpretation require
  owner or external review: yes ->
  `../../portable-project-workflow-system/docs/procedures/external-review.md`
- Earlier CS2 findings and current decision records require reconciliation:
  yes ->
  `../../portable-project-workflow-system/docs/procedures/audit-and-reconciliation.md`
- Live tests and owner review remain gated while research completes: yes ->
  `../../portable-project-workflow-system/docs/procedures/deferral-and-owner-review.md`
- Code/configuration, delegation, public content, rendered design, migration,
  deployment, provider contact, live-account action, destructive action, or
  remote Git action: no

## Owner Decision And Research Questions

- **Owner decision recorded:** Looking to Play does not work for QGuard's
  intended flow and is no longer a CS2 party-entry candidate. This is a product-
  fit decision, not a factual claim that Valve removed the feature.
- Can non-friends enter the same Steam group chat through a user-visible link?
- Once present, can they use both text and a group voice channel?
- Can non-friends join the same Steam Community Group, and what membership
  modes and operational limits apply?
- Are a saved Steam group chat and a Steam Community Group the same object for
  CS2 party discovery?
- Does either route let non-friends enter the same current ordinary CS2 party?
- Can QGuard create, invite, remove, message, monitor, record, or clean up these
  spaces through a supported public interface?

## Boundaries And Stop Conditions

- Prefer current first-party Steam/Valve support, product, developer, and terms
  material. Treat the old official CS:GO Steam Group Lobby description as
  historical evidence, not current CS2 behavioral proof.
- Communication success and CS2 party-entry success are separate outcomes.
- A user clicking a QGuard-delivered official Steam invite/group link may count;
  undocumented chat protocols, user-account bots, client automation, interface
  control, reverse engineering, or manufactured lobby URIs do not.
- Stop before creating a Steam chat/group, using an account, accepting an
  invitation, collecting messages or voice, contacting Valve, or changing the
  selected first game.

## Outcome

- Steam officially documents shareable group-chat invitation links, persistent
  text and voice channels, web/client access, and group members freely joining
  voice channels. The link documentation does not state a friendship
  prerequisite, making non-friend communication `supported-with-conditions`
  pending a two-account check.
- Steam Community Groups can be public and self-joinable or restricted with a
  membership request. Direct group invitations are spam-limited to friends.
  These groups are persistent and operationally unsuitable as disposable per-
  match containers.
- A saved Steam group chat and a Steam Community Group are distinct. The former
  solves coordination only. The old CS:GO Steam Group Lobby flow used Community
  Group membership, not arbitrary chat-group membership.
- Current official material reviewed does not confirm that CS2 still exposes
  the Steam Group Lobby controls. That possible non-friend ordinary-party route
  remains `unverified` and requires a current two-account client test.
- Steam's party-beacon API can advertise a game's session in a chat-room group
  only when the game implements the feature. It does not give QGuard authority
  to publish a CS2 join beacon or control AppID 730.
- No supported public QGuard interface was found for creating Steam chat groups,
  generating their invite links, managing voice channels, or automating a Steam
  user. Manual user actions are the only current proposal.
- Detailed findings are in the
  [Steam communication and group report](../research/steam-nonfriend-communication-and-group-feasibility.md)
  and [source ledger](../research/game-api-source-ledger.md).

## Remaining Gates

- A two-account non-friend test must verify the group-chat invitation, text, and
  voice behavior before a specification relies on it.
- A separate current-client test using a deliberately scoped Steam Community
  Group must establish whether CS2 group-lobby discovery still exists and works
  for an ordinary Premier or Competitive party.
- Creating a persistent external group or using accounts changes external state
  and requires a separately approved test packet and exact authorization.
- Communication success alone does not justify selecting CS2. `DEC-018` keeps
  Valorant selected until the owner explicitly supersedes it.

## Verification

- All relative links across 42 project Markdown files resolved.
- `git diff --check` passed, and changed-path review confirmed that only
  TeamRadar-specific project records changed. The portable workflow package
  and legacy application remained unchanged.
- No application test or portable-system validator is required for this
  project-record-only unit.
- **Commit boundary:** one coherent additive project-research/documentation
  commit after verification; no push.

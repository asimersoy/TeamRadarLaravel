# QGuard Discord Coordination And Game-Join Comparison

- **Record type:** focused current research findings and comparison report
- **Status:** authoritative-source research complete; designated-human-host
  direction accepted; coordination-backbone decision and behavioral execution
  remain open
- **Research owner:** primary Codex agent
- **Decision owner:** project owner
- **Authority:** `DEC-011`, `DEC-015` through `DEC-021`, and the owner's
  2026-09-06 request for a Discord comparison across Valorant and CS2
- **Research date:** 2026-09-06
- **Date sensitivity:** high; recheck before testing, provider review, or
  specification
- **Implementation authority:** none

## Executive Finding

**Discord can provide the automated or semi-automated multi-person text/voice
space QGuard needs. Valorant can then provide a user-mediated ordinary-party
link; CS2 currently cannot be shown to provide an equivalent Discord handoff.**

The strongest communication design is one persistent, human-owned QGuard
Discord server with bot-created private text and voice channels for each match.
Discord's current API expressly supports channel creation and deletion,
member/role permission overwrites, expiring and use-limited server invitations,
and adding an OAuth-authorized user to a server. Participants do not need to be
Discord friends. This room resembles the desired multi-person chat in function,
but it appears inside a server rather than in the Direct Messages list.

Discord Group DMs are visually closer to the owner's description but are a
weaker product foundation. The normal current UI creates them from the user's
friend list. An existing member can create a link that can be shared broadly,
expires after 48 hours, and stops working at the ten-member limit. Discord also
documents an application-created Group DM endpoint using access tokens from
users who grant `gdm.join`, with no friendship prerequisite stated. However,
the endpoint was intended for the now-deprecated GameBridge SDK, is limited to
ten active Group DMs, and cannot contain a bot user. It is technically
`experimental/weak` for QGuard, not a dependable scalable choice.

For Valorant, Riot and Discord officially document a PC lobby link that the host
can copy into a Discord server, DM, or elsewhere. The host still creates the
ordinary party and copies the link; QGuard can automate the coordination room
and present or pin the host-supplied link. No reviewed public Riot interface
lets QGuard create the party or manufacture the Riot link. That is an interface
and evidence boundary, not a claim that Riot prohibits QGuard from relaying a
link deliberately supplied by the host. The exact no-Riot-friend/no-Discord-
friend recipient case and minimum recipient account-linking requirement remain
live test gates.

For CS2, Discord coordination is equally feasible but game-party joining is not.
Discord's general Game Invite surface works only when the game implements it.
No current first-party Discord, Valve, Steam, or CS2 material reviewed identifies
CS2 as implementing Discord Game Invites for ordinary Premier or Competitive
parties. Detecting CS2 as a running game or showing activity is not proof of a
Join action. QGuard cannot implement Discord Rich Presence inside Valve's game.

## Outcome Vocabulary

- **`supported`:** current first-party documentation directly describes the
  capability and QGuard can use the applicable public interface subject to
  normal consent, permissions, review, and testing.
- **`supported-with-conditions`:** the mechanism is documented but a material
  recipient, region, lifecycle, or behavioral edge still needs verification.
- **`experimental/weak`:** a documented mechanism exists, but its legacy
  origin, explicit cap, missing bot model, or unclear production fit makes it an
  unsafe primary dependency without provider clarification and a proof.
- **`not established`:** the bounded first-party search did not establish the
  capability. This does not assert that no private or future feature can exist.

## Cross-Option Matrix

| Capability | Discord server with private channels | Discord Group DM | Steam group chat | Steam Community Group |
|---|---|---|---|---|
| Multi-person text | `supported` | `supported` | `supported-with-conditions` for the exact non-friend link case | `supported`, but as a persistent community |
| Multi-person voice | `supported` through a voice channel | `supported`; members manually start/join a call | `supported-with-conditions` | Group chat exists, but it is not a disposable room |
| Users must be friends | No | Normal human creation starts from friends; invite/API paths may avoid that | No friend requirement stated for shareable link; untested | Public self-join/restricted request avoid friendship |
| QGuard creates the conversation | `supported` through a bot with server permissions | `experimental/weak` through OAuth `gdm.join`; no bot participant | No supported public QGuard API found | No supported public QGuard creation API found |
| Link/code/OAuth entry | Server invite with expiry/use limits, targeted-user support, or OAuth `guilds.join` | Human-created 48-hour Group DM invite, or all-user `gdm.join` OAuth | Human-created Steam group-chat link | Public join or membership request, not a per-match room link |
| Access isolation | Member/role permission overwrites | Membership list, ten-user maximum | Group membership/permissions; exact lifecycle unverified | Persistent membership; unrelated-member exposure risk |
| Automated cleanup | Bot can remove permissions/roles and delete channels | Participant removal is documented; active-room cap and app lifecycle are unclear | No supported public QGuard cleanup API found | Unsuitable: groups cannot be manually deleted |
| Recommended QGuard fit | **Best supported coordination candidate** | Exact UI match, but **not recommended as primary** | Manual fallback only under the clarified criterion | Not the requested communication object |

## Discord Server Route

### Verified Capabilities

Discord documents that an application bot in a server can:

- create text and voice channels when it has `MANAGE_CHANNELS`;
- set channel permission overwrites for named users or roles;
- create a server invitation with an expiry of up to seven days, a maximum-use
  count, temporary membership, and a unique-code option;
- restrict a current invite to listed user IDs and assign specified roles on
  acceptance through the current invite fields;
- add a consenting user directly to the server when that user has granted the
  application the `guilds.join` OAuth scope;
- add or remove roles, manage members within granted permissions, and delete the
  temporary channels; and
- send messages and respond to application interactions within its permissions.

Discord deprecated application-created servers in 2025. The supported design
therefore starts with one server created and owned by a human QGuard operator;
the bot manages rooms inside that server rather than creating a new server for
every match.

### Candidate Semi-Automated Flow

This is a proposal, not an approved specification:

1. A user links a Discord account to QGuard through OAuth and grants only the
   scopes required by the selected admission model.
2. QGuard forms a match and creates a private text channel and private voice
   channel in the existing QGuard server.
3. Existing server members receive member-specific permission overwrites. New
   members either accept a short-lived/use-limited server invite or consent to
   `guilds.join` so QGuard can add them.
4. The bot posts the match roster and game-specific party instructions. It need
   not read ordinary message content or receive voice merely to create and
   manage the room.
5. For Valorant, QGuard designates a matched human host. That participant
   creates the party, copies the official Riot lobby link, and submits it to
   QGuard or the room. The bot can display or pin that host-supplied link;
   remaining matched users click it.
6. For CS2, the room can coordinate manual steps, but no supported direct
   Discord-to-ordinary-party handoff is currently established.
7. After the approved session/retention boundary, QGuard revokes match-specific
   access and deletes the temporary channels. Whether server membership also
   ends is a separate product and privacy choice.

The flow is “semi-automated” for Valorant because QGuard automates user assembly
and the communication room while the host performs the legitimate in-game link
creation and recipients choose to join. It is only a communication flow for
CS2.

### Conditions And Risks

- Users need Discord accounts and either server-invite acceptance or explicit
  OAuth consent. Membership screening can leave OAuth-added users pending until
  they complete it.
- QGuard would handle Discord identifiers, membership and permission state, and
  OAuth tokens. The exact fields, purposes, storage, refresh, revocation,
  retention, access controls, and incident handling require a later approved
  data-flow specification.
- Room creation does not authorize message reading, presence tracking, voice
  reception, recording, transcription, or moderation decisions. Those require
  separately necessary permissions and product/privacy gates.
- Discord strengthened review requirements for some member, presence, and
  message-content access in 2026. A minimal room bot can avoid depending on
  broad message-content or presence access.
- Channel deletion is destructive external state and needs an explicit,
  testable lifecycle and operational authorization in implementation. It does
  not prove Discord removes every provider-held record on QGuard's schedule.

## Discord Group DM Route

### Human-Created Group DM

Discord's current support page says normal Group DM creation starts from the
creator's Friends List and supports at most ten members. Once a Group DM exists,
any member can start a voice call and members can join or leave freely.

A separate current support page says a desktop participant can create a Group
DM invitation link, share it broadly, and let recipients join from any Discord
client. The link expires after 48 hours and stops working when the group reaches
ten members. It does not expressly state a friendship prerequisite for the link
recipient, so the exact non-friend case is `supported-with-conditions`, not yet
behavioral proof.

This route still needs a human to seed and operate the conversation and does not
give QGuard a strong supported lifecycle API. It is not the automation level the
owner requested.

### Application-Created Group DM

Discord's current User Resource documents `Create Group DM`. The caller provides
access tokens for users who granted the application `gdm.join`; the endpoint
returns a multi-user DM channel and does not state that the users must be
friends. Recipient-add and recipient-remove endpoints also accept the user's
`gdm.join` token.

Material constraints prevent treating it as the preferred solution:

- Discord says the creation endpoint was intended for the now-deprecated
  GameBridge SDK.
- It is limited to ten active Group DMs; the documentation does not explain a
  scalable production entitlement that QGuard can assume.
- Bots cannot join Group DMs, so QGuard would not have the ordinary bot-in-room
  model available in a server.
- Every participant must complete OAuth authorization for `gdm.join`, and the
  access-token lifecycle becomes a security/privacy responsibility.
- Voice calls exist for the human participants, but no reviewed source gives
  QGuard a reason to assume the application can initiate, observe, or manage the
  call as a bot.

This is a legitimate proof-of-concept candidate if the owner strongly prefers
the Direct Messages UI, but it needs Discord clarification and a small-scale
behavioral test before any product commitment. The server-channel design is
more clearly supported and scalable.

## Game Comparison

| Question | Valorant | Counter-Strike 2 |
|---|---|---|
| Can QGuard assemble matched non-friends in Discord text/voice? | Yes, through the game-independent Discord server route | Yes, through the same game-independent Discord server route |
| Does the game have a current first-party Discord party handoff? | Yes: the PC host can copy an official lobby link into a server, DM, or elsewhere | `not established`: no current first-party source reviewed identifies ordinary CS2 party support for Discord Game Invites |
| Can QGuard generate/control the game party through Discord's API? | No; Riot/game integration owns the link and party | No; only Valve could implement the game-side Discord join secret/party behavior |
| Required user action | Host creates the ordinary party and copies its link; recipients click | Users still need a separate CS2 party-entry mechanism after meeting in Discord |
| Friendship-free ordinary-party result | `supported-with-conditions`, pending the exact non-friend link test | `not established`; Discord communication alone does not remove the Steam/CS2 friend step |
| Current QGuard fit | **Best current end-to-end candidate** | **Coordination feasible, party handoff missing** |

### Valorant

Riot and Discord launched account-linked Valorant features on PC in supported
regions in 2026. The integrated Riot friends list itself includes only users
with a Riot ID, formal Discord friendship, and linked Riot/Discord accounts.
That friend-list discovery is not QGuard's intended path.

The separate lobby-link feature is the promising path: first-party material
says a linked user can copy a lobby link and put it in a Discord server, DM, or
elsewhere. This establishes distribution beyond the integrated formal-friend
list, but the source does not explicitly enumerate the precise case where the
recipient is neither a Riot nor Discord friend. Riot's troubleshooting also
says a recipient who cannot see the join option may need updated clients and
may need to link Riot and Discord; it does not state the minimum recipient-
linking condition precisely enough for QGuard to assume it. `DEF-001` correctly
requires a two-account current-client test before reliance.

Discord automation can surround but not replace the Riot-owned action. QGuard
may create the room and display a link deliberately supplied by the host. No
reviewed public interface lets QGuard manufacture the lobby link, create the
ordinary Valorant party, or click acceptance for the user. Riot's general terms
restrict unauthorized automation that interacts with Riot Services; they do
not say that this documented human-copy/human-click flow or external Discord
room is prohibited. The recorded design therefore keeps every Riot-side action
with the user and uses only the official feature.

### Counter-Strike 2

Discord's generic Game Invite feature can place a Join action in a text channel,
DM, Group DM, or user profile only if the game implements it and the current
session is joinable. Current Discord troubleshooting explicitly tells users to
confirm that the particular game supports Game Invites.

The bounded first-party search found no Discord, Valve, Steam, or CS2 source
identifying CS2 ordinary parties as a supported Discord Game Invite target. A
running-game status, Discord overlay, Steam Community page “group chat,”
dedicated-server connection, or generic developer capability does not establish
that result. QGuard cannot add a Discord join secret or SDK integration to
AppID 730 on Valve's behalf.

A current-client test could check whether launching CS2 exposes Discord's Play
button or Join/Ask to Join for an ordinary party and whether a non-friend can
accept it. Until such a test and a stability/provider assessment pass, the
result remains `not established`. The historical Steam Community Group lobby
flow is separate: it may enable party discovery in CS2, but it requires
persistent Community Group membership and current-client verification, and it
is not the temporary multi-person chat object the owner clarified.

### Discord LFG Channels

Discord's LFG Channel feature is not a general server feature that QGuard can
select today. Discord calls it an experiment, limits it to a small number of
servers, and currently documents the official ARC Raiders server as the
supported example. It does not establish Valorant or CS2 party joining and is
not part of the recommended route.

## Recommendation

For the owner's stated requirement, use this ranking:

1. **Discord server plus temporary private text/voice channels — recommended
   coordination candidate.** It is the clearest supported automation surface,
   admits non-friends through link or OAuth, can isolate each match, and works
   independently of the game.
2. **Discord application-created Group DM — proof-of-concept only.** It matches
   the desired UI but its deprecated-SDK origin, ten-active-room cap, OAuth
   token burden, and inability to contain a bot make it unsuitable as the
   default scalable design.
3. **Steam group chat — manual fallback only.** It has a shareable link and
   text/voice, but no supported QGuard creation or lifecycle API was found.
4. **Steam Community Group — not the requested room.** It is persistent and may
   have a historical CS2 party-discovery role, but does not satisfy the clarified
   temporary-chat and automation criterion.

Across games, Valorant remains the only current candidate that combines the
recommended Discord room with an evidenced friendship-free ordinary-party
handoff. CS2 can use the same Discord room for communication but currently
lacks the game-party link. Therefore:

- if QGuard requires both semi-automated communication and friendship-free
  ordinary-party entry, **Valorant is `supported-with-conditions` and CS2 is not
  currently qualified**;
- if QGuard requires only communication and accepts friend-add/manual party
  formation afterward, both games can use Discord, but that relaxes the owner's
  approved party-entry preference and must return for a decision; and
- if a future live test or first-party release establishes CS2 Discord Game
  Invites, rerun this comparison rather than assuming the current negative is
  permanent.

This recommendation reinforces but does not supersede `DEC-018`. `DEC-021`
accepts the designated-human-host handoff if validation passes and approves
future generic Discord Game Invite checks for both games. The owner has not yet
approved Discord as the coordination backbone or changed the current game
decision.

## Separated Record

### Owner Decisions

- Valorant remains the selected initial game under `DEC-018`, subject to its
  non-friend lobby-link test.
- Looking to Play remains rejected under `DEC-019`.
- `DEC-020` clarifies that the evaluated coordination “group” means a multi-
  person chat comparable to a Group DM, with supported automated or semi-
  automated assembly and a participant link/code/OAuth path. It does not select
  Discord or authorize implementation.
- `DEC-021` accepts the designated-human-host Valorant party/link action as a
  conditional flow, approves future party-entry behavioral tests, and states
  that a Group DM is unnecessary if the server/private-channel model works. It
  preserves final backbone selection as a separate critical owner gate.

### Verified Facts

The Discord server/channel, invitation, OAuth, Group DM, voice-call, generic
Game Invite, Valorant integration, and LFG Channel facts are indexed in the
[game API source ledger](game-api-source-ledger.md).

### Bounded Inferences

- A private Discord server channel pair can function as the requested match
  conversation even though it appears in a server rather than the DM list.
- The Group DM invitation link likely admits a non-friend because Discord says
  it can be shared broadly and states only capacity and blocking constraints;
  an exact non-friend test is still required.
- A host-supplied Valorant lobby link is compatible with a bot-created room,
  but QGuard's exact submission, validation, visibility, expiry, and recovery
  behavior require a later specification.

### Agent Proposals

- Present the Discord-server model as the next owner coordination choice.
- Keep Group DM OAuth creation as an optional technical spike only if the owner
  values DM-list placement enough to accept its platform risks.
- The owner now approves challenging the bounded CS2 finding through the
  `DEF-002` current-client test. Run it only through the behavioral validation
  packet, and do not treat a successful undocumented observation as permanent
  provider support.

### Open Questions

- Is Discord-server membership acceptable, or is Direct Messages placement a
  hard requirement?
- Should admission use a short-lived server invite, `guilds.join` OAuth, or a
  combination for existing/new members?
- Does QGuard remove users from the server after each match or retain membership
  while removing only room access?
- What happens when a user lacks Discord, rejects OAuth, cannot join the server,
  or loses room permission?
- If the Valorant link test passes, is its host-copy step sufficiently low
  friction for the first product slice?
- Will the approved future CS2 Discord Game Invite test expose a repeatable
  ordinary-party action despite the lack of game-specific first-party evidence?

### Unperformed Work

- No Discord application, server, Group DM, channel, invitation, OAuth grant,
  role, message, or voice connection was created, read, changed, or deleted.
- No Riot, Valorant, Steam, or CS2 account/client action occurred.
- No message or voice capture, provider contact, application, code, or product-
  selection change occurred.

The approved future test cases and their evidence limits are in the
[party-entry behavioral validation packet](../planning/party-entry-behavioral-validation-packet.md).

## Recheck Triggers

- Recheck Discord channel, invitation, OAuth, Group DM, privileged-intent, and
  data-access documentation before a prototype or specification.
- Recheck Riot/Discord Valorant integration and `DEF-001` immediately before
  testing or reliance.
- Recheck Valve/CS2 and Discord sources if either provider announces Discord
  Game Invites, Rich Presence party joining, or a shareable ordinary-party
  link/code.
- Reopen the Group DM assessment if Discord replaces, removes, expands, or
  formally approves production use of the legacy-origin endpoint.

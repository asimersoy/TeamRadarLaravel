# QGuard Steam Non-Friend Communication And Group Feasibility

- **Record type:** focused current research findings
- **Status:** research complete; `DEC-020` clarifies that manual Steam chat and
  persistent Community Groups do not meet the preferred coordination criterion
- **Research owner:** primary Codex agent
- **Decision owner:** project owner
- **Authority:** `DEC-011`, `DEC-013`, `DEC-015` through `DEC-020`, and the
  owner's 2026-09-06 request to investigate Steam communication/group paths
- **Research date:** 2026-09-06
- **Date sensitivity:** high; recheck before testing or specification
- **Implementation authority:** none

## Executive Finding

**Yes: Steam provides a credible way for non-friends to share a Steam text and
voice space. That does not by itself put them into the same CS2 party.**

### Current Disposition After Owner Clarification

`DEC-020` clarifies that QGuard's desired “group” is a multi-person conversation
that can be created or entered through a supported automated or semi-automated
path. A persistent Steam Community Group is not the intended coordination
object. The Steam group-chat link remains a documented manual capability, but
the absence of a supported QGuard creation and lifecycle API means it does not
meet the preferred automation criterion. The current comparison continues in
the [Discord coordination and game-join report](discord-coordination-and-game-join-comparison.md).

Steam's official Chat page documents persistent group chats with multiple text
and voice channels and invitation links shareable inside or outside Steam.
Recipients can follow the link using the Steam client or a browser. Steam's
current Friends & Chat support page says members of a group can freely join a
group voice channel. The invite-link description says “people” rather than
limiting recipients to friends and is designed for delivery outside Steam, but
it does not expressly state a tested non-friend account case. QGuard should
therefore classify this as `supported-with-conditions` until two non-friend
accounts verify it.

Steam Community Groups are a different mechanism. A public group allows users
to join themselves; a restricted group allows users to request membership.
Those routes do not require friendship. Direct Community Group invitations are
limited to friends to reduce spam. Community Groups have their own discussion
and chat surfaces and are persistent social structures, not disposable QGuard
rooms.

The possible CS2 bridge remains unverified. Valve's old first-party Steam Group
Lobby FAQ says any member of a selected Steam Community Group could see and join
the host's ordinary lobby without being a Steam friend. No current first-party
source reviewed on 2026-09-06 confirms that the player-facing control survived
unchanged in CS2. A saved Steam group chat also does not make its participants
members of the Community Group used by that historical CS2 feature.

The result is:

- **same Steam text/voice space:** `supported-with-conditions`;
- **same Steam Community Group without friendship:** `supported` through public
  self-join or restricted membership request;
- **same current ordinary CS2 party through group membership:** `unverified`;
- **QGuard programmatic Steam chat/group/voice management:** `not supported on
  the current documented public interfaces reviewed`.

## Mechanism Matrix

| Mechanism | Non-friend entry | What it solves | What it does not prove |
|---|---|---|---|
| Saved Steam group chat invite link | Credible; official link can be shared outside Steam, with no stated friendship condition | Shared persistent text channels and access to group voice channels | Current two-account non-friend acceptance; CS2 party membership; QGuard automation |
| Voice channel inside the joined group chat | Group members can freely join | Live Steam voice without becoming direct friends | Recording, QGuard monitoring, CS2 party entry, private per-match isolation |
| Public Steam Community Group | Users self-join | Shared group membership, discussion, and group chat | Targeted/private admission or current CS2 group-lobby behavior |
| Restricted Steam Community Group | Users request access; authorized members review requests | Controlled membership without requiring friendship | Instant entry; automated QGuard approval; current CS2 group-lobby behavior |
| Closed Steam Community Group | Invitation only; direct group invitations are limited to friends | High membership control | The required no-friend admission path |
| Historical CS2/CS:GO Steam Group Lobby | Documented Community Group members could see and join an ordinary lobby | Potential no-friend CS2 party entry | Current CS2 UI and behavior |
| Steam party beacon in a chat-room group | A game can advertise its own party when it implements `ISteamParties` | Low-friction party join for an implementing game | CS2 support or a right for QGuard to create an AppID 730 beacon |

## Important Object Boundary

Three different objects must not be merged in the product specification:

1. **Saved Steam group chat** — a Steam Chat conversation with text/voice
   channels and a shareable invitation link.
2. **Steam Community Group** — a persistent community with public, restricted,
   or closed membership, roles, discussions, and a group chatroom.
3. **CS2 matchmaking party/lobby** — the pre-match group that queues for
   Premier, Competitive, or another ordinary game mode.

Joining object 1 or 2 is not evidence that the user joined object 3. The old
Steam Group Lobby path linked objects 2 and 3 through CS:GO's player-facing UI;
only a current client test can establish whether CS2 still does so.

## Product-Fit Assessment

### Group Chat Link

The simplest proposed QGuard coordination flow is:

1. A human host or operator creates and saves a Steam group chat using the
   official Steam interface.
2. That human creates the official invitation link and places it in the QGuard
   room.
3. Each matched user clicks the link, joins the Steam group chat, and enters the
   designated text or voice channel.

This avoids direct friendship if the non-friend test passes. It adds several
friction and lifecycle problems:

- Steam's support description starts group-chat creation with selected Steam
  friends, so a host may need an existing friend or established group to seed
  the room.
- Saved group chats are persistent. The reviewed public documentation does not
  supply QGuard with a supported API for per-match creation, invitation-link
  generation, membership cleanup, or deletion.
- Participants can be exposed to identities, presence, membership, messages,
  and other channels beyond the minimum match session unless permissions and
  lifecycle are deliberately designed.

It is therefore a plausible manual coordination layer, not yet a low-friction
automated QGuard room system.

### Community Group

A single public or restricted QGuard Community Group could admit non-friends
without direct friend requests. It may also be the prerequisite for the old
Steam Group Lobby mechanism. It has material drawbacks:

- public membership permits unrelated users to join;
- restricted membership introduces request review and delay;
- direct invitations do not solve the problem because Steam limits them to
  friends;
- an eligible account can own at most ten groups;
- group names and abbreviations cannot be changed after creation; and
- groups cannot be manually deleted and disappear only after every member has
  left.

These rules make one Community Group per QGuard match an unsuitable design.
One long-lived regional or product-wide group might be testable, but would
expose persistent membership and allow unintended members to discover group-
broadcast lobbies if the old CS2 behavior survives. That product/privacy trade-
off requires owner approval after the client test.

## CS2 Party-Entry Boundary

The historical Valve FAQ describes exactly the desired outcome: a lobby leader
selects a Steam Community Group, and any member of that group can see and join
the ordinary lobby without friendship. It also says the leader can choose the
game mode and map group.

The limitation is date, not conceptual fit. The page describes CS:GO-era menus,
including “Play With Friends,” “Change Permissions,” and a Steam Groups tab.
The bounded current-source search found no CS2 release note or current support
page confirming those controls. QGuard must not rely on the flow until the
current client visibly exposes and passes it.

Steam's current `ISteamParties` documentation also describes party beacons
shown in Steam chat-room groups. This is a game-developer feature: the running
game creates the beacon, provides its own join string, receives reservations,
and completes the join. No reviewed evidence says CS2 implements this feature,
and QGuard cannot implement it on CS2's behalf merely because QGuard users are
on Steam.

## Supported-Interface And Policy Boundary

No documented public Steam Web API method was found for QGuard to create a
saved Steam group chat, generate its invitation link, create/manage a voice
channel, add or remove chat members, or create a Steam Community Group.
Steamworks client methods for joining or messaging clan chats and advertising
party beacons are application/game-side interfaces, not authority to automate
a user's general Steam Chat or another game's lobby.

The current Steam Subscriber Agreement prohibits scripts, bots, macros, or
other non-human-controlled systems interacting with Steam and prohibits
unauthorized software from controlling Steam interfaces. Consequently, this
research proposes only user-mediated actions. An unofficial Steam user bot,
chat-protocol client, scripted group membership, simulated input, or automated
CS2 invitation is outside the supported path.

Normal users manually creating or joining a documented group/chat is not
identified as cheating in the reviewed sources. This is a scoped provider-
policy assessment, not legal advice or Valve approval.

## Voice, Evidence, And Privacy Boundary

Steam says its voice traffic is encrypted and relayed through Steam servers so
participants do not directly expose their IP addresses. The reviewed material
does not give QGuard a supported recording, transcription, monitoring, or
retrieval interface for Steam voice.

Steam voice can therefore provide live communication only. It cannot satisfy
the separate owner proposal to retain audio for report review without a new,
supported capture design and the already-recorded consent, privacy, security,
retention, moderation, provider-policy, and qualified-review gates.

## Previously Proposed Live Verification

`DEC-020` means neither test is the next active route. They are retained so the
conditions are explicit if the owner later accepts manual Steam chat or
persistent Community Group membership as a fallback.

### Test A - Non-Friend Group Chat

- Use two current Steam accounts that are not friends and do not share an
  existing chat or Community Group.
- Through the visible Steam UI, have a human create/save a group chat and create
  its official invitation link. Record whether an existing friend is required
  to seed the chat.
- Deliver the link outside Steam; verify the non-friend recipient can join in
  both the web/client path being considered.
- Verify mutual text visibility, creation and joining of a voice channel,
  leave/rejoin behavior, permissions, member visibility, invitation revocation
  controls, and cleanup behavior.

### Test B - Community Group To Current CS2 Party

- Create or select a deliberately scoped test Community Group only after
  approval for that external-state change.
- Use public self-join or restricted request/approval with two non-friend
  accounts; do not use a friend-only direct group invitation.
- In the current CS2 client, check whether the host can select that Community
  Group for an ordinary Premier or Competitive lobby and whether the other
  member can discover and join it without friendship.
- Repeat at least three times and reverse roles. Record mode, region, build,
  privacy, Prime state, discovery time, unintended visibility, failure and
  recovery states, and whether unrelated group members could join.

Communication passes only if the non-friend recipient repeatedly joins the
intended text and voice space through supported UI. Party entry passes only if
the intended Community Group member repeatedly discovers and joins the exact
ordinary CS2 party without friendship or undocumented client behavior.

No live account, group, chat, voice, client, API, credential, or provider-
contact action occurred during this research.

## Separated Record

### Owner Decision

Looking to Play does not fit QGuard's intended party flow and is rejected as a
candidate under `DEC-019`. That decision does not assert that the Valve feature
is absent.

### Verified Facts

The supported Steam Chat capabilities, Community Group membership rules,
Steamworks interfaces, old CS:GO group-lobby behavior, and current provider
terms are indexed in the [game API source ledger](game-api-source-ledger.md).

### Bounded Inferences

- An official group-chat invitation link is likely to admit non-friends because
  it is explicitly shareable outside Steam and carries no stated friendship
  condition. A direct two-account test is still required.
- A Community Group may restore friendship-free CS2 party discovery, but only
  the historical CS:GO behavior is currently evidenced.
- A permanent product-wide group is more plausible than per-match Community
  Groups, but it creates material privacy, moderation, noise, and unintended-
  join trade-offs.

### Proposals

- **Superseded by `DEC-020`:** run Test A before treating manual Steam Chat as
  the preferred communication layer.
- **Not currently routed:** run Test B before keeping CS2 as a game candidate on
  the strength of persistent Steam Community Group membership. The historical
  bridge remains evidence, but it is not the clarified communication object.
- Keep group-chat communication and CS2 party entry as separately passing or
  failing capabilities.

### Open Owner Questions

- Would the owner later reopen persistent Steam Community Group membership
  despite public visibility, admission friction, and unintended-lobby exposure?
- If the supported Discord route fails, would the owner accept manual Steam
  Chat creation/link sharing as a fallback?
- Does Steam voice merely coordinate the team, or must the approved system
  later preserve reviewable report evidence?

### Unperformed Work

- No Steam group/chat was created, joined, altered, or deleted.
- No user account, live client, undocumented protocol, automation, or personal
  data was used.
- No game-selection decision was made by this research.

## Recheck Triggers

- Recheck Steam Friends & Chat, Community Group membership rules, and the
  Subscriber Agreement before live testing or implementation.
- Recheck current CS2 UI/release material before Test B.
- Reopen the API assessment if Valve publishes a supported third-party chat-
  group management interface or expressly documents CS2 party beacons/group
  lobbies.

# Discord-Assisted Party Entry: Current State And Roadmap

- **Record type:** current deep-research findings
- **Status:** research complete; live behavioral questions remain open
- **Research owner:** primary Codex agent
- **Decision owner:** project owner
- **Authority:** `DEC-016`, `DEC-018` through `DEC-023`
- **Researched:** 2026-09-07
- **Focused recheck:** 2026-09-28, League/Valorant joining and nonfriend eligibility
- **Date sensitivity:** high; recheck before each live wave and implementation
- **Implementation authority:** none
- **Resource/test companion:**
  [coordination test resources and sequence](../planning/coordination-test-resources-and-sequence.md)

## Executive Finding

The Riot/Discord integration investigated here is not merely on the way for Valorant.
It shipped for both League of Legends and Valorant during 2026, subject to the
current requirement that both Riot and Discord be supported in the user's
region. Riot currently documents two distinct user flows:

1. invite **formal Discord friends** from the Riot social panel after linking;
2. have a human host copy a Riot lobby link and share it with a Discord server
   or elsewhere.

The first flow deliberately excludes people who merely share a Discord server.
The second is the promising QGuard path, but the first-party material does not
state precisely whether a recipient who is neither a Riot nor Discord friend
can always accept it, or whether every recipient must link Riot and Discord.
Those are the reasons for the two-account test; “test before relying on it”
means do not make this behavior a product specification or implementation
dependency until the exact non-friend case succeeds twice under recorded
conditions. It does not mean changing or “realigning” the link.

No current first-party source found in this bounded research establishes a
corresponding Discord Join/Game Invite into an ordinary CS2 matchmaking party.
Discord documents CS2 community/dedicated-server joining, but that is a
different target and does not assemble a Premier/Competitive party.

The most relevant future-facing Discord feature is its experimental LFG
Channel. It can combine a post, thread, optional voice, and—when a supported
game integration supplies it—a live join card. At present Discord names only
the official ARC Raiders server, says other games are coming soon, and provides
no request path, named Valorant/CS2 commitment, or launch date. It should be
monitored, not treated as a dependency.

## 2026-09-28 Recheck: League Joining And QGuard Nonfriends

**Request and scope:** the owner asked whether the new League joining system,
said to be coming to Valorant, could work between nonfriends. The likely match
is Riot/Discord account linking and party invitations. The owner's original
announcement was not supplied, so identification of that exact announcement
remains an assumption. This follow-up reviews public documentation only; it
does not rerun the CS2, rank, API-policy, or Discord-server-management research.

### Verified Documentary Facts

- Riot's April 14 Valorant patch 12.07 announced a regional beta and scheduled
  global release for April 29. Its June 12 announcement describes the
  integration and copyable lobby links as available features. The current FAQ
  still limits availability to regions supporting both services; a release
  announcement does not establish availability on the owner's accounts.
  [Patch 12.07](https://playvalorant.com/en-us/news/game-updates/valorant-patch-notes-12-07/),
  [June announcement](https://playvalorant.com/en-us/news/game-updates/exclusive-discord-drop/),
  [current FAQ](https://www.riotgames.com/en/riot-games-discord-account-linking)
- League's May 7 support article explicitly documents posting an invitation
  to an entire Discord server channel. It describes Join for an open party
  with room, Ask to Join for a closed party, and an expired invitation becoming
  Launch Game after the party enters a game or disbands. These are League
  instructions, not proof of identical Valorant controls or nonfriend eligibility.
  [League account-linking support](https://support.riotgames.com/en-us/league-of-legends/gameplay/league-of-legends-discord-account-linking)
- Riot's integrated Discord-friend list requires formal Discord friendship
  and linked accounts. Sharing a server is explicitly insufficient for that
  list. This is a restriction on discovery through the list, not an explicit
  restriction on recipients of a shared invitation.
  [Riot FAQ](https://www.riotgames.com/en/riot-games-discord-account-linking)

### Assessment, Not Approval Or A Live Result

| Mechanism | Relevance to QGuard users who are friends on neither service |
|---|---|
| Invite a Discord friend from the Riot social panel | Does not solve stranger discovery: formal Discord friendship is required. Avoiding Riot friendship alone is not enough. |
| Host shares an official lobby link | Promising candidate; Valorant documents the link, but neither-friend acceptance and minimum recipient setup remain unverified. |
| Host posts a Discord Game Invite, or recipient uses profile Join/Ask to Join | League's channel instructions strengthen the candidate. Check the corresponding Valorant surfaces separately; League behavior cannot establish Valorant behavior. |

**Bounded finding:** the reviewed first-party material does not explicitly
guarantee that a recipient who is neither a Riot nor Discord friend can enter
an ordinary Valorant party through either shared surface. It also does not
establish that such entry is forbidden. Generic Discord invite support is
conditional on the game's implementation; it is not a game-specific guarantee.
[Discord Game Invites](https://support.discord.com/hc/en-us/articles/115001557452-Game-Invites),
[integration scope](https://support.discord.com/hc/en-us/articles/27893392334359-How-Games-Integrate-Discord-Powered-Features)

**Existing test order retained:** use A and B without Riot/Discord friendship;
test the official copied link through a neutral relay first, with B initially
unlinked, then repeat the applicable comparison after linking if needed.
Later test Discord-channel delivery, Game Invite, and profile Join separately.
Record account linking, open/closed party state, client versions and regional/
network conditions. Count entry into the same ordinary party, not merely game
launch. Preserve the packet's repeated-success requirement before relying on
a route. These cases already exist in the
[resource plan](../planning/coordination-test-resources-and-sequence.md);
no additional League installation is required by this research.

**Unchanged decisions and deferred work:** no game/backbone selection,
implementation approval, live experiment result, or change to `OQ-011` is
recorded. Source evidence is indexed as `VAL-005`, `VAL-006`, `VAL-010`,
`VAL-013`, `VAL-015`, `DIS-002`, and `DIS-015` in the
[source ledger](game-api-source-ledger.md).

## What Is Shipped For Valorant

Riot's current account-linking page says Discord integration is available for
both League and Valorant, and lets a player invite Discord friends directly or
copy a lobby link for a server or anywhere else. It gives an in-client Valorant
path—Social panel, Add Friends, Connect Discord Account—and allows unlinking.
It also states that one Discord account cannot connect to multiple Riot IDs.
[Riot account-linking documentation](https://www.riotgames.com/en/riot-games-discord-account-linking)

The launch chronology is consistent across first-party sources. Valorant patch
12.07 described an April 2026 regional beta and scheduled global launch for
patch 12.08; later Riot and Discord pages describe the feature as available,
with region limitations rather than a future Valorant release.
[Valorant patch 12.07](https://playvalorant.com/en-gb/news/game-updates/valorant-patch-notes-12-07/),
[Discord/Riot announcement](https://discord.com/blog/making-it-easier-than-ever-to-connect-with-friends-in-league-val)

League followed the same feature family and rollout language: patch 26.8
announced the regional beta, while patch 26.13 later told players in Discord-
supported regions that they could connect accounts, invite directly, and share
lobby links. This supports the owner's observation of Riot-wide movement, but
League behavior remains corroborating context rather than proof of a Valorant
edge case.
[League patch 26.8](https://www.leagueoflegends.com/en-gb/news/game-updates/league-of-legends-patch-26-8-notes/),
[League patch 26.13](https://www.leagueoflegends.com/en-us/news/game-updates/league-of-legends-patch-26-13-notes/)

### The Three Valorant/Discord Mechanisms Must Stay Separate

| Mechanism | Documented user action | Known relationship requirement | What remains to test |
|---|---|---|---|
| Riot direct Discord-friend invite | Host sees and invites a Discord friend from Valorant | Formal Discord friendship, existing Riot IDs, and both users linked for integrated-list visibility | Shared-server nonfriend is expected not to appear; optional positive control can verify the client setup |
| Riot copied lobby link | Human host copies official link and puts it in a server or elsewhere | Host link setup is documented; exact recipient relationship/link minimum is not | Nonfriend acceptance, recipient linking, delivery-surface independence, and live Discord-runtime dependency |
| Generic Discord Game Invite/Join | Discord Play/Game Invite or profile Join/Ask to Join | The game must implement a joinable party/activity and expose the action | Whether current Valorant exposes the exact action to a shared-server nonfriend and enters the ordinary party |

Riot explicitly says its integrated friends list includes only users with an
existing Riot ID, a formal Discord friendship, and linked accounts; someone
from the same server who is not a Discord friend is intentionally excluded.
That makes `VAL-DIRECT-1` an expected-negative control rather than QGuard's
likely stranger path.
[Riot account-linking FAQ](https://www.riotgames.com/en/riot-games-discord-account-linking)

For a failed invite, Riot advises updating/relaunching Discord and Riot Client
or linking the recipient's accounts. That troubleshooting language is not
precise enough to tell us whether an unlinked nonfriend can accept the copied
link, so the recipient should start unlinked and be linked only after the first
observation. Riot also says the feature is limited to regions where both
services are supported; a Turkey/VPN result therefore describes the test
environment, not universal product availability.
[Riot account-linking FAQ](https://www.riotgames.com/en/riot-games-discord-account-linking)

Riot currently says it does not intend to add chat to this integration. A
Valorant lobby link therefore does not eliminate QGuard's separate coordination
surface question.
[Riot account-linking FAQ](https://www.riotgames.com/en/riot-games-discord-account-linking)

## What Generic Discord Join Actually Requires

Discord's user documentation exposes Play/Game Invite, Join, and Ask to Join
only for games that support the feature and for a player in a joinable state.
Its developer documentation explains the boundary: the implementing game
publishes party information and a join secret through its Discord integration.
QGuard cannot add that capability to another publisher's game merely by
running a Discord bot or registering game activity.
[Discord Game Invites](https://support.discord.com/hc/en-us/articles/115001557452-Game-Invites),
[Discord Social SDK game invites](https://docs.discord.com/developers/discord-social-sdk/development-guides/managing-game-invites)

Consequently, these are not passes:

- Discord notices that Valorant or CS2 is running;
- a game appears in Rich Presence;
- a button launches the game but does not join the host's party;
- a CS2 link connects to a community/dedicated server; or
- users reach the same Discord text/voice channel.

The live check must end with the recipient visibly inside the host's ordinary
game party. That is why copied Riot links, generic Discord Join, and Discord
coordination rooms have separate test IDs.

## CS2 Finding

The bounded review of current public first-party Discord, Valve, Steam, and
Counter-Strike sources found no game-specific documentation that CS2 currently
publishes an ordinary-party join secret to Discord or exposes a Discord Game
Invite/Join button for its Premier/Competitive lobby. Discord's CS2-specific
Game Servers page explains server-IP joining and recommends Steam favorites;
that is useful for community servers but is a `wrong-target` result for QGuard.
[Discord Game Servers](https://support.discord.com/hc/en-us/articles/35370817986839-Game-Servers)

This is bounded negative evidence, not proof that a current client can never
show an undocumented or newly released surface. `CS2-GI-1` therefore remains a
small current-client observation, but CS2 should not be represented as having
a supported Discord ordinary-party handoff unless that test and later first-
party evidence establish it.

For the first CS2 handoff observation, Premier eligibility is unnecessary.
Steam says free CS2 accounts can access every matchmaking type except Premier;
Premier specifically requires Prime and profile level 10. The test can create
an ordinary non-Premier Competitive party and stop before matchmaking, avoiding
unnecessary account cost and rank prerequisites.
[Steam CS2 Prime/free-to-play support](https://help.steampowered.com/faqs/view/4D81-BB44-4F5C-9B6B)

## New Discord Capabilities That Matter To QGuard

### Targeted Server Invites And Role Assignment — Available Now

Discord's 2026 developer changes add two useful server-invite controls:

- a target-user file can restrict who can see and accept an invite; and
- accepted users can receive specified server roles.

Target processing is asynchronous and is expressed in Discord user IDs.
Standard invite expiry/use limits and deletion remain available. This may let
QGuard admit exactly the matched Discord accounts and give them the match-room
role in one supported flow, reducing the gap between a broad server invite and
the private channels.
[Discord Channel resource](https://docs.discord.com/developers/resources/channel),
[Discord Invite resource](https://docs.discord.com/developers/resources/invite),
[Discord change log](https://docs.discord.com/developers/change-log)

This does not join Valorant or CS2, and it introduces a data prerequisite:
QGuard must know the participating Discord user IDs through an approved identity
or consent flow. It should be tested before falling back to an ordinary invite
or the more involved OAuth `guilds.join` route.

The isolation topology also matters. Discord states that server owners receive
all permissions and `ADMINISTRATOR` bypasses channel permission overwrites.
The server owner/admin cannot double as an ordinary participant or outsider in
a rigorous access test; use two ordinary participants, one ordinary outsider,
and a separate owner/admin.
[Discord permissions](https://docs.discord.com/developers/topics/permissions)

### LFG Channels — Relevant Experiment, Not A Dependency

Discord's LFG Channel experiment is the closest public match to the user's
desired future shape. An eligible server can host session posts; every post has
a thread, can connect people to voice, and can show a live game-session card
when the supported game's account/activity integration supplies it. Depending
on the game, Join either enters directly or sends an in-game request.
[Discord LFG Channels](https://support.discord.com/hc/en-us/articles/41832532728215-How-to-Use-the-LFG-Channels-to-Find-Game-Sessions-on-Discord)

However, Discord currently says:

- the feature is a limited experiment in a small number of servers;
- the official ARC Raiders server is the named available case;
- other games are “coming soon,” without naming Valorant or CS2;
- server owners cannot request or manually obtain access; and
- live session cards still depend on the supported game's account/activity
  integration.

QGuard should monitor this feature. Waiting for it would add an unbounded
external dependency with no named target-game commitment.

### Social SDK And Linked Channels — Publisher-Led, Not QGuard Control

Discord continues investing in Social SDK account linking, Rich Presence,
communication, game invites, and mobile support. Its release notes include
ongoing party-privacy/join-button fixes. Those are signs of active platform
development, but feature selection and release timing remain with each game
developer.
[Discord GDC 2026 update](https://discord.com/blog/building-on-the-social-layer-of-games-whats-new-from-gdc-2026),
[Social SDK release notes](https://discord.com/developers/docs/social-sdk/release_notes.html),
[how games integrate Discord features](https://support.discord.com/hc/en-us/articles/27893392334359-How-Games-Integrate-Discord-Powered-Features)

Discord's limited-access Linked Channels feature can connect an implementing
game's lobby and a Discord channel. It is not a public mechanism for QGuard to
attach itself to Riot's or Valve's party system, and Discord recommends it for
persistent lobby relationships rather than short-lived match-chat rooms.
[Discord Linked Channels](https://docs.discord.com/developers/discord-social-sdk/development-guides/linked-channels)

Discord also opened its web account-linking entry point to any developer in
August 2026. That could later reduce friction when linking a QGuard identity to
Discord, but it cannot link a user to Riot or Steam on QGuard's behalf and does
not supply a Valorant/CS2 party join secret.
[Discord developer change log](https://docs.discord.com/developers/change-log)

### Roadmap Claims We Can And Cannot Rely On

| Claim | Current status | Planning treatment |
|---|---|---|
| Valorant Riot/Discord integration | Shipped in 2026 where both services are supported | Test exact nonfriend behavior now |
| Riot expansion to more Riot games | Riot states a general intention; no game/date named on the current account-linking page | Monitor only; it adds no new Valorant behavior |
| Discord LFG support for more games | Discord says “coming soon,” but currently names only ARC Raiders and offers no request path | Monitor only; no Valorant/CS2 dependency |
| Any-developer web connection entry point | Shipped in August 2026 | Possible future QGuard↔Discord identity convenience, not game-party entry |
| Valorant shared-server nonfriend direct invite | No official promise found; current integrated list deliberately requires formal friendship | Keep expected-negative control and copied-link test separate |
| CS2 ordinary-party Discord Join | No official current or announced support found in the bounded first-party review | Run the small current-client observation; do not wait for it |

## Current Comparison

| Candidate | Coordination text/voice | Friendship-free party-entry evidence | QGuard automation boundary | Current disposition |
|---|---|---|---|---|
| Valorant copied Riot link + QGuard-native relay | QGuard would own minimal coordination; voice undecided | Documented share-anywhere link; exact nonfriend acceptance still untested | Human creates party/copies link; QGuard may carry the submitted text | Highest-priority live test |
| Valorant copied Riot link + Discord private room | Supported Discord text/voice and new targeted admission; exact lifecycle untested | Same Riot-link uncertainty | Bot can manage server rooms; human still creates/copies Riot link | Test after neutral link path |
| Valorant direct Discord-friend invite | No additional coordination chat from Riot | Formal Discord friendship required for integrated-list visibility | Publisher-controlled | Poor match for stranger flow; positive control only |
| Valorant generic Discord Join | Discord delivery surface exists generically | Exact current nonfriend ordinary-party result untested | Publisher must expose join state/secret | Test as optional lower-friction route |
| CS2 generic Discord Join | Discord coordination is independently possible | No current first-party ordinary-party support found | Publisher-controlled | Lower-priority current-client observation |
| Steam saved group chat | Human-created text/voice and external invite link documented | Exact nonfriend admission still untested; not party entry | No public QGuard chat-lifecycle API found in prior research | Human-mediated fallback candidate |
| Discord LFG Channel | Thread plus optional voice | Only supported named-game experiment establishes join card | Discord/publisher-controlled; unavailable by request | Monitor only |

## Information Classes

### Verified Facts

- Riot/Discord account integration is currently documented for both Valorant
  and League.
- Formal Discord friendship is required for Riot's integrated friends-list
  route; shared-server membership alone is deliberately insufficient.
- Riot lobby-link sharing and direct friend invitation are separate actions.
- Discord Game Invites require a game integration that supplies party/join
  state.
- Discord targeted-user/role-bearing server invites are documented now.
- Discord LFG Channels remain a limited, non-requestable experiment with only
  ARC Raiders named in the current support page.

### Owner Decisions

- QGuard prefers friendship-free ordinary-party entry.
- A designated matched human may create the Valorant party and copy the link if
  the behavior passes the approved tests.
- The copied-link, generic Discord Join, Discord-room, Steam-chat, and CS2
  alternatives must be tested before the backbone decision.
- Looking to Play is excluded; voice recording is not approved.

### Inferences And Proposals

- The copied Riot link remains more promising than a direct Discord-friend
  invite for QGuard's strangers-by-default model.
- Targeted server invites should be the first Discord admission method tested.
- Current Discord platform investment raises the value of monitoring releases
  but does not justify waiting for an unnamed Valorant/CS2 feature.
- CS2's first handoff check should use non-Premier Competitive to minimize
  irrelevant account prerequisites.

### Open Questions

- Can an unlinked, nonfriend recipient accept a current Valorant lobby link?
- Must Discord be running/reachable for host generation or recipient acceptance?
- Does Valorant expose generic Discord Play/Join/Ask to Join to a shared-server
  nonfriend, separately from the Riot link?
- Does current CS2 expose any ordinary-party Discord surface despite the public
  documentation gap?
- Do targeted Discord invites and roles behave reliably enough for the intended
  per-match lifecycle?

## Recommendation And Confidence

Start with the neutral-relay Valorant copied-link wave. It uses the fewest
resources, directly gates the selected initial game, and preserves clean
nonfriend/unlinked states before Discord server membership is introduced. Then
test Valorant's Discord surfaces, Discord room lifecycle, and CS2/Steam options
in that order. This is an execution-sequencing proposal under the already
approved test program, not a product selection.

Confidence is high for the documented current Riot/Discord split and Discord
server capabilities; medium-high for the bounded absence of first-party CS2
ordinary-party integration; and intentionally unresolved for every live
nonfriend behavioral result.

## Research Limits And Recheck Triggers

The review used public first-party material only. It did not log into accounts,
run clients, call authenticated APIs, create a bot/server/channel/invite, enter
voice, inspect packets/memory, contact providers, or test region/VPN behavior.
No negative finding claims that an unpublished partner interface cannot exist.

Recheck immediately before live execution and whenever Riot/Valorant, Discord,
Steam, or CS2 changes account linking, invites, activity sharing, lobby privacy,
regional availability, LFG Channels, or server-invite APIs.

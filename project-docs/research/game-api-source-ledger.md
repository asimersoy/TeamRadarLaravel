# QGuard Game API Source Ledger

- **Record type:** current research evidence ledger
- **Status:** current research pass complete; recheck before implementation
- **Research owner:** primary Codex agent
- **Decision owner:** project owner
- **Authority:** `DEC-011`, `DEC-013`, and `DEC-016` through `DEC-018`, plus
  the owner's 2026-09-05 instruction to investigate CS2 as another candidate
- **Created:** 2026-09-05
- **Implementation authority:** none

## Evidence Rules

- Prefer first-party developer documentation, policy, terms, and announcements.
- Record access date and the date/version governing each capability claim.
- Separate what is documented, permitted, approval-gated, experimentally
  verified, unavailable, and inferred.
- Do not treat a source entry as product approval or implementation authority.

## Sources

| ID | Game/provider | Source | Accessed | Supports | Limits / access conditions | Evidence class |
|---|---|---|---|---|---|---|
| VAL-001 | Valorant / Riot | [Valorant Developer API Policy](https://developer.riotgames.com/docs/valorant) | 2026-09-05 | Product registration; accepted opt-in LFG use case; RSO and production-key gate; official API inventory | Accepted use-case category is not approval of QGuard; no personal key; player-specific data requires opt-in | Current first-party policy/documentation |
| VAL-002 | Valorant / Riot | [Developer Portal FAQ](https://developer.riotgames.com/docs/faqs) | 2026-09-05 | No Valorant personal key; production application/site/prototype and RSO prerequisites | Review outcome, granted scope, and limits are unknown until application | Current first-party documentation |
| VAL-003 | Valorant / Riot | [VAL-MATCH-V1 reference](https://developer.riotgames.com/api-details/val-match-v1) | 2026-09-05 | Match-by-ID and matchlist-by-PUUID operations; participant schema includes `partyId` and `competitiveTier` | Completed-match data; no promise that tier is current; page is dynamic and no credentialed call was made | Current first-party API reference |
| VAL-004 | Valorant / Riot | [VAL-RANKED-V1 reference](https://developer.riotgames.com/api-details/val-ranked-v1) | 2026-09-05 | Competitive leaderboard; `leaderboardRank`, `rankedRating`, and wins; page size 1–200 | Leaderboard members only; identity fields may be omitted when anonymized; not a per-PUUID current-rank API | Current first-party API reference |
| VAL-005 | Valorant / Riot | [Riot Games Discord account linking FAQ](https://www.riotgames.com/en/riot-games-discord-account-linking) | 2026-09-05 | PC users can invite linked Discord friends, copy a lobby link and share it anywhere, and join parties faster | User/account/client/region conditions; no third-party lobby-link API is documented | Current first-party product documentation |
| VAL-006 | Valorant / Riot | [Exclusive Discord Drop and integration announcement](https://playvalorant.com/en-us/news/game-updates/exclusive-discord-drop/) | 2026-09-05 | Confirms PC Valorant lobby-link and Discord-friend party flow released in June 2026 | Describes user-facing flow, not a QGuard integration contract | Current first-party announcement |
| VAL-007 | Riot | [General Developer Policies](https://developer.riotgames.com/policies/general) | 2026-09-05 | Registration/audit; supported-service preference; game-integrity and official-rank boundaries | Policies change; QGuard feature details still require provider review | Current first-party policy; last updated 2025-05-29 |
| VAL-008 | Riot | [Riot API Terms](https://developer.riotgames.com/terms) | 2026-09-05 | Access can change/revoke; restrictions on circumvention, extra collection, game interference, and reverse engineering | Legal text is not interpreted here; terms page states last update 2013 and incorporates current specifications/policies | Current first-party terms |
| VAL-009 | Riot | [Riot Terms of Service](https://www.riotgames.com/en/terms-of-service) | 2026-09-05 | Prohibits unauthorized third-party programs and automation that interact with Riot Services, including interception, emulation, redirection, or client-memory collection | Directly relevant only if QGuard proposes an unauthorized client-control/data method; it does not establish a conflict for official user-mediated LFG | Current first-party terms |
| VAL-010 | Valorant / Riot and Discord | [Discord announcement of Riot account linking](https://discord.com/blog/making-it-easier-than-ever-to-connect-with-friends-in-league-val) | 2026-09-05 | Users can place a party-join link in a Discord server, DM, or elsewhere; explains account-linking data and region conditions | Does not document a third-party API or every recipient prerequisite; no live non-friend acceptance test was performed | Current first-party partner announcement; 2026-05-21 |
| VAL-C01 | Valorant / Riot issue tracker | [Feature request for Ranked Rating by RSO-linked PUUID](https://github.com/RiotGames/developer-relations/issues/922) | 2026-09-05 | Developer reports leaderboard coverage cannot provide official RR for all users | User-authored open issue; corroboration only, not Riot policy or a provider admission | Secondary developer report in first-party tracker |
| VAL-C02 | Valorant / Riot issue tracker | [Feature request for custom-lobby creation](https://github.com/RiotGames/developer-relations/issues/262) | 2026-09-05 | Developer requested a public custom-lobby API | User-authored open issue; does not prove private interfaces or present policy | Secondary developer report in first-party tracker |
| VAL-C03 | Valorant / Riot issue tracker | [Feature request for a Valorant Live Client Data API](https://github.com/RiotGames/developer-relations/issues/618) | 2026-09-05 | Developer requested a Valorant live-client API | User-authored open issue; does not prove private interfaces or present policy | Secondary developer report in first-party tracker |
| DIS-001 | Discord | [Discord Social SDK](https://discord.com/developers/docs/social-sdk/index.html) | 2026-09-05 | SDK is integrated and shipped by a game developer; games publish join secrets and manage their own lobbies | Does not grant a third-party LFG app control over Valorant or Apex parties | Current first-party developer documentation |
| DIS-002 | Discord | [Game Invites](https://support.discord.com/hc/en-us/articles/115001557452-Game-Invites) | 2026-09-05 | A supported game can expose Join/Ask to Join through text-channel invites or profiles | Generic conditional capability; does not establish that Apex implements it | Current first-party product documentation; updated 2025-08-08 |
| DIS-003 | Discord | [LFG Channels experiment](https://support.discord.com/hc/en-us/articles/41832532728215-How-to-Use-the-LFG-Channels-to-Find-Game-Sessions-on-Discord) | 2026-09-05 | Experimental server LFG posts can contain live join cards for supported games | Limited experiment; currently documents the official ARC Raiders server only; access cannot be requested | Current first-party product documentation; updated 2026-07-14 |
| CS2-001 | Counter-Strike / Valve | [Scouting Ahead: Looking to Play](https://blog.counter-strike.net/2019/05/24154/) | 2026-09-05 | A player can advertise as ready to team up; a lobby can select and invite people from that list | CS:GO-era announcement; does not describe list ranking, exact-user lookup, or current CS2 behavior | Historical first-party product announcement; 2019-05-14 |
| CS2-002 | Counter-Strike / Valve | [CS2 release notes for 2023-10-09](https://steamcommunity.com/ogg/730/announcements/detail/3747615443061321347) | 2026-09-05 | CS2 fixed several Looking to Play bugs, establishing that the feature carried into CS2 | Launch-era evidence; not a complete current behavior or stability contract | First-party CS2 release notes; 2023-10-09 |
| CS2-003 | Counter-Strike / Valve | [Nearby Lobby FAQ](https://blog.counter-strike.net/nearby-lobby-faq/) | 2026-09-05 | Nearby non-friends can join a Public Lobby; host can select game mode/map group and change permissions | CS:GO-era UI; current CS2 controls and discovery behavior require a live recheck | Historical first-party product documentation; date not stated |
| CS2-004 | Counter-Strike / Valve | [Steam Group Lobby FAQ](https://blog.counter-strike.net/steam-group-lobbies/) | 2026-09-05 | Members of the same Steam Group can view and join a group member's ordinary lobby without Steam friendship | CS:GO-era UI; current CS2 support and group/privacy consequences require a live recheck | Historical first-party product documentation; introduced 2016-11-28 |
| CS2-005 | Counter-Strike / Valve | [CS2 update for 2025-05-07](https://steamcommunity.com/ogg/730/announcements/detail/529846144626327636) | 2026-09-05 | Current CS2 still handles lobby invitations and ignores them from users marked Block All Communication | Does not state whether arbitrary non-friends can be directly targeted | First-party CS2 release notes; 2025-05-07 |
| CS2-006 | Counter-Strike / Valve | [CS2 update for 2025-07-02](https://steamcommunity.com/games/CSGO/announcements/detail/529850584204839877) | 2026-09-05 | CS2 added in-game lobby voice chat and voice during Premier pick/ban | Voice availability does not grant QGuard access, recording, or moderation capability | First-party CS2 release notes; 2025-07-02 |
| STM-001 | Steam / Valve | [Steam Matchmaking and Lobbies](https://partner.steamgames.com/doc/features/multiplayer/matchmaking) | 2026-09-05 | Steam lobby model, search, invite, link acceptance, lobby IDs, join callbacks, and joinability | Developer integration documentation for a game's AppID; not a player-facing CS2/QGuard contract | Current first-party developer documentation |
| STM-002 | Steam / Valve | [ISteamMatchmaking reference](https://partner.steamgames.com/doc/api/ISteamMatchmaking) | 2026-09-05 | A game can invite a SteamID, join a known lobby ID, and search applicable lobbies | Client API belongs to the initialized application; protected Web API methods require publisher access; no QGuard CS2 access inferred | Current first-party API reference |
| STM-003 | Steam / Valve | [User Authentication and Ownership](https://partner.steamgames.com/doc/features/auth) | 2026-09-05 | Third-party websites can use Steam OpenID to authenticate a user and obtain the user's SteamID | Identifies the account only; does not prove rank, Prime state, lobby, or provider approval | Current first-party developer documentation |
| STM-004 | Steam / Valve | [Steam Web API reference](https://partner.steamgames.com/doc/webapi/ISteamUserStats) | 2026-09-05 | Generic user-stat, achievement, and schema methods; keys and AppIDs govern access | No reviewed first-party entry states that all-player current CS Rating or per-map Skill Groups are exposed | Current first-party API reference |
| STM-005 | Steam / Valve | [Steam Web API Terms of Use](https://steamcommunity.com/dev/apiterms) | 2026-09-05 | Permits documented Web API use subject to end-user request, privacy/storage disclosure, key protection, no implied endorsement, service limits, and no unfair advantage | Legal text is not interpreted as a QGuard approval; last-updated label is 2010 | Current first-party terms page |
| STM-006 | Steam / Valve | [Steam Subscriber Agreement](https://store.steampowered.com/subscriber_agreement/english) | 2026-09-05 | Restricts unauthorized software controlling Steam/game interfaces and non-human-controlled automation interacting with Steam services | Applies directly to client-control proposals, not as a blanket objection to manual official LFG/lobby actions; not legal advice | Current first-party agreement; accessed 2026-09-05 |
| CS2-007 | Counter-Strike / Valve | [CS2 Competitive Skill Groups and Profile Rank](https://help.steampowered.com/en/faqs/view/3204-9FB1-967F-1AC6) | 2026-09-05 | Assigned per-map Competitive Skill Groups are shown in party lobbies and to players sharing the lobby; distinguishes Skill Group, CS Rating, and Profile Rank | In-client visibility is not a QGuard API and does not establish all-player Premier-rating access | Current first-party support documentation |
| CS2-008 | Counter-Strike / Valve | [CS2 Prime Status and Free to Play](https://help.steampowered.com/en/faqs/view/4D81-BB44-4F5C-9B6B) | 2026-09-05 | Prime is required for CS Rating and Competitive Skill Groups; Premier requires Prime and Profile Level 10 | Product eligibility facts, not a data-access interface | Current first-party support documentation |
| CS2-009 | Counter-Strike / Valve | [Release Notes for 2019-05-14](https://blog.counter-strike.net/fi/2019/05/24198/) | 2026-09-05 | Players can advertise for party invitations, other parties can invite them from Looking to Play, and recipients can accept from the main menu | CS:GO-era release notes; current CS2 UI and exact-user discovery require a live test | Historical first-party release notes; 2019-05-14 |
| DIS-CS2-001 | Discord | [Game Servers](https://support.discord.com/hc/en-us/articles/35370817986839-Game-Servers) | 2026-09-05 | Discord documents sharing/joining a CS2 dedicated/community game server and recommends Steam favorites | Server connection is not an ordinary Premier/Competitive pre-match party | Current first-party product documentation; 2026 |
| APEX-001 | Apex Legends / EA | [Revelry Patch Notes: LiveAPI 2.0](https://www.ea.com/technology/news/revelry-patch-notes) | 2026-09-05 | Official PC LiveAPI; WebSockets/Protobuf; ten lobby requests specifically for Custom Match | Detailed schema lives in game installation; announcement does not document ordinary-party control | First-party release notes; 2023 |
| APEX-002 | Apex Legends / EA | [Arsenal Patch Notes: LiveAPI improvements](https://www.ea.com/en-gb/playtesting/news/arsenal-patch-notes) | 2026-09-05 | WSS, PSK request validation, broadcast delay, and documentation additions | Historical update; detailed current schema still in game installation | First-party release notes; 2023 |
| APEX-003 | Apex Legends / EA | [Breakout Patch Notes: LiveAPI transport change](https://www.ea.com/technology/news/breakout-patch-notes) | 2026-09-05 | File output deprecated/retired in favor of WebSockets; event/schema docs in installation | Historical update; no ordinary-party or rank API claim | First-party release notes; 2024 |
| APEX-004 | Apex Legends / EA | [Apex Legends FAQ](https://www.ea.com/games/apex-legends/about/frequently-asked-questions) | 2026-09-05 | Manual friend/invite/accept party flow; Private Match join code; 30-player minimum for Private Battle Royale | User-facing flow, not API documentation; page contains mixed-age material | Current first-party support/product documentation |
| APEX-005 | EA | [EA User Agreement](https://www.ea.com/legal/user-agreement?isLocalized=true) | 2026-09-05 | Restrictions on unauthorized access/extraction/reverse engineering, interface modification, interception/mining, and anti-cheat-sensitive programs | Legal text is not interpreted here; expressly authorized interfaces remain usable within their terms | Current first-party terms; last updated 2026-05-14 |
| APEX-006 | Apex Legends / EA | [How to play by the rules](https://help.ea.com/en/articles/apex-legends/play-by-the-rules/) | 2026-09-05 | Current fair-play/anti-cheat/account-enforcement context | Does not define a developer API or product-approval process | Current first-party policy/help |
| APEX-L01 | Apex Legends / repository bundle | `docs/LiveAPI/readme.txt`, `events.proto`, and `changelog.txt` at `925095e` | 2026-09-05 | Local WebSocket model and explicitly named Custom Match request schema; bundle identifies LiveAPI 2.3 / Season 25.0 / 2025-05-06 | Legacy local evidence; not verified against a current installation or elevated to current EA authority | Versioned repository evidence |

## Bounded Negative Findings

The 2026-09-05 search of current public first-party Riot, Valorant, EA, Apex,
and Discord material found no documented public interface that lets QGuard:

- obtain exact current rank/RR for every Valorant participant by PUUID;
- programmatically create, invite, or join an ordinary Valorant party;
- obtain a general Apex player's current rank through an official public API;
  or
- programmatically create, invite, or join an ordinary Apex public/ranked
  party.

The focused party-entry follow-up also found no current public first-party
evidence that Apex implements Discord Game Invites or exposes a shareable code
or link for an ordinary public/ranked party. Discord's generic feature and its
ARC Raiders-only LFG Channel experiment do not establish Apex support.

These statements mean “not found in the reviewed public first-party material.”
They do not prove that no private partner interface exists. Any private or new
interface requires fresh first-party evidence and explicit provider permission
before it can enter a specification.

The CS2 follow-up found no current public first-party evidence of:

- a player-visible copyable link or code for an ordinary CS2
  Premier/Competitive party;
- CS2 support for Discord Game Invites into that matchmaking party;
- a supported QGuard interface to programmatically create, target, invite, or
  join AppID 730 lobbies; or
- an official public endpoint returning every player's exact current CS Rating
  or all per-map Competitive Skill Groups.

Those bounded negatives coexist with a positive result: Valve's first-party
material establishes a current-CS2 lineage for Looking to Play and documents
historical Nearby and Steam Group lobby paths that do not require Steam
friendship. Their present exact-user reliability remains a live-test question,
not a negative conclusion.

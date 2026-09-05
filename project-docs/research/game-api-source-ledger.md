# QGuard Game API Source Ledger

- **Record type:** current research evidence ledger
- **Status:** current research pass complete; recheck before implementation
- **Research owner:** primary Codex agent
- **Decision owner:** project owner
- **Authority:** `DEC-011` and `DEC-013`
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
| VAL-009 | Valorant / Riot | [Valorant Patch Notes 13.05](https://playvalorant.com/en-us/news/game-updates/valorant-patch-notes-13-05/) | 2026-09-05 | Riot began penalizing detected use of stream-sniping and instalock tools | Does not specifically classify party/LFG tooling; supports caution, not a blanket prohibition claim | Current first-party enforcement announcement; 2026-09-01 |
| VAL-C01 | Valorant / Riot issue tracker | [Feature request for Ranked Rating by RSO-linked PUUID](https://github.com/RiotGames/developer-relations/issues/922) | 2026-09-05 | Developer reports leaderboard coverage cannot provide official RR for all users | User-authored open issue; corroboration only, not Riot policy or a provider admission | Secondary developer report in first-party tracker |
| VAL-C02 | Valorant / Riot issue tracker | [Feature request for custom-lobby creation](https://github.com/RiotGames/developer-relations/issues/262) | 2026-09-05 | Developer requested a public custom-lobby API | User-authored open issue; does not prove private interfaces or present policy | Secondary developer report in first-party tracker |
| VAL-C03 | Valorant / Riot issue tracker | [Feature request for a Valorant Live Client Data API](https://github.com/RiotGames/developer-relations/issues/618) | 2026-09-05 | Developer requested a Valorant live-client API | User-authored open issue; does not prove private interfaces or present policy | Secondary developer report in first-party tracker |
| DIS-001 | Discord | [Discord Social SDK](https://discord.com/developers/docs/social-sdk/index.html) | 2026-09-05 | SDK is integrated and shipped by a game developer; games publish join secrets and manage their own lobbies | Does not grant a third-party LFG app control over Valorant or Apex parties | Current first-party developer documentation |
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

These statements mean “not found in the reviewed public first-party material.”
They do not prove that no private partner interface exists. Any private or new
interface requires fresh first-party evidence and explicit provider permission
before it can enter a specification.

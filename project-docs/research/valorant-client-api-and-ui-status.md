# VALORANT Client API Inventory and UI Release Status

- **Record type:** dated research findings, not an integration specification
- **Checked:** 2026-10-23
- **Research owner:** primary Codex agent; product decisions remain with the owner
- **Authority:** owner's request to investigate the local VALORANT client API and the announced UI change
- **Status:** documentation review complete; runtime behavior and QGuard permission remain unverified
- **Update trigger:** before proposing a client integration, after relevant client/API changes, or when the owner resumes live tests

The community documentation describes local account/chat services and private
Riot-hosted rank, party and join-link services. These are useful integration
candidates, not a supported public API contract. The home/lobby UI redesign
shipped in patch 13.06 on September 22, 2026; the Queue/Mode Select follow-up
shipped in 13.08 on October 13, 2026.

## Three Different API Surfaces

| Surface | Location | What the reviewed documentation covers |
| --- | --- | --- |
| Local Riot Client API | `https://127.0.0.1:{port}` on the player's computer | Session identity, credentials, friends, presence, chat, local API discovery and an event WebSocket |
| Private game services used by the client | Riot's PD, GLZ and SGP hosts | Rank/history, party management, matchmaking and shared join links |
| Official developer API | Riot Developer Portal | Separately registered/approved developer access; not interchangeable with client-session access |

Local authentication uses credentials associated with the running Riot Client.
Hosted requests use authenticated session credentials and endpoint-specific
headers. A local endpoint name containing `rso-auth` is not a grant of QGuard
production RSO access. Sources: [local discovery][swagger], [community reference][community],
[official developer policy][policy].

**Architecture implication, not a decision:** using the local surface would
require a component or explicit local interaction on the player's PC. The
QGuard server's `localhost` is not the player's computer. A website-only flow
cannot be assumed to have access to the client's credentials. Whether a
companion application is acceptable remains a product/security decision.

## Documented Local Endpoints

These are the 20 local HTTP operations in the reviewed community OpenAPI
export, version `0.10.1`, plus its separately documented WebSocket. They are
not a claim that every current Riot Client endpoint has been catalogued.
All HTTP paths below use `https://127.0.0.1:{port}`. Source: [OpenAPI export][openapi].

| Method | Path | Purpose |
| --- | --- | --- |
| GET | `/help` | Local API help |
| GET | `/swagger/v3/openapi.json` | Local API schema |
| GET | `/product-session/v1/external-sessions` | Product sessions |
| GET | `/rso-auth/v1/authorization/userinfo` | Signed-in identity |
| GET | `/riotclient/region-locale` | Region and locale |
| GET | `/player-account/aliases/v1/active` | Active account alias |
| GET | `/entitlements/v1/token` | Session tokens |
| GET | `/chat/v1/session` | Chat session |
| GET | `/chat/v4/friends` | Friends |
| GET | `/chat/v4/friendrequests` | Friend requests |
| POST | `/chat/v4/friendrequests` | Send request |
| DELETE | `/chat/v4/friendrequests` | Remove request |
| GET | `/chat/v4/presences` | Presence |
| GET | `/chat/v6/conversations/ares-parties` | Party conversation |
| GET | `/chat/v6/conversations/ares-pregame` | Pregame conversation |
| GET | `/chat/v6/conversations/ares-coregame` | In-game conversation |
| GET | `/chat/v6/conversations` | Conversations |
| GET | `/chat/v5/participants` | Chat participants |
| GET | `/chat/v6/messages` | Chat history |
| POST | `/chat/v6/messages` | Send chat |

The [WebSocket][websocket] at `wss://127.0.0.1:{port}` supports event
subscriptions. The [help response][help] describes events, functions and types;
the local Swagger endpoint is the documented route to inspecting the installed
client's schema when a separately authorized local check is possible. Neither
was called in this research pass. Tokens and local authentication material must
not be pasted into chat, committed, or collected as ordinary diagnostic logs.

## Rank and Match Data

The private player-data base is `https://pd.{shard}.a.pvp.net`.

| Method | Path | Documented role |
| --- | --- | --- |
| GET | `/mmr/v1/players/{puuid}` | Player rank-related data and seasonal history |
| GET | `/mmr/v1/players/{puuid}/competitiveupdates` | Competitive result and rating changes |
| GET | `/match-history/v1/history/{puuid}` | Match history |
| GET | `/match-details/v1/matches/{matchID}` | Match details |

The [Player MMR schema][mmr] includes `CompetitiveTier` and `RankedRating`
within seasonal queue data. Its name does not establish access to Riot's true
hidden matchmaking rating. Selecting the current competitive season, handling
unranked/reset accounts and verifying freshness would be necessary before
displaying a value as current rank. Example responses are not live evidence.

## Party Operations

The private party-service base is
`https://glz-{region}-1.{shard}.a.pvp.net`. The following is the relevant
subset, not every custom-game or administrative operation in the catalogue.

| Method | Path | Documented role |
| --- | --- | --- |
| GET | `/parties/v1/players/{puuid}` | Find a player's party |
| GET | `/parties/v1/parties/{partyId}` | Inspect party state and members |
| POST | `/parties/v1/parties/{partyId}/invites/name/{name}/tag/{tagline}` | Invite by Riot ID |
| POST | `/parties/v1/parties/{partyId}/request` | Request party entry |
| POST | `/parties/v1/parties/{partyId}/request/{requestId}/decline` | Decline request |
| DELETE | `/parties/v1/players/{puuid}` | Remove player |
| POST | `/parties/v1/parties/{partyId}/invitecode` | Generate party code |
| DELETE | `/parties/v1/parties/{partyId}/invitecode` | Disable party code |
| POST | `/parties/v1/players/joinbycode/{code}` | Join by party code |
| POST | `/parties/v1/parties/{partyId}/accessibility` | Change party accessibility |
| POST | `/parties/v1/parties/{partyId}/members/{puuid}/setReady` | Change ready state |
| POST | `/parties/v1/parties/{partyId}/queue` | Change queue |
| POST | `/parties/v1/parties/{partyId}/matchmaking/join` | Enter matchmaking |
| POST | `/parties/v1/parties/{partyId}/matchmaking/leave` | Leave matchmaking |

Sources: [party-code generation][generate-code], [joining by code][join-code],
and the Party section of the [community reference][community]. The code
operations are not documented solely as custom-match controls. Nevertheless,
their existence does not establish non-friend acceptance, leader privileges,
competitive eligibility or successful ordinary-party joining on today's build.
No separate general-purpose `Create Party` operation was identified in this
reviewed catalogue; do not infer that it exists from `Start Custom Game`.

## Shared Riot Join Links

The newer catalogue also documents an Activities service on
`https://{cluster}.pp.sgp.pvp.net`:

| Method | Path | Documented role |
| --- | --- | --- |
| POST | `/activities/v1/lookup` | Resolve a VALORANT party to an activity |
| POST | `/activities/v1/{activityId}/join-codes/shared` | Create a shareable join link |
| DELETE | `/activities/v1/{activityId}/join-codes/shared` | Revoke that link |

The response schema includes `joinCode`, `smartUrl`, `expiresAt` and `isActive`.
The URL shape is `https://gg.riotgames.com/VAL?joinCode=...`. Source: Activities
operations in the [OpenAPI export][openapi]; the individual shared-link page
could not be retrieved through web search, so the published JSON schema was
read directly instead.

**Implication:** link creation has a documented private-client mechanism; it
is too broad to say that no programmatic mechanism exists. This does not make
it an official QGuard developer API, prove that it works without Discord
account linking, or prove that its code is interchangeable with the older
party-service code. Those distinctions need separate verification.

The earlier research's negative findings concerned the **official public
developer API**. They must not be read as proof that the game client has no
private rank or party operations.

## Other Documented Families

The [full reference][community] also covers content/configuration, account XP,
cosmetic loadouts, restrictions, storefront/orders/gifting, pregame and current
match state, Premier, esports, mailbox, accolades, agent progression,
contracts, authentication and XMPP. This research does not propose importing
these capabilities into QGuard. In particular, agent-selection automation and
opponent scouting are unrelated to the requested teammate-formation flow.

## UI Release Status

| Release | Date | Relevant shipped changes |
| --- | --- | --- |
| [Patch 13.06][patch1306] | 2026-09-22 | Combined Home/Lobby hub, global navigation redesign, Career/Competitive Hub updates and revised end-of-game screens |
| [Patch 13.08][patch1308] | 2026-10-13 | Queue and Mode Select interface for matchmaking/custom games; Career navigation bar |

If the owner meant the announced home/lobby/menu overhaul, it has shipped.
These release notes establish UI availability, not the compatibility of any
community endpoint with the new build. Future test instructions should use
current UI labels rather than assume the older screenshots still match.

## QGuard Disposition and Open Questions

- **Verified source facts:** the referenced documentation contains these
  methods, paths and schemas; Riot published the two UI releases above.
- **Owner direction:** investigate this possibility. No new integration
  decision or live-test authorization was given.
- **Proposal:** evaluate a bounded, opt-in companion approach for the signed-in
  user's rank and party handoff if the owner wants to pursue this route.
- **Assumptions not promoted to facts:** an endpoint still works, a code admits
  non-friends, a shared link needs no Discord linkage, or private-client access
  is approved for QGuard.
- **Open questions:** current runtime behavior; permitted provider access;
  exact user consent/data handling; companion installation requirements;
  non-friend and cross-region restrictions; failure/revocation/version behavior.
- **Deferred work unchanged:** held Discord/game tests remain paused. Native
  QGuard text and the current no-Discord queue remain as implemented under
  `DEC-046`; the first-pass rank fallback under `DEC-048` remains in force.

Riot explicitly requires registration of products serving players even when
they do not use official documented APIs. Its VALORANT policy includes opt-in
LFG among accepted use-case categories, but that is not permission for every
private access method. The concrete QGuard client flow requires provider and
security/privacy review before reliance. The community site's ban-safety
assurance is not a Riot guarantee. Source: [Riot policy][policy].

## Source Ledger

All sources were accessed on 2026-10-23. The primary agent owns this evidence
record. Community authors are primary sources for their published reverse-
engineered descriptions, not authorities for Riot approval or runtime support.

| Source and publisher | Supports | Limit |
| --- | --- | --- |
| [VALORANT API Docs][community], PrometheuzzZ | Client/private API taxonomy and endpoint catalogue | Unofficial and generated; not exhaustive live inspection |
| [OpenAPI export][openapi], PrometheuzzZ, version 0.10.1 | Methods, paths, server separation and Activities response schema | Mutable export; no compatibility guarantee |
| [Local Swagger][swagger] and [WebSocket][websocket], PrometheuzzZ | Local schema discovery and event transport | Not queried on an installed client |
| [Local Help][help], techchrism | Local discovery response | Community documentation |
| [Player MMR][mmr], PrometheuzzZ | Seasonal tier/RR fields | No freshness or arbitrary-player access guarantee |
| [Party Generate Code][generate-code], techchrism; [Join By Code][join-code], PrometheuzzZ | Documented code-based party operations | Does not prove QGuard's non-friend case |
| [Developer policy][policy], Riot Games | Registration, opt-in LFG and provider boundaries | Not a QGuard application verdict |
| [13.06 release notes][patch1306], Riot Games, 2026-09-22 | Home/lobby and navigation release | Not private API documentation |
| [13.08 release notes][patch1308], Riot Games, 2026-10-13 | Queue/Mode Select and Career navigation release | Not proof of endpoint compatibility |

## Task Route and Completion Evidence

- **Task:** RESEARCH-2026-10-23-VALORANT-CLIENT; documentation-only inventory
  and release-status check.
- **Baseline:** clean `new-development` at
  `3eebfb13887426926e3be2fb673755f09e1eb87d`.
- **Entry and routes:** repository/portable AGENTS, mandatory README/routing
  path, documentation/workflow/QA/Git system rules, project index/current state
  and live governance reviewed. Research/sourcing, product planning,
  decision safety, privacy/legal, external review, audit/reconciliation,
  deferral/owner review and interruption/recovery procedures apply and were
  read. No code, migration, deployment, delegation or visual-design route.
- **Controlling records:** `DEC-008`, `DEC-018`, `DEC-035`, `DEC-046`,
  `DEC-048`, `OQ-009` and the current first-pass implementation record.
- **Inputs:** searches for VALORANT local/client API documentation and current
  UI release notes; direct community reference/OpenAPI inspection; official
  Riot release and policy pages. Date-sensitive review as of October 23 in
  Europe/Istanbul; not a Turkey-specific availability test.
- **Review and stop conditions:** owner decides whether to pursue a companion;
  provider access and security/privacy questions remain open. Stop before
  credentials, client calls, provider contact or implementation.
- **Changes:** this dated report and discoverability links only. Earlier
  research, decisions, application code and the canonical workflow remain intact.
- **Verification:** all 41 endpoint table methods/paths matched the public
  schema, including all 20 listed local HTTP operations. All 96 local links in
  the three changed documents resolved; report reference definitions resolved;
  whitespace and complete scoped diff checks passed.
  No application/runtime/rendered-game tests are claimed or required for this
  documentation-only unit. Live game tests remain unrun and on hold.
- **Remote state:** public documentation reads only; no game/account API calls,
  provider application, push, PR, deployment or history rewrite.
- **Commit boundary:** one coherent local documentation commit; its identity
  is supplied in the completion response and Git history.

[community]: https://valdocs.prometheuz.me/
[openapi]: https://valdocs.prometheuz.me/openapi.json
[swagger]: https://valdocs.prometheuz.me/endpoint/local-swagger-docs
[websocket]: https://valdocs.prometheuz.me/endpoint/local-websocket
[help]: https://valapidocs.techchrism.me/endpoint/local-help
[mmr]: https://valdocs.prometheuz.me/endpoint/player-mmr
[generate-code]: https://valapidocs.techchrism.me/endpoint/party-generate-code
[join-code]: https://valdocs.prometheuz.me/endpoint/party-join-by-code
[policy]: https://developer.riotgames.com/docs/valorant
[patch1306]: https://playvalorant.com/en-us/news/game-updates/valorant-patch-notes-13-06/
[patch1308]: https://playvalorant.com/en-us/news/game-updates/valorant-patch-notes-13-08/

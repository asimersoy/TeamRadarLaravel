# QGuard Counter-Strike 2 Party-Entry Feasibility

- **Record type:** current focused research findings
- **Status:** research complete; Looking to Play test proposal superseded by
  `DEC-019`; Steam communication/group follow-up recorded separately
- **Research owner:** primary Codex agent
- **Decision owner:** project owner
- **Authority:** `DEC-011`, `DEC-013`, and `DEC-015` through `DEC-020`, plus the
  owner's 2026-09-05 instruction to investigate CS2 as another candidate
- **Research date:** 2026-09-05
- **Date sensitivity:** high; recheck before a live test, integration
  specification, or implementation
- **Implementation authority:** none

## Current Disposition

On 2026-09-06, the owner decided that Looking to Play does not work for
QGuard's intended flow. `DEC-019` therefore rejects it as a product route and
cancels the live-test proposal below before activation. The documented feature
facts remain valid historical research; they no longer route work.

The later owner clarification makes a semi-automatable multi-person
conversation the desired coordination object. See the
[Steam non-friend communication and group report](steam-nonfriend-communication-and-group-feasibility.md)
for the superseded manual/persistent options and the current
[Discord coordination and game-join comparison](discord-coordination-and-game-join-comparison.md).

## Executive Finding

**Yes, Counter-Strike 2 has a credible friendship-free ordinary-party path,
but the current evidence does not yet show a direct shareable party link as
clean as Valorant's candidate link.**

Valve introduced **Looking to Play** as an in-game opt-in list from which a
lobby could invite available players who were not already friends. Valve's
October 2023 CS2 release notes explicitly fixed Looking to Play bugs, which
proves that the feature carried into CS2 rather than remaining only a CS:GO
historical feature. A May 2025 CS2 update still refers to in-game lobby
invitations, although it does not state every relationship or discovery rule.

Valve also continues to host first-party descriptions of **Nearby/Public
Lobbies** and **Steam Group Lobbies**. Both describe joining an ordinary
pre-match lobby without Steam friendship: nearby players can join a public
lobby, and members of the same Steam Group can join a group lobby. Those pages
describe CS:GO-era UI and do not expressly confirm that every control and
visibility rule remains unchanged in the current CS2 client. They are therefore
promising test candidates, not dependable current requirements.

No current first-party source reviewed here documents a normal CS2 player
copying an ordinary matchmaking-party link or code into QGuard or Discord.
Steam's developer lobby APIs prove that the underlying Steam lobby system can
join a known lobby identifier and deliver an invitation, but those APIs are
implemented in the game/AppID context. They do not give an unrelated QGuard
application Valve's CS2 publisher access or a supported right to automate the
CS2 client.

At the time of this pass, the research conclusion was
**`supported-with-conditions`** and proposed a two-account test. `DEC-019`
subsequently rejected the method for product-fit reasons, so this conclusion
must not be read as a current recommendation.

## Party-Entry Options

| Candidate mechanism | Friendship-free? | QGuard fit | Evidence state |
|---|---|---|---|
| Looking to Play: recipient advertises availability; host finds and invites them; recipient accepts in CS2 | Yes in the documented model | Rejected for QGuard by `DEC-019` | Current-CS2 existence established by 2023 first-party release notes; exact 2026 behavior was not tested before rejection |
| Nearby/Public Lobby: host exposes a lobby to nearby players; recipients select it from Public Lobbies | Yes in the documented model | Plausible, but discovery may be noisy, region-limited, and open to unintended joiners | First-party CS:GO-era page remains hosted; current CS2 controls unverified |
| Steam Group Lobby: host publishes the lobby to a selected Steam Group; group members join it | Yes after shared group membership | More targeted than a regional list, but adds persistent group membership and may expose community association | First-party CS:GO-era page remains hosted; current CS2 controls unverified |
| Normal Steam/CS2 lobby invite to an already-known account | Not established for arbitrary non-friends through current player UI | Good if a supported targeting control exists | Steamworks can invite a valid SteamID at the game-code level; current CS2 player-facing arbitrary-user targeting was not documented |
| Host copies a shareable ordinary-party link/code | Unknown | Best QGuard fit if it exists | No current first-party CS2 link/code workflow found |
| Discord Join or Discord Game Invite into the CS2 matchmaking party | Unknown | Good if CS2 itself publishes a join secret | Discord documents generic game invites, but no reviewed Valve/Discord source establishes CS2 matchmaking-party support |
| Connect to a community/dedicated server by IP or Discord server link | Can be friendship-free | Does not solve the ordinary Premier/Competitive party requirement | Officially documented, but excluded by the task's counting rule |
| QGuard programmatically creates, invites, or joins the CS2 lobby | Not a supported QGuard capability on current evidence | Would be low-friction, but crosses client-control and provider-access boundaries | Steamworks features belong to the implementing game/AppID; protected lobby Web APIs require publisher access |

## Superseded Looking To Play Flow Proposal

This was the first flow proposed for testing because current CS2 release
evidence names it directly and it avoids both friendship and persistent Steam
Group membership. `DEC-019` supersedes the proposal; the sequence is retained
only to show what was assessed:

1. QGuard identifies the intended host and recipients using their verified
   SteamIDs and displays the Steam persona information needed to recognize one
   another.
2. Each recipient enables Looking to Play for the intended ordinary mode.
3. The host creates the ordinary CS2 party, locates each intended recipient in
   Looking to Play, and sends the in-game party invitation.
4. Each recipient accepts from the CS2 main menu and appears in the same party.
5. The party enters the intended ordinary Premier or Competitive queue.

This is not yet a specification. The unresolved usability question is whether
the host can consistently locate the exact QGuard-matched account quickly
enough. If list membership is regional, short-lived, limited, ranked, filtered,
or nondeterministic, it may satisfy “possible without friends” while still
failing QGuard's low-friction goal.

Steam Group Lobby and Nearby/Public Lobby were identified as fallback
experiments. The current Steam communication/group assessment now owns that
route. Any test must use controls visibly available in the current client;
QGuard must not construct an undocumented URI, scrape presence, read client
memory, or simulate input to turn an old or internal mechanism into an assumed
product feature.

## Identity And Rank Follow-Through

### Verified Facts

- Steam officially supports browser-based OpenID for a third-party website to
  authenticate a user and obtain the user's 64-bit SteamID. The user enters
  Steam credentials only on Steam, not on QGuard.
- A current CS2 support page says assigned per-map Competitive Skill Groups are
  shown in party lobbies and that players sharing a lobby see them.
- CS Rating is a distinct Premier rating. Prime Status is required to receive
  Competitive Skill Groups and CS Rating, and Premier additionally requires
  Prime Status and the specified profile-level eligibility.
- Steam offers generic Web API methods for user-defined game stats and
  achievements. Publisher-only leaderboard and lobby methods require publisher
  keys and AppID access.

### Bounded Interpretation

- Steam OpenID gives QGuard a cleaner officially documented identity-linking
  path than an unauthenticated Steam-name declaration. This does not itself
  prove rank, ownership, Prime status, lobby membership, or good standing.
- Human participants can inspect an assigned Competitive Skill Group after
  joining the same party, which may support a manual confirmation flow. It is
  not an API-backed QGuard verification method and does not necessarily expose
  the player's current Premier CS Rating.
- No current first-party public endpoint was found that lets QGuard retrieve
  every opted-in player's exact current CS Rating or all per-map Competitive
  Skill Groups. Generic Steam stats and Steam leaderboards cannot be assumed to
  contain CS2's private game-coordinator rank data merely because similarly
  named APIs exist.

Rank therefore remains an independent gap. CS2's party-entry possibility does
not by itself satisfy `DEC-013`'s preference for authoritative automated rank
retrieval.

## Provider And Automation Boundary

No reviewed Valve source classifies a standalone LFG website, Steam OpenID
login, a user's manual Looking to Play advertisement, a manual lobby invite, or
a manual invite acceptance as cheating. These are either ordinary user actions
or documented web capabilities.

If QGuard uses the Steam Web API, Valve's published API terms require the
application to use documented interfaces, protect its key, retrieve end-user
data only as requested, disclose storage, publish a privacy policy for
nonpublic data, avoid implying Valve endorsement, and avoid unfair competitive
advantage. Those requirements become concrete only after a field-level QGuard
flow is proposed.

Valve's current Steam Subscriber Agreement separately prohibits unauthorized
software controlling Steam or game interfaces and broadly prohibits
non-human-controlled automation interacting with Steam content and services.
Consequently, the safe research boundary is a user-mediated flow. A bot,
desktop relay, macro, or other component that controls CS2/Steam, extracts an
ordinary CS2 lobby identifier through an undocumented method, or accepts an
invite for the player cannot enter a specification without direct supported
authority, exact policy review, and owner approval.

This is a provider-policy fit assessment, not legal advice or Valve approval.

## Comparison With The Current Valorant Candidate

| Dimension | Counter-Strike 2 | Valorant |
|---|---|---|
| Friendship-free party entry | Feature evidence exists for Looking to Play, but the owner rejected it for QGuard; Steam Group lobbies remain a historical first-party candidate | Credible: host can copy the official lobby link and share it anywhere |
| Deterministic delivery to an exact QGuard match | Unproven; depends on exact users appearing in or finding the relevant list/lobby | Unproven for the precise non-Riot-friend/non-Discord-friend recipient, but direct link delivery is simpler if it passes |
| Third-party programmatic party control | Not supported for QGuard on current evidence | No public supported ordinary-party control found |
| Web identity | Official third-party Steam OpenID is documented | Riot identity/player data requires the applicable approved RSO path |
| Automated exact rank retrieval | No all-player CS Rating/per-map Skill Group endpoint found | No all-player exact current rank/RR endpoint found |
| Rank visible to party members | Assigned Competitive Skill Group is documented as visible in the shared party lobby | Not established by this research as a QGuard verification mechanism |
| Provider gate for a basic user-mediated test | No publisher access is needed to test visible in-game UI with user accounts | No API approval is needed to test the official copied link with user accounts |

CS2 is therefore a **serious candidate, not a demonstrated winner**. Its
identity story is easier, while Valorant currently has the cleaner documented
handoff. Both need current behavioral verification before QGuard relies on the
party-entry mechanism.

## Superseded Live-Verification Proposal

`DEC-019` cancels this Looking to Play test before activation. It may not be
run or used as a current acceptance gate unless a later owner decision
explicitly restores it.

### Phase A - Looking To Play

- Use two current PC accounts in the same intended region that are not Steam
  friends and are not connected through a special test-only relationship.
- Record client/build date, region, Prime state, intended mode, privacy and
  communication settings, relationship state, and whether either user is
  blocked.
- Have the recipient enable Looking to Play; record whether the host can find
  the exact recipient, time to appearance, visible identifying fields, list
  size, and any region/language/rank filtering.
- Invite, accept, verify shared party membership, and verify the party can
  enter the intended ordinary queue.
- Repeat at least three times and once with the roles reversed. Record time,
  failures, unintended invitations, and recovery behavior.

### Phase B - Current Alternative UI

Only if the current client visibly offers the controls:

- test a Nearby/Public Lobby with the same non-friend accounts;
- test a purpose-specific Steam Group Lobby with the accounts sharing group
  membership but not friendship; and
- check whether the current UI itself exposes an official copyable party link
  or code. Do not manufacture a link from an undocumented lobby identifier.

### Passing Threshold

A mechanism passes technical feasibility only when the intended non-friend
recipient can repeatedly identify and join the correct ordinary party without
private interfaces or client automation. Product acceptance additionally
requires an owner decision that its steps, latency, unintended-join exposure,
account prerequisites, and persistent group/privacy consequences are
acceptable.

No live account/client test was authorized or performed during this research.

## Separated Record

### Owner Instruction

Investigate CS2 as another possible game. If a friendship-free party path
exists, pursue its bounded feasibility rather than assuming Valorant is the
only option. Valorant remains available if CS2 is not suitable.

### Subsequent Owner Decision

Looking to Play does not work for QGuard's intended flow and is no longer a
party-entry candidate (`DEC-019`). This is a product-fit decision, not a claim
that the Steam/CS2 feature no longer exists.

### Verified Facts

The claims above supported by first-party Valve, Steam, CS2, and Discord
material are indexed in the [game API source
ledger](game-api-source-ledger.md).

### Bounded Inferences

- Before `DEC-019`, Looking to Play was assessed as the strongest documented
  no-friend experiment because it is expressly named in CS2 release notes.
- Steam Group and Nearby lobbies may still work, but their CS:GO-era UI
  descriptions require present-client verification.
- A direct link would be preferable, but no current official CS2 source found
  here establishes one.

### Proposals

- **Superseded by `DEC-019`:** run the Looking to Play verification packet and
  compare it with Valorant.
- **Superseded by `DEC-020`:** investigate manual Steam group chat and
  persistent Community Group membership as the next routes.
- **Current:** use the Discord comparison to separate automatable multi-person
  communication from actual CS2 party entry.

### Open Owner Decision

The current `DEC-018` Valorant selection has not been superseded. Current first-
party evidence supports Discord communication for CS2 but not an ordinary CS2
party handoff. Whether the owner wants a current-client Discord test or another
CS2 route remains open; it no longer depends on treating persistent Community
Group membership as the desired communication object.

### Unperformed And Deferred Work

- No live CS2 or Valorant test, Steam Group action, OpenID registration, Web API
  call, client inspection, credentials, provider contact, or implementation
  occurred.
- Current Steam group-chat and CS2 Community Group lobby behavior, rank
  retrieval, and any direct party link remain unverified.

## Recheck Triggers

- Recheck Looking to Play only if the owner later reopens the rejected route.
- Recheck lobby privacy, Prime/Premier eligibility, OpenID/Web API terms,
  Subscriber Agreement automation language, or any supported party link/API;
  recheck Looking to Play only after an owner reopening.
- Route any proposed SteamID, profile, rank, group-membership, lobby, block, or
  communication data through a field-level privacy and security review before
  collection.

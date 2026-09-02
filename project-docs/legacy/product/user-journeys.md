# Legacy User Journeys

- **Record type:** historical journey reconstruction
- **Status:** draft for owner review
- **Current authority:** none

## Evidence Legend

- **Implemented:** surviving legacy code demonstrates at least a prototype.
- **Corroborated:** multiple historical sources describe the step.
- **Memory-supported:** detailed in the supplied reconstruction but lacking a
  surviving primary implementation or decision.
- **Exploratory:** appeared as an idea without a settled route.

## Journey A - Remembered Apex Public-Match Flow

### 1. Discover TeamRadar

The player visits a marketing page describing teammate discovery,
communication, reputation, and reduced toxicity.

- Evidence: **implemented** as a QueueGuard-branded landing prototype.
- Gaps: copy is largely placeholder; online counts, ratings, and claims are not
  backed by data.

### 2. Register And Sign In

The player creates a normal website account, verifies email where required, and
enters an authenticated dashboard.

- Evidence: **implemented** Laravel authentication scaffolding and feature
  tests.
- Gaps: no historical age, consent, abuse-prevention, or account-recovery
  product boundary beyond starter-kit behavior was located.

### 3. Link A Game Account

Before matchmaking, the player supplies a game-facing name and rank or skill
level.

- Evidence: **implemented** generic `Game`/`GameAccount` schema and setup gate,
  but the surviving UI is Valorant-specific.
- Apex interpretation: **memory-supported**.
- Gaps: platform, region, account ownership, name changes, duplicates, and
  recovery were not specified.

### 4. Declare Or Reconfirm Rank

The remembered MVP asked the player to self-declare current rank and reconfirm
it when queueing because rank changes over time.

- Evidence: rank entry is **implemented** in the Valorant prototype;
  reconfirmation-at-queue is **memory-supported**.
- Trust model: self-declaration was not supposed to be described as verified.
- Gaps: inaccurate declarations, rank bands, seasonal resets, unranked players,
  and challenge resolution were unresolved.

### 5. Configure And Run TeamRadar Relay

For the Apex-integrated path, the player receives a PSK, enters the TeamRadar
backend URL, local LiveAPI URL, and PSK in an Electron relay, then connects.

- Evidence: **recovered implementation** in unreachable relay commits.
- UI states: Connecting, Authenticating, Authenticated/Alive, Disconnected,
  Retrying, Error, ping count, event count, and debug log.
- Corrected architecture: Apex should connect as the WebSocket client to a local
  relay listener. The recovered relay instead connected outward as a client,
  so that portion was incomplete/wrong.
- Gaps: installer onboarding, launch-option instructions, token issuance,
  rotation, and support flow were not integrated end-to-end.

### 6. Enter The Website Queue

The player sees linked account, declared rank, honor/reputation, mode/settings,
queue status, wait estimate, and population, then presses Find Match.

- Evidence: **implemented static UI** for Valorant; actual queue behavior is not
  implemented.
- Corroborated inputs: game, rank/skill, and behavioral reliability/honor.
- Gaps: nearly all other filters, eligibility, weighting, wait widening, and
  no-match behavior were unresolved.

### 7. Receive A Match And Enter A Private Room

TeamRadar groups compatible players in a private website room.

- Evidence: **memory-supported**; no surviving room implementation.
- Intended room functions: view matched members/game IDs, copy account
  information, choose/identify host, ready up, coordinate invites, and possibly
  see relay presence.
- Gaps: team size, partial parties, host selection, membership security,
  room expiry, chat, blocking, decline, timeout, no-show, and replacement.

### 8. Manually Form The Apex Party

Players copy identifiers, add/invite one another manually, select a host, and
enter normal Apex public/ranked matchmaking.

- Evidence: **memory-supported** and consistent with the limitation that Apex
  custom-match commands do not create ordinary pubs parties.
- Explicit old boundary: no automated friend request, ordinary lobby join, or
  public/ranked matchmaking control.
- Gaps: console/PC differences, cross-play, failed friend discovery, privacy
  settings, and abandoned invitations.

### 9. Observe The Session

Where a relay is active, TeamRadar receives presence/session events intended to
show that the game is connected, matched users reached a relevant session, play
began, and the session ended.

- Evidence: LiveAPI event capture is a **partial proof of concept**; group-level
  verification and review unlock are **memory-supported**.
- Purpose: support trustworthy review eligibility, not control gameplay.
- Gaps: exact events, correlation identifiers, false positives, disconnects,
  buffering, privacy, retention, and proof thresholds.

### 10. Review Teammates

After a qualifying session, teammates provide feedback that contributes to
honor/reputation and may include serious-behavior or false-information reports.

- Evidence: reputation/review positioning is **corroborated**; actual review
  flow is not implemented.
- Remembered rule: trusted reviewers' votes carry more weight.
- Gaps: all questions, labels, scoring, eligibility, repeat ratings, reasons,
  moderation, appeals, retention, and matching effects.

### 11. Requeue Or Continue Together

The product might let players requeue, remain as a group, or build a persistent
team relationship.

- Evidence: **exploratory** only.
- Gaps: the old project did not settle immediate requeue after abandonment,
  repeated teammate behavior, friend/team persistence, or long-term groups.

## Journey B - Valorant Detour Prototype

The tracked late branch followed a simpler API-light idea:

1. register/sign in;
2. enter Riot ID and self-declared rank;
3. access a static Valorant matchmaking page;
4. eventually use website matchmaking and lobby-code/manual coordination;
5. let teammates verify or report rank/behavior;
6. build enough prototype value to seek Riot API approval;
7. later consider RSO, PUUID, match history, and rank lookup.

Only steps 1-3 were partially implemented. The setup code immediately fills
`verified_at`, which was prototype convenience rather than proof. All platform
capability assertions are historical and require fresh official research if a
future plan selects Valorant.

## Journey C - Moderator Or Support Operator

The old concept implied manual handling of serious reports and false rank/account
claims, but no operator workflow survives.

Unresolved operator states include:

- receive and prioritize a report;
- protect a reporter without promising anonymity that cannot be delivered;
- inspect only authorized evidence;
- distinguish ordinary negative feedback from a policy violation;
- warn, restrict, suspend, or decline action;
- communicate reasons;
- support correction/appeal;
- retain/delete evidence consistently; and
- handle repeat or coordinated abuse.

## Missing Cross-Journey States

The legacy idea did not fully specify:

- empty/no-match states and widening rules;
- contradictory or missing profile inputs;
- relay unavailable, misconfigured, offline, or intermittently connected;
- one matched user declining or timing out;
- one user blocking another before or after matching;
- unsafe conduct in the private room;
- session evidence disagreement;
- review eligibility without relay evidence;
- false, retaliatory, duplicate, or coordinated reviews;
- account deletion, data export, correction, or retention;
- moderation appeal and restoration; or
- rollback when a matching/reputation rule causes harm.

These omissions matter because the old happy path depended on trust signals
without defining the recovery and adverse paths that make them fair.

# QGuard Game API Feasibility Findings

- **Record type:** current research findings
- **Status:** initial and focused follow-up research complete; owner decision
  required
- **Research owner:** primary Codex agent
- **Decision owner:** project owner
- **Authority:** `DEC-011`, `DEC-013`, `DEC-015`, `DEC-016`, and `DEC-017`
- **Research date:** 2026-09-05
- **Date sensitivity:** high; recheck provider facts before an implementation
  slice or provider application
- **Implementation authority:** none

## Executive Finding

The reviewed public first-party material does not document a supported path in
either candidate that provides both:

1. a guaranteed current competitive rank for every participating player; and
2. programmatic creation/joining of an ordinary public or ranked party.

Valorant is presently the closer candidate for the preferred QGuard flow. Riot
explicitly lists opt-in LFG tools as an approved use-case category, provides
RSO identity and official match/leaderboard APIs after production approval, and
now lets PC users copy a Valorant lobby link and share it anywhere through the
Riot/Discord integration. Those pieces could support an approval-gated,
user-mediated QGuard flow. They do not provide a documented third-party API for
creating an ordinary party, generating the Riot lobby link, or joining users
programmatically. Official rank coverage is also incomplete.

Apex Legends has an official PC LiveAPI that can receive gameplay events and
send documented requests, including lobby control. EA explicitly describes its
lobby requests as **Custom Match** requests. The public first-party material
reviewed does not expose an ordinary-party API or a public player-rank API.
Private Battle Royale matches also require at least 30 players, so Custom Match
control does not satisfy the intended small-party public/ranked flow.

These are research findings, not a game selection. If exact current rank and
ordinary-party automation become hard requirements, neither candidate
currently qualifies from the reviewed public first-party evidence.

The focused
[party-entry and provider-policy follow-up](party-entry-and-policy-fit.md)
adds an important distinction: Valorant's official PC Discord integration is
the only evidenced friendship-free ordinary-lobby candidate. Apex still has no
documented equivalent. The relevant provider restriction is unauthorized
client control or data extraction, not external LFG coordination or official
user-mediated joining.

## Capability Matrix

| Capability | Valorant | Apex Legends |
|---|---|---|
| Publisher recognizes third-party LFG use | `approval-gated`: Riot lists opt-in LFG tools as an approved use-case category, but the product must be registered/audited and approved | `unknown`: no equivalent public Apex developer-product/LFG approval path was found in the bounded first-party search |
| User identity authorization | `approval-gated`: RSO identifies an opted-in user; RSO requires an approved production application | `unknown`: no public Apex player OAuth/API flow was found |
| Exact current rank for any participant | `undocumented/unverified`: no per-PUUID current-rank or current-RR endpoint appears in the official API list | `unknown`: no public first-party player-rank endpoint was found |
| Rank evidence from completed play | `supported-with-conditions`: match history plus match details can expose the match participant's `competitiveTier`; this is a completed-match value, not guaranteed current rank | `unknown`: LiveAPI is gameplay/custom-match oriented and the reviewed public material does not document a reusable account-rank lookup |
| Leaderboard rank/rating | `supported-with-conditions`: official act leaderboard exposes rank/RR, but only for leaderboard members and identity fields may be omitted for anonymized players | `unknown`: no public first-party leaderboard/player-rank API was found |
| Create/invite/join an ordinary public/ranked party through a public API | `undocumented/unverified`: no party, invite, or lobby operation appears in the official public API list | `undocumented/unverified`: LiveAPI lobby commands are explicitly for Custom Matches |
| User-mediated party handoff | `supported-with-conditions`: on PC, a user can copy a Riot/Discord lobby link into a server, DM, or elsewhere; exact non-friend recipient prerequisites remain unverified | `supported-with-friction`: users must use the documented search/add-friend/invite/accept flow |
| Custom/private match automation | `undocumented/unverified`: no public lobby-creation endpoint appears in the official API list | `supported-with-conditions`: PC LiveAPI documents Custom Match create/join/ready/matchmaking/team/settings requests |
| Suitability of custom match for a normal small squad | Not established | `unsupported` for the documented Private Battle Royale path: it requires at least 30 players |
| Safe basis for undocumented client automation | No. Riot's terms prohibit unauthorized programs and automation that interact with Riot Services | No. EA's current agreement restricts unauthorized automated access, interface modification, interception, mining, and data extraction |

The outcome terms above use the vocabulary defined in the
[research brief](game-api-feasibility.md). `Unknown` and
`undocumented/unverified` are not claims that a capability can never exist;
they mean it is not a safe project dependency on the reviewed evidence.

## Valorant Findings

### Verified Facts

- Riot requires a player-serving Valorant product to be registered even if it
  does not use Riot's documented APIs. All products are subject to audit, and
  feature changes must be reflected through the Developer Portal.
- Riot explicitly lists LFG tools among accepted opt-in use cases.
- Valorant does not offer personal API keys. RSO is available only after a
  production application is approved, and Riot normally requires a functioning
  or near-functioning site, prototype, rendering, or clear mockup of the user
  flow. A verified domain, Terms of Service, and Privacy Policy are part of the
  production-key path.
- Every participating user whose stats are shown must opt in through RSO. Riot
  also requires a disclosure that account linking makes the relevant player
  data public in the product's ecosystem; non-opted-in players must not be
  exposed by the product.
- The official public API inventory lists content, match, ranked-leaderboard,
  and status APIs. It does not list ordinary party, invite, join, or lobby
  operations.
- `VAL-MATCH-V1` supplies a match list by PUUID and match details by match ID.
  Its current public schema contains a participant `competitiveTier` integer
  and a `partyId` in a completed match record.
- `VAL-RANKED-V1` supplies an act leaderboard, not a per-PUUID rank lookup. Its
  player response includes leaderboard rank, ranked rating, and wins; PUUID,
  game name, and tagline may be omitted for anonymized players.
- Riot and Discord's 2026 PC integration lets a user invite linked Discord
  friends from Valorant or copy a lobby link and share it in a Discord server
  or anywhere else. Region support, account linking, and current clients affect
  availability.
- Discovery through the integrated Riot friends list requires a formal Discord
  friendship and linked Riot/Discord accounts. The separately documented lobby
  link can be posted into a server, DM, or elsewhere.

### Bounded Interpretation

- A participant's `competitiveTier` from their latest completed competitive
  match is a possible **last-observed tier**. It is not evidence of their exact
  rank at the present moment, does not guarantee ranked-rating precision, and
  fails for users without a suitable recent match.
- The official leaderboard can provide exact leaderboard rank/RR only for
  covered players. It is not a complete rank source for QGuard's population.
- The Riot/Discord lobby link is the strongest documented low-friction party
  handoff found. The safe interpretation is a user copies the link and QGuard
  transmits it to matched users. This removes a documented need for the host to
  add every recipient in Valorant, but first-party material does not explicitly
  enumerate every non-friend recipient prerequisite. No reviewed source
  authorizes QGuard to derive, generate, scrape, or invoke the link on a user's
  behalf.
- Discord's Social SDK does not fill this gap. Its lobby/invite APIs are for a
  game developer to integrate and ship inside its own game; they do not grant a
  third-party LFG product control over Valorant's party.
- Open feature requests in Riot's official issue tracker corroborate the public
  API gaps for all-user ranked rating, custom-lobby creation, and a Valorant
  live-client API. They are user-authored reports, not Riot policy or a promise
  that the requested interfaces will be added.

### Candidate Integration Boundary, Not Yet Approved

The strongest presently evidenced Valorant boundary is:

1. a public, registered, Riot-approved LFG product;
2. RSO opt-in for every participating player;
3. official match/leaderboard data with an explicit freshness and coverage
   label rather than a universal “verified current rank” claim; and
4. a host-mediated Riot lobby-link handoff, with manual Riot-ID invitation as a
   recovery path.

This boundary still needs owner acceptance, a provider-application strategy,
rank-missing behavior, a concrete data flow, and later privacy/legal review.

## Apex Legends Findings

### Verified Facts

- EA announced LiveAPI 2.0 as an official PC capability based on WebSockets and
  Protocol Buffers. Its 12 announced requests comprised two gameplay requests
  and ten lobby requests specifically for Custom Match.
- EA later added secure WebSocket support, pre-shared-key request validation,
  event delay, and documentation. EA's Breakout notes deprecated file output in
  favor of WebSockets and said the file path would be retired by Q3 2024.
- EA keeps the detailed technical schema in the game installation rather than
  on the public web page. The repository's legacy bundle identifies itself as
  LiveAPI 2.3 through Season 25.0 dated 2025-05-06 and contains requests named
  `CustomMatch_CreateLobby`, `CustomMatch_JoinLobby`,
  `CustomMatch_GetLobbyPlayers`, `CustomMatch_SetReady`, and
  `CustomMatch_SetMatchmaking`. It is useful corroborating legacy evidence, not
  a guarantee of the current installed schema.
- The current public Apex FAQ documents ordinary party formation as a manual
  friend-search/request/invite/accept flow.
- The same FAQ documents a user-created Private Match join code and says a
  Private Battle Royale match needs at least 30 players.
- The reviewed first-party material does not publish a general Apex player
  profile/rank API, an OAuth flow for a third-party LFG product, or an ordinary
  public/ranked-party command set.
- EA's current User Agreement restricts access, extraction, reverse
  engineering, interface modification, interception, mining, or collection of
  game information unless expressly authorized by EA or permitted by law.

### Bounded Interpretation

- Apex LiveAPI is technically capable and legitimate **inside its documented
  Custom Match boundary**. It does not prove ordinary squad-party control.
- A QGuard design for a handful of users seeking a normal public/ranked game
  cannot substitute a 30-player Private Battle Royale without changing the
  product's purpose.
- Third-party stat trackers and remembered `nucleusHash` experiments are not a
  current, authoritative rank source. They cannot become a project dependency
  without separate provider provenance, permission, accuracy, availability,
  and data-flow review.
- Because detailed current LiveAPI documentation is installed with the game,
  a future Apex decision may justify a read-only inspection of a current PC
  installation. That would require a separate scoped route and any necessary
  access; no client experiment was performed here.

### Candidate Integration Boundary, Not Yet Approved

The presently evidenced Apex boundary is manual ordinary-party coordination
through the friend/invite flow, with no approved rank integration. No
Apex-specific Discord Join or shareable ordinary-lobby link/code was found.
Custom Match automation is available only for a materially different product
flow. This makes Apex a weaker fit than Valorant for the two preferred
capabilities, while leaving open an owner-led fallback or a different Apex
product shape.

## Policy, Data, And Operational Constraints

### Verified Constraints

- Valorant production access is approval-gated and may be changed, limited, or
  terminated by Riot. An implementation cannot depend on obtaining a personal
  key because Valorant personal keys are not offered.
- Riot requires opt-in for player-specific Valorant data and disallows exposing
  non-opted-in players. The future data model must preserve consent state,
  provenance, accuracy/freshness labels, and deletion/correction behavior.
- Riot prohibits alternative skill-ranking systems. QGuard's behavioral honor
  concept must remain clearly separate from official rank and cannot be
  presented as a replacement MMR/ELO.
- Riot and EA restrictions reviewed here do not establish a conflict for a
  standalone LFG service or official user-mediated join flow. They directly
  constrain a different design: unauthorized client automation, memory access,
  interception, scraping, interface modification, or gate bypass.
- Provider compliance does not replace applicable-law review. The exact launch
  jurisdictions, ages, data fields, recipients, retention, moderation flow, and
  business/operator identity remain undecided, so no legal conclusion is made
  in this research pass.

### Operational Unknowns

- whether Riot would approve QGuard's final honor, reporting, matching, and
  lobby-link flow;
- production-key rate limits and scopes actually granted to QGuard;
- how recent-match tier behaves across rank resets, placements, unranked users,
  private profiles, missing matches, and API outages;
- whether Riot exposes an approved programmatic way for a third party to use
  the new lobby link beyond a user copying and sharing it;
- current installed Apex LiveAPI schema and whether EA offers a separate
  partner program not documented publicly;
- launch region availability, cross-play/input boundaries, and current party
  sizes for the selected mode; and
- the fallback rank and party experience the owner considers acceptable.

## Separated Assessment

### Verified Facts

The capability and policy facts above are supported by the
[source ledger](game-api-source-ledger.md). Legacy bundled files are labelled
separately from current provider authority.

### Owner Decisions

- The game is selected by feasibility rather than history or preference.
- Rank retrieval and low-friction party formation are preferred, not absolute.
- API-derived rank is preferred; self-declaration is a bounded fallback.
- PC is only a provisional working direction.
- Alternate flows are discussed after the research result, not assumed before
  it.
- Friendship-free ordinary-party entry is preferred over a friend/invite flow,
  and Custom/Private Match codes do not satisfy the normal-party need.
- If Valorant is selected and RSO is required, a provider-independent prototype
  with clearly mocked RSO-dependent flows may support a later application; it
  does not presume access.

### Assumptions

None of the following is assumed: provider approval, exact rank coverage,
programmatic normal-party control, permission to use undocumented interfaces,
availability in a chosen region, or acceptance of a fallback flow.

### Agent Assessment

Valorant is the stronger of the two researched candidates for QGuard's desired
first-game integration. Its party side is provisionally viable if a host-copied
official lobby link is acceptable and the remaining non-friend acceptance edge
is closed before reliance. The approval gate and incomplete rank coverage
remain. Apex does not presently meet either preferred capability for ordinary
public/ranked play from the reviewed official evidence.

### Proposals For Owner Discussion

1. Decide whether the host copying one official Valorant lobby link into QGuard
   is sufficiently low friction.
2. If yes, close the non-friend recipient edge through a scoped live test or
   provider confirmation and then settle the rank-missing behavior.
3. If no, neither candidate meets the preferred ordinary-party threshold;
   discuss the owner's alternate flows or expand the matrix to other PC games.

These are proposals only. The next discussion should settle the acceptable
party-formation and rank fallback boundary before selecting a game.

## Research Limits And Recheck Triggers

- No account, API key, production application, provider contact, live game
  client, network capture, reverse engineering, or automated party action was
  used.
- Negative findings mean “not found in the public first-party material reviewed
  on 2026-09-05,” not proof that a private partner interface cannot exist.
- The Apex detailed schema was not verified against a current installation.
- The Riot API-reference pages were inspected read-only; no endpoint was called
  with credentials.
- Recheck before provider application, before approving an integration
  specification, after a relevant provider-policy/API change, or if the owner
  materially changes the required party/rank flow.

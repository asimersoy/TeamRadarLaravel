# QGuard Party Entry And Provider-Policy Fit

- **Record type:** current focused research findings
- **Status:** Apex/Valorant research complete; owner selected Valorant under
  `DEC-018`; later CS2 comparison is recorded separately
- **Research owner:** primary Codex agent
- **Decision owner:** project owner
- **Authority:** `DEC-011`, `DEC-013`, `DEC-015` through `DEC-018`
- **Research date:** 2026-09-05
- **Date sensitivity:** high; recheck before integration specification,
  provider application, or implementation
- **Implementation authority:** none

## Executive Finding

This report's comparative conclusions are scoped to Valorant and Apex. A later
[Counter-Strike 2 follow-up](counter-strike-2-party-entry-feasibility.md) found
a credible non-friend Looking to Play route and reopened the owner comparison;
it did not supersede `DEC-018` by itself.

Valorant now has the closest documented match to the owner's preferred party
flow. Riot and Discord's official PC integration lets a lobby host copy a
party link and place it in a Discord server, direct message, or elsewhere. This
is an official user-mediated ordinary-lobby handoff, not a third-party party
API. The first-party text supports distributing the link without first adding
every recipient to the host's Valorant friends list. It does not explicitly
state every recipient prerequisite or expressly test a non-Discord-friend,
non-Riot-friend acceptance case, so that last edge remains `unverified` until a
live two-account check or provider confirmation.

No comparable Apex-specific Discord Join, Rich Presence party invite, or
shareable ordinary-lobby code/link was found in current public first-party
material. Discord's generic Game Invites work only when the game implements
them. Discord's new LFG Channel type is currently a limited experiment whose
documented supported game is ARC Raiders, not Apex or Valorant. EA's current
Apex documentation still describes ordinary party formation as find friend,
accept friend request, invite, and accept; its public join code is for Private
Matches, which does not satisfy QGuard's ordinary public/ranked-party need.

The relevant policy result is narrower than the earlier generic warning. No
reviewed Riot or EA source identifies a standalone LFG website, opt-in use of an
official data interface, transmission of an official user-created lobby link,
or a user's manual invite acceptance as cheating. Riot explicitly lists
opt-in Valorant LFG tools as an accepted use-case category, although QGuard
would still need registration and approval. The terms become a direct QGuard
constraint only if a design tries to automate an ordinary game client through
an unauthorized interface, scrape or intercept game data, read client memory,
or bypass a provider gate. Those methods are not part of the evidenced
assisted flow.

## Party-Entry Matrix

| Owner preference | Valorant | Apex Legends | Current fit |
|---|---|---|---|
| Official Discord/server-based direct join or shareable ordinary-lobby link without first adding an in-game friend | `supported-with-conditions`: official PC integration lets a host copy a lobby link into a Discord server, DM, or elsewhere; exact non-friend recipient prerequisites remain unverified | `not found`: Discord documents the generic mechanism, but no Apex-specific first-party support was found | Valorant is the only evidenced candidate for this tier among the two games assessed in this report |
| Other official shareable code/link for an ordinary party | The Riot/Discord lobby link is the evidenced mechanism; no separate public party code was found | `not found`: the documented code is for Private Match, not an ordinary public/ranked party | No separate mechanism established |
| Add friend, then invite and accept | `supported`: normal manual recovery path; direct Discord friend-list invitations additionally require formal Discord friendship and linked accounts | `supported`: EA documents find friend, accept request, invite, and accept | Functional last resort, with the owner-identified adoption friction |
| QGuard programmatically creates/joins the ordinary party | `undocumented/unverified`: no public party operation is listed | `undocumented/unverified`: LiveAPI lobby requests are for Custom Match | Not an approved dependency |

`Not found` means absent from the public first-party material reviewed on the
research date. It is not proof that a private partner feature cannot exist.

## Valorant Details

### Verified Facts

- Riot and Discord publicly launched account-linked Valorant party features in
  2026 for PC where both services are supported.
- A user can invite linked Discord friends from the Valorant client and can
  copy a lobby link for a Discord server, direct message, or another location.
- The integrated Riot friends-list view includes only people with a Riot ID, a
  formal Discord friendship, and linked Riot/Discord accounts. That requirement
  applies to discovery through the integrated friends list.
- Riot's public Valorant developer policy separately lists LFG tools as an
  accepted opt-in use case. A player-serving product must be registered even if
  it uses no official API, and QGuard itself is not approved merely because the
  use-case category is accepted.
- Valorant offers no personal API key. Player-specific stats require opt-in and
  RSO, and RSO requires production-level approval.
- Riot accepts a functioning app, mostly testable prototype, clear mockups,
  deck, or rendering as evidence of intent, and requires an understandable
  working link or rendering of the user flow for a production application.

### Bounded Interpretation

- Posting the official lobby link into a QGuard room could remove the need for
  matched players to add one another in Valorant. This is a strong inference
  from the documented server-link flow, not a live-tested guarantee for every
  friendship, region, privacy, or client state.
- QGuard could transmit a link the host deliberately pastes or shares without
  controlling Valorant. No reviewed source gives QGuard an API to create,
  extract, or click the link on a user's behalf.
- The owner's conditional plan to build provider-independent flows and show
  mock data for RSO-dependent screens matches Riot's documented application
  evidence options. Approval, scopes, timing, and production access remain
  unknown.

## Apex Legends Details

### Verified Facts

- Discord Game Invites can place a Join action in a text channel or profile
  only when the game implements the required Discord capability and the
  current session is inviteable.
- No current public first-party EA, Apex, or Discord material reviewed here
  identifies Apex as supporting that Discord Join capability.
- Discord's experimental LFG Channels currently document only ARC Raiders as a
  supported game and cannot presently be requested for another server.
- EA's current Apex FAQ says users search for and add a friend, then initiate a
  game invite from the friends menu.
- The same FAQ offers a shareable join code for a Private Match. It is not an
  ordinary party, and a Private Battle Royale match requires at least 30
  players.

### Bounded Interpretation

- Apex Discord server membership can help users discover one another, but it
  is not evidence of a direct game-party Join action.
- On current evidence, Apex reaches an ordinary public/ranked party only
  through the owner's last-resort friend/invite path. LiveAPI Custom Match
  control and Private Match join codes do not repair that gap.
- A current-client, two-account test could discover an undocumented product
  behavior, but it would not by itself create provider permission or a stable
  integration contract. No such experiment was authorized or run.

## Exact Policy Fit For QGuard's Candidate Actions

| Candidate QGuard action | Riot / Valorant | EA / Apex | Assessment |
|---|---|---|---|
| Operate a standalone service where opted-in people find teammates and coordinate | LFG is an accepted opt-in category; the product still requires registration, auditability, and eventual QGuard-specific review | No reviewed EA term specifically prohibits external LFG coordination; no public Apex product-approval path was found | No anti-cheat conflict found for this action; Riot access governance still applies |
| Display a participant's official rank from an authorized interface | Accepted player-stat use with opt-in/RSO and production access; current public rank coverage remains incomplete | No public first-party general player-rank interface was found | Capability/access gap, not a cheating issue |
| Let a host paste an official lobby link into QGuard and let users click it | Official Valorant/Riot/Discord user-facing feature; QGuard transmission is a bounded proposed use, not a documented third-party integration contract | No equivalent ordinary-lobby link was found | No cheating conflict found; Valorant recipient behavior still needs final verification |
| Tell users to add one another and manually invite/join | Normal documented user behavior | Normal documented user behavior | Permitted-looking but high-friction fallback; no provider-policy blocker found |
| Use an undocumented endpoint, client-memory read, traffic interception, scraper, macro, or automation to control an ordinary party | Riot's Terms prohibit unauthorized programs and automation that interact with Riot Services, including interception, emulation, redirection, and memory collection | EA restricts unauthorized automated access, interface modification, interception, mining, and data extraction | Directly relevant restriction; exclude unless a provider expressly authorizes the exact method |
| Supply cheating, live tactical advantage, boosting, or matchmaking manipulation | Outside the approved QGuard concept and restricted by provider rules | Outside the approved QGuard concept and restricted by provider rules | Out of scope; it is not a reason to reject the assisted LFG flow |

This is a provider-policy fit assessment, not legal advice and not provider
approval. It deliberately avoids using unrelated anti-cheat enforcement as a
blanket objection to QGuard's external, user-mediated flow.

## Separated Record

### Owner Decisions

- Use the party-entry preference order in `DEC-016`.
- Do not treat Apex Custom/Private Match control as a solution for normal
  small-party public/ranked play.
- Keep the conditional prototype-first Valorant RSO application path described
  in `DEC-017` available when the approved flow needs it.
- Select Valorant as the initial game and require a non-friend two-account link
  test before the official lobby link becomes a dependable product capability
  (`DEC-018`).

### Verified Facts

The first-party facts above are indexed in the
[game API source ledger](game-api-source-ledger.md). The documented Valorant
lobby link and the documented Apex friend/private-match flows are distinct.

### Assumptions And Unverified Edges

- QGuard has not been approved or acknowledged by Riot.
- A non-Discord-friend and non-Riot-friend recipient has not been live-tested
  accepting a Valorant lobby link.
- No Apex-specific direct Discord Join or ordinary-lobby link is assumed merely
  from Discord's generic support documentation.
- No provider approval, future API scope, region, client state, or link lifetime
  is assumed.

### Owner Disposition After Research

Valorant is the initial game for current product planning. Its party formation
remains **provisionally viable** until the required test proves that a current
recipient who is neither the host's Riot friend nor formal Discord friend can
join the intended ordinary party through the official link. The test gates
reliance in a specification or implementation, not further product planning.
If it fails, the workflow returns to the owner before substituting another
party flow or game.

The later CS2 evidence reopens the comparison without changing this recorded
disposition. See the decision register's subsequent review note under
`DEC-018`.

### Open Questions

1. Which supported PC region, intended ordinary mode, accounts, and client
   states form the exact test packet?
2. What rank evidence or fallback is acceptable
   when the official API cannot provide exact current rank for every user?

### Deferred Work

The required link test is recorded as `DEF-001` in the
[deferred-work register](../governance/deferred-work.md) until its mode, region,
accounts, environment, and exact authorization are ready. A Riot application,
prototype, implementation, and broader game search remain unapproved future
actions rather than deferred commitments.

## Research Limits And Recheck Triggers

- No account, API key, production application, provider contact, live game
  client, network capture, reverse engineering, or automated party action was
  used.
- Recheck official feature availability and terms before game selection,
  provider application, or implementation.
- If first-party documentation later identifies Apex Discord Join or an
  ordinary-lobby code/link, reopen the Apex party assessment.
- If QGuard proposes any local-client component, route that exact data and
  control method through provider-policy, security, privacy, and owner review
  before it becomes a specification.

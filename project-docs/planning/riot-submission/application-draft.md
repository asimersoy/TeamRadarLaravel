# QGuard application text — owner-review draft

**Status:** prepared for owner review, not sent; no provider approval claimed.
**Authority:** current QGuard decisions/specifications. **Updated:** 2026-10-29.
This is reusable application text, not a claim to know the current signed-in
Developer Portal form. Review the real field labels when submission is authorized.

## Short description

QGuard is a VALORANT teammate-finding service that assembles five-player groups
using peer conduct feedback, game rank, region and a shared language. Players
coordinate in a private session, exchange a player-generated party code and rate
eligible teammates afterward. QGuard honor describes conduct; it does not estimate
game skill, calculate MMR/Elo or replace VALORANT's official rank.

## Product and user flow

We are preparing QGuard for an eventual public service, initially for adults aged
18+ playing in the EU game region, with English and Turkish interfaces. The
review walkthrough uses fictional data and is in English. It does not enroll
players or access Riot accounts.

The intended live flow is:

1. Create a QGuard account and verify email, then read the account-linking/data-
   sharing disclosure before authorizing Riot Sign On.
2. Retrieve the consenting player's latest available competitive-match tier.
   Show its provenance and ask the player to confirm or correct their current
   rank before each matchmaking entry. An observed prior tier is not guaranteed
   to be the current rank; no-match/error handling remains a live-integration
   contract, not silent permission to bypass RSO.
3. Enter solo or with QGuard friends. Assemble five eligible players, keeping
   premades intact and prioritizing similar honor, then rank and waiting time.
   All five must accept within twenty seconds.
4. Select one player to create the ordinary VALORANT party and enter its native
   party code into a structured QGuard prompt. Other members copy the code and
   join manually in the game. QGuard does not create or control the game party.
5. Coordinate through private QGuard text, check the declared roster/ranks and
   close the session through player controls. QGuard does not detect game state.
6. Submit immutable 1–10 conduct ratings for every eligible teammate before
   queueing again. Self/premade ratings are excluded. Optional communication and
   play-style feedback is private to the described player and not used in matching.
   Individual received ratings and reviewer identities are not exposed to players.

## Requested access and narrow data purpose

We seek VALORANT production API approval and the subsequent RSO setup needed to
implement the flow above. Current local functionality does not call Riot APIs.

| Intended official endpoint | Purpose after approval |
| --- | --- |
| `GET /riot/account/v1/accounts/me` with RSO authorization | Identify the consenting linked player; keep account identity distinct from QGuard login. |
| `GET /val/match/v1/matchlists/by-puuid/{puuid}` | Find that linked player's available competitive match history. |
| `GET /val/match/v1/matches/{matchId}` | Extract that player's own observed competitive tier and necessary provenance. Ignore other participants' statistics; do not store the complete response as a profile database. |

Exact OAuth scopes, token lifecycle, endpoint availability, rate-limit/backoff
handling and missing-rank behavior will be implemented and tested after access
is granted. RSO authenticates identity; it does not itself return rank. API
secrets belong on the server, never in the reviewer bundle or browser.

Before normal use, every player whose Riot-derived identity/rank is displayed
must have signed up and opted in within QGuard. Planned visibility is to the
relevant matched teammates, not an unrestricted stats directory. Historical and
cached views must obey the live consent contract too. This enforcement is planned,
not proven by fictional data isolation.

## What reviewers can verify now

The supplied guest walkthrough demonstrates signup, linking disclosure, rank
confirmation, queue/acceptance, party-code handoff, private text, history, ratings,
reports and restricted-profile concepts. It runs entirely with fictional peers
and tab-local sample state. Sample controls advance peers without requiring
five human reviewers. Admin screens contain fictional evidence, not real access.

Separately, the Laravel/PostgreSQL application implements these provider-independent
workflows and has passed automated backend and multi-account browser checks.
Normal player matchmaking remains disabled pending live Riot integration.

Real RSO, current-rank retrieval and real-game entry are not available yet.
Non-friend native-code joining is a planning assumption awaiting controlled
post-RSO tests before normal use; approval would not prove that mechanism works.
Discord, voice recording, desktop/client automation, private game APIs, overlays,
opponent scouting, store tracking and skill-rating estimation are outside this
submission scope. No such capability should be implied by the demonstration.

## Fields to complete before sending

| Field | Current disposition |
| --- | --- |
| Product | QGuard; VALORANT teammate finding / LFG |
| Operator | Owner personally; actual public name/contact not supplied |
| Product/review URL | Domain and host not selected; no public URL exists |
| Terms and Privacy Notice URLs | Await final approved policies and hosting facts |
| Product verification | Use Riot's actual challenge after application; none issued yet |
| Monetization declaration, if requested | No selected monetization plan in this packet; owner must answer the actual field rather than infer a permanent free/paid promise |

Describe the conduct-matching purpose candidly so Riot can assess it against its
skill-ranking policy. This text does not assert QGuard-specific approval. Retention,
disposal and operational claims must match the final policies; do not claim that
unimplemented deletion or live consent controls already work.

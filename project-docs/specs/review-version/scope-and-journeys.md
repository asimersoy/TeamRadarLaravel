# Scope And Journeys

**Status:** QG-REVIEW-1 draft; [packet authority](README.md). Requirements SC.
**Dependencies:** all modules. Review on owner scope, provider or release changes.

## Product Contract

- **SC-01, approved:** QGuard assembles five-player PC VALORANT Competitive
  sessions, prioritizing similar honor within game/mode/shard/language and
  eligibility constraints; rank proximity is secondary. A session may include
  multiple games. Honor describes teammate conduct, not skill or Riot MMR.
- **SC-02, approved:** accept solo and partial QGuard parties; preserve intact
  premades. Basic QGuard friendships/invitations are included. No public team
  listings or leader-approval marketplace replaces automatic formation.
- **SC-03, approved:** open registration, guest login for Riot review, real RSO
  before normal use. Build provider-independent flows with expected data first.
- **SC-04, approved:** native web text and structured host-supplied party codes.
  Non-friend entry is an explicit assumption; verify after RSO. No Discord,
  desktop app, game-client automation or native voice in this version.
- **SC-05, approved:** session history, mandatory private 1–10 honor ratings,
  optional peer descriptions and human report review. Received individual
  feedback and reviewer identities are hidden from players.

## Audiences And Access

Visitor: understand QGuard, register/sign in or enter sample review. Registered
unlinked player: finish local account setup and see the RSO availability/linking
state, but cannot use real matchmaking. Linked player: confirm rank and enter
the session loop. Matched participant: see the authorized roster/chat/history.
Cleared admin: review relevant stored case evidence. Guest reviewer: sample-only
version of those journeys, with explicitly separate reviewer access to sample
admin screens. Guest entry never creates real admin privileges.

English is the inherited development UI default, with localization-ready copy.
International intent is not approval of every age, country or public claim.
Final launch audience/retention/terms remain pre-release work; the prototype
uses neutral draft copy and invented accounts, not a published policy.

## Complete Journeys

| Journey | Sequence | Successful endpoint |
| --- | --- | --- |
| Reviewer | Landing → login guest → guided sample → rank check → queue → team/code → session end → history/rating → queue again | Understands the product without RSO or real peers |
| New account | Register → verify email → profile defaults → Riot connection/consent when available → rank check | Eligible local identity and separate linked game identity |
| Returning solo | Find match → any outstanding feedback → current rank check → ready/queue → five-person team | A QGuard session, not an automatically joined game |
| Premade | Exact-handle friendship → create party → recipient accepts → everyone confirms rank/ready → owner queues | Intact original party matched to reach five |
| Party handoff | Designated host opens VALORANT party → submits code in dedicated form → others copy/enter code → acknowledge and check account/rank | Players declare common game-party readiness; QGuard has no client sensor |
| Discrepancy | Participant reports named account/rank mismatch → other three must confirm/deny → one corroboration disbands | Explain discrepancy and offer voluntary requeue; no automatic punishment |
| Session finish | Player declares their session ended → session detail → rate eligible teammates → individual receipt | Own queue obligation complete; other players may still owe feedback |
| Return with debt | Find match → oldest unfinished session → required ratings → remaining unfinished sessions → rank check | No silent expiry, skip or bypass |
| Conduct report | Session participant opens report → selects target/category and optional context → submits → receipt | Evidence and applicable automatic exclusion; no promised sanction |
| Admin | Cleared access → inbox → case/evidence → note/mark reviewed | Audited review state; no honor rewrite or punishment |

## State And Recovery Principles

All actions distinguish pending, successful and failed states; preserve drafts
where safe and explain recovery. Socket disconnect does not mean a player left
the game. Server state is authoritative in the eventual application. A cancelled
queue may race with formation: recover the committed destination, never invent
a half-team. Old session snapshots remain unchanged when a profile/rank changes.

No-show or pre-play discrepancy disband has no played-session honor obligation.
Leaving/end-session semantics must not equate browser close with a misconduct
admission. A reported player remains able to file reports under existing rules.

## Explicit Non-Goals

Public reputation/reviewer histories, gameplay skill scoring, guaranteed conduct,
public LFG feed, recruitment/scrims, paid placement, subscriptions, uploads,
voice recording, direct messages, automatic match detection, automatic game
joining, private Riot API access, score corrections, appeals and sanctions are
outside this packet. Future study ideas are stored separately. Operational
seeding/restore is not a public product control.

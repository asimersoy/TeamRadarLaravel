# Friends, Parties And Five-Person Matching

**Status:** QG-REVIEW-1 draft. Authority: DEC-026–037/042/044/046/052/055/061/063/077/079/081/083.
**Dependencies:** identity/rank, honor, sessions and data/access. Requirements MM.

## Connections And Premades

- **MM-01, inherited:** exact QGuard-handle lookup with minimal identity;
  request/accept/decline/cancel/remove, no public account directory. Reject self,
  duplicate and unauthorized requests. Crossed requests create one friendship.
  No imported Riot/Discord friendship or inferred game/online presence.
- **MM-02:** only accepted QGuard friends receive premade invitations. Joining
  requires their action and a valid invitation, capacity and current availability.
  Show pending, declined, expired/stale, full and busy states. Removing a friend
  does not change a past session or the old premade-rating exclusion.
- **MM-03:** parties contain 1–5 players. The owner selects shard/common
  language; each member completes required feedback, rank confirmation and
  readiness. Only the owner queues the group after all are ready. Membership
  or relevant settings changes clear readiness; queued changes cancel first.
- **MM-04:** preserve whole parties; support 4+1, 3+2, 2+2+1 and five solos.
  Five already-ready players form their own session. Explain that original
  premade members cannot honor-rate one another. QGuard never sends an
  incomplete four-player group into VALORANT as if it were a full five.
- **MM-05, inherited:** idle owner departure disbands the premade; other members
  may leave. After a completed/disbanded matched session, users return to solo
  state; automatic preservation of the premade is not added here.

## Queue Eligibility And Matching

- **MM-06:** before queueing, reject any member with an active session, including
  an end-request countdown; route them to it. Then check outstanding required
  feedback, including numerically excluded submissions under DEC-079,
  account/linking, rank confirmation and current party version. A party owner
  cannot bypass another member's feedback debt. Redirect each affected player
  to their own session detail; show others only a neutral “not ready” reason
  where exposing the underlying evidence would reveal private information.
  These gates prevent multiple unfinished sessions in normal operation (DEC-077);
  another participant's missing ratings do not block a completed reviewer after
  shared session closure.
- **MM-07:** hard constraints remain five distinct eligible accounts, same game,
  mode, shard and common selected language, intact parties and no conflicting
  active membership. Candidate identities and scores are not exposed in queue.
- **MM-08, inherited priority:** choose nearby individual honor first, rank
  proximity second, then waiting order/stable tie-breaks. Do not let an average
  hide a party's high/low spread. Keep game-side eligibility separate from
  QGuard preferences; do not invent a rank gap that excludes a legal five-stack.
- **MM-09, inherited tunable defaults:** honor span starts at 20 on the 0–100
  internal scale, widens by 5 per 30 seconds to 100, and every party's wait-based
  allowance must be satisfied. Hard constraints never widen. These are prior
  accepted development values, not Riot rules or a wait-time guarantee.
- **MM-10:** matching/cancel/reconnect is atomic and idempotent. Recheck all
  member eligibility/state before reserving five participants in an offer and
  before all-five acceptance activates a session. Concurrent cancellation either
  wins, or the user recovers the canonical offer/session state.
  Never leave half a team or duplicate active membership.

## Match Acceptance — DEC-081

- **MM-11, approved:** all five proposed participants must accept within one
  server-timed 20-second window. Show each a popup/countdown. Premade readiness
  is not acceptance; nobody can accept for someone else. Five valid acceptances
  activate the shared session and trigger navigation to it.
- **MM-12, approved core failure:** a decline or deadline nonresponse prevents
  that proposed team proceeding. Stop matchmaking for declining/nonresponding
  players and their whole original premades under MM-13; return only unaffected
  fully accepted entries. No honor penalty,
  cooldown or rating debt follows from a failed pre-session offer.
- **MM-13, approved DEC-083:** any member declining or missing the deadline
  stops the entire original premade, including its acceptors. Preserve membership;
  do not split, eject or disband. Return only solos who accepted and other
  premades whose every member accepted. Evaluate every original queue entry
  separately; multiple failed premades each stop. A stopped party needs a new
  deliberate queue attempt. Apply all outcomes exactly once and atomically.
- **MM-14, technical requirements:** persist offer membership, the common
  deadline, each response and one terminal result. Deduplicate retries; reject
  stale/late responses; prevent concurrent offer/queue/session membership.
  Server timeout continues through browser disconnect. Specify early-decline
  processing without treating not-yet-due answers as timeouts. Reconnect restores
  canonical state. Return ordering/queue-attempt continuity belongs in the
  technical contract; no new rank/API calls or wait-priority reset is selected.

## Interface And Failure States

Matchmaking owns the main action; profile/security remain separate. A compact
“Your connections” sidebar supports accepted friends and pending requests,
stacking below the task on mobile. Display party slots, who is ready, settings
and one clear Find match action. Do not present a listing feed.

Queue shows elapsed time, honest preference-widening explanation and Cancel.
Do not fabricate an ETA, live queue population or “players found” progress.
Provide empty/no-compatible-result continuation, offline/reconnect, stale party,
service unavailable/retry and already-matched recovery states. An empty queue
has no invented counterpart. Prototype formation is explicitly a sample action.

## Acceptance

**Stack-checkpoint clarification, 2026-10-28:** support realtime matching UI and
smooth system-driven navigation into the session. The owner cites a
match-acceptance popup as the intended interaction. DEC-081 now selects all five
within twenty seconds and removal/requeue outcomes. Premade failure stops that whole party under DEC-083; no automatic acceptance or extra punishment is selected. Premade
pre-queue readiness and post-match acceptance remain distinct.
The [stack assessment](../../planning/review-version/stack-review.md#dynamic-navigation-clarification--2026-10-28)
records capability evidence and required multi-client/navigation checks. This
does not claim the existing backend implements the flow. The current design
artifact demonstrates it with fictional peers under DEC-082.

Exercise whole-party combinations, no splitting, all-member feedback gates,
readiness reset, owner/non-owner actions, invitation races, duplicate/crossed
friend requests, insufficient players and oldest-entry liveness. Preserve the
prior bounded-search/concurrency requirements when writing the technical
packet, but do not choose a replacement worker/database architecture here.

Also test 5/5 before deadline, 4/5 timeout, explicit decline, multiple missing
responses, duplicate/late acceptance, reconnect with the original deadline,
accept/decline/expiry races, exactly-once return/removal and no failed-offer
feedback debt. Cover 3+2 and 2+2+1: a failed member stops their whole entry;
fully accepted independent entries return. Preserve membership, stop every
failed entry, and never duplicate a return or silently requeue a stopped party.

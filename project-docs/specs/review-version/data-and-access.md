# Logical Data, Access And Reliability

**Status:** QG-REVIEW-1 draft, stack-neutral. Authority: DEC-037/045/047/052/055/061/063/065/066/076/077/078–084.
**Dependencies:** all modules. Requirements DA. Exact physical schema follows stack review.

## Logical Records

| Record | Minimum purpose/data | Constraint |
| --- | --- | --- |
| QGuard account/profile | Internal identity, email/auth reference, public handle, shard/language defaults | Unique normalized identity; separate authority/clearance from editable profile |
| Riot connection | PUUID, display identity, consent/link state, shard, provenance/timestamps | Verified only through actual authorized provider evidence; secrets separately protected |
| Rank observation/declaration | Observed tier/match time/source/status; declared tier and confirmation version/time | Never overwrite observation with declaration; new queue attempt rechecks |
| Friendship/request and premade | Canonical pair, owner, members, invitations, readiness/settings version | Distinct users, capacity and owner checks; one active party/session per player |
| Queue entry | Whole-party/version snapshot, compatible settings, enqueue time/state | Atomic consumption/cancellation and consistent retries |
| Match offer/acceptance | Reserved proposed five, common 20-second deadline, responses and terminal outcome | All-five acceptance before session activation; removal/return once on failure; failed original premades stop intact; fully accepted other entries return |
| Session/participant | Five users, immutable original premade and display/rank/honor snapshots, participant state/times | Participation grants scoped access; later account edits do not rewrite history |
| Session end requests | Distinct participant requests, first request time/deadline, shared closed time/reason | One request per participant; three requests or five minutes close once; no client-controlled reset |
| Party-code handoff | Session/host, supplied artifact/version and status | Participant-only; no proof of game validity; no URL/API secret conflation |
| Chat/attendance/discrepancy | Actor/session, plain text or testimony, timestamps, unique operation key | Evidence separate from actual game observation; closed-state and vote constraints |
| Feedback obligation/submission | Session/author/target obligation and separate numerical eligibility; overall rating; optional nullable descriptors; finalized receipt | One immutable finalized rating per pair/session; drafts separate; no expiry/neutral fill |
| Honor state/application | Score/reference/count/version; unique input application, current-state transition and exclusion reason | Exactly once, forward only, atomic with accepted eligibility |
| Descriptor state/application | Separate communication and play-style value/reference/count; application/exclusion evidence | Honor formula per dimension; distinct eligible reviewer evidence per recipient/trait; display at three; omission changes nothing; no combined/matching score |
| Conduct report/admin review | Author/target/session/categories/context/time; cleared reviewer note/status/audit | Count reporters, not flags; report arrival never rewrites applied honor |

The prototype's fixture structure is not the physical schema. Legacy SQL tables
and old whole-session settlement are not inherited merely because they exist.
Retained evidence is distinct from the algorithm's single smoothed reference.

## Access Matrix

| Information/action | Self | Current matched teammate | Unrelated user/friend | Cleared admin |
| --- | --- | --- | --- | --- |
| Own account/email/defaults | Read/edit allowed fields | No | No | Relevant case fields, no secrets |
| Exact handle lookup | Minimal identity | Minimal identity | Minimal identity | Relevant context |
| Current honor | Own score | Match-time snapshot only | No | Relevant evidence |
| Rank/account session snapshot | Own authorized session | Same session only | No | Relevant case |
| Peer descriptor summary | Own only; each summary shown after three distinct eligible reviewers | No | No | Relevant case evidence under existing clearance |
| Received individual ratings/authors | No | No | No | Authorized case detail |
| Own sent receipt | Own | No | No | Authorized case detail |
| Chat/history | Authorized participation/lifecycle | Same boundary | No | Audited relevant case access |
| Report authors/content | Own receipt | No | No | Authorized case detail |
| Admin notes/review controls | No | No | No | Read/write, no score effect |

Apply policies to server routes, commands, queries, exports and broadcast
payloads, not just hidden UI. Do not serialize private data then hide it with
CSS. Role/actor IDs and eligibility are server derived. Logs exclude secrets,
unnecessary message text and join artifacts. Escape user text; rate limit abuse
and retain CSRF/session protections appropriate to the selected stack.

## Consistency And Recovery

- **DA-01:** queue formation/cancellation and active-participation uniqueness
  commit atomically; reconnect recovers the canonical session or waiting state.
  Reject new queue entry while the prior session is active or its
  required feedback is unfinished, even when numerical effect is excluded;
  recheck atomically at admission, reservation and session activation.
  Normal operation cannot create a second unfinished session for that player.
- **DA-02:** feedback finalization, known eligibility and one honor application
  have a consistent server order. An excluded valid submission still completes
  its obligation and retains evidence. Keep each descriptor stream separate.
  Lock shared state in stable order; record
  application identifiers. Failed jobs retry safely, never replay prior ratings.
- **DA-03:** concurrent reports and ratings preserve whichever order commits;
  no late-report rollback. A notification failure cannot undo a committed score.
- **DA-04:** server UTC governs timestamps/timeouts, local formatting only
  affects display. Current-client timers do not decide authorization.
- **DA-05:** a browser reload, second tab or direct endpoint cannot bypass
  readiness, active-session blocking, outstanding feedback or immutable submission.
- **DA-06:** persist first end-request time and the fixed five-minute deadline;
  deduplicate participant requests. Third request and expiry race toward one
  shared closure. Close chat writes/release active slots consistently, then keep
  each player's queue blocked until their own required feedback is complete.
  A notification failure or closed browser cannot prevent deadline processing.

- **DA-07:** reserve an acceptance offer atomically; do not permit concurrent
  queue/offer/session membership. Five valid acceptances before the fixed deadline
  activate one session. Failed offers remove/return once under MM-12 and the
  DEC-083 whole-premade failure rule. Late responses cannot resurrect a terminated offer.

## Retention, Guest Isolation And Later Release

Preserve DEC-047's development evidence retention until the specific DEF-012
review; do not promise unlimited public retention or silently purge history.
Current table/field inventory must be updated before real-user collection.
Provider tokens, transient UI drafts, sessions and cached artifacts have distinct
technical lifecycles; they are not permission to erase business evidence.
No new account-erasure/purge UI or policy is adopted during visual design.

Guest review uses fictional data only and never connects to live provider or
production data stores. Production credentials are never shipped to a browser.
A reset-preview control affects only this browser's synthetic fixture state.
R1a guest isolation is specified in the [execution contract](../../planning/review-version/reconciliation-and-implementation.md):
read-only HTML served by the application, tab-scoped fictional state, no business
record writes, no real actor, no network/form capability in the walkthrough.
Normal queue admission and background formation stay closed pending RSO.
This bounded contract does not approve live-provider storage or public launch.

## Acceptance

Authorization matrix tests including direct deep links and shared payloads;
cross-session isolation; immutable snapshots; idempotence/concurrency; guest/live
separation; XSS text handling; no secret logging; retry/reconnect; no-show server
time; account closure/retention constraints before real-user release. Browser
prototype tests demonstrate presentation only, never production security.

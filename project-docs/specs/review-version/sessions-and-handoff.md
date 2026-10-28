# Sessions, Party Codes And History

**Status:** QG-REVIEW-1 draft. Authority: DEC-025/039/043/045/046/052/054–058/063/067/068/076/077/079/080/081.
**Dependencies:** matching, identity, feedback, reports and data/access. Requirements SS.

## Session And Handoff

- **SS-01:** all-five acceptance under MM-11 activates a five-person session
  with immutable account,
  rank/source, honor and original-premade snapshots. “Matched” is QGuard state,
  not proof of game-party membership. Identify one human host; inherit the
  oldest queued participant plus stable tie-break default until revised.
- **SS-02:** prompt the host to open an ordinary VALORANT party and generate
  its native code. Use a dedicated input, not a required chat post. Teammates
  receive the code, Copy action and instructions to enter it in VALORANT.
  QGuard does not generate codes, call a party-control API or join for anyone.
- **SS-03:** code entry works for non-friends as the explicit DEC-068 planning
  assumption. Record “supplied by host,” not “verified lobby.” A local copy
  success is not a game-join success. Actual testing is DEF-014 after RSO.
- **SS-04, draft detail:** host may replace a mistyped/stale code through the
  same form; notify matched participants to use the updated value. Do not
  impose an invented code length/format unsupported by evidence. Trim outside
  whitespace, prohibit empty/control-character/oversized input, preserve case
  and punctuation. Technical maximum and retention are reviewed before live use.
- **SS-05:** players explicitly acknowledge joining and checking declared
  accounts/ranks. Do not auto-check a player when they copy a code, send chat
  or open the room. The host has a normal participant check too.

## Account/Rank Discrepancy

Approved: one participant raises a named mismatch; reporter and subject cannot
corroborate. Each other teammate must answer matches/does-not-match, with no
“can't verify” or skip option. One of those three confirming mismatch disbands
the QGuard team even if two disagree. Do not wait for all three once disband is
decided. Without corroboration, completion still requires the other three
answers. No participant can advance through an unresolved check.

**Approved nonresponse handling (DEC-080):** preserve the pending prompt on
refresh. Progression stays blocked until responses resolve it or the QGuard
lobby closes. No independent discrepancy timeout, default vote or new cancellation
authority. Keep SS-08's ordinary end-request action usable while the check is
blocking: three requests or five minutes from the first, or another authorized
disband, closes the lobby. Missing answers alone do not start that timer.
Retain unresolved history on closure, reject late votes and do not mark the
check cleared/confirmed. Pre-play closure creates no rating debt. Actual rank
visibility remains live evidence work, not proved by party codes.

On a corroborated mismatch, explain the account/rank discrepancy without
publishing voter identities, close code/chat writes, release active slots and
offer voluntary requeue. Do not remove anyone from VALORANT, adjust rank/honor,
create a conduct penalty or create ratings for a pre-play disband.

## Text, Attendance And End

- **SS-06:** participant-only plain-text web chat, with authorized admin case
  access explained near the composer. Reject outsider writes/reads, duplicates
  and closed-room writes. Show pending/send failure/retry and reconnect states.
  No direct messages, upload, voice, inferred game presence or Discord controls.
- **SS-07, inherited no-show:** after five minutes, all four other teammates
  may report a target not joined. Target gets 30 seconds to acknowledge; an
  acknowledgment cancels removal. Otherwise disband QGuard's team and offer
  requeue. Keep the known false-report limitation and DEF-008; no implicit
  client attendance evidence. An unresolved rank dispute is a separate flow.
- **SS-08, approved shared end:** the first participant's Session ended request
  starts five minutes. Three distinct participants requesting end closes the
  QGuard session immediately; otherwise timer expiry closes it. Two requests
  continue the same countdown. Count each participant once; later/repeated
  requests do not restart time. Persist the first request, deadline, distinct
  requests and one shared closure server-side (DEC-077). An end request alone
  retains active membership; it does not open ratings or unlock another queue.
  On shared closure, route to history/detail feedback. The session may span
  multiple games; this declaration is not detected game completion, an
  automatic early-leaving admission, or a command to end the VALORANT party.
- **SS-09, text lifecycle applied to shared closure:** current participants can
  continue chat during the end-request countdown. Shared closure/disband closes
  all writes; authorized history remains. Historical visibility stays limited
  to participants/cleared admins, with existing removal restrictions. Exact
  retention returns under DEF-012. No extra override or withdrawal rule is
  inferred; pre-play discrepancy and no-show closure remain separate.

## History And Feedback Routing

- **SS-10:** history lists own sessions with date/time, mode/shard, roster,
  ended/disbanded state and own feedback progress. No public session directory
  or past-player discovery/friend suggestion feature follows from this page.
- **SS-11:** a session detail page is the durable rating surface, containing
  session context, eligible targets, own submission status and report entry.
  Show disbanded-before-play and no-eligible-target states without rating debt.
- **SS-12, approved queue invariant:** Find match routes an active player back
  to their session, including during its end countdown. After closure, missing
  required ratings, including numerically excluded submissions (DEC-079),
  redirect to that session's detail; complete those before
  rank confirmation/new queue. A player cannot normally have multiple active
  sessions or unfinished feedback from more than one session (DEC-077/P-07).
  Direct history access cannot bypass the server gate. If legacy/corrupt state
  contains multiple debts, define explicit recovery in the technical slice;
  do not silently drop ratings or make backlog traversal the normal journey.
  No feedback expiry or automatic neutral input exists.

## Acceptance

Test host-only code editing, participant-only copy/view, stale versions, invalid
code recovery and clipboard failure; actual game acceptance is separate. Test
one corroboration versus two denials, excluded voters, duplicate votes, no
abstention, pending nonresponse until lobby closure, usable end requests during
the blocking prompt, late votes after closure and forbidden progress. For shared end, test
first request starts five minutes; two requests wait; third closes immediately;
expiry closes with fewer than three; duplicates/reloads/disconnects do not reset;
third-request/expiry races close once. Test active-session and own-feedback
queue gates, session history isolation and prevention of multiple unfinished
sessions. Keep no-show timing, room reconnection and removed-user access checks
separate. These are required future checks, not passed implementation evidence.

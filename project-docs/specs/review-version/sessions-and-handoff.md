# Sessions, Party Codes And History

**Status:** QG-REVIEW-1 draft. Authority: DEC-025/039/043/045/046/052/054–058/063/067/068.
**Dependencies:** matching, identity, feedback, reports and data/access. Requirements SS.

## Session And Handoff

- **SS-01:** formation creates a five-person session with immutable account,
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

**Draft recovery, needs checkpoint review:** preserve the prompt on refresh;
offer an explicit way to leave/disband an unresolved pre-play session rather
than inventing a default vote or endless forced wait. A safe timeout/cancellation
policy is an owner choice if it changes disband authority. The prototype shows
both resolved and waiting states; it does not silently approve a quorum change.
Actual rank visibility remains a live evidence item, not proved by party codes.

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
- **SS-08:** a participant's Session ended action ends their own participation
  and opens their history/detail rating page; a session may span multiple games.
  Teammates can continue. Confirm that this is a declaration, not detected game
  completion or an automatic confession of early leaving. One active slot per
  user remains; outstanding feedback may outlive that slot.
- **SS-09, inherited text lifecycle:** current participants may continue room
  chat; the ending participant's composer becomes read-only while their
  authorized history remains. Closing/disbanding the room closes all writes.
  Historical visibility remains limited to participants/cleared admins; prior
  removal restrictions remain. Exact retention returns under DEF-012.

## History And Feedback Routing

- **SS-10:** history lists own sessions with date/time, mode/shard, roster,
  ended/disbanded state and own feedback progress. No public session directory
  or past-player discovery/friend suggestion feature follows from this page.
- **SS-11:** a session detail page is the durable rating surface, containing
  session context, eligible targets, own submission status and report entry.
  Show disbanded-before-play and no-eligible-target states without rating debt.
- **SS-12, draft ordering:** Find match opens the oldest unfinished eligible
  session first. After completion, move to the next, then rank confirmation.
  Direct navigation can view any accessible history entry; it cannot bypass
  the server queue gate. No feedback expiry or automatic neutral input exists.

## Acceptance

Test host-only code editing, participant-only copy/view, stale versions, invalid
code recovery and clipboard failure; actual game acceptance is separate. Test
one corroboration versus two denials, excluded voters, duplicate votes, no
abstention, unresolved recovery and forbidden progress. Test independent player
end times, session history isolation, multiple feedback debts, no-show timing,
room reconnection and a removed outsider's direct access attempts.

# Sessions, private chat and unimplemented game handoff

**Status/owner/update:** [manifest](README.md). Authority: DEC-024, DEC-035,
DEC-039, DEC-043, DEC-046, DEC-052. Dependencies: matching, feedback, data/security.
Acceptance: F06–F09, S01–S04, C01–C03.

## Session state and attendance

Creating a match commits exactly five participants and origin/rank snapshots.
The roster also displays each participant's match-time aggregate honor snapshot
beside their game rank, to authorized matched members only. This is a score
display, not received-feedback disclosure: no reviewer identities, individual
received ratings, report authors or score-update stream for teammates.
The QGuard session becomes `active`; it is not proof a game lobby exists.
Each participant has `matched`, `acknowledged`, `ended`, or `removed_no_show`
attendance, independent from feedback status. I joined is an acknowledgment,
not client observation. No need to invent a game-start API or treat socket
presence as game presence. One session can contain multiple games.

The room identifies one coordinator (oldest queued participant, stable tie-break)
as a communication aid only. Display “Game joining is not integrated.” Do not
generate, validate or advertise working Riot/Discord join links. Ordinary chat
can carry a user-entered URL without proving its destination works. Future
`GamePartyHandoff` implementations have `unavailable`, `ready`, `expired`,
`failed` states; current implementation always returns unavailable. No bot,
OAuth scope, deep-link launcher or simulated successful join is current scope.

## No-show process

After five server-measured minutes from matching, each other participant can
vote that a target has not joined. Require all four other unique participants,
not a majority. One active target request per session; repeated votes are
idempotent. No self-vote and no vote from an outsider or ended participant.
If some teammates have ended, quorum is not reduced to enable easier removal.

On unanimous votes, store a 30-second response deadline and notify the target.
An I joined response received before that deadline cancels removal and records
acknowledgment. Under the first-pass self-report rule an already-acknowledged
target cannot be removed by repeating the same no-show claim. This leaves a
known griefing opportunity; DEF-008 owns stronger evidence, not a hidden new
admin penalty or real Discord integration.

At/after the deadline, a locked transaction confirms the target has not
acknowledged and is still in the matched state of this nonclosed session,
marks them removed, disbands the QGuard session, cancels its open
votes and releases active slots still pointing to it. It does **not** kick a
player from Valorant. Other participants return to dashboard and can queue.
Browser closure is not a no-show vote or a game-leaving admission.
If the target has ended or the session has already closed, resolve the request
as stale instead of removing them from a new session. Ending is not game-join
proof; preserve the attempted no-show report for later human review.

Packet-approved first-pass handling: a no-show-disbanded session produces no numeric
honor feedback for anyone because shared play has not been established. Preserve
votes/reports for admins, close room writes and keep the disband reason. This
agent-authored edge policy was accepted in the packet review (DEC-052), not an
earlier owner selection. Never modify a different/new active session while releasing
old slots. Self-acknowledgment and deadline execution race on the same locked row.

## Session ended and room lifetime

Any participant can press Session ended, confirming they are finished with this
QGuard session; this opens their feedback screen and releases only their active
slot. Do not end other users' participation or fabricate all-player game completion.
Feedback state/deadline is owned by [feedback settlement](feedback-honor-and-reports.md).
Pressing the button alone does not start the ten-minute timer.

Room writes remain open while at least one participant is active and the
session is not disbanded/settled. Ended users can read their retained room but
cannot continue posting. All ended, settlement deadline reached or disbanding
closes writes. Settlement does not silently claim someone else ended or release
their active slot; a still-active member must end before queueing again.
This permits late-finishers after a premature first feedback, with the known
first-pass deadline limitation recorded in DEF-011.

No arbitrary inactivity timeout closes a session or invents feedback. A returning
user sees their active room and outstanding feedback separately. Removing a
no-show target revokes their room access; other original members keep read
access to retained records. No player-facing past-teammate browser is added.

## Private text contract

Only authorized current room participants may post, original non-removed
participants may read, and cleared admins may inspect stored messages through
the audited admin surface. Reauthorize HTTP reads/writes and every socket
subscription. Broadcast no message body: send session/version hints and fetch
authorized data, so an old subscription after removal cannot leak new content.

Store plain text up to 2,000 characters and sender/session/time, with a unique
client-message identifier per sender/session for retry deduplication. Escape
rendered HTML; safe http/https links may open separately without preview fetching.
Reject script URLs; no embeds/uploads, edit/delete feature or public permalink.
Message history is paginated by cursor. Apply bounded posting rate limits.

Use Reverb notifications, with authenticated polling when unavailable and full
refetch on reconnect. Explicitly distinguish Sending, Sent and Failed; retry
the same idempotency key rather than duplicating text. Database commit is the
success boundary. Tests must use multiple browser contexts and a true outsider,
not just hide buttons in a single logged-in browser.

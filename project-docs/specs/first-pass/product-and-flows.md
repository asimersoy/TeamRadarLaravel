# First-pass product and user flows

**Status/owner/update:** [manifest contract](README.md). Authority: DEC-009,
DEC-010, DEC-018, DEC-025–DEC-048. All additional UI choices below are proposed
reversible first-pass details. Acceptance: F01–F12 and X01–X04 in the
[test matrix](../../planning/first-pass/acceptance-matrix.md).

## Product boundary

QGuard helps players assemble a compatible five-player Valorant group for one
or more games. Behavioral honor influences teammate selection from the first
version; it is not skill, MMR, an official Riot rank or a guarantee of conduct.
The build must demonstrate the complete QGuard loop without external accounts.

Proposed development slice: PC, Competitive, one selected shard and common
communication language per party. English interface first, with localization-ready
labels; game-shard choices are not launch-country approvals. Do not claim real
game eligibility from declarations or a working lobby handoff. Actual joining
stays unimplemented; participants coordinate manually outside the app during
any later authorized game use. Local demonstrations use synthetic sessions.

Included: account/authentication, own profile/honor, explicit friend requests,
friend invitations to premades, solo/partial-party queueing, matched room and
private text, no-show process, participant-declared session end, optional numeric
feedback and reports, deterministic settlement, human admin report inbox.

Excluded: persistent teams, past-teammate discovery/history UI, leaderboards,
public honor/reviewer identities, direct messages, uploads/voice recording,
Discord or Steam integration, automated game join/link acquisition, client
inspection, volatility tracking, reviewer-accountability scores, punishments,
appeals/score corrections, payments, real-user launch and legacy data import.

## Flow and screen inventory

| Flow | Screens and successful result | Required non-happy paths |
| --- | --- | --- |
| F01 Account access | Register, local email verification, login, logout, password reset through development mail sink | Duplicate/invalid identity, expired token, throttling, unauthenticated route, session expiry |
| F02 Player setup | Dashboard, editable public handle/game identifier, shard/language/stated rank, own honor with baseline explanation | Missing/unknown rank, unverified source label, update while queued/session snapshot unchanged |
| F03 Friends | Exact-handle lookup, request, accept/decline/cancel/remove, friends list | Self/duplicate/crossed requests, stranger data minimization, permission failure |
| F04 Premade | Create party, invite friends, accept/decline/revoke, leave/disband, readiness and queue selections | Full/stale invitation, recipient busy, concurrent joins, owner leaves, settings reset readiness |
| F05 Queue | Ready/confirm, queue/wait/cancel, matched transition | Insufficient players, settings mismatch, double queue, cancel-versus-match race, unavailable worker |
| F06 Matched room | Five-member roster, rank source labels, designated coordinator, text, I joined | Unauthorized URL/channel, disconnected socket, replayed message, expired/closed room, game handoff unavailable |
| F07 No-show | Five-minute wait, target vote, all other votes, 30-second response, acknowledge or disband | Early/duplicate vote, self-vote, acknowledgment race, stale clock, false-accusation limitation |
| F08 End/feedback | Session ended, rate eligible teammates in three dimensions, reports, rank discrepancy, finalize/skip | Premade/self rating rejected, missing dimension, unknown observation, no response, deadline, double submit |
| F09 Settlement/requeue | Pending-feedback dashboard, deadline/final state, own refreshed honor, queue again | Already settled, late submission, retry after crash, next session before old honor settles |
| F10 Admin | Report inbox/detail, session evidence, report/rater identity, eligibility flags, mark reviewed and internal note | Unauthorized access, no cases, concurrent review, no punishment/correction buttons |
| F11 Own settings | Change local password, profile and defaults, end login session | Reauthentication failure, current-password validation, snapshots unaffected |
| F12 Operational demo | Seed fictional scenarios, inspect health and restore a backup into an isolated target | Wrong environment refuses seeding/reset, unavailable DB/worker, persistent data survives rebuild |

The admin panel is for data-cleared staff only; it is not an invitation to show
credentials. A report review state does not change honor or ratings retroactively.

## UI and accessibility contract

Use Blade/Livewire server validation and authorization for every action. Provide
clear waiting, empty, loading, error and retry states, not optimistic success
before a transaction commits. Room and feedback pages explain that QGuard cannot
observe in-game attendance/end. Countdown displays derive from server deadlines.

Use labeled inputs, keyboard-operable menus/dialogs, visible focus, readable
contrast and status text not dependent on color. Feedback controls have explicit
1–10 choices with no preselected numeric opinion; reports default to No as
requested, with rank observation offering Unknown. Explain rating dimensions
as conduct, not aim/skill. Show the averaging rule and deadline before submission.

Private means matched participants plus cleared administrators, not encrypted
from administrators. Communicate that boundary near chat/report entry. Avoid
public anti-toxicity guarantees, global availability claims and fake integrated
buttons. Responsive desktop and narrow layouts must be rendered and checked.

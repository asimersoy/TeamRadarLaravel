# Friends, parties and matchmaking

**Status/owner/update:** [manifest](README.md). Authority: DEC-026, DEC-035–037,
DEC-042, DEC-044, DEC-046. Dependencies: identity/rank, honor state, sessions and
data/security. Acceptance: F03–F05, M01–M05, X01–X02.

## Friends and premades

Basic requests support send/accept/decline/cancel/remove; acceptance creates
one symmetric relationship. Crossed requests never create duplicates. Exact
handle lookup returns only minimal identity. Only accepted friends may receive
party invitations; joining requires recipient action, capacity and availability.

Party owner selects shard/language and queues after all members are ready.
Support 1–5 members; entries with fewer than five seek other whole parties.
A complete five can form its session directly after readiness, but its original
members cannot numerically rate each other. UI explains that consequence.
A QGuard group of four may seek one more player; it never enters Valorant as
four. No unapproved permanent-team feature is created.

Owner leaving an idle premade disbands it; others return to solo state.
Leaving/changing a queued party cancels the whole entry first. Membership or
settings changes clear readiness. No forced merging/splitting of premades.
After a completed/disbanded matched session, members return individually;
automatically preserving original premades is omitted as delegated optional work.

Snapshot original premade ID per session participant, with unique solo-origin
IDs. Numeric rating is forbidden only between original co-premade members,
not everyone who happens to be site friends. Snapshot stays immutable even if
friendship/party membership changes later. Preexisting friendships alone do
not exempt unrelated players from rating/report rules.

## Compatibility versus preference

The initial target is a five-player PC Competitive session. Hard constraints:
distinct eligible accounts, same selected game/mode/shard/language, no conflicting
active membership, full size five and intact premades. Require stated rank/access
as specified in identity/rank; no real-eligibility guarantee from declarations.

Current Riot documentation permits rank disparity in full five-stacks, with
possible Ranked Rating reductions. Therefore do **not** apply the smaller-party
rank-gap prohibition to a completed QGuard five. Use the current source record
and a versioned policy object; never treat RR reduction as an impossible queue.
Show an accurate caution when that policy says the group may incur reduction.
No QGuard honor penalty follows from game RR rules.

Within actual hard constraints, prioritize nearby honor under DEC-036. Rank
closeness is a secondary tie-break, not an invented rank gap that overrides
honor or blocks a legal five-stack. Agent development defaults: honor span
starts at 20 points, widens 5 per 30 seconds up to the 100-point scale.
Require a candidate to satisfy
the allowance of **every** party in it, based on that party's wait time. These
are adjustable QGuard preferences, not invented Riot restrictions. Explain that
preferences widen while waiting. Never relax hard constraints to finish faster.

## Candidate selection and liveness

Begin with the oldest eligible waiting party as an anchor. Search a bounded set
of compatible entries for whole-party combinations totaling five. Choose by
smallest individual honor span, then smallest stated rank span, then oldest aggregate
waiting time, then stable entry IDs. Honor uses actual current committed scores;
party averages alone must not hide a high/low member spread.

Development search starts with oldest 100 entries per compatibility bucket;
if no combination exists, page forward on later ticks so a newer suitable solo
is not permanently hidden behind unsatisfiable compositions. If that anchor
cannot currently be completed, try other anchors rather than blocking the entire
bucket behind it; revisit the oldest on subsequent ticks. Bound combination
search work (initially 5,000 candidate expansions per tick), persist/resume scan
position, and distinguish budget-exhausted from no-feasible-combination.
These search limits are tunable, not authorization to relax hard rules. Test 4+1, 3+2,
2+2+1, five solos and full five. No starvation guarantee at unknown scale;
record candidate counts/latency and revisit algorithm with measured load.

Database-backed matcher lease prevents duplicate workers for a bucket, but
correctness also requires transaction locks and uniqueness, not the lease alone.
Recheck readiness, state, members and compatibility under locks immediately
before creating session/participants, consuming entries and transitioning active
slots. A concurrent cancel wins or loses atomically; never leave half a match.
On commit notify members; clients recover committed matches by polling.

## Command/data contract

Party commands: Create, Invite, AcceptInvite, Leave, ChangeSettings, Ready,
Queue, Cancel. Server derives actor/party ownership; a client-supplied user ID
cannot queue someone else. Queue entry stores roster/version/time/settings;
session stores independent immutable participant/origin snapshots. Include each
participant's committed honor at matching for the matched-team roster (DEC-052),
alongside the rank snapshot; do not expose underlying feedback or raters.

`active_participations` has a unique user key and exactly one current party or
session destination. All memberships, cancellations and matching update it
transactionally. One account cannot occupy two active parties/queues/sessions.
Session ended releases that participant's active slot, while the immutable old
roster remains eligible for its pending feedback process. Outstanding settlement
does not block another queue; no provisional honor is used.

No UI reveals candidate identities/honor before a match or other users' queue
composition. Minimum necessary user-visible state: own party, elapsed wait,
preferences, cancellation and matched result. Rate-limit friend/party spam.

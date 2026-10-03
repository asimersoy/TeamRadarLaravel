# QGuard first-pass plan — brief owner review

**Status:** owner-approved for implementation with DEC-052's visibility amendment.
**Packet:** QG-FIRST-PASS-1, revision 1 + DEC-052, 2026-10-03.
You do not need to review every engineering detail. This summary and its linked
manifest identify the complete packet for the existing specification gate.

## What the first build delivers

A fresh Laravel/Blade/Livewire app in `qguard/`, with Docker, persistent PostgreSQL
and no Redis. Accounts, basic friends and partial parties lead into five-player
matching, private website chat, session-end feedback, automatic honor updates
and a human admin report inbox. Own honor is visible; matched teammates also
see each other's aggregate honor alongside game rank. Honor is not public
outside that authorized team; received-feedback authors and individual received
ratings remain hidden from players. All implemented flows receive Docker-based
backend/integration/regression and real-browser tests with synthetic accounts.

Discord, working game joins, recording, sanctions, volatility and past-teammate
discovery remain out. This is a local first build for your review, not public
launch or a claim that joining Valorant is already solved.

## Concrete choices worth noticing

1. **Initial development queue:** PC Competitive, five players, common shard
   and language. Unknown/unplaced rank waits for profile completion in this
   queue. Use truthfully labeled declared rank unless permitted official access
   is available. Riot permits mixed-rank five-stacks: once actual compatibility
   is satisfied, similar honor takes priority; rank proximity breaks ties.
   Honor preferences widen with waiting time.
2. **Report edges:** your two-person automatic invalidation rule stays intact.
   One unconfirmed early-leave allegation alone will not invalidate ratings;
   self-admitted early departure will. Premade members/early leavers may still
   report. Rank mismatch is admin evidence, not an automatic invalidation trigger.
   Late reports reach admins without reopening already-settled honor.
3. **Session edges:** feedback can be skipped; missing submissions do not count
   as neutral/negative. A no-show-disbanded session produces no numeric honor
   feedback. “I joined” stops removal, with the known abuse limitation preserved.
4. **Honor implementation:** keep your smoothed, unadjusted reference and
   deviation dampening. Start at neutral 50 on a 0–100 internal scale, with a
   smaller initial response for the first five ratings. These are tunable
   development details, not values you need to design. No volatility calculation.

These were explicit agent proposals under your delegation and are now accepted
in the packet approval, with the visibility amendment above. They do not claim
you originally designed each detail. Known first-pass risks remain, not “solved.”

## Approved work sequence

Six coherent implementation stages: environment → accounts/parties → matching →
room/chat → feedback/honor/admin → full regression/recovery and handoff. Commit
tested, self-contained stages locally; leave incomplete capabilities inaccessible.
No push, PR, deployment, provider application, persistent-data deletion or live
integration test is authorized by this packet.

DEC-052 approves **QG-FIRST-PASS-1 revision 1 + the visibility amendment** to
implement these stages within the
[specification manifest](../../specs/first-pass/README.md),
[execution plan](execution-plan.md), [engineering choices](engineering-choices.md)
and [acceptance matrix](acceptance-matrix.md). Meaningful policy/scope changes
still come back to you; reversible implementation details need not.

At completion you review the working flows, and we immediately inventory actual
stored data for the deferred retention/privacy second pass. Detailed traceability
and the original planning checks are in [decision coverage](decision-traceability.md)
and [review evidence](review-evidence.md). Implementation is now complete for this
local slice: [application acceptance results](verification-results.md),
[runnable demo guide](../../../qguard/README.md), and
[actual stored-data review](../../operations/first-build-data-inventory.md).

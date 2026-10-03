# First-pass synthetic load probe

Status: executed with integrity assertions passing on 2026-10-03; see limits below.
Owner: implementation agent. Route: canonical
experiments procedure, in addition to the approved implementation/QA route.

## Hypothesis and decision

The single-instance PostgreSQL membership fence and bounded matcher should
preserve all integrity rules for 100 synthetic queued users and ten active rooms.
Measurements inform reversible query/loop optimization and the owner’s later
capacity planning; they do not approve Redis, distributed workers or public use.

## Controls and measures

Use the same Docker/PostgreSQL build, deterministic fictional accounts, mixed
whole-party sizes, identical assertions and no real integrations. Record fixture
setup separately from matching, message and settlement wall-clock durations and
SQL query counts. Exercise cancellation plus ten independent rooms; verify exact
membership, one settlement per session, no duplicate applications and retained
evidence. Database cache/worker warmness and shared Docker Desktop resources are
confounders. This is a correctness/load probe, not a production concurrency or
internet latency benchmark; multiple browser contexts are tested separately.

The run is restricted to the positively identified disposable test DB. Stop on
integrity failure, exception, unsafe target or an excessive bounded run; preserve
output and diagnose before rerunning. No persistent-development reset, history
rewrite, public deployment, external service traffic or user-data collection.
Required acceptance assertions cannot be weakened for better timing.

## Results

Command: test Compose PHP runner `tests/Support/load-probe.php`; ten independent
PHP worker processes run `tests/Support/load-room.php` against PostgreSQL 18.6.
The final stdout reports `integrity: passed`. Setup created 50 players in ten
active solo-origin rooms plus 100 queued players in mixed 4+1, 3+2, 2+2+1,
five-solo and full-five patterns; no browser or network latency is included.

| Measurement | Observed wall time / queries |
| --- | --- |
| Fixture setup | 640.15 ms (separate, not included below) |
| Cancel and re-enter one party | 1.01 ms / 12 queries |
| 100 bounded matching ticks, including no-op residue scans | 984.30 ms / 7,788 queries |
| Ten room processes, each sending ten messages | 399.12–455.12 ms per room / 134 queries each |
| End/finalize/settle each five-player room | 230.90–307.08 ms per room / 136 queries each |

First three ticks matched 5, 8 and 3 sessions; 80 queued players were matched.
Twenty remained in intact parties of sizes 4,4,2,2,2,4,2. This residue cannot
form five without later arrivals. All original 100 users were accounted for,
matched sessions contained exactly five, ten active rooms retained ten messages
each and exactly one settlement each. Separate-process application replay and
duplicate-settlement assertions are in SettlementConcurrencyTest.

Diagnosis before rerun: initial harness import order failed before the probe;
fictional factory accounts then needed explicit synthetic labels. A too-strong
harness expectation that every 100-player mix must produce twenty teams failed.
Read-only inspection found only two-/four-person parties left, not missing users.
The corrected invariant checks matched plus waiting users, intact/unique slots
and that **no remaining size-feasible five** is starved after the bounded search.
It does not weaken required integrity or claim optimal global queue packing.

Recommendation: retain the first-pass correctness fence; this run supplies no
reason to add Redis or promise throughput. Preserve global packing/wait fairness
as a later optimization discussion, since best-current honor/rank choices can
consume the singles needed by remaining parties. Shared Docker resources, warm
DB caches and instrumented SQL counts limit generalization. Only wall time was
measured; CPU-active time and human/agent effort are not inferred.

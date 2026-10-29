# Implementation status audit

**Date:** 2026-10-29 (Europe/Istanbul). **Baseline:** `new-development`, `92a34b9`.
**Purpose:** answer the owner's explicit question about implemented queue,
matchmaking and workers before evaluating hosting. No complete-live-product claim.

## Route and scope

Mandatory entry, actual Git state, current project records and selected procedures
read. Routes: audit/reconciliation, product planning; local interruption/recovery
and environment operations when the runtime check found a stale scheduler mutex.
Authority: existing local implementation authorization, DEC-085/092 and new
DEC-094. No delegation, new game integration, product-rule change or deployment.
Initial working tree was clean. Documentation belongs to the ongoing review/
hosting batch, not a commit for this single owner reply. Preserve the application,
protected portable workflow, business records and unrelated services.

## Verified implementation

| Component | Actual implementation and boundary |
| --- | --- |
| Player waiting queue | [QueueService](../../../qguard/app/Domain/Matching/QueueService.php) persists party/version/roster/queue time; checks readiness, rank confirmation, verified account, common shard/language and feedback obligations. |
| Matcher | [Matcher](../../../qguard/app/Domain/Matching/Matcher.php) searches combinations of intact parties totaling exactly five distinct eligible players. It rechecks membership/state under transaction protection. |
| Selection | Hard shard/language/mode and eligibility constraints; first minimize individual honor spread, then rank spread, then total waiting time with stable IDs. Rank proximity is a preference, not an invented maximum rank gap for a five-stack. |
| Widening | [Configuration](../../../qguard/config/matching.php): honor span starts at 20 on the internal 0–100 scale, widens by 5 each 30 seconds to 100. Every selected entry must satisfy its own allowance. |
| Search limits | Candidate pages of 100, 5,000 expansions per tick, 500 per anchor, 10 anchors. Oldest and rotating anchors plus stored cursors permit continuation. This is a bounded search, not a globally optimal result across an unlimited queue. |
| Acceptance | [MatchOffer](../../../qguard/app/Domain/Review/MatchOffer.php) persists all five responses and one 20-second server deadline. All five accepting activates the session once. Failure stops each failing original premade intact; fully accepted independent entries return to waiting. Early decline does not treat remaining players as timed out before their deadline. |
| Session | Persistent participants, host-supplied party-code relay, private chat, discrepancy handling, shared closure, mandatory immutable feedback, honor/descriptor updates and report/admin review are implemented locally. Actual VALORANT party entry is not verified by relaying a code. |
| Scheduler | [Schedule](../../../qguard/routes/console.php) invokes matching every five seconds and session deadlines every second. The retained first-pass settlement command is also registered every second; current review feedback applies immediately and does not wait for it. |
| Job worker | Database-backed Laravel jobs are processed by `queue:work`. [RoomChanged](../../../qguard/app/Events/RoomChanged.php) queues private room notifications. Player waiting entries and background jobs are different queues; matching runs from the scheduler, not one background job per waiting player. |
| Realtime | Reverb service and private room notifications exist, with authorized polling fallback. This does not establish multi-node realtime capacity or current delivery of a live game event. |

Normal production admission is deliberately absent: [ReviewVersion](../../../qguard/app/Support/ReviewVersion.php)
enables matching only in explicitly guarded disposable testing. Both engine
switches are false in the current preview. Live integration must add proper
verified identity/consent/rank handling and production admission; obtaining a key
alone will not enable the product. The guest walkthrough is browser-only fictional
state, separate from the authenticated backend exercised by integration tests.

## Evidence and runtime recovery

Previously executed evidence at this baseline is in the [backend record](backend-implementation.md)
and [owner follow-up](owner-follow-up-implementation.md): 99 backend tests,
90,486 assertions; nine distinct passing browser cases across Chromium, Firefox
and WebKit, including EN/TR five-account journeys. Those journeys use real
Laravel/PostgreSQL state with fictional accounts, automatic offers, acceptance,
room/chat, closure and feedback. Existing tests cover whole-party combinations,
honor/rank ordering, widening, more than 100 candidates and concurrent cancellation/
acceptance. This audit inspected code/test evidence; it did not rerun that suite.

Fresh checks on local `qguard-test-local`:

- App, nginx, PostgreSQL, scheduler, worker, Reverb and local mail containers
  running. Process inspection confirms actual `queue:work` and `schedule:work`.
- Database reachable; no waiting parties, due offers or session closure debt.
  Normal/public admission and both matching-test switches remain false.
- Found a stale `qguard:settle` scheduler mutex: last successful heartbeat was
  17:25:08 UTC while matching and session-deadline sweeps continued around 23:56
  UTC. No settlement process was running. This affected historical first-pass
  settlement, not immediate current review feedback. Exact interruption cause
  was not established.
- Released only that stale event's cache mutex. No database reset, broad cache
  clear, service replacement or business-data edit. A first attempt to resolve
  the abstract mutex interface failed before mutation; using the inspected
  event's actual mutex instance succeeded.
- A temporary cache-only job dispatched from Tinker failed because an eval-created
  closure could not be serialized/deserialized. This was an audit-harness error,
  not a product job failure. A file-backed equivalent then ran successfully in
  the existing worker at 23:58:54 UTC. Removed only the audit's failed-job UUID
  `891cb202-672e-49b4-99ec-032e2b513694` and its temporary cache marker afterward.
- Final `qguard:status`: matching heartbeat 23:59:20 UTC, session deadlines and
  historical settlement 23:59:22 UTC on October 28 (October 29 locally); zero
  pending jobs and zero failed jobs. The current worker processed the fresh
  probe; no Riot, Discord, external email or game operation was attempted.

## Remaining work and limits

The local web engine is implemented; the entire live service is not finished.
Live RSO, subject-specific opt-in enforcement and latest available Riot-rank
retrieval remain integration work. Real-player/non-friend code tests remain
post-RSO. Hosting, domain, real email, final operator/contact/policy particulars,
deployment and provider review are still pending. Discord and client automation
remain deferred; deletion/retention work returns after RSO under DEC-092.

Scalability is not certified. [MembershipTransaction](../../../qguard/app/Domain/Parties/MembershipTransaction.php)
uses a global PostgreSQL advisory transaction lock to serialize membership
transitions; the matcher also uses a shared lease. These protect correctness but
can limit throughput. Reverb scaling is disabled in local Compose. No large-load,
multi-node or production autoscaling test has been run. More web/worker instances
alone are not evidence that every component scales without adjustment.

Before hosted operation, the operational contract and rehearsal must cover
stale scheduler-lock recovery/expiry, worker restart, advancing-heartbeat alerts,
queue latency and failed jobs. A running container alone did not detect the stale
historical sweep found here. This local recovery is not proof of automatic crash
recovery or production monitoring. Do not silently weaken mutual exclusion to
make a short lease pass a test. Hosting evaluation must account for persistent
data and scheduled/background/realtime activity alongside request-serving cost;
Laravel Cloud suitability and scale-to-zero behavior remain unresearched here.

## Completion boundary

Audit complete with the limitations above. No application source/configuration
changed. Local documentation checks passed: 129 link targets and 31 Markdown
anchors, zero failures; scoped diff/whitespace review passed. New decision/audit
records remain uncommitted for the ongoing
hosting/review batch. No push, purchase, provider message, deployment or submission.

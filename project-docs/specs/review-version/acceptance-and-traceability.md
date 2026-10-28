# Acceptance And Decision Traceability

**Status:** QG-REVIEW-1 review contract; cases below are requirements, not passed
implementation tests. Prototype results are recorded separately in the work record.

| Family | Authority / requirement | Required later application evidence |
| --- | --- | --- |
| A01 Access | DEC-066; ID-01–04 | Open signup; verification/recovery; no unlinked/guest bypass; real OAuth decline/failure and identity uniqueness |
| A02 Rank | DEC-053/055; ID-05–09 | Every entry retrieves/asks; last observed versus corrected values distinct; absent/stale data, edit/version invalidation |
| A03 Friends | DEC-037/052; MM-01/02 | Exact lookup, self/duplicate/crossed requests, recipient acceptance, stale/busy/full invitations |
| A04 Premades | DEC-037/042/052; MM-03–05 | Whole 1–5 groups, ownership/readiness/version checks, five-stack exclusions, queued changes cancel |
| A05 Queue gate | DEC-061/063/077/079; MM-06 | Every member's active session/countdown and own debt checked; prevent multiple unfinished sessions; direct endpoint/second-tab bypass rejected; no private feedback leak to party |
| A06 Matching | DEC-026/036/052/081; MM-07–14 | Honor priority, rank tie-break, wait widening without hard-rule relaxation, 4+1/3+2/2+2+1/solos/full-five, cancellation concurrency; all-five within 20 seconds, decline/nonresponse removal and others returned once; OQ-017 before premade failure handling |
| A07 Handoff | DEC-054/068; SS-01–05 | Host-only artifact/version, participant-only access/copy, truthful supplied-not-verified state; real non-friend test after RSO in DEF-014 |
| A08 Discrepancy | DEC-056–058/080; SS discrepancy | Reporter/target excluded, one of three corroborates despite two denials, mandatory response, no skip, no double disband; DEC-080 pending until resolution/closure, usable ordinary end action, no invented vote or separate response timeout |
| A09 Chat | DEC-045/046/047; SS-06 | Participant/admin access, escaped text, idempotent retries, closed room, no uploads, disconnection/recovery |
| A10 Attendance/end | DEC-039/043/052/077; SS-07–09 | Separate no-show five-minute/all-four/30-second rule unchanged; first end request starts five minutes, third distinct request or expiry closes once, no reset on duplicates/reload, no false early-leaving admission |
| A11 History | DEC-063/077; SS-10–12 | Own list/detail, immutable roster, no public discovery, single pending-session routing, no-expiry return, disband/no-target state |
| A12 Required feedback | DEC-061/063/076/077/079; FB-01–04 | Required 1–10 integer, no self/premade, no default/skip, immutable sent receipt, independent retry, excluded author still completes required cards without numerical effect before requeue |
| A13 Descriptors | DEC-061/076/078; FB-05–07 | Untouched null, touched midpoint, clear, no honor/matching effect, self-only player audience in UI and payloads, independent formula/state/count per dimension, omitted input changes nothing; OQ-014 display detail before live summaries |
| A14 Honor | DEC-027–034/065; FB-08–11 | Existing formula/scaling, reference independence, startup, late input now, no rollback, report-before/report-after, concurrent idempotence |
| A15 Reports | DEC-041/043/065; RP-01–04 | Distinct same-session reporters, category separation, ineligible reviewer can report, late evidence and private receipts |
| A16 Admin | DEC-045/047/052; RP-05–08 | Cleared-only actions and evidence, audit, note/review conflict, no score/sanction mutations |
| A17 Data/reliability | DEC-047/052/065/076/077/078–081; DA-01–07 | Authorization matrix, snapshots, transactions, logs/secrets, browser/direct-action parity, retention review before real use |
| A18 Presentation | DEC-062; design inventory | Every scoped route/state, keyboard/focus, labels, contrast, desktop/mobile overflow, honest unavailable controls |

## Prototype Review Evidence To Collect

1. Visitor → guest → rank → queue → all-five acceptance within 20 seconds →
   team/code → joined → end request →
   third request or five-minute closure → history/rate →
   requeue succeeds with synthetic data. Sample peers are not live players.
2. Find match during an active session/countdown returns to it. After closure,
   unfinished feedback returns to that single session; all
   eligible sample targets must be rated before the normal sample loop proceeds.
3. Untouched optional sliders do not become a midpoint vote; sent cards lock.
   Only the described player sees their summaries; teammate views omit them.
   Each descriptor uses separate honor-formula state; no combined score.
   Excluded authors still complete cards; numerically excluded inputs do not apply.
4. Direct routes expose auth, error, empty, connection failure, rank-unavailable,
   corrected rank, stale invitation, acceptance failure/requeue, blocking
   unanswered discrepancy until lobby closure, and disband variants for review.
5. Admin sample exposes evidence unavailable on the normal player screens and
   mark reviewed does not mutate the sample honor score.
6. Read every route at desktop and mobile sizes, check keyboard order and
   dialog escape/focus return, visible labels, layout and copy. Record failures
   and fixes rather than treating screenshots as behavioral proof.
7. Verify source scope: design and authorized R1a application changes only,
   no portable workflow edits; no external
   credentials, real player data, provider calls, remote publication or native
   game access. Record no real RSO/Discord/game tests.

**Current design reconciliation:** the saved HTML includes the revised behaviors.
[Behavior evidence](../../design/qguard-review/behavior-reconciliation/README.md)
records tests and limits. Calculator/backend requirements are not proven by
sample screens. [R1a](../../planning/review-version/reconciliation-and-implementation.md)
adds application guest entry and a server-enforced real-queue boundary.

## Remaining Approval Boundaries

DEC-082 authorizes settled slices after the completed stack/visual review;
R1a has a concrete approved-policy contract.
DEC-078/079/080 resolve the calculation/obligation/nonresponse choices. OQ-014
display details, OQ-017 premade acceptance failure and changed live-provider
policy still need dispositions for affected slices. Backend tests, provider tests, load/concurrency, actual browser auth,
security review, real-data retention and release approval cannot be replaced
by this static prototype. Known report timing and code assumptions stay explicit.

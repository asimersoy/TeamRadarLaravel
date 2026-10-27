# Acceptance And Decision Traceability

**Status:** QG-REVIEW-1 review contract; cases below are requirements, not passed
implementation tests. Prototype results are recorded separately in the work record.

| Family | Authority / requirement | Required later application evidence |
| --- | --- | --- |
| A01 Access | DEC-066; ID-01–04 | Open signup; verification/recovery; no unlinked/guest bypass; real OAuth decline/failure and identity uniqueness |
| A02 Rank | DEC-053/055; ID-05–09 | Every entry retrieves/asks; last observed versus corrected values distinct; absent/stale data, edit/version invalidation |
| A03 Friends | DEC-037/052; MM-01/02 | Exact lookup, self/duplicate/crossed requests, recipient acceptance, stale/busy/full invitations |
| A04 Premades | DEC-037/042/052; MM-03–05 | Whole 1–5 groups, ownership/readiness/version checks, five-stack exclusions, queued changes cancel |
| A05 Queue gate | DEC-061/063; MM-06 | Every member's own debt checked; direct endpoint/second-tab bypass rejected; no private feedback leak to party |
| A06 Matching | DEC-026/036/052; MM-07–10 | Honor priority, rank tie-break, wait widening without hard-rule relaxation, 4+1/3+2/2+2+1/solos/full-five, cancellation concurrency |
| A07 Handoff | DEC-054/068; SS-01–05 | Host-only artifact/version, participant-only access/copy, truthful supplied-not-verified state; real non-friend test after RSO in DEF-014 |
| A08 Discrepancy | DEC-056–058; SS discrepancy | Reporter/target excluded, one of three corroborates despite two denials, mandatory response, no skip, no double disband; P-05 before its recovery implementation |
| A09 Chat | DEC-045/046/047; SS-06 | Participant/admin access, escaped text, idempotent retries, closed room, no uploads, disconnection/recovery |
| A10 Attendance/end | DEC-039/043/052; SS-07–09 | Five-minute/all-four/30-second inherited rule, acknowledgment race, no-show exclusions; independent end declaration and no false admission |
| A11 History | DEC-063; SS-10–12 | Own list/detail, immutable roster, no public discovery, oldest-debt navigation, no-expiry return, disband/no-target state |
| A12 Required feedback | DEC-061/063; FB-01–04 | Required 1–10 integer, no self/premade, no default/skip, immutable sent receipt, independent retry, own completion before requeue |
| A13 Descriptors | DEC-061; FB-05–07 | Untouched null, touched midpoint, clear, no scoring effect, audience isolation, P-03 approved before live aggregation |
| A14 Honor | DEC-027–034/065; FB-08–11 | Existing formula/scaling, reference independence, startup, late input now, no rollback, report-before/report-after, concurrent idempotence |
| A15 Reports | DEC-041/043/065; RP-01–04 | Distinct same-session reporters, category separation, ineligible reviewer can report, late evidence and private receipts |
| A16 Admin | DEC-045/047/052; RP-05–08 | Cleared-only actions and evidence, audit, note/review conflict, no score/sanction mutations |
| A17 Data/reliability | DEC-047/052/065; DA-01–05 | Authorization matrix, snapshots, transactions, logs/secrets, browser/direct-action parity, retention review before real use |
| A18 Presentation | DEC-062; design inventory | Every scoped route/state, keyboard/focus, labels, contrast, desktop/mobile overflow, honest unavailable controls |

## Prototype Review Evidence To Collect

1. Visitor → guest → rank → queue → team/code → joined → end → history/rate →
   requeue succeeds with synthetic data. Sample peers are not live players.
2. Find match with unfinished feedback returns to the correct session; all
   eligible sample targets must be rated before the normal sample loop proceeds.
3. Untouched optional sliders do not become a midpoint vote; sent cards lock.
4. Direct routes expose auth, error, empty, connection failure, rank-unavailable,
   corrected rank, stale invitation, waiting and disband variants for review.
5. Admin sample exposes evidence unavailable on the normal player screens and
   mark reviewed does not mutate the sample honor score.
6. Read every route at desktop and mobile sizes, check keyboard order and
   dialog escape/focus return, visible labels, layout and copy. Record failures
   and fixes rather than treating screenshots as behavioral proof.
7. Verify source scope: no application or portable workflow edits; no external
   credentials, real player data, provider calls, remote publication or native
   game access. Record no real RSO/Discord/game tests.

## Remaining Approval Boundaries

The full packet/design and stack review precede actual application changes.
P-03/P-04/P-05 and any changed live-provider policy must be resolved for affected
slices. Backend tests, provider tests, load/concurrency, actual browser auth,
security review, real-data retention and release approval cannot be replaced
by this static prototype. Known report timing and code assumptions stay explicit.

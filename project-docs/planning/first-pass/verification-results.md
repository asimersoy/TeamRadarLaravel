# First-pass acceptance results

**Scope:** QG-FIRST-PASS-1 revision 1 + DEC-052, local synthetic build.
**Executor/reviewer:** primary implementation agent, 2026-10-03. This is internal
engineering verification, not independent security review or public-use approval.
The [stage record](implementation-evidence.md) preserves intermediate failures,
repairs, versions and coherent commits. This file maps the approved
[37 acceptance rows](acceptance-matrix.md) and F01–F12 to actual evidence.

## Runs and interpretation

Commands below run from `qguard/`; PHP and browsers run inside Docker, with
PostgreSQL `qguard_test` isolated from persistent development. Stop test workers
before backend resets; reset the private clock, seed fictional accounts and
restart test workers before browser checks, as documented in the app README.

| Command/check | Observed result |
| --- | --- |
| `docker compose -f compose.test.yaml run --rm php vendor/bin/pest --compact` | 57 tests, 90,263 assertions passed; includes independent-process concurrency tests |
| `docker compose -f compose.test.yaml run --rm php vendor/bin/phpunit --testsuite Unit` | 9 tests, 90,024 assertions passed; these tests are also included in Pest, not nine additional unique tests |
| `docker compose -f compose.test.yaml run --rm browser` | 13 passed: 11 Chromium checks plus Firefox and WebKit core-flow smoke checks |
| `docker compose -f compose.test.yaml run --rm browser --config=playwright.outage.config.ts party-boundaries.spec.ts settings-review.spec.ts` | 2 Chromium checks passed: invitation edges, password rotation/re-login and concurrent admin review |
| Same Recovery command with `socket-outage.spec.ts`, actual test Reverb stopped/restarted at its private phase markers | 1 passed; the same pages received messages by polling while stopped and resumed live updates after restart |
| Pinned development image, assets and production app/web image builds | Passed; production images prepared locally, never deployed |
| Composer strict validation/platform requirements, Composer locked audit and npm audit | Passed; no known advisories at this check, not proof of no vulnerabilities |
| Production non-root route/view cache checks and negative debug/test/seed checks | Passed; unsafe flags and production seeding refused |
| Persistent development probe, database restart/recreation | Original named volume and probe retained; services recovered |
| Isolated backup/restore and authenticated HTTP-kernel smoke | All 30 tables matched exactly; dashboard, restored room and feedback returned 200; source unchanged |
| [Predefined synthetic load probe](load-probe.md) | Integrity assertions passed; measured results and queue-packing limitation recorded, no production capacity claim |

The three Recovery checks run separately from the ordered 13-test default suite.
The actual socket-outage runner waits for an operator to stop/restart only test
Reverb; see its source and the runbook, rather than invoking it unattended.
No required local acceptance check was deliberately skipped. Real game/Discord
tests remain on the owner's hold and are outside this approved implementation.

## Evidence keys

Paths below are executable tests, not specifications posing as test results.

- **Identity:** [IdentityPartyTest](../../../qguard/tests/Feature/IdentityPartyTest.php).
- **Matching:** [MatchingTest](../../../qguard/tests/Feature/MatchingTest.php).
- **Session/chat:** [SessionChatTest](../../../qguard/tests/Feature/SessionChatTest.php).
- **Feedback:** [FeedbackHonorTest](../../../qguard/tests/Feature/FeedbackHonorTest.php).
- **Security:** [SecurityRegressionTest](../../../qguard/tests/Feature/SecurityRegressionTest.php),
  [FoundationTest](../../../qguard/tests/Feature/FoundationTest.php).
- **Math/safety:** [HonorCalculatorTest](../../../qguard/tests/Unit/HonorCalculatorTest.php),
  [EnvironmentSafetyTest](../../../qguard/tests/Unit/EnvironmentSafetyTest.php).
- **Races:** [party](../../../qguard/tests/Concurrency/PartyConcurrencyTest.php),
  [matching](../../../qguard/tests/Concurrency/MatcherConcurrencyTest.php),
  [attendance](../../../qguard/tests/Concurrency/AttendanceConcurrencyTest.php),
  [settlement](../../../qguard/tests/Concurrency/SettlementConcurrencyTest.php).
- **Browser:** [account/party](../../../qguard/tests/Browser/identity-party.spec.ts),
  [guards/settings](../../../qguard/tests/Browser/guards.spec.ts),
  [matching](../../../qguard/tests/Browser/matching.spec.ts),
  [chat/no-show](../../../qguard/tests/Browser/session-chat.spec.ts),
  [feedback/admin](../../../qguard/tests/Browser/z-feedback-admin.spec.ts),
  [premade/deadline](../../../qguard/tests/Browser/zq-premade-deadline.spec.ts),
  [resilience](../../../qguard/tests/Browser/zz-resilience.spec.ts),
  [engine smoke](../../../qguard/tests/Browser/engine-smoke.spec.ts),
  [responsive foundation](../../../qguard/tests/Browser/foundation.spec.ts).
- **Recovery browser:** [party edges](../../../qguard/tests/Recovery/party-boundaries.spec.ts),
  [settings/review](../../../qguard/tests/Recovery/settings-review.spec.ts),
  [real service outage](../../../qguard/tests/Recovery/socket-outage.spec.ts).
- **Operations:** [runbook](../../../qguard/OPERATIONS.md),
  [guarded table fingerprint](../../../qguard/tests/Support/database-fingerprint.php),
  [restored HTTP smoke](../../../qguard/tests/Support/restore-smoke.php),
  [actual data inventory](../../operations/first-build-data-inventory.md).

## Acceptance mapping

All rows below passed in the bounded environments above. “Review” means direct
code/schema/config/diff inspection, not an additional automated test claim.

| ID | Specific evidence |
| --- | --- |
| I01 | Identity unavailable-provider/profile-only fields; browser setup labels; no provider credentials |
| I02 | Identity unplaced/readiness gate; Matching profile cancellation; browser guards queued edit |
| I03 | Feedback discrepancy/category and invalid observation assertions; browser premade/deadline and admin evidence |
| M01 | Matching five distinct users, shard/language and five-stack rank cases; five-context browser match |
| M02 | Identity consent/crossed/stale/full cases; party and matcher races; Recovery party edges |
| M03 | Matching parameterized 4+1, 3+2, 2+2+1, five solos/full five and immutable origins; load accounting |
| M04 | Matching individual honor, rank tie, wait allowances, over-100 candidate progress and unfillable oldest; load residue inspection |
| M05 | Matcher race/unique slots; browser queued recovery and real socket outage/polling |
| S01 | Session/chat five-minute/four-voter/self/outsider/duplicate assertions; browser chat and resilience |
| S02 | Attendance race; Session/chat stale target/new active slot/no-show removal; browser acknowledgment and timed removal |
| S03 | Session/chat participant-only end; browser end/requeue and engine smoke; feedback no early score application |
| S04 | Feedback timer/deadline and skipped/missing assertions; browser premade timeout/return and early all-finalized closure |
| C01 | Session/chat authorization and private subscription; browser outsider and removed/stale participant denial |
| C02 | Session/chat retry key, escaped literal, script URLs, bounds/rate/cursor/closed rules; browser offline retry and malicious URL |
| C03 | Actual Reverb stop/restart with same-page polling/live recovery; Session/chat minimal broadcast and roster authorization review |
| R01 | Feedback self/premade/full-five/ordinary-friend and outsider cases; browser premade controls |
| R02 | Feedback distinct reporters across categories, one reporter/multiple flags, incoming still eligible, rank discrepancy excluded |
| R03 | Feedback early finalizer then reports, no premature application; browser fast rater invalidated, incoming still applied |
| R04 | Settlement deadline race; Feedback dimensions/skip/missing/late assertions; browser validation, timeout and late report |
| R05 | Feedback induced transaction failure/retry; independent settlement duplicate/overlap race and replay |
| R06 | Feedback self-admission versus single allegation, premade and invalidated-rater reports retained |
| H01 | Math zero-count/reference/startup boundary/bounds; Identity neutral state |
| H02 | Math dimension mapping/fractional state; Feedback complete three-field validation; browser scale/mean explanation |
| H03 | Math equal/allowed-distance/isolated-extreme fixtures and deterministic sequence bounds |
| H04 | Math previous raw/undampened reference/response divisor; calculator review shows aggregate state only, no history query |
| H05 | Math sustained high/low and reversal sequence tests; no admin dependency |
| H06 | Feedback canonical reviewer order independent of arrival; Math changing canonical order can differ |
| H07 | Settlement independent processes, fixed parameters and exact before/after audit replay |
| H08 | Math 10,000 seeded bounded inputs, invalid finite/config checks and retuning without historical inputs |
| X01 | Identity/Matching/Security/Feedback authorization and immutable snapshots; browser outsider/admin/feedback views; minimal serialization review |
| X02 | Security spoofing/seed guards/throttles; browser CSRF, session expiry, password rotation and signed verification |
| X03 | Security retained business rows; Feedback retained evidence after settlement; actual table/field/copy inventory |
| X04 | Baseline-to-final path diff; production build/file/flag checks; Compose isolation, unavailable handoff and no Redis service |
| T01 | Locked fresh image/dependency/assets build, additive migrations, health and three-engine browser smoke |
| T02 | Named qguard-dev-postgres and s1-persistent probe survive scoped normal rebuild/recreation |
| T03 | pg_dump/pg_restore into new qguard_restore_20261003_s6; exact 30-table digests, authenticated restored pages, unchanged source |
| T04 | Math/safety target rejection, Security seeder refusals, isolated Compose inspection and development DB/worker restart recovery |

## Flow and rendered coverage

| Flow | Browser/operational evidence |
| --- | --- |
| F01 | Account/party real Mailpit verification/reset/login; guards invalid/session-expired/CSRF; Recovery expired token/duplicate/signed verification; backend login throttle |
| F02 | Guards profile/handle/unknown-rank/queued edit; matching snapshots and truthful source labels |
| F03 | Account/party friendship; premade/deadline decline/remove; Recovery cancel; backend self/duplicate/cross-account cases |
| F04 | Account/party partial group/readiness/disband; Recovery busy/full/revoked/leave/cancel; independent membership race |
| F05 | Matching and three-engine smoke; guards profile cancellation; Recovery cancellation; backend hard filters/budget and concurrent match/cancel |
| F06 | Chat/no-show literal text/offline retry; resilience polling and removed authorization; actual service outage/reconnect |
| F07 | Chat/no-show unanimous acknowledgment; resilience early vote and removal; independent exact-deadline race |
| F08 | Feedback/admin and premade/deadline finalize/skip/validation/rank reports; backend self/unknown/duplicate restrictions |
| F09 | Feedback/admin pending/settled display and changed own honor; engine end/requeue; premade timeout/return; transaction retry/replay |
| F10 | Feedback/admin review/late report; Recovery empty filter/concurrent review; backend cleared-admin-only evidence and audit |
| F11 | Guards wrong current password/handle restore; Recovery successful rotation/logout/new-password login; backend other-login revocation |
| F12 | Build, persistent probe, status heartbeats, unsafe target refusals and isolated restore described above |

Rendered desktop (1280px) and narrow (390px) landing, dashboard, room, feedback,
validation and admin-case screens were inspected. Assertions cover overflow,
keyboard skip/focus, explicit form-error association and page errors. S6 fixed
Livewire error-summary refresh, a password-rotation CSRF issue and pre-initialization
clicks exposed by WebKit; saved-confirmation and backend regressions pass.
This is not a formal accessibility audit.
Evidence screenshots live outside Git at `outputs/qguard-first-pass/s1` through
`s6` in the outer workspace; raw browser traces can contain fictional credentials
and are not public artifacts.

## Completion boundary and immediate handoff

The approved local first pass is implemented. No push, PR, deployment, real-user
collection, provider application, real game test or Discord test occurred.
The protected general workflow and legacy application remain unchanged.

Known first-pass risks remain as approved: report/no-show collusion, dishonest
acknowledgment, participant-declared end timing, no real game verification,
single-instance correctness fence, and greedy party packing rather than global
optimization. Tuning needs product observation; this synthetic run does not prove
production scale, legal compliance or real-world reputation fairness.

Next is the owner's working-flow review and immediate DEF-012 review of the
[concrete stored-data inventory](../../operations/first-build-data-inventory.md).
No retention deletion, penalty system or resumed integration is inferred.

# First-pass acceptance and regression matrix

**Status:** owner-approved criteria, application tests not run. Applies to
QG-FIRST-PASS-1 revision 1 + DEC-052; owner direction DEC-050/052.
Execution owner: implementation agent.
Each row needs actual test paths, command, result and evidence at its stage.
The [flow inventory](../../specs/first-pass/product-and-flows.md) defines F01–F12.
This table is not a completed test report.

## Fixtures and environments

All tests run in Docker. Pest feature/integration tests use PostgreSQL; pure
honor/compatibility/value validation also has PHPUnit TestCase coverage. Run the
PHPUnit-style suite directly as well as the Pest suite; no need to duplicate
identical assertions just to use two syntaxes. Browser tests use Playwright
against the containerized app and PostgreSQL, not canned HTML.

Seed fictional A–E for one match, F–J for a disjoint match, O as outsider, Z as
cleared admin, plus new/unverified/unknown-rank users and waiting parties of
sizes 1–5. Prepare varied ranks/shards/languages and honor 20/50/80, original
premade A+B, zero/few/established honor counts, pending/closed/no-show sessions,
reports before/after deadline and worker failures. Never need real game accounts.

Factories expose explicit states; deterministic clocks and fixed seeds make
failures reproducible. Browser contexts isolate at least five players plus an
outsider/admin where relevant. Test-time clock controls are inaccessible outside
testing. Synthetic credentials/keys are generated, not stored in source records.

## Browser flow coverage

Every F01–F11 flow in the product inventory must have an end-to-end happy path
and its specified validation, permission, empty/error and recovery cases. F12
adds command/infrastructure checks. Use real actions and visible assertions,
not screenshots alone. Inspect desktop and 390px-wide layouts, keyboard access,
focus, form error association, reconnect state and unexpected console errors.
Chromium covers the complete initial suite; Firefox/WebKit smoke the core
auth→room→feedback loop. A missing engine check must be reported, not passed.

## Required domain tests

| ID | Assertion/scenario | Layer and flow |
| --- | --- | --- |
| I01 | Typed Riot ID stays unverified; declared rank never becomes official after peer confirmation; unavailable provider honest | Unit, PG, browser F02 |
| I02 | Missing/unplaced profile blocked from the specified queue with useful explanation; correct setup accepted; queue-time edits cancel/re-ready | PG, browser F02/F05 |
| I03 | Rank Different/Matches/Not observed recorded; discrepancy visible to admin without automatic rank correction or score penalty | PG, browser F08/F10 |
| M01 | Correct full size, distinct users and hard shard/language/mode constraints; actual five-stack policy not small-party rule | Unit, PG, browser F05 |
| M02 | Friend request/invite duplicates and crossed requests; party capacity; double queue; concurrent join/cancel/owner leave preserve unique active slot | Independent PG processes, browser F03–F05 |
| M03 | 4+1, 3+2, 2+2+1, five solos/full five; immutable origin snapshots and intact premades; no feasible combination stays waiting | Unit, PG, browser F05 |
| M04 | Actual compatibility first, then individual honor span not averaged-away extremes; rank span only a tie-break; widening respects every party wait/hard constraints; pageable/budgeted search progresses and an unfillable oldest party does not block others | Unit, PG; tunable-clock browser F05 |
| M05 | Two matchers and cancellation race create one complete session or clean cancel; crash/retry no duplicate membership; socket miss still recovers | Independent PG processes, browser F05/F06 |
| S01 | Cannot vote before five minutes; requires all other distinct players; exactly 30-second response; outsider/self/duplicate votes rejected | PG, browser F07 |
| S02 | I joined before deadline stops removal; exact deadline race consistent; stale request cannot remove an ended/new-session user; no acknowledgment disbands QGuard only, releases correct slots, no numeric scoring | PG concurrency, browser F07 |
| S03 | Session ended opens own feedback/releases own slot, not others; multi-game session has no invented end signal; next queue uses committed honor | PG, browser F08/F09 |
| S04 | Button alone no timer; first finalized/skip starts 10 minutes; all finalized early close; no submit no timer; missed/return/late paths clear | Fake-clock PG, browser F08/F09 |
| C01 | A–E private room; F–J/O and removed target cannot read/write/subscribe, including guessed IDs and stale subscription hints | HTTP/Livewire/PG, multi-context browser F06 |
| C02 | Escaping, malicious URL rejection, length/rate limits; retry key prevents duplicate message; closed room read/write rules | PG, browser F06 |
| C03 | Reverb down/reconnect/poll recovers ordered DB messages/status; matched roster fetch includes permitted honor snapshot; broadcasts/outsider responses never leak scores or reviewer identity | Integration, browser F06 |
| R01 | No self/premade numeric rating; outsiders rejected; ordinary site friends may rate when not co-premade; full original five cannot rate each other | PG, browser F08 |
| R02 | Two reporters across categories invalidate outgoing only; one reporter with many flags insufficient; incoming remains; rank observation not counted | PG, browser F08/F10 |
| R03 | Fast rater finalized first still invalidated by timely later reports; no score applies before close; blocked/invalid inputs also excluded from raw/count | PG, browser F08/F09 |
| R04 | Deadline versus submission race; missing fields rejected; skip/missing no synthetic rating; late report admin-tagged with no retroactive scoring | PG concurrency, browser F08/F10 |
| R05 | Duplicate jobs, mid-transaction failure and retry apply every recipient once; no partial batch; process-safe locks and unique keys | PG separate connections/processes |
| R06 | Self-admitted early departure invalidates outgoing; one unconfirmed allegation does not; premades/early leavers can report; reports never recursively erased | PG, browser F08/F10 |
| H01 | Zero-count neutral50/null reference; first mapped input initializes actual reference; first five startup response, sixth established; finite bounds | PHPUnit, PG |
| H02 | Exact mapping three 1–10 dimensions; average not separate honor axes; fractional storage and display; scale conversion invariant | PHPUnit, Pest validation, PG |
| H03 | Influence =1 at equal reference, 0.5 at allowed deviation, decreasing with distance; isolated extreme may affect less than moderate | PHPUnit fixtures |
| H04 | Reference takes undampened eligible input, uses prior reference, divisor20; no last-N/volatility/history query dependence | PHPUnit, PG |
| H05 | Repeated high/low ratings adapt automatically; extreme-first then contrary sequence; no false admin dependency | PHPUnit sequence/regression |
| H06 | Same stored inputs in different arrival orders produce same canonical settlement; changing canonical order can differ and is documented | PHPUnit, PG |
| H07 | Overlapping-session settlements serialized and auditable; config version fixed for one settlement; retry/replay exact within storage tolerance | PG concurrency, regression |
| H08 | >=10,000 deterministic bounded synthetic inputs; invalid config/NaN rejected; constants adjustable without refetching old history | PHPUnit property-style/regression |
| X01 | Own current honor and matched-team honor snapshots visible beside rank; outsiders/unrelated friends/pre-match lookup cannot read scores; snapshot does not change with later feedback; received ratings/reviewer-report mappings hidden; cleared-admin full case; no secrets in HTML/JSON/socket/errors | Authorization/serialization, browser F01–F11 |
| X02 | CSRF, mass assignment/ID spoofing, auth/session expiry and throttling; no unprotected test clock, seed endpoint or admin grant | Backend security regression, browser |
| X03 | Ordinary and reported business records survive settlement; no automatic purge; inventory covers actual fields/audiences/backups | PG, inventory/schema review |
| X04 | Fresh app isolated from legacy; protected workflow untouched; disabled real integrations, Redis absence, no production debug/demo config | Diff/config/dependency review |
| T01 | Fresh Docker build, migrations/assets/health; all documented commands use qguard, not host PHP/legacy Compose; locks resolve | Docker integration and smoke browser |
| T02 | Normal image rebuild/container recreation preserves synthetic persistent-dev row and reuses original volume | Docker persistence demonstration |
| T03 | Backup restore into separate isolated target reproduces fixture data and runnable smoke flow; original untouched | Docker recovery demonstration |
| T04 | Test DB/volume/ports isolated; unsafe target reset/seed refused; retry after DB/worker interruption; no destructive startup | Negative operational tests |

## Evidence, defects and load

For each implemented flow, link test files and latest run evidence in the stage
record, including command, environment/versions, test/assertion counts, exit
status and unrun checks. Capture relevant browser screenshots/traces under outer
outputs, not credentials or uncontrolled personal data; promote a concise
tracked evidence summary. Re-run regressions after fixes and parameter changes.

Initial synthetic load probe: 100 queued users across mixed party sizes and
10 concurrently active rooms, exercising cancellation, chat and settlement.
Record elapsed matching/message/settlement times and query counts; use it to
find regressions, not promise capacity. Correctness must remain intact even
when the worker is slow. Any numeric performance budget requires an explicit
recorded development rationale, not invented expected user volume.

Required checks cannot be omitted merely because a demo works. If constrained
by tooling/access, name the failing/unrun row and stop short of completion.
Real Valorant rank, join or Discord behavior cannot be verified with fixtures;
held live tests are deliberately outside this matrix, not “passed by mock.”

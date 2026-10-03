# First-pass engineering choices and delegated edge behavior

**Status:** agent-proposed choices in QG-FIRST-PASS-1 revision 1; awaiting packet
approval. Authority to propose/select reversible details: DEC-031/032/042/044/048.
Owner policy remains in the decision register; this is not a substitute register.
Update with implementation evidence, alternatives and affected tests.

| Choice | Proposed selection and reason | Alternative / change boundary | Tests |
| --- | --- | --- | --- |
| EC01 Code/runtime | Fresh qguard/ modular monolith; supported current Laravel/PHP; no legacy reuse | Root replacement risks unrelated code; microservices add needless coordination. Major architecture/scope changes require review | T01, X04 |
| EC02 Browser/real time | Playwright multi-context tests; single Reverb plus authorized polling | Polling-only is a valid later simplification if measured; horizontal scaling/Redis needs justified review | C01–C03, F01–F11 |
| EC03 Queue shape | PC Competitive five, same selected shard/language, placed stated rank; actual game compatibility first, honor proximity next with widening; rank proximity only breaks ties | Unrated/unplaced support or public platform expansion is later scope; current exact filter defaults tunable | I02, M01–M05 |
| EC04 Rank fallback | User-entered Riot ID + declared rank and honest provenance until official access actually works | RSO identity does not alone prove current rank; provider application is separately authorized | I01–I03 |
| EC05 Parties | 1–5 players; do not automatically preserve premades after sessions | Owner explicitly delegated persistence; adding it later does not change immutable origin snapshots | F04, M02, R01 |
| EC06 Feedback completion | Optional numeric inputs; explicit skip finalizes; exact deadline refuses new numeric input | Mandatory feedback would change participation burden; late score corrections are deferred | S03–S04, R03–R05 |
| EC07 Report evidence | Self-admitted early departure ineligible; single unconfirmed accusation is not proof; all participants can report | Stronger game evidence/anti-collusion later. Do not lower distinct-reporter threshold or recursively erase reports | R02, R06 |
| EC08 Rank discrepancy | Separate admin evidence, not qualifying automatic-invalidation category | Treating it as a trigger changes the eligibility edge; seek explicit owner acceptance through packet/revision | I03, R02 |
| EC09 No-show close | Disband => no numeric feedback for that session; evidence retained | Awarding post-play numeric scores for an unestablished session is avoided; owner review item | S01–S02, R01 |
| EC10 Honor startup | Actual first input initializes reference; first five inputs have 0.05 response, then 0.10; baseline 50 | No invented baseline history; count is internal. Method/constants can be tuned with behavioral tests under existing delegation | H01–H08 |
| EC11 Within-session order | Immutable participant-ID order for eligible inputs, independent of submission order | Sequential EWMA is not commutative; batch replacement would need documented impact, not a silent optimization | H06–H07 |
| EC12 Storage | Numeric fractional state plus retained submission/calculation evidence; algorithm reads aggregate state | Evidence retention does not restore last-N scoring. Purge/public-history features not included | H04, X03, T03 |
| EC13 Privacy/lifecycle | Ended users read old room; no-show-removed lose access; minimal invalidation broadcasts | Open/persistent social chat would expand scope; public reputation forbidden | C01–C03, X01 |
| EC14 Auth/design | Framework local auth, email verification via local sink; English responsive UI; no paid component | External email/SSO/translation launch needs actual scope/access; no real external accounts needed for dev tests | F01–F02, F11, X02 |

## Reversible does not mean untested

Record the reason for changes, configuration/calculation version and affected
tests. Cosmetic, numeric calibration and implementation details can proceed
without asking the owner to choose every alternative. An observed scope/approval/
privacy/eligibility change is not made reversible merely by placing it in config.
Never relabel an agent choice as an owner decision. The brief review highlights
EC03/06–10 so the packet approval is informed without another long questionnaire.

## Assumptions and explicitly open launch work

Local synthetic-data operation, single deployment instance, no approved provider
credentials, no actual public audience/age/geography promises. If any assumption
changes, reroute affected work. Jurisdiction/retention release review, production
hosting/access, Riot registration/RSO and real Discord/game tests remain open or
held. They do not block the local first-build packet but block relying on those
capabilities or exposing the product to real users as a completed service.

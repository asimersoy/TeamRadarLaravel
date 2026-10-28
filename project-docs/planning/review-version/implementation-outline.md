# Implementation Outline After Review

**Status:** DEC-085 authorizes and the current local implementation completes
R1–R5 plus R6's local build/verification. Owner privacy, retention and launch review
is now the next checkpoint before any Riot submission. External review delivery,
R7/R8 and Discord remain gated. See [actual evidence](backend-implementation.md).
Scope: QG-REVIEW-1; no delivery dates or cost estimates approved.

| Slice | Reviewable result | Required decisions / evidence before completion |
| --- | --- | --- |
| R1 Foundations and isolated review access | Updated application shell, open local registration and isolated guest data; normal queue visibly gated on Riot linking | Stack/design approval, guest isolation/auth contract, data inventory; guest cannot touch real accounts or services |
| R2 Session history and mandatory feedback | Durable participant history, immutable per-target rating, optional nullable descriptors, outstanding-obligation queue gate | P-02/required excluded-author submission approved in DEC-076/079. DEC-077 shared closure/queue invariant plus history/data contracts; late return, premade/self exclusions, direct-action bypass and race tests |
| R3 Forward-only honor and reports | Apply eligible submissions once against current state; retain the accepted late-report race | Formula/version/migration contract, concurrent report/input ordering, exclusion evidence, no reversal or duplicate application |
| R4 Queue and session workspace | Rank confirmation fixtures, intact premades, formation, structured host code, manual roster checks and private text | DEC-080 discrepancy waiting; DEC-081 all-five/20-second acceptance with DEC-083 whole-premade failure; P-06 before live retrieval. DEC-077 shared end, membership/host authorization, separate no-show/reconnect, code-source labeling and atomic queue/session tests |
| R5 Profiles and administration | Authorized descriptor summaries and private case review without sanctions | P-01/formula approved; DEC-078 independent descriptor states; DEC-084 display at three distinct reviewers. DEC-076 self-only summaries, existing matched-team rank/honor snapshots, sparse-data protection, no individual received-rating leakage and admin audit tests |
| R6 Riot-reviewable web build | Complete guest walkthrough, clear simulated boundaries and reviewer explanation | Full browser/keyboard/responsive acceptance, security/retention review appropriate to exposed environment; separate explicit hosting/submission authorization |
| R7 Authorized live RSO/API integration | Real linking/opt-in, identity mapping and latest available ranked-match tier | Riot production approval, separate RSO client setup, exact scopes/callbacks/secrets/rate-limit/failure contract; live-provider evidence |
| R8 Controlled real-player checks | Verify non-friend ordinary party-code entry and actual account/rank visibility | DEF-014, recruited authorized players, compatible game accounts/devices and test resumption; before normal-use reliance |
| Later Discord/desktop | Separately scoped integrations after their return conditions | DEC-067 and existing deferred records; provider permission/capability evidence and owner scope approval |

## Current readiness — DEC-085

The review-version schema and real Blade/Livewire flows are implemented with
synthetic verification. The [evidence record](backend-implementation.md) and
[actual data review](../../operations/review-version-data-inventory.md) separate
completed local behavior from untested providers and unapproved public use.

P-06 is still required before live rank retrieval. RSO, ordinary non-friend
party-code checks and Discord retain their distinct milestones. No additional
major product choice is being silently delegated to finish the current local
build. Retention or launch changes selected at owner review become a separate
bounded implementation slice before the affected external use.

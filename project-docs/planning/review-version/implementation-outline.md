# Implementation Outline After Review

**Status:** dependency outline only. Not an execution authorization or substitute
for approved slice specifications. Scope: QG-REVIEW-1. No dates or cost estimates
have been approved.

| Slice | Reviewable result | Required decisions / evidence before completion |
| --- | --- | --- |
| R1 Foundations and isolated review access | Updated application shell, open local registration and isolated guest data; normal queue visibly gated on Riot linking | Stack/design approval, guest isolation/auth contract, data inventory; guest cannot touch real accounts or services |
| R2 Session history and mandatory feedback | Durable participant history, immutable per-target rating, optional nullable descriptors, outstanding-obligation queue gate | P-02/P-04 and history/data contracts; late return, premade/self exclusions, direct-action bypass and race tests |
| R3 Forward-only honor and reports | Apply eligible submissions once against current state; retain the accepted late-report race | Formula/version/migration contract, concurrent report/input ordering, exclusion evidence, no reversal or duplicate application |
| R4 Queue and session workspace | Rank confirmation fixtures, intact premades, formation, structured host code, manual roster checks and private text | P-05/P-06 as relevant; membership/host authorization, no-show/reconnect, code-source labeling, atomic queue/session tests |
| R5 Profiles and administration | Authorized descriptor summaries and private case review without sanctions | P-01/P-03, audience snapshots, sparse-data protection, no individual received-rating leakage, admin audit tests |
| R6 Riot-reviewable web build | Complete guest walkthrough, clear simulated boundaries and reviewer explanation | Full browser/keyboard/responsive acceptance, security/retention review appropriate to exposed environment; separate explicit hosting/submission authorization |
| R7 Authorized live RSO/API integration | Real linking/opt-in, identity mapping and latest available ranked-match tier | Riot production approval, separate RSO client setup, exact scopes/callbacks/secrets/rate-limit/failure contract; live-provider evidence |
| R8 Controlled real-player checks | Verify non-friend ordinary party-code entry and actual account/rank visibility | DEF-014, recruited authorized players, compatible game accounts/devices and test resumption; before normal-use reliance |
| Later Discord/desktop | Separately scoped integrations after their return conditions | DEC-067 and existing deferred records; provider permission/capability evidence and owner scope approval |

Slices are candidate rollback units, not a demand for one commit each. Split or
combine only where each committed unit remains coherent, independently usable
and safe without a subsequent commit. Coordinate schema/code compatibility;
never ship half a scoring transition or a UI-only authorization rule.

The old first-pass code contains rules deliberately superseded by this packet.
Inventory uses of settlement deadlines, skip, three-rating averages, outgoing
exclusions, old history restrictions and identity fallback before coding. Preserve
existing correct behavior and unrelated work. Data migration/retention choices
must be concrete and approved before changing persisted records.

The local HTML walkthrough is evidence about flow and presentation. It does not
perform the algorithm, network synchronization, security or persistence checks
required by these slices. The [acceptance families](../../specs/review-version/acceptance-and-traceability.md)
control those later tests.

# Decision and deferral coverage

**Status:** approved-packet reconciliation including DEC-052, 2026-10-03. Source of owner authority:
[decision register](../../governance/decisions.md), not this table. Each ID is
mapped to implementation, boundary or retained historical context. Latest
superseding decision controls; historical choices are not implemented twice.

Module shorthand: Product, Architecture, Identity, Matching, Sessions, Feedback,
Data refer to the files in the [manifest](../../specs/first-pass/README.md).
Acceptance IDs refer to the [matrix](acceptance-matrix.md).

| Decision | Current treatment | Owning module / check |
| --- | --- | --- |
| DEC-001 | Reconstruction-first completed; no repeat archaeology | Manifest/history boundary |
| DEC-002 | Fresh code, no required legacy reuse | Architecture; X04 |
| DEC-003 | General workflow separate from project records | Route/manifest; diff review |
| DEC-004 | Routed, evidence-backed work preserves unrelated state | Execution plan; all stage evidence |
| DEC-005 | Earlier repository-root project boundary superseded by DEC-006 | Nested repository/outer workspace separation |
| DEC-006 | Nested Git boundary, outer scratch/outputs/snapshots | Architecture; T01/T03 |
| DEC-007 | Single canonical package protected | X04; scoped diff |
| DEC-008 | Slice approval, coherent local commits, controlled-operation gates | Manifest/execution plan |
| DEC-009 | QGuard current name | Product/UI |
| DEC-010 | Honor is behavior, not game skill | Product/Feedback; H02 |
| DEC-011 | Feasibility-led game selection resolved by later choice | Identity; no Apex inheritance |
| DEC-012 | Extract historical intent, not old method | Architecture; X04 |
| DEC-013 | Official rank preferred; first-pass fallback later approved DEC-048 | Identity; I01–I03 |
| DEC-014 | Reconstruction sufficient | No new reconstruction stage |
| DEC-015 | Incremental decisions; packet now accepts PC for bounded development, not public platform expansion | Product/owner brief; DEC-052 |
| DEC-016 | Friendship-free game joining preferred, not implemented | Sessions; future handoff seam |
| DEC-017 | Conditional prototype/RSO route, no application submission | Identity/release gate |
| DEC-018 | Valorant selected; live link evidence before reliance | Product/Sessions; X04 |
| DEC-019 | Looking to Play rejected | Excluded, no CS2 implementation |
| DEC-020 | Desired multiperson coordination, not Steam community feature | Product/Sessions; F06 |
| DEC-021 | Human-host link alternative conditional on live pass | Sessions; unavailable adapter |
| DEC-022 | International direction, not global availability promise | Product/release boundary |
| DEC-023 | Original tests-before-choice timing refined by DEC-024 | Live hold retained, no renewed blocking questionnaire |
| DEC-024 | Replaceable game joining, Discord planning only | Sessions; X04 |
| DEC-025 | Session grouping; social exclusion narrowed by DEC-037 | Product/Matching; F03–F09 |
| DEC-026 | Honor in matching from first version | Matching; M04 |
| DEC-027 | Fixed neutral baseline, numeric scaling delegated | Feedback; H01/H02 |
| DEC-028 | Ordinary feedback can raise and lower honor | Feedback; H03/H05 |
| DEC-029 | Deviation-sensitive influence and average input | Feedback; H02/H03 |
| DEC-030 | Raw reference independent of dampening; automatic change | Feedback; H04/H05 |
| DEC-031 | Startup/count required and delegated | Feedback; H01/H05 |
| DEC-032 | Smoothed reference/divisor20, intended extreme tradeoff, tuning | Feedback; H03–H08 |
| DEC-033 | No exact history/last-N scoring; storage later DEC-047 | Feedback/Data; H04/X03 |
| DEC-034 | No volatility or reviewer-accountability metric | Product/Feedback; X04 |
| DEC-035 | Optional voice direction, real Discord later | Product; only no-Discord queue |
| DEC-036 | Game compatibility then honor closeness; widening tunable | Matching/current source nuance; M01/M04 |
| DEC-037 | Friends/premades now; original premade cannot rate itself | Matching/Feedback; M02/R01 |
| DEC-038 | Non-public reputation; matched honor exception now DEC-052 | Data; X01 |
| DEC-039 | Initial no-show/early-leaver direction | Sessions/Feedback; S01/S02/R06 |
| DEC-040 | Human inbox, no penalty tools | Feedback; F10/X04 |
| DEC-041 | Three dimensions; two distinct reporters invalidate outgoing before review | Feedback; R01–R06/H02 |
| DEC-042 | Reversible detail delegation, owner first-build review | Engineering choices/stages |
| DEC-043 | Session ended, multi-game, first finalize +10m; unanimity/I joined | Sessions/Feedback; S01–S04 |
| DEC-044 | Valorant filters researched/delegated | Identity/Matching; I02/M01/M04 |
| DEC-045 | Own honor, hidden reviewers, cleared-admin context | Data/Feedback; X01/F10 |
| DEC-046 | Native private chat, no-Discord-only first pass | Sessions; C01–C03 |
| DEC-047 | Retain first-pass records, immediate later inventory review | Data; X03/T03; DEF-012 |
| DEC-048 | Official access if available else declaration + peer mismatch | Identity; I01–I03 |
| DEC-049 | Docker dev/deploy direction; stack before plan | Architecture; T01; no deployment |
| DEC-050 | PG persistence, no Redis, Blade/Livewire; Docker backend/browser tests | Architecture/matrix; T01–T04 |
| DEC-051 | Modular normal-mode planning and brief approval before coding | Manifest/owner brief/route |
| DEC-052 | Packet approved with matched-team honor/rank display; reviewer identities still hidden | All module statuses; Data/Sessions; F06/C03/X01 |

## Deferred-work coverage

Source: [deferred register](../../governance/deferred-work.md). No item is
silently closed or implemented by this plan.

| Deferral | Packet treatment / return condition |
| --- | --- |
| DEF-001 | Valorant non-friend link live test held; joining remains unavailable |
| DEF-002 | Game-specific Discord live testing held; no fake success |
| DEF-003 | Discord private match-room lifecycle tests held; no room bot/recording |
| DEF-004 | Existing Steam non-friend communication validation remains later; no Steam integration |
| DEF-005 | Current CS2 friendship-free alternative-path tests remain later; no automatic resumption |
| DEF-006 | Volatility and reviewer-deviation ideas excluded, including hidden diagnostics |
| DEF-007 | Real Discord returns only after availability, tests and later slice approval |
| DEF-008 | Stronger no-show/participation/false-accusation checks later; risks visible now |
| DEF-009 | Punishment/correction/appeal policies and tools later; human review only now |
| DEF-010 | Past-teammate discovery/history later; basic friendship included now |
| DEF-011 | Session-end/feedback timing refinement after first-build evidence |
| DEF-012 | Actual data inventory and retention review immediately after first build |

## Reconciled conflicts

Exact last-N wording is historical after DEC-032/033; not an open scoring choice.
Startup is delegated, not an unanswered owner question. Social features are not
all deferred after DEC-037. Discord's planning direction does not authorize its
implementation after DEC-035/046. Automatic report consequences are not the
deferred penalties. Retaining business evidence under DEC-047 does not reinstate
history-based scoring or public received-feedback UI. The latest brief-review
sequence, not earlier discussion of skipping review, controls implementation entry.

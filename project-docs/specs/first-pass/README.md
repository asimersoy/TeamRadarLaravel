# QGuard first-pass specification manifest

- **Packet:** QG-FIRST-PASS-1, revision 1, 2026-10-03.
- **Status:** proposed implementation specification, awaiting owner packet review.
- **Owner:** project owner; author and implementation-detail steward: coding agent.
- **Authority:** latest owner decisions in [the register](../../governance/decisions.md),
  especially DEC-008 and DEC-025–DEC-051. A plan is not its own approval.

## Purpose and scope

Build a new QGuard application for session-based teammate grouping with honor,
basic friends/partial parties, private web chat and report-aware post-session
ratings. The first build is a local, synthetic-data development application,
not a public launch or a claim of working game/Discord integration.

| Module | Owns | Depends on |
| --- | --- | --- |
| [Product and flows](product-and-flows.md) | Scope, actors, complete screen/flow inventory | All contracts below |
| [Architecture and environments](architecture-and-environments.md) | New-code boundary, runtime, Docker, recovery | Data/security |
| [Identity and rank](identity-and-rank.md) | QGuard identity, declared fallback, provider seam | Data/security, current research |
| [Parties and matchmaking](parties-and-matchmaking.md) | Friends, immutable premades, matching, concurrency | Identity/rank, honor state, data/security |
| [Sessions and chat](sessions-chat-and-handoff.md) | Session lifecycle, no-show, private communication | Matching, feedback deadline, data/security |
| [Feedback, honor and reports](feedback-honor-and-reports.md) | Eligibility, settlement, math, admin consequences | Session roster and data/security |
| [Data and security](data-and-security.md) | Shared storage, authorization, retention, integrity | All domain modules |

These files plus the [execution plan](../../planning/first-pass/execution-plan.md),
[acceptance matrix](../../planning/first-pass/acceptance-matrix.md) and
[engineering choices](../../planning/first-pass/engineering-choices.md) constitute
the proposed implementation packet. The [brief owner review](../../planning/first-pass/README.md)
is the entry point; approval must identify this packet/revision.

## Interpretation and updates

Owner-selected behavior is marked by DEC references. Additional concrete choices
are **agent proposals under existing delegation**, not new owner decisions.
Their acceptance as part of this packet does not transfer policy authority.
Verified external facts live in the [source record](../../research/first-pass-technical-foundations.md).
Assumptions: local synthetic use, one application deployment and no available
approved Riot credentials. Recheck those at implementation entry.

Each module shares this status/owner/update contract. Update on a decision change,
provider-rule change, implementation discovery or failed acceptance. Record
impact and tests; ordinary reversible details may evolve within DEC-042, but
scope/authority/privacy/eligibility-policy changes require owner review first.
Do not silently weaken tests or convert a deferred feature into current scope.

For this slice, these specific contracts take precedence over older **agent
proposals/open-detail lists** in foundations, coordination and historical plans.
They never supersede owner decisions without a recorded decision. Those older
files retain history and future-integration context. No application behavior is
verified merely because a requirement is written here.

## Gates

1. Owner approves this named packet before S1 application implementation.
2. Each stage passes its tests/review before its coherent local commit and next stage.
3. First complete build receives owner flow review and immediate DEF-012 data review.
4. Real-user/public release, provider access, deployment and held live tests have
   separate gates; packet approval does not authorize them.

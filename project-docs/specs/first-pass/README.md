# QGuard first-pass specification manifest

- **Packet:** QG-FIRST-PASS-1, revision 1 + DEC-052, 2026-10-03.
- **Status:** owner-approved for first-pass implementation with the matched-team
  honor visibility amendment; implementation verified locally. See the
  [stage evidence](../../planning/first-pass/implementation-evidence.md).
- **Owner:** project owner; author and implementation-detail steward: coding agent.
- **Authority:** latest owner decisions in [the register](../../governance/decisions.md),
  especially DEC-008 and DEC-025–DEC-052. Owner approval is recorded in DEC-052.

## Purpose and scope

**Next-pass supersession, 2026-10-27:** `DEC-061`/`DEC-063` change feedback,
requeueing and session history; `DEC-062` requires the new product/design sequence
and stack reconsideration before application work. Follow the
[next-pass plan](../../planning/product-design-pass.md) and
[current feedback direction](../product-foundations.md#current-feedback-and-session-history-direction).
This manifest and its acceptance evidence describe the preserved first pass;
their approval does not cover these later changes or bypass the new checkpoint.

**Later owner decisions, 2026-10-23:** `DEC-054` selects structured host setup
for a future game handoff; `DEC-055` selects per-queue rank refresh/confirmation
and lobby account/rank checks with discrepancy dissolution. See the
[pending rank/lobby contract](identity-and-rank.md#subsequent-owner-direction--queue-confirmation-and-lobby-check)
and [handoff module](../coordination-and-party-handoff.md). These are approved
directions with open rules, not an implemented revision of this verified packet.
Provider access and live-test holds remain unchanged.

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
the approved implementation packet. The [brief owner review](../../planning/first-pass/README.md)
records its scope and the visibility amendment: matched teammates see aggregate
honor beside rank, without seeing feedback authors or received-rating details.

## Interpretation and updates

Owner-selected behavior is marked by DEC references. Additional concrete choices
were authored as **agent selections under existing delegation**, then accepted
as part of the packet by DEC-052. This does not transfer policy authority or
claim the owner originally designed every technical detail.
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

1. Packet approval is satisfied by DEC-052; proceed through S1 entry checks
   against revision 1 plus the recorded amendment, without another packet vote.
2. Each stage passes its tests/review before its coherent local commit and next stage.
3. First complete build receives owner flow review and immediate DEF-012 data review.
4. Real-user/public release, provider access, deployment and held live tests have
   separate gates; packet approval does not authorize them.

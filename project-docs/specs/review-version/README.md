# QGuard Review Version — Specification Packet

- **Packet:** QG-REVIEW-1, revision 2, 2026-10-28
- **Status:** owner-settled rules implemented locally under DEC-085. The
  [backend contract and verification](../../planning/review-version/backend-implementation.md)
  record actual coverage. Live provider work and owner data/release review remain
  separate; local completion does not approve external use.
- **Owner:** project owner; primary agent authors and reconciles the packet
- **Authority:** current decision register through DEC-085, especially
  DEC-052–058, DEC-061–068 and DEC-076–081; latest explicit owner instructions prevail
- **Baseline:** the implemented [first-pass suite](../first-pass/README.md)
  remains historical compatibility evidence. New sessions use review-v2; old stored
  sessions retain first-pass semantics
- **Review path:** [work record](../../planning/design-checkpoint.md), then the
  design inventory/prototype and checkpoint packet linked there

## Modules

| Module | Owns |
| --- | --- |
| [Scope and journeys](scope-and-journeys.md) | Audience, boundaries, complete user and reviewer journeys |
| [Identity and rank](identity-and-rank.md) | Open registration, guest review, RSO boundary, pre-queue confirmation |
| [Friends and matching](friends-and-matching.md) | Connections, intact premades, readiness and five-person formation |
| [Sessions and party handoff](sessions-and-handoff.md) | Native code entry, roster checks, text, attendance, session history |
| [Feedback and honor](feedback-and-honor.md) | Required immutable feedback, optional descriptions, forward-only honor |
| [Reports and admin](reports-and-admin.md) | Conduct reports, discrepancy distinction, review evidence and limits |
| [Data and access](data-and-access.md) | Logical records, access matrix, transactions, privacy and retention |
| [Acceptance and traceability](acceptance-and-traceability.md) | Requirement mapping and future test obligations |
| [Proposals for checkpoint review](proposals.md) | New design defaults and policy choices, distinct from owner decisions |

## How To Read Authority

**Approved rule** means supported by an owner decision. **Inherited default**
means an agent choice accepted in the old DEC-052 packet, retained only where
later decisions do not contradict it. **Draft detail** means a new reversible
proposal for this packet. **Owner choice pending** is never auto-approved by
silence. The prototype illustrates proposals and synthetic states; it cannot
approve policy or prove providers work.

Each module's requirement IDs identify a behavioral contract independent of
framework and database names. Stack-specific schema, transactions and worker
contracts are in the implementation record and actual storage inventory. Shared
invariants apply to every route, API action and background job; deployment remains
separately authorized.

## Supersession Map

| Earlier behavior | Review-version replacement |
| --- | --- |
| Three optional feedback dimensions and skip | One mandatory 1–10 overall honor rating; optional peer descriptors |
| Ten-minute feedback cutoff and session settlement batch | Feedback remains open; own unfinished obligations block queue; apply eligible submitted inputs immediately |
| Individual end immediately opens ratings | Shared closure after three requests or five minutes from the first; active-session and own-feedback queue gates |
| Teammate-visible descriptor summaries/arithmetic-mean proposal | Self-only player visibility; separate honor-formula state for each descriptor; display at three distinct eligible reviewers per trait |
| Unspecified acceptance and nonresponse recovery | Five acceptances in 20 seconds; failed premades stop intact; fully accepted other entries requeue; unanswered discrepancy blocks until lobby closure |
| Proposed waiver for numerically excluded authors | Required cards still submitted; preserve evidence, skip excluded numerical effects |
| No participant history | Session list/detail owns rating and later revisit |
| Late reports could prevent a pending batch | Known exclusions prevent future input; later reports never undo already applied effects |
| Declared-only local identity fallback | Normal use requires live RSO; guest review uses explicit sample data |
| Unavailable game handoff | Native code relay is the owner-authorized working assumption, validated after RSO |
| Future Discord planning in the current review milestone | No Discord implementation, simulation or replacement voice feature in version one |

The review cannot silently add a public LFG marketplace, premiums, desktop app,
new ranking factors, sanctions or voice capture. Real-user launch obligations
remain open where recorded; draft copy does not make global/legal promises.

## Completion And Approval

This packet is complete for **review** when every scoped journey, page/state,
data boundary and acceptance family is covered, with remaining consequential
questions exposed. Implementation readiness additionally needs owner decisions
on relevant proposals, design and stack, then an executable slice plan. Evidence
must distinguish source inspection, prototype interaction and real application
tests. A local HTML demonstration is not server authorization or provider QA.

# QGuard Product Foundations

- **Record type:** current modular product specification
- **Status:** partially approved; not implementation-ready
- **Decision owner:** project owner
- **Authority:** `DEC-009` through `DEC-017`
- **Created:** 2026-09-05
- **Update trigger:** product-charter, game/integration, honor, rank-source,
  permitted-use, or legacy-evidence decision
- **Implementation authority:** none

## Approved Foundations

### Product Identity

The product name is **QGuard**. TeamRadar remains an internal/historical
repository and workspace label. This specification does not authorize a
filesystem, Git remote, package, domain, or public rename.

### Central Product Concept

The honor/reliability system is QGuard's central product idea. Honor represents
teammate behavior and reliability rather than mechanical skill or rank. The
intended concept uses post-play teammate feedback and reporting to build or
correct that signal.

This foundation does not yet decide review eligibility, questions, score
formula, reviewer weighting, visibility, matching or eligibility effects,
sanctions, moderation, correction, appeal, retention, monitoring, or rollback.
It approves no public promise that QGuard prevents toxicity or guarantees safe
or compatible teammates.

### Initial Game And Integration Direction

The initial game is not selected. Apex Legends and Valorant are the first
research candidates, but another game remains possible. Selection is based on
the feasibility of delivering a working, sufficiently low-friction QGuard
experience rather than inheriting the old project's final game or architecture.
Party size follows the selected game. PC is a provisional working direction,
not an approved launch-platform boundary.

Two high-value preferred capabilities are:

1. obtain sufficiently reliable current rank through a permitted official
   server or legitimate local-client API; and
2. reduce party-formation friction by creating a party/lobby from one matched
   player's client and enabling the other matched players to join with as much
   legitimate automation as the game permits.

These capabilities are desirable but not absolute requirements. No present API
capability, access path, policy permission, or implementation method is assumed.
If current research finds them unavailable, unsupported, impermissible, or too
fragile, alternate QGuard flows return to the owner before game selection.

The initial research pass found that neither candidate publicly documents both
complete rank coverage and ordinary-party automation. Valorant is the closer
candidate through an approval-gated opt-in LFG/RSO path and a user-mediated
lobby link; Apex's documented LiveAPI lobby control is for Custom Matches. See
the [research findings](../research/game-api-feasibility-findings.md). These
facts do not select a game or approve a fallback.

For ordinary-party entry, prefer an official direct Discord join or shareable
ordinary-lobby link that avoids an in-game friend addition, then another
official friendship-free ordinary-lobby code/link, and use the documented
friend/invite/accept flow only as a fallback. A Custom Match, Private Match, or
tournament code does not satisfy the normal public/ranked-party need unless the
owner later changes the product boundary. Valorant now has an official
user-copied PC lobby-link candidate; Apex has no comparable documented feature
in the reviewed first-party material. Exact non-friend recipient prerequisites
for the Valorant link still require verification. See the focused
[party-entry and policy findings](../research/party-entry-and-policy-fit.md).

If Valorant is later selected and its approved QGuard flow requires RSO, a
provider-independent working or mostly testable prototype may use clearly
identified mock data for RSO-dependent screens when applying for production
access. This conditional path does not authorize building or publishing the
prototype, contacting Riot, submitting an application, using credentials, or
assuming approval.

### Rank Source

API-derived rank is preferred over self-declaration when the source is
permitted, sufficiently reliable, and operationally viable. Self-declaration
is a fallback, not the desired source. If approved later, declared rank must be
truthfully labelled and paired with reporting, correction, and operator
resolution for inaccurate declarations.

### Legacy Evidence Use

Legacy implementations inform current specifications through:

- the capability or user outcome they attempted;
- the behavior they demonstrably achieved;
- integration/API constraints and failure modes; and
- lessons from technically difficult or integration-specific work.

Their ordinary implementation shape, code, architecture, and technology are
not inherited. A legacy intention becomes a current requirement only through an
explicit owner decision.

### Decision And Implementation Sequence

The historical reconstruction is sufficient for redesign without an
exhaustiveness claim. Current decisions will be settled gradually in bounded,
dependency-aware discussions rather than through one bulk questionnaire. This
does not weaken the implementation gate: every specification required by a
particular implementation slice must be approved before that slice starts
unless the owner records a narrow explicit override.

Compliance with applicable law is required. The actual jurisdiction, data
obligations, and qualified-review needs remain open until the product flow,
participants, locations, data fields, recipients, and retention are concrete.

## Open Product Decisions

- The precise present-day user problem, outcome, permitted uses, prohibited
  uses, audience, and public-claim boundary.
- The acceptable response to the documented rank and party-formation gaps.
- Whether a host-copied Valorant lobby link is sufficiently low friction and
  when its non-friend acceptance edge must be verified.
- The first game, platform, region, mode, and party/user segment.
- The fallback coordination and rank flows if preferred integrations are not
  viable.
- The complete matching, honor, review, report, moderation, data, security,
  business, operational, and validation specifications.

No implementation slice is authorized by this partial foundation.

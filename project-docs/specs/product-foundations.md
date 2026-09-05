# QGuard Product Foundations

- **Record type:** current modular product specification
- **Status:** partially approved; not implementation-ready
- **Decision owner:** project owner
- **Authority:** `DEC-009` through `DEC-013`
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
Party size follows the selected game.

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

## Open Product Decisions

- Whether the historical reconstruction is now sufficient to close Gate 0.
- The precise present-day user problem, outcome, permitted uses, prohibited
  uses, audience, and public-claim boundary.
- Current official API/client capabilities and policies for Apex and Valorant.
- The first game, platform, region, mode, and party/user segment.
- The fallback coordination and rank flows if preferred integrations are not
  viable.
- The complete matching, honor, review, report, moderation, data, security,
  business, operational, and validation specifications.

No implementation slice is authorized by this partial foundation.

# QGuard Product Foundations

- **Record type:** current modular product specification
- **Status:** partially approved; not implementation-ready
- **Decision owner:** project owner
- **Authority:** `DEC-009` through `DEC-019`
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

Valorant remains the selected initial game for current QGuard product planning
under `DEC-018`; later CS2 evidence has reopened that selection for deliberate
owner comparison but has not silently replaced it.
Apex Legends was not selected because the bounded public first-party research
found no evidenced Apex path satisfying the preferred friendship-free
ordinary-party flow. This is a current feasibility-led decision, not an
inheritance from the old project. PC remains the provisional context for the
documented Valorant lobby-link candidate, not a complete approved launch-
platform, region, mode, or audience boundary.

Two high-value preferred capabilities are:

1. obtain sufficiently reliable current rank through a permitted official
   server or legitimate local-client API; and
2. reduce party-formation friction by creating a party/lobby from one matched
   player's client and enabling the other matched players to join with as much
   legitimate automation as the game permits.

These capabilities are desirable but not absolute requirements. No present API
capability, access path, policy permission, or implementation method is assumed.
If a selected capability proves unavailable, unsupported, impermissible, or too
fragile, alternate QGuard flows return to the owner before substitution.

The initial research found that neither Valorant nor Apex publicly documents both complete
rank coverage and ordinary-party automation. Valorant was selected because it
offers an approval-gated opt-in LFG/RSO path and an official user-mediated
lobby link; Apex's documented LiveAPI lobby control is for Custom Matches. See
the [research findings](../research/game-api-feasibility-findings.md).

A subsequent first-party CS2 review found feature evidence for Looking to Play,
but `DEC-019` rejects that mechanism for QGuard. Steam OpenID still provides an
official account-identity path. Research now continues only through the
separate possibility that Steam Community Group membership permits non-friend
entry into a current ordinary CS2 party. The official description of that
bridge is CS:GO-era and needs present-client verification. See the
[CS2 party-entry findings](../research/counter-strike-2-party-entry-feasibility.md)
and [Steam communication/group follow-up](../research/steam-nonfriend-communication-and-group-feasibility.md).

For ordinary-party entry, prefer an official direct Discord join or shareable
ordinary-lobby link that avoids an in-game friend addition, then another
official friendship-free ordinary-lobby code/link, and use the documented
friend/invite/accept flow only as a fallback. A Custom Match, Private Match, or
tournament code does not satisfy the normal public/ranked-party need unless the
owner later changes the product boundary. Valorant has an official user-copied
PC lobby-link candidate; `DEC-019` rejects CS2 Looking to Play; and Apex has no
comparable documented feature in the reviewed first-party material. Steam
group-chat links may solve non-friend text/voice coordination, but are not CS2
party links. A Community Group-to-CS2 lobby path remains a separate unverified
candidate. Before QGuard may depend on either game path, the applicable scoped
two-account test must pass. `DEC-018` still specifically requires the Valorant
test while its selection remains current. See the focused
[party-entry and policy findings](../research/party-entry-and-policy-fit.md).

If the approved Valorant flow requires RSO, a provider-independent working or
mostly testable prototype may use clearly identified mock data for RSO-
dependent screens when applying for production access. This conditional path
does not authorize building or publishing the prototype, contacting Riot,
submitting an application, using credentials, or assuming approval.

### Coordination And Voice Evidence

The official lobby link may be shared through a QGuard-native room or another
later-approved coordination surface. The owner has proposed that a QGuard
Discord bot might instead create temporary private text and voice rooms for
matched groups, with possible session-audio retention so an operator could
review evidence after a report.

Steam group chat is now another researched coordination proposal. It can
provide text and voice to group members and may admit non-friends through a
shareable link, subject to a behavioral test. No supported QGuard interface was
found for automatically creating or cleaning up those rooms, and Steam voice
does not provide QGuard with a documented recording or monitoring interface.

The Discord and Steam coordination options are proposals, not approved
foundations or implementation requirements. Temporary voice rooms without
recording, session recording for later report review, participant-submitted
evidence, and live or automated monitoring are separate choices. See the
[Discord coordination and voice-evidence packet](../planning/discord-coordination-and-voice-evidence-options.md).

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
- The acceptable response to the documented rank-coverage gap.
- The test result for non-friend acceptance of the official Valorant lobby
  link and the recovery path if it fails.
- The platform, region, mode, and party/user segment beyond the selected game.
- The fallback coordination and rank flows if preferred integrations are not
  viable.
- Whether Discord coordination or voice belongs in the product and whether any
  session recording is justified under a complete approved data, consent,
  moderation, security, provider-policy, and qualified-review boundary.
- The complete matching, honor, review, report, moderation, data, security,
  business, operational, and validation specifications.

No implementation slice is authorized by this partial foundation.

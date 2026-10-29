# Riot Review And RSO Access

- **Type:** dated primary-source findings, separate from owner decisions
- **Checked:** 2026-10-27; submission-preparation recheck 2026-10-29 below
- **Owner:** primary agent maintains evidence; Riot controls provider approval
- **Supports:** `DEC-066` and the [review prototype contract](../specs/review-prototype-and-access.md)
- **Method:** official Developer Portal search and documentation reads; no
  account access, credentials, application submission or provider testing

## Verified Findings

Riot accepts a testable prototype or clear mockups demonstrating signup,
login and queue flows. VALORANT personal-key applications are unsupported.
Production approval precedes RSO setup, which uses a separate OAuth client.
RSO allows identifying the consenting player through the account endpoint;
it does not itself return their rank. LFG tools require player opt-in.
[Riot: VALORANT documentation](https://developer.riotgames.com/docs/valorant)

The FAQ describes placeholder data as a way to demonstrate a product before
access is available. It rejects source repositories as a replacement for a
working application/site and explains website ownership verification.
[Riot: Developer FAQ](https://developer.riotgames.com/docs/faqs)

The general portal documents development keys, but that general description
does not establish VALORANT player-data or RSO access. Therefore record the
specific verified restriction—no VALORANT personal keys—and the production/RSO
gate, rather than claiming Riot has no development keys of any kind.
[Riot: Developer Portal](https://developer.riotgames.com/docs/portal)

## Application To QGuard

The owner chooses a guest-accessible prototype and requires RSO for normal
matchmaking. A dedicated guest button is our review design, not a specific
Riot-mandated control. Expected identity, match-data and rank-confirmation
behavior can be demonstrated with labeled fixtures before real access.

Approval, actual credentials and live integration are unverified. The reviewed
pages do not require live Discord for prototype review. The owner subsequently
defers it fully under `DEC-067` and authorizes assuming non-friend native-code
entry under `DEC-068`, with real-player validation after RSO. Those are owner
decisions, not new research findings. Nothing here proves friendship-free party
entry or authorizes private APIs. No request was sent to Riot.

## Submission-preparation recheck — 2026-10-29

Scope: current official review/access requirements for the owner's requested
[submission preparation](../planning/riot-submission/README.md). Read VALORANT,
general policies, FAQ and portal pages directly; no signed-in portal form,
provider communication or application was accessed. Earlier findings remain
dated evidence; the current operational implications are:

- [VALORANT documentation](https://developer.riotgames.com/docs/valorant): a
  testable prototype/mockup and understandable signup/login/queue flow can support
  review. LFG remains an opt-in use case; production approval precedes RSO access.
  This is not approval of QGuard's specific conduct score or party-code assumption.
- [Developer FAQ](https://developer.riotgames.com/docs/faqs): provide a website
  with Terms and Privacy Policy and complete ownership verification using the
  issued challenge. A source repository is insufficient. Missing final policy
  links/domain are real submission gaps, even with a working fictional demo.
  The FAQ describes moving new inquiries to developer support while approvals,
  rejection reasons and RSO instructions may still arrive via app messages.
- [General policies](https://developer.riotgames.com/policies/general), displayed
  update 2025-05-29: retain the prescribed non-endorsement wording, supported
  data ingestion and product registration; clearly separate conduct reputation
  from prohibited alternative skill-ranking/MMR systems.
- [Portal guide](https://developer.riotgames.com/docs/portal): the registration
  process gathers product information and ownership evidence. Actual form labels
  and any application-specific instructions must be checked when authorized.

The portable review package is an agent-selected delivery format for already
approved fictional review access. It needs no live game services or backend, but
hosting access logs still need a truthful policy based on the selected provider.
No host, spend, email operator, verification token or public policy was invented.

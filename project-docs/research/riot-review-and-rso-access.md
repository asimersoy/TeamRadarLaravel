# Riot Review And RSO Access

- **Type:** dated primary-source findings, separate from owner decisions
- **Checked:** 2026-10-27; recheck before preparing the actual application
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

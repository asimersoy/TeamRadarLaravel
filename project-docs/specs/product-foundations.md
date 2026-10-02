# QGuard Product Foundations

- **Record type:** current modular product specification
- **Status:** partially approved; not implementation-ready
- **Decision owner:** project owner
- **Authority:** `DEC-009` through `DEC-028`
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

Under `DEC-026`, honor affects matchmaking from the first version. New players
start at a common baseline; developing history should differentiate honor and
support grouping players with similar honor. Increasing honor's weight with
history is a possible mechanism raised by the owner, not a selected formula.

Under `DEC-027`, the newcomer baseline is fixed and neutral, not the measured
community average. The implementation agent chooses numeric units and equivalent
display scaling; no numeric range or baseline number is selected now. Scaling
must preserve approved meaning and matching outcomes, not silently change
behavior or introduce a visibility, label/tier or public-claim decision.

Under `DEC-028`, ordinary post-play teammate feedback can both raise and lower
honor. The mechanism, aggregation, magnitude and timing are not selected;
negative feedback does not by itself establish misconduct or select a sanction.
The separate report-review and report-effect rules remain open.

This foundation does not yet decide review eligibility, questions, score formula,
reviewer weighting, visibility, exact matching rules, eligibility restrictions, sanctions,
moderation, correction, appeal, retention, monitoring, or rollback.
It approves no public promise that QGuard prevents toxicity or guarantees safe
or compatible teammates.

### First-Version Session Scope

Under `DEC-025`, the first usable version groups players for a playing
session. Persistent-team recruitment/management, a player-facing past-teammate
history and QGuard friend requests are outside that first scope. History and
friend features are possible future ideas, not approved implementation work.

The session's duration, completion, solo/partial-party entry, detailed matching
and honor rules remain open. Excluding a social-history screen does not
decide whether session evidence must be retained for honor/reporting or for
how long. Honor's behavioral purpose and first-version matchmaking role are
approved under `DEC-010` and `DEC-026`; their detailed rules need further
discussion.

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
separate communication and party-entry alternatives. The official description
of a Community Group-to-party bridge is CS:GO-era and needs present-client
verification, but the later owner clarification does not treat persistent
Community Group membership as the desired coordination model. See the
[CS2 party-entry findings](../research/counter-strike-2-party-entry-feasibility.md)
and [Steam communication/group follow-up](../research/steam-nonfriend-communication-and-group-feasibility.md).

The owner then clarified that the requested coordination group is a multi-
person chat comparable to a group DM, with supported API, automation, or semi-
automation and link/code/OAuth entry (`DEC-020`). Discord can provide bot-
created private text/voice channels in an existing server. Valorant's host-
copied lobby link can be carried by that room or another private surface; no
current first-party evidence establishes a comparable CS2 Discord party
handoff. See the
[Discord coordination/game-join comparison](../research/discord-coordination-and-game-join-comparison.md).

For the Valorant candidate, QGuard may designate one matched human as host. The
host creates the ordinary party, obtains the official Riot lobby link, and
submits it through the selected private coordination surface; remaining matched
users click it. QGuard does not need to create or control the Riot party/link.
The copied Riot link is distinct from Riot's direct formal-Discord-friend invite
and Discord's generic game Join action. Because Riot documents sharing the link
“elsewhere,” a QGuard-native private match room may carry it; a Discord room is
not inherently required as the delivery surface. This flow is conditionally
accepted under `DEC-021`, but `DEF-001` must still verify the non-friend case,
host/recipient account-linking prerequisites, delivery-surface behavior, and
region/network conditions before reliance. Generic Discord Game Invite checks
for Valorant and CS2 remain approved in scope under `DEF-002`, but execution
is on the [2026-09-28 owner hold](../governance/deferred-work.md#owner-hold--discord-access--2026-09-28).

For ordinary-party entry, prefer an official direct Discord join or shareable
ordinary-lobby link that avoids an in-game friend addition, then another
official friendship-free ordinary-lobby code/link, and use the documented
friend/invite/accept flow only as a fallback. A Custom Match, Private Match, or
tournament code does not satisfy the normal public/ranked-party need unless the
owner later changes the product boundary. Valorant has an official user-copied
PC lobby-link candidate; `DEC-019` rejects CS2 Looking to Play; and Apex has no
comparable documented feature in the reviewed first-party material. Steam
group-chat links may solve non-friend text/voice coordination, but are not CS2
party links. The old Community Group-to-CS2 lobby path remains historical/
fallback evidence rather than the current communication route. Before QGuard
may depend on a game path, its applicable scoped test must pass. `DEF-001`
specifically gates the selected Valorant link, while `DEF-002` separately checks
generic Discord Game Invites for Valorant and CS2. See the focused
[party-entry and policy findings](../research/party-entry-and-policy-fit.md) and
[behavioral validation packet](../planning/party-entry-behavioral-validation-packet.md).

`DEC-023` established the combined
[coordination and party-entry validation program](../planning/coordination-and-party-entry-validation-program.md)
as the evidence gate. `DEC-024` now selects Discord room/voice planning before
those tests and keeps joining replaceable: a game-specific Discord Join action
is preferred if validated; the accepted alternative is a matched human sharing
the official lobby link in a private Discord text channel visible only to the
matched players. Actual game joining stays unimplemented and live tests stay
paused. The surrounding system may be specified and later implemented in
approved slices without assuming a working external integration. A documented
capability or mock result is not a behavioral pass. See the
[coordination and party-handoff module](coordination-and-party-handoff.md).

If the approved Valorant flow requires RSO, a provider-independent working or
mostly testable prototype may use clearly identified mock data for RSO-
dependent screens when applying for production access. This conditional path
does not authorize building or publishing the prototype, contacting Riot,
submitting an application, using credentials, or assuming approval.

### Coordination And Voice Evidence

Discord rooms and voice are now the approved planning direction (`DEC-024`).
The host-link alternative uses a matched-only text channel in the QGuard
Discord server. A QGuard-native link surface remains technically distinct but
is not the selected fallback in this decision. Room lifetime, attendance,
admission, permissions and operating rules remain open. Earlier session-audio
retention for report review remains an unapproved proposal, not part of the
room/voice selection.

Steam group chat is now another researched coordination proposal. It can
provide text and voice to group members and may admit non-friends through a
shareable link, subject to a behavioral test. No supported QGuard interface was
found for automatically creating or cleaning up those rooms, and Steam voice
does not provide QGuard with a documented recording or monitoring interface.
Under `DEC-020`, it is a manual fallback rather than the preferred coordination
candidate. A persistent Steam Community Group is not the desired chat object.

Current Discord research finds that one human-owned QGuard server with bot-
created private per-match text and voice channels is a supported optional
coordination design. Users can enter through constrained server invitations or
OAuth `guilds.join`, and the bot can manage permissions and channel cleanup.
Discord Group DMs more closely resemble the requested UI, but their documented
application-creation endpoint originated with deprecated GameBridge, is capped
at ten active Group DMs, and cannot contain a bot. The owner, not these findings,
selects the Discord planning direction through `DEC-024`. Data flow, detailed
implementation, membership lifecycle and recording remain unapproved. The
earlier agent recommendation of a required native coordination room is not
selected; `OQ-011` is partly resolved and now tracks the remaining detail.

### Availability Direction

QGuard is intended as a broadly international product rather than a Turkey-
only product (`DEC-022`). This is a direction, not a promise of worldwide
availability. Exact launch countries, languages, ages, provider availability,
and jurisdiction-specific obligations remain open. Discord restrictions or VPN
behavior in a location may be recorded as test variables but do not establish
legal permission, official provider support, or an approved product dependency.

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
  link, its host/recipient account-link and regional prerequisites, delivery
  through Discord versus a QGuard-like relay, and the recovery path if it fails.
- The platform, region, mode, and party/user segment beyond the selected game.
- The fallback coordination and rank flows if preferred integrations are not
  viable.
- Whether the required coordination baseline is a minimal QGuard-native match
  room, Discord-primary with native fallback, or Discord-required with regional
  handling; whether Discord voice belongs in the product; and whether any
  recording is justified under a complete approved data, consent, moderation,
  security, provider-policy, and qualified-review boundary.
- The complete matching, honor, review, report, moderation, data, security,
  business, operational, and validation specifications.

No implementation slice is authorized by this partial foundation.

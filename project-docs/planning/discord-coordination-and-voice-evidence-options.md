# QGuard Discord Coordination And Voice-Evidence Options

- **Record type:** current owner proposal and future decision packet
- **Status:** coordination feasibility researched; private-room lifecycle test
  on [owner hold](../governance/deferred-work.md#owner-hold--discord-access--2026-09-28)
  before owner selection; latest separation proposal awaits confirmation of
  its limited change to `DEC-023`; recording remains unapproved
- **Decision owner:** project owner
- **Authority:** owner proposals recorded 2026-09-05 and `DEC-020` through
  `DEC-023`; test-only authority, no product implementation authority
- **Created:** 2026-09-05
- **Update trigger:** coordination-surface, Discord, voice-data, report-evidence,
  moderation, or permitted-use decision

## Purpose

Preserve the owner's Discord-room and voice-evidence idea without treating it
as an approved feature, technical fact, provider permission, or legal
conclusion. Keep it separate from the approved Valorant lobby-link flow so a
lower-risk coordination choice does not silently authorize voice collection.

The current technical comparison is recorded in the
[Discord coordination and game-join report](../research/discord-coordination-and-game-join-comparison.md).

## Owner Proposal

Instead of, or in addition to, a QGuard-native room, QGuard could use a bot in
an official QGuard Discord server to create a temporary private coordination
area for each matched group. The area could provide text for the official
Valorant lobby link and a voice channel for the group.

The owner also raised a possible evidence model in which session voice is
available for later operator review when a participant reports a violation.
That model necessarily requires the system to capture and retain the session
audio before knowing whether a report will be filed; audio cannot be recovered
retroactively if it was never captured. “Monitor,” continuous recording,
short-lived buffering, human review, and automated speech analysis are distinct
behaviors and are not interchangeable.

The owner later clarified that the desired coordination “group” is a multi-
person conversation comparable to a one-to-one chat window expanded to the
matched team. It should be supported through API, automation, or semi-
automation and offer link, code, OAuth, or comparable participant entry. A
persistent Steam Community Group is not the intended communication object
(`DEC-020`).

The owner now confirms that this server/private-channel shape matches the
intended flow and that a Group DM is unnecessary if the server model works.
Because the owner classifies the final selection as a critical backbone
decision, that conditional preference is not itself final approval. The exact
decision and consequences are isolated in `OQ-011`.

The owner subsequently isolated the more fundamental distinction: an official
Riot lobby link is one party-entry mechanism, while a game-specific Discord
Join/Invite action is another. A Discord room does not create either mechanism.
Because Riot says the copied link may be shared “anywhere,” QGuard can carry a
host-supplied link on its own private match surface; Discord is not inherently
required as the delivery channel. Direct Riot “Invite by Discord” is documented
for formal Discord friends, while the generic Discord Join case remains an
optional behavioral test under `DEF-002`.

## Proposed Separation — 2026-09-28

**Status:** owner-stated direction plus agent planning proposal; not an approved
specification, architecture, implementation slice, or superseding decision.

**Owner-stated intent:** continue defining the system while leaving the actual
game-party integration unimplemented. Provide a Discord voice room in either
case. Prefer joining the game through Discord if that works; otherwise try the
official host-created lobby-link route. The latest request does not say that
Discord access is restored or resume the paused live tests.

### Proposed Product Boundary

| Part | Intended responsibility | Deferred or unresolved |
|---|---|---|
| QGuard match coordination | Keep the matched roster, designated host, readiness, and match lifecycle separate from how the game party is entered | Exact product behavior, host rules, and specifications remain to be approved |
| Discord room and voice | Provide the matched team with Discord voice regardless of which game-join method is eventually selected | Admission, privacy/isolation, channel lifecycle, permissions, regional availability, and live verification |
| Replaceable game-party handoff | Present the validated game-join action without making the rest of QGuard depend on one method | Discord-native Join first as a candidate; human-hosted official lobby link as the alternative; both remain unverified for nonfriends |

**Meaning of “leave it empty”:** reserve a clearly defined boundary, not a
silently broken or falsely successful join feature. In a later approved
implementation, an unconfigured handoff should explicitly report unavailable
or not yet connected. A development demonstration may simulate it only with
visible mock labeling and no real account/provider actions. Providing an
invite, clicking it, joining voice, or receiving a participant's self-report
must not be described as provider-verified game-party membership. No stack,
API contract, plugin framework, automatic verification method, or prototype
implementation is selected by this proposal.

The lobby-link alternative means the designated human creates the ordinary
game party, obtains its official link, and shares it; QGuard does not generate
Riot's link or control the game client. This is an alternative to a failed or
unavailable **game Join action**, not a remedy for being unable to access
Discord voice. Whether each player must attend voice, and what happens when a
player cannot access Discord, remain separate decisions. Voice recording,
transcription, surveillance, and report-audio retention remain unapproved.

### Approval And Evidence Boundaries

- **Confirmation requested:** make Discord voice/room provision the planning
  direction now and allow provider-independent specifications to proceed with
  party entry reserved, instead of waiting for all tests before choosing this
  direction. This would narrowly change the timing gate in `DEC-023`; record a
  new partially superseding decision only after explicit owner confirmation.
- **Not waived:** each implementation slice still needs its applicable
  approved specifications (`DEC-008`). Actual game joining and Discord room
  operation need their applicable live tests before being claimed usable.
  The existing test hold, evidence standards, and remote-action gates remain.
- **Residual risk:** if neither joining method works, the placeholder does not
  solve party formation. Return to the owner with evidence before adopting
  friendship-based joining, another game, or a different flow. No existing
  Steam/CS2 test is cancelled and no test execution order is changed here.
- **Next approval:** confirm the limited planning-direction change, not a
  release, implementation start, compulsory voice attendance, or audio capture.

### Route And Completion Boundary

- **Baseline:** clean `new-development` at `d5ea068`.
- **Route:** product planning; privacy/data boundaries; owner/external review;
  deferral/owner review; interruption/recovery; cross-record reconciliation.
  Mandatory entry and selected procedures were read; no fresh provider claim,
  new experiment, code, delegation, deployment, or external state is in scope.
- **Deliverable:** this proposal and linked pending owner question/current
  state, with no change to approved specifications or the canonical workflow.
- **Verification:** local path links across 52 project Markdown files and all
  new section-link targets passed; `git diff --check` passed; the complete
  four-file diff was reviewed. One coherent local documentation commit records
  the proposal, not product approval. No live/application tests or portable-
  workflow validator were run for this proposal-only unit. No remote action
  was performed; joining feasibility remains unverified.

## Separated Options, Not Decisions

| Option | Coordination behavior | Voice evidence | Main tradeoff |
|---|---|---|---|
| Minimal QGuard-native match room | QGuard shows roster/readiness, host instructions, and the host-supplied lobby link; full chat is a separate choice | None by default | Keeps the required flow independent of Discord server membership and regional Discord access |
| Temporary private channels in a QGuard Discord server without recording | A bot creates a matched-user text/voice area and can display the lobby link | No QGuard audio capture | Strongest documented automation model; users must join or be added to the persistent server |
| Discord application-created Group DM | OAuth-authorized users appear in a DM-like group conversation | Human participants can start a call; no bot participant | Exact UI fit, but documented endpoint originated with deprecated GameBridge, is capped at ten active Group DMs, and cannot contain bots |
| Human-created Discord Group DM with invite link | A human seeds a Group DM and a member shares its 48-hour link | Human participants can start a call | Manual creation normally starts from friends; ten-member maximum and non-friend acceptance still need a test |
| Temporary Discord room with bounded session recording | The room is created for matched users and audio is captured for a defined report window | An authorized reviewer can access the recording only under approved conditions | May improve report evidence but creates substantial consent, privacy, security, retention, moderation, and operating obligations |
| Participant-submitted evidence | Discord voice may be used, but QGuard does not record every session | A reporter may submit evidence under a later approved policy | Lower routine collection, but incomplete and potentially manipulable evidence |
| Live or automated monitoring | A person or system evaluates speech during play | May create alerts, scores, or evidence | Highest sensitivity and complexity; separate from after-report review |

No option is selected by this packet. Recording is not required merely because
Discord voice is used.

## Verified Facts

- The current repository contains no approved Discord bot, server structure,
  voice-capture design, recording storage, transcript pipeline, moderation
  procedure, or consent/notice flow.
- The legacy record treated voice monitoring as a later historical idea, not a
  current requirement. The owner's new proposal is current product input but
  does not inherit or approve any legacy implementation.
- The approved Valorant link flow needs a coordination surface for sharing the
  link, but it does not require voice collection.
- Discord's current API supports bot-created text and voice channels,
  permission overwrites, constrained server invitations, OAuth `guilds.join`
  admission, member/role management, and channel deletion inside an existing
  server.
- Discord no longer supports applications creating new servers. The viable
  server design requires one human-created and human-owned QGuard server.
- Discord documents application-created Group DMs using users' `gdm.join`
  tokens, but identifies the endpoint with the deprecated GameBridge SDK,
  limits it to ten active Group DMs, and does not permit a bot user inside a
  Group DM.
- Riot/Discord document a host-copied Valorant lobby link. No current first-
  party source reviewed establishes a comparable CS2 Discord Game Invite for
  ordinary Premier or Competitive parties.

## Assumptions Not Made

- A Discord bot is technically or contractually permitted to receive or record
  voice for QGuard's final use case.
- Every participant may lawfully consent, or that one consent model works
  across future ages and jurisdictions.
- Recording improves moderation outcomes enough to justify collecting every
  session.
- A report is true merely because audio exists, or audio alone supplies enough
  context for a sanction.
- Transcription, automated classification, live monitoring, or permanent
  storage is required.

## Required Decisions Before Research Becomes A Specification

1. Is a minimal QGuard-native private match room the required coordination and
   link-delivery baseline, with Discord text/voice optional; is Discord primary
   with a native fallback; or is Discord required with explicit regional
   handling?
2. If Discord is selected, is the supported server/private-channel model
   acceptable, or is placement in the Direct Messages list important enough to
   pursue the constrained Group DM endpoint?
3. Should users join through a short-lived server invite, consent to OAuth
   `guilds.join`, or use a combination? Does membership persist after the match?
4. Is a temporary voice channel part of the first product journey?
5. Is QGuard voice capture needed at all? If yes, is it full-session recording,
   a bounded rolling buffer, participant-triggered capture, or another model?
6. Who is recorded, who can review, what events unlock access, and what can the
   evidence affect: information, warnings, honor, eligibility, restrictions,
   or account status?
7. What notice, affirmative consent, recording indicator, age/geography limit,
   report deadline, retention/deletion, export/correction, encryption, access
   logging, incident response, and appeal behavior apply?
8. Which Discord developer/product rules and qualified privacy/legal, security,
   moderation, and safeguarding reviews gate the concrete design?

## Required Evidence Before Approval

- Execute `DCS-1` through `DCS-5` in the
  [coordination and party-entry validation program](coordination-and-party-entry-validation-program.md):
  bot channel creation, constrained admission, matched-user text/voice access,
  ordinary-outsider isolation, failure states, revocation, deletion, and
  unrelated-state preservation. Recheck the exact bot, channel, invite/OAuth,
  member, message-access, and deletion interfaces immediately before execution.
- Current first-party Discord capability and policy research for any proposed
  voice-receive, recording, storage, transcription, and deletion model.
- A field-level data-flow inventory covering raw audio, derived transcripts or
  classifications, metadata, reports, recipients, logs, backups, and deletion.
- A threat and abuse assessment covering covert recording, impersonation,
  tampering, false reports, retaliation, unauthorized playback, leaks, and
  moderator misuse.
- Jurisdiction- and age-aware qualified review of the finished consent,
  recording, evidence, retention, and participant-rights flow.
- An owner-approved moderation and appeal specification defining evidentiary
  weight, reviewer authority, correction, sanctions, auditability, and
  rollback.

## Current Classification

- **Owner decision:** Valorant and its official lobby-link candidate are
  selected under `DEC-018`; `DEC-020` defines the coordination-group criterion;
  `DEC-021` accepts a designated matched human as party/link host if the flow
  passes validation.
- **Owner proposal:** temporary Discord coordination rooms and possible
  report-reviewable session audio.
- **Research result:** a bot-managed private text/voice channel pair inside an
  existing QGuard Discord server is a supported optional coordination design.
  It is not required to deliver Riot's host-copied link. A Group DM is only an
  experimental/weak alternative. Valorant has a host-copied party link; direct
  Discord-friend invite is a separate mechanism, and no comparable CS2 Discord
  party handoff is established.
- **Open question:** `OQ-011`—which native/Discord dependency model becomes the
  critical coordination baseline—followed, if applicable, by Discord admission/
  lifecycle and whether any voice capture belongs in the product under a
  complete safeguard set.
- **Deferred work:** Discord private-room lifecycle testing remains approved in
  scope as `DEF-003` but is on owner hold; Discord product selection and recording
  are not approved.
  No recording implementation has been approved and postponed; recording
  remains an unapproved proposal/queued decision packet. The separate Valorant
  link test is `DEF-001` and the generic Discord Game Invite checks are
  `DEF-002` in the
  [deferred-work register](../governance/deferred-work.md); their shared scope is
  in the
  [party-entry behavioral validation packet](party-entry-behavioral-validation-packet.md).

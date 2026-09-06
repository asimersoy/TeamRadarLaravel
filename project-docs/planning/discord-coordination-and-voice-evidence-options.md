# QGuard Discord Coordination And Voice-Evidence Options

- **Record type:** current owner proposal and future decision packet
- **Status:** coordination feasibility researched; owner selection and separate
  voice-evidence research/review required
- **Decision owner:** project owner
- **Authority:** owner proposals recorded 2026-09-05 and `DEC-020` through
  `DEC-021`; no implementation authority
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

## Separated Options, Not Decisions

| Option | Coordination behavior | Voice evidence | Main tradeoff |
|---|---|---|---|
| QGuard-native room | QGuard holds the lobby link and group text | None by default | Keeps the first flow independent of Discord server membership |
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

1. Is Discord coordination required, optional, or only a fallback to a
   QGuard-native room?
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

- The current coordination capability research is complete at the product-
  comparison level. Before implementation, recheck the exact selected bot,
  channel, invite/OAuth, member, message-access, and deletion interfaces.
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
  existing QGuard Discord server is the strongest supported coordination
  candidate. A Group DM is only an experimental/weak alternative. Valorant has
  a host-copied party link; no comparable CS2 Discord party handoff is
  established.
- **Open question:** `OQ-011`—whether Discord is selected as the critical
  backbone—followed by which admission/lifecycle model applies and whether any
  voice capture belongs in the product under a complete safeguard set.
- **Deferred work:** no Discord or recording work. No recording implementation
  has been approved and postponed; this remains an unapproved proposal/queued
  decision packet. The separate Valorant link test is `DEF-001` and the generic
  Discord Game Invite checks are `DEF-002` in the
  [deferred-work register](../governance/deferred-work.md); their shared scope is
  in the
  [party-entry behavioral validation packet](party-entry-behavioral-validation-packet.md).

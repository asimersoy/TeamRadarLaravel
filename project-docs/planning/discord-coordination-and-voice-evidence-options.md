# QGuard Discord Coordination And Voice-Evidence Options

- **Record type:** current owner proposal and future decision packet
- **Status:** proposal only; owner review and research required
- **Decision owner:** project owner
- **Authority:** owner proposal recorded 2026-09-05; no implementation authority
- **Created:** 2026-09-05
- **Update trigger:** coordination-surface, Discord, voice-data, report-evidence,
  moderation, or permitted-use decision

## Purpose

Preserve the owner's Discord-room and voice-evidence idea without treating it
as an approved feature, technical fact, provider permission, or legal
conclusion. Keep it separate from the approved Valorant lobby-link flow so a
lower-risk coordination choice does not silently authorize voice collection.

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

## Separated Options, Not Decisions

| Option | Coordination behavior | Voice evidence | Main tradeoff |
|---|---|---|---|
| QGuard-native room | QGuard holds the lobby link and group text | None by default | Keeps the first flow independent of Discord server membership |
| Temporary Discord room without recording | A bot-managed text/voice area holds the group and lobby link | No QGuard audio capture | Adds Discord dependency but avoids the recording data flow |
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
2. Is a temporary voice channel part of the first product journey, and must
   users belong to the QGuard Discord server?
3. Is QGuard voice capture needed at all? If yes, is it full-session recording,
   a bounded rolling buffer, participant-triggered capture, or another model?
4. Who is recorded, who can review, what events unlock access, and what can the
   evidence affect: information, warnings, honor, eligibility, restrictions,
   or account status?
5. What notice, affirmative consent, recording indicator, age/geography limit,
   report deadline, retention/deletion, export/correction, encryption, access
   logging, incident response, and appeal behavior apply?
6. Which Discord developer/product rules and qualified privacy/legal, security,
   moderation, and safeguarding reviews gate the concrete design?

## Required Evidence Before Approval

- Current first-party Discord capability and policy research for the exact bot,
  channel, voice-receive, recording, storage, and deletion model.
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
  selected under `DEC-018`.
- **Owner proposal:** temporary Discord coordination rooms and possible
  report-reviewable session audio.
- **Open question:** whether Discord and any voice capture belong in the
  product, and under what complete safeguards.
- **Deferred work:** no Discord or recording work. No recording implementation
  has been approved and postponed; this remains an unapproved proposal/queued
  decision packet. The separate Valorant link test is `DEF-001` in the
  [deferred-work register](../governance/deferred-work.md).

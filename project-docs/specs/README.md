# QGuard Specification Index

- **Record type:** current specification index
- **Status:** product foundations partially approved; `DEC-018` still selects
  Valorant; `DEC-024` selects Discord room/voice planning with replaceable
  joining. Operational details and live verification remain open
- **Decision owner:** project owner
- **Authority:** `DEC-008`
- **Created:** 2026-09-04
- **Update trigger:** specification creation, approval, supersession, dependency
  change, or implementation-slice planning

## Purpose

This directory contains the modular current-product specification suite.
Legacy evidence does not populate or approve a module automatically. Only the
specific owner decisions recorded in current governance may enter a current
specification as approved content.

## Module Contract

Each future module must state:

- purpose, scope, and explicit exclusions;
- status and approving owner;
- controlling decisions and source evidence;
- dependencies on other specification modules;
- testable acceptance and completion criteria;
- open questions, assumptions, proposals, and deferred work without merging
  their authority;
- update triggers, impact/re-review rules, and supersession state.

An implementation plan must identify which modules govern its slice. Every
required module must be approved before that slice begins unless the owner
records an explicit narrow override under the workflow-governance policy.

## Current Modules

- [Product foundations](product-foundations.md) — partially approved; not
  implementation-ready
- [Coordination and replaceable party handoff](coordination-and-party-handoff.md)
  — direction approved under `DEC-024`; detailed contracts and implementation
  slices still proposed; actual game joining unimplemented and live tests paused

The historical gate is closed as sufficient for redesign. The current
[game API findings](../research/game-api-feasibility-findings.md) informed the
owner's Valorant selection in `DEC-018` but do not themselves constitute a
specification. The later
[CS2 findings](../research/counter-strike-2-party-entry-feasibility.md) reopened
the game comparison without superseding that decision. `DEC-019` subsequently
rejects Looking to Play for QGuard. The
[Steam communication/group findings](../research/steam-nonfriend-communication-and-group-feasibility.md)
show that manual Steam chat and persistent Community Groups do not meet the
preferred criterion clarified by `DEC-020`. The
[Discord coordination/game-join findings](../research/discord-coordination-and-game-join-comparison.md)
establish a supported bot-managed server-channel candidate, confirm the
Valorant host-copied link, and find no current CS2 Discord party handoff. Later
clarification separates that copied Riot link from direct Discord-friend invites
and generic Discord Join actions; the link may be delivered through QGuard
rather than Discord. The owner accepts the designated-human-host flow if it
passes (`DEC-021`), and `DEC-022` sets a broad international direction without
settling exact launch coverage or Discord/VPN dependence. The
non-friend Valorant lobby-link test remains `DEF-001`; generic Discord Game
Invite checks for both games are activated in direction under `DEF-002` but
await their live environment. Their exact scope and evidence rules are in the
[party-entry behavioral validation packet](../planning/party-entry-behavioral-validation-packet.md).
`DEC-023` originally required the broader
[coordination and party-entry validation program](../planning/coordination-and-party-entry-validation-program.md)
before the owner selected coordination. `DEC-024` now selects Discord rooms/
voice for planning ahead of tests, with a private matched-only Discord text
channel for the host-link alternative. The actual game-join method remains
replaceable; applicable real-behavior evidence is still required. No test is
resumed by drafting or approving the planning direction.

No current module approves a complete product/use boundary, platform/region/
mode/audience wedge, rank or coordination data flow, architecture, technology,
implementation plan, or release.

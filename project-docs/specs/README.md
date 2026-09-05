# QGuard Specification Index

- **Record type:** current specification index
- **Status:** product foundations partially approved; `DEC-018` still selects
  Valorant while coordination selection, party verification, and integration
  boundaries remain open
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
Valorant host-copied link, and find no current CS2 Discord party handoff. The
non-friend Valorant lobby-link test remains `DEF-001`; no Discord or CS2 live
test is an approved or deferred implementation dependency.

No current module approves a complete product/use boundary, platform/region/
mode/audience wedge, rank or coordination data flow, architecture, technology,
implementation plan, or release.

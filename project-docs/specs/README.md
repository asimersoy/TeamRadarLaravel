# QGuard Specification Index

- **Record type:** current specification index
- **Status:** product foundations partially approved; `DEC-018` still selects
  Valorant while the CS2 comparison and integration verification remain open
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
leave current CS2 Community Group party entry unverified. The non-friend
Valorant lobby-link test remains `DEF-001`; neither Steam live test is an
approved or deferred implementation dependency.

No current module approves a complete product/use boundary, platform/region/
mode/audience wedge, rank or coordination data flow, architecture, technology,
implementation plan, or release.

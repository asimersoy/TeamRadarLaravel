# TeamRadar Legacy Chronology

- **Record type:** historical evidence timeline
- **Status:** current for available Git evidence
- **Current authority:** none

## 2025-08-16 - Initial Laravel Repository

Commit `b150ee8` creates the initial application baseline. Later surviving code
shows a Laravel starter-kit foundation with authentication and UI scaffolding.

## 2025-10-01 To 2025-10-07 - Separate Relay Prototype

An unreachable commit chain records an Electron/TypeScript project:

- `402a3f3` - initial relay commit;
- `b1852b7` - gateway HTTP, LiveAPI, main process, and renderer fixes;
- `f0006bd` - dependency and IPC/config refactor; and
- `5997de0` - workspace ignore update and latest recovered relay tree.

The relay stores a TeamRadar backend URL, local LiveAPI URL, and PSK; implements
HTTP auth/ping/event calls; shows gateway/LiveAPI state; and configures Windows,
Linux, and macOS packaging. Its local LiveAPI socket role is inconsistent with
the later corrected listener model.

## 2025-10-08 - Initial API/Docker Setup

Commit `8eac05a` adds initial API controllers and Docker environment work. The
controllers remain empty in the present tree.

## 2025-10-17 - Overview And Attempted Relay Merge Point

Commit `47034e4` adds the TeamRadar/QueueGuard overview describing Apex,
Laravel, Redis, a relay, and a future gateway. Commit `44e35b6` is labelled as a
checkpoint before merging the relay repository as a branch, but the relay does
not appear in reachable history.

## 2025-10-22 - Apex Gateway, Presence, And LiveAPI Work

- `5070b2f`: Node WebSocket server, Redis PSK/presence architecture, initial
  Apex TODO, and UX diagram.
- `76bdc5c`: Apex LiveAPI reference documentation.
- `f3848cd`: gateway parity checklist.
- `b75c5b9`: protobuf support and dependency changes.
- `967cb83`: log ignore/package lock updates.
- `3154884`: proto import fix and TODO note about protobuf decoding.

This is the repository's strongest Apex integration period.

## 2025-10-24 To 2025-10-26 - Apex Tap Experiments

- `87cef9a`: binary-path test change.
- `3dbdacc`: UTF-8 validation adjustment and request experiment.

The current tap contains a local listener, proto helpers, and custom-lobby test
request, but also an undefined `buffer` in the binary path.

## 2025-12-02 - Tracked Switch To Valorant

Commit `e6cd0f6`:

- labels preceding Apex work as old aims;
- explicitly says to switch project focus to Valorant;
- records local-client/official-API/RSO/PUUID/rank questions;
- proposes an API-free or API-light first prototype;
- lists matchmaking, verification, review, and CI/CD work;
- adds a static matchmaking page/layout; and
- prefers local/simple one-server Docker work until platform direction settles.

## 2025-12-16 - Valorant Game-Account Prototype

Commit `3822e61` adds:

- `Game` and `GameAccount` models/migrations;
- user relationship;
- account-existence middleware;
- setup form/component;
- Valorant rank list;
- hard-coded Valorant matchmaking gate; and
- immediate prototype `verified_at` assignment.

This is the latest reachable legacy product implementation commit.

## Undated Relative To Surviving Git - Remembered Return To Apex

The 2026 owner-provided reconstruction says the better-retained final old idea
returned to an Apex public-match teammate finder with a corrected local relay,
manual party formation, session-backed reviews, and weighted honor. It treats
Valorant as a detour/future game.

No reachable dated commit after `3822e61` proves this return. It may reflect
conversation decisions or repositories no longer present. This is the central
historical provenance gap.

## 2026-09-02 - Workflow And Reconstruction Phase

Commit `7043054` adds the portable workflow system. Current owner instructions
then establish:

- reconstruct old intent before redesign;
- no required code reuse;
- separate workflow from project-specific records; and
- future owner changes to specification and product/use boundaries.

These are current process decisions, not old product decisions.

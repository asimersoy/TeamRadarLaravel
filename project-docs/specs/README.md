# QGuard Specification Index

- **Record type:** current specification index
- **Status:** product foundations partially approved; `DEC-018` still selects
  Valorant; `DEC-024` selects Discord room/voice planning with replaceable
  joining, refined by `DEC-035` to optional voice queueing and real Discord
  implementation deferred. `DEC-036` through `DEC-041` add matching, party,
  feedback and admin directions. `DEC-042` through `DEC-046` settle session/
  clock, native chat/current queue and audiences, with reversible details
  delegated. `DEC-047`/`DEC-048` settle first-pass retention and identity/rank
  responsibility/fallback; concrete technical/data/acceptance contracts are
  now drafted in QG-FIRST-PASS-1 and await approval, not another questionnaire.
  `DEC-049`/`DEC-050` select the core stack and persistent-storage/backend/
  browser-testing requirements. `DEC-051` selects modular file-based planning
  and one brief packet-review checkpoint before coding
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

- [QG-FIRST-PASS-1 specification manifest](first-pass/README.md) — concrete
  proposed implementation suite, revision 1; draft complete, packet approval
  pending under `DEC-051`. Use this suite for first-pass engineering, not older
  historical open-detail lists. See the [brief review](../planning/first-pass/README.md).

- [Product foundations](product-foundations.md) — partially approved; not
  implementation-ready
- [Coordination and replaceable party handoff](coordination-and-party-handoff.md)
  — optional voice direction under `DEC-024`/`DEC-035`; real Discord integration
  excluded now; native private match text/no-Discord-only queue selected under
  `DEC-046`, first-pass persistence under `DEC-047`, security contract incomplete; actual game
  joining unimplemented and live tests paused

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

`DEC-035` subsequently makes Discord voice optional at queue entry and defers
actual integration beyond current implementation. `DEC-037` includes basic
friends/invitations and partial parties now. `DEC-041` selects three feedback
dimensions, pending settlement and automatic per-match outgoing-rating
invalidation after two distinct reports, tagged for admins before human review;
automatic penalties are still deferred. The foundation and live question
register distinguish these directions from remaining behavioral decisions.

`DEC-042` delegates reversible development details and first-build review;
`DEC-043` selects participant-declared session end and ten-minute feedback
settlement. `DEC-044` delegates initial Valorant region/language queue controls;
`DEC-045` settles own honor, player-hidden reviewers and cleared-admin context;
`DEC-046` approves native private chat and only no-Discord queueing now. These
are not complete data/acceptance specifications or a slice-start override.

`DEC-047` retains stored first-pass feature records without expiry, followed by
an immediate second-pass inventory/retention review (`DEF-012`). `DEC-048`
delegates identity/ownership/rank choices and permits declared rank with
teammate discrepancy checks if official access is unavailable/gated or needs
more owner decisions. None of those questions remains an upfront owner blocker.
The [current readiness review](../current-state.md#first-pass-readiness-review--2026-10-03)
identifies the remaining specification, plan and approval work before coding.

`DEC-049`/`DEC-050` select Docker, PostgreSQL, no initial Redis and Blade/Livewire.
The next specifications must include container-independent persistent database
storage, isolated synthetic seed data, assertion-based Pest/PHPUnit backend
unit/integration/regression tests, PostgreSQL integration/concurrency tests and
browser coverage of every implemented first-pass user/admin flow. See the
[stack and testing record](../planning/rewrite-owner-decision-sequence.md#stack-recommendation--2026-10-03)
for approved direction versus supporting agent proposals. No application test
or persistence check has run for the rewrite yet.

The new first-pass suite proposes a bounded local development scope and complete
contracts for review; it is not yet implementation-approved. Public audience/
region/use boundaries and release remain separately open. Core stack choices
are already settled; do not ask the owner to choose them again.

# QGuard Current State

- **Last updated:** 2026-09-06
- **Status:** designated-human-host Valorant handoff and future client-test
  scope accepted; Discord server/private-channel backbone awaits the owner's
  separate critical decision; `DEC-018` still selects Valorant
- **Objective:** obtain the deliberate `OQ-011` coordination-backbone decision
  without conflating it with party-entry tests or voice recording
- **Current route:**
  [PLAN-2026-09-06 Party handoff validation and coordination gate](routes/PLAN-2026-09-06-party-handoff-validation-and-coordination-gate.md)

## Verified Workspace State

- Primary local-project/workspace boundary:
  `/Users/asime/Github/TeamRadarLaravel`
- Active Git repository boundary:
  `/Users/asime/Github/TeamRadarLaravel/TeamRadarRepository`
- The primary workspace root is intentionally non-Git. Its separate
  `sources/`, `scratch/`, `outputs/`, and `snapshots/` areas follow the tracked
  [workspace-layout policy](operations/workspace-layout.md).
- The broader `/Users/asime/Github` folder remains outside the project. Access
  to another external path may be requested for a specific need and is subject
  to review; it is not routine project access.
- The existing conversation retains `/Users/asime/Github` as its recorded
  starting directory, so repository commands use the nested repository path
  explicitly. The project registry identifies `TeamRadar` at the outer
  workspace path.
- Relocation baseline: clean `new-development` at
  `66515eb25988c45f260a4a8f74ac9ad36bdc4e82` immediately before and after the
  move, before this workspace-record update.
- Local branches: `master` at `3822e61` tracking `origin/master`, and the
  current `new-development` branch with no configured upstream. The readiness
  records build additively on the reconstruction commit.
- One worktree exists at the nested repository root; no submodules are
  configured.
- Pre/post relocation checks matched HEAD, refs, Git config, tracked index
  entries, ignored-state digest, file count, symlink count, and repository
  status. Only `.git/index` bytes changed when Git refreshed its stat cache;
  staged file identities remained identical.
- A full 42 MB pre-move archive is stored under the outer `snapshots/` directory
  with SHA-256
  `d12fd824b9e0b8314cc005e9d5a989cfa316118d73672658a0832ae4339db1b5`.
- The four recovered relay commits (`402a3f3`, `b1852b7`, `f0006bd`, and
  `5997de0`) remain readable Git commit objects.
- Running Compose services at inspection: none
- Active worker: primary Codex agent; no delegated assignments

## Current Authority

- The workflow package is project-neutral and remains unchanged.
- Current owner decisions cover reconstruction-first, no required code reuse,
  workflow/project-record separation, evidence-backed execution, the nested
  workspace boundary, protection of the canonical workflow, and the
  TeamRadar-specific workflow-governance contract. See the
  [decision register](governance/decisions.md).
- The portable workflow package remains the primary canonical general workflow.
  `DEC-007` protects its single canonical copy from modification without
  explicit advance owner approval. TeamRadar-specific workflow adaptations
  belong in separate project records; outer workspace notes are routing aids
  only.
- `DEC-008` and the
  [workflow-governance policy](operations/workflow-governance.md) control
  TeamRadar-specific rule changes, approvals, decision supersession,
  specification gates, commit boundaries, controlled operations, review
  batching, and reviewer authority.
- Current product decisions select the **QGuard** name, behavioral honor as the
  central concept, feasibility-led game selection, authoritative API-derived
  rank as preferred over declaration, bounded reporting for inaccurate fallback
  declarations, and capability/outcome extraction rather than inheritance of
  legacy implementation shape (`DEC-009` through `DEC-013`).
- `DEC-014` closes the historical gate as sufficient for redesign without an
  exhaustiveness claim. `DEC-015` requires gradual, bounded product discussions,
  keeps PC provisional, sequences fallback discussion after API research, and
  preserves the specification gate for each implementation slice.
- `DEC-016` prefers friendship-free ordinary-party entry and treats the
  friend/invite path as a material-friction fallback. `DEC-017` keeps a
  prototype-first Valorant RSO application path conditionally available without
  authorizing implementation, provider contact, or submission.
- `DEC-018` selects Valorant as the initial game and requires a scoped
  two-account non-friend lobby-link test before a specification or
  implementation may depend on that capability.
- The owner's later instruction added CS2 as a serious candidate for bounded
  research without superseding `DEC-018`. `DEC-019` now rejects Looking to Play
  as a QGuard product route while authorizing research into Steam non-friend
  chat, voice, and Community Group alternatives.
- `DEC-020` clarifies that the requested coordination “group” is a multi-person
  conversation comparable to a group DM, with supported automation or semi-
  automation and link/code/OAuth entry. Persistent Steam Community Groups are
  not the intended coordination object. This criterion does not itself select
  Discord or authorize implementation or data collection.
- `DEC-021` accepts a designated matched human as the Valorant party/link host
  if the official flow passes. It approves future behavioral checks of the
  Valorant lobby link and generic Discord Game Invite surfaces for Valorant and
  CS2. It also records that a Group DM is unnecessary if the server/private-
  channel model works, while preserving that model's final selection as the
  separate critical `OQ-011` owner gate.
- The legacy Laravel app, old project docs, reachable/unreachable Git history,
  and supplied memory dump are evidence only.
- No complete product/use boundary, platform/region/mode/audience wedge, rank or
  API integration, coordination surface, matching criteria, honor
  formula/effect, moderation policy, architecture, technology, deployment, or
  implementation plan has been approved. Temporary Discord rooms and voice
  recording remain an owner proposal, not a product decision.

## Work State

- **Completed:** workflow orientation, repository and branch recovery audit,
  memory-dump review, reachable history review, read-only recovery of the
  orphaned Electron relay history, the organized historical dossier, and the
  owner decision sequence for rewrite readiness. The repository was also moved
  intact into the approved nested workspace layout, and the TeamRadar-specific
  workflow-governance contract is approved. Owner corrections and the approved
  product foundations are recorded in `DEC-009` through `DEC-013`. Gate 0 is
  closed by `DEC-014`, and the initial current-source Apex/Valorant API pass is
  recorded in the
  [game API feasibility findings](research/game-api-feasibility-findings.md).
  The focused
  [party-entry and policy findings](research/party-entry-and-policy-fit.md)
  verify the Valorant lobby-link candidate, the absence of an evidenced Apex
  equivalent, and the exact boundary where provider terms affect QGuard.
  Owner review selected Valorant and set the link test gate in `DEC-018`.
  The later
  [CS2 party-entry findings](research/counter-strike-2-party-entry-feasibility.md)
  establish a credible non-friend Looking to Play path, a supported Steam
  OpenID identity path, and the limits of QGuard-accessible Steam lobby and rank
  interfaces. `DEC-019` subsequently rejects Looking to Play for QGuard; the
  feature evidence remains research history rather than an active proposal.
  The
  [Steam communication/group findings](research/steam-nonfriend-communication-and-group-feasibility.md)
  establish a promising manual non-friend group-chat path for text/voice,
  public/request-based Community Group admission, and the absence of a
  documented QGuard management API. Current CS2 group-lobby behavior remains
  unverified. The later
  [Discord coordination/game-join findings](research/discord-coordination-and-game-join-comparison.md)
  establish supported bot-created private server text/voice channels and
  constrained link/OAuth admission, identify application-created Group DMs as
  a weak legacy-constrained alternative, confirm Valorant's host-copied lobby
  link, and find no current first-party CS2 Discord party handoff. `DEC-021`
  then accepts the designated-human-host link handoff conditionally and the
  [party-entry behavioral validation packet](planning/party-entry-behavioral-validation-packet.md)
  defines the approved future Valorant and CS2 client checks.
- **In progress:** owner review of whether to select the Discord-server/private-
  channel model as QGuard's coordination backbone (`OQ-011`). `DEF-001` remains
  the required Valorant-link test and `DEF-002` queues the optional generic
  Discord Game Invite checks. Rank fallback, provider access, complete wedge,
  exact Discord admission/lifecycle, and coordination fallback remain open. The
  [Discord coordination and voice-evidence packet](planning/discord-coordination-and-voice-evidence-options.md)
  records temporary rooms and possible recording as an unapproved proposal.
- **Next:** owner deliberately decides whether one human-owned QGuard Discord
  server with bot-created private per-match text/voice channels is the preferred
  coordination backbone, without recording. If accepted, settle invite versus
  `guilds.join` admission and post-match membership/access cleanup. `DEF-001`
  and `DEF-002` execute only when specific consenting test accounts/current
  clients and a minimal redacted evidence/cleanup setup are supplied. Group DM
  proof is unnecessary if the server model is accepted; all voice capture
  remains a separate unapproved decision.
- **Untouched:** legacy code, legacy `docs/`, configuration, tests, dependencies,
  generated data, and Git history.

## Verification State

- Workflow validator passed before project-record work: 68 Markdown files, 15
  procedures, and 38 inert templates.
- `docker compose config --quiet` passed; no Compose containers were running.
- `npm run build` passed for the legacy frontend with stale-Browserslist,
  PostCSS import-order, and empty-JavaScript-chunk warnings.
- PHP tests could not start because the local PHP 8.4.13 binary references the
  missing Homebrew library `libnetsnmp.40.dylib`. No application-test pass is
  claimed; application behavior is not the acceptance target for this audit.
- No remote, destructive, production, deployment, publication, or history
  rewrite action occurred.
- The 2026-09-03 recovery audit verified the registered TeamRadar project path,
  repository read/write access, branch tips, worktree/submodule state, the
  reconstruction commit and its 22-file/2,752-insertion documentation change,
  and recovered relay object availability.
- The 2026-09-03 workspace migration preserved all 18,365 regular files, 23
  relative symlinks, Git refs/configuration/index identity, ignored state, and
  known dangling historical objects. The outer directory is not a Git
  repository.
- The 2026-09-04 workflow-governance review resolved all eight `OQ-008`
  components. The scoped project-document diff passed relative-link and
  `git diff --check` validation, and the portable workflow package remained
  unchanged. No application test was required for this documentation-only
  decision unit.
- The 2026-09-05 QGuard foundation update reconciled the owner's naming,
  honor, rank-source, integration-research, and legacy-evidence decisions. The
  workflow validator passed, all relative links across 32 project Markdown
  files resolved, `git diff --check` passed, and the portable workflow and
  legacy application remained unchanged. Current API research and application
  runtime tests were not part of this documentation-only unit.
- The 2026-09-05 API research pass reviewed current first-party Riot, Valorant,
  Discord, EA, and Apex sources; distinguished ordinary parties from Custom
  Matches; and preserved bounded negative findings. It used no credentials,
  provider contact, live client, reverse engineering, data collection, or
  automation. The workflow validator passed, all relative links across 34
  project Markdown files resolved, `git diff --check` passed, and the portable
  workflow package and legacy application remained unchanged. Application
  runtime tests were not required for this research/documentation unit.
- The 2026-09-05 focused party-entry follow-up rechecked first-party Riot,
  Valorant, Discord, EA, and Apex sources; distinguished Valorant's official
  lobby link from its formal Discord-friend discovery; found no current
  first-party Apex Discord Join or ordinary-lobby link/code; and mapped provider
  restrictions only to the QGuard actions they actually affect. No account,
  client, credential, provider contact, automation, interception, or data
  collection was used. The workflow validator passed, all relative links across
  36 project Markdown files resolved, `git diff --check` passed, and the
  portable workflow package and legacy application remained unchanged.
  Application runtime tests were not required for this documentation-only unit.
- The 2026-09-05 owner follow-up selected Valorant, defined the precise
  non-friend link-test gate, and separated temporary Discord coordination from
  report-reviewable voice recording. The recording idea is preserved as a
  proposal with explicit future privacy, consent, security, moderation,
  provider-policy, and qualified-review gates. All relative links across 38
  project Markdown files resolved, `git diff --check` passed, and the portable
  workflow package and legacy application remained unchanged. Application
  runtime tests and the portable-system validator were not run because this
  unit changes project records only.
- The 2026-09-05 CS2 follow-up reviewed current and historical first-party
  Valve, Steam, CS2, and Discord material; distinguished ordinary parties from
  community/dedicated servers and developer AppID APIs; and separated manual
  user flows from restricted client automation. It used no account, client,
  credential, provider contact, API call, interception, or personal-data
  collection. All relative links across 40 project Markdown files resolved,
  `git diff --check` passed, and the portable workflow package and legacy
  application remained unchanged. Application runtime tests and the portable-
  system validator were not run because this unit changes project records only.
- The 2026-09-06 Steam follow-up recorded the owner's rejection of Looking to
  Play, distinguished saved group chats from Community Groups and CS2 parties,
  and reviewed current first-party Steam/Valve chat, voice, group, API, and
  policy material. No account, client, group, chat, voice, credential, API call,
  provider contact, automation, or personal-data collection was used. All
  relative links across 42 project Markdown files resolved, `git diff --check`
  passed, and the portable workflow package and legacy application remained
  unchanged. Application runtime tests and the portable-system validator were
  not run because this unit changes project records only.
- The 2026-09-06 Discord comparison reviewed current first-party Discord,
  Riot/Valorant, Valve/CS2, and Steam material; separated Group DMs from server
  channels and shared communication from game-party entry; and recorded the
  owner's coordination criterion in `DEC-020`. No application, account, bot,
  server, Group DM, channel, invite, OAuth grant, role, message, voice, game
  client, provider contact, automation, or personal-data collection was used.
  All relative links across 44 project Markdown files resolved, `git diff
  --check` passed, and the portable workflow package and legacy application
  remained unchanged. Application runtime tests and the portable-system
  validator were not run because this unit changes project records only.
- The 2026-09-06 host-handoff clarification recorded the owner-approved
  designated-human-host Valorant direction, separated absence of a public
  QGuard party/link API from provider prohibition, and defined the approved
  future Valorant-link and Valorant/CS2 generic Discord Game Invite checks. No
  account, client, credential, relationship, server, bot, channel, invite,
  OAuth grant, party, message, voice, provider contact, automation, or personal-
  data collection action occurred. All relative links across 46 project
  Markdown files resolved, `git diff --check` passed, and every changed path
  remained inside `project-docs/`; the portable workflow package and legacy
  application remained unchanged. Application runtime tests and the portable-
  system validator were not run because this unit changes project records and
  validation plans only.

## Gates

- The QGuard naming correction, honor foundation, feasibility-led game
  direction, rank-source preference, and legacy-evidence treatment are approved
  only to the extent recorded in `DEC-009` through `DEC-013`.
- Historical reconstruction is sufficient for redesign but is not described as
  exhaustive. The Apex/Valorant chronology remains a visible provenance limit,
  not a current blocker or game-selection rule.
- The owner selected Valorant; the research itself still does not constitute
  Riot approval, prove private interfaces absent, approve a rank fallback, or
  authorize client automation.
- Looking to Play exists in the researched record but is rejected for QGuard by
  `DEC-019`; no Looking to Play test may route current work.
- Manual Steam group-chat links provide a promising non-friend text/voice path,
  but no supported QGuard creation/management API was found. Under `DEC-020`,
  they do not meet the preferred coordination criterion. Persistent Steam
  Community Groups are not the requested communication object.
- Discord server/private-channel coordination is technically supported but not
  yet selected. A human-owned QGuard server, user consent/admission, exact
  permissions and lifecycle, data minimization, and failure behavior remain
  owner/specification gates.
- Discord application-created Group DMs are not a dependable default: the
  documented endpoint originated with deprecated GameBridge, is capped at ten
  active groups, and cannot contain a bot.
- The Valorant party link is the accepted candidate direction but remains
  provisionally viable. `DEF-001` must verify non-friend acceptance before a
  specification or implementation relies on it.
- No current first-party CS2 Discord Game Invite was established. Discord room
  success is not CS2 party-entry evidence. The owner has approved a bounded
  future current-client check in `DEF-002`, but no test occurred here.
- The Discord findings and approved party-entry test scope do not supersede
  `DEC-018`, select a Discord application/server/bot as the product backbone,
  approve persistent membership, or authorize message or voice collection.
- Discord room creation and voice recording are not approved. In particular,
  later report review would require prior audio capture and retention and
  therefore cannot be introduced as an incidental bot feature.
- No implementation slice starts until every specification required for that
  slice and its testable completion criteria are approved, unless the owner
  records a narrow explicit override under `DEC-008`.

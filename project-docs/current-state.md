# QGuard Current State

- **Last updated:** 2026-10-02
- **Status:** Discord-dependent tests, including Wave 1 Valorant link setup,
  are on owner hold as of 2026-09-28 until the owner can test; no live result
  exists. `DEC-024` approves Discord rooms/voice as the planning direction and
  replaceable game joining. `DEC-025` selects session grouping for the first
  version. `DEC-026` selects honor in matchmaking from that version, with new
  players at a common baseline. `DEC-027` fixes that baseline and delegates
  equivalent numeric representation. `DEC-028` selects teammate feedback that
  can raise and lower honor. `DEC-029` selects average-based movement and dynamic
  recent-history attenuation. `DEC-030` separates raw recent ratings from their
  attenuated honor influence. `DEC-031` delegates required startup/confidence
  handling. `DEC-032` selects the smoothed reference, isolated-extreme trade-off
  and bounded development calibration. `DEC-033` plans no exact individual
  feedback history for first-version honor; detailed specifications remain
  incomplete
- **Objective:** evaluate optional rating-dispersion adaptive dampening, then
  continue feedback-format and honor decisions, preserving test hold and slice
  gates
- **Current route:**
  [Rating-dispersion adaptive-dampening proposal](specs/product-foundations.md#rating-dispersion-adaptive-dampening-proposal)

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
- A 2026-09-08 access check verified that this task's shell and exposed GUI
  surfaces remain on the Mac. The Codex app recognizes the connected Windows
  host `Asims-Desktop` and now lists the non-Git remote project
  `TeamRadarWindowsRemote` at
  `C:\Users\asime\Documents\RemoteCodexProjectsFolder\TeamRadar`. A fresh task
  created from this Mac executed a read-only PowerShell query there and returned
  the Windows host identity, OS build, working directory, and local time, so
  remote Windows shell execution is verified. Direct control of the Windows GUI
  and game clients from this task remains unverified. This is a test-environment
  readiness fact, not approval of a remote-access design.
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
- `DEC-022` records QGuard's broad international direction without deciding an
  exact launch geography or approving Discord/VPN dependence. The current
  research separates Riot's host-copied lobby link from the formal-Discord-
  friend invite and from Discord's generic game Join surface. The Riot link may
  be carried by Discord or a QGuard-native private match surface; exact host/
  recipient account-link, non-friend, region, and VPN behavior remains gated by
  `DEF-001` and `DEF-002`.
- `DEC-024` partially supersedes `DEC-023`: Discord rooms/voice and a private
  matched-only Discord text channel for the human-hosted link alternative are
  selected for planning now. Game joining remains replaceable: prefer a
  validated Discord game Join action, accept the official human-hosted link
  otherwise. Actual joining stays unimplemented, live tests remain on hold,
  and surrounding implementation still needs its approved slice specifications.
- The legacy Laravel app, old project docs, reachable/unreachable Git history,
  and supplied memory dump are evidence only.
- `DEC-025` chooses session grouping for the first usable version. Lasting-team
  management, past-teammate history UI and QGuard friend requests are outside
  that scope; future social features are ideas, not implementation commitments.
- `DEC-026` selects honor in matchmaking from the first version, with new
  players at a common baseline and similar-honor grouping as history develops.
  Detailed scoring/weighting remain open. `DEC-027` fixes the newcomer baseline
  independently of the community average and delegates equivalent numeric units
  and display scaling; substantive behavior and visibility remain owner decisions.
- `DEC-028` selects routine post-play teammate feedback that can both raise and
  lower honor. `DEC-029` selects average-based movement from scaled ratings and
  dynamically reduced influence as deviation from recent ratings increases,
  now using the smoothed raw reference selected by `DEC-032` instead of exact
  last-N. `DEC-030`/`DEC-032` keep the reference input unadjusted by separate
  honor dampening.
  Ordinary feedback moves honor up/down automatically without admin intervention.
  Complete scoring acceptance, report effects and other safeguards remain open;
  startup methods and behavioral calibration are delegated as stated below,
  not final-value questions that must precede development;
  negative or unusual feedback alone is not verified misconduct or a sanction.
- `DEC-031` requires initialization/confidence handling and lets the
  implementation agent choose and revise its method and reference tuning in
  development, with recorded tests. `DEC-032` confirms that responsibility,
  selects smoothing and starts its adjustable dev divisor at 20. It accepts
  the isolated-extreme-versus-moderate immediate effect trade-off and permits
  behavior-preserving calibration, mostly constants and occasional small
  functions. Equal numeric parameter values are allowed but remain independently
  named/configured. No new confidence-based eligibility rule, full scoring-slice
  approval or production safety claim is granted.
- `DEC-033` selects no exact individual feedback-history ledger or last-N
  buffer for the first-version honor calculation. Other-purpose evidence and
  correction/retention contracts still need explicit decisions; no data deletion
  is authorized. Reference choice, gradual adaptation, startup responsibility
  and independently named settings are reaffirmed, not new owner blockers.
  Adaptive dampening based on an aggregate spread estimate is an evaluated
  proposal only; current draft mathematics does not already track that spread.
- No complete product/use boundary, platform/region/mode/audience wedge, rank or
  API integration, coordination operating rules, matching criteria, honor
  formula or detailed effect, moderation policy, architecture, technology,
  deployment, or implementation plan has been approved. Discord room/voice direction is
  selected; voice recording remains an unapproved proposal.

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
- **Completed:** the subsequent
  [Discord dependency and restricted-region research route](routes/RESEARCH-2026-09-06-discord-dependency-and-restricted-region-boundary.md)
  separates the copied Riot lobby link, direct formal-Discord-friend invite,
  generic Discord Game Invite, and QGuard-to-Discord OAuth/admission. It records
  that Riot's copied link can be delivered outside Discord, while a shared
  Discord room alone provides no evidenced party-entry action. It also bounds
  Turkey/VPN observations as test variables rather than product or legal
  conclusions.
- **Completed:** the 2026-09-07
  [test-resource and Discord-roadmap research](research/discord-party-entry-current-and-roadmap.md)
  confirms that Riot's League/Valorant integration already shipped in 2026,
  preserves the unresolved nonfriend and recipient-link cases, finds no current
  first-party CS2 ordinary-party Discord handoff, and bounds Discord LFG
  Channels as an ARC Raiders-only named experiment with no request path or
  Valorant/CS2 commitment. The linked
  [resource and sequence plan](planning/coordination-test-resources-and-sequence.md)
  splits every test, defines the two-PC/two-participant core and separate
  Discord owner/outsider controls, incorporates targeted-user/role-bearing
  invites, and selects neutral-relay Valorant link testing as Wave 1.
- **Completed:** the 2026-09-28
  [League/Valorant nonfriend-joining recheck](research/discord-party-entry-current-and-roadmap.md#2026-09-28-recheck-league-joining-and-qguard-nonfriends)
  found League's explicit Discord-channel invitation instructions and
  reconfirmed documented Valorant availability with regional limits. The
  friends-list path requires Discord friendship; shared-invite acceptance by
  someone who is friends on neither service remains a live-test question.
  The owner's exact announcement has not been supplied. No test passed,
  product choice was approved, or provider state changed in this follow-up.
- **On owner hold:** Discord-dependent execution within the
  [coordination and party-entry validation program](planning/coordination-and-party-entry-validation-program.md).
  On 2026-09-28 the owner stated the plan to use their existing account for A
  and create fresh Riot/Discord accounts for B using a new email. Preparation
  and the tutorial requirement are recorded in the
  [resource plan](planning/coordination-test-resources-and-sequence.md#owner-account-preparation--2026-09-28);
  account creation and client readiness are not yet verified.
  `DEF-001` through `DEF-005` now cover the Valorant link, generic Discord game
  invites, Discord private-room lifecycle, Steam non-friend group chat, and
  current CS2 alternatives. Live execution has not started because the named
  two-PC game-client/account environment and evidence/cleanup setup are not
  yet confirmed. Windows remote shell execution was verified on 2026-09-08;
  that does not establish game-client readiness. Rank fallback, provider
  access, complete wedge, and voice evidence remain outside this test program.
- **Completed:** explicit owner approval is recorded as `DEC-024`; the new
  coordination module separates approved direction from detailed proposals and
  outlines independent implementation slices. The link alternative uses a
  Discord text channel visible only to the matched players. No code, live
  integration, recording approval or test resumption is claimed.
- **Completed, 2026-10-02:** the owner selected session grouping and excluded
  first-version teammate history/friend requests; recorded in `DEC-025` and
  the product foundations. No implementation slice is approved by this choice.
- **Completed, 2026-10-02:** `DEC-026` records honor's first-version matching
  role, common newcomer baseline and similar-honor direction. Dynamic history
  weighting remains a proposal; no scoring or matching implementation is claimed.
- **Completed, 2026-10-02:** `DEC-027` records the fixed neutral newcomer
  baseline and bounded agent discretion over equivalent numeric representation.
  No range, formula, visible score/tier or implementation is selected now.
- **Completed, 2026-10-02:** `DEC-028` records bidirectional routine-feedback
  effects without choosing a score formula or report/sanction consequences.
- **Completed, 2026-10-02:** `DEC-029` records the owner's rationale, scaled
  ratings, average-based movement, configurable recent-history comparison and
  dynamic attenuation. Standard deviation and all numeric parameters remain
  unselected; no algorithm or anti-retaliation guarantee is implemented or proved.
- **Completed, 2026-10-02:** `DEC-030` distinguishes the raw recent average
  from attenuated honor influence: reduced effect does not exclude or alter
  eligible raw inputs to the reference. Window count and physical storage remain
  unselected. Automatic up/down movement without admin intervention is explicitly
  approved; adaptation speed and abuse resistance are not tested.
- **Completed, 2026-10-02:** the owner's
  [descriptive-variable naming instruction](operations/workflow-governance.md#technical-explanations-and-provisional-notation)
  is recorded as an operating clarification. Technical explanations must make
  variable meanings and parameter transformations explicit; this does not
  approve a scoring formula or fix implementation identifiers.
- **Completed, 2026-10-02:** the
  [honor notation discussion](specs/product-foundations.md#provisional-honor-notation-discussion)
  records the owner's preference for `allowed_rating_deviation` in the division
  form and `new_input_teammate_behavior_rating`. The draft's half-influence
  reference point is explained; no formula or numeric setting is approved.
- **Completed assessment, 2026-10-02:** the owner's single-state reference
  recurrence is documented as a proposal, with first-party exponential-
  smoothing evidence and synthetic comparison against an exact last-N window.
  It reduces basic reference storage but changes recency semantics; existing
  last-N decisions and data-retention questions remain unchanged.
  This describes that assessment's historical boundary: `DEC-032` later
  selected smoothing and `DEC-033` narrowed exact-history planning. It is not
  a current instruction to retain last-N or reopen the reference choice.
- **Completed, 2026-10-02:** `DEC-031` records required startup/confidence
  handling and bounded agent discretion over its development method and
  reference tuning. Final calibration need not precede development; chosen
  methods still need correctness evidence. Exact reference-model replacement
  remains open; divisor 20 is a provisional starting candidate, not a verified
  safe rate or twenty games.
  That reference question was subsequently closed by `DEC-032`; startup-method
  delegation remains valid and is not a new owner question.
- **Completed, 2026-10-02:** `DEC-032` records explicit owner replacement of
  last-N with exponential smoothing, accepts gradual reference evolution and
  the isolated-extreme negative trade-off, and confirms startup delegation.
  Earlier exact-window requirements are marked partially superseded; the side
  handoff is explanatory evidence, not authority to restore those requirements.
  Response divisor 20 is the adjustable dev starting value; deviation 20 remains
  illustrative. Complete scoring acceptance and safeguards remain unimplemented.
- **Completed assessment, 2026-10-02:** `DEC-033` records the no-exact-history
  planning clarification. The aggregate rating-dispersion proposal uses one
  extra smoothed scalar and bounded deviation allowance. Synthetic examples
  demonstrate greater score swings without necessarily changing the balanced
  sequence's center; no anti-retaliation or behavioral effectiveness is proven.
- **Next planning discussion:** whether optional dispersion-adaptive dampening
  is desirable given faster response and larger score swings. It is not yet a
  required feature. Then return to one overall behavioral rating versus multiple
  dimensions. Reference selection is settled. Startup-method
  details belong to the implementation agent. Then define response options,
  eligibility, calculation, reliability, detailed matching effects and
  visibility incrementally.
  Voice attendance, solo/partial-party entry and other journey/coordination
  details remain open for later bounded discussions.
- **Next for live tests, after owner resumption:** recheck current provider/
  client behavior, then confirm the seven Wave 1 readiness items in the
  [resource and sequence plan](planning/coordination-test-resources-and-sequence.md).
  Then freeze the account/client/network matrix and run `ENV-1`, `ENV-2`,
  `VAL-NET-1`, and the neutral `VAL-LINK-*` cases. Do not prepare or mutate the
  Discord server/bot or Steam group until its later wave is ready. Obtain
  separate exact approval before creating any new persistent Steam Community
  Group. Reconcile the mechanism results and remaining operational questions;
  do not re-ask the basic Discord planning choice or treat documentation/mocks
  as behavioral evidence.
- **Untouched:** legacy code, legacy `docs/`, configuration, tests, dependencies,
  generated data, and Git history.

## Verification State

- The 2026-10-02 history/dispersion assessment began with clean
  `new-development` at `f2aa723`. Product planning, research/sourcing,
  decision/recommendation safety, privacy/data, owner/external review,
  deferral/owner review and interruption/recovery routed the unit. Mandatory
  entry and selected procedures were read; recovery found no partial writes
  or unrelated changes. Six project records, all 54 project Markdown files,
  219 local links, 26 heading anchors and 33 unique sequential decision IDs
  were checked; complete scoped diff and `git diff --check` passed. NIST
  smoothing and spread sources were reviewed. Ephemeral synthetic sequences
  passed 12,078 arithmetic/bounds assertions; these show illustrative
  feasibility/response differences, not anti-abuse or live-user effectiveness.
  No app/startup implementation, full adversarial validation, live test,
  production collection or portable validator was run. No protected workflow,
  legacy code or external state changed; no push, deployment or provider write.
  Dispersion adoption remains an owner choice and implementation slice gates
  remain intact.
- The 2026-10-02 smoothed-reference/trade-off decision began with clean
  `new-development` at `7a821d8`. Product planning, decision/recommendation
  safety, privacy/data boundaries, owner/external review and deferral/owner
  review routed this unit. Six project records, local links/anchors and 32 unique
  sequential decision IDs were checked. Partial supersession and remaining
  gates were reviewed against all five owner annotations; full scoped diff and
  `git diff --check` passed. Application/live tests and the portable validator
  were not run for this decision-record-only unit. No complete scoring behavior,
  anti-abuse outcome, application or protected-workflow change is claimed.
  No push, deployment, provider write or other remote action occurred.
- The 2026-10-02 development-delegation record began with clean
  `new-development` at `de0ea6d`. Product planning, decision/recommendation
  safety, privacy/data, owner/external review and deferral/owner review routed
  this bounded unit. Six project records, all local links/anchors and 31 unique
  sequential decision IDs were checked; full scoped diff and `git diff --check`
  passed. Application/live tests and the portable validator were not run:
  no startup method, scoring algorithm or live integration was implemented.
  No protected workflow, legacy code, provider state or remote action changed.
- The 2026-10-02 smoothed-reference assessment began with clean
  `new-development` at `cdcef29`. Routing selected product planning, research/
  sourcing, decision/recommendation safety, privacy/data boundaries, external/
  owner review and deferral/owner review. Mandatory entry and routed procedures
  were read. The NIST source was reviewed; 106 ephemeral synthetic arithmetic
  assertions passed, covering recurrence equivalence, response direction,
  isolated-input decay, sustained adaptation, divisor changes and numeric
  scaling. Project links/anchors, all thirty decision IDs, full three-file
  diff and `git diff --check` were checked. These tests do not cover cold start,
  corrections, session batching, manipulation or the complete honor algorithm.
  Application/live tests and the portable validator were not run. Only project
  records changed; no protected-workflow, application, provider or remote write.
- The 2026-10-02 honor-notation refinement began with clean `new-development`
  at `44ce53c`. Routing selected product planning, decision/recommendation
  safety, external/owner review and deferral/owner review; the mandatory entry,
  always-applicable documents and selected procedures were read. Existing
  approvals and implementation gates remain unchanged. Arithmetic examples,
  project Markdown links/anchors, full three-file scoped diff and
  `git diff --check` were checked. Application/client tests and the portable
  validator were not run for this explanatory-document-only unit. No algorithm
  implementation, anti-abuse validation, protected-workflow change or remote
  action occurred.
- The 2026-10-02 explanation-style clarification resumed from clean
  `new-development` at `8887737`. Routing selected decision/recommendation
  safety, external/owner review, deferral/owner review, and interruption/recovery,
  alongside the always-applicable system documents. Existing product approvals
  and slice gates remain unchanged. Project Markdown links/anchors and the full
  two-file diff were checked; `git diff --check` passed. The protected workflow
  package and application remain unchanged. Application tests and the portable
  validator were not run for this operating-document-only unit; no remote or
  provider action occurred.
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
- The 2026-09-06 Discord-dependency clarification separated Riot's copied lobby
  link, direct formal-Discord-friend invitation, generic Discord Join, and
  QGuard-to-Discord admission; recorded the broad international direction; and
  treated Turkey/VPN behavior as a bounded future test variable. No account,
  client, VPN, server, bot, channel, OAuth, party, message, voice, provider
  contact, automation, or personal-data collection action occurred. All
  relative links across 47 project Markdown files resolved, `git diff --check`
  passed, and every changed path remained inside `project-docs/`; the portable
  workflow package and legacy application remained unchanged. Application
  runtime tests and the portable-system validator were not run because this
  unit changes project records and validation plans only.
- The 2026-09-07 validation-program reconciliation retrieved every current
  coordination/party-entry test discussed in the reviewed records, added the
  missing Discord runtime-dependency check, and converted the parked `OQ-011`
  backbone item into a pre-decision lifecycle test. No account, client, VPN,
  bot, server, channel, invitation, OAuth grant, Steam chat/group, party,
  message, voice, provider call, automation, or personal-data collection action
  occurred. All relative links across 49 project Markdown files resolved,
  `git diff --check` passed, and every changed path remained inside
  `project-docs/`; the portable workflow package and legacy application remain
  unchanged. Application/runtime tests and the portable-system validator were
  not run because this unit creates the test program rather than executing it.
- The 2026-09-07 test-resource/roadmap follow-up reviewed only public first-
  party sources, split and sequenced every active/conditional test, and created
  no live provider state. The workflow validator passed, all relative links
  across 52 project Markdown files resolved, `git diff --check` passed, and the
  changed-path review found no change under the protected portable workflow
  package or legacy application. Application/client tests were not required
  because this unit prepares rather than executes the live test waves.

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
- Discord room/voice planning and private matched-only text for the link
  alternative are selected by `DEC-024`. Admission, exact permissions,
  lifecycle, data minimization and failure behavior remain specification gates.
- Discord application-created Group DMs are not a dependable default: the
  documented endpoint originated with deprecated GameBridge, is capped at ten
  active groups, and cannot contain a bot.
- The Valorant party link is the accepted candidate direction but remains
  provisionally viable. It is separate from direct Discord-friend invitations
  and generic Discord Join. `DEF-001` must verify non-friend acceptance,
  account-link prerequisites, delivery-surface independence, and relevant
  region/network conditions before a specification or implementation relies on
  it.
- No current first-party CS2 Discord Game Invite was established. Discord room
  success is not CS2 party-entry evidence. The owner has approved a bounded
  future current-client check in `DEF-002`, but no test occurred here.
- `DEC-024` selects the Discord planning direction but does not supersede
  `DEC-018`, approve persistent membership, choose a detailed bot design, or
  authorize message surveillance or voice recording.
- QGuard has a broad international direction under `DEC-022`, but exact launch
  coverage remains open. A Turkey/VPN observation is test evidence only, not an
  official-availability or legal conclusion.
- `DEC-023` retains its applicable live-evidence gates; `DEC-024` removes the
  requirement to await all tests before selecting this planning direction.
  `OQ-011` is partly resolved, not wholly closed. Mocks and one isolated pass
  do not prove the remaining end-to-end behavior.
- Live execution is currently readiness-blocked by the absence of the named
  Windows client environment, consenting account/relationship matrix, exact
  Discord and Steam targets, redacted evidence location, and cleanup owner.
  Creating a new persistent Steam Community Group requires a separate exact
  target approval.
- The 2026-09-28 owner hold additionally pauses `DEF-001` through `DEF-003`
  until the owner can test and resumes. Do not treat the access problem as a
  failed test, automatically close remaining questions, retry, or divert into Steam/CS2
  testing. No reopening date is verified or required for this pause record.
- Discord room creation is approved only inside the bounded `DCS-1` through
  `DCS-5` test after its exact server, accounts, permissions, evidence, and
  cleanup are named; detailed operational specifications remain open. Voice
  recording is not approved. In particular, later report review would require
  prior audio capture and retention and therefore cannot be introduced as an
  incidental bot feature.
- No implementation slice starts until every specification required for that
  slice and its testable completion criteria are approved, unless the owner
  records a narrow explicit override under `DEC-008`.

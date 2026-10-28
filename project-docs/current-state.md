# QGuard Current State

## Reconciled Design And Implementation Entry — 2026-10-28

DEC-082 authorizes reconciling the settled specifications/design and beginning
implementation. DEC-074/075 confirms the stack; DEC-076–081 controls the updated
feedback, summary privacy, session-end and acceptance behavior. The approved
brand/layout/palette remains. The [execution record](planning/review-version/reconciliation-and-implementation.md)
contains the exact route, first-slice contract and verification scope.

The saved [design](design/qguard-review/qguard-review.html) now shows the all-five
20-second match offer, shared end requests/countdown, active-session queue gate,
private descriptor views, excluded-author required cards and discrepancy closure.
Descriptor values are explicitly fictional layout examples, not implemented
calculation/display evidence. OQ-014 display timing and OQ-017 premade failure
remain unanswered and block only dependent implementation.

**Implementation started:** R1a adds `/guest` with isolated tab-scoped sample
state, no service calls, packaged approved design and real server-side queue/
background-formation guards until RSO. Existing backend behavior remains the
historical first pass until its subsequent slices are migrated. No new schema,
RSO, game client or Discord integration is included. Application completion and
release are not claimed. See the execution record for checks and current limits.

Historical checkpoint sections below describe earlier stops/evidence; they do
not override DEC-082 or certify these new changes. The portable workflow and
legacy application remain untouched. No remote/public action is authorized.

**Verified R1a:** 64 backend tests passed; 22 browser tests passed with two
intentional duplicate-catalog skips; 81 catalog states checked. The isolated
application image builds and serves the packaged review. See the execution
record for distinctions between new server checks and historical regressions.
The current loopback review is `http://127.0.0.1:55000/guest#welcome`; its app
has normal matchmaking disabled. Port 8121 belongs to another local service.
Changes are grouped into one local checkpoint commit; no push or deployment.

## Brand And Mobbin Design Review — 2026-10-28

`DEC-069` retains the Q mark, QGuard wordmark and “Good company, good games.”
and authorizes a Mobbin pass over the existing prototype. The owner liked the
earlier pages/flows; this does not approve unresolved policies or a stack.
[Fixed SVG/icon assets](design/qguard-review/brand/README.md),
[revised HTML](design/qguard-review/qguard-review.html),
[page comparisons](design/qguard-review/mobbin-pass/pages.html) and
[references/moves](design/qguard-review/mobbin-pass/README.md) formed the reviewed
baseline. DEC-070 above records the subsequent owner response. Screens, controls, flow previews and a hero section were studied.
No Mobbin limit/refusal occurred. The [actual checks](design/qguard-review/mobbin-pass/verification.md)
cover responsive route states, selected interactions, brand images and packaging.

The [task record](planning/mobbin-design-pass.md) records the coherent local
commit boundary. Application/legacy/portable workflow remain unchanged. Stack
choice and required policy dispositions remain at the existing owner checkpoint;
no new application implementation, live test, push or deployment is authorized.

## Specification, Design And Stack Checkpoint — 2026-10-27

The authorized pass has reached the [owner checkpoint](planning/review-version/README.md).
The [QG-REVIEW-1 draft](specs/review-version/README.md), Gankster transfer study,
25 product pages plus review catalog, monochrome/color iterations and interactive
local HTML are prepared. Prototype verification covers 79 route/state combinations,
three responsive widths, comparison modes and key behavior; see the
[actual results](design/qguard-review/verification.md). The existing application
and protected portable workflow package are unchanged.

**Stop here before new application work.** The [stack recommendation](planning/review-version/stack-review.md)
is to retain Laravel/Livewire/PostgreSQL/Docker; the owner has not selected it at
this new checkpoint. The packet remains draft; the owner subsequently retained the brand/accepted
the earlier visual baseline and authorized DEC-069 refinement above. Review
P-03 descriptor aggregation/privacy, P-04 excluded-author obligations and P-05
unresolved discrepancy recovery before their affected slices. No unanswered
policy question was auto-approved. The checkpoint visibly recaps the existing
[question/default queue](governance/checkpoint-review-queue.md), including
descriptor audience, party-code assumption and the accepted report timing race.

Use the [work record](planning/design-checkpoint.md) for scope and verification,
then record owner dispositions and reconcile the slice contracts. No live
provider/game/Discord evidence or release approval is supplied by this prototype.

## Product and Design Pass — 2026-10-27

**Readiness after `DEC-068`:** the [planning/design readiness assessment](planning/product-design-pass.md#readiness-to-begin--after-dec-068)
finds no further upfront major decision needed to begin the bounded study,
specifications and design pass. Draft remaining interaction/recovery details
in context; record assumptions and escalate material policy changes. The
stack checkpoint and later live-provider/release gates remain separate.

`DEC-061` selects one required 1–10 honor rating per eligible teammate before
requeueing, plus optional peer communication/play-style sliders. Untouched
midpoints are omitted; descriptors affect neither honor nor matching. Their
summaries were initially recorded as self-and-matched visibility. DEC-076 above
corrects that attribution and selects self-only visibility; individual received
ratings and reviewer identities remain hidden.

`DEC-063` removes the ten-minute feedback expiry and adds session history and
detail/rating pages. DEC-077 now defines shared session end as the trigger;
later Find match attempts redirect there while required ratings remain. Sent ratings are immutable.
`OQ-012` is resolved. `DEC-065` also resolves `OQ-013`: apply submitted eligible
ratings against current state without waiting for everyone; no backdating,
undoing or retrospective recalculation. Known exclusions prevent unapplied
inputs; later reports remain evidence without reversing prior honor effects.
Arrival-order effects are an accepted tradeoff, not proven to always balance out.
The owner explicitly confirmed the report/rating race and deferred changing it
until after version one in `DEF-013`.

`DEC-066` selects open registration and a guest entry on the login page for a
Riot-reviewable prototype. Implement the scoped workflows around expected
provider data; clearly synthetic demo access is separate from normal
matchmaking, which waits for live RSO and required linking/opt-in. The
[access/prototype contract](specs/review-prototype-and-access.md) separates
approved direction and draft acceptance. `DEC-067` defers all Discord
implementation until after Riot approval and RSO integration; even simulated
Discord rooms are unnecessary for review. `DEC-068` authorizes assuming native
party codes work for non-friends, using the structured host form. Proceed with
planning/prototype work; real-player validation returns after RSO in `DEF-014`
before normal-use reliance. Riot approval is not a passed joining test.
[Current Riot evidence](research/riot-review-and-rso-access.md)
supports prototype-first review and distinguishes production API approval from
RSO client setup. No credentials, publication or submission are established.

Follow the [product/design plan](planning/product-design-pass.md): resolve major
direction choices, study relevant competitor details, prepare comprehensive
QGuard specs, monochrome page sketches, color/visual iterations and an HTML
prototype, then revisit the stack before application implementation (`DEC-062`).
The current Laravel/Blade/Livewire/PostgreSQL/Docker build remains the earlier
baseline; none of these new behaviors is implemented. Future desktop/Discord
intent does not activate held tests or approve private client API use.

Under `DEC-064`, visibly review the
[checkpoint decision queue](governance/checkpoint-review-queue.md) at the stack
checkpoint. Timeout/silence is not approval. No tool-confirmed automatic
resolution is currently known; answer-origin limits and material agent defaults
are recorded for review. The accumulated study, policy clarifications and
next-pass decisions form the
[consolidated documentation checkpoint](planning/product-design-pass.md#consolidated-study-and-direction-checkpoint)
in commit `0d446f7`. The later report-race, access/prototype, Discord deferral,
party-code assumption and readiness records are grouped in the
[owner-requested scope checkpoint](planning/product-design-pass.md#owner-requested-scope-checkpoint)
in the commit containing this update. No application change or remote action
occurred.

## Gankster Detail Study — 2026-10-27

`DEC-059` authorizes a [dedicated Gankster study](research/competitors/gankster/README.md).
`DEC-060` now permits autonomous read-only navigation and selects desktop viewing
for the main review. Joining, applications, matchmaking participation, posts,
messages and account/permission changes remain outside scope. The
[study procedure](operations/competitor-study.md) keeps these rules separate.

The [desktop and discovery pass](research/competitors/gankster/observations/desktop-and-group-discovery.md)
inspected the community list at 1440 × 900, its filters, Lf Duo, recruitment and
scrim pages, plus the separate Duos sign-in screen. Main Groups is documented
as listing/application/leader acceptance; Duos advertises compatible pair
matching. No evidence was found of QGuard-style automatic full-team formation
by similar honor. The [matching/status report](research/competitors/gankster/matching-and-game-status.md)
records Gankster's explicit desktop game-state synchronization claim; the exact
In Match trigger, API and manual fallback remain unverified. Onboarding is no
longer blocking the visible list, but its intervening choices were not observed.
Study notes are included in the consolidated checkpoint. Study findings alone
remain candidates; later owner adoptions are explicit in `DEC-061`/`DEC-063`.
`DEC-055` and the held game/Discord tests are unchanged.

## Commit Batching Clarification — 2026-10-27

The owner clarified that meaningful rollback boundaries apply to **all commits**,
including implementation, decisions, routine documentation and study notes.
Save work as it develops and commit coherent verified batches, not individual
edits or replies. Apply the [commit policy](operations/workflow-governance.md#local-commit-design);
related work may remain uncommitted between steps.

## Side Chat Reconciliation — 2026-10-27

The [party-code and Gankster findings](research/valorant-party-codes-and-gankster.md)
add official native Party Invite Codes as a candidate for `DEC-054`'s structured
human-host handoff. Non-friend ordinary-party behavior remains untested. The
code-first check is a proposal; no joining method, API integration or live-test
resumption is newly approved. Gankster's rank-refresh mechanism remains an
inference. The side chat's claim that our discrepancy threshold is unresolved
is stale; `DEC-057`/`DEC-058` below control. No application behavior changed.

## Lobby Discrepancy Confirmation — 2026-10-27

`DEC-056` requires a popup/alert naming the reported teammate and the disputed
rank/account information. A report starts confirmation, not immediate
dissolution. Required respondents must explicitly confirm or deny before
continuing past the QGuard lobby check; agreement is not compulsory. Voter
eligibility and tally are settled by `DEC-057`: exclude reporter and reported
player; one of the other three confirming the mismatch is enough to disband,
even if both others deny it. `DEC-058` rejects an "I can't verify"/abstention
option in this pre-game prompt; players must check and answer matches/does not
match. Actual ability to inspect the rank still needs live evidence. Nonresponse,
timing and recovery remain open in `OQ-010`. These directions are not implemented.

## Integration Research Clarification — 2026-10-23

`DEC-055` selects a future pre-queue rank flow: retrieve the latest available
official match tier after RSO, then require player confirmation or manual
correction on every matchmaking entry. After team formation, peers check actual
lobby accounts/ranks; a qualifying discrepancy disbands the QGuard team with
an explanation and an option to queue again. `DEC-056` subsequently selects the
required confirmation process and `DEC-057` settles its voting rule. See the
[approved direction and remaining contract](specs/first-pass/identity-and-rank.md#subsequent-owner-direction--queue-confirmation-and-lobby-check).
No implementation has changed; the existing first-pass fallback still runs.

`DEC-054` approves prompting a designated host to create the game party and
submit supported joining information in a dedicated QGuard page/prompt, then
presenting it structurally to the other matched players instead of relying on
a chat post. This is a future handoff requirement, not an implemented feature.
The [latest-ranked-match research](research/valorant-client-api-and-ui-status.md#rank-from-the-latest-available-competitive-match)
documents match-associated tier retrieval through the official API, not
guaranteed current rank/RR or QGuard access approval. `DEC-055` selects its use
as the starting evidence for the player's confirmation, not as infallible rank.

`DEC-053` records the owner's preference for the officially documented Riot
developer API, with unsupported requirements kept distinct from private cloud
and local-client alternatives. See the [capability comparison](research/valorant-client-api-and-ui-status.md#official-developer-api-preference-and-capability-comparison).
No integration implementation, provider application or live-test resumption is
authorized; the existing first-pass behavior and fallback remain unchanged.

## Latest Checkpoint — Approved First Pass Implemented And Verified Locally

As of 2026-10-03, the owner approves **QG-FIRST-PASS-1 revision 1 + DEC-052**.
The one amendment makes matched teammates' aggregate honor visible beside game
rank; received-feedback authors and individual received ratings stay hidden.
Start with the
[brief owner review](planning/first-pass/README.md), then the
[specification manifest](specs/first-pass/README.md). `DEC-052` satisfies the
`DEC-051` packet checkpoint and accepts the agent-authored engineering choices
with this amendment. Public launch, controlled operations, provider access and
held Discord/game tests remain outside this approval.
The older readiness paragraphs below retain their dated baseline context;
the missing-draft work they describe is now supplied by this packet.

The owner subsequently explicitly authorized implementation through completion.
S1–S6 are implemented and verified in the fresh `qguard/` directory. See the
[implementation record](planning/first-pass/implementation-evidence.md) for
actual stage status, commands and checks. No repeat packet approval is needed;
the [acceptance results](planning/first-pass/verification-results.md) cover backend,
three browser engines, concurrency, live-update recovery, load and isolated restore.
The local demo is offline again following the owner's latest shutdown request.
Scoped Compose down completed; Docker shows no development or test containers,
and both named volumes remain intact. No images or persistent data were deleted.
Before that shutdown, the demo ran at `http://localhost:8120` for owner inspection.
All seven development services
were started with the existing database volume; `/up` returned HTTP 200, database
reachability passed and there were no pending or failed jobs. The test stack
remains down. No migration, seeding, data reset, backup creation, push or deployment
was performed. Browser automation could not reopen the current tab because its
URL was blocked by browser policy; the owner was given the direct local link.
This health check does not close NAV-WK-01. Setup and synthetic account
instructions are in [the app runbook](../qguard/README.md).

Earlier on 2026-10-03, the owner requested both local stacks be brought down:
`docker compose -p qguard-dev --profile '*' down` and
`docker compose -p qguard-test-local -f compose.test.yaml --profile '*' down`,
from `qguard/`, without volume/image deletion. Docker checks found no remaining
containers for either project and confirmed `qguard-dev-postgres` and
`qguard-test-local_test-storage` still exist. The development database remains;
the disposable test PostgreSQL tmpfs and ephemeral mail inboxes do not survive
container removal. Synthetic test fixtures can be recreated through the runbook.
This shutdown does not resolve NAV-WK-01 or authorize unrelated cleanup.
Next: owner review of the working flows and the
[actual stored-data inventory](operations/first-build-data-inventory.md) under DEF-012.
This is not deployed or approved for real-player/public collection.

Owner chat refinement on 2026-10-03: collapsible Team chat and Enter-to-send,
with Shift+Enter for new lines and preserved drafts. Follow the
[scoped change and verification record](planning/first-pass/implementation-evidence.md#chat-usability-follow-up-2026-10-03)
for current completion status. No change to chat audiences, stored data or held
provider integrations.

Owner navigation refinement on 2026-10-03: Matchmaking now has its own page and
the "Your connections" friends sidebar. Profile & settings combines game profile,
public handle and account security. The existing `/dashboard` URL remains valid;
the account page is `/profile`. See the
[scoped separation record](planning/first-pass/implementation-evidence.md#matchmaking-and-profile-separation-2026-10-03)
for verification and limits. No change to friend-data access, matching policy or
held integrations; the reusable workflow package remains unchanged. This UI
packet is **revision-required**, not fully verified: backend, Chromium, Firefox
and two recovery tests pass, while WebKit's zero-page-error check catches an
aborted background request during room-to-feedback navigation (NAV-WK-01).

## Prior Context And Continuing Authority

- **Last updated:** 2026-10-03
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
  feedback history for first-version honor. `DEC-034` excludes volatility and
  reviewer-deviation accountability from current implementation, preserving
  them as future ideas. `DEC-035` through `DEC-041` add optional voice queueing,
  deferred real Discord integration, rank-compatible/widening honor matching,
  partial parties/basic friends, non-public reputation, initial no-show rules,
  a human report inbox and three-dimension pending feedback. Two distinct
  reports automatically invalidate the target's outgoing ratings for that
  match before human review and are tagged for admins; automatic penalties
  remain deferred. `DEC-042` through `DEC-046` delegate reversible development
  details and select participant-declared session end, ten-minute feedback
  settlement, own honor display, player-hidden reviewer identities, cleared-
  admin case/account access, native private match text and no-Discord queueing
  only for now. `DEC-047` now retains actual first-pass feature records without
  automatic expiry, with immediate second-pass review under `DEF-012`.
  `DEC-048` delegates identity/rank integration and approves declared rank
  plus teammate mismatch checks when official access is unavailable/gated.
  `DEC-049`/`DEC-050` select Docker, PostgreSQL, no initial Redis and
  Blade/Livewire, with persistent database storage and Docker-based backend/
  browser tests using synthetic accounts.
  Concrete specifications are approved by `DEC-052`, including matched-team
  honor visibility; feedback privacy remains, with no broad questionnaire required
- **Objective:** review the completed first-pass build and actual data inventory;
  preserve live-test hold, future exclusions and controlled-operation gates
- **Current route:**
  [Approved execution plan](planning/first-pass/execution-plan.md), with the
  [owner approval/amendment record](planning/first-pass/review-evidence.md#owner-approval-and-visibility-amendment--2026-10-03)

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
- Running Compose services at implementation completion: isolated QGuard development
  and test stacks; earlier relocation inspection had no project services running.
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
- `DEC-008`/`DEC-042` and the
  [workflow-governance policy](operations/workflow-governance.md) control
  TeamRadar-specific rule changes, approvals, decision supersession,
  specification gates, commit boundaries, controlled operations, review
  batching, reviewer authority and explicit reversible-development delegation.
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
- `DEC-025` chooses session grouping. `DEC-037` partially supersedes its friend
  exclusion: basic friendships/add-friend functionality, invitations and
  partial pre-made parties are now current scope. Lasting-team management and
  past-teammate history UI/friend discovery remain excluded (`DEF-010`).
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
  correction contracts still need specification. `DEC-047` selects first-pass
  evidence retention without automatic expiry, then `DEF-012` review; no data
  deletion is authorized. Reference choice, gradual adaptation, startup responsibility
  and independently named settings are reaffirmed, not new owner blockers.
  Current draft mathematics does not already track typical rating spread.
- `DEC-034` excludes incoming-rating volatility/adaptive dampening and
  outgoing-reviewer-deviation accountability from current implementation.
  Existing core honor decisions remain in force without these calculations.
  Both possibilities are preserved in the adjacent future section and `DEF-006`;
  no feature adoption, data collection or consequence is approved. Their open
  design questions are not current blockers and require explicit owner reopening.
- `DEC-035` refines `DEC-024`: users choose queueing with or without Discord
  voice; real Discord implementation is excluded from this scope (`DEF-007`).
  `DEC-046` now requires native private match chat and only no-Discord queueing
  until integration. Future voice pools wait unless current architecture truly
  needs the boundary, then strict separation is a conditional planning default.
  The availability/test prerequisite is not new provider release evidence.
- `DEC-036` requires actual game rank/party compatibility first, then favors
  honor closeness and widens acceptable similarity with wait time. Widening
  may never break game compatibility; rates/limits are adjustable development
  settings. `DEC-044` delegates research and initial region/language queue
  controls to the implementation agent, with owner first-build review and
  later passes. Actual game rules need current evidence before reliance.
- `DEC-037` excludes original pre-made co-members' ratings of each other, not
  ratings between all site friends. `DEC-038` chooses non-public reputation;
  `DEC-045` now shows own honor, requires no received-feedback/history screen,
  hides reviewer identities from players, and permits data-cleared admins to
  inspect available case/account context without participant-anonymity redaction.
  `DEC-047` now retains stored first-pass evidence until explicit deletion;
  admin access still does not permit credential disclosure.
- `DEC-039` selects the initial five-minute no-show challenge and 30-second
  response direction, removal/team disband on failure, and early-leaver rating
  ineligibility. `DEC-043` requires all other teammates' votes and permits an
  I joined acknowledgment to stop removal. It is unverified self-report;
  stronger involvement/griefing checks remain later (`DEF-008`). Original
  partial-party persistence/recovery is optional agent discretion (`DEC-042`),
  not an upfront question. No game-presence proof or automatic penalty implied.
- `DEC-040`/`DEC-041` select a human report inbox and automatic invalidation
  of a reported player's outgoing ratings for that match after two distinct
  reporters, across any categories, before human review; tag it in the admin
  view. Owner follow-up resolves automatic consequences versus deferred
  automatic penalties, punishment tools and later correction/appeal policy.
  Three 1–10 dimensions (communication, sportsmanship, effort) feed a simple
  mean into honor. `DEC-043` now opens feedback via each participant's Session
  ended action; first finalized submission starts a ten-minute window, with
  early settlement if everyone finishes. Sessions can include multiple games.
  Submission/late-report/counting edges now have approved first-pass contracts
  under `DEC-052`; implementation and actual tests are still required.
  First-pass evidence retention is now `DEC-047`; no actual collection follows.
- `DEC-042` delegates reversible development choices within approved scope,
  with documented defaults/tests and owner review after the first build.
  Multiple viable options alone do not justify an owner question. Fundamental
  or consequential choices outside the delegation, sensitive data/permissions,
  scope changes and controlled operations retain applicable owner/review gates.
- `DEC-052` approves the bounded local first-pass contracts: PC Competitive
  five-player grouping, declared-rank fallback, matching, honor formula,
  coordination, report handling, architecture and implementation stages. This
  does not approve a complete public-use/audience boundary, real API integration,
  production operation or later moderation policy. Optional Discord room/voice
  direction is selected but actual integration is excluded now; voice recording
  remains an unapproved proposal.
- `DEC-047` settles temporary development retention: all records stored by
  approved features remain without expiry until explicit deletion; cleared
  admins can inspect them. Immediately after the first implementation, review
  the actual inventory and retention/restriction/deletion policy in `DEF-012`.
  This does not change aggregate honor scoring or authorize public collection.
- `DEC-048` delegates the coupled identity/ownership/rank flow to the
  implementation agent using current official evidence. Use official retrieval
  if accessible; otherwise self-declaration is approved, including when Riot
  approval or another owner choice would hold it up. Show stated ranks and ask
  for observed discrepancies at Session ended; peer feedback is not official
  verification. No fresh provider capability or permission is established.

- `DEC-049`/`DEC-050` select the Laravel/Docker direction, PostgreSQL with
  persistent storage, Blade/Livewire and no initial Redis. Require Docker-based
  Pest and PHPUnit backend unit/integration/regression tests, PostgreSQL-backed
  integration/concurrency checks and every implemented first-pass browser flow
  with synthetic seeded accounts. Test data must be isolated from persistent
  development data; live provider capability is not proved by synthetic tests.
  The detailed technical/specification/test packet is agent drafting work.

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
- **Completed, 2026-10-03:** `DEC-034` records the current-scope exclusion of
  volatility and preserves it beside the less-developed reviewer-deviation
  accountability idea. The latter distinguishes ratings a player gives from
  ratings they receive; detection direction and effects on their own honor
  responsiveness remain future questions. `DEF-006` gates any reconsideration;
  neither is an approved later implementation commitment.
- **Completed owner-answer record, 2026-10-03:** all eight annotations mapped
  into `DEC-035` through `DEC-041`, with clear current/future boundaries and
  partial supersession of `DEC-024`/`DEC-025`. Owner follow-up explicitly resolves
  automatic rating invalidation versus penalties; admin tagging is included.
- **Completed first-pass refinement record, 2026-10-03:** six latest owner
  annotations recorded in `DEC-042` through `DEC-046`: bounded agent discretion,
  Session ended/ten-minute settlement, no-show vote/response, initial filter
  responsibility, player/admin audiences and native chat/no-Discord queueing.
  `DEF-011` records session/feedback polish; other future exclusions preserved.
- **Completed question-seven record, 2026-10-03:** `DEC-047`/`DEC-048`
  record all three latest annotations. No missing answer in that set.
  Retention refinement is `DEF-012`; identity/rank details are delegated, with
  the conditional first-pass fallback already approved.
- **Completed stack confirmation, 2026-10-03:** `DEC-050` records explicit
  core-stack approvals and persistent-storage/backend/browser-testing additions.
  The selected stack no longer blocks detailed planning; no app setup occurred.
- **Completed packet review (`DEC-052`):** owner accepts revision 1 with matched
  honor shown beside rank and feedback identities hidden. Specs, access matrix,
  flow/tests and current approval state are reconciled. Next is S1 under the
  approved plan, not another specification approval question.
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

## First-Pass Readiness Review — 2026-10-03

**Update:** the subsequent [modular packet](planning/first-pass/README.md) now
supplies the specification/plan/test drafting identified below. This earlier
readiness baseline is not an instruction to draft it again. The subsequent
owner approval is `DEC-052`; historical pending statements below describe that
earlier assessment, not the current gate state.

- **Subsequent stack sequencing:** `DEC-049` requested stack selection before
  detailed planning; `DEC-050` now settles PostgreSQL, Blade/Livewire and no
  initial Redis, reaffirms Docker and adds persistent storage and backend/browser
  testing requirements. Supporting tools such as Reverb/Echo and exact versions
  remain recommendations for the concrete packet. No new application code is
  expected at this stage; its absence is a status fact, not an extra prerequisite.
  Technical design, execution plan and acceptance tests are agent drafting work.
- **Assessment:** ready to prepare the implementation-ready specifications and
  plan; not yet approved to start application coding. The latest request asks
  for readiness, not a specification-gate override. No further answer is
  missing from the identity/rank/retention questions just asked.
- **Verified implementation state:** at `be449c0`, comparison with `master`
  found only workflow/project-document changes. Application, routes, UI, tests,
  migrations, relay/gateway and dependency manifests were unchanged. The root
  Laravel/Livewire manifests and tests belong to the legacy app, not a new
  rewrite or a selected rewrite stack. No current rewrite code was found.
- **Verified specification state:** the specification index lists two product
  modules, both incomplete for implementation. The coordination outline is
  queued, not execution-approved. Existing client test plans are not an app
  execution plan. No approved new-code location, complete state/data contract
  or per-slice acceptance packet is present; the subsequent core stack direction
  is now selected in `DEC-049`/`DEC-050`.
- **Current product coverage:** Valorant session grouping, solo/partial parties
  and basic friends/invitations, rank-compatible/honor-aware queueing, private
  website chat, participant session end, report-aware feedback/honor settlement,
  own-score display and cleared-admin review are settled directions. Apply
  `DEC-047`/`DEC-048` for data/identity/rank. Do not reduce this to a
  coordination-only mock or silently omit honor.
- **Agent work before coding:** turn those decisions into coherent modules
  covering identity/source status, queue/party/session states, permissions,
  retained records, honor/feedback/report processing, concurrency/idempotence,
  error/recovery behavior and tests. Document delegated choices, fresh official
  game-rule/API evidence when relevant, and the independent commit sequence.
  Elaborate the selected stack and propose the new-code layout with legacy
  preserved. These are drafting and engineering responsibilities, not another
  broad owner quiz.
- **Remaining owner gate:** approve the applicable concrete specification
  packet/plan under `DEC-008`; it may expressly leave bounded details to the
  implementation agent. No need for final constants, final retention durations,
  Discord tests or Riot approval to design a first-pass fallback version.
- **Later gates:** `DEF-012` review immediately after the first build; actual
  provider applications/access, held joining tests, real Discord integration,
  and real-user collection/release remain separately controlled. This
  assessment is not a current API, safety or legal-compliance finding.

## Verification State

- Packet approval/amendment unit at clean `aa3ded2`: `DEC-052` records the
  owner's approval and exact visibility change. Matched aggregate honor is
  separated from hidden received-feedback authors/details across specifications,
  data audiences and acceptance criteria. Documentation QA and unrun application
  checks are recorded in the [owner review record](planning/first-pass/review-evidence.md#owner-approval-and-visibility-amendment--2026-10-03).
  This unit changes project records only, not the protected workflow or app.

- First-pass planning unit at baseline `c0008f7`: modular scope/state/data/
  architecture/security specifications, six-stage plan and acceptance matrix
  drafted with owner-decision/deferral traceability. Current primary technical
  and Riot rule sources reviewed; synthetic in-memory honor checks passed,
  with canonical-order sensitivity explicitly measured. Full documentation
  QA/results are in the [packet review record](planning/first-pass/review-evidence.md).
  No rewrite application, dependency install, container/volume change, live
  integration test, push or deployment. Approval was pending at that planning
  checkpoint and is now satisfied by `DEC-052`.

- Core-stack approval/persistence/testing record at clean `13d0657`: owner
  selections reconciled into `DEC-050` and planning entry points. Docker volume
  lifecycle, Pest/PHPUnit relationship and Laravel test/queue documentation
  checked against primary sources; these do not establish a working app.
  All 54 project Markdown files, 234 local links and 40 anchors checked;
  50 decision IDs and 12 deferred-work IDs are unique and sequential. Complete
  six-file diff reviewed and `git diff --check` passed. No application/backend/
  browser tests, seeders or persistence experiment ran; no containers/volumes changed,
  no protected workflow or legacy implementation changed, and no push/deployment.

- Stack recommendation unit at clean `0a7f506`: current primary Laravel/PHP,
  SQLite/PostgreSQL, Docker and Pest documentation reviewed; `DEC-049` records
  the owner direction separately from the agent's linked stack proposal.
  Docker client/engine 29.6.1 and Compose 5.3.0 verified read-only; host PHP
  testing issue remains owner-reported. No images built/pulled, services
  changed, dependencies installed, application tests or benchmarks run.
  Project-document QA passed: 54 Markdown files, 233 local links and 39
  fragment targets checked; 49 decision IDs and 12 deferred-work IDs are
  unique. The complete five-file scoped diff was reviewed and
  `git diff --check` passed. No canonical workflow package or app files changed;
  no deployment. Save as one coherent local documentation commit.

- Current question-seven reconciliation/readiness unit: clean `new-development`
  at `be449c0`; inspect-only baseline established before project-record edits.
  Route: product planning, audit/reconciliation, decision/recommendation safety,
  privacy/data, owner/external review and deferral/owner review. Mandatory entry,
  always-applicable rules and selected procedures read. Owner annotations 1–2
  map to `DEC-047`/`DEF-012`, annotation 3 to `DEC-048`. All 54 project
  Markdown files, 229 local links, 36 anchors, 48 sequential decisions and
  twelve sequential deferrals checked; four mathematical text blocks unchanged.
  Complete ten-file scoped diff reviewed and `git diff --check` passed.
  Application/live tests and the protected-workflow validator were not run:
  no app or workflow package changed. No fresh provider research, actual
  collection, deletion, push or other external operation occurred. One coherent
  local documentation commit boundary; no runtime/effectiveness claim follows.

- The 2026-10-03 first-pass refinement began with clean `new-development` at
  `bb153c8`. Evidence-only six-annotation reconciliation preceded edits.
  Route: product planning, decision/recommendation safety, privacy/data,
  owner/external review, deferral/owner review and audit/reconciliation.
  Mandatory entry, always-applicable documents and selected procedures read.
  Current one-through-six choices closed or explicitly delegated; data and
  applicable specification/acceptance gates remain. All 54 project Markdown
  files, 226 local links, 32 heading anchors, 46 unique sequential decisions
  and eleven sequential deferrals checked; all four mathematical text blocks
  unchanged. Complete ten-file scoped diff reviewed; `git diff --check` passed.
  One coherent local documentation commit boundary. No app/full scoring/live
  tests or fresh
  provider research; no canonical workflow or legacy app change, real
  collection, push or external operation. New session/report effectiveness
  and permission enforcement are not established by document checks.
- The 2026-10-03 owner-answer reconciliation began with clean `new-development`
  at `49b379d`. Evidence-only inspection preceded corrections; recovery found
  no partial writes or unrelated modifications. Route: product planning,
  decision/recommendation safety, privacy/data, owner/external review,
  deferral/owner review, audit/reconciliation and interruption/recovery.
  Mandatory entry and selected procedures read. Eight annotations and the
  follow-up consequence/penalty clarification are recorded, with remaining
  behavioral ambiguities open. All 54 project Markdown files, 226 local links,
  32 heading anchors, 41 unique sequential decisions and ten sequential
  deferrals checked; all four mathematical text blocks are unchanged. Complete
  nine-file scoped diff reviewed and `git diff --check` passed. One coherent
  local documentation commit boundary; no app/live/full scoring tests or fresh
  provider research run. Protected-workflow validator not run because its
  package is unchanged. No canonical
  workflow, legacy app or external state changed; no push. No complete
  implementation slice or production readiness is approved.
- The 2026-10-03 future-honor scope record began with clean `new-development`
  at `783a56c`. Product planning, decision/recommendation safety, privacy/data,
  owner/external review and deferral/owner review routed the unit; mandatory
  entry, always-applicable documents and selected procedures were read. Seven
  project records only: both ideas are future-only, current adoption questions
  removed, existing honor authority and four mathematical text blocks preserved.
  All 54 project Markdown files, 223 local links, 30 heading anchors, 34 unique
  sequential decisions and six sequential deferrals were checked. Full scoped
  diff and `git diff --check` passed. No new mathematics, app implementation,
  live test, collection or external state change; no push. Application/scoring
  tests and the protected-workflow validator were not run for documentation-only
  changes. Future usefulness, fairness, data needs and consequences remain
  undecided and cannot become current implementation requirements implicitly.
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
  Riot approval, prove private interfaces absent, or authorize client automation.
  The first-pass declared-rank fallback is separately approved by `DEC-048`.
- Looking to Play exists in the researched record but is rejected for QGuard by
  `DEC-019`; no Looking to Play test may route current work.
- Manual Steam group-chat links provide a promising non-friend text/voice path,
  but no supported QGuard creation/management API was found. Under `DEC-020`,
  they do not meet the preferred coordination criterion. Persistent Steam
  Community Groups are not the requested communication object.
- Optional future Discord room/voice planning and private Discord text for
  the link alternative remain selected by `DEC-024`/`DEC-035`. `DEC-046` now
  requires native private match text and only no-Discord queueing. Future
  Discord-specific admission/lifecycle choices do not block that native slice;
  current data/security and acceptance contracts still gate it.
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

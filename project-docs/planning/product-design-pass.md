# QGuard Product and Design Pass

- **Record type:** current plan and decision agenda
- **Authority:** `DEC-061`–`DEC-068`; project governance remains controlling
- **Owner:** project owner approves product/design/stack; primary agent prepares artifacts
- **Status:** bounded study/spec/design work prepared and verified; at the
  [owner stack/spec/design checkpoint](review-version/README.md). No new
  application implementation started; review dispositions remain pending
- **Updated:** 2026-10-27
- **Update trigger:** owner answer, relevant study evidence, design review or stack decision

## Objective and Verified Baseline

Current result: [checkpoint work record](design-checkpoint.md),
[review-version specs](../specs/review-version/README.md) and
[design/prototype](../design/qguard-review/README.md). The sequence below retains
its planning rationale; later evidence is in the checkpoint packet. Prepared
artifacts and agent recommendations do not constitute owner approval.

Turn the existing QGuard decisions and relevant competitor lessons into one
coherent product specification and a complete page design before the next
implementation. Preserve the existing first pass; this is not permission to
erase it or reuse historical code requirements.

The initial plan inspection found `new-development` at `1bb74bb`, with an existing
fresh `qguard/` application. Its Composer requirements include Laravel and
Livewire, its frontend uses Blade with Tailwind/Vite, and its Compose files use
PostgreSQL and Nginx. Docker, PostgreSQL, no initial Redis and Blade/Livewire
were selected under `DEC-049`/`DEC-050`. Previous tests prove the earlier version,
not the new feedback direction or future game/Discord integration.

The pending Gankster study and all-commits batching clarification predate this
plan and must be preserved. No process or write from the interrupted planning
turn remained active; inspection showed no partial product-direction edits.

The readiness check after `DEC-068` confirms the current branch is
`new-development`, based at `0d446f7`, with the related later decision/spec
updates intentionally uncommitted for a coherent batch.

## Settled Direction

The decision register is canonical; this is a navigation summary.

| Area | Current direction |
| --- | --- |
| Core product | QGuard, initially VALORANT; group people for sessions with compatible game ranks and similar honor |
| Parties | Solo and partial-party entry; basic friends/invitations; original premades do not rate one another |
| Honor | Required overall 1–10 rating of every eligible teammate before another queue; preserve existing honor model unless separately changed (`DEC-061`) |
| Honor application | Apply finalized eligible inputs against current state without waiting for everyone; no retrospective corrections; later reports do not undo applied effects (`DEC-065`) |
| Known timing limitation | Owner explicitly accepts the report/rating race for version one; improvements return afterward (`DEF-013`) |
| Access and review milestone | Open registration; guest entry for a Riot-reviewable prototype; expected provider data drives downstream flows, normal matchmaking waits for live RSO (`DEC-066`) |
| Discord and party entry | Defer all Discord implementation until after approval and RSO (`DEC-067`); assume native non-friend party codes work now, with real-player checks after RSO (`DEC-068`, `DEF-014`) |
| Descriptions | Two optional peer sliders, communication tendency and play style; untouched means absent; summaries for self and matched teammates; no scoring/matching use |
| Session history | Participant history and detail/rating pages; feedback has no ten-minute expiry; unfinished required ratings redirect from Find match; sent ratings are immutable (`DEC-063`) |
| Rank and joining | Official API preference, latest-observed-rank confirmation/correction, structured human-host handoff and replaceable joining; existing discrepancy decisions remain |
| Surfaces | Desktop-oriented website with mobile compatibility; future companion app and Discord direction, not a selected shell or completed integration |
| Sequence | Major decisions → relevant competitor study → comprehensive QGuard specs → monochrome pages → color/iterations → HTML prototype → stack review → approved implementation |

Do not reopen game selection, honor versus skill, mandatory feedback, descriptor
audience, or public reviewer identities merely because the competitor differs.

## Remaining Decision Agenda

Resolve one consequential group at a time. Do not turn every configurable value
or screen detail into an upfront question.

| Order/stage | Issue and canonical record | Why it matters / what is already settled |
| --- | --- | --- |
| Resolved feedback group | [OQ-013](../governance/open-questions.md#oq-013---when-does-honor-update-while-other-session-feedback-is-outstanding) | `DEC-065` selects immediate application without retrospective corrections, including no reversal after later reports; implement consistent eligibility checks and idempotency in the future contract |
| Resolved initial access model | OQ-005 | `DEC-066` selects open registration, guest access for Riot review and live RSO before normal matchmaking; this is not permission to deploy or collect real users now |
| Resolved Discord and handoff direction | OQ-007/OQ-009/OQ-011 | `DEC-067` defers Discord implementation entirely until after approval and RSO. `DEC-068` authorizes planning/prototyping around non-friend native party codes; real-player verification waits until after RSO and before normal-use reliance |
| Before public-facing scope/collection | OQ-004/OQ-005/OQ-006 and DEF-012 | Define actual release audience/access, age/market boundaries and real-data/moderation obligations. International intent is known; it is not blanket worldwide release approval. These do not block private wireframes |
| After specifications and HTML design | OQ-007, stack review | Reconsider the existing stack against the finished flows and future companion needs. No framework choice required now |

Ordinary session recovery details, slider labels, aggregate smoothing/sample
display, layout, component choices, configurable matching constants and ordinary
form behavior can be drafted as explicit agent proposals within the approved
direction and reviewed in context. Escalate only a real policy change, such as
waiving mandatory ratings, showing individual reviews, changing scoring or
promising an unavailable integration. No new paid tier, subscription, public
LFG feed, permanent teams or Duos product is selected by “like Gankster.”

## Work Sequence and Acceptance

### Readiness To Begin — After DEC-068

**Agent assessment, 2026-10-27:** no further major owner choice is needed to
start the authorized study/specification/design work and progress toward the
stack checkpoint. This assessment applies existing decisions; it is not a new
owner approval of the unfinished specifications, designs or implementation.

- **Proceed now:** complete the relevant read-only Gankster study; draft the
  comprehensive modular specifications and page/state inventory; produce
  monochrome wireframes, visual iterations and the local HTML prototype.
- **Resolve while drafting:** rank-unavailable and discrepancy-response recovery,
  host/code errors, incomplete sessions, descriptor aggregation/display and
  ordinary interface details. Propose reversible details within the existing
  delegation. Surface a material policy conflict when concrete; do not silently
  introduce a new exemption, scoring rule, privacy audience or approval.
- **At design/stack review:** show the complete page/flow coverage, unresolved
  consequential choices, assumptions and checkpoint review queue; review the
  stack before new application implementation. Existing representative visual
  reviews remain part of the design sequence, not a demand to decide all screen
  details before starting.
- **Later milestones:** provider access, actual RSO, `DEF-014`'s party-code test,
  `DEF-007`'s Discord integration and real-user release/audience/data policies
  remain separate. They do not block the bounded synthetic prototype. The
  party-code assumption must not be presented as verified or a prototype as
  release-ready.

Evidence reviewed: live decisions/questions/deferrals, coordination and review
prototype contracts, competitor coverage, and actual Git state. Remaining
`OQ-004`–`OQ-007` and `OQ-009`–`OQ-011` items concern drafting details, evidence
or later approval stages; none warrants restarting the upfront questionnaire.

Validation: reviewed this readiness update and its current-state/question
routing; local links/anchors and whitespace checks passed. Documentation only;
no new product decision, application change, commit or external action.

### 1. Close Consequential Direction Choices

Record answers immediately in the decision register and affected product
records. Feedback expiry, honor-application timing and open registration are
resolved. The [review-prototype/access contract](../specs/review-prototype-and-access.md)
sets the pre-approval milestone and RSO gate. Discord deferral and the native
party-code assumption are now explicit; identify what is in the next deliverable
versus future or provider-gated using existing approvals rather than restarting
the entire project questionnaire. A spec may include unresolved integration
branches if it labels them honestly and does not claim implementation readiness.

### 2. Complete the Relevant Competitor Study

Use [the study index](../research/competitors/gankster/README.md) and
[read-only procedure](../operations/competitor-study.md). Build a feature-to-evidence
matrix for onboarding/accounts, rank freshness, group/roster presentation,
joining instructions, voice coordination, friends/partial parties, session
states, feedback/reputation and reports. Inspect normal, empty, loading, error
and permission states only where available without participation or mutation.

For each useful detail, record what the user sees/does, source and date, actual
evidence versus backend hypothesis, relevance to QGuard, proposed adaptation
and disposition: adopted, candidate, excluded or future idea. Use the existing
comparison file rather than treating Gankster as the product specification.
Maintain a separate future-only list for attractive out-of-scope features;
recording an idea does not approve it or make it a first-version requirement.
Inaccessible states remain explicit evidence gaps, not reasons to join a group.

### 3. Write the Comprehensive Specification Revision

Create a modular revision under `project-docs/specs/`, linked from its index.
Keep the implemented first-pass contracts/evidence recognizable and map every
changed requirement to a decision or labeled proposal. Cover scope/personas,
journeys and states, accounts/rank, friends/parties, queue/matching, team room,
party handoff, communication, session end, honor/descriptors, reports/admin,
data/access/retention, provider adapters/fallbacks and acceptance criteria.

Include normal, empty, missing-data, pending, failure, recovery, permission,
responsive and accessibility behavior. Define untouched versus intentional
midpoint input, required feedback completion, truthful summary provenance and
received-rating privacy. Resolve cross-module conflicts, especially queue entry
versus outstanding feedback and report-aware honor application, before calling
the revision complete.

Keep functional/data contracts stack-neutral until the scheduled review.
Technical architecture and migration/execution details are finalized after it.
No automatic access to private Riot APIs follows from designing a desktop app.

### 4. Inventory Every Page and Produce Monochrome Wireframes

Start from the existing page/flow inventory, then reconcile every approved
next-version addition. Cover public entry where in scope; authentication and
onboarding; profile/settings; friends and partial party; queue/search; matched
roster and host handoff; text/voice states; discrepancy/no-show flows;
session history/list/detail and required feedback; reports; admin inbox/detail;
and relevant error/access
pages. Classify dialogs, panels and variants explicitly instead of inventing
a separate route for every state.

Give every scoped page an identifier, audience, entry/exit, data/actions,
decision references and state coverage. Create simple black-and-white sketches
first, led by the desktop experience, with mobile adaptations and keyboard/focus
requirements. Do not stop at a landing page or a few isolated components.

### 5. Apply Visual Direction and Iterate

Propose QGuard's own typography, spacing, colors, contrast and reusable
components. Review representative pages, then apply the approved direction
across the inventory. Iterate on hierarchy, density and comprehension with the
owner; track which page/state revisions are approved. Observation of a competitor
does not license copying its branding, personal data or proprietary assets.

### 6. Build and Review the HTML Design Prototype

Keep durable design sources under `project-docs/design/` when that stage starts;
put generated captures/build output in the outer workspace's `outputs/` area
and link the tracked evidence. Do not change `qguard/` during design work.
Use synthetic accounts, ranks, honor and style examples. Demonstrate navigation
and ordinary interactions locally, with simulated external flows clearly
identified. Inspect desktop and mobile, keyboard/focus, labels, contrast,
overflow and all inventory states. Controls must work in the prototype or be
honestly unavailable. No live game, bot or account operation is implied.

### 7. Revisit the Stack, Then Prepare Implementation

Present the [checkpoint review queue](../governance/checkpoint-review-queue.md)
explicitly, including material agent defaults, uncertain answer provenance and
any tool-confirmed automatic resolutions. Record owner dispositions before
relying on required approvals; do not merely link the queue without discussing it.

Present a concrete comparison against the existing stack using the completed
product/design needs: real-time web flows, desktop/native boundary, provider
access, deployment/testing, maintenance and migration cost. Chromium is a
candidate shell, not a decision or proof of API capability. Obtain the owner's
stack decision, finalize dependent technical contracts and the implementation
packet, and confirm all applicable specification/design approvals. Only then
begin application backend/frontend work under the normal gates.

## Verification and Routing for This Planning Update

Route: product planning, decision/recommendation safety, privacy/data, owner
review, design planning, audit/reconciliation, deferral and interruption
recovery; research procedure governs reuse of competitor evidence. Mandatory
entry, always-applicable system records, live project registers and selected
procedures were read. No agent delegation, application-code, migration,
deployment or live-provider route is activated.

Acceptance for this update: precise owner decisions and partial supersessions;
unchanged first-pass code/evidence and unrelated pending work; visible remaining
policy conflict; complete ordered artifact plan with the stack gate; valid links
and a reviewed scoped diff. No mockup, new implementation, external source
recheck or live test is claimed by this record.

Earlier decision checkpoint, before `DEC-065`: reviewed the scoped document changes and
new plan/review queue against the owner's answers, typed corrections and the
first-pass baseline. All 280 local links, 50 anchors and 64 unique decision
headings across the 23 pending Markdown files passed checks; `git diff --check`
passed. No `qguard/` or protected portable-package diff exists. Application
tests, rendered prototype checks and the portable validator were not run:
this update changes project records only. Prior study work remains preserved.
No new commit or remote action occurred; related notes remain pending for a
meaningful batch. At that checkpoint `OQ-013` was still open; `DEC-065`
subsequently resolves it through the owner's explicit response. Full competitor
coverage, comprehensive next-pass specs, sketches, HTML and stack review are
upcoming stages, not completed deliverables.

## Consolidated Study and Direction Checkpoint

After the owner resolved `OQ-013`, the accumulated Gankster walkthrough,
read-only study permission, commit/review conventions and resulting next-pass
product direction form one coherent documentation checkpoint. Its rollback
boundary is this study-to-product-planning update, including discovery links,
supersession notices and the new review queue. No prior source/legacy file,
application behavior, protected workflow package or first-pass test evidence
is replaced. The original baseline is `1bb74bb` on `new-development`.

Reviewed all scoped changes and new records. Checks passed for 23 Markdown
files, 282 local links, 52 anchors, 65 unique decision IDs and whitespace.
`OQ-013` is explicitly resolved by `DEC-065`, not an automatic default. The
accepted no-correction consequence is that later reports cannot undo already
applied effects; no small-error guarantee is claimed. Initial release access
remains an owner question; no approval is inferred from silence.

This record and its related files are grouped into one additive local commit;
its identity is available from Git history. No push, PR, deployment or live
provider action accompanies it. Application/rendered tests and the portable
validator are not applicable to this documentation-only checkpoint. New
specifications, design artifacts and implementation remain subject to the
sequence and approval boundaries above.

## Access And Riot Review Update — 2026-10-27

The owner's next answer closes open-versus-invite access with `DEC-066` and
confirms the report/rating race as a version-one limitation under `DEF-013`.
The earlier checkpoint's access question is historical, not still unanswered.
The Discord question was open at this checkpoint. The owner's subsequent
answer explicitly resolves it in `DEC-067`; the next instruction authorizes
the native-code assumption and post-RSO validation in `DEC-068`.

Route: product planning, research/sourcing, decision/recommendation safety,
privacy/data, owner review, audit/reconciliation and deferral. The prior entry
and routed procedures remain applicable. Reviewed Riot's VALORANT, FAQ and
portal documentation on 2026-10-27; recorded facts separately from owner
choices and draft guest/acceptance details. No application implementation,
provider operation, publication or submission was performed.

Verification: reviewed the complete scoped diff and both new records; checked
12 Markdown files, 238 local links, 46 anchors and 66 unique sequential decision
IDs with no failures. Whitespace checks pass. Changes remain uncommitted for
the next meaningful documentation batch. Application/rendered tests and the
portable validator are not applicable; neither application code nor the
protected workflow package changed. This is recorded direction and a draft
contract, not a completed prototype or proof of live integration.

### Discord Deferral And Native-Code Assumption Follow-Up

`DEC-067` removes Discord implementation from version one entirely, including
any obligation to demonstrate simulated Discord rooms. `DEC-068` makes native
party codes the explicit non-friend working assumption; `DEF-014` returns the
real-player check after RSO integration. Neither item is an unanswered upfront
choice. Continue the study/specification/design sequence on that basis.

Inspected the current coordination and session contracts plus the existing
`qguard/app/Livewire/Room.php` and game-handoff boundary: QGuard session controls
do not require Discord attendance. Rechecked Riot's official patch 7.12 code
feature documentation; this is not a current-client/non-friend result. The
dependency assessment records native text, core matching/feedback independence,
deferred voice/Discord Join, and the explicitly accepted party-code assumption.

Reviewed the follow-up changes and reconciled obsolete pending-question and
test-first wording. Validation passed for the accumulated 14 Markdown files,
251 local links, 52 anchors, 68 unique sequential decisions and 14 unique
sequential deferrals, plus whitespace. Application code and the protected
workflow are unchanged; no live tests, external mutations or remote actions
were performed. Keep these related records uncommitted for a coherent batch;
this documentation check is not implementation or integration acceptance.

## Owner-Requested Scope Checkpoint

The owner explicitly requests a commit of the current state on 2026-10-27.
This additive documentation checkpoint groups `DEC-066`–`DEC-068`, the
report-timing confirmation/deferrals, official Riot access research, the draft
review-prototype/access contract and the readiness assessment with their
dependent indexes and registers. Reverting this unit restores the preceding
scope-planning state without changing application behavior or the portable
workflow package. Earlier uncommitted-state notes describe the checkpoints
when they were written, not the result of this commit.

Resume with the remaining relevant read-only Gankster study, then the modular
specification revision, complete page/state inventory, monochrome wireframes,
visual iterations and local HTML prototype. Those artifacts are unfinished;
the stack and implementation approval checkpoint still follows them. Preserve
the explicit party-code assumption and the later provider/testing gates.

The complete scoped changes and both new records were reviewed. Checks passed
for 14 Markdown files, 253 local links, 54 anchors, 68 unique sequential decision
IDs, 14 unique sequential deferral IDs and whitespace. Application/rendered tests and the portable-package
validator are not applicable because those artifacts are unchanged. No push,
provider submission, deployment or live test accompanies this local checkpoint.

# QGuard Product and Design Pass

- **Record type:** current plan and decision agenda
- **Authority:** `DEC-061`–`DEC-065`; project governance remains controlling
- **Owner:** project owner approves product/design/stack; primary agent prepares artifacts
- **Status:** direction clarification active; expanded study, comprehensive specs
  and page design follow the consequential decisions; implementation not started
- **Updated:** 2026-10-27
- **Update trigger:** owner answer, relevant study evidence, design review or stack decision

## Objective and Verified Baseline

Turn the existing QGuard decisions and relevant competitor lessons into one
coherent product specification and a complete page design before the next
implementation. Preserve the existing first pass; this is not permission to
erase it or reuse historical code requirements.

Repository inspection confirms `new-development` at `1bb74bb`, with an existing
fresh `qguard/` application. Its Composer requirements include Laravel and
Livewire, its frontend uses Blade with Tailwind/Vite, and its Compose files use
PostgreSQL and Nginx. Docker, PostgreSQL, no initial Redis and Blade/Livewire
were selected under `DEC-049`/`DEC-050`. Previous tests prove the earlier version,
not the new feedback direction or future game/Discord integration.

The pending Gankster study and all-commits batching clarification predate this
plan and must be preserved. No process or write from the interrupted planning
turn remained active; inspection showed no partial product-direction edits.

## Settled Direction

The decision register is canonical; this is a navigation summary.

| Area | Current direction |
| --- | --- |
| Core product | QGuard, initially VALORANT; group people for sessions with compatible game ranks and similar honor |
| Parties | Solo and partial-party entry; basic friends/invitations; original premades do not rate one another |
| Honor | Required overall 1–10 rating of every eligible teammate before another queue; preserve existing honor model unless separately changed (`DEC-061`) |
| Honor application | Apply finalized eligible inputs against current state without waiting for everyone; no retrospective corrections; later reports do not undo applied effects (`DEC-065`) |
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
| Next, initial access model | OQ-004/OQ-005 | Choose open registration versus invite-only access for the first usable release; this affects onboarding and access screens. It does not authorize real-user collection or deployment |
| Before final next-version scope | Integration milestone within OQ-007/OQ-009/OQ-011 | Distinguish a website prototype/usable manual path from a release that promises working RSO, Discord or companion integration. Existing holds and first-pass exclusions remain; future intent alone does not promote them into the next release |
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

### 1. Close Consequential Direction Choices

Record answers immediately in the decision register and affected product
records. Feedback expiry and honor-application timing are resolved. Initial
release access is the next product-scope question. Identify what is in the next deliverable
versus future or provider-gated; use the existing approvals rather than restart
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

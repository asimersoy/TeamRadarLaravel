# QGuard Implementation-Readiness Review — 2026-09-28

- **Record type:** evidence-only readiness audit and proposed discussion order
- **Status:** review complete; owner input required before an implementation slice
- **Decision authority:** project owner; primary agent authored this assessment
- **Baseline:** clean `new-development` at `45cd0fcdf63dc6f1295aabb8642fb0c2dbcec076`
- **Update trigger:** owner disposition, an approved slice specification, a
  material decision change, or resumed integration validation
- **Authority:** the [decision register](../governance/decisions.md), especially
  `DEC-008`, `DEC-010`, `DEC-013` through `DEC-018`, and `DEC-024`
- **Limit:** this dated assessment does not approve features, a stack, an
  implementation plan, a gate override, or corrections to audited records

## Result

No current implementation slice has a complete approved specification. That is
not a requirement to finish every product discussion before any code. Under
`DEC-008`, only the specifications applicable to the selected slice must be
approved. `DEC-024` permits planning around Discord while leaving real joining
unimplemented and live tests paused.

The immediate missing decision is the first implementation slice's outcome,
scope, and exclusions. Once that is bounded, we can identify its actual product
questions, draft its technical design and tests, and seek approval. The previous
voice-attendance question is relevant to coordination behavior, but answering
it alone will not make the product implementation-ready.

There are two current product modules: partially approved foundations and a
coordination/handoff module with approved direction but proposed detailed
design. The five planning documents contain a discussion agenda, coordination
options, and behavioral-test plans, not an approved application execution plan.
Inspection of `master..HEAD` found changes only to `AGENTS.md`, the workflow
package and project records; the rewrite has not added application code on
this branch. The legacy runtime is not a selected rewrite foundation.

## Already Settled — Do Not Ask Again

- Workflow separation/protection, approval semantics, per-slice specification
  gates, coherent local commits, and explicit controlled-operation authority:
  `DEC-003`, `DEC-004`, `DEC-006` through `DEC-008`.
- Historical understanding is sufficient, with no requirement to reuse legacy
  code, architecture or technology: `DEC-002`, `DEC-012`, `DEC-014`.
- Product name is QGuard. Behavioral honor/reliability is central and distinct
  from skill/rank: `DEC-009`, `DEC-010`.
- Valorant remains the initial planning game. CS2 research did not replace it;
  Looking to Play is rejected: `DEC-018`, `DEC-019`.
- Broad international intent, not Turkey-only or guaranteed immediate worldwide
  service: `DEC-022`.
- Prefer authoritative rank when viable. Self-declaration is not yet selected
  and, if selected, needs truthful labels and report/correction/resolution:
  `DEC-013`.
- Discord room/voice planning is selected. Prefer a verified game-specific
  Discord Join action; accept a human-created official lobby link in a
  matched-only Discord text channel. Keep joining replaceable and unimplemented:
  `DEC-024`. A Group DM is not required when server channels work.
- Live tests remain on the [owner hold](../governance/deferred-work.md#owner-hold--discord-access--2026-09-28).
  Voice recording, transcription and surveillance are not approved.

## Remaining Clarifications And What Each Actually Blocks

The canonical questions remain in the [open-question register](../governance/open-questions.md).
This table decomposes them for readiness; it does not create new decisions or
require answers in one sitting.

| Area | Still to clarify | Needed before |
|---|---|---|
| First outcome and scope — `OQ-004`, `OQ-005`, `OQ-007` | What should the first working version demonstrate? Who uses it? Which game mode, platform, solo/partial-party shape and session duration? Which capabilities are included or explicitly outside that increment? What observable result counts as success? | Approving the chosen slice; only its relevant audience/use boundary is required, not the complete long-term market plan |
| Discovery, matching and session lifecycle — `OQ-005`, `OQ-006`, `OQ-010` | Queue, directory or another mechanism; essential inputs; hard constraints versus preferences; rank/honor effects; acceptance, decline, timeout, cancellation, no-match, blocking/requeue and partial-party behavior; how a session starts and ends | Implementing actual matching/session behavior; synthetic preassembled rosters can isolate a separately approved coordination slice |
| Honor, reviews and moderation — `OQ-006` | Who may review whom and how participation is established; feedback questions; initial/new-user state; score/display/matching effects; reports, correction, abuse resistance, human resolution and appeals | Implementing feedback, reputation or consequences. Honor's central role is settled; omitting it from the eventual first usable product is not an approved default |
| Accounts, rank and data — `OQ-006`, `OQ-009`, `OQ-010` | QGuard login and account recovery; Discord/Riot identity mapping and unlinking; what is verified versus declared; rank freshness/missing-rank behavior; whether/how RSO is needed; collected fields, visibility, operator access, logs, retention and deletion | Real identity/data collection or rank-dependent matching. Synthetic identities/rank may be used only in an approved, clearly labeled simulation |
| Discord coordination rules — `OQ-011` | Mandatory or optional voice attendance; handling unavailable Discord; invite/OAuth admission; room creation/removal triggers; persistent server membership; roster changes; host choice/replacement; access privileges and recovery; whether QGuard handles links or they stay in Discord | Implementing the corresponding coordination rules. Bot provisioning, live admission and room operation also need the held validation and exact environment |
| Technical delivery and completion — `OQ-007` | First product surface; budget/operator constraints relevant to it; runtime/framework/storage and architecture; new-code location with legacy preserved; contracts, authorization, state/concurrency/error handling; tests, acceptance, milestones and rollback | Beginning the selected code slice. No legacy stack is inherited, and no current draft supplies a complete approved technical contract |
| Pilot/public operation — `OQ-004` through `OQ-007`, `OQ-011` | Concrete pilot/launch countries, languages and ages; user notices and claims; applicable qualified reviews; moderation/support ownership; hosting, secrets, monitoring, backup/restore and incident response | The affected real-user collection, consequential feature or release. These are not blanket prerequisites for a local synthetic-data foundation |

Approval of a Discord provider does not settle attendance. Approval of honor's
purpose does not settle its formula. Preference for API rank does not establish
API availability, access or an acceptable fallback. These are distinct gaps.

## Two Different Meanings Of Starting Implementation

### A. An Isolated Foundation While Integrations Wait

**Agent proposal, not selected:** a small coordination-lifecycle slice taking
an explicitly synthetic, preassembled roster, exercising approved local room/
readiness states, and exposing an unavailable game-handoff boundary. Discord
responses would be labeled test doubles, not live room creation. No production
accounts, actual matching, reputation scoring or real provider calls.

Its minimum approval packet would contain:

1. The exact demonstration outcome and exclusions, including whether a UI or
   only a tested domain component is wanted.
2. The roster, host and lifecycle inputs it consumes; state transitions,
   permissions and failure/recovery behavior it actually implements. Decide
   voice attendance only if this slice enforces or displays an attendance rule.
3. Technical/runtime and code-location choices, data/interface contract,
   simulated-data boundary, and local run/test instructions.
4. Tests for isolation, transitions, cancellation/retry as applicable, absence
   of external calls, and truthful unimplemented status; approved completion
   criteria and an independently coherent commit plan.

This could become implementable without waiting for real Discord/game tests
or a full matching/honor formula. It does not validate QGuard's core honor
value or constitute a usable end-to-end product. Selecting it must not silently
defer honor from the first real product.

### B. The First Usable QGuard Journey

This needs a broader approved journey from onboarding and finding teammates,
through acceptance and communication, to the relevant post-play feedback/
reporting step. It needs the applicable rows in the table above, including real
identity/data rules and any matching/honor behavior included in that version.

We can implement approved provider-independent parts first, but cannot call
the complete journey operational while its real coordination/join dependencies
remain unverified and unimplemented. An unavailable integration is an honest
development state, not a finished usable party-formation feature.

## Things That Can Wait Without Reopening Settled Decisions

- Exact real game-join implementation and the held tests can remain paused
  during a separately approved provider-independent slice. No automatic retry,
  VPN workaround, monitoring or test-account provisioning is needed now.
- Steam/CS2 alternatives remain in the preserved comparison inventory; they
  are neither cancelled nor prerequisites for local simulated coordination.
- Riot application/submission and real API access are later gates if the
  selected flow needs them. `DEC-017` is a conditional planning path, not
  provider approval or submission authority.
- Voice recording remains outside approved scope. There is no requirement to
  design recording before implementing ordinary unrecorded coordination.
- Monetization, broad localization and scale can wait where they have no
  bearing on the chosen local slice. They must be decided before implementing
  the affected business behavior or making public promises.
- No further general legacy reconstruction, naming choice, workflow settlement
  or choice between the two approved joining candidates is needed to draft
  the next slice.

These are stage classifications, not newly approved deferrals or exclusions.

## Candidate Reconciliation Findings

The latest explicit owner direction and `DEC-024` control. The following
secondary wording must not generate another approval request. Findings are
supported by the frozen files but await owner acceptance for a correction
unit; the audited definitions are unchanged in this review.

1. **Stale Discord-choice questions.**
   [Product foundations](../specs/product-foundations.md), lines 171–175 and
   222–226, still describe coordination as a proposal and ask whether Discord
   voice belongs. `OQ-006`'s components, `OQ-009`'s evidence wording and
   `OQ-010`'s options also retain earlier provider-choice language. Reconcile
   these with `DEC-024`; retain only operational detail and evidence gates.
2. **Stale test-before-selection wording.**
   [Resource plan](coordination-test-resources-and-sequence.md), line 300, still
   lists testing before choosing the backbone as an owner decision, without
   the partial supersession. The current validation program correctly permits
   provider-independent work. Clarify the summary; do not waive live evidence.
3. **Historical agenda can reopen settled matters.** The
   [owner decision sequence](rewrite-owner-decision-sequence.md) still lists
   the broad teammate-finding framing as an unapproved assumption and asks
   which game, despite its own newer decisions. Exact use boundaries remain
   open, but there is no need to ask whether matched Valorant teammates are
   the current planning context. Older completed routes still mention Gate 0
   or a pending Discord selection, and some are labeled current in the index.
   They should be visibly historical for routing without rewriting their
   original evidence. Gate 0 and the basic Discord choice stay closed.
4. **Live test setup sequence needs reconciliation before resumption.** In the
   resource plan, Wave 2 assumes A/B are already admitted to the test server,
   but Wave 3's admission case expects them not yet to be members. Its linking
   freeze says admission occurs at `DCS-2A`. Define whether admission runs
   before the shared-server cases or a deliberate reset is needed, and capture
   the actual starting state. Do not silently run a returning-member test as a
   first-admission proof. This does not block local provider-independent work.

None of these findings changes product authority. No correction was silently
applied, and no tests were reordered or activated.

## Proposed Discussion Order And Division Of Work

1. **First working-version outcome and first slice.** Confirm the intended user
   result and included/excluded features. Use the already-approved name,
   Valorant direction, honor purpose and Discord boundary as inputs.
2. **Behavior needed by that slice.** Work through its user journey, matching/
   honor rules if included, identity/data and Discord operating details. Keep
   high-impact choices in bounded discussions, not one bulk questionnaire.
3. **Agent drafting.** Turn those answers into modules, state/data contracts,
   a small set of technical alternatives with tradeoffs, acceptance fixtures
   and a phased execution plan. Consolidate accepted audit corrections.
4. **Owner review, then code.** Approve the exact applicable modules and
   completion criteria. Begin the approved slice with integrations held at
   their recorded boundary; obtain separate controlled-operation authority
   only when such actions are part of the plan.

The owner decides product effects, important constraints and approvals. The
agent supplies technical proposals and can choose small reversible internal
details under existing policy. Endpoint spelling, routine file organization
or test-helper names do not each require an owner decision. Qualified review
is scoped to the concrete sensitive flow and affected gate, not demanded for
every local prototype.

## Audit Route, Coverage And Evidence

- **Route:** audit/reconciliation; product planning; decision/recommendation
  safety; privacy/data; external/owner review; deferral/owner review. Mandatory
  entry documents, selected procedures and applicable inert audit/specification
  templates were read. No application change, new provider research,
  experiment execution, delegation, deployment or migration is in scope.
- **Inventory:** 14 core current files read: project README/current state,
  three governance registers (24 decisions, 11 question groups, five deferred
  tests plus the shared hold), workflow-governance policy, all five planning
  files, and all three specification files. All five `PLAN-*` routes were also
  reviewed for provenance/routing. The total project Markdown inventory at the
  baseline was 53 files; this is not a claim to have re-audited every legacy
  source or fresh provider capability.
- **Freeze:** immutable baseline commit above; clean status before inspection.
  No material-data mutation required a separate archive. Source documents were
  not edited during evidence collection. The only index edit after the review
  adds a link to this report; no audited decision or requirement is corrected.
- **Rules:** reconcile latest authority; verify full applicable slice approval;
  distinguish decided/open/deferred/proposed; separate mock and live evidence;
  identify only stage-relevant blockers; preserve unrelated/protected work.
- **Internal classification:** primary-agent assessment, not independent
  specialist or owner approval. No substantive findings have yet been accepted
  by a separate reviewer. The owner remains the disposition authority.

| Review unit | Candidate outcome | Evidence |
|---|---|---|
| R1 — Governance and settled foundations | retain | `DEC-008`, `DEC-014`, `DEC-018`, `DEC-024` and current policy |
| R2 — First scope and outcome | owner-input-required | `OQ-004`, `OQ-005`, `OQ-007`; no approved first slice |
| R3 — Journey and matching | owner-input-required | Decision groups 3–4; no current behavior module |
| R4 — Honor and moderation | owner-input-required | `DEC-010` approves the concept, not its effects |
| R5 — Identity, rank and data | owner-input-required | `DEC-013`, `OQ-006`, `OQ-009`, `OQ-010` |
| R6 — Coordination operations | owner-input-required | Proposed details in the coordination module and `OQ-011` |
| R7 — Technical plan and acceptance | owner-input-required | `OQ-007`; both current modules lack complete approval |
| R8 — Live integration hold | retain | Shared hold and `DEC-024`; no live results recorded |
| R9 — Stale secondary routing/choice language | revision-required | Candidate findings 1–3 |
| R10 — Test admission setup order | revision-required | Candidate finding 4 |

Totals: two retain, six owner-input-required, two revision-required. These are
ten review units, not ten new owner questions. No artifact is proposed for
deletion; no implementation or correction approval is inferred.

## Completion Checkpoint

- **Completed:** baseline inspection, record-level review, cross-record
  reconciliation and this stage-specific readiness report.
- **Verification:** read-only Node v24.10.0 checks passed across 54 project
  Markdown documents: 211 local links, 17 section anchors, and 24 unique
  decision IDs. The complete report/index diff was reviewed and
  `git diff --check` passed. Changed-path validation found only this report and
  its README link; audited requirements, legacy code and workflow are unchanged.
- **Not run:** application, rendered UI and live-provider tests; no current
  API/policy re-research or independent specialist review. These are outside
  this documentation audit and no behavioral pass is claimed.
- **Residual risk:** detailed specifications, provider behavior and conditional
  reviews remain unresolved. Audit findings do not fill those gaps.
- **Version/external boundary:** one local report/index commit after checks;
  no push, provider mutation, deployment, code change or canonical-workflow edit.

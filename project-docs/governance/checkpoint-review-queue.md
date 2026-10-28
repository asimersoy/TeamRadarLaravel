# Checkpoint Decision Review Queue

- **Record type:** current review queue; not approval authority
- **Authority:** `DEC-064` and the [workflow policy](../operations/workflow-governance.md)
- **Owner:** project owner gives dispositions; primary agent maintains provenance
- **Status:** active; explicitly present this queue at the stack-review checkpoint
- **Updated:** 2026-10-28
- **Update trigger:** automatic-resolution signal, missing/uncertain answer,
  material agent default, checkpoint review or owner correction

## Interpretation

“Automatically resolved” is an evidence label, not owner approval. Record it only
if the tools expose that provenance. A timeout or preselected option is not an
answer. Required unanswered questions remain in the open-question register.
Already delegated reversible choices may be made as agent defaults, with their
impact and reversibility stated; this queue does not extend that delegation.

The question replies in this session provide answer text but do not expose a
separate manual-versus-automatic origin flag. The owner explicitly said earlier
questions timed out and requested them again. No missed question was promoted
to approval while waiting. Later received answers and subsequent typed owner
instructions are the evidence recorded in `DEC-061` and `DEC-063`.

## Entries to Show at the Stack Checkpoint

| ID | Question/selection and provenance | Consequence/authority | Checkpoint action |
| --- | --- | --- | --- |
| CRQ-001 | Earlier received answer and later typed session-history instruction confirm every eligible teammate before another queue | DEC-061/063, explicitly reconfirmed at this checkpoint in DEC-076 | Reviewed; no expiry and immutable submissions reconfirmed, not tool-confirmed automatic |
| CRQ-002 | Earlier “player and matched teammates” reply was recorded in DEC-061; owner disputes its attribution and asks a misclicked follow-up be disregarded. After explanation/reissue, the fresh answer is “Only the player being described.” | DEC-076 corrects the old record: self-only summaries; no teammate access; individual received votes/authors hidden. No automatic-origin flag is available | Corrected and reviewed 2026-10-28; fresh answer controls. DEC-078 subsequently selects the formula; DEC-084 resolves display at three distinct eligible reviewers per trait |
| CRQ-003 | Late-rating question received “late ratings should count”; owner then explicitly typed that the ten-minute closure is removed | `DEC-063` independently confirms no expiry and mandatory history-based completion | Reviewed/reconfirmed in DEC-076; do not reopen the superseded cutoff |
| CRQ-004 | Agent selected 1440 × 900 as the main desktop study sample under the owner's desktop-view preference | Reversible research setting only; not a QGuard breakpoint or platform decision | Note if reused for design; review actual desktop/mobile requirements in the design packet |
| CRQ-005 | Owner explicitly selects immediate honor application without corrections, then confirms the A/B/C/E report-timing example and defers changing it until after version one | `DEC-065` keeps already-applied effects and only excludes not-yet-applied ratings; `DEF-013` records the known race and return condition | Reviewed/reconfirmed in DEC-076; the explicit acceptance and deferral remain, not a tool-auto-resolution |
| CRQ-006 | Agent drafts isolated synthetic guest state and success/failure fixtures to apply the owner's explicit guest-review request (`DEC-066`, 2026-10-27) | [Prototype specification](../specs/review-prototype-and-access.md) labels these as draft details, not a selected auth framework or live integration; no application work proceeds | Review the guest boundary with page designs and stack packet; exact isolation/reset mechanics remain reversible implementation choices. Owner resolved the Discord milestone in `DEC-067` |
| CRQ-007 | Owner explicitly instructs assuming non-friend party-code joining works now and testing after RSO (`DEC-068`, 2026-10-27) | Planning/prototype and approved implementation may proceed; `DEF-014` retains real-player validation before normal-use reliance | Reviewed/reconfirmed in DEC-076; owner-directed assumption, not an automatic choice or passed test; Discord deferral reconfirmed |
| CRQ-008 | Agent drafts P-01/P-02/P-07/P-08/P-09 during the design pass; owner approves labels and per-card submission, corrects the multiple-pending-session premise | DEC-076 approves P-01/P-02; DEC-077 requires one active session and completion of its feedback before requeue, so oldest-first backlog traversal is unnecessary. P-08 already approved | First UI group reviewed 2026-10-28. P-09/artifact mechanics remain a recap item; no timed-out question used as approval |
| CRQ-009 | Former P-03/P-04/P-05 proposals reviewed by owner | DEC-078 replaces mean with separate honor-formula updates; DEC-079 requires excluded authors to submit; DEC-080 keeps discrepancy pending until lobby closure | Main choices resolved. DEC-084 resolves the three-reviewer display threshold; P-06 before live rank integration |
| CRQ-010 | Agent compared the existing stack with alternatives; owner explicitly confirmed the named core stack and corrected the transcription to Reverb | [Stack record](../planning/review-version/stack-review.md); DEC-074/075, direct owner confirmation rather than automatic resolution | Core stack settled 2026-10-28. No app/runtime changes or implementation approval; next review the other assumptions/defaults |
| CRQ-011 | Owner retains the Q mark/wordmark/tagline and authorizes Mobbin refinement (DEC-069). Agent chooses outlined SVG, compact/wide variants, a task-focused layout and reference-backed spacing/grouping | Reversible prototype work in [the design record](../design/qguard-review/mobbin-pass/README.md); existing product behavior and stack gate preserved | Owner accepted the revised visual/layout baseline under DEC-070; DEC-072/073 selects and applies calibrated A; OQ-016 is resolved. Brand retention is owner-directed; no tool-confirmed automatic answer or new policy approval |
| CRQ-012 | Owner selects all five accepting within 20 seconds; decline/nonresponse stops that player and returns others to pool | DEC-081; independent of in-lobby discrepancy voting and session-end requests | Policy settled by DEC-081/083: stop the whole failed premade intact; return fully accepted independent entries. Exact technical contract still needed |
| CRQ-013 | Earlier first-pass numeric matching/honor defaults are carried into the next draft; no new tuning chosen during design | [Matching defaults](../specs/review-version/friends-and-matching.md) and [honor defaults](../specs/review-version/feedback-and-honor.md) identify prior accepted/delegated parameters | Recap separately with meaning/effect; preserving the prior baseline does not prove tuning quality or authorize silent changes |
| CRQ-014 | Owner selects shared end: three participants request it, or five minutes elapse after the first request | DEC-077 supersedes immediate individual end. Agent interpretation counts distinct participants once and keeps the first deadline fixed; no game detection or early-leaving admission | Recorded in specs; reconcile the static end flow and privacy views before later design/slice approval. Actual implementation and tests remain pending |

No tool-confirmed automatically resolved question is known at this checkpoint.
DEC-075 retains the confirmed core stack; no desktop shell is selected. DEC-078
selects independent honor-formula descriptor updates; display detail remains open.
`OQ-013` is resolved by the owner's explicit response in `DEC-065`, not by an
automatic choice. Add future material defaults as they are selected, not after they
have quietly become implementation assumptions.

## Checkpoint Procedure

For each new entry record the original question, selected value, source and
date, known uncertainty, affected decision/spec/design, whether work proceeded,
reversibility and whether owner review is required before reliance. At a
checkpoint give a visible brief list with accept/revise/defer choices, then
record the actual disposition and update downstream artifacts. Include prior
agent engineering selections from any packet being reused; distinguish already
approved packet details from new defaults. Keep a required owner gate pending
until an answer arrives; elapsed time never closes it.

## Active Assumptions/Defaults Review — 2026-10-28

**Task QG-DEFAULTS-1:** owner asks to start the recorded-assumption and draft-default
review after DEC-075. Baseline `1dc913f`, clean before this discussion. Existing
entry/routing and governance apply; selected procedures are product planning,
owner external review, deferral/owner review, and decision/privacy review for
visibility and scoring context. On owner correction, expand to shared session
lifecycle/queue requirements and audit/reconciliation of their dependent records;
interruption/recovery applies to the resumed discussion. Applicable procedures
and the repository entry path were read; no code/design-render route is activated
by marking the existing prototype's scoped gaps. No new external factual research or application
change is needed. The owner gives dispositions; the agent records them and checks
links, complete scoped diff and whitespace. Batch the related review decisions
rather than committing each question or reply.

The provenance recap is now reviewed: CRQ-001/003/005/007 are explicitly
reconfirmed. CRQ-002 is corrected by the fresh **self-only** audience answer,
following the owner's dispute and request to disregard a misclick (DEC-076).
The optional peer-summary meaning was explained separately from a signup bio;
no signup-bio feature was approved.

**P-01/P-02/P-07 dispositions:** slider labels and independent card submit/confirm/
lock approved (DEC-076). The owner corrects P-07: no new queue while a session is
active or its eligible feedback unfinished, so normal multi-session backlog
ordering is unnecessary. DEC-077 additionally selects shared session end after
three distinct requests or five minutes from the first. The first-click fixed
deadline and deduplication are recorded implementation interpretations, not
new game sensors or penalties. The separate no-show/discrepancy rules remain.

Still to cover: CRQ-006 guest isolation/fixture mechanics; CRQ-004/P-09 artifact
and viewport choices (implementation aids, not new product/platform limits);
CRQ-013 inherited numeric defaults. Subsequent DEC-078–081 now resolves the
main P-03/P-04/P-05/CRQ-012 directions; OQ-014 display detail and OQ-017 premade
handling remain, with P-06 before live integration. Review is in progress.

**Resume/evidence boundary:** baseline HEAD remains `1dc913f` on `new-development`.
The interrupted turn had made no decision/spec edits; three earlier review-opening
doc edits were present and preserved. This resumed batch records DEC-076/077 and
updates the current spec, governance, planning and design-gap notices. No
application, prototype HTML/JS, protected workflow, runtime or legacy files
changed; no new service or external operation was started. The prototype still
needs end-flow and descriptor-visibility reconciliation before its next behavior
review. Do not treat old rendered checks as evidence for the new rules.

Keep this ongoing checkpoint discussion uncommitted until its coherent review
batch is ready; local file edits are not separate commit boundaries. Next review
guest/artifact/numeric defaults, then unresolved policy groups and technical
slice contracts.

**Verification, 2026-10-28:** inspected the scoped diff and supersession paths;
`git diff --check` passed. Checked 300 local link targets and 49 Markdown heading
anchors across the 20 changed Markdown files, with no failures. Reconciled the
remaining current audience summary in OQ-006 and the competitor comparison;
removed a stray OQ-015 resolved marker that incorrectly cited the honor-timing
decision. Existing HTML source confirms the old immediate individual end and
teammate-summary views; their required updates are explicitly recorded, not
claimed complete. No application, rendered, live-provider or game tests were
run because this batch changes records only. Required future cases now cover
shared end timing/races, the queue invariant and self-only summary access.
HEAD stays `1dc913f`; changes remain uncommitted in this ongoing review batch.
No push, PR, deployment, history rewrite or other remote action occurred.


**Readiness follow-up, 2026-10-28:** the owner asks what remains before revised
specifications and implementation. Rechecked the proposal register, checkpoint
packet and actual status. Updated the implementation outline to distinguish
approved P-01/P-02 and self-only summaries from the four open policy choices
(P-03/P-04/P-05/CRQ-012), later live P-06, and remaining engineering-default
recaps. Technical drafting/mockup reconciliation can proceed; only affected
application slices await their decisions and concrete specification approval.
No application implementation or owner-gate override is inferred. Changes stay
in the existing documentation review batch.
Follow-up verification: scoped diff and `git diff --check` passed; 8 local link
targets in the two updated records exist. Documentation only; no application
or rendered checks run and no new commit or remote action.


**Owner policy answers, 2026-10-28 — DEC-078–081:** record independently updated
communication/play-style values using the honor formula, not an arithmetic mean
or combined matchmaking score; require excluded authors to submit required
cards; keep missing discrepancy responses blocking until lobby closure; require
five acceptances in 20 seconds with non-acceptors removed and others returned.
Agent selects the already-permitted 0–100 scale and current parameters separately
per descriptor, with no observed-value claim for the initialized midpoint.
P-04/OQ-015 and P-05's nonresponse policy are resolved. OQ-014 retains only
minimum-evidence/disclosure-safe display. OQ-017 was sent as an owner question
about the premade exception; no answer has arrived and time is not approval.

The existing product-planning, decision/privacy, owner-review and reconciliation
route applies. Update requirements, logical data, acceptance, open questions,
plans and current state; no application or prototype code, live research or
remote action. A failed in-memory editing script wrote nothing; the corrected
record/spec edits were then applied. Preserve earlier uncommitted review work
and keep the coherent review batch open. Readiness statements above describe
the earlier review stage; these latest explicit dispositions control.

**Verification after DEC-078–081:** inspected the complete scoped diff in file
groups and reconciled remaining current formula/status references. Checked
300 local link targets and 48 Markdown anchors across 22 changed Markdown
files with no failures; `git diff --check` passed. Scope is project records only.
No application, rendered, integration or live-game checks were run. The updated
acceptance cases specify future evidence; no implementation or mockup behavior
is claimed. OQ-017 is still awaiting its owner answer and OQ-014 is narrowed to
display evidence/privacy. The full checkpoint batch remains uncommitted on
`new-development` at HEAD `1dc913f`; no remote or destructive action occurred.


## Reconciliation and implementation entry — DEC-082

Owner authorizes specification/mockup reconciliation then implementation of
settled behavior. The [R1a contract](../planning/review-version/reconciliation-and-implementation.md)
records agent-selected tab-scoped fixtures, deterministic packaging and server
queue gating. These implement existing review isolation/RSO rules; they do not
constitute new owner-selected product policies. Numeric defaults remain unchanged.
OQ-014 and OQ-017 were presented again with consequences and remain unanswered.
No automatic answer is visible and elapsed time does not approve an option.
Show these pending items and any material implementation defaults at next review.

Earlier “docs only/no code” evidence above belongs to its named prior batch;
new design/application checks are in the execution record.


## Explicit answers — DEC-083/084, 2026-10-28

Owner answers resolve both pending policies: stop a whole premade after any
member fails acceptance; show each private descriptor after three distinct
eligible reviewers. The threshold answer follows the owner's clarification
request and an explanation; it is explicit typed approval, not a timeout/default.
Agent selects empty/insufficient-feedback messages within the owner's stated
flexibility. Count distinct internal authors per trait, without exposing them.
Earlier pending statements above describe prior review stages.

Route: existing product/code/content, decision/privacy, design, external review,
audit and recovery procedures apply. Reconcile current requirements and both
mockup bundles; test premade failure/return and self-only threshold states.
No backend domain service, schema, protected workflow or live integration changes.
Keep this follow-up with the developing implementation batch; do not commit
merely because these two replies arrived.


**Follow-up verification:** DEC-083/084 requirements, current plans and both
mockup bundles reconciled. Fifteen focused browser tests passed in the three
engines, including stopped/returning premades and independently qualified
private descriptors. JS syntax, deterministic packaging, scoped diff and local
links passed. Backend count/offer persistence is not implemented by this preview.
The owner subsequently requested committing the complete related batch after
the readiness audit. No remote action; later implementation contracts and
live-use gates remain as recorded in the execution record.

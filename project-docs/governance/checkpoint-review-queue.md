# Checkpoint Decision Review Queue

- **Record type:** current review queue; not approval authority
- **Authority:** `DEC-064` and the [workflow policy](../operations/workflow-governance.md)
- **Owner:** project owner gives dispositions; primary agent maintains provenance
- **Status:** active; explicitly present this queue at the stack-review checkpoint
- **Updated:** 2026-10-27
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
| CRQ-001 | Reissued required-honor question received “every eligible teammate before another queue”; reply mechanism has no automatic-origin flag | Used in `DEC-061`; the owner's later typed session-history instruction independently confirms it | Show in concise recap; do not label it tool-confirmed automatic |
| CRQ-002 | Reissued descriptor-audience question received “the player and their matched teammates”; reply mechanism has no automatic-origin flag | Used in `DEC-061`; no public exposure, individual ratings/authors hidden | Explicitly recap this selection so the owner can catch a missed/default answer |
| CRQ-003 | Late-rating question received “late ratings should count”; owner then explicitly typed that the ten-minute closure is removed | `DEC-063` independently confirms no expiry and mandatory history-based completion | Show final typed decision rather than reopening the superseded cutoff options |
| CRQ-004 | Agent selected 1440 × 900 as the main desktop study sample under the owner's desktop-view preference | Reversible research setting only; not a QGuard breakpoint or platform decision | Note if reused for design; review actual desktop/mobile requirements in the design packet |
| CRQ-005 | Owner explicitly selects immediate honor application without corrections, then confirms the A/B/C/E report-timing example and defers changing it until after version one | `DEC-065` keeps already-applied effects and only excludes not-yet-applied ratings; `DEF-013` records the known race and return condition | Recap the explicit acceptance and deferral; it is not a tool-auto-resolution |
| CRQ-006 | Agent drafts isolated synthetic guest state and success/failure fixtures to apply the owner's explicit guest-review request (`DEC-066`, 2026-10-27) | [Prototype specification](../specs/review-prototype-and-access.md) labels these as draft details, not a selected auth framework or live integration; no application work proceeds | Review the guest boundary with page designs and stack packet; exact isolation/reset mechanics remain reversible implementation choices. Owner resolved the Discord milestone in `DEC-067` |
| CRQ-007 | Owner explicitly instructs assuming non-friend party-code joining works now and testing after RSO (`DEC-068`, 2026-10-27) | Planning/prototype and approved implementation may proceed; `DEF-014` retains real-player validation before normal-use reliance | Recap the assumption and deferred evidence checkpoint; owner-directed, not an automatic choice or a passed test |
| CRQ-008 | Agent drafts P-01/P-02/P-07/P-08/P-09 during the authorized design pass, 2026-10-27: slider labels, per-card confirmation, oldest unfinished session, visual direction and static artifact format | Reversible proposal/default scope only; no new authority or production stack. [Proposal register](../specs/review-version/proposals.md) records alternatives | Show at checkpoint; owner may revise. No timed-out question was used as approval |
| CRQ-009 | Agent identifies P-03/P-04/P-05 and details P-06 during the same pass: descriptor aggregation/privacy, excluded-author obligations, unresolved discrepancy recovery and live rank-retrieval failure | No consequential policy selected; prototype uses sample summaries and approved success paths. OQ-014/OQ-015 and OQ-010 track the material gaps | Resolve required policy before affected implementation; do not treat design review alone as acceptance |
| CRQ-010 | Agent recommends retaining the current Laravel/Livewire/PostgreSQL/Docker stack after inspecting the new design and current repository | [Comparison](../planning/review-version/stack-review.md) is advice; DEC-062 checkpoint remains pending | Owner chooses stack explicitly; no dependency, app or runtime changes made |

No tool-confirmed automatically resolved question is known at this checkpoint.
There is no selected replacement stack, desktop shell or style-aggregation formula.
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

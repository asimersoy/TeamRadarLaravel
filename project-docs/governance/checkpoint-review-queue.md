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
| CRQ-005 | Owner explicitly selects immediate honor application without correction calculations; agent spells out the consequence for later reports | `DEC-065` keeps already-applied effects and only excludes not-yet-applied ratings; order effects accepted, not proven small | Recap this material report-timing consequence at the checkpoint; it is not a tool-auto-resolution |

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

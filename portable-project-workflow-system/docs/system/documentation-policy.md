# Documentation Policy

## Purpose

This policy defines how documentation is created, read, changed, and retired.
It applies to humans, the implementation agent, delegated agents, and external
reviewers working from repository records.

## Core Principles

1. **One canonical location per fact.** Other files link to it instead of
   maintaining competing copies.
2. **Current state is concise and operational.** It records where work stands,
   not the complete history of how it arrived there.
3. **Decisions remain traceable.** A changed decision names what it supersedes
   and which artifacts it affects.
4. **History cannot route work.** Logs and completed reports provide evidence,
   but current entrypoints and routing rules select the workflow.
5. **Templates remain inert.** Placeholder text and synthetic examples cannot
   be interpreted as project requirements.
6. **Evidence accompanies completion.** A completed status names the checks,
   outputs, and unresolved risks.
7. **No silent policy change.** A task implementation cannot alter its own
   acceptance criteria without a separately visible decision.

## Document Classes

### System Documents

System documents are always applicable. They define routing, authority,
documentation behavior, review independence, completion, and Git controls.

### Procedures

Procedures apply only when selected by the routing checklist. They define
triggers, inputs, roles, permitted actions, required records, stop conditions,
QA, and completion evidence for a class of work.

### Project Records

Project records contain the actual facts, decisions, questions, specifications,
queues, review packets, and handoffs for this repository.

### Templates

Templates define reusable record shapes. They do not express current scope or
approval. They must be copied before use, never edited into a live record in
place.

### History

History contains superseded or completed evidence. It is read only when a
current record links to it or when investigating provenance, regression, or a
past decision.

## Creating A Document

Before adding a file:

1. identify its document class;
2. confirm that no existing canonical record owns the same information;
3. choose a stable descriptive path;
4. state purpose, authority, owner, status, and update trigger;
5. link it from the document that routes readers to it;
6. add acceptance or closure criteria when it governs work;
7. run documentation validation.

## Updating A Document

- Change the canonical record first.
- Update dependent summaries only when they would otherwise misroute work.
- Preserve the reason for material changes in `decisions.md`, a review packet,
  or Git history.
- Mark replaced records `superseded` and link their replacement.
- Never make a completed historical report look as though it described the
  current state.

## Reading Discipline

Readers start from `AGENTS.md`, then `docs/README.md`, then the routing
checklist and current state. Directly opening a specialized procedure does not
waive this sequence. If required context is missing or contradictory, stop the
affected work and reconcile the authoritative records before continuing.

## Append-Only Records

Append-only logs are permitted when chronological evidence matters. Every such
log must state that it is historical evidence and must link to the current
record that controls routing. A new entry cannot reactivate an old agent,
workflow, target, or approval.

## Local Execution Scratch

Long-running work may use the ignored `.codex-local/current-task.md` file to
survive context compaction, interruption, or terminal-session loss. It is a
rewriteable execution aid, not an append-only historical log and not a project
record.

The scratch file may contain:

- the current objective and branch or base commit;
- temporary observations and hypotheses still awaiting verification;
- running process or session identifiers;
- the exact next command or check;
- a short completed, in-progress, and untouched execution breakdown.

It must not be the only location for:

- owner decisions, approvals, requirements, or scope changes;
- blockers, deferred work, external-review requirements, or release status;
- credentials, secrets, personal data, or production data;
- evidence required to claim completion;
- information another checkout or worker must possess.

Before a coherent commit, intentional stop, handoff, or completion report,
promote every durable fact to the applicable tracked decision, current-state,
queue, checkpoint, or report. Then reconcile or clear stale scratch entries.
After compaction or resumption, read the mandatory tracked entry path first and
use the scratch file only to locate the first unverified execution step.

## Retirement

A document may be retired when its purpose is gone and no current record links
to it. Prefer moving it to `history/` with a short retirement note. Deletion or
history rewriting requires explicit owner approval.

## Supersession Header

A superseded document that remains outside `history/` must begin with a visible
notice containing:

- status `superseded` or `historical`;
- the authoritative replacement path;
- the date or decision that replaced it;
- a statement that it must not be used as the current definition of done.

Do not rely on Git history alone to communicate supersession.

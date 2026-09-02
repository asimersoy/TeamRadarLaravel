# New Project Chat Prompt

Use the following prompt when starting a new project or a new chat with this
package available:

> Read `AGENTS.md` and follow the mandatory entry path in `docs/README.md`.
> Treat this package as a workflow system only; it contains no facts, approvals,
> architecture, content requirements, or technology decisions for this new
> project. Inspect the actual workspace before initializing
> `docs/current-state.md`. Separate verified facts, owner decisions,
> assumptions, proposals, open questions, and deferred work. Route my current
> request through `docs/system/task-routing-checklist.md`, read the selected
> procedures, and state any material blocker before implementation. Escalate
> decisions with material scope, risk, behavior, publication, or workflow
> consequences; otherwise use and record only small reversible defaults.
> Preserve unrelated work, use
> evidence-backed completion, and obtain explicit authorization for remote,
> destructive, production, publication, or history-rewriting actions.

After orientation, the worker should report:

1. the authoritative project/workspace boundary it found;
2. which procedure routes apply to the current request;
3. facts or records that still need initialization;
4. the first bounded unit of work and its verification.

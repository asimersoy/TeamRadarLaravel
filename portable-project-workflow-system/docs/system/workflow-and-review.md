# Workflow And Review

## Purpose

This is the general execution contract. Specialized procedures add stricter
rules but cannot weaken it.

## Standard Workflow

1. **Orient:** read the mandatory entry path and identify authoritative state.
2. **Route:** complete the task-routing checklist.
3. **Bound:** state objective, scope, exclusions, dependencies, risks, and stop
   conditions.
4. **Plan:** create a plan proportional to the task and identify acceptance
   evidence before implementation.
5. **Execute:** make the smallest coherent change that satisfies the approved
   scope.
6. **Self-check:** verify structure, behavior, factual integrity, and diff
   scope.
7. **Independent QA:** the implementation agent checks delegated work against
   source files and acceptance criteria; an agent's own report is evidence,
   not approval.
8. **Resolve:** correct failures through a bounded authorization. Do not lower
   targets or acceptance criteria merely to obtain a pass.
9. **Record:** update decisions, current state, queues, reports, and handoff
   records that changed.
10. **Version:** create an additive local commit only after the intended unit
    is coherent and verified. When no repository exists, create the project's
    equivalent durable, versioned checkpoint.

When an authorized sequence contains several independent units and no owner
gate remains, continue through the sequence without asking for ceremonial
permission between units. Stop at the first real decision, risk, scope, or
verification boundary.

## Roles

### Owner

Approves product decisions, scope changes, owner-gated content, remote actions,
history rewrites, and any other gate explicitly assigned to the owner.

### Primary Or Implementation Agent

Owns routing, integration, independent QA, version control when present, and
truthful status reporting. In software work this role also owns code and
repository changes. Delegation does not transfer these responsibilities.

The primary agent may select small, reversible defaults that have no
material product, commercial, legal, privacy, safety, ranking, publication, or
workflow consequence. Every such selection must be recorded in the applicable
tracked decision, specification, implementation, or review record with:

- a clear statement that the primary agent made the selection;
- the reason it was selected;
- any material alternative considered; and
- confirmation that the owner may revise it without changing the approved
  product scope.

This discretion prevents routine implementation details from becoming owner
blockers. It does not authorize silent product decisions or replace an owner
gate.

### Delegated Agent

Performs only the assigned task within its packet. It cannot approve its own
work, select a different workflow, change targets, expand scope, run Git, or
claim external approval unless the packet expressly authorizes that action.

### External Reviewer

Reviews only the assigned domain and records a verdict, findings, limitations,
and required follow-up. External review does not silently authorize unrelated
implementation or publication.

## Delegation Boundary

Before dispatch, the implementation agent records the current role, exact
files, allowed tools, sources or inputs, prohibited actions, required output,
report location, and stop condition. Historical agent identities or reports
cannot select the current worker.

## Review Independence

- The author performs a self-check.
- The implementation agent independently checks the actual files and evidence.
- Required owner or specialist reviews remain visible after internal QA.
- A passing automated validator proves only what that validator measures.
- If a report conflicts with repository state, repository state controls and
  the discrepancy is a finding.

## Batch And Risk Scaling

Batch size scales down as sensitivity, uncertainty, or blast radius increases.
Routine comparable work may be grouped. Medical, legal, privacy, security,
safeguarding, recommendation, eligibility, ranking, money, or source-uncertain
work is reviewed in the smallest practical unit. Coordination efficiency never
justifies sharing an unverified assumption across multiple sensitive records.

## Completion Pressure

Approaching the end of a task, batch, milestone, or project is never a reason
to relax factual, safety, product, UX, test, or documentation standards. Time
pressure may reduce scope or defer work; it may not convert a failing check
into approval.

## Stop Conditions

Stop the affected work and report the exact blocker when:

- authoritative records conflict;
- a required owner decision is missing;
- the task would cross its explicit scope;
- source or data access is insufficient for a material claim;
- a destructive or remote action lacks approval;
- required verification cannot be run;
- sensitive risk requires a qualified reviewer.

Unblocked work outside the affected boundary may continue when doing so cannot
prejudge the missing decision.

## Collaboration Updates

- Before editing, state the bounded change and affected artifacts.
- During longer work, provide short updates at meaningful stages so the owner
  knows what is being inspected, learned, changed, and verified.
- If the owner asks for status, answer directly and then continue unless asked
  to pause or stop.
- Do not narrate empty activity or expose private hidden reasoning.
- The final report names actual changes, evidence, skipped checks, residual
  risk, version/commit state, and whether any remote action occurred.

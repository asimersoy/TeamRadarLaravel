# Agent Delegation

## Trigger

Use whenever work is assigned to a subagent, external agent, automation, or
another human whose output will enter the repository or inform a decision.

## Pre-Dispatch Gate

The implementation agent must record:

- current worker identity and role;
- exact objective, authorized files or records, and exclusions;
- required reading and controlling decisions;
- allowed tools, sources, and environments;
- prohibited actions, especially Git, remote, destructive, publication, and
  scope-changing actions;
- required output location and report format;
- validation commands and stop boundary.

Historical logs cannot select the worker. Replacing one internal delegated
worker with another may be done after informing the owner when role, authority,
data access, and workflow remain unchanged. Moving work to an external person,
service, or agent requires explicit owner permission.

## Execution

1. Dispatch the smallest coherent assignment.
2. Require the worker to inspect the actual source records before editing.
3. Keep sensitive, source-uncertain, legal, privacy, safeguarding,
   recommendation, eligibility, ranking, and medical work in the smallest
   practical unit.
4. Require a factual report of files, changes, commands, results, preserved
   boundaries, and unresolved issues.
5. Stop the worker at the packet boundary; it may not self-authorize the next
   batch.

When delegated output is delivered through a transient interface, require the
substantive result in the packet's durable report or artifact path. A status
message, agent card, or interface summary is not a second source of authority.

## Independent QA

The implementation agent checks the actual diff and evidence. The worker's
report is not approval. If the report conflicts with repository state,
repository state controls and the discrepancy is recorded.

Corrections use a bounded correction packet. Do not authorize padding,
acceptance-criterion changes, target changes, new sources, or expanded scope
unless separately justified and approved.

## Completion Evidence

Record the independent verdict, checks run, unresolved external gates, commit
boundary, and whether the worker session remains current. Delegated agents do
not run Git unless the owner and implementation agent expressly change this
system rule.

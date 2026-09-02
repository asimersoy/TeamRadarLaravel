# Deferral And Owner Review

## Trigger

Use when an already-decided task is postponed, an unapproved plan is queued,
or owner review continues while implementation is recorded for later.

## Three Distinct Records

- **Open question:** a decision is missing and blocks a named stage.
- **Deferred work:** the decision is made, execution is postponed, and a
  return condition is known.
- **Queued plan:** a possible or ordered plan awaits activation and is not
  authorization to execute.

Never merge these states into a generic backlog.

## Deferral Entry

Record objective, locked decision, affected artifacts, reason, dependencies,
implementation state, return condition, owner recheck requirement, verification
needed after implementation, and whether later changes may invalidate it.

## Owner Review Flow

1. Maintain a complete baseline queue, then present one bounded page, flow, or
   decision at a time.
2. Let newly discovered cross-page effects update the queue; the baseline is a
   coverage map, not a ban on learning during review.
3. State what was previously reviewed and identify exactly what changed
   afterward. Do not ask the owner to re-review unaffected material.
4. Record the owner's exact decision, including approved wording when relevant,
   immediately.
5. Resolve the current issue, then identify the next item on the page. When no
   item remains, ask whether the page or flow is complete before advancing.
6. If implementation will exceed the agreed interaction threshold and no later
   owner decision depends on it, write a deferred implementation entry and
   continue review. Do not defer when the result is needed for the next
   decision.
7. Respect owner pacing for opening, navigating, or changing review artifacts.
8. After implementation, reconcile the tracked source, generated/imported
   destination, rendered artifact, review queue, and commit.

## Activation

A deferred or queued item becomes active only through the current routing and
authorization process. Before activation, recheck source state, dependencies,
owner decisions, tools, and risk; an old queued plan cannot self-activate.

When activating several fully decided items that require no owner input, work
through them normally with the same QA standard and report the results
together. A request for a rough estimate is not a request to rush or lower the
standard.

## Completion Evidence

Record queue status, owner decision, implementation commit, validation,
rendered recheck, downstream changes, and any post-review change that requires
the owner to revisit the item.

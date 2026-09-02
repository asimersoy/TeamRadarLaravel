# Design And Rendered Review

## Trigger

Use for visual direction, design prototypes, UI handoffs, public copy reviewed
in context, responsive inspection, or approval of rendered states.

## Design Delegation Boundary

A design packet states the allowed artifact directory, final implementation
stack, page or component coverage, content assumptions, responsive states,
accessibility requirements, prohibited implementation actions, and approval
phase. Prototype work must not silently become production code.

## Workflow

1. Define audience, task, domain-specific visual requirements, existing design
   constraints, and required states.
2. Establish reusable tokens and components before page variants.
3. Review representative desktop and mobile artifacts.
4. Implement only approved direction in the real application.
5. Seed or import representative content and inspect the real rendered pages,
   not only source files or isolated components.
6. Review copy in context for hierarchy, density, truncation, repetition,
   misleading controls, empty states, and responsive fit.
7. Record owner decisions and whether later changes invalidate a prior visual
   pass.

## Interaction Review

Controls that appear functional must work or be removed/disabled truthfully.
Test keyboard access, focus, labels, validation, loading, empty, error,
permission, and success states. Text must not overlap or become unreadable at
supported viewports.

## Owner Review Queue

Present one page or bounded decision at a time. After resolving feedback,
identify the next item or ask whether the page is complete. Deferred
implementation must not make an unreviewed page look approved.

## Completion Evidence

Record artifacts and routes inspected, viewport sizes, state coverage,
screenshots where useful, accessibility checks, owner decisions, remaining
review items, and implementation commit.

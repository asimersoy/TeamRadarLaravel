# QGuard Color Direction

- **Record type:** owner discussion and agent recommendations
- **Date:** 2026-10-28
- **Status:** calibrated A · Forest & Lime approved and applied under DEC-073
- **Authority:** DEC-070 accepts the Mobbin-refined visual/layout baseline at
  `9cb1bbc`; DEC-071 requests visible dark samples; DEC-072 selects A and asks
  for feedback assessment; DEC-073 accepts the recommendation and its application.
- **Owner:** project owner selects; agent prepares comparisons.
- **Update trigger:** owner preference, rendered comparison or color approval.

## Current Owner Disposition — 2026-10-28

The owner selected A in DEC-072 and accepted the calibration recommendation
in DEC-073. The [application record](palette-application/README.md) gives the
exact current roles, rendered verification and boundaries. OQ-016 is resolved.
The [assessment](color-feedback-review.md) explains the two border strengths.
The comparisons and scope below describe the preceding exploration.

## Scope And Route

This bounded review records the owner's response and frames the color choice.
Mandatory entry and project governance were read. The worktree contains the
related uncommitted color-review notes from the preceding owner exchange;
these are preserved and included in this review batch.
Routes: documentation/workflow/QA/Git/coverage, design/rendered review, external
owner review, code (comparison builder only), content in context and
deferral/owner review. Primary agent authors and self-checks; no delegation.

The owner now requests visible samples, prefers a dark background, and clarifies
that this is a choice rather than a problem with the design. Prepare three dark
color treatments on identical existing QGuard screens: forest/lime, navy/blue
and charcoal/violet. Preserve page structure, product copy, logo shapes and
behavior. Only comparison copies change; the accepted prototype stays intact.
No new reference search is needed: these are original color proposals applying
the owner request, not new Mobbin-backed structural redesigns. The Mobbin
structural-variation workflow is not used to change the accepted layouts.

Acceptance: show actual rendered samples and a page/palette switcher, inspect
desktop and narrow views, check text/control color pairs and local packaging,
and record limits. One coherent local comparison/decision-record commit at the
finished review-artifact boundary; final palette remains owner-selected.

## Earlier Baseline

The current refined CSS uses workspace `#F3F5F1`, white panels, navigation
`#142D28`, primary action `#245F4C`, body text `#172B28` and muted text
`#5A6C66`. The dark-surface Q mark uses pale lime `#C9E99B`. Colors are
observed from the local source and exported brand assets, not inferred from
Mobbin. The owner accepted the revised layout and is choosing its palette.

## Compared Alternatives — Historical

| Direction | Proposed treatment | Design judgment, not a measured outcome |
| --- | --- | --- |
| A · Forest / lime | Deep green surfaces with pale lime actions and navigation highlight | Agent preference: carries the existing QGuard identity into dark surfaces |
| B · Navy / blue | Blue-black background, lighter navy panels, ice-blue actions | An alternative with a cooler color treatment |
| C · Charcoal / violet | Charcoal-purple background, lighter panels, lavender actions | An alternative that changes the existing green identity most |

The owner now prefers dark surfaces for this comparison. The preceding
light-workspace recommendation is not carried forward into these samples.
Showing alternatives does not approve shipping a theme picker or both modes
in the first version. The same sign-in, matchmaking and feedback pages supply
the comparison; amber/red status states remain independent of brand accents.
Keep the accepted logo geometry, spacing, lettering and tagline. A selected
palette may require color variants of those assets, not a new logo design.

## Historical Samples And Source

- [Interactive page/palette viewer](color-study/index.html): eight representative
  pages, A/B/C buttons and a full-size link for each preview.
- [Side-by-side comparison](color-study/comparison.html) /
  [rendered PNG](color-study/evidence/comparison.png): actual browser captures.
- [A · Forest](color-study/forest.html), [B · Blue](color-study/blue.html),
  [C · Violet](color-study/violet.html): independent self-contained samples.
- [Palette tokens](color-study/palettes.json) and [builder](color-study/build.py).
  Run `python3 project-docs/design/qguard-review/color-study/build.py` to rebuild
  from the accepted standalone prototype and viewer template.

The samples only override color treatment and review controls. Letter paths,
layout and product click/submit handlers remain unchanged. Sample storage is
isolated by palette so exploration does not overwrite the accepted prototype's
state. Each sample starts from the same fictional baseline. Screenshots are
review evidence, not regenerated automatically by the builder. No new Mobbin
search or competitor-based color claim was used.

## Verification — 2026-10-28

- Twelve desktop page renders (1440×1000), twelve narrow page checks (390×844),
  twenty-four page/palette switcher combinations and narrow viewer fit passed;
  [browser checks](color-study/evidence/browser-checks.json).
- Visually inspected forest matchmaking, blue sign-in, violet feedback, the
  narrow viewer and the 1800×1120 comparison board. No broken brand images or
  page-wide horizontal overflow in the checked routes.
- Enter activates a palette control; exactly one option is selected, and full-size
  links match the selected page/palette. [Interaction evidence](color-study/evidence/interaction-checks.json).
- Thirty-three selected solid text/control color-pair checks pass the stated
  thresholds in [contrast checks](color-study/contrast-checks.json). The first
  forest border pair was strengthened after its initial check failed. Placeholder
  text gets an explicit readable color. This is not a full accessibility audit.
- JavaScript syntax passed for all samples and viewer. Deterministic regeneration,
  original interaction handlers, SVG path geometry and unchanged accepted source
  were checked. All 251 local document/asset targets and the full scoped diff
  passed at the commit boundary; `git diff --check` passed.
- Browser logging returned one source-unattributed MutationObserver error while
  rapidly changing iframe previews. Neither the source prototype nor viewer
  defines a MutationObserver; no associated page/selection failure was observed.
  Attribution is not established; the console is not claimed clean.
- No live integration, production behavior, full cross-browser/device matrix or
  direct file-URL execution test was performed. Rendering used a loopback server.

## Handoff

The three samples were saved in `7f21b91`. DEC-073 subsequently applies the
calibrated A to current design and brand files. Historical samples remain
unchanged in appearance; their controls/entrypoints explicitly identify them
as history. Current review starts at [the approved prototype](qguard-review.html).
No push, application work or deployment.

The loopback-only preview at `http://127.0.0.1:8765/color-study/index.html` is
left running for owner comparison, with one deliverable browser tab. Its
temporary test viewport is reset at handoff; existing user tabs are preserved.
The saved HTML files remain available when that preview server is stopped.

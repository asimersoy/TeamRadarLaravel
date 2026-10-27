# QG-DESIGN-2 Verification

**Date:** 2026-10-28 · **Scope:** local design prototype, brand assets and records.
The owner selected brand retention and authorized refinements in `DEC-069`.
Revised layouts remain for owner review. No new stack/policy approval is inferred.

## Browser evidence

| Check | Actual result / evidence |
| --- | --- |
| Refined mode, 79 routes at 1440×1000 | Headings and one main landmark, no page-wide horizontal overflow, brand images loaded; [desktop JSON](evidence/desktop-route-checks.json) |
| Refined mode, 79 routes at 768×1024 | Same bounded checks passed; [tablet JSON](evidence/tablet-route-checks.json) |
| Refined mode, 79 routes at 390×844 | Headings, no page-wide overflow or broken images; [mobile JSON](evidence/mobile-route-checks.json) |
| Wireframe/Concept, 79 routes each at 1440×1000 | 158 checks, headings/labels/images present, no page-wide overflow; [JSON](evidence/alternate-mode-checks.json) |
| Selected interactions | 20 explicit checks passed; [results](evidence/interaction-checks.json) |
| Standalone HTML | Five representative routes loaded embedded SVGs with no external script/style/image assets; all three modes loaded their brand variant; [JSON](evidence/standalone-checks.json) |
| Console | No warning/error entries returned for the preview tab at final query |

The 237 responsive route checks plus 158 alternate-mode checks establish
render coverage, not behavior for every variant. Frozen states (other players,
no-show deadlines, provider failures, partial/complete fixtures) remain synthetic.

Interactions actually exercised: guest → setup → sample Riot connection → rank;
rank checkbox required; empty code rejected; structured host code shared; lobby
acknowledgment and session end; Escape dismisses a reversible dialog; feedback
debt returns a queue attempt to session detail; untouched sliders omitted;
touched midpoint included; confirmation count reflects that distinction; locked
rating survives reload with no editable controls; remaining ratings keep queue
blocked; finishing all four unlocks the next rank check; premade/full-premade
exclusions; exact-handle request; incoming-request acceptance; one discrepancy
corroboration disbands; account navigation and keyboard skip link. Clipboard
button was exercised, but OS clipboard contents were not used as evidence.

## Visual inspection

Reviewed welcome, login, matchmaking, history, profile, settings, handoff and
feedback in desktop captures, plus mobile history, code and feedback controls.
The [page gallery](pages.html) compares thirteen representative pages with
`ea8d478`. The [annotated comparison](comparison.html) uses actual 1440×1200
renders so the first rating card fits completely. Its callouts use measured
[DOM bounds](evidence/comparison-bounds.json), not guessed positions. The board
was inspected after rendering and then made self-contained by embedding both
pane images. [PNG](evidence/comparison.png).

Capture review caught stale compositor frames during rapid hash navigation.
Desktop before/after files were recaptured after full page loads and fresh UI
reads; saved examples and the final board were inspected. Mobile controls were
also inspected after keyboard scrolling. The smaller heading and bounded form
are visible changes, not claimed conversion/usability improvements.

Brand sheet and wide/compact variants were visually inspected. SVGs contain
outlined glyph paths and titles, with no text/font dependencies; icons export
as SVG, ICO and 32/180/512 PNG. QGuard shape, source font weights, tracking and
palette are retained. The compact tagline uses intentional sentence breaks.
The artifact's former missing favicon is supplied. No font binaries were added.

## Source and record checks

- `node --check prototype/app.js` passed.
- Brand generator ran successfully with installed Avenir Next Heavy/DemiBold.
- `build-standalone.py` regenerates the standalone file, including brand images.
- Source/package equivalence and deterministic regeneration passed. All thirteen
  SVGs parse; none contain live text or image elements. PNG dimensions and ICO
  payload match their declared outputs.
- Twelve changed/new Markdown files: 236 relative document targets/anchors and
  37 local HTML links/assets passed. All evidence/ledger JSON parses.
- Full scoped diff and `git diff --check` passed. Click/submit/input handlers and
  initialization after the click handler remain byte-identical to the baseline.
- Final source review aligned the catalog label with iteration 04 and made both
  Settings connection links select the existing linked/unlinked fixture correctly.
  Syntax and standalone equivalence were rechecked after these small corrections.
- Application, legacy and portable workflow are outside the changed paths.

## Limits and cleanup

No Mobbin refusal or usage-limit notice occurred across the 18 recorded
searches. Queries covered screens, individual controls, three flow searches
and a hero-section search. Twenty selected references have direct canonical
links. Flow evidence is limited to returned preview positions. No screenshot
establishes another product's API or backend, and no gaming-matchmaking result
was promoted into a false direct precedent.

Not run: real RSO/Riot API, real party-code/non-friend tests, Discord, game
clients, multi-user backend, migrations, production authentication, real email,
cross-engine/device matrix or full assistive-technology audit. Direct `file:`
execution remains unverified under the browser tool's URL restriction; the
self-contained file was checked through loopback HTTP. No public hosting.

The owned loopback server was stopped (exit 0), the temporary viewport reset
and the owned preview tab closed. Baseline scratch copies were removed after
comparison capture; Git
retains the original source. No user tab, unrelated process or stored app data
is removed. Stack review and P-03/P-04/P-05 policy questions remain pending.

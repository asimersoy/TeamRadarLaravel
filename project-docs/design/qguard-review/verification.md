# Design Verification — 2026-10-27

**Historical baseline:** the later [Mobbin pass verification](mobbin-pass/verification.md)
supersedes current-artifact coverage and supplies the favicon/brand exports.
The results below describe the earlier revision.

**Scope:** local design artifact only. These results do not certify the existing
application, a deployed system, real provider behavior or production security.

## Rendered Coverage

- 26 top-level routes: 25 product/recovery screens and the review catalog.
- 79 route/state combinations in the final catalog, including default routes.
- Refined mode: all 79 inspected at 1440×900, 768×1024 and 390×844: **237 checks**.
  Each rendered a heading and one main landmark; no page-wide horizontal
  overflow or unlabelled input/select/textarea was found by the DOM checks.
- Wireframe and Concept modes: all 79 at 1440×900: **158 additional checks**;
  headings present and no page-wide horizontal overflow.
- Representative screenshots were visually reviewed: dashboard, team/code,
  feedback, auth and narrow team/feedback. Table regions may scroll internally.
  These checks are not an exhaustive assistive-technology or cross-engine audit.
- Final browser console error query returned no errors for the prototype tab.

Machine-readable results: [responsive route checks](evidence/route-checks.json)
and [visual-mode checks](evidence/visual-mode-checks.json). Earlier desktop/mobile
JSON files capture the initial 71-state pass; the final records supersede their
coverage count. Screenshots: [visual iterations](visual-iterations.md).
Saved PNG inspection caught a premature viewport capture; it was replaced after
the browser settled. Responsive checks were reconfirmed with actual width/height
recorded, not just the requested viewport. Temporary preview tabs were closed
and the temporary viewport override cleared at handoff.

## Interactions Actually Exercised

| Check | Observed result |
| --- | --- |
| Guest → setup → sample Riot connection → dashboard | Worked; no Riot login or credentials requested |
| Rank submitted without confirmation | Inline error; no queue entry |
| Confirm rank → queue → explicit sample formation | Team screen opened with fictional peers |
| Host enters `DEMO-5Q`, shares, manually confirms lobby | Code displayed; manual confirmation saved; game entry not claimed |
| End-session confirmation and Escape | Escape dismissed and restored focus to End my session; confirm opened feedback |
| Submit honor without selecting a number | Inline required-rating error |
| Mina rating with untouched descriptors | Confirmation explicitly showed zero optional descriptions; final receipt locked |
| Pending feedback → Matchmaking → Find match | Returned to unfinished session detail |
| Atlas slider moved right then left to midpoint | Status said included at 50; confirmation included one optional description |
| Submit all four eligible cards | Four locked receipts, Continue enabled, next rank-confirmation screen opened |
| Invite Vega → party readiness → formation → session | Three rating forms; Vega displayed as excluded original premade |
| Unknown friend handle, then Rune | Unknown sample rejected; Rune request displayed as pending |
| One corroborating rank-mismatch response | Disband screen opened; no game action or score penalty |
| Admin note and Mark reviewed | Note persisted in sample; Reviewed button disabled; no penalty action offered |
| Keyboard skip link | Focus moved to main without breaking hash routing |

Some catalog states are deliberately frozen visual fixtures: no-show deadlines,
other players' votes/readiness, reconnect, complete/partial history and provider
failures. They are not concurrent users or running backend workflows. Direct
catalog navigation is a review capability and is not an authorization boundary.

## Fixes Made During Review

Moved party-code instructions above the roster; wrapped narrow navigation;
corrected premade feedback targets/counts and preserved their snapshot when the
player ends; removed implied automatic game confirmation; fixed skip-link routing;
made unknown/duplicate sample requests explicit; retained descriptor omission
distinct from an intentional midpoint. Added teammate-summary, no-show and
recovery fixtures rather than treating missing screens as passed.

## Reproducibility And Limits

Source JS passed `node --check`. Source/static-package equivalence and local
Markdown targets are checked in the checkpoint work record. No dependency install
or bundler is needed. An owned loopback-only Python server was used for browser
testing; it is stopped at handoff. No remote host was created or published.
The HTML/CSS/JS requests succeeded; the browser's optional favicon request
returned 404 because the artifact does not supply a favicon.

The single-file HTML is generated from the tested source, with CSS and JS inlined.
The in-app browser rejected direct `file:` navigation by its URL policy. That
attempt was not retried through another surface. The standalone file is supplied
as a local artifact; its direct-file browser execution was not verified here.
The split source was exercised through the permitted loopback HTTP preview.

Not run: actual RSO/API, real party-code/non-friend, Discord, game-client,
multi-user backend, database migration, load/concurrency, real email, production
auth, clipboard permission prompt, public launch or browser-engine matrix tests.
The existing application was unchanged; its old test evidence is not relabeled
as evidence for this new design. Live code testing remains DEF-014 after RSO.

The prototype does not calculate honor or infer provider/game status. It shows
fixed sample scores, synthetic receipts and visual outcomes. Unresolved P-03,
P-04 and P-05 are still owner choices before their affected implementation.

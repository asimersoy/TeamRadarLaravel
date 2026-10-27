# QGuard Review Design

- **Status:** draft review artifact; no page is owner-approved yet
- **Authority:** DEC-062/066–068 and [QG-REVIEW-1](../../specs/review-version/README.md)
- **Scope:** original local HTML/CSS/JS, fictional data, no live integrations
- **Owner:** project owner reviews; agent prepares and tests
- **Source:** [prototype/index.html](prototype/index.html)
- **Inventory:** [pages and states](pages.md)
- **Review entry:** [standalone HTML](qguard-review.html)
- **Visual comparisons:** [iterations and rationale](visual-iterations.md)
- **Evidence:** [verification and limits](verification.md)
- **Owner checkpoint:** [start here](../../planning/review-version/README.md)

Serve `prototype/` with a local static HTTP server. No dependencies or build are
required. The prototype is not the production frontend and does not select the
application stack. Review controls live in a separate top strip. Use All screens
to open any page/state, Reset sample to restore fictional data, and the visual
mode selector to compare Wireframe, Concept and Refined modes. Browser storage
contains synthetic prototype state only; never enter actual credentials/data.

Every product button performs a local demonstration, navigates to another
sample state or explains an unavailable live action. The prototype cannot
authenticate a Riot account, match real users, enter a game or create Discord
rooms. Guest/admin preview is reviewer navigation, not production authorization.

The checkpoint packet and verification record are linked from the
[work record](../../planning/design-checkpoint.md). Outstanding policy proposals
remain in [the spec packet](../../specs/review-version/proposals.md).

## Local Preview

Open `qguard-review.html` in a local browser, or from this repository run:

```sh
python3 -m http.server 8765 --bind 127.0.0.1 --directory project-docs/design/qguard-review/prototype
```

Then open `http://127.0.0.1:8765/#review`. Stop that terminal server with Ctrl-C
after review. The in-app browser allows HTTP preview but rejected direct `file:`
navigation; standalone direct-file execution is not part of the passed checks.
No server is left running by this pass.

The standalone file is a generated convenience copy: replace the stylesheet
link in `prototype/index.html` with `styles.css` in a style element and its script
source with `app.js` in a script element. Those three source files remain the
editing authority. Validate equivalence after edits rather than hand-editing
both copies. All assets are inline/code-native; no CDN or remote font is loaded.

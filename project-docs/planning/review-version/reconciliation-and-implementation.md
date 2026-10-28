# QG-REVIEW-1 reconciliation and implementation entry

**Date:** 2026-10-28. **Owner:** project owner. **State:** reconciliation and R1a completed; subsequent backend slices remain.
**Baseline:** `new-development`, `1dc913f`; 22 related decision/specification
Markdown changes already present. Preserve those changes and the legacy app.

## Authority and route

The owner now instructs reconciliation of specifications and mockups followed
by implementation. This authorizes execution of settled behavior in bounded
slices; it is not an override of unanswered policy, live-integration, release,
remote-operation or destructive-operation gates. DEC-066–081 and the approved
layout/brand/palette control this work. The portable workflow is unchanged.

Routing answers yes: product planning, code, content lifecycle, decision safety,
privacy/data, external review, design/rendered review, audit/reconciliation,
interruption/recovery and deferral. Read the mandatory entry documents and
selected procedures, project governance, current state/registers and
`qguard/AGENTS.md`. No new schema/import or deployment is part of the first
slice; the existing migrations run only against disposable `qguard_test`.

## Ordered work and approval boundary

1. Reconcile DEC-076–081 across current requirements and the saved prototype.
   Preserve approved visual direction. Add match acceptance, shared end request,
   blocking discrepancy, self-only descriptors and excluded-author examples.
2. Begin **R1a: isolated guest entry and real-queue boundary**, implementing the
   approved subset ID-01–04, DA guest separation and SG review-version boundary.
   The concrete contract below applies existing owner policy; it does not
   select remaining product choices. R1's full shell migration is subsequent.
3. Continue backend session/feedback slices against their complete contracts,
   with concurrency and migration evidence. No claim that R1a implements them.

At the R1a checkpoint these two choices were pending. The subsequent explicit
answers DEC-083/084 resolve both: stop whole failed premades intact and display
each private descriptor after three distinct eligible reviewers. Current mockup
and specifications reflect them; R1a's dated checks below remain evidence for
its earlier artifact. Backend policies still need their implementation slices.

## R1a technical contract (agent implementation choices)

- `/guest` is a read-only application entry to the approved, bundled review
  walkthrough. It does not sign in as a real/shared guest user or create game,
  score, chat, report or participant records. Normal registration remains open.
- Fictional progression uses a dedicated **sessionStorage** key per browser tab;
  reset clears only that preview. Closing the tab discards it. This replaces
  persistent local storage for preview state, not retention of business records.
  Duplicated tabs may start with a copied snapshot but do not share later writes.
- Generated review HTML is packaged inside `qguard/resources/review/` so the app
  is independently buildable. The canonical source remains the design prototype;
  a deterministic builder and equality test prevent a drifting second source.
- CSP prevents network connections and form submissions from the walkthrough;
  only its hashed inline script/styles and bundled data images execute/render.
  No Riot/Discord/RSO credential or real API capability exists there.
- Queue admission **and background formation** are closed until the later RSO
  slice. A hand-entered Riot ID, direct Livewire call, guest state or an old
  waiting entry cannot open normal matchmaking. Existing records are retained.
- Historical engine regression tests remain runnable only with an explicit
  test flag plus the existing disposable PostgreSQL safety checks. That flag
  cannot enable the engine in local/production environments. This is a test
  seam, not a live enable switch.
- The real login/dashboard explain the unavailable state and link to guest
  review. Existing backend pages retain their first-pass scope until migrated;
  the new walkthrough must not be described as completed backend functionality.

## Verification and rollback boundary

Check complete scoped diff, Markdown links, JS syntax and reproducible bundles.
Browser-check changed flows, timers, immutable ratings, private profile, desktop
and mobile layout; distinguish sample interactions from server tests. Verify
real guest entry, CSP, no business-record changes, gate bypass attempts and
background formation. Run existing tests affected by queue guards. Docker-only
PHP/browser/PostgreSQL; never reset persistent dev data or unrelated containers.

A coherent decision/spec/mockup batch and an independently working R1a code/test
batch are meaningful rollback units. No per-file/per-answer commits. No push,
PR, deployment, live player/provider test or destructive operation authorized.

## Evidence

- Reconciled current owner rules and rebuilt both identical HTML bundles. The
  [behavior review](../../design/qguard-review/behavior-reconciliation/README.md)
  retains screenshots, coverage and limits; no new palette or product policy.
- Focused backend tests: 18 passed / 83 assertions. Broader Pest suite: **64
  passed / 90,327 assertions**, including existing concurrency regressions.
  These preserve the historical engine; only four new ReviewEntry tests prove
  R1a server behavior. They do not prove revised feedback/session services.
- Browser review: **22 passed, 2 intentional duplicate-catalog skips** across
  Chromium/Firefox/WebKit; **81 catalog route/state links**, changed screens at
  1440×1000 and 390×1000. A later three-engine popup-only run also passed while
  replacing a misleading full-page capture with a viewport screenshot.
- Seven changed PHP files passed Pint. JS syntax, deterministic builder `--check`,
  local Markdown links/anchors and `git diff --check` passed. Representative
  popup, shared-end, self-profile and mobile teammate-profile renders inspected.
- First image attempt used `--network=none`; uncached Debian dependency layers
  prevented it finishing. A normal local build then succeeded without changing
  dependency constraints/lockfiles. Isolated tag `qguard-app:review-entry-check`
  includes the new resource; no previous production image/tag was replaced.
  A networkless/container-only controller smoke returned 200 with the expected
  guest content; its hash matches both source-generated packages:
  `3aadcaf208b532d1cbc65f3b4a0f619d167cd25702b949281ba9bfb898447318`.
- The regular test port 8121 was occupied. A scratch Compose override publishes
  only `127.0.0.1:55000` and disables the historical test engine in the preview
  app. The test CLI retains its explicit guarded regression flag. Other running
  containers and persistent development volumes were not altered. Current
  local preview: `http://127.0.0.1:55000/guest#welcome`.

No migration was added, no persistent data transformed, and no live RSO/game/
Discord/player test was run. Full backend session/feedback/acceptance conversion,
complete Livewire shell migration, retention/public release review remain; the two policy answers were subsequently resolved by DEC-083/084. No claim that the Riot-reviewable build is
complete or that live use is authorized.

## Commit and next work

One coherent local batch combines the previously uncommitted checkpoint decisions,
their specification/design reconciliation, and the working R1a entry/guard with
its tests and build packaging. Reverting it removes that whole review-entry
checkpoint rather than leaving mismatched design/app copies. No push, PR,
deployment, history rewrite or production-data operation occurred.

Next execute R2/R3 with a complete additive schema/compatibility contract for
shared closure, immutable per-target obligations and forward-only applications;
R4 must implement DEC-083, and real descriptor display must implement DEC-084. Do not
convert the sample HTML timers/values into claims of server enforcement.

## Implementation readiness and owner-requested commit — 2026-10-28

**Request:** commit the current changes and identify anything still needed
before implementation. **Audit baseline:** `6639dce` on `new-development` plus
the related DEC-083/084 decision/specification/preview/test changes. Route this
as audit/reconciliation, product planning, decision safety and Git checkpoint
work under the existing workflow; no protected workflow edits or new policy.

**Finding:** no further major owner decision blocks continuing the bounded
prototype implementation. DEC-083/084 resolves OQ-017/OQ-014. The stack and
current product behavior are selected; the mockup reflects both new answers.
R1a already works, but the revised backend services and complete application
shell are not yet implemented. This is readiness to continue, not completion.

| Remaining item | When required | Responsibility / boundary |
| --- | --- | --- |
| Concrete schema, service transitions, compatibility/migration approach, access checks and concurrency acceptance | Before and during each affected implementation slice | Agent prepares the contract from approved policy, then implements and verifies it; ask the owner only if a genuine new policy choice emerges |
| Actual stored-data inventory and retention/privacy review (DEF-012, OQ-006), audience/use/public-claim boundaries (OQ-004/005) | Data review remains the next implementation review; applicable boundaries must be settled before real-user collection or release | Owner decisions remain open; synthetic prototype work does not settle them |
| Live rank retrieval failure/fallback behavior (P-06), Riot production approval and RSO configuration | Before the later live integration / normal matchmaking slice | Provider evidence and affected owner choices; normal queue remains closed |
| Real non-friend party-code and rank/account visibility checks (DEF-014) | After RSO integration, before normal real-player use | Owner-assisted live tests; planning assumption is not verified capability |
| Discord implementation (DEF-007) | Later, after approval and RSO | Explicitly deferred; not a prerequisite for this web review build |

**Commit boundary:** save both decisions, their specifications and current-state
links, both identical generated review artifacts, focused browser regressions
and inspected screenshots as one local rollback unit. The prior R1a commit
remains intact. No push, PR, deployment or history rewrite is included.

**Evidence:** the unchanged preview/test source retains its 15 passing focused
browser checks across Chromium, Firefox and WebKit. JS syntax, both generated
bundles, 296 local link targets, 46 Markdown anchors and diff whitespace checks
passed again for this checkpoint. The complete scoped diff was reviewed; no
unrelated changes were present. Earlier backend totals and image hash apply to
R1a, not new backend behavior.

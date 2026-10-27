# QGuard Brand And Mobbin Design Pass

**Task:** QG-DESIGN-2 · 2026-10-27–28 · prepared for owner design review

## Authority and route

The owner likes the existing pages and flows, selects the Q mark, QGuard
wordmark and “Good company, good games.”, and requests fixed brand images and
Mobbin-informed improvements across the existing page inventory. The owner
reports upgrading to Mobbin Pro and says to proceed. This is design authority;
it does not approve the stack, unresolved policies or application implementation.
Stop and report any actual Mobbin limit/access refusal without working around it.

Entry: repository and portable AGENTS, portable docs README and task-routing
checklist, project index/current state/live registers, workflow governance.
Routes: documentation, workflow/review, QA/completion, Git/coverage; design,
research/sourcing, content, code (prototype only), decision safety, privacy,
external/owner review, audit/reconciliation, interruption and deferral. Primary
agent is the writer and reviewer. No delegation or external publication.

## Scope and baseline

Baseline: `ea8d478`, clean `new-development`. Source is
[QG-REVIEW-1](../design/qguard-review/README.md): 25 product pages plus a review
catalog, 79 route/state combinations, three existing visual modes. Work stays
in `project-docs/`; application, legacy and portable package are excluded.

Job: a PC player prepares an eligible party, finds compatible teammates,
coordinates their game party and completes private session feedback; account
and review pages support that journey. The owner requested all existing pages,
so shared layout/components are in scope. Apply one targeted direction per
bounded page family, not several alternative concepts awaiting selection.

Preserve: product domain and approved rules, route/action coverage, fictional
data and demo labeling, individual-feedback privacy, proposal labels, existing
color/type system, Q mark/wordmark/tagline and the working flows the owner liked.
Use SVG image assets with outlined lettering for stable brand spacing; provide
wide and compact lockups and a standalone mark. Localization is deferred by
the owner. No invented API, Discord, game-state or public-launch behavior.

## Bounded targets before search

| Family | Job and candidate improvement | Preserve |
| --- | --- | --- |
| Welcome, login, signup, verification/recovery, setup | Understand the session loop and complete the current form; distinguish the form from supporting content | All entry/recovery actions and honest availability |
| Matchmaking, rank, party, queue, team | Make the next action, readiness and joining instructions easier to scan together | Rank confirmation, premades, code handoff and private text |
| History, session feedback, report | Identify unfinished feedback and rate the right teammate; distinguish locked from pending work | Mandatory ratings, optional untouched descriptors, privacy and immutable submission |
| Connections | Distinguish requests, existing connections and party actions | Exact lookup; no player marketplace or inferred game presence |
| Profile | Separate identity, honor and descriptive summaries | Restricted audience and provisional aggregation labels |
| Settings, security, Riot connection | Group account preferences and provider status with their actions | RSO gate and no live credential changes |
| Admin/case, recovery, catalog | Scan evidence/status and understand the available next action | Existing authority limits and all error variants |

References will be recorded with exact Mobbin links, observed screen details,
take/leave decisions and gaps. Cross-domain references lend structure only.
Freeze a move table before editing each family. At most five moves per family.
Do not infer hidden behavior from screenshots or copy another product's branding.

## Verification and commit boundary

Capture comparable before/after desktop renders, inspect mobile/tablet fit,
check all route variants and selected end-to-end interactions, keyboard/dialog
behavior, SVG image loading and standalone packaging. Check local links,
JavaScript syntax, `git diff --check` and the full scoped diff. Record actual
results and unrun checks. Batch the completed brand/design/reference/evidence
work as one meaningful local rollback unit; no per-page commits or remote action.

## Progress

- Entry/state audit complete; baseline source and existing rendered evidence read.
- [References/moves and page coverage](../design/qguard-review/mobbin-pass/README.md),
  [brand export](../design/qguard-review/brand/README.md), page revisions and
  [rendered verification](../design/qguard-review/mobbin-pass/verification.md) complete.
- Owner explicitly encouraged screen, element and flow searches; used all three
  plus hero-section search. No Mobbin limit/refusal or automatic decision signal.
- Final local link/package/diff checks and cleanup are recorded below.
- No application work, provider test, push, PR, publication or deployment.

## Final verification and handoff

- 395 route/mode checks and twenty selected interaction checks passed, with
  limits and screenshots in the linked verification record.
- JavaScript syntax, source/standalone equivalence, deterministic packaging,
  thirteen SVGs, icon formats and 273 local document/HTML links passed.
- Full scoped diff reviewed. Changes are confined to project records/design.
  The original application, legacy code and portable workflow are untouched.
- Removed only the three temporary baseline comparison files, reset the browser
  viewport, closed the owned preview tab and stopped its loopback server.
  Existing user tabs remain open.
- Save the verified brand, prototype, reference ledger, evidence and records in
  one local commit. Revised design and existing stack/policy checkpoint remain
  for the owner; no application implementation or remote action follows.

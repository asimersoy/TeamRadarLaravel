# Gankster Product Detail Study

- **Purpose:** learn from Gankster's small interface and workflow details to
  inform QGuard decisions, while keeping QGuard's own purpose and approvals
- **Authority:** `DEC-059` and `DEC-060`, owner requests on 2026-10-27
- **Status:** active read-only study; onboarding screens and initial desktop
  discovery surfaces inspected, live participation untested
- **Maintainer:** primary Codex agent; agent may navigate within the read-only boundary
- **Method:** [competitor study procedure](../../../operations/competitor-study.md)
- **Update trigger:** further permitted observation, new source or owner direction

**Design-pass closure, 2026-10-27:** [account/connections observations](observations/account-and-connections.md)
and the [feature-transfer/future inventory](design-transfer.md) complete the
accessible evidence needed for this pass. Unseen creation/review/session flows
remain explicitly unverified; no participation or account mutation occurred.
Proceed with QGuard specifications rather than requiring those gaps to close.

The owner sees substantial overlap in teammate finding, rank information,
party joining, Discord coordination and voice. The study focuses on the details:
field defaults, explanations, progress, refresh controls, joining instructions,
permissions, feedback, failure recovery and other friction in actual use.
Overlap does not establish identical APIs or backend architecture.

## Observations and Comparisons

| Record | Coverage and status |
| --- | --- |
| [Onboarding profile step](observations/onboarding-profile.md) | Initial rendered step 1 of 3; no form interaction or completion observed |
| [Onboarding play preferences](observations/onboarding-gankstyle.md) | Step 2 of 3; four centered sliders and a disabled primary action; enablement rule unobserved |
| [Onboarding notification offer](observations/onboarding-notifications.md) | Step 3 of 3; enable and skip choices visible; permission/delivery and completion untested |
| [Desktop layout and group discovery](observations/desktop-and-group-discovery.md) | 1440 × 900 layout, group filters/access states, Lf Duo, recruitment, scrims and Duos sign-in |
| [Matching and game status](matching-and-game-status.md) | Groups listing/leader acceptance versus Duos pairing; documented desktop status synchronization and unverified implementation details |
| [QGuard design candidates](qguard-comparison.md) | Possible adaptations and evidence needed; none adopted by this study |
| [Earlier party-code and Gankster research](../../valorant-party-codes-and-gankster.md) | Published-source findings, side-chat hypotheses and proposed game tests; retained in its existing canonical location |

## Study Coverage

| Area | What to look for | Current evidence |
| --- | --- | --- |
| Onboarding and account linking | Required/optional fields, steps, connection explanations, back/skip, saved progress | Three screens observed; owner later reached main list, but completion choices and linking unobserved |
| Notifications | Permission explanation, opt-out, browser prompt, delivery and settings | Site-level enable/skip offer observed; choices and delivery untested |
| Rank freshness | Observed rank, timestamp, manual reload, automatic triggers, pending/error/cooldown states | Published refresh guide in earlier research; not yet seen in this account |
| Group creation and browsing | Filters, defaults, eligibility, capacity, application/acceptance and cancellation | Desktop list and filters inspected; application/leader acceptance documented; creation form and participation untested |
| Party entry | Code versus invitation, host instructions, recipient actions, stale/full lobby handling | Live Invite Only/Party Code filters and row controls observed; no successful join tested |
| Discord and voice | Admission, channel allocation, permissions, connection failure and cleanup | Published claims only; no live flow observed |
| Session completion and reputation | Match detection, review availability, prompts, refusals and abuse handling | In Match label observed; desktop synchronization/tracking documented, transitions and reviews untested |
| Matchmaking versus listings | Whole-team assembly, recommendations, pair matching and leader selection | Groups is primarily LFG; Duos advertises pair matching; no evidence of automatic full-team honor matching |

This is coverage for progressive observation, not a requirement to finish the
whole study before unrelated approved work can proceed. It does not activate
the held game/Discord tests.

## Current Resume Point

The agent returned the tab to
[VALORANT Türkiye Play Now](https://valorant.gankster.gg/communities/valorant-tr/lfg)
after the desktop discovery pass. The main review viewport is 1440 × 900.
Read the current page state before continuing; it may change between turns.
The separate Duos tab remains at sign-in. No joining, matching, publication or
account-setting action is authorized. Rank settings, successful viewing of the
group-creation form, full profile details and session transitions remain open.
The current report answers the listing/status questions to the evidence available;
do not treat every remaining study question as an implementation blocker.

Onboarding no longer overlays the list, but the owner's intervening choices
were not observed. Earlier slider/notification uncertainties remain. Continue
saving related findings without committing each screen or conversation turn.

The accumulated walkthrough and its resulting owner product decisions are
now grouped in the [consolidated checkpoint](../../../planning/product-design-pass.md#consolidated-study-and-direction-checkpoint).
The dated checkpoints below preserve their earlier uncommitted-state reports;
they do not describe the current Git state after that commit.

## Desktop Study Checkpoint 2026-10-27

Baseline remains `new-development` at `1bb74bb`, with the prior onboarding and
all-commits batching clarification intentionally pending. Route: read-only
research/sourcing, rendered UI review, privacy/data, decision safety, operating
permission reconciliation and documentation QA under the previously read
unchanged procedures. No delegation, implementation or release route is active.

This continuation adds GANK-OBS-004 and the sourced matching/status report,
records `DEC-060`, and reconciles the procedure, indexes, comparison and current
state. It preserves the prior pending work and portable package. Acceptance is
a documented desktop sample, clear evidence classes, a bounded answer to the
matching/status questions, and no unauthorized participation or copied secrets.
Verification: reviewed the scoped diff and new notes against captured UI and
primary sources. All 150 local links, 23 anchors and 60 unique decision headings
across the 12 pending Markdown files passed checks; `git diff --check` passed.
The final community view was again confirmed at 1440 × 900 without horizontal
overflow. No application tests or portable-package validator were needed for
these project-documentation changes. The current questions have a bounded
evidence-backed report; the larger study remains ongoing. Notes stay saved and
uncommitted for meaningful batching. No push or live-provider test occurred.

## Earlier Onboarding Batch Checkpoint

GANK-OBS-002 and GANK-OBS-003 continue the same approved study route from
`1bb74bb`, preserving the owner's pending all-commits batching clarification
in four existing files.
The agent inspected each new screen passively. The batch adds preference and
notification observations and updates the index, transition notes, comparison
and current state. No new product decision is inferred. The new observation and
dependent updates were checked against the captured state; all 66 local links
and 18 anchors in the nine pending files passed checks, as did
`git diff --check`. Notes remained uncommitted at that checkpoint while onboarding
completion was unobserved; no push, application change or game test occurred.

## Initial Study Checkpoint 2026-10-27

Baseline: clean `new-development` at `8f9a418`. Route: research/sourcing,
product planning for study scope, rendered UI review, privacy/data, decision
safety, owner review, reconciliation and deferral boundaries. Mandatory
entry/system and project governance records were read; selected procedures
were read or remain unchanged from the preceding turn. No delegation, code,
public content, migration or deployment route is activated.

Scope: this study folder, its project-specific operating procedure, `DEC-059`
and discovery links/current state. The portable package, existing product
specifications and application remain unchanged. Acceptance requires a useful
first-screen record, explicit owner-controlled browsing, separated evidence
and hypotheses, no copied personal data/join secrets, and valid linked records.

Verification: the complete eight-file change was reviewed; all 135 local links,
23 anchors and 59 unique decision headings passed checks, as did
`git diff --check`. Notes were checked against the captured UI and retain no
account/player identifiers or joining secrets. The portable validator was not
run because that package is unchanged. One additive local documentation commit
records this checkpoint.

Rendered evidence covers one current viewport only; no responsive, keyboard,
validation, navigation, backend/API or game tests occurred. No site mutation,
push or deployment occurred. The initial checkpoint is not completion of the
whole competitor study.

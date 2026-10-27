# Gankster Product Detail Study

- **Purpose:** learn from Gankster's small interface and workflow details to
  inform QGuard decisions, while keeping QGuard's own purpose and approvals
- **Authority:** `DEC-059`, owner request on 2026-10-27
- **Status:** active, owner-led walkthrough; only the initial screen inspected
- **Maintainer:** primary Codex agent; owner controls site interaction
- **Method:** [competitor study procedure](../../../operations/competitor-study.md)
- **Update trigger:** owner reveals another screen/state or supplies findings

The owner sees substantial overlap in teammate finding, rank information,
party joining, Discord coordination and voice. The study focuses on the details:
field defaults, explanations, progress, refresh controls, joining instructions,
permissions, feedback, failure recovery and other friction in actual use.
Overlap does not establish identical APIs or backend architecture.

## Observations and Comparisons

| Record | Coverage and status |
| --- | --- |
| [Onboarding profile step](observations/onboarding-profile.md) | Initial rendered step 1 of 3; no form interaction or completion observed |
| [QGuard design candidates](qguard-comparison.md) | Possible adaptations and evidence needed; none adopted by this study |
| [Earlier party-code and Gankster research](../../valorant-party-codes-and-gankster.md) | Published-source findings, side-chat hypotheses and proposed game tests; retained in its existing canonical location |

## Coverage to Build with the Owner

| Area | What to look for | Current evidence |
| --- | --- | --- |
| Onboarding and account linking | Required/optional fields, steps, connection explanations, back/skip, saved progress | First appearance/profile step only |
| Rank freshness | Observed rank, timestamp, manual reload, automatic triggers, pending/error/cooldown states | Published refresh guide in earlier research; not yet seen in this account |
| Group creation and browsing | Filters, defaults, eligibility, capacity, application/acceptance and cancellation | Only background DOM under onboarding; functional flow unobserved |
| Party entry | Code versus invitation, host instructions, recipient actions, stale/full lobby handling | Published research and background code-shaped controls; no successful join observed |
| Discord and voice | Admission, channel allocation, permissions, connection failure and cleanup | Published claims only; no live flow observed |
| Session completion and reputation | Match detection, review availability, prompts, refusals and abuse handling | Published claims only; no live flow observed |

This is coverage for progressive observation, not a requirement to finish the
whole study before unrelated approved work can proceed. It does not activate
the held game/Discord tests.

## Current Resume Point

The owner's tab is at
[VALORANT ESP Play Now](https://valorant.gankster.gg/communities/valorantesp/lfg).
The visible foreground is the appearance/profile onboarding form, step 1 of 3.
The agent inspected the existing tab and one viewport screenshot without
changing the site. Continue from whichever state the owner chooses next; do
not assume that the page has stayed unchanged between turns.

## Checkpoint 2026-10-27

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

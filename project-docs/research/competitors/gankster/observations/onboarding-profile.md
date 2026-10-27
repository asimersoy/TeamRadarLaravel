# Gankster Onboarding Profile Step

- **Observation:** GANK-OBS-001
- **Observed:** 2026-10-27, owner-controlled in-app browser
- **Source:** [VALORANT ESP LFG page](https://valorant.gankster.gg/communities/valorantesp/lfg)
- **Owner-reported context:** just logged in; this was the first page encountered
- **Evidence:** existing-tab accessibility state plus current viewport screenshot
- **Viewport:** 762 × 973 CSS pixels, device pixel ratio 2; no viewport override
- **Coverage:** foreground step 1 of 3 only; no interaction performed by agent
- **Update trigger:** owner advances, changes a field, or reveals another state

## Foreground and Hierarchy

The community page is blurred behind a large dark onboarding panel. A purple
circular progress graphic sits above the title; a separate 1/3 indicator makes
the step count explicit. The heading is **Customize your appearance**. Supporting
text explains that username and bio introduce the user to the community.

The form is one column. An avatar/upload area comes first, followed by username,
email and bio. Dividers separate the introduction, fields and primary action.
The wide purple **Save & continue** button is visually dominant at the bottom.
This is one observed viewport, not evidence of all desktop/mobile layouts.

## Visible Controls and Defaults

| Control | Observed state | What remains unknown |
| --- | --- | --- |
| Avatar | Circular initial-based avatar and Upload image affordance; a file chooser is exposed in accessibility state | Source of initial, crop/size/type limits, upload failures, whether optional |
| Username | Prefilled single-line editable field; actual value omitted from these notes | Source of prefill, uniqueness, length/character rules, rename consequences |
| Email | Empty single-line field with email-oriented placeholder; helper text says it is not visible to others | Whether mandatory, why requested after this login, verification, audience beyond this UI claim |
| Bio | Empty multiline field with a prominent recommended badge and introductory placeholder | Whether truly optional, length/content rules and where shown |
| Save & continue | Primary control appears available; accessibility state has no disabled marker | Validation, persistence, loading, next step and failure recovery |
| Navigation | Step indicator is visible; no back, skip or close control is visible in this captured state | Whether dismiss/back/skip exists elsewhere or via another interaction |

The email helper is a product claim shown by Gankster, not independently
verified access-control behavior. The recommended badge suggests a distinction
from mandatory fields but does not prove submission rules. An apparently
available primary button does not establish that an empty email is accepted.

## Background Page Context

Accessibility state also exposed the underlying community: VALORANT ESP,
Spanish-language context and EU/LATAM labels; navigation for Play Now,
Leaderboard, duo finding and members; create-group and filter controls; and
a community-join call to action. It contained group rows with occupancy counts,
some code-shaped buttons and some disabled Join controls alongside full counts.

These were behind onboarding in the rendered view. Do not treat them as an
explored list, verified available players, successful party-code joining or
proof that capacity is the sole reason for disabled controls. The rows could
be previews or have other access conditions. Player identifiers, listing text,
profile URLs and code values are intentionally not retained.

This narrows the earlier public JavaScript-shell limitation: the authenticated
tab exposes code-shaped controls, but their function and resulting game entry
are still untested. Inspect the actual group flow when the owner chooses it.

## Details Worth Comparing for QGuard

See [the candidate table](../qguard-comparison.md). The main design questions
raised here are how much profile setup should precede the user's main task,
how optional fields are distinguished, how progress is communicated, and how
field-level privacy claims are made clear and accurate.

## Unobserved States

The owner subsequently reached [step 2](onboarding-gankstyle.md). This establishes
that progression occurred, but the agent did not observe the intervening field
edits or submission; it does not settle which profile fields were required.

Step 3 is now recorded in [the notification offer](onboarding-notifications.md).
Login/RSO, submission rules, back/skip behavior, persistence after
reload, errors, rank retrieval/refresh and actual group or voice behavior are
unobserved. No click, scroll, input, upload, account change or submission was
performed. No raw screenshot or DOM dump containing account/player details was
saved to the repository; this sanitized observation is the durable record.

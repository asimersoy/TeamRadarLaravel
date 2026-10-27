# Mobbin Reference And Revision Record

**Status:** prepared for owner review, design revision only · **Accessed:** 2026-10-27;
rendered verification completed 2026-10-28.
Authority and boundaries: [task plan](../../../planning/mobbin-design-pass.md).
Full queries/results: [search ledger](searches.json). No access refusal or usage
notice has occurred. The owner reports Pro access; billing was not inspected.

The owner explicitly encouraged screens, individual elements and flows. This
pass uses screen searches for page structures and controls, flow searches for
onboarding/recovery, and section search for the welcome hero. These are captured
interfaces, not evidence of private APIs, current backend behavior or measured
product outcomes. Every returned inline preview was inspected. For flows,
only the previewed positions below are evidence; intermediate screens are not
silently treated as observed. References are linked rather than redistributed.

## Selected references

| Ref | Observed reference | Take | Leave |
| --- | --- | --- | --- |
| R01 | [Discord friends](https://mobbin.com/screens/e001c6d2-6dd4-41c9-bc93-ed814b7a1eff) | Compact identity rows with aligned actions; list is primary | Presence, DMs, public discovery, Discord branding |
| R02 | [Discord add friend](https://mobbin.com/screens/dfcc7846-250e-44fc-9558-81dd755e6fd4) | Exact-name input with adjacent action | Public servers and suggestions |
| R03 | [Lyssna sessions](https://mobbin.com/screens/a4a36ca5-12d7-4a97-afec-e832fbea749f) | Session identity/date and status read as one row; distinct past/cancelled groups | Recording, personal details, meeting integrations |
| R04 | [Perplexity history](https://mobbin.com/screens/bd7bd721-dbb2-4624-b1e9-3195847c84f4) | Compact history rows and restrained page title | AI tasks, filters/sorting not required here |
| R05 | [Hotjar feedback](https://mobbin.com/screens/ef0ce2d8-5a32-402b-8da6-0b48cc1e4b82) | Question, segmented numeric scale and endpoint labels grouped together | Its scale, skip permission, overlay flow |
| R06 | [Expedia feedback](https://mobbin.com/screens/d11fb493-8a95-4988-8c76-d1b061f8e9a2) | A bounded form column with scale labels and submission below the questions | Public recommendation score, email capture, extra fields |
| R07 | [Jira onboarding flow](https://mobbin.com/flows/a9262dda-0fb7-4350-ac55-a9b8b1a5b29c), preview positions 1, 4, 7, 10 | Consistent centered form width, verification state preceding remaining setup | Provider buttons, marketing and account-field order; QGuard keeps its own sequence |
| R08 | [Paramount+ recovery flow](https://mobbin.com/flows/5199e8ad-f2ba-4be7-8de8-f31b848a4baf), positions 1, 4, 7 | Stable form alignment across sign-in, receipt and return; recovery beside entry | Actual password/identity data, provider login |
| R09 | [Discord profile](https://mobbin.com/screens/f4f7eabb-249c-47a9-9b27-24f8b101c4bb) | Identity header separated from profile sections | Cover art, blocking, mutual servers, public profile audience |
| R10 | [NordVPN account settings](https://mobbin.com/screens/c3a69804-ecc9-4057-929e-395a160c996c) | Account/security categories and connection identity, status, action in one row | MFA, services, disconnect behavior not already scoped |
| R11 | [folk connected account](https://mobbin.com/screens/502fe34b-4f83-442f-96fb-aded9dbd621a) | Provider identity/status together with nearby explanation | Email/contact permissions and privacy choices |
| R12 | [Circle hero](https://mobbin.com/sites/sections/ce25bf3d-4500-4bb1-a8c1-3b25595933ba) | Centered proposition/action above a broad product preview | Trial, email field, illustration, branding and color |
| R13 | [Zoom participant setup](https://mobbin.com/screens/cb9e717e-079f-4b51-9bd8-cdcf6fd1f739) | Compact configuration labels and values near the completion action | Video, scheduling, password and meeting permissions |
| R14 | [Zoom waiting](https://mobbin.com/screens/ff70795d-3581-4114-aef4-e0b1f27cf62a) | Waiting message remains the central task | Spinner implying a real request; QGuard remains a frozen sample |
| R15 | [Navan copy invitation](https://mobbin.com/screens/d504fcc0-e338-499e-881c-209a22feb2b0) | Labeled share value and Copy on one line | Booking semantics and public invitation access |
| R16 | [Slite invite](https://mobbin.com/screens/1c57f1f3-5e23-49b2-ad6a-c4cba92bd9c4) | Copy control attached to the share value | Contact import, email invites and permission assumptions |
| R17 | [Linear issue list](https://mobbin.com/screens/fd1b4d88-f021-49a3-98af-4cd3a87e1d29) | Compact titled list with aligned row metadata | Project management workflows and unsupported filtering |
| R18 | [Linear issue detail](https://mobbin.com/screens/f00cc4fb-4083-43fc-a0fb-703a6c4ef771) | Main evidence column, status/actions to the side, separated activity | Assignment, priorities and policies |
| R19 | [Tines recovery](https://mobbin.com/screens/46945d84-1bbf-4bb5-8c41-efb07ce31baf) | One message followed by a recovery action | Error-signature disclosure |
| R20 | [Chronicle recovery](https://mobbin.com/screens/3bd32686-26bb-4d14-9fab-ccdec3c68149) | One recovery heading/action, no repeated page headline | Its exact copy and destination |

R01/R02/R09 are community-interface examples. The other references lend
structure from different domains. A single product is an example, not a
multi-product precedent. QGuard's copy, samples, palette and fonts remain its own.

## Direction and moves fixed before editing

Use a task-focused workspace: compact page titles and content rows, a central
form for entry/recovery, supporting explanations beside the current task.
Do not adopt the streaming/discovery grid returned by the gaming searches.
Keep all existing actions on their current pages. No new policy is selected.

| Move / target | Source problem | References | Change and retained content |
| --- | --- | --- | --- |
| M1 shared workspace | Large repeated display headings push the current task down | R04, R17, R18 | Use compact in-app page headings and aligned content edges. Keep display type on welcome/auth, navigation and all copy |
| M2 welcome | Product preview competes beside a very tall headline | R12 | Center proposition/actions, put the illustrative team immediately below; retain all three explanatory sections |
| M3 entry/recovery/setup | Supporting introduction occupies half the viewport even for a short form | R07, R08 | Narrow the supporting column, preserve a stable bounded form and clear step markers on setup/connection; no added steps |
| M4 matching preparation | Region/language and party summary are spread vertically before the main action | R13, R01 | Compact configuration summary, keep party and queue action adjacent; preserve rank/honor explanation and connections |
| M5 party handoff | Share value and Copy are separated within a large code display | R15, R16 | Bound the code and copy control as one unit; keep host entry, instructions, checks, roster and text on the page |
| M6 history | Wide table needs a horizontal scroll on mobile; session context is split among columns | R03, R04 | Use session rows with identity/context, separate session/feedback status, and the same View action; wrap rows on narrow viewports |
| M7 feedback | Scale and submission are separated by large optional sections | R05, R06 | Keep a bounded required scale, group optional sliders in a clearly labeled secondary section, preserve their initial omission and final submission below them |
| M8 connections | Lookup consumes a full-height card before the existing connection list | R01, R02 | Compact input/action row, then aligned friends and requests; retain exact lookup, all actions and privacy note |
| M9 profile | Identity, honor and descriptive summaries appear in one undifferentiated panel | R09 | Separate identity header and summary sections inside the current content; preserve audience and proposal notices |
| M10 account | Security destination is separated from account categories; provider details/actions span several rows | R10, R11 | Shared account section navigation and compact provider row; retain security explanation, privacy link and all fields |
| M11 admin/detail | Large generic heading over sparse list/evidence | R17, R18 | Apply compact titles/list spacing and evidence/action separation; no new review authority or controls |
| M12 recovery | Heading and explanation are repeated in both page header and empty state | R19, R20 | Keep the message once with the same action, retain explanatory copy |

Each family has at most five applicable moves, including shared M1. Queue,
rank/discrepancy and catalog retain their specialized structure after reference
review; they receive M1 and fixed branding. R14 supports retaining the focused
waiting state, not adding a false live progress indicator. Sidebar placement,
exact dimensions and QGuard wording are agent choices inside these moves.

## Search gaps and dropped results

- Gaming matchmaking, party lobby and the second matchmaking pull supplied no
  suitable matchmaking example. Unity product catalog, TikTok streams,
  Duolingo exercise, Base44 promotion and Copilot loading were dropped.
  Telegram calling was not used as game joining evidence. YouTube connected
  apps was a pool reference, superseded by R10/R11 for the selected direction.
- Zoom home returned activity/promotions and report information rather than
  preparation; dropped. Zoom waiting's other two previews and Dialpad/SavvyCal
  were not selected over the simpler configuration/copy patterns.
- Charma history was a pool example; Care.com rating was not selected over
  bounded rectangular controls. No zero option or recommendation scale adopted.
- Discord onboarding search returned server-task configuration, not player
  signup. Preview positions 1, 4, 7 inspected and dropped. Jira/Paramount+
  supply entry/recovery evidence instead. No claim about unseen flow positions.
- Discord server-profile/GIF screens, Eventbrite linked accounts, HoneyBook/
  monday.com community sections, Linear new-issue modal and ChatGPT group-link
  dialog were inspected but not selected. They introduce no QGuard feature.

Future/deferred: additional search for a closer gaming preparation example,
live usability testing and application integration after the existing stack/
specification checkpoint. No unsupported reference became product authority.

## Page coverage and review files

- [Interactive prototype](../qguard-review.html)
- [Before/after page gallery](pages.html), thirteen representative pages
- [Annotated feedback comparison](comparison.html), self-contained
- [Brand sheet](../brand/brand-sheet.html) and [exported assets](../brand/README.md)
- [Actual verification](verification.md)

| Existing page IDs | Reference coverage | Applied disposition |
| --- | --- | --- |
| D00 catalog | R17 | Shared compact heading/brand; all state links retained |
| D01 welcome | R12 | Centered introduction/actions above product preview |
| D02–D06 entry, verification, recovery | R07/R08 | Stable bounded form, narrower supporting introduction; existing sequence retained |
| D07 setup / D08 Riot | R07/R10/R11 | Existing two steps made explicit; status and consent content retained |
| D09 matchmaking | R13/R01 | Compact preparation summary, fixed brand and smaller task heading |
| D10 rank | R13 | Form structure retained; shared title/width refinement |
| D11 party | R01/R13 | Member/status/action structure retained; shared refinement |
| D12 connections | R01/R02 | Compact exact lookup, aligned existing friend/request actions |
| D13 queue | R14 | Focused waiting layout retained; shared refinement, no pretend live progress |
| D14 team | R15/R16 | Bounded code/Copy unit, existing host form, checks, roster and text |
| D15 discrepancy / D16 disband | R13/R19/R20 | Existing focused confirmation/outcome retained; shared refinement only |
| D17 history | R03/R04 | Responsive rows with independent session and feedback status |
| D18 session | R05/R06 | Required scale followed by a secondary optional-feedback group |
| D19 report | R06/R18 | Bounded evidence form and supporting context retained |
| D20 profile | R09 | Separate identity header and descriptive-summary sections |
| D21 settings / D22 security | R10/R11 | Account-section navigation and provider status/action grouping |
| D23 inbox / D24 case | R17/R18 | Compact title/list and evidence/status separation |
| D25 recovery | R19/R20 | One message and the existing recovery action |

Coverage means a visible reference was compared to the page's job. It does not
mean every page was rebuilt or that Mobbin contains the exact QGuard workflow.
Where QGuard already had the relevant structure, it was retained. The specific
slider grouping/column dimensions and page-copy placement are agent design
choices; external forms do not establish QGuard's honor or privacy rules.

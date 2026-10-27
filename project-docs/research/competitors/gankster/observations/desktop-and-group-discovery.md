# Desktop Layout and Group Discovery

- **Observation:** GANK-OBS-004
- **Date:** 2026-10-27
- **Type:** rendered UI and DOM observations; published explanations are in the
  [matching/status report](../matching-and-game-status.md)
- **Authority:** `DEC-060`, read-only navigation; no participation or submissions
- **Viewport:** 1440 × 900 CSS pixels, device pixel ratio 1; measured document
  width 1440 with no horizontal overflow at the sampled state
- **Entry:** owner had reached the VALORANT Türkiye community after onboarding
- **Update trigger:** another relevant visible state or authoritative explanation

## Desktop Composition

Observed on [the community Play Now page](https://valorant.gankster.gg/communities/valorant-tr/lfg):

| Region | Observed composition | Detail to consider, not a QGuard decision |
| --- | --- | --- |
| Left edge | Narrow persistent icon rail for games/communities and other sections | Keep primary destinations reachable without dominating the working area; icon comprehension still matters |
| Main column | Community banner, Play Now/Leaderboard/Lf Duo/Members navigation, group-discovery controls, prominent group cards and the continuing list | Give the core task most of the width; separate community navigation from an individual group's state |
| List controls | Inline region/type/rank/access summary and Refresh; filter UI exposes more choices | Make active restrictions visible and distinguish list refresh from rank refresh |
| Group rows | Short host description, player avatars and empty slots, occupancy, rank badge, smaller attribute icons, and right-aligned entry/status control | Let users scan compatibility and availability without opening every profile; exact meanings of small icons need verification |
| Right column | Advertising, community identity/language/region, aggregate community statistics, progress/levels and subscription promotion | Secondary information remains alongside the list; QGuard need not adopt ads, levels or subscriptions |
| Bottom overlay | Fixed advertising occupied the bottom of the viewport | Account for obstruction and competing calls to action when evaluating hierarchy |

This differs from the earlier 762 × 973 onboarding/browser view, which used
more collapsed navigation/filter presentation. It is a direct desktop sample,
not a full responsive or accessibility audit. Cards with prominent decoration
were visible; their ranking/promotion rules were not established.

The top panel offers Create a group and Open for invites with a ten-minute
display. The availability checkbox was unchecked in the settled snapshot; the
agent did not activate it. Its duration, exposure and expiry behavior are
unknown. An attempt to open Create a group did not expose a usable setup form;
no fields were submitted and no creation success was observed. Do not infer
that the host can or cannot manually set match status from this failed inspection.

## Filters and Entry States

The agent opened viewing menus without selecting options or joining a group.

| Control/state | Direct evidence | Limit |
| --- | --- | --- |
| Type | Any, Competitive, Casual, Skirmish | No filtering result tested |
| Access | Invite Only and Party Code choices | Establishes two exposed access categories, not successful game entry |
| Other filtering | Servers and ranks, Unranked through Radiant | Exact eligibility logic is not visible |
| Cross-community inclusion | Checked option for other communities with the same language and region | Not changed; does not prove how language/region is derived |
| Join | Action on some listed groups | Not clicked; request/acceptance behavior comes from provider documentation |
| In Match | Different state on some listed groups | No live game transition observed; data origin evaluated separately |
| Code control | Other rows display a party-code value | No value copied or retained; validity, expiry and capacity enforcement untested |
| Roster placeholders | Avatars, vacant slots and some reserved-member labels | Not proof that every displayed member is already in the actual game party |

Do not collapse these into one state model: listing access, QGuard/Gankster
membership, game-party membership and actual game progress are distinct.

## Other Discovery Surfaces

| Surface inspected | What was actually visible | What was not exercised |
| --- | --- | --- |
| [Community Lf Duo](https://valorant.gankster.gg/communities/valorant-tr/lfd) | Empty list at this time, a Subscribe to post control, and a promotion for the separate Duos product based on personality/playstyle | Subscription, posting and matching; the empty result is not proof that the feature is unused generally |
| [Recruitment](https://valorant.gankster.gg/lft) | Listings with descriptions, rank/region/language, roles, post age and view counts; filters for region, rank, role and language; Look For Team/Post LFT controls | No post, request or contact |
| [Scrims](https://valorant.gankster.gg/scrims) | Date/server/map/rank filters; day, time, game-count and map choices; scheduled team rows and local timezone; link to scrim guidelines | No scrim creation, booking or opponent acceptance |
| [Separate Duos](https://duos.gankster.gg/login) | Sign-in page describes swiping through potential partners for a session or a longer gaming relationship; Google, Apple, email and Riot entry options | No sign-in, onboarding, swipes or matches; deeper behavior is provider-documented, not tested |

An owner-opened player profile also exposed reputation, activity history,
play-style dimensions, game rank and social-action controls in the DOM. That
partial inspection is not a completed profile-flow review. Real player details,
IDs, contact information and joining secrets are deliberately not retained.

## Boundaries and Resume

The community list is now visible without onboarding. Whether the owner enabled
or skipped notifications, changed the preference sliders or saved particular
values was not observed. The earlier onboarding notes retain those uncertainties.

The agent returned to the Türkiye Play Now page at desktop dimensions. No team
request, membership change, availability activation, message, post, subscription,
settings change, client install or live game test was performed. The creation
form, detailed rank settings and active-session/reputation transitions remain
unstudied. Continue only with read-only states accessible under `DEC-060`.

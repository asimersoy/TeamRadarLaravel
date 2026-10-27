# Gankster Study Closure For The QGuard Design Pass

- **Date/status:** 2026-10-27; sufficient accessible evidence for this design
  pass, with bounded gaps; not an exhaustive product/backend audit
- **Authority:** DEC-059/060; owner QGuard decisions override competitor choices
- **Sources:** observation notes, [account study](observations/account-and-connections.md),
  [matching/status report](matching-and-game-status.md) and provider pages below

## Feature Coverage And Transfer

| QGuard area | Evidence and limitation | Design disposition |
| --- | --- | --- |
| Registration/onboarding | Three observed onboarding steps; submission/validation not exercised | Short task-led setup; show progress, optionality and field audience |
| Identity/rank | Linked account block observed; [rank guide](https://gankster.gg/how-to-update-your-rank-on-gankster/) describes manual refresh but not its API | Automatic pre-queue fetch per DEC-055; show source/time and retry, retain manual confirmation/correction |
| Player style | Four self-description sliders observed in onboarding/profile/settings | Two optional **peer** sliders per DEC-061; untouched is absent, never a fabricated midpoint rating |
| Matching | Main Groups uses listings and leader acceptance; Duos is a separate pairing product | QGuard automatic five-person, similar-honor formation remains; no public LFG browse/leader selection |
| Roster and party entry | Occupancy/member slots, Invite Only and Party Code controls observed | Clear five-member roster; structured host-code form and recipient steps under DEC-068 |
| Game status | In Match labels observed; provider advertises client synchronization; exact trigger unknown | Self-declared QGuard attendance/session end; do not invent client observation |
| Friends | Profile and empty Playmates overlay observed; request lifecycle inaccessible | Use the already-approved exact-handle QGuard request/invite flow |
| Communication | Provider linked-account copy describes automatic voice channels; no live test | Native private web text now; Discord entirely deferred by DEC-067 |
| Session history | Profile recent-activity empty state only | Participant session list/detail is owner-selected; design it independently |
| Reviews | [Provider guide](https://gankster.gg/find-valorant-players/) describes review endorsements and an app prerequisite; actual submission UI unobserved | Required 1–10 honor, optional descriptors, immutable submission and non-expiring completion are QGuard rules |
| Reports/admin | No accessible private moderator workflow inspected | Design QGuard's cleared-admin inbox/evidence from its own approved contracts |
| Error/recovery/accessibility | Some disabled/empty/loading surfaces observed; no mutation-based tests | Specify and test QGuard states locally; do not claim competitor behavior |

The provider guide describes requests followed by group-leader acceptance and
post-play review labels; it says reviews need someone in the group to have the
desktop app. These are published claims, not observed current-client outcomes.
The rank guide explains a manual reload and possible additional matches after
reaching Immortal; it does not disclose the data retrieval method. Sources were
reviewed in this study and remain dated evidence, not an API entitlement.

## Future-Only Inspiration Inventory

Keep these as ideas, not version-one scope: community discovery and events;
leaderboards/XP/badges; subscriptions/paid placement; decorative covers and rep
skins; recurring duo discovery; permanent-team recruitment and scrim calendars;
past-playmate discovery; native notifications; desktop game-state synchronization;
automatic party invitations; Discord voice lifecycle. Existing deferrals govern
overlapping items. Voice recording is not approved by any competitor feature.

## Closure And Resume

Accessible detail study is complete enough to draft QGuard. No further owner
account action is needed for this stage. Inaccessible group/review/live-session
flows remain evidence gaps; they do not block QGuard-specific design. No raw
personal data or join artifact is copied into the prototype. Use synthetic
content and original layout/branding. Reopen a gap only when a concrete later
decision needs it and the required action is authorized.

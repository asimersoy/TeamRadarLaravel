# Gankster Details to Consider for QGuard

- **Record type:** comparison and candidate ideas, not approved specifications
- **Owner:** project owner decides adoption; primary agent maintains evidence
- **Updated:** 2026-10-28 (owner dispositions only; no new competitor observation)
- **Authority:** study scope under `DEC-059`/`DEC-060`; existing product decisions prevail
- **Update trigger:** new observed behavior or owner disposition of a candidate

The study should reduce guesswork about small details, while still checking
whether each detail serves QGuard's different workflow. Presence in Gankster
is evidence of a design choice, not proof that it is optimal or fully reliable.

| Detail | Evidence | Possible QGuard use and tradeoff | Status or next observation |
| --- | --- | --- | --- |
| Step count and visual progress | Observed profile → preferences → notification offer, each with progress indication | Make setup effort predictable; avoid adding a multistep flow merely for appearance | Candidate only; all three screens seen, completion and recovery unobserved |
| Prefilled identity and avatar | Initial-based avatar and populated username | Reduce typing while letting the user choose their public identity; origin and naming conflicts matter | Candidate only; prefill source and validation unknown |
| Bio marked recommended | Badge distinguishes bio visually | Clarify optional enrichment; avoid making nonessential profile work block matchmaking | Candidate only; actual optionality untested; no new QGuard bio/data requirement |
| Privacy explanation beside email | Field-level helper visible | Explain audience where data is entered; wording must match QGuard's real data behavior | Candidate only; Gankster's statement does not prove its access model |
| Primary save-and-advance action | Wide, visually prominent button | Keep the next action clear; loading, validation and recovery determine whether it works well | Candidate only; those states not observed |
| Compact play-preference sliders | [GANK-OBS-002](observations/onboarding-gankstyle.md) separates four self-description dimensions with opposing labels | Reduce free-text effort and show degrees of preference; ambiguous intermediate values and overlapping dimensions may add friction | Candidate only; no new matching inputs or replacement of honor |
| Reassurance that choices can change | Step 2 copy promises later editing | Reduce commitment anxiety if QGuard supports the promised edit path | Candidate only; Gankster's editing and persistence unobserved |
| Neutral-looking values with disabled progression | All four controls at midpoint; step 2 primary action disabled without a visible reason | Distinguish unanswered from deliberately neutral inputs and explain any required action | Cause unverified; owner advanced without an observed intermediate state |
| Explain notifications before requesting permission | [GANK-OBS-003](observations/onboarding-notifications.md) previews event types and offers enable/skip at the final step | Explain benefits in context and retain a clear alternative; browser permission and actual delivery need separate states | Candidate only; neither choice tested; no QGuard push feature approved |
| Rank refresh control | [Published guide](../../valorant-party-codes-and-gankster.md#gankster-evidence-and-limits), not this live screen | A voluntary refresh might offer visible recovery/control alongside automatic checks; extra calls, cooldown and confusing freshness are tradeoffs | Future comparison; no change to `DEC-055` |
| Structured joining artifact | `DEC-054` already selects a dedicated host form; [GANK-OBS-004](observations/desktop-and-group-discovery.md) exposes Party Code versus Invite Only access and code controls | Compare how artifact validity, host responsibility and recipient instructions are presented | QGuard direction already approved, recipient details unobserved; no Gankster joining result |
| Desktop task hierarchy | GANK-OBS-004 shows left navigation, wide group list and secondary right sidebar at 1440 × 900 | Prioritize queue/team work and keep secondary information nearby; avoid copying promotional clutter | Candidate only; viewport is a study setting, not an approved QGuard breakpoint |
| Roster and access at a glance | Group rows expose occupancy, member slots, rank and entry/status controls | Make capacity and next action legible while distinguishing matched membership from actual game-party presence | Candidate only; do not assume a listed avatar is already in the game lobby |
| Separate activity from entry actions | Join, In Match and code controls are distinct; [status synchronization is documented](matching-and-game-status.md) | Explain whether a team is assembling, entering or playing; label manual/observed states honestly | Candidate only; no desktop/private API integration or automatic session end adopted |
| Discovery versus automatic assembly | Main Groups uses listings/leader acceptance; Duos advertises pair matching | Borrow useful presentation details without replacing QGuard's similar-honor team matching | Current QGuard matching decisions remain; no new listing mode approved |
| Optional descriptive peer feedback | Owner adaptation inspired by play-style dimensions; Gankster's observed onboarding sliders were self-description, not this peer-rating system | Two optional peer sliders; untouched midpoint omitted; self-only summaries under DEC-076; no honor or matching effect | DEC-076 corrects the old audience attribution and approves slider labels; DEC-078 subsequently selects independent honor-formula updates; display detail pending, not implemented |
| Session history as the rating surface | Owner instruction, not a verified Gankster flow | End session and unfinished Find match redirect to session detail; required ratings never expire and sent ratings lock | Adopted under `DEC-063`; `DEC-065` selects immediate eligible input application with no retrospective correction |

## Automatic Versus Manual Rank Refresh

The owner's example opens a topic for study, not a reversal of `DEC-055`.
That decision currently requires retrieving the latest available match-associated
tier before queue entry and asking the player to confirm or correct it.

When permitted read-only exploration reaches rank settings, observe the timestamp/provenance, loading
state, manual reload, cooldown/error messages, and any visible automatic change
on entry or after playing. A reload button alone cannot show whether background
or event-triggered refresh also happens. The underlying API remains unknown
unless provider documentation establishes it.

The later comparison can distinguish automatic pre-queue retrieval, an
additional manual refresh/retry button, and manual-only retrieval. The first
is the approved direction; the second is a possible addition; the third would
change that direction and needs an explicit owner decision. None is selected
on Gankster's behalf from the button's existence.

## Decision Disposition

`DEC-061` adopts the owner's optional peer-descriptor adaptation; `DEC-063`
adds session history/rating requirements from the owner. Their authority is
the [decision register](../../../governance/decisions.md), not competitor
behavior. Other candidates remain unapproved unless their row names an existing
QGuard decision. Questions about unseen Gankster behavior belong to the study;
they are not automatically QGuard implementation blockers.

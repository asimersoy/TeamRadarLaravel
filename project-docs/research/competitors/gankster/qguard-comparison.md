# Gankster Details to Consider for QGuard

- **Record type:** comparison and candidate ideas, not approved specifications
- **Owner:** project owner decides adoption; primary agent maintains evidence
- **Updated:** 2026-10-27
- **Authority:** study scope under `DEC-059`; existing product decisions prevail
- **Update trigger:** new observed behavior or owner disposition of a candidate

The study should reduce guesswork about small details, while still checking
whether each detail serves QGuard's different workflow. Presence in Gankster
is evidence of a design choice, not proof that it is optimal or fully reliable.

| Detail | Evidence | Possible QGuard use and tradeoff | Status or next observation |
| --- | --- | --- | --- |
| Step count and visual progress | [GANK-OBS-001](observations/onboarding-profile.md) shows 1/3 and a circular indicator | Make setup effort predictable; avoid adding a multistep flow merely for appearance | Candidate only; see the remaining steps and recovery before comparing the whole journey |
| Prefilled identity and avatar | Initial-based avatar and populated username | Reduce typing while letting the user choose their public identity; origin and naming conflicts matter | Candidate only; prefill source and validation unknown |
| Bio marked recommended | Badge distinguishes bio visually | Clarify optional enrichment; avoid making nonessential profile work block matchmaking | Candidate only; actual optionality untested; no new QGuard bio/data requirement |
| Privacy explanation beside email | Field-level helper visible | Explain audience where data is entered; wording must match QGuard's real data behavior | Candidate only; Gankster's statement does not prove its access model |
| Primary save-and-advance action | Wide, visually prominent button | Keep the next action clear; loading, validation and recovery determine whether it works well | Candidate only; those states not observed |
| Rank refresh control | [Published guide](../../valorant-party-codes-and-gankster.md#gankster-evidence-and-limits), not this live screen | A voluntary refresh might offer visible recovery/control alongside automatic checks; extra calls, cooldown and confusing freshness are tradeoffs | Future comparison; no change to `DEC-055` |
| Structured joining artifact | `DEC-054` already selects a dedicated host form; underlying Gankster DOM has code-shaped buttons | Compare how artifact validity, host responsibility and recipient instructions are presented | QGuard direction already approved, exact details unobserved; no Gankster joining result |

## Automatic Versus Manual Rank Refresh

The owner's example opens a topic for study, not a reversal of `DEC-055`.
That decision currently requires retrieving the latest available match-associated
tier before queue entry and asking the player to confirm or correct it.

When the owner reaches rank settings, observe the timestamp/provenance, loading
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

No candidate in this file is adopted yet. Move an approved choice into the
existing decision/specification records and link it here, preserving its
evidence and tradeoff. Questions about unseen Gankster behavior belong to the
study; they are not automatically QGuard implementation blockers.

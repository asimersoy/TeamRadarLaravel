# GANK-OBS-005 — Account, Profile And Connections

- **Date:** 2026-10-27
- **Method:** authenticated read-only browser inspection at 1440 × 900;
  account/profile and Playmates panels opened; no fields or settings changed
- **Source:** [Gankster VALORANT](https://valorant.gankster.gg/), via the
  existing account's profile → Edit Profile and sidebar Playmates control
- **Boundary:** real account/player identifiers, exact preferences, emails and
  join codes are omitted; no unredacted capture retained in the repository

## Observed

The profile presents an initial avatar/cover, membership date, activity counters,
four self-description scales, communities, reputation icons and recent activity.
An unused profile has an explanatory activity empty state. Own profile offers
Edit Profile; a profile being viewable does not prove every field is public.

My Account uses a centered, approximately 800-pixel content column with a
persistent icon rail. Profile identity/bio, play preferences, linked accounts,
commercial upgrades, security, display language and notification settings follow
vertically. The display name field is disabled in this account state; the reason
was not tested. Email has an audience explanation. Bio is marked recommended,
has a visible character allowance and descriptive placeholder.

Four sliders retain Type, Goal, Comms and Playstyle labels with endpoint words.
These are self-description, not reviews by teammates. Riot identity/rank appears
in a linked-account block with an Unlink control. The sampled account is unranked.
No rank timestamp/refresh control was exposed in the inspected account state;
the published refresh guide is separate evidence, not proof it vanished globally.

The unlinked Discord block explains automatic group voice creation and offers
Link Discord Account. Notification settings are grouped by delivery channel:
Discord, web, email and sound, with event-specific controls and disabled states.
No permission prompt, toggle, link/unlink, password or deletion action was taken.

Playmates opens a narrow overlay beside the left rail while discovery remains
visible behind it. It has Playmates/My Duos tabs, a notification offer and an
empty state explaining that recent teammates will appear after play. This is
not evidence of a usable QGuard-style friends-request flow or session history.

The Create a group control again failed to expose a usable form; the screenshot
showed a visually muted/loading control. No group was created, availability
enabled, player contacted, community joined or review submitted. The tab was
left on discovery with the Playmates panel closed.

## Interpretation And QGuard Disposition

| Detail | Proposed adaptation | Boundary |
| --- | --- | --- |
| Grouped account sections | Separate account/security from matchmaking and from teammate feedback | Fits existing QGuard navigation; not a new bio/upload requirement |
| Source-aware linked account block | Show observed rank, age/source and user correction as distinct fields | QGuard pre-queue retrieval stays automatic; manual retry is supplementary |
| Endpoint-labeled sliders | Use readable opposing labels plus “not rated” until touched | QGuard sliders are optional peer descriptions; no matching use |
| Explanatory empty activity | Describe why history is empty and give one useful next action | QGuard session history is owner-approved independently |
| Persistent connections surface | Retain compact QGuard connections beside matchmaking | No implied Riot friends, game presence or teammate-history discovery |
| Channel-specific notifications | Future reference only | No new push/email/Discord notification feature selected |

## Limits

Saving/reloading edits, validation, cooldowns, real rank refresh, group creation,
party acceptance, active sessions, submitted reviews and private moderation are
unobserved. Their backend/API implementation is unknown. QGuard specifications
must define its own behavior instead of inventing Gankster evidence.

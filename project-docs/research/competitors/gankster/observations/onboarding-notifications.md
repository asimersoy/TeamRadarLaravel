# Gankster Onboarding Notification Offer

- **Observation:** GANK-OBS-003
- **Observed:** 2026-10-27, owner-controlled in-app browser
- **Source:** [VALORANT ESP LFG page](https://valorant.gankster.gg/communities/valorantesp/lfg)
- **Entry context:** owner advanced from play preferences; intervening slider
  changes and submission were not observed
- **Evidence:** current DOM/accessibility state and viewport screenshot
- **Viewport:** 762 × 973 CSS pixels; no agent viewport change
- **Coverage:** step 3 of 3 before either notification choice
- **Update trigger:** owner chooses an option, reveals browser permission UI,
  reaches the main app, or later inspects notification settings/delivery

## Presentation and Choices

The third onboarding step offers browser notifications. A bell inside the
purple progress ring replaces the earlier character graphic, and the visible
counter reads 3/3. The introductory copy emphasizes avoiding missed activity.
A large illustration previews invitation, duo-request and chat alerts, followed
by a short explanation about fast-moving group activity.

The wide purple **Enable notifications** button is the dominant action. A
smaller, subdued **Skip for now** action appears beneath it; both are buttons
in the DOM and neither is marked disabled. No back arrow is visible in this
captured state. The community page remains blurred behind the panel.

The illustrated alerts are explanatory artwork, not received notifications or
evidence of actual invitations, message content, delivery guarantees or game
party integration. No example identity from that artwork is retained here.

## Permission and Completion Boundaries

This is the site's explanation and choice screen, not an observed native
browser permission prompt. Neither choice has been exercised by the agent.
The actual browser permission state, prompt timing, push subscription flow,
delivery mechanism and backend/provider remain unknown.

The visible skip option establishes an offered alternative to enabling
notifications; its destination and consequences are untested. It does not yet
prove that skipping completes onboarding, that all app functions remain
available, or that the offer will reappear later. Reaching the final numbered
step is not evidence of completing it.

## QGuard Comparison

The observed sequence is profile presentation, play preferences, then a
notification offer. Asking after some product context and showing concrete
benefits may make a permission request easier to understand. An explicit skip
can preserve user choice, provided the resulting experience is clear. These
are design candidates, not approval to add browser push or new data collection
to QGuard.

If QGuard later adopts such a feature, distinguish the site's invitation to
enable it, the browser's permission decision, and actual delivery status.
The current screen does not establish how Gankster handles denied permissions,
unsupported browsers, retries, settings or notification preferences. See the
[comparison table](../qguard-comparison.md) for candidate disposition.

## Remaining Observation

Let the owner choose whether to enable or skip. Observe the resulting screen,
any browser prompt and any explanation of the selected state. If later shown,
record how permission can be changed and which events trigger notifications.
No permission prompt was accepted, no notification setting was changed, and no
live delivery or game test was performed by the agent. This sanitized record
retains no account details, player identities or joining codes.

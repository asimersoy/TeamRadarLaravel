# Gankster Onboarding Play Preferences

- **Observation:** GANK-OBS-002
- **Observed:** 2026-10-27, owner-controlled in-app browser
- **Source:** [VALORANT ESP LFG page](https://valorant.gankster.gg/communities/valorantesp/lfg)
- **Entry context:** owner moved on from the profile step and reported the next
  screen ready; exact field edits and submission interaction were not observed
- **Evidence:** current DOM/accessibility state, viewport screenshot and read-only
  slider attribute inspection
- **Viewport:** 762 × 973 CSS pixels, device pixel ratio 2; unchanged by agent
- **Coverage:** step 2 of 3, one observed state; no agent interaction
- **Update trigger:** owner adjusts preferences, uses navigation or reveals a
  later editing/display state

## Layout and Visible Choices

The onboarding panel now presents **Define your Gankstyle**. The circular
progress graphic has advanced and the separate indicator reads 2/3. Supporting
copy asks users to describe how they play and reassures them that they can
change these choices later. The actual later-editing flow has not been seen.

A dark inset panel contains four stacked horizontal sliders. Each has a
dimension label, descriptive poles at opposite ends, and an icon in its thumb.
Purple tracks become lighter down the stack. All four thumbs are centered in
this captured state; no numeric value is visibly printed beside them.

| Dimension | Left pole | Right pole | Observed control state |
| --- | --- | --- | --- |
| Type | Casual | Competitive | 50 on an accessibility range of 0–100 |
| Goal | Chill | Win | 50 on an accessibility range of 0–100 |
| Comms | Quiet | Vocal | 50 on an accessibility range of 0–100 |
| Playstyle | Calculated | Explosive | 50 on an accessibility range of 0–100 |

These are self-description controls. Their numeric interface range does not
establish stored precision, valid increments, a matching weight, reputation,
or observed behavior. The captured midpoint state is not proof of the universal
default for every account or proof that the owner has left every control untouched.

## Navigation and Disabled Progression

The primary **Save & continue** button is dimmed and explicitly disabled in the
DOM. A left chevron is visible beside it; the corresponding button has no name
in the captured accessibility snapshot. It appears to be back navigation, but
its action, persistence behavior and keyboard handling have not been tested.

No reason for the disabled primary action, field-level error, or loading message
is visible in this viewport. The controls have names and numerical bounds in
accessibility attributes; no descriptive value text is exposed there. This is
limited inspection, not a complete accessibility audit or a claim about how a
particular screen reader announces the whole control.

**Open behavior question:** what enables progression? It may depend on touching
one or more sliders, changing values, or another condition. The current state
does not establish the rule. In particular, do not conclude that a midpoint is
invalid, that every slider must move, or that moving one will enable the action.

## QGuard Relevance

The screen separates public profile setup from playing preferences and makes
the preferences feel editable rather than permanent. A compact set of
opposing labels is a possible alternative to several dropdowns or free-text
answers. Whether intermediate values are understandable or improve QGuard
matching is unresolved; the two competitiveness/goal dimensions may also
overlap in how users interpret them.

The disabled action raises a separate design question: if an apparently filled
control still requires an explicit answer, how should the UI distinguish an
unanswered field from a deliberate neutral choice? These are
[candidate comparisons](../qguard-comparison.md), not approved QGuard fields,
matching inputs, honor rules or a change to Discord/voice requirements.

## Next Evidence to Observe with the Owner

- The owner subsequently reached [the notification offer](onboarding-notifications.md),
  step 3. The intervening interactions were not observed, so this does not
  establish which slider changes enabled progression. The proposed single-slider
  check has no recorded result. Revisit only if the owner chooses to inspect it.
- If the owner chooses to inspect back navigation or a neutral selection later,
  observe whether values persist and whether deliberately returning to midpoint
  differs from the initial state.
- At a later profile/group view, check how these preferences are displayed.
  Any use in automated matching, filters or eligibility needs its own evidence.

No click, drag, key press, navigation, field submission or account mutation was
performed by the agent. No screenshot/DOM dump containing unrelated account,
player or joining data was retained in Git. Game integration and backend/API
behavior remain untested.

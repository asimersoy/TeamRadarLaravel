# QGuard Product Foundations

**Latest direction, 2026-10-27:** `DEC-061`/`DEC-063`/`DEC-065` replace the feedback
format, optional completion, ten-minute expiry and session-history exclusion
for the next pass. See [the current feedback direction](#current-feedback-and-session-history-direction).
These changes are not implemented; `DEC-062` requires specifications/design
and the later stack review before new application work.

`DEC-066` selects open registration, guest entry for a Riot-reviewable prototype
and live RSO before normal matchmaking. See the
[access and prototype contract](review-prototype-and-access.md). The owner
explicitly accepts the report/rating timing race under `DEC-065`; changing it
is deferred until after version one (`DEF-013`).
`DEC-067` defers Discord fully until after Riot approval and RSO integration.
`DEC-068` authorizes the non-friend native party-code assumption for the
structured host handoff now; actual validation returns after RSO (`DEF-014`).

**Implementation routing update, 2026-10-03:** the
[first-pass specification suite](first-pass/README.md) now turns these decisions
into concrete contracts and tests, approved as revision 1 + DEC-052. The
[brief review](../planning/first-pass/README.md) records that approval and the
matched-team honor visibility amendment. Historical/provisional notation below is
not a second unresolved selection or permission to omit later owner decisions.

- **Record type:** current modular product specification
- **Status:** approved foundations plus historical/future proposals; concrete
  first-pass implementation authority is the linked suite, not this document alone
- **Decision owner:** project owner
- **Authority:** `DEC-009` through `DEC-048`, with visibility amended by `DEC-052`
- **Created:** 2026-09-05
- **Update trigger:** product-charter, game/integration, honor, rank-source,
  permitted-use, or legacy-evidence decision
- **Implementation authority:** approved first-pass suite under `DEC-052`; no
  independent authority to implement this document's future proposals

## Approved Foundations

### Product Identity

The product name is **QGuard**. TeamRadar remains an internal/historical
repository and workspace label. This specification does not authorize a
filesystem, Git remote, package, domain, or public rename.

### Central Product Concept

The honor/reliability system is QGuard's central product idea. Honor represents
teammate behavior and reliability rather than mechanical skill or rank. The
intended concept uses post-play teammate feedback and reporting to build or
correct that signal.

Under `DEC-026`, honor affects matchmaking from the first version. New players
start at a common baseline; developing history should differentiate honor and
support grouping players with similar honor. Increasing honor's weight with
history is a possible mechanism raised by the owner, not a selected formula.

Under `DEC-027`, the newcomer baseline is fixed and neutral, not the measured
community average. The implementation agent chooses numeric units and equivalent
display scaling; no numeric range or baseline number is selected now. Scaling
must preserve approved meaning and matching outcomes, not silently change
behavior or introduce a visibility, label/tier or public-claim decision.

Under `DEC-028`, ordinary post-play teammate feedback can both raise and lower
honor. Exact aggregation, magnitude and timing are not selected;
negative feedback does not by itself establish misconduct or select a sanction.
The separate report-review and report-effect rules remain open.

`DEC-029` selects scaled teammate ratings and average-based honor movement,
not play-count point accumulation. Under `DEC-032`, compare each new rating
against the player's prior smoothed raw-rating reference instead of the
previously selected exact last-N average. Dynamically reduce influence as
mathematical deviation increases. This is a retaliation-resistance direction,
not proof that outliers are false or a guarantee against abuse. Standard
deviation is only a possible metric; no
complete honor curve or production calibration is frozen. The reference
recurrence is selected by `DEC-032`; its startup details remain delegated.
No/sparse history, zero spread, same-session/repeated reviewers, organized
abuse and genuine behavior changes require explicit design and verification.
Under `DEC-033`, the first-version calculation plans no exact individual
feedback-history ledger or last-N buffer for calculation. `DEC-047` now
retains records stored by first-pass features for admin review without expiry;
this does not replace the smoothed calculation. Retention refinement returns
immediately after the first implementation under `DEF-012`.

`DEC-030` separates the raw reference from attenuated honor influence.
`DEC-032` replaces its exact-window requirement with smoothing: each eligible
input enters the reference recurrence at its unadjusted value even if its
honor effect is reduced. Separate honor attenuation must not feed back into
the raw reference. Repeated feedback can therefore move it as behavior changes;
actual response speed and safeguards require later tests. No physical storage
design, lifetime honor horizon or visible second score/history screen is selected.
Ordinary feedback must move honor up and down automatically without
administrative intervention; separate
report, correction and appeal processes remain to be specified.

Under `DEC-031`, initialization and confidence/sample-count handling are
required; the implementation agent chooses their concrete development method
inside the approved slice and may revise it during development. Raw-reference
response tuning need not be finalized beforehand. The agent documents and
tests its selections without asking the owner to choose every method detail.
This does not authorize new confidence-based matching/eligibility effects or
public labels. The fixed neutral baseline remains honor policy, not fabricated
historical feedback. `DEC-032` selects smoothing and starts the adjustable
development response divisor at 20. Final tuning does not block an otherwise-
approved development slice.

`DEC-032` also selects the qualitative trade-off that an isolated extremely
negative departure may have less immediate honor effect than a moderately
negative rating. Sustained consistent feedback must still move the reference
and support meaningful automatic honor change. The owner accepts gradual
adaptation rather than finite replacement of a last-N window. Calibrate mostly
constants, with occasional small function refinements preserving this behavior,
and document/test development changes. Material changes to approved behavior
or other product boundaries still require owner approval.

Under `DEC-034`, incoming-rating volatility estimation/adaptive dampening and
outgoing-reviewer-deviation accountability are outside the current implementation
scope. Do not calculate or retain either indicator in this slice, including as
diagnostic-only future scaffolding. The existing draft uses a configured
deviation allowance, not a player-spread-dependent one. Preserve both ideas in
[future honor ideas](#future-honor-ideas---outside-current-implementation);
they are not blockers or approved later implementation commitments.

`DEC-035` through `DEC-046` select further queue, party, matching, feedback and
admin directions below. The complete scoring/data/acceptance contract and real
game integration remain incomplete. Reversible development details are
delegated under `DEC-042`, not an upfront owner questionnaire. Do not re-open
settled dimensions, reference choice, startup delegation, private audiences,
session-end/feedback clock or adjustable constants as owner prerequisites.
It approves no public promise that QGuard prevents toxicity or guarantees safe
or compatible teammates.

### First-Version Session Scope

Under `DEC-025`, the first usable version groups players for a playing session.
`DEC-037` partially supersedes its social-feature exclusion: solo and partial
pre-made parties, basic QGuard friendships/add-friend requests and invitations
into a QGuard lobby are current scope. `DEC-063` now adds participant session
history and its required rating pages for the next pass. Persistent-team
management and friend discovery from past-teammate history remain outside
this scope; basic session history is no longer excluded.

Original pre-made co-members cannot give one another ordinary behavior ratings.
They can rate other matched teammates and receive ratings from those teammates,
subject to the participation/report rules. Snapshot pre-made membership at
queue/match entry so leaving it cannot bypass the restriction. This does not
exclude ratings between all people who happen to be QGuard friends.

`DEC-043` defines participant-declared completion below; one session may include
several games. Original partial-party persistence after assembled-team disband
is optional implementation-agent discretion, not required extra complexity.
Readiness/recovery details must be specified and tested, but reversible choices
within the approved direction need not come back as owner questions. Session
history does not itself settle a final retention/deletion policy.

### Current Queue And Matching Direction

`DEC-035` selects queue choices with or without Discord voice, not compulsory
Discord use for everyone. Real Discord integration is excluded from this
implementation and returns only after owner test resumption, relevant feature
availability/behavior evidence and its slice approval. `DEC-046` now requires
private native website text for matched parties and only the no-Discord queue
in the current first pass. Chat can later carry a validated human-shared game
link but does not implement joining. No working voice queue is offered while
integration is absent. Future voice-pool separation is decided later unless
current architecture truly needs it; then strict separation is the owner's
conditional planning default, not a reason to implement a second queue now.

`DEC-036` makes the game's actual party/rank queue compatibility the first hard
constraint. Within it, favor similar honor and dynamically widen similarity as
queue wait increases. Never widen past game compatibility. The implementation
agent may choose/test adjustable widening rates and honor-distance settings;
they need not be frozen before development. `DEC-044` delegates investigation
and initial region/language controls to the implementation agent, with owner
review after the first build. Relevant actual game/mode/party-size rules require
current first-party evidence before reliance; this record invents none.
Reversible filter defaults and preference/constraint behavior within game
compatibility are agent-selected, not upfront owner blockers. Rank evidence,
identity and data are now governed by `DEC-047`/`DEC-048` below. With declared
rank, compatibility checks use the stated input and cannot guarantee the
teammates' actual game eligibility.

### Session No-Show And Participation Direction

`DEC-039` selects an initial no-show path: after five minutes from matching,
teammates may raise a challenge. `DEC-043` requires all other matched teammates,
excluding the target, to support it; give the target 30 seconds to respond.
An "I joined" acknowledgment stops removal for this first pass. No response
removes the target and disbands the QGuard matched team. This is self-report,
not control or proof of game membership. Recovery/partial-party persistence is
agent-selected under `DEC-042`; stronger checks remain later planning.

Leaving the game before completion makes a player's outgoing ordinary ratings
ineligible. Teammate reporting is the proposed evidence; evidence/counting edge
rules must be explicitly specified by the implementation agent, preserving
the selected two-reporter consequence and not inventing penalties. These are
not all predevelopment owner questions under `DEC-042`. The owner postpones stronger
false-no-show/collusion checks (`DEF-008`), acknowledging that a joined player
could be falsely targeted. No automatic score deduction or ban is selected;
development direction is not proof of safe release.

### Current Feedback and Session History Direction

Under `DEC-061`/`DEC-063`, each player must submit one overall 1–10 honor
rating for every eligible teammate before entering another queue. Existing
self, original-premade and participation exclusions remain. There is no numeric
default, ordinary skip or ten-minute expiry. Ratings submitted later still count
when eligible. A player's completed obligation does not require somebody else
to submit before that player can requeue.

At session end, open that session's history/detail page for rating. Provide
the player's session history for later access. Find match checks unfinished
eligible ratings and redirects to the relevant old session until they are
completed. Sent/locked ratings cannot be edited; draft interaction precedes
that commitment. Model sessions and their participant relationships; a session
can cover several games. History is not a public review ledger.

Two optional peer sliders describe communication tendency and play style.
Initially centered, they contribute nothing unless intentionally answered;
an intentional midpoint answer is distinct from an untouched control. Submitted
descriptions may contribute to a displayed summary but never honor, matching,
eligibility, ordering or punishment for now. Poles/labels, summary aggregation,
sample sufficiency and clear-to-unanswered interaction are to be specified.

Only the player and their authorized matched teammates see descriptive
summaries. Individual received ratings and reviewer identities stay hidden.
Quiet/cautious and vocal/aggressive are descriptions, not moral grades.
`DEC-065` applies finalized eligible honor inputs without waiting for other
participants. Process a later submission against current honor/reference state;
do not backdate it or replay previous calculations. Never apply an input twice.
The existing honor model remains, but report-based exclusions only prevent
inputs not yet applied. Later reports remain human-review evidence and do not
undo prior honor/reference/count effects. Label that distinction honestly in
the admin audit. This accepts order dependence; it does not establish that all
differences are small or self-correcting. [OQ-013](../governance/open-questions.md#oq-013---when-does-honor-update-while-other-session-feedback-is-outstanding)
is resolved. Do not infer a new penalty, final retention policy, friend-discovery feature or live
game detector. Acceptance must cover queue bypass attempts, return after a
long absence, multiple pending sessions, immutable/idempotent submissions,
ineligible targets, untouched sliders and private summary access. Also cover
concurrent reports/ratings, pre-application exclusions, later reports retaining
already-applied effects, old-session submissions against current state and
privacy-safe score presentation.

### Feedback Format, Pending Settlement And Report Review

The following records the implemented first-pass baseline. Its three honor
dimensions, optional/skip behavior, feedback cutoff and whole-session pending
settlement are superseded for the next pass by the direction above. Its other
eligibility/report rules remain subject to `DEC-065`'s no-retrospective-correction
boundary; old tests do not verify the new direction.

`DEC-041` selects three user-facing 1–10 dimensions: communication,
sportsmanship and effort. Their simple arithmetic mean becomes one input to
the existing honor calculation. Communication includes in-game communication;
effort is behavioral, not mechanical skill. Permanent separate dimension
history is not required. Use equivalent internal 100-scale or finer units with
fractional precision; the agent chooses and tests numeric representation.

Matched teammates may rate one another except original pre-made co-members,
self/unrelated players and otherwise ineligible participants. Reports are
separate from numerical ratings. An expandable "Dishonorable actions" section
starts flags at No: early leaving; no talking/communication in Discord (only
for Discord-enabled matches); harmful/unsportsmanlike language or slurs. No
speech monitoring is approved, and future Discord presence is not proof of
speech or in-game participation.

Two distinct teammates reporting a player in the same match, across any
categories, automatically invalidate that player's outgoing ordinary ratings
for that match before human review. Flag this automatic action in the admin
view. The owner's follow-up explicitly distinguishes this eligibility
consequence from automatic penalties. It does not invalidate ratings the player
receives or impose a permanent rating ban, honor deduction or account sanction.
Report-counting edge cases need a documented slice contract; agent-made
reversible selections must not be described as already selected owner policy.

Submitted ratings stay pending while session feedback/reports are considered;
fast submission and leaving the UI cannot evade the check. A queue entered
before settlement uses the current, not-yet-updated honor. Only eligible
ratings enter honor and its unadjusted reference. Under `DEC-043`, a participant
clicks Session ended to open their feedback screen. This is separate from the
no-show action and covers one or several games without game-end detection.
The feedback batch and its report-based ineligibility apply to this matched
QGuard session, not a separate API-observed batch for each underlying game.
The first completed feedback submission after Session ended starts a ten-minute
window. Settle as soon as everyone declares completion and finalizes feedback,
or at the deadline if some never submit. A returning participant may be shown
still-pending feedback. Merely clicking Session ended does not start the clock.

Optional/skipped fields, post-closure handling and same-session processing edge
details are to be specified/tested within `DEC-042`'s discretion; missing
feedback is not permission to fabricate ratings or silently apply late updates.
Owner requests later polish under `DEF-011`, including differing end times,
multiple games and premature session-end declarations. Under `DEC-047`,
submitted records remain after settlement without automatic expiry for this
first pass, including sessions without a report. Retention-policy refinement
is `DEF-012`; honor continues to use its smoothed aggregate state.

`DEC-040` selects a basic report inbox/dashboard for human review, including
the automatic-invalidation tag. Admin punishment tools, automatic penalties
and correction/appeal policy are postponed for later planning (`DEF-009`), not
implicitly approved later features. Basic UI details are implementation work;
new penalties or access rights are not.

### Private Reputation Direction

`DEC-052` amends `DEC-038`/`DEC-045`: players see their own honor and, once
matched, their teammates' aggregate honor alongside game rank in the authorized
session roster. This is not public honor or unrelated-friend profile access.
A received-feedback/history/per-match points screen is not required for this
version. Reviewer identities and individual received feedback remain hidden
from players, not irreversibly removed from moderation evidence.

Only admins granted data clearance enter the admin panel. They can inspect all
available QGuard case/account context, including feedback/report authors,
targets and contents; no participant-anonymity redaction prevents review.
Private matched-party chat is not secrecy from these authorized admins.
This access requires enforcement and does not authorize credential/secret
disclosure, voice capture, arbitrary external data or new admin penalty powers.
Moderation-purpose evidence needed for this view is distinct from an exact
historical ledger used by honor. `DEC-047` retains stored feature records until
explicit deletion, with no automatic expiry in this first pass. Admin views
must accurately reflect what exists; the agent documents the actual data
inventory for the immediate second-pass retention review (`DEF-012`).

### First-Pass Data Retention And Review

Retain stored account/session records, individual feedback and reports, and
native chat messages from ordinary and reported sessions under `DEC-047`.
Do not purge them when feedback settles or silently apply a retention timer.
Cleared admins have the approved project-context view; player-facing privacy
is unchanged. This is not new voice recording, external collection, secret
logging, a player-visible history feature or a different honor algorithm.

Immediately after the first implementation, present the owner with the actual
stored fields/records and their purposes. Under `DEF-012`, decide retention,
restrictions and deletion from that concrete inventory in pass two. Existing
real-user collection and release review still apply; the temporary development
default is not a permanent public/legal retention promise. No deletion is
authorized by merely naming this future review.

### Initial Game And Integration Direction

Valorant remains the selected initial game for current QGuard product planning
under `DEC-018` and is reaffirmed for the first pass by `DEC-044`. Earlier CS2
evidence reopened comparison without replacing Valorant; do not treat that
historical comparison as a current requirement to select the game again.
Apex Legends was not selected because the bounded public first-party research
found no evidenced Apex path satisfying the preferred friendship-free
ordinary-party flow. This is a current feasibility-led decision, not an
inheritance from the old project. PC remains the provisional context for the
documented Valorant lobby-link candidate, not a complete approved launch-
platform, region, mode, or audience boundary.

Two high-value preferred capabilities are:

1. obtain sufficiently reliable current rank through a permitted official
   server or legitimate local-client API; and
2. reduce party-formation friction by creating a party/lobby from one matched
   player's client and enabling the other matched players to join with as much
   legitimate automation as the game permits.

These capabilities are desirable but not absolute requirements. No present API
capability, access path, policy permission, or implementation method is assumed.
If a selected capability proves unavailable, unsupported, impermissible, or too
fragile, alternate QGuard flows return to the owner before substitution.

The initial research found that neither Valorant nor Apex publicly documents both complete
rank coverage and ordinary-party automation. Valorant was selected because it
offers an approval-gated opt-in LFG/RSO path and an official user-mediated
lobby link; Apex's documented LiveAPI lobby control is for Custom Matches. See
the [research findings](../research/game-api-feasibility-findings.md).

A subsequent first-party CS2 review found feature evidence for Looking to Play,
but `DEC-019` rejects that mechanism for QGuard. Steam OpenID still provides an
official account-identity path. Research now continues only through the
separate communication and party-entry alternatives. The official description
of a Community Group-to-party bridge is CS:GO-era and needs present-client
verification, but the later owner clarification does not treat persistent
Community Group membership as the desired coordination model. See the
[CS2 party-entry findings](../research/counter-strike-2-party-entry-feasibility.md)
and [Steam communication/group follow-up](../research/steam-nonfriend-communication-and-group-feasibility.md).

The owner then clarified that the requested coordination group is a multi-
person chat comparable to a group DM, with supported API, automation, or semi-
automation and link/code/OAuth entry (`DEC-020`). Discord can provide bot-
created private text/voice channels in an existing server. Valorant's host-
copied lobby link can be carried by that room or another private surface; no
current first-party evidence establishes a comparable CS2 Discord party
handoff. See the
[Discord coordination/game-join comparison](../research/discord-coordination-and-game-join-comparison.md).

For the Valorant candidate, QGuard may designate one matched human as host. The
host creates the ordinary party, obtains the official Riot lobby link, and
submits it through the selected private coordination surface; remaining matched
users click it. QGuard does not need to create or control the Riot party/link.
The copied Riot link is distinct from Riot's direct formal-Discord-friend invite
and Discord's generic game Join action. Because Riot documents sharing the link
“elsewhere,” a QGuard-native private match room may carry it; a Discord room is
not inherently required as the delivery surface. This flow is conditionally
accepted under `DEC-021`, but `DEF-001` must still verify the non-friend case,
host/recipient account-linking prerequisites, delivery-surface behavior, and
region/network conditions before reliance. Generic Discord Game Invite checks
for Valorant and CS2 remain approved in scope under `DEF-002`, but execution
is on the [2026-09-28 owner hold](../governance/deferred-work.md#owner-hold--discord-access--2026-09-28).

For ordinary-party entry, prefer an official direct Discord join or shareable
ordinary-lobby link that avoids an in-game friend addition, then another
official friendship-free ordinary-lobby code/link, and use the documented
friend/invite/accept flow only as a fallback. A Custom Match, Private Match, or
tournament code does not satisfy the normal public/ranked-party need unless the
owner later changes the product boundary. Valorant has an official user-copied
PC lobby-link candidate; `DEC-019` rejects CS2 Looking to Play; and Apex has no
comparable documented feature in the reviewed first-party material. Steam
group-chat links may solve non-friend text/voice coordination, but are not CS2
party links. The old Community Group-to-CS2 lobby path remains historical/
fallback evidence rather than the current communication route. Before QGuard
may depend on a game path, its applicable scoped test must pass. `DEF-001`
specifically gates the selected Valorant link, while `DEF-002` separately checks
generic Discord Game Invites for Valorant and CS2. See the focused
[party-entry and policy findings](../research/party-entry-and-policy-fit.md) and
[behavioral validation packet](../planning/party-entry-behavioral-validation-packet.md).

`DEC-023` established the combined
[coordination and party-entry validation program](../planning/coordination-and-party-entry-validation-program.md)
as the evidence gate. `DEC-024`, as refined by `DEC-035`, selects optional
Discord room/voice planning and keeps joining replaceable: a game-specific Discord Join action
is preferred if validated; the accepted alternative is a matched human sharing
the official lobby link in a private Discord text channel visible only to the
matched players. Actual game joining stays unimplemented and live tests stay
paused. `DEC-035` excludes real Discord implementation from this scope; the
owner's availability prerequisite does not establish a new Riot release fact.
The surrounding system may be specified and later implemented in
approved slices without assuming a working external integration. A documented
capability or mock result is not a behavioral pass. See the
[coordination and party-handoff module](coordination-and-party-handoff.md).

If the approved Valorant flow requires RSO, a provider-independent working or
mostly testable prototype may use clearly identified mock data for RSO-
dependent screens when applying for production access. This conditional path
does not authorize building or publishing the prototype, contacting Riot,
submitting an application, using credentials, or assuming approval.

### Coordination And Voice Evidence

Discord rooms and voice are the optional voice planning direction under
`DEC-024`/`DEC-035`, with real integration excluded from this implementation.
The future host-link alternative uses matched-only Discord text. `DEC-046`
requires native private match text now and only no-Discord queueing while real
integration is absent. Future room lifetime, admission, permissions and operating rules
remain open; universal compulsory attendance is not selected. Earlier session-audio
retention for report review remains an unapproved proposal, not part of the
room/voice selection.

Steam group chat is now another researched coordination proposal. It can
provide text and voice to group members and may admit non-friends through a
shareable link, subject to a behavioral test. No supported QGuard interface was
found for automatically creating or cleaning up those rooms, and Steam voice
does not provide QGuard with a documented recording or monitoring interface.
Under `DEC-020`, it is a manual fallback rather than the preferred coordination
candidate. A persistent Steam Community Group is not the desired chat object.

Current Discord research finds that one human-owned QGuard server with bot-
created private per-match text and voice channels is a supported optional
coordination design. Users can enter through constrained server invitations or
OAuth `guilds.join`, and the bot can manage permissions and channel cleanup.
Discord Group DMs more closely resemble the requested UI, but their documented
application-creation endpoint originated with deprecated GameBridge, is capped
at ten active Group DMs, and cannot contain a bot. The owner, not these findings,
selects the Discord planning direction through `DEC-024`. Data flow, detailed
implementation, membership lifecycle and recording remain unapproved. The
earlier agent recommendation did not itself approve a native room; the latest
explicit owner instruction does approve native private match chat (`DEC-046`).
`OQ-011` now tracks its data/security specification and later integration detail.

### Availability Direction

QGuard is intended as a broadly international product rather than a Turkey-
only product (`DEC-022`). This is a direction, not a promise of worldwide
availability. Exact launch countries, languages, ages, provider availability,
and jurisdiction-specific obligations remain open. Discord restrictions or VPN
behavior in a location may be recorded as test variables but do not establish
legal permission, official provider support, or an approved product dependency.

The Discord and Steam coordination options are proposals, not approved
foundations or implementation requirements. Temporary voice rooms without
recording, session recording for later report review, participant-submitted
evidence, and live or automated monitoring are separate choices. See the
[Discord coordination and voice-evidence packet](../planning/discord-coordination-and-voice-evidence-options.md).

### Rank Source

`DEC-048` delegates the first-pass identity/rank flow to the implementation
agent. Determine identifiers and available ownership checks from current
official evidence; do not assume Riot ID entry or mandatory verified ownership
before knowing the actual flow. Ownership and rank may share an authorization
path, but neither capability proves the other without evidence.

Use official rank retrieval if permitted, reliable and accessible. If it is
unavailable, requires ungranted Riot approval or needs further owner decisions,
the approved first-pass fallback is self-declaration. Record/test the selected
method and its limits for owner review after the build; source choice is not a
new upfront owner question. Provider contact/application gates remain separate.

Show stated ranks in the matched QGuard lobby. At Session ended, ask whether
any teammate's observed in-game rank differed from the website's stated rank,
and record identified discrepancies for review. Verify what the game actually
shows; support not-observed/unknown rather than manufacturing a confirmation.
Keep this in the existing multi-game-session feedback flow. A peer check is
not official verification; retain accurate source/status labeling. Specify
report-category handling with the existing human inbox and two-reporter
eligibility rule; do not silently introduce new penalties or automatic rank
corrections.

### Legacy Evidence Use

Legacy implementations inform current specifications through:

- the capability or user outcome they attempted;
- the behavior they demonstrably achieved;
- integration/API constraints and failure modes; and
- lessons from technically difficult or integration-specific work.

Their ordinary implementation shape, code, architecture, and technology are
not inherited. A legacy intention becomes a current requirement only through an
explicit owner decision.

### Decision And Implementation Sequence

The historical reconstruction is sufficient for redesign without an
exhaustiveness claim. Current decisions will be settled gradually in bounded,
dependency-aware discussions rather than through one bulk questionnaire. This
does not weaken the implementation gate: every specification required by a
particular implementation slice must be approved before that slice starts
unless the owner records a narrow explicit override.

Compliance with applicable law is required. The actual jurisdiction, data
obligations, and qualified-review needs remain open until the product flow,
participants, locations, data fields, recipients, and retention are concrete.

## Provisional Honor Notation Discussion

- **Status:** reference method selected by `DEC-032`; influence/honor notation
  remains a development draft, not a complete implementation-ready algorithm
- **Source:** owner annotations on 2026-10-02, applying the
  [descriptive explanation policy](../operations/workflow-governance.md#technical-explanations-and-provisional-notation)
- **Owner preference for discussion:** retain the division form with
  `allowed_rating_deviation` expressed in rating points, rather than asking
  the owner to configure its reciprocal. The two parameterizations are
  algebraically equivalent when their values are reciprocals; the division
  form is easier to interpret. No numeric value is selected.
- **Input name:** use `new_input_teammate_behavior_rating` for the new raw
  post-play rating submitted by one teammate about the player whose honor is
  being calculated. It is not that player's resulting honor, the reviewer's
  honor, or an already-adjusted rating.

A proposed development influence curve, to be calibrated within the selected
behavior and approved slice, is:

```text
distance_from_previous_smoothed_raw_rating_reference =
    absolute_value(
        new_input_teammate_behavior_rating
        - previous_smoothed_raw_rating_reference
    )

rating_influence_multiplier =
    1 / (1 + (
        distance_from_previous_smoothed_raw_rating_reference
        / allowed_rating_deviation
    )²)
```

For this draft, `allowed_rating_deviation` must be positive and uses the same
rating-point units as the distance. It is a smooth reference scale, not a hard
allow/reject threshold or a no-dampening zone: at equal distance, influence is
exactly one half; below it, influence exceeds one half; above it, influence is
less than one half. Dampening starts for any nonzero distance. If equivalent
numeric units change under `DEC-027`, this scale must change with them to
preserve the same influence.

The reference is the previous smoothed state; the incoming rating is not fed
into it before assessing the input's departure. Under `DEC-030`/`DEC-032`, separate
honor dampening does not alter the raw input supplied to its later reference
update. The influence/honor curve is a development draft; its constants and
small behavior-preserving refinements can be calibrated under `DEC-032`.
Eligibility, batching, retention and complete acceptance criteria still need
specification. No anti-retaliation effectiveness or implementation is claimed.

`allowed_rating_deviation` and `raw_rating_reference_response_divisor` are
independent settings with distinct names and meanings. They may share a numeric
value without being coupled; selecting response divisor 20 does not select
deviation 20. Use descriptive unambiguous variable names even when longer.

### Smoothed Raw-Rating Reference

- **Status:** approved reference method under `DEC-032`; not implemented
- **Source:** owner annotation, 2026-10-02, proposing one retained reference
  value instead of individual values for an exact configurable last-N average
- **Approval boundary:** `DEC-032` supersedes only exact last-N reference
  semantics in `DEC-029` and `DEC-030`. `DEC-033` explicitly selects no exact
  individual feedback history for the first-version honor calculation.
  Records for other purposes follow `DEC-047` pending the `DEF-012` review;
  retaining them does not change this calculation.

With descriptive names, the selected recurrence is:

```text
updated_smoothed_raw_rating_reference =
    previous_smoothed_raw_rating_reference
    + (new_input_teammate_behavior_rating
       - previous_smoothed_raw_rating_reference)
      / raw_rating_reference_response_divisor
```

This is algebraically equivalent to weighting the prior reference by divisor
minus one, adding the new raw input with weight one, then dividing by the
divisor. It is exponential smoothing, with a new-input weight equal to one
divided by the response divisor. A divisor of at least one gives a bounded
weighted average; larger divisors mean slower reference movement. This is a
response parameter, not a count of ratings retained or games played. The
adjustable development starting value is 20, giving 5% movement toward each
eligible input; production calibration is not fixed. The input enters without
the separate outlier-influence multiplier; recency smoothing is not retaliation-
based attenuation.

**Primary-source ledger:** NIST/SEMATECH, *Single Exponential Smoothing*,
[handbook section 6.4.3.1](https://www.itl.nist.gov/div898/handbook/pmc/section4/pmc431.htm),
accessed 2026-10-02. Supports the exponential recurrence, geometrically declining
historical weights, and initialization sensitivity. It does not validate
QGuard's influence curve, tuning, retention policy or anti-abuse effectiveness.

**Verified synthetic comparison:** initialize both references at 80, with the
exact-window candidate holding thirty prior raw ratings all equal to 80. Every
new raw rating is 20; the smoothing candidate uses divisor 30. These values are
illustrations, not an approved scale, baseline or response setting.

| New ratings received | Exact last-30 average | Smoothed raw reference |
| --- | --- | --- |
| 1 | 78.00 | 78.00 |
| 10 | 60.00 | 62.75 |
| 30 | 20.00 | 41.70 |
| 60 | 20.00 | 27.85 |

At thirty new ratings, the initial reference still has approximately 36.17%
weight in the smoothed candidate; the exact window has fully replaced its
old inputs. Therefore this is a different recency model, not an exact rolling
average or a guaranteed small approximation error. A sustained new level moves
the smoothed reference toward that level, while an isolated unusual rating's
effect decays gradually instead of dropping out at a fixed boundary.

**Storage and configuration assessment:** this recurrence needs one retained
reference scalar for its basic calculation and constant work per new input.
Changing its divisor affects future updates without fetching older inputs,
but does not recreate the reference that the new divisor would have produced
had it applied throughout history. Exact last-N averaging is also constant
arithmetic per update with a running sum and the oldest retained value; its
distinct cost is retaining a bounded N-value buffer, not complicated mathematics.
No database performance or size benchmark has been performed.

**Owner selection:** the smoother reference and its gradual adaptation are
approved, not an outstanding exact-window comparison. During development,
calibrate its response jointly with the separate honor update rate and influence
curve; do not equate the divisor to a literal window length. Mean-only state
cannot reconstruct individual feedback for correction, appeals, abuse
investigation or historical recalculation. `DEC-047` now explicitly retains
first-pass feature submissions for review. Keep that evidence storage separate
from the aggregate calculation and inventory it for `DEF-012`; do not restore
last-N scoring merely because raw submissions are retained.

**Development handling approved by `DEC-031`/`DEC-032`:** include initialization and
confidence/sample-count handling; the implementation agent chooses its method
and documents/tests it during the approved slice. Do not treat the fixed
newcomer honor baseline as real historical ratings. Divisor 20 is the selected
adjustable development start; its 5% reference adjustment is per eligible
rating, not per game or directly the honor score. No deployment-role transfer
or new owner startup-method question is created.

**Still required:** same-session ordering/batching; eligibility, correction and
retention rules; and deterministic/adversarial verification of the full coupled
honor calculation. Initial correctness tests accompany implementation; broader
response-speed calibration may follow in development rather than requiring a
final value before an otherwise-approved slice begins.
The prior reference must be used when assessing a new input; feeding that
input into the reference first would reduce its measured departure. No live
data, production implementation or anti-retaliation guarantee is established.

## Future Honor Ideas - Outside Current Implementation

- **Scope authority:** `DEC-034`, owner instruction on 2026-10-03
- **Status:** preserved future possibilities; excluded from the current
  implementation scope, not approved scoring features
- **Return condition:** owner explicitly reopens future consideration; adoption
  and an applicable approved specification are required before implementation
- **Current boundary:** retain the existing honor direction under `DEC-026`
  through `DEC-033`. No extra indicator, collection, retention, schema field,
  consequence, telemetry or implementation gate is implied by these notes.
- **Future-work routing:** [DEF-006](../governance/deferred-work.md#def-006---reconsider-future-honor-ideas-on-owner-request)

### Rating-Dispersion Adaptive Dampening Proposal

- **Status:** previously evaluated proposal; future-only under `DEC-034`,
  explicitly excluded from current implementation
- **Source:** owner questions and annotations, 2026-10-02
- **Future reviewer / choice:** project owner, only after explicit reopening;
  whether normal rating dispersion should increase ordinary feedback's influence,
  accepting larger score swings. This is not the next current-scope question.
- **Scope:** a bounded aggregate spread estimate, not individual rating history,
  a public volatility label, a misconduct finding or a new matching dimension

**Current-model assessment:** a smoothed raw reference tracks rating level,
not spread. The current influence curve compares one input with that reference
using a fixed `allowed_rating_deviation`. It has no state describing how far
ratings typically depart. Sustained feedback already moves the reference and
eventually reduces departure from the new level; a dispersion estimate is not
required for that behavior. A consistently middle-rated player and a player
alternating high/low ratings can have similar reference levels but different
spread.

**Candidate aggregate statistic:** reuse the current absolute input departure
and exponentially smooth that distance in one additional scalar:

```text
updated_smoothed_typical_rating_deviation =
    previous_smoothed_typical_rating_deviation
    + (distance_from_previous_smoothed_raw_rating_reference
       - previous_smoothed_typical_rating_deviation)
      / rating_deviation_response_divisor
```

`smoothed_typical_rating_deviation` estimates recent typical departure, in
rating points, from the reference that preceded each input. It is not exact
last-N deviation, variance, standard deviation or an exact mean absolute
deviation recalculated about today's mean. A sustained trend can increase this
statistic as well as alternating ratings. `rating_deviation_response_divisor`
is an independent response-speed setting, at least one: larger means slower
movement. Raw departures enter unadjusted by honor dampening. No numeric
initialization, confidence method or response value is selected by this proposal.
If adopted, startup handling must fit the existing implementation delegation.

**Candidate bounded connection to influence:** replace the fixed allowance
in the draft influence curve with:

```text
effective_allowed_rating_deviation =
    maximum(
        minimum_allowed_rating_deviation,
        minimum(
            maximum_allowed_rating_deviation,
            typical_rating_deviation_allowance_multiplier
            * previous_smoothed_typical_rating_deviation
        )
    )

rating_influence_multiplier =
    1 / (1 + (
        distance_from_previous_smoothed_raw_rating_reference
        / effective_allowed_rating_deviation
    )²)
```

The minimum is positive and the maximum is at least that minimum, both in
rating points. The multiplier is nonnegative and converts typical departure
into an allowance; it is not a reciprocal rename of that allowance. More
previous typical departure can increase the allowance up to the cap, making
the same new departure less dampened. The floor keeps a near-zero estimate
from producing division by zero or excessive suppression. All settings need
distinct descriptive names and independent configuration, even if numbers match.
Rescaling rating units must rescale both reference/deviation state and allowance
bounds, not the dimensionless response divisors or multiplier.

**Update order:** calculate departure and honor influence from the previous
reference and previous deviation estimate; then update the two aggregate
statistics. An extreme input must not enlarge its own allowance before its
honor effect is assessed. It can still enlarge future allowances, so the cap
and update order limit one failure mode but do not establish abuse resistance.
The storage calculation needs one additional scalar, not an array; eligibility,
deduplication, transaction and correction data remain separate unresolved needs.

**Verified synthetic evidence:** ephemeral Node calculations used illustrative
initial reference/honor 50, initial deviation 0, both response divisors 20,
honor update fraction 0.1, allowance floor 20/cap 60 and multiplier 2. None of
these additional values is an approved baseline, scale or calibration. The
honor update example uses fraction times influence times (input minus honor).

| Feedback pattern / example | Fixed allowance | Adaptive allowance |
| --- | --- | --- |
| Repeated 50 input | Reference/honor 50; spread estimate 0 | Same |
| Alternating 20/80 after 1,000 inputs | Honor alternates about 49.55/50.45 | Honor alternates about 48.76/51.24 |
| Reference/honor 50, new input 20; prior spread 30 for adaptive case | Allowance 20; influence 0.3077; honor change -0.9231 | Allowance 60; influence 0.8; honor change -2.4 |

The alternating sequence's reference remains centered around 50 and its
deviation estimate approaches 30.7692. Adaptive influence changes responsiveness
and swings, not necessarily the balanced sequence's center. One extreme input
from the initial state used the prior floor of 20, then changed the deviation
estimate to 2.5. This checks ordering, not retaliation detection. A total of
12,078 arithmetic/bounds assertions passed for these synthetic sequences;
these are not 12,078 independent behavioral scenarios or production tests.

**Usefulness and limits:** adaptation can make a historically wide-rated player
respond faster to both poor feedback and recovery. A previously steady player's
first poor rating remains unusual; this is not a universal bad-day detector.
Ratings per day/game are not the update unit yet; multiple teammates in one
session are correlated, so eligibility and batching affect apparent speed.
Balanced inputs need not produce exactly the same honor under every order,
weight and starting state because the coupled system is nonlinear. Wider score
swings could also destabilize matching. Rating dispersion does not prove a
volatile play style, toxic behavior or that any individual rating is truthful;
reviewer disagreement, context and manipulation can produce it. Repeated
attacks can inflate spread and weaken later protection. For stable users the
bounded proposal preserves the fixed-allowance case, but the approved isolated-
extreme trade-off must be checked jointly across allowance values.

**Primary-source ledger:** NIST/SEMATECH,
[Measures of Scale](https://www.itl.nist.gov/div898/handbook/eda/section3/eda356.htm),
accessed 2026-10-02, supports absolute deviation as a spread measure and why
squared deviations emphasize extremes more. NIST/SEMATECH,
[Single Exponential Smoothing](https://www.itl.nist.gov/div898/handbook/pmc/section4/pmc431.htm),
accessed 2026-10-02, supports scalar exponential updates and initialization
sensitivity. Applying smoothing to prior-reference absolute residuals and
feeding it into QGuard's allowance is an agent proposal, not a NIST-endorsed
scoring formula, a statistical confidence guarantee or anti-abuse validation.

**Future evaluation / approval boundary:** the prior assessment identified
bounded adaptation as an option for faster response within a player's usual
range, not a requirement for an average or eventual behavior change. The owner
now excludes it from this implementation scope under `DEC-034`; do not compare
or build it as a prerequisite to current implementation. If reopened,
selecting it changes scoring behavior and requires owner approval,
not just implementation tuning under `DEC-032`. Before relying on it, compare
constant/alternating ratings, isolated outliers, sustained improvement/decline,
sparse startup, one-session bursts, reviewer attacks, input ordering and
matching stability. Full adversarial, calibrated and live-user validation has
not been performed. No new history collection, public label, sanction, daily
reset or implementation gate override is approved.

### Reviewer-Deviation Accountability Idea

- **Status:** less-developed owner idea, future-only under `DEC-034`; no formula,
  consequence or implementation selected
- **Source:** owner instruction, 2026-10-03, asking that this be preserved beside
  the incoming-rating volatility possibility
- **Intent:** encourage fair teammate feedback by making consistently unusual
  ratings a potential source of consequences for the person submitting them

**Proposed observation:** consider how a reviewer's outgoing behavior ratings
compare with the recipient's ratings/reputation established by other teammates.
Retain some future indicator of persistent positive/negative departure, or
possibly negative departure only. The detection direction is expressly
undecided. This concerns behavior feedback, not a selected comparison with game
skill rank. The reference, time of comparison, aggregation and retained data
are all unchosen; preserving the idea does not approve exact feedback history
or override `DEC-033`.

**Proposed consequence / working interpretation:** a reviewer who consistently
departs from others' assessments might have their own honor become more
responsive to feedback they subsequently receive. This could increase movement
in both positive and negative directions, or only downward movement; that is a
second, separate undecided direction choice. This is not a selected automatic
point deduction, a change to the recipient's game rank, or an approved rule for
downweighting the reviewer's outgoing ratings. The precise meaning of "more
changeable" still needs future design/owner review.

**Distinction from incoming volatility:** the first idea measures the spread
of ratings a player receives. This second idea measures the pattern of ratings
a player gives about other people, and proposes an effect on that reviewer's
own honor responsiveness. Neither one implies the other or becomes part of
current scoring.

**Open only if reopened:** positive-and-negative versus negative-only detection;
the recipient comparison reference; thresholds, persistence and sample/confidence
handling; independent-reviewer/session evidence; aggregate versus individual
data requirements; both-direction versus downward-only honor response; strength,
duration/recovery, explanations and correction/appeal; and whether the benefits
justify feedback loops or added abuse risk. No constants or method are delegated
for this future feature now.

**Future review cautions, not findings about users:** agreement with other
reviewers is not proof of accuracy or fairness. Genuine minority reports,
different session behavior, coordinated positive ratings and retaliation could
all create departures from a reference. A future design must not silently define
fairness as conformity to the majority or treat disagreement as misconduct.
Changing the reviewer's own score sensitivity can also feed back into matching
and later ratings. These risks require evidence and explicit adoption review if
the idea returns; they are not extra current-scope implementation requirements.

## Open Product Decisions

- The precise present-day user problem, outcome, permitted uses, prohibited
  uses, audience, and public-claim boundary.
- Actual identity/rank integration capability and the agent-selected method,
  with the `DEC-048` fallback already approved; factual implementation work,
  not an unanswered owner preference.
- The test result for non-friend acceptance of the official Valorant lobby
  link, its host/recipient account-link and regional prerequisites, delivery
  through Discord versus a QGuard-like relay, and the recovery path if it fails.
- The full launch/platform/audience boundary beyond selected Valorant, solo/
  partial-party session scope and agent-delegated initial region/language controls.
- Later coordination recovery if both preferred joining methods fail.
- Concrete data/security contracts and the `DEF-012` second-pass retention
  review. `DEC-047` retains stored first-pass feature records without expiry;
  `DEC-045` defines cleared-admin and participant access. These are drafting/
  verification tasks, not unanswered first-pass retention questions.
  Native chat and no-Discord-only queueing are already selected. Future Discord
  operating rules return with the integration slice; voice recording remains
  an unapproved future proposal, not a current-scope question or feature.
- The complete matching, honor, review, report, moderation, data, security,
  business, operational, and validation specifications.

No implementation slice is authorized by this partial foundation. Reversible
agent-owned details are not additional upfront owner questions; actual data/
security and acceptance contracts still need to be completed for the slice.

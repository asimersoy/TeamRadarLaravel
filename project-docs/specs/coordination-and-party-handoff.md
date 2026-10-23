# QGuard Coordination And Replaceable Party Handoff

**Current first-pass routing:** native room/chat and unavailable game handoff
are specified concretely in [the first-pass suite](first-pass/README.md), approved
as revision 1 + DEC-052. This older module retains approved integration direction and
future boundaries; its staged outline is not a competing execution plan.

## Status And Authority

- **Record type:** modular product specification and staged implementation outline
- **Status:** planning direction approved; detailed design proposed, not implementation-ready
- **Decision owner:** project owner; primary agent owns drafting and verification
- **Authority:** `DEC-008`, `DEC-016`, `DEC-018`, `DEC-020` through `DEC-024`,
  `DEC-035` through `DEC-048`, `DEC-053`, `DEC-054`
- **Created:** 2026-09-28
- **Implementation boundary:** surrounding implementation is requested but
  remains gated on the applicable approved slice specifications; game-party
  integration remains unimplemented, real Discord integration is excluded
  from this implementation, and live tests remain paused
- **Update trigger:** owner decision, approved slice, changed provider evidence,
  live test result, or changed coordination/data contract
- **Supersession:** current product boundary replaces the earlier unapproved
  separation proposal; historical options remain in the
  [coordination packet](../planning/discord-coordination-and-voice-evidence-options.md)

## Purpose And Approved Requirements

Keep matched-team communication independent of the eventual method used to
enter the game party, so changing that method does not require redesigning the
whole match flow. Under `DEC-024`, as partially refined by `DEC-035`, `DEC-046`
and `DEC-054`:

1. Offer queue choices with or without Discord voice. Plan future Discord
   rooms/voice for the with-voice route, not as a universal requirement. Under
   `DEC-046`, only no-Discord queueing is active in this first pass.
2. Keep game joining replaceable and unimplemented for now.
3. Prefer a game-specific Discord Join action if it passes the applicable
   nonfriend test; a shared voice room alone is not that action.
4. Accept the alternative in which QGuard prompts one matched human to create
   the ordinary game lobby and submit its supported joining information in a
   dedicated QGuard page or prompt. Present it to the other matched players in
   a structured join interface, not as a required free-form chat post (`DEC-054`).
5. Do not claim either joining method works until the applicable live evidence
   exists. Preserve the [owner test hold](../governance/deferred-work.md#owner-hold--discord-access--2026-09-28).
6. Exclude actual Discord implementation from the current scope. Resume only
   after applicable feature availability, owner-run tests and later slice
   approval under [DEF-007](../governance/deferred-work.md#def-007---return-to-real-discord-integration-after-availability-and-tests).

`DEC-046` requires private website text chat for matched parties now. Under
`DEC-054`, future host submission and team join instructions are a dedicated
workflow, separate from free-form chat. Displaying joining information is not
creating or joining the party. Match participants are the ordinary audience,
with data-cleared admin access under `DEC-045`.

Voice-pool separation waits for the future integration unless a current
foundational dependency needs it; then strict separation is the owner's
conditional planning default. It does not require speculative dual queues now.
No new Riot feature-release fact is established by this availability condition.

These requirements do not approve recording, transcription, message
surveillance, automatic client control, compulsory voice attendance, a native
voice fallback, or a new game/technology choice. Valorant remains the current
first-game direction under `DEC-018`.

## Proposed Boundaries — Not Yet A Technical Contract

| Responsibility | Owns | Must not assume |
|---|---|---|
| QGuard match context | Matched roster, designated host, match identity and lifecycle as defined by later matching/identity specifications | That entering Discord or clicking an invitation proves in-game membership |
| Native matched-party text | Participant communication, with isolation, cleared-admin access and first-pass retention under `DEC-047` | That chat substitutes for the dedicated host setup, automated joining, secrecy from cleared admins or a settled permanent public retention policy |
| Discord coordination | Future matched-team voice/text access; access revocation and cleanup after their rules are approved | That Discord chat is required for the manual handoff, a server invitation is a game invitation, or the game-join method fixes unavailable voice access |
| Game-party handoff | Describes the available method or clearly reports it unavailable; future human-host setup uses dedicated submission and structured recipient instructions under `DEC-054` | An existing public QGuard party-control API, automatic lobby-link generation, or a verified membership signal |

This is a separation of responsibilities, not a choice of microservices,
libraries, framework, schema, deployment, or plugin infrastructure. Do not reuse
the legacy Laravel or relay design merely because it exists.

## Proposed User And Failure Flows

- Current matched parties communicate through native private text. Only the
  no-Discord queue is available; UI must not imply a live voice integration.
- A future with-voice matched team receives Discord room access through a later-approved
  admission flow. Voice and game-party status remain separate.
- If the validated Discord-native method is available, present the relevant
  user action; do not imply that QGuard forces the game to join automatically.
- Otherwise, if the manual method is validated and enabled, prompt the host to
  create/open the game party and submit its supported link/code in a dedicated
  input. Show the other matched players structured joining information and the
  relevant action. This is the accepted alternative, not automatic failover on
  every transient error. A raw party ID is not assumed joinable; a code is
  accepted only if its user-facing joining route is validated. Choosing a page
  versus a modal/prompt and the detailed validation/recovery contract remains open.
- With no implemented method, show an explicit unavailable/not-connected
  state. Do not manufacture a success, silently add friends, or expose a fake
  working Join button. Label any development-only simulation as simulated.
- If Discord access/admission fails, do not treat link sharing as restored
  voice access. The user recovery policy is an owner question below.
- Denied room access must not cause publication in a public/shared channel.
  Host absence, stale/full lobby, roster changes, revoked access, retry and
  cleanup behavior need approved rules before the relevant implementation.

## Data, Interfaces, And Privacy — To Be Specified

Define only the minimum match identifier, authorized roster, host identity,
Discord user/channel mapping, and short-lived handoff information needed by an
approved slice. No database schema or provider scopes are selected here.
`DEC-047` retains actual native chat and other first-pass feature records
without automatic expiry until the `DEF-012` second-pass review. Identity
details are delegated under `DEC-048`; specify the concrete mapping and secret
handling. `DEC-045` permits data-cleared admins to inspect stored project
case/account evidence without participant-anonymity redaction; it is not
permission to expose credentials or collect unrelated data. Real links, tokens,
and account credentials must not enter Git or diagnostic logs.

The approved future Discord privacy intent is matched-only text visibility. Its permission
design and test must distinguish ordinary outsiders from necessary bot access
and Discord owner/administrator capabilities; do not promise absolute secrecy
from privileged operators. Cleared-admin project access is selected under
`DEC-045`; authentication, authorization, retention and enforcement still need
the data/security contract. No audio capture is part of this module.

Proposed status contract: an unconfigured integration, an offered join action,
an attempt, a participant's reported result, and provider-verified membership
are distinct. No verified-membership state may be invented without an actual
permitted evidence source. These states are draft design, not owner-approved
data collection or scoring rules.

## Open Decisions And Dependencies

The project owner settles these incrementally under `OQ-011`:

1. **Current specification work:** native chat access, `DEC-047` persistence, ordinary-user
   isolation, cleared-admin enforcement and failure/recovery tests. Chat and
   no-Discord-only queueing are settled, not questions to ask again. Reversible
   details may be selected/documented under `DEC-042` within approved boundaries.
   Retention-policy selection returns in `DEF-012`, not as an upfront question.
2. **Future integration:** at what point is Discord access checked, and what happens when a player
   cannot access it? No launch-region exclusion or VPN requirement is inferred.
3. How do players enter the server/room; when is it created and removed; does
   server membership persist; what happens on cancellation or roster changes?
4. Who is host, and how do refusal, absence, replacement, retries and expiry work?
5. What identity mapping, permissions, operator access, data retention and
   evidence handling apply to the chosen slice?

Dependencies: approved match/identity rules for real roster handling; the
[product foundations](product-foundations.md); owner-approved delivery/technical
choices under `OQ-007`; the [specification contract](README.md); and applicable
privacy/security review once the actual data flow is defined. These unresolved
items must not be treated as inherited legacy requirements.

## Staged Implementation Outline — Queued, Not Execution Approval

1. **Specify a bounded slice.** Settle its user rules, data/interface contract,
   technology choice, acceptance tests, and recovery behavior. Obtain the
   applicable approvals under `DEC-008`; unrelated modules need not block it.
2. **Build provider-independent behavior.** After those approvals, implement
   the surrounding logic with an explicit unimplemented handoff boundary and
   isolated labeled test doubles. Tests must work without Discord/game accounts
   or external writes. This must not be described as a working integration.
   Do not add a real Discord adapter or manual with-voice queue to this scope.
   Native text is selected under `DEC-046` and requires its approved data/access
   and acceptance contract; irreversible data boundaries are not UI defaults.
3. **Verify and connect Discord coordination.** Only after the owner lifts the
   relevant hold, the `DEF-007` availability/test prerequisite is met, and the
   owner names the test environment and approves a later implementation slice,
   run the admission/isolation/lifecycle tests and implement the real adapter.
4. **Verify and connect a game-join method.** At a later authorized stage,
   evaluate the two candidates, implement a passing method behind the same
   boundary, and retain a truthful unavailable state for any unimplemented
   alternative. Do not require both to work; do not assume either will work.

The preferred product mechanism does not automatically reorder the preserved
clean-account experiment sequence. Existing Steam/CS2 cases are neither
cancelled nor activated by this outline. If neither handoff passes, return to
the owner before changing game or relying on friendship-based joining.

## Proposed Acceptance Evidence

- Structural tests can substitute the handoff implementation without changing
  the approved roster/coordination contract; unconfigured mode makes no live
  calls and never reports a successful real join.
- Native text tests must deny unrelated ordinary users and peer/admin privilege
  escalation while permitting the chosen matched-participant and cleared-admin
  audiences. No message persistence or live game-link behavior is implied by a
  structural mock pass.
- Voice access, offered game action, user-reported progress and verified game
  membership cannot be conflated in state, UI or tests.
- The future manual path must prompt the designated host and display submitted
  joining information to authorized teammates without requiring a chat post.
  Submission or clicking does not establish provider-verified game membership.
- Real private-room acceptance requires matched-user access, ordinary-outsider
  denial, invalid/revoked admission, cleanup and unrelated-state preservation.
- Real handoff acceptance requires the applicable nonfriend ordinary-party
  cases, repeated results and error evidence from the existing
  [validation program](../planning/coordination-and-party-entry-validation-program.md).
- A future release review must state exactly which external path is validated;
  passing mocks or document checks do not establish an end-to-end usable app.

## Route And Documentation Checkpoint

- **Current supersession checkpoint, 2026-10-03:** `DEC-046` requires native match
  text and no-Discord-only queueing now; future pool separation is conditional.
  `DEC-045` selects cleared-admin access without participant identity redaction.
  `DEC-035` excludes real Discord integration. `DEC-037` includes partial
  parties/basic friends; `DEC-039`/`DEC-041` define further session/feedback
  directions without inventing verified game presence. Current operational
  gaps remain in `OQ-006`/`OQ-011`. The following checkpoint is historical
  evidence of the initial module, not authority to implement Discord now.
- **Baseline:** clean `new-development` at `64551ee`.
- **Route:** product planning, privacy/data, external/owner review,
  deferral/owner review, interruption/recovery, and record reconciliation.
  Required entry records and procedures were read. No fresh research, code,
  experiment execution, delegation, or external operation is in scope here.
- **Approval evidence:** explicit owner confirmation of the Discord planning
  direction, replaceable joining, private matched-only link channel, and
  continued test hold; recorded as `DEC-024`. The detailed draft is not approved
  merely because the direction was approved.
- **Verification:** reviewed the complete scoped diff and checked the active
  records for stale planning-selection gates. `git diff --check` passed; a
  read-only local check of all 53 project Markdown documents passed for 204
  local links, 16 section anchors, and 24 unique decision IDs. Changes are
  confined to 13 project-document files; the portable workflow and legacy
  application are untouched.
- **Unrun checks and residual risk:** no application or live-provider tests
  ran; the portable-workflow validator is not applicable to this unit. These
  document checks do not establish real integration behavior or approve the
  draft operational rules. Provider viability and the open slice decisions
  remain unresolved.
- **Commit and external boundary:** one coherent additive local documentation
  commit; no push, deployment, bot/server action, or application code change.

# QGuard Coordination And Party-Entry Validation Program

- **Record type:** owner-required pre-decision experiment program
- **Status:** scope approved; Discord-dependent execution paused under the
  [2026-09-28 owner hold](../governance/deferred-work.md#owner-hold--discord-access--2026-09-28);
  remaining cases retain their existing readiness gates
- **Planning owner:** primary Codex agent
- **Decision owner:** project owner
- **Execution owner:** unassigned
- **Authority:** `DEC-016`, `DEC-018` through `DEC-023`
- **Created:** 2026-09-07
- **Decision served:** `OQ-011`, with evidence also affecting `OQ-005`,
  `OQ-009`, and `OQ-010`
- **Implementation authority:** test-only; no product implementation
- **Update trigger:** test-environment availability, source/client change,
  executed case, invalid result, owner scope change, or completed analysis
- **Resource and order companion:**
  [coordination test resources and sequence](coordination-test-resources-and-sequence.md)

## Owner Direction

Do not select QGuard-native coordination, Discord coordination, a copied Riot
lobby link, or a game-specific Discord Join path merely from documentation.
Run the relevant current-client and coordination-lifecycle tests first, then
return the evidence-backed comparison to the owner. The previously parked
critical item is `OQ-011`: the Discord/private-room coordination backbone. It
is now a test target rather than the next immediate decision.

The 2026-09-28 owner hold pauses Discord-dependent execution without changing
this evidence gate. Temporary inability to test does not count as a completed
negative or permanently untestable case that unlocks product selection.

The earlier direction approved the bounded test program. It does not supply
accounts, credentials, client access, participant consent, a test server/group, or
permission to expose secrets. It also does not authorize a permanent Steam
Community Group, recording, unofficial client automation, matchmaking, provider
contact, product implementation, publication, or deployment.

## Decision-Blocking Minimum Set

The coordination decision returns only after these cases have a valid result,
or a recorded external impossibility makes a case untestable:

| Area | Required cases | Decision question |
|---|---|---|
| Valorant official link | `VAL-NET-1`, `VAL-LINK-1` through `VAL-LINK-4` | Does the host-copied Riot link work for matched non-friends, what linking/network/runtime prerequisites apply, and can QGuard carry it without Discord? |
| Valorant direct Discord integration | `VAL-DIRECT-1`, `VAL-GI-1` | Does shared-server membership expose a working game-specific Invite/Join action for non-friends? |
| CS2 Discord integration | `CS2-GI-1` | Does current CS2 expose a working Discord Invite/Join action into an ordinary party? |
| Discord coordination room | `DCS-1` through `DCS-5` | Can QGuard semi-automatically create an isolated private text/voice area, admit matched non-friends, and clean it up? |
| Steam coordination | `STM-CHAT-1` | Can non-friends enter the same Steam group chat through a link and use text/voice, and what remains manual? |
| CS2 current alternatives | `CS2-OBS-1`, `CS2-GROUP-1` | Does current CS2 expose an official lobby link/Nearby path or the historical Community Group-to-ordinary-party bridge? |

The following are conditional diagnostics, not mandatory before `OQ-011`:

- `VAL-DIRECT-2`, a formal-Discord-friend positive control, runs only if the
  non-friend direct-invite result is ambiguous and the accounts can safely add
  and remove that relationship.
- `DCS-3B`, OAuth `guilds.join` admission, runs if Discord remains viable and
  the invite-based admission result does not answer the onboarding question.
- `DGD-1` and `DGD-2`, human- and application-created Discord Group DM checks,
  run only if the private-server model fails or Direct Messages placement later
  becomes material. The owner previously said a Group DM is unnecessary if the
  server/private-channel model works.
- A full-tunnel VPN condition runs only if split tunneling is unavailable or a
  diagnostic comparison is necessary.

## Readiness Inputs

Before live execution, identify without putting credentials in project records.
The complete per-case allocation and contamination-safe order are in the
[resource and sequence plan](coordination-test-resources-and-sequence.md):

- two concurrent participant client sessions—such as the owner's Windows PC
  plus a consenting remote participant—on systems where current Valorant, Riot
  Client, Discord, Steam, and CS2 can run for their respective cases;
- two consenting Riot/Valorant accounts, two consenting Steam/CS2 accounts,
  and two consenting Discord participant accounts with the required non-friend
  relationships;
- one additional ordinary Discord outsider account that is not assigned to the
  test room and one separate Discord owner/administrator account; neither
  participants nor the outsider may hold `ADMINISTRATOR`, because the server
  owner and administrators bypass channel restrictions;
- the starting Riot↔Discord link state of each Valorant participant;
- a human-owned disposable or explicitly approved test Discord server and a
  test application/bot with only the required permissions;
- a private neutral relay for a short-lived Riot lobby link, representing a
  QGuard match page without building the product;
- VPN availability and whether per-application split tunneling is possible;
- a redacted evidence location, retention deadline, and cleanup owner; and
- for `CS2-GROUP-1`, an exact existing test Community Group or separate explicit
  approval to create a new persistent group after acknowledging that Steam
  groups cannot simply be deleted by an operator.

Accounts may overlap across providers when appropriate. The clean reusable core
is two participant bundles—Riot/Discord/Steam A and B—on two PCs. The complete
Discord-room proof adds two Discord-only human controls and one bot identity;
it does not require two more gaming PCs. Relationship, linking, region, client,
and network states must remain explicit. Credentials, tokens, complete lobby
URLs, full account identifiers, and full IP addresses must not enter tracked
records, screenshots, chat, or logs.

## Common Controls And Result Vocabulary

Use current production clients and ordinary pre-match parties. A Custom Match,
Private Match, tournament lobby, dedicated server, game launch without party
membership, activity status, or overlay presence is not a passing ordinary-
party result.

Record the date, operating system, client/build versions, account region/shard,
party mode/privacy/free-slot state, friendship and shared-server/group state,
Riot↔Discord link state, VPN path and endpoint country, exact user-visible
action, attempt result, cleanup, and redacted evidence reference.

Classify every attempt as:

- **`pass`:** the exact target behavior succeeds under the stated conditions;
- **`pass-with-prerequisite`:** it succeeds only after a documented linking,
  consent, membership, client, permission, or network prerequisite;
- **`mechanism-fail`:** the correct action exists but does not reach the target;
- **`not-exposed`:** the current valid client state offers no such action;
- **`wrong-target`:** it launches a game or reaches a server/custom match but
  not the intended ordinary party;
- **`invalid-setup`:** a confounder prevents a capability conclusion; or
- **`not-testable`:** a required provider/environment capability cannot be
  obtained within the approved supported-interface boundary.

Party-entry and link-admission cases normally require two clean successes.
Discovery-based CS2 Community Group behavior requires three attempts and one
role reversal because timing and visibility are material.

## Phase 0 - Source, Environment, And Relationship Freeze

1. Recheck current first-party Riot, Valorant, Discord, Valve, Steam, and CS2
   documentation immediately before execution.
2. Record client versions and the relationship/linking matrix before changing
   any state.
3. Confirm ordinary parties can be created independently of the mechanism under
   test, without entering matchmaking.
4. Confirm evidence redaction, retention, and cleanup responsibilities.
5. Confirm the exact external targets before creating a Discord channel,
   invitation, OAuth grant, chat, or group membership.

Run the phases in the resource plan's wave order. Start with the neutral-relay
Valorant copied-link cases before A and B join the test Discord server, and
preserve their nonfriend states until all nonfriend cases finish. Begin with the
host linked and recipient unlinked when safely available; link the recipient
only after the unlinked result is recorded.

## Phase 1 - Valorant Official Copied-Link Path

Execute the detailed procedure in the
[party-entry behavioral validation packet](party-entry-behavioral-validation-packet.md):

- **`VAL-NET-1`:** establish whether the integration is visible and usable in
  the Turkey-based test setup. Prefer Discord/browser through a split-tunnel VPN
  while Riot Client and Valorant stay on the ordinary home-region path.
- **`VAL-LINK-1`:** a recipient who is neither a Riot friend nor formal Discord
  friend joins the host's ordinary party through the official copied link.
- **`VAL-LINK-2`:** vary only the recipient's Riot↔Discord link state to find
  whether linking is required for host only or for every participant.
- **`VAL-LINK-3N`:** deliver fresh official links through a neutral non-Discord
  relay before server membership is introduced.
- **`VAL-LINK-3D`:** later deliver fresh official links through private Discord
  text and compare the result with `VAL-LINK-3N`. Together these subcases
  distinguish a Riot feature prerequisite from a Discord delivery-surface
  prerequisite.
- **`VAL-LINK-4`:** without changing account-link state, compare (a) host link
  generation with Discord connected versus fully closed and (b) recipient
  acceptance from the neutral relay with Discord connected versus fully closed.
  Record whether Discord must be running/reachable at either step.

Stop after party membership; do not queue a match. Treat the complete link as a
short-lived bearer secret and use a fresh link where the comparison permits.

## Phase 2 - Game-Specific Discord Invite/Join Paths

- **`VAL-DIRECT-1`:** with the accounts sharing only the test server, inspect
  Valorant's direct “Invite by Discord” social control. Record whether the non-
  friend is offered and whether a direct invite can enter the ordinary party.
- **`VAL-GI-1`:** inspect Discord's chat-bar Play/Game Invite, profile Join, and
  Ask-to-Join surfaces for the non-friend Valorant host. Verify actual Valorant
  ordinary-party membership if an action exists.
- **`CS2-GI-1`:** repeat the same Discord-surface test for a non-Steam-friend
  ordinary CS2 party. Use non-Premier Competitive for the first observation;
  Premier is unnecessary to test handoff and would add Prime/profile-level
  prerequisites.
- **`VAL-DIRECT-2` (conditional):** establish formal Discord friendship and use
  the documented direct-friend route as a positive control only when necessary
  to distinguish a broken setup from a non-friend restriction. Remove the
  temporary relationship during agreed cleanup.

The Riot copied-link result cannot prove a Discord Game Invite result, and a
Discord Game Invite result cannot replace the copied-link result.

## Phase 3 - Parked Discord Coordination-Backbone Test

Use one human-owned test server; applications can no longer be assumed to
create a server for every match.

- **`DCS-1 — creation`:** using a test bot through documented Discord APIs,
  create one private text channel and one private voice channel for a test
  match. Record required bot permissions and errors.
- **`DCS-2A — targeted-invite admission`:** first test Discord's documented
  target-user invite list with role assignment, short expiry, and use limit.
  Admit the two non-friend participants and grant only match-room access. Prove
  that an unlisted user cannot accept, and record every human consent step.
- **`DCS-2B — ordinary-invite fallback`:** only if `DCS-2A` is unavailable or
  fails for a supported reason, test an ordinary short-lived/use-limited invite
  and record its targeting/manual-role gap. Do not treat it as equivalent to a
  targeted invite.
- **`DCS-3 — matched-user access`:** prove both participants can see the roster/
  instructions, exchange a harmless test message, and join/leave the voice
  channel. Do not record or monitor audio.
- **`DCS-4 — isolation and failure`:** prove the ordinary outsider account
  cannot discover, read, post to, or join either channel. Exercise an expired/
  exhausted invite and one denied or revoked access state.
- **`DCS-5 — lifecycle and cleanup`:** revoke match access and delete the
  temporary channels through the bot. Confirm participants lose access while
  unrelated server state remains intact. Record whether server membership
  persists because membership cleanup is a separate product choice.
- **`DCS-3B` (conditional):** repeat admission with user-consented
  `guilds.join` OAuth when needed to compare onboarding with invite admission.

A pass establishes technical room lifecycle in the tested server. It does not
approve Discord as QGuard's product backbone, broad message access, presence
tracking, voice recording, or provider-side deletion guarantees.

## Phase 4 - Steam And Current CS2 Alternatives

- **`STM-CHAT-1 — non-friend group chat`:** through visible Steam UI, have a
  human create/save a group chat and its official invite link. If the current
  UI requires an existing friend to seed creation, use a separate consenting
  seed account; A and B must remain nonfriends. Deliver the link outside Steam;
  test non-friend web/client admission, mutual text, voice-channel join/leave,
  re-entry, member visibility, invitation revocation, and cleanup. Record the
  seed requirement and every lifecycle action that remains manual.
- **`CS2-OBS-1 — current low-cost observations`:** in current CS2 UI, inspect
  whether an ordinary lobby exposes an official copyable link/code or a Nearby/
  Public Lobby route usable by the exact non-friend account. Do not derive a
  link from a private lobby identifier or reactivate Looking to Play.
- **`CS2-GROUP-1 — Community Group bridge`:** only after exact external-target
  approval, use public self-join or restricted request/approval for two non-
  friends in the deliberately scoped Community Group. Test whether the host can
  select the group for an ordinary Premier/Competitive lobby and whether the
  other member can discover and join it. Repeat three times and reverse roles;
  record discovery delay and unintended visibility to other group members.

Looking to Play remains rejected by `DEC-019` and is not part of this program.
Steam group chat, Community Group membership, and CS2 party membership remain
three different pass/fail objects.

## Phase 5 - Conditional Discord Group DM Checks

Do not run these if `DCS-1` through `DCS-5` pass and Direct Messages placement
is not required:

- **`DGD-1`:** a human creates a Group DM invite link and a non-friend accepts
  it, followed by text/call join/leave and link-expiry/capacity observations.
- **`DGD-2`:** only after a specific credential/data-flow review, test Discord's
  documented `gdm.join` application-created Group DM with consenting accounts.
  Record the ten-active-room limit, lack of bot membership, token handling, and
  cleanup behavior.

These cases cannot silently become the default merely because they work; the
documented endpoint's deprecated-GameBridge origin and platform limits remain
product risks.

## Stop Conditions

Stop the affected case before:

- using an unconsented account, exposing a credential/token/lobby secret, or
  collecting unrelated personal data;
- scripting or automating Valorant, Riot Client, Steam, or CS2 through an
  undocumented interface, simulated input, memory/packet inspection, or a bot;
- entering matchmaking merely to prove party assembly;
- recording voice, transcribing speech, or reading unrelated messages;
- creating a persistent Steam Community Group without exact target approval
  and acknowledgment of its lifecycle;
- weakening “ordinary party” to a custom match or dedicated server;
- treating VPN behavior as legal approval or official regional availability;
  or
- changing an account's region/shard or another hard-to-reverse state.

Record a valid negative or `not-testable` result rather than altering the target
to obtain a pass.

## Completion Evidence And Decision Return

The program is complete only when it contains:

- the cases run, skipped, conditional, invalid, and not-testable;
- the frozen variable matrix and redacted attempt-level evidence;
- pass/fail classifications and cleanup evidence;
- a mechanism matrix separating coordination, link delivery, and actual game-
  party entry;
- prerequisites, friction, regional behavior, automation level, privacy/data
  exposure, provider-support strength, failure recovery, and residual risk;
- effects on `DEC-018`, `OQ-005`, `OQ-009`, `OQ-010`, `OQ-011`, and the deferred
  register; and
- a recommendation returned to the owner without recording a product selection
  until the owner deliberately approves it.

No single successful test selects Discord, QGuard-native coordination,
Valorant, or CS2. The owner makes the product decision after the cross-case
comparison.

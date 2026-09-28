# QGuard Party-Entry Behavioral Validation Packet

- **Record type:** approved future behavioral-test packet
- **Status:** approved test scope; execution paused under the
  [2026-09-28 owner hold](../governance/deferred-work.md#owner-hold--discord-access--2026-09-28);
  existing account/client and evidence/cleanup prerequisites remain required
- **Test owner:** unassigned
- **Decision owner:** project owner
- **Authority:** `DEC-016`, `DEC-018`, and `DEC-020` through `DEC-024`
- **Created:** 2026-09-06
- **Date sensitivity:** high; recheck sources and clients immediately before
  execution
- **Implementation authority:** none
- **Update trigger:** available test environment, provider/client change,
  changed party-entry requirement, or completed test
- **Resource and order companion:**
  [coordination test resources and sequence](coordination-test-resources-and-sequence.md)

## Purpose

Determine which current official, human-mediated paths actually let matched
users who are not formal friends enter the same ordinary Valorant or CS2 party.
Keep the official Valorant host-copied lobby link separate from Discord's
generic Game Invite/Join surface and from Riot's direct in-client invitation of
formal Discord friends.

This packet authorizes the bounded validation scope approved by the owner. It
does not supply accounts, credentials, current clients, consent from another
participant, or permission to broaden the test into client automation,
scraping, reverse engineering, voice capture, or live matchmaking.

The cross-option parent program is the
[coordination and party-entry validation program](coordination-and-party-entry-validation-program.md).
This packet owns the detailed Riot/Valorant and generic Discord party-entry
procedure. Discord room lifecycle, Steam group chat, current CS2 alternative
observations, and the gated Community Group bridge are defined in the parent
program so communication and game-party evidence remain separate.

## Evidence Baseline

Current source URLs, access dates, and claim limits are indexed in the
[game API source ledger](../research/game-api-source-ledger.md). The 2026-09-07
rollout and roadmap recheck is in
[Discord party-entry current state and roadmap](../research/discord-party-entry-current-and-roadmap.md).

### Verified Current Facts

- After Riot/Discord account linking, Riot says a PC user can copy a Valorant
  lobby link and share it with a Discord server or elsewhere.
- Riot and Valorant sources now describe the League/Valorant integration as
  shipped during 2026, subject to region support; it is not merely a future
  Valorant feature.
- Riot separately documents inviting formal Discord friends directly from the
  Valorant social panel. That action is not the copied-link mechanism, and
  shared-server/channel membership is not formal Discord friendship.
- Riot's integrated friend list requires Riot IDs, formal Discord friendship,
  and linked Riot/Discord accounts. That list is not the intended QGuard path.
- Riot's troubleshooting says a recipient who cannot see the join option may
  need updated clients and may need to link Riot and Discord. The minimum
  recipient-linking prerequisite is not stated precisely enough for QGuard to
  assume it.
- Discord's generic Game Invite documentation says a Play button, channel
  invite, profile Join, or Ask to Join appears only when the particular game
  implements the feature and the player is in a joinable state.
- No current first-party game-specific source reviewed confirms Discord Game
  Invite support for an ordinary CS2 party.
- Riot says its Discord-powered features are available only where both Riot and
  Discord are supported. Discord and Riot both identify VPNs as possible
  connection confounders; Discord voice requires a VPN with UDP support.

### Owner-Approved Conditional Flow

QGuard designates one matched Valorant participant as host. The host manually
creates the ordinary party in Valorant, obtains the official Riot lobby link,
and posts it in a Discord text channel visible only to the matched players,
as approved for the link alternative under `DEC-024`. The remaining matched
participants deliberately click the link. QGuard does not automate or control
the Valorant client, party, link creation, or acceptance. Game-specific Discord
Join is the preferred candidate if verified, and joining remains replaceable.
The neutral relay below still measures delivery dependence; it is not the
selected product fallback. Live tests remain paused; operational details remain
under `OQ-011`.

The rule for choosing the host remains open. “Lucky user” records a human host
role, not approval of random selection, eligibility weighting, or sanctions for
declining.

## Test Matrix

| ID | Game/mechanism | Relationship condition | Question | Product consequence |
|---|---|---|---|---|
| VAL-LINK-1 | Valorant official host-copied lobby link | Host and recipient are neither Riot friends nor formal Discord friends; both can access the same controlled private relay | Can the recipient click the posted official link and enter the host's ordinary party? | Required before reliance under `DEC-018` |
| VAL-LINK-2 | Valorant official link, recipient-linking variation | Same relationship state; recipient's Riot/Discord link state differs from the passing baseline | Must every recipient link Riot and Discord, or only the host? | Determines onboarding prerequisite and fallback copy |
| VAL-LINK-3N / VAL-LINK-3D | Valorant official link, delivery-surface variation | Same accounts and party state; neutral relay runs before server membership, then Discord text runs later | Is Discord merely the host's account-link prerequisite, or also required for recipient delivery/acceptance? | Determines whether a QGuard-native room can carry the link |
| VAL-LINK-4 | Valorant official link, Discord runtime variation | Account-link and relationship state remain fixed; Discord is connected versus fully closed separately for host generation and recipient acceptance | Must Discord be running/reachable when the host creates or the recipient opens the link? | Distinguishes account-link history from a live Discord runtime dependency |
| VAL-DIRECT-1 | Riot's direct Discord-friend invite from Valorant | Shared test server but no formal Discord friendship | Does any direct in-client invite action expose the non-friend recipient? | Control case; documented friend route is not assumed to work for matched strangers |
| VAL-GI-1 | Discord generic Game Invite with Valorant | No formal Discord friendship and no Riot friendship | Does Discord expose Play/Join/Ask to Join, and can the recipient enter the ordinary party? | Optional lower-friction route; does not replace `VAL-LINK-1` |
| CS2-GI-1 | Discord generic Game Invite with CS2 | No formal Discord or Steam friendship | Does Discord expose Play/Join/Ask to Join, and can the recipient enter an ordinary non-Premier Competitive party? | Could reopen CS2 party-entry comparison if repeatable and supportable |
| VAL-NET-1 | Valorant/Discord feature under the owner's Turkish test constraint | Discord/browser use a VPN while Riot remains on the home-region path when split tunneling is available | Is the feature visible and usable without routing Valorant through the VPN? | Validates the local test setup only; does not prove official Turkish support |

Two accounts and two concurrent PCs are enough to validate the entry mechanism.
Use distinct Riot and Discord identities for each participant, keep A/B
nonfriends, link the host first, and preserve an unlinked recipient state for
the first attempt when safely available. A later specification may require a
full-team capacity/recovery test. For an ordinary five-player Valorant team,
the intended final shape is one host plus four joiners.

## Controlled Variables

Record without including credentials or unnecessary identifying data:

- date, client versions/build identifiers, operating system, and region;
- network condition: no VPN, split tunnel, or full tunnel; endpoint country;
- game, ordinary party/mode type, host party privacy, free party slot, and
  whether matchmaking has started;
- whether each account has linked Riot and Discord;
- whether the accounts are Riot friends, Discord friends, Steam friends, and
  members of the same test server;
- activity-status and registered-game settings used for generic Discord Game
  Invite checks;
- which surface produced the action: Riot lobby-link copy, Discord chat-bar
  Play invite, profile Join, or profile Ask to Join; and
- first attempt, repeat attempt, prompts/errors, final party membership, and
  cleanup result.

Do not change multiple relationship/linking variables in one comparison. A
failure caused by outdated clients, full party, wrong region, non-joinable
party state, or disabled activity sharing is an invalid setup until corrected,
not proof that the capability is absent.

## Procedure A - Valorant Official Lobby Link

1. Recheck the current Riot/Discord feature page and applicable policy.
2. Use two consenting current PC test accounts. Confirm that they are neither
   Riot friends nor formal Discord friends. Run the neutral-relay cases before
   they join the test Discord server; later server membership is a separate
   controlled state.
3. Link the host's Riot and Discord accounts through the official consent flow
   if not already linked. Record but do not expose the recipient's starting
   link state.
4. The human host creates an ordinary Valorant party with an open slot and uses
   the official client/integration control to copy its lobby link.
5. First transmit fresh links through a neutral private non-Discord relay that
   approximates QGuard's future host-link field (`VAL-LINK-3N`). After the
   neutral cases and Discord-server admission, run a separate fresh-link
   attempt through the private Discord channel (`VAL-LINK-3D`). QGuard may
   later relay or pin this host-supplied text, but it does not generate the Riot
   link.
6. The recipient clicks the link and follows only official Riot/Discord/client
   prompts. Record whether client update, Riot/Discord linking, authentication,
   or another prerequisite is requested.
7. Confirm party membership inside Valorant without adding either account as a
   friend. Leave the party and repeat with a newly created party/link.
8. Inspect the direct Riot/Discord friend-invite control without creating a
   formal Discord friendship. Record absence or presence; do not add friendship
   merely to make the control pass.
9. If the first case passes, repeat once with the recipient's Riot/Discord link
   state changed only if that state can be changed safely and reversibly.
10. Restore the passing account-link baseline. Compare host link generation with
    Discord connected and with Discord fully closed. Then compare recipient
    acceptance from the neutral relay with Discord connected and fully closed,
    using a fresh party/link where necessary. Change only one runtime condition
    at a time.

### Network Condition For The Turkey-Based Test

When a VPN is needed to reach Discord, prefer split tunneling: send Discord and
the browser used for account authorization through the VPN, while keeping Riot
Client and Valorant on the ordinary home-region route. If split tunneling is
not available, a full-tunnel observation may use a nearby endpoint while
keeping the account/shard unchanged. Stop after party membership is proven; do
not enter matchmaking. A VPN failure is a network/setup result, not proof that
the lobby-link mechanism is absent.

### Pass Rule

`VAL-LINK-1` passes only if the non-friend recipient joins the intended ordinary
Valorant party through the official host-copied link on two clean attempts,
without Riot or Discord friend addition and without unauthorized automation.

`VAL-LINK-2` records the minimum recipient account-linking requirement. A prompt
requiring official account linking is not a failure of the link, but it becomes
a material QGuard onboarding dependency that requires owner review.

`VAL-LINK-3N` passes only if the same official link type works when carried by a
private non-Discord relay. `VAL-LINK-3D` records the later Discord-text
comparison. A neutral pass proves delivery-surface independence for the tested
client state, not that the host can obtain the feature without a linked Discord
account or that Riot officially supports it in Turkey.

`VAL-LINK-4` records host and recipient runtime requirements separately. A
closed-Discord pass does not remove the documented account-linking prerequisite;
it only shows that the tested action does not require a live Discord client or
reachable Discord session at that step.

## Procedure B - Generic Discord Game Invites

Run separately for Valorant and CS2 so one game's behavior cannot prove the
other's:

1. Recheck Discord's current Game Invite documentation and any current game-
   specific first-party material.
2. Confirm two consenting non-friend test users can see one another through the
   private test server but are not formal Discord friends; for the relevant
   game, also confirm they are not Riot or Steam friends.
3. Launch the current game and create an ordinary joinable party with an open
   slot. Enable only the documented Discord activity/registered-game settings
   needed for the check.
4. Inspect whether Discord exposes the chat-bar Play action, a game invite in
   the private text channel, or profile Join/Ask to Join.
5. If an action exists, send/accept it through the documented UI and verify
   actual membership in the ordinary game party. Do not count game launch,
   overlay display, activity status, a custom/private match, or dedicated-
   server connection as party-entry success.
6. Repeat with a fresh party. Record an absent action, explicit unsupported
   message, failed join, friend requirement, or successful ordinary-party join.

### Pass Rule

A game-specific check passes only if Discord exposes its documented Game Invite
or Join/Ask-to-Join action and the non-friend recipient enters the correct
ordinary party twice without adding the host as a friend. A pass is current
behavioral evidence; it does not by itself establish a durable public provider
contract when game-specific first-party documentation remains absent.

## Failure And Recovery Classification

- **Setup invalid:** outdated client, unavailable region, wrong mode, full or
  non-joinable party, disabled documented setting, or accidental friendship.
- **Supported prerequisite discovered:** official linking, update, login, or
  consent is required and succeeds; record it as a product dependency.
- **Mechanism failure:** the correct official action is present but cannot join
  the ordinary party after setup issues are excluded.
- **Feature not exposed:** no Play/Join/Ask-to-Join action appears for the game
  in a valid joinable state.
- **Wrong target:** action launches the game or enters a server/custom match but
  does not join the host's ordinary party.
- **Pass:** the exact pass rule succeeds twice.

After a failure, preserve observations and return to the owner. Do not add
friendship, substitute an undocumented client API, or weaken “ordinary party”
to obtain a pass.

## Privacy, Security, And Evidence Limits

- Use dedicated consenting test participants or owner-controlled test accounts.
- Do not record login credentials, tokens, full account identifiers, private
  messages, the full lobby URL/join secret, ordinary voice, or unrelated
  server/member data.
- Store only the minimum redacted screenshots/notes needed to show the action,
  relationship conditions, and party result. Decide their location and
  retention before execution.
- Do not record or monitor voice. A test voice channel may be checked for
  ordinary join/leave behavior only in a separately scoped coordination test.
- Do not run scripts, bots, macros, packet inspection, memory reading, or
  unofficial client calls against Valorant, Riot, Steam, or CS2.
- Treat the lobby URL as a short-lived bearer secret: do not store its full
  value in screenshots, logs, analytics, error reporting, or project records.
- Remove created test invitations/channels and reverse temporary account-link
  changes only through a pre-agreed cleanup sequence.

## Completion Evidence

A completed execution report must contain:

- the exact test IDs run and the source/client recheck date;
- redacted controlled-variable matrix and relationship proof;
- attempt-by-attempt result and final party-membership evidence;
- pass/fail/invalid classification with observed prompts or errors;
- cleanup result, unrun cases, limitations, and recheck triggers;
- effect on `DEC-018`, `OQ-009`, `OQ-010`, `DEF-001`, and `DEF-002`; and
- owner disposition before a specification relies on a newly observed route.

## Invalidation Triggers

- Riot/Discord, Discord Game Invite, Valorant, Steam, or CS2 client/integration
  changes;
- region/platform or ordinary-party behavior changes;
- a new or removed friendship, account-linking, privacy, or consent
  prerequisite; or
- new first-party game-specific documentation that confirms or contradicts the
  observed behavior.

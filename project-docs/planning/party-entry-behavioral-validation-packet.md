# QGuard Party-Entry Behavioral Validation Packet

- **Record type:** approved future behavioral-test packet
- **Status:** queued; owner approved the test scope, but no specific consenting
  test accounts/current client session was supplied for this task
- **Test owner:** unassigned
- **Decision owner:** project owner
- **Authority:** `DEC-016`, `DEC-018`, `DEC-020`, and `DEC-021`
- **Created:** 2026-09-06
- **Date sensitivity:** high; recheck sources and clients immediately before
  execution
- **Implementation authority:** none
- **Update trigger:** available test environment, provider/client change,
  changed party-entry requirement, or completed test

## Purpose

Determine which current official, human-mediated paths actually let matched
users who are not formal friends enter the same ordinary Valorant or CS2 party.
Keep the official Valorant host-copied lobby link separate from Discord's
generic Game Invite/Join surface.

This packet authorizes the bounded validation scope approved by the owner. It
does not supply accounts, credentials, current clients, consent from another
participant, or permission to broaden the test into client automation,
scraping, reverse engineering, voice capture, or live matchmaking.

## Evidence Baseline

Current source URLs, access dates, and claim limits are indexed in the
[game API source ledger](../research/game-api-source-ledger.md).

### Verified Current Facts

- After Riot/Discord account linking, Riot says a PC user can copy a Valorant
  lobby link and share it with a Discord server or elsewhere.
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

### Owner-Approved Conditional Flow

QGuard designates one matched Valorant participant as host. The host manually
creates the ordinary party in Valorant, obtains the official Riot lobby link,
and posts it in QGuard's private per-match Discord text channel. The remaining
matched participants deliberately click the link. QGuard does not automate or
control the Valorant client, party, link creation, or acceptance.

The rule for choosing the host remains open. “Lucky user” records a human host
role, not approval of random selection, eligibility weighting, or sanctions for
declining.

## Test Matrix

| ID | Game/mechanism | Relationship condition | Question | Product consequence |
|---|---|---|---|---|
| VAL-LINK-1 | Valorant official host-copied lobby link | Host and recipient are neither Riot friends nor formal Discord friends; both can view the same private Discord test channel | Can the recipient click the posted official link and enter the host's ordinary party? | Required before reliance under `DEC-018` |
| VAL-LINK-2 | Valorant official link, recipient-linking variation | Same relationship state; recipient's Riot/Discord link state differs from the passing baseline | Must every recipient link Riot and Discord, or only the host? | Determines onboarding prerequisite and fallback copy |
| VAL-GI-1 | Discord generic Game Invite with Valorant | No formal Discord friendship and no Riot friendship | Does Discord expose Play/Join/Ask to Join, and can the recipient enter the ordinary party? | Optional lower-friction route; does not replace `VAL-LINK-1` |
| CS2-GI-1 | Discord generic Game Invite with CS2 | No formal Discord or Steam friendship | Does Discord expose Play/Join/Ask to Join, and can the recipient enter an ordinary CS2 Premier/Competitive party? | Could reopen CS2 party-entry comparison if repeatable and supportable |

Two accounts are enough to validate the entry mechanism. A later specification
may require a full-team capacity/recovery test. For an ordinary five-player
Valorant team, the intended final shape is one host plus four joiners.

## Controlled Variables

Record without including credentials or unnecessary identifying data:

- date, client versions/build identifiers, operating system, and region;
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
2. Use two consenting current PC test accounts in a supported region. Confirm
   that they are neither Riot friends nor formal Discord friends. They may both
   be members of the same consented private Discord test server because that
   approximates the proposed production relationship without selecting the
   production backbone.
3. Link the host's Riot and Discord accounts through the official consent flow
   if not already linked. Record but do not expose the recipient's starting
   link state.
4. The human host creates an ordinary Valorant party with an open slot and uses
   the official client/integration control to copy its lobby link.
5. The host manually posts the link in the private test text channel. QGuard
   may later relay or pin this host-supplied text, but it does not generate the
   Riot link.
6. The recipient clicks the link and follows only official Riot/Discord/client
   prompts. Record whether client update, Riot/Discord linking, authentication,
   or another prerequisite is requested.
7. Confirm party membership inside Valorant without adding either account as a
   friend. Leave the party and repeat with a newly created party/link.
8. If the first case passes, repeat once with the recipient's Riot/Discord link
   state changed only if that state can be changed safely and reversibly.

### Pass Rule

`VAL-LINK-1` passes only if the non-friend recipient joins the intended ordinary
Valorant party through the official host-copied link on two clean attempts,
without Riot or Discord friend addition and without unauthorized automation.

`VAL-LINK-2` records the minimum recipient account-linking requirement. A prompt
requiring official account linking is not a failure of the link, but it becomes
a material QGuard onboarding dependency that requires owner review.

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

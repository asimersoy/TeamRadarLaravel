# TeamRadar Deferred Work

Status: active 2026-09-06

The legacy backlog, post-MVP roadmap, rejected approaches, and unfinished
implementation are historical evidence, not commitments for the rewrite.

Work may enter this register only after the owner approves it and intentionally
postpones it with a return condition.

## DEF-001 - Verify Valorant Non-Friend Lobby-Link Acceptance

- **Status:** approved and deferred; required before Valorant-link reliance;
  packet complete, execution awaits specific consenting test accounts/current
  clients and an agreed minimal evidence/cleanup setup
- **Decision owner:** project owner
- **Execution owner:** unassigned
- **Locked decision:** `DEC-018` selects Valorant and requires a scoped
  two-account test before a product specification or implementation may depend
  on non-friend joining through the official lobby link. `DEC-021` approves the
  designated-human-host flow and the future validation scope.
- **Objective:** prove that a current recipient who is neither the host's Riot
  friend nor formal Discord friend can join the host's intended ordinary
  Valorant party by clicking the official host-copied link, and distinguish
  link delivery through Discord from delivery through a neutral QGuard-like
  surface.
- **Reason postponed:** the Discord comparison reinforces Valorant as the only
  current candidate with an evidenced host-copied ordinary-party link, but that
  evidence does not prove the exact non-friend case. No specific consenting
  test accounts/current PC client session or agreed redacted evidence and
  cleanup setup was supplied for this task. No live account/client action
  occurred.
- **Dependencies:** approved test packet; current PC clients; two accounts with
  the required non-friend relationship; recorded host/recipient Riot-Discord
  link state; a Discord and neutral non-Discord relay; safe handling of any
  credentials outside project records; and fresh feature/policy recheck. If
  Discord access requires a VPN in the test location, record split/full-tunnel
  mode and endpoint country as confounding variables rather than treating VPN
  operation as product approval.
- **Implementation state:** no experiment or client action performed.
- **Return condition:** activate before approving an integration specification
  or implementation slice that treats the lobby link as dependable, or earlier
  through a separately scoped owner instruction.
- **Verification required:** record client/build date, region, mode,
  relationship/account-link state, delivery surface, VPN state, link creation/
  opening/acceptance behavior, party result, repeat result, observed failure
  states, and any provider or privacy limitation without recording credentials,
  full IP addresses, the reusable lobby secret, or unnecessary personal data.
- **Owner recheck:** required if the test fails, the feature materially changes,
  or the proposed flow would substitute friend invites, another integration,
  or another game. The CS2/Steam/Discord research does not cancel this deferred
  commitment unless the owner explicitly supersedes `DEC-018` and decides its
  disposition.
- **Invalidation:** Riot feature, client, region, account-linking, privacy, or
  policy changes may invalidate a prior pass and require a fresh test.
- **Execution packet:**
  [party-entry behavioral validation packet](../planning/party-entry-behavioral-validation-packet.md)

## DEF-002 - Verify Generic Discord Game Invites For Valorant And CS2

- **Status:** approved and deferred; optional current-client comparison; packet
  complete, execution awaits specific consenting test accounts/current clients
  and an agreed minimal evidence/cleanup setup
- **Decision owner:** project owner
- **Execution owner:** unassigned
- **Locked decision:** `DEC-021` approves checking Discord's generic Play,
  Game Invite, profile Join, and Ask-to-Join surfaces for both Valorant and CS2
  during future party-entry validation.
- **Objective:** determine whether either current game exposes a Discord-native
  action that lets a non-friend recipient enter the host's ordinary party, and
  distinguish that action from Valorant's separate host-copied Riot lobby link.
- **Reason postponed:** no specific consenting test accounts/current client
  session or agreed redacted evidence and cleanup setup was supplied for this
  task. No current game-specific first-party source establishes the CS2 result,
  and no live account/client action occurred.
- **Dependencies:** current Discord and game clients; two consenting accounts
  per tested relationship; non-friend conditions; an ordinary joinable party;
  source/policy recheck; safe credential handling outside project records; and
  the approved execution packet.
- **Implementation state:** no experiment or client action performed.
- **Return condition:** activate alongside `DEF-001` when the test environment
  is available, or earlier through a scoped owner instruction. Valorant's
  generic case is an optional friction comparison; CS2's case may determine
  whether its party-entry assessment should reopen.
- **Verification required:** record the game/client/version, relationship and
  joinable-party state, exact Discord surface, two attempts, ordinary-party
  result, errors, and cleanup without credentials or unnecessary personal data.
- **Owner recheck:** required before a product specification relies on a pass,
  especially when game-specific first-party documentation remains absent.
- **Invalidation:** Discord, Riot/Valorant, Valve/Steam/CS2, activity,
  friendship, party, region, or client changes may invalidate an observation.
- **Execution packet:**
  [party-entry behavioral validation packet](../planning/party-entry-behavioral-validation-packet.md)

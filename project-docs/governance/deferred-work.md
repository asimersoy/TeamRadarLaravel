# TeamRadar Deferred Work

Status: active 2026-09-07

The legacy backlog, post-MVP roadmap, rejected approaches, and unfinished
implementation are historical evidence, not commitments for the rewrite.

Work may enter this register only after the owner approves it and intentionally
postpones it with a return condition.

## DEF-001 - Verify Valorant Non-Friend Lobby-Link Acceptance

- **Status:** approved and activated within the combined validation program;
  execution awaits specific consenting test accounts/current clients and an
  agreed minimal evidence/cleanup setup
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
  surface. Also distinguish prior account linking from a live Discord runtime
  requirement during host generation and recipient acceptance.
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
- **Readiness order:** use the two-PC Wave 1 allocation in the
  [resource and sequence plan](../planning/coordination-test-resources-and-sequence.md):
  run the neutral relay before Discord-server membership, start with host linked
  and recipient unlinked when safely available, and preserve all nonfriend
  relationships through the required cases.
- **Implementation state:** no experiment or client action performed.
- **Return condition:** begin live execution when the combined program's
  readiness inputs are available. Complete it before approving an integration
  specification or implementation slice that treats the lobby link as
  dependable.
- **Verification required:** record client/build date, region, mode,
  relationship/account-link state, delivery surface, VPN state, link creation/
  opening/acceptance behavior, party result, repeat result, observed failure
  states, and any provider or privacy limitation without recording credentials,
  full IP addresses, the reusable lobby secret, or unnecessary personal data.
  Run `VAL-LINK-4` with account-link state fixed and Discord connected versus
  fully closed separately for the host and recipient.
- **Owner recheck:** required if the test fails, the feature materially changes,
  or the proposed flow would substitute friend invites, another integration,
  or another game. The CS2/Steam/Discord research does not cancel this deferred
  commitment unless the owner explicitly supersedes `DEC-018` and decides its
  disposition.
- **Invalidation:** Riot feature, client, region, account-linking, privacy, or
  policy changes may invalidate a prior pass and require a fresh test.
- **Execution packet:**
  [party-entry behavioral validation packet](../planning/party-entry-behavioral-validation-packet.md)
  and [combined validation program](../planning/coordination-and-party-entry-validation-program.md)

## DEF-002 - Verify Generic Discord Game Invites For Valorant And CS2

- **Status:** approved and activated within the combined validation program;
  execution awaits specific consenting test accounts/current clients and an
  agreed minimal evidence/cleanup setup
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
- **Readiness order:** reuse participant bundles A/B only after the neutral
  Valorant-link wave. For CS2, begin with a non-Premier Competitive party; Prime
  and profile level 10 are needed only if a later test specifically requires
  Premier.
- **Implementation state:** no experiment or client action performed.
- **Return condition:** begin live execution alongside `DEF-001` when the test
  environment is available. Valorant's generic case is a friction comparison;
  CS2's case may determine whether its party-entry assessment should reopen.
- **Verification required:** record the game/client/version, relationship and
  joinable-party state, exact Discord surface, two attempts, ordinary-party
  result, errors, and cleanup without credentials or unnecessary personal data.
- **Owner recheck:** required before a product specification relies on a pass,
  especially when game-specific first-party documentation remains absent.
- **Invalidation:** Discord, Riot/Valorant, Valve/Steam/CS2, activity,
  friendship, party, region, or client changes may invalidate an observation.
- **Execution packet:**
  [party-entry behavioral validation packet](../planning/party-entry-behavioral-validation-packet.md)
  and [combined validation program](../planning/coordination-and-party-entry-validation-program.md)

## DEF-003 - Verify Discord Private Match-Room Lifecycle

- **Status:** approved and activated; execution awaits a human-owned test
  server, test application/bot, consenting accounts, exact permissions,
  evidence location, and cleanup owner
- **Decision owner:** project owner
- **Execution owner:** unassigned
- **Locked decision:** `DEC-023` requires the deliberately parked Discord/
  private-room backbone candidate to be tested before `OQ-011` is decided.
- **Objective:** prove through supported Discord interfaces that QGuard can
  create private per-match text and voice channels, admit matched non-friends,
  isolate them from an ordinary nonparticipant, exercise permission/invite
  failure states, and revoke access/delete the temporary rooms without changing
  unrelated server state.
- **Reason postponed:** the documented interface research is complete, but no
  exact test server, bot/application, consenting participant/outsider accounts,
  credential handling, evidence location, or cleanup owner is available in the
  current repository task. No live Discord action has occurred.
- **Dependencies:** current Discord source recheck; human-owned disposable or
  approved test server; minimally permissioned bot; two ordinary participant
  accounts, an ordinary non-admin outsider, and a separate owner/admin account;
  targeted-user/role-bearing invite first, ordinary constrained invite only as
  fallback, optional `guilds.join` OAuth only if needed; VPN/UDP state where
  relevant; and the combined execution program.
- **Implementation state:** no application, bot, channel, invitation, OAuth
  grant, role, message, voice connection, permission, or deletion performed.
- **Return condition:** activate live execution when the readiness inputs are
  named. A valid result is required before `OQ-011` selects Discord as primary
  or required coordination.
- **Verification required:** `DCS-1` through `DCS-5`, including targeted-user
  and role-bearing admission (`DCS-2A`), ordinary-invite fallback only when
  needed (`DCS-2B`), matched access, outsider isolation, expired/revoked states,
  join/leave without recording, cleanup, unrelated-state preservation, and
  exact permission/error evidence. Owner/admin access is not isolation proof
  because it bypasses channel overwrites.
- **Owner recheck:** required if Discord needs broader permissions/data than
  planned, channel deletion cannot provide the intended lifecycle, a VPN becomes
  a product dependency, or the test would introduce message surveillance or
  voice capture.
- **Invalidation:** Discord API, permissions, invite/OAuth, server-data access,
  channel, voice, VPN, or provider-policy changes.
- **Execution packet:**
  [combined validation program](../planning/coordination-and-party-entry-validation-program.md)

## DEF-004 - Verify Steam Non-Friend Group-Chat Coordination

- **Status:** approved and activated; execution awaits current clients,
  consenting non-friend accounts, evidence location, and cleanup owner
- **Decision owner:** project owner
- **Execution owner:** unassigned
- **Locked decision:** `DEC-023` retrieves the earlier Steam coordination test
  so the Discord/no-Discord comparison is evidence-backed.
- **Objective:** determine whether a human-created Steam group-chat invitation
  admits a non-friend through the intended web/client paths and supplies usable
  text and voice coordination, and identify every manual, persistent, privacy,
  permission, revocation, and cleanup limitation.
- **Reason postponed:** the first-party capability is documented but the exact
  non-friend case and current lifecycle have not been behaviorally verified.
  No live Steam account, chat, link, message, or voice action has occurred.
- **Dependencies:** current Steam source/client recheck; two consenting accounts
  that are not friends and share no starting chat/group; an optional separate
  consenting Steam friend to seed chat creation if the current UI requires one;
  safe invite-link handling; benign test message; voice join/leave without
  recording; evidence location; and cleanup owner.
- **Implementation state:** no test performed.
- **Return condition:** run with the combined program before the owner closes
  the cross-option coordination comparison.
- **Verification required:** `STM-CHAT-1`, including seed prerequisites,
  external link delivery, web/client admission, text visibility, voice join/
  leave, re-entry, member visibility, invite revocation, and cleanup.
- **Owner recheck:** required if the flow depends on persistent shared identity/
  membership or cannot provide acceptable access isolation and cleanup.
- **Invalidation:** Steam Chat UI, invitation, friendship, membership, voice,
  or provider-policy changes.
- **Execution packet:**
  [combined validation program](../planning/coordination-and-party-entry-validation-program.md)
  and [resource and sequence plan](../planning/coordination-test-resources-and-sequence.md)

## DEF-005 - Verify Current CS2 Friendship-Free Alternative Paths

- **Status:** observational checks approved and activated; Community Group test
  awaits an exact external target and separate approval for any new persistent
  group creation
- **Decision owner:** project owner
- **Execution owner:** unassigned
- **Locked decision:** `DEC-023` retrieves current CS2 alternative checks before
  the owner decides the game/coordination direction. `DEC-019` continues to
  reject Looking to Play.
- **Objective:** inspect current CS2 for an official ordinary-lobby link/code or
  Nearby/Public Lobby path, and determine whether the historical Steam
  Community Group-to-ordinary-party bridge still works for non-friends.
- **Reason postponed:** current clients/accounts are not available in this task.
  The group bridge is documented only for historical CS:GO behavior, and a new
  Steam Community Group is persistent and not ordinarily operator-deletable.
- **Dependencies:** current CS2/Steam source and client recheck; two consenting
  non-friend accounts; ordinary party with the relevant Prime/mode state;
  evidence location and cleanup owner; and, for `CS2-GROUP-1`, an exact existing
  test group or separate owner approval to create the named persistent group.
- **Implementation state:** no client observation, party, group membership, or
  external group change performed.
- **Return condition:** run `CS2-OBS-1` with the combined program; run
  `CS2-GROUP-1` only after its persistent external target is approved.
- **Verification required:** visible official controls only; for the group
  bridge, three attempts plus reversed roles, ordinary-party membership,
  discovery delay, unrelated-member exposure, failure/recovery, and cleanup.
- **Owner recheck:** required before creating a group, accepting persistent
  membership/unintended discovery, or relying on a result lacking current
  first-party game-specific documentation.
- **Invalidation:** CS2/Steam client, lobby UI, group membership/discovery,
  Prime/mode, region, or provider-policy changes.
- **Execution packet:**
  [combined validation program](../planning/coordination-and-party-entry-validation-program.md)

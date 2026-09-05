# TeamRadar Deferred Work

Status: active 2026-09-05

The legacy backlog, post-MVP roadmap, rejected approaches, and unfinished
implementation are historical evidence, not commitments for the rewrite.

Work may enter this register only after the owner approves it and intentionally
postpones it with a return condition.

## DEF-001 - Verify Valorant Non-Friend Lobby-Link Acceptance

- **Status:** deferred; required before reliance
- **Decision owner:** project owner
- **Execution owner:** unassigned
- **Locked decision:** `DEC-018` selects Valorant and requires a scoped
  two-account test before a product specification or implementation may depend
  on non-friend joining through the official lobby link.
- **Objective:** prove that a current recipient who is neither the host's Riot
  friend nor formal Discord friend can join the host's intended ordinary
  Valorant party by clicking the official host-copied link.
- **Reason postponed:** the exact PC region, ordinary mode, two suitable
  accounts/clients, test environment, credential handling, and authorization
  have not been selected. No live account/client action is authorized by the
  documentation decision.
- **Dependencies:** approved test packet; supported current PC clients and
  region; two accounts with the required non-friend relationship; safe handling
  of any credentials outside project records; and fresh feature/policy recheck.
- **Implementation state:** no experiment or client action performed.
- **Return condition:** activate before approving an integration specification
  or implementation slice that treats the lobby link as dependable, or earlier
  through a separately scoped owner instruction.
- **Verification required:** record client/build date, region, mode,
  relationship state, link creation/transmission/acceptance behavior, party
  result, repeat result, observed failure states, and any provider or privacy
  limitation without recording credentials or unnecessary personal data.
- **Owner recheck:** required if the test fails, the feature materially changes,
  or the proposed flow would substitute friend invites, another integration,
  or another game.
- **Invalidation:** Riot feature, client, region, account-linking, privacy, or
  policy changes may invalidate a prior pass and require a fresh test.

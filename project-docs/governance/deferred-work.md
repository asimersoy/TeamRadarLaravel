# TeamRadar Deferred Work

Status: updated 2026-10-03; Discord-dependent execution on owner hold;
future honor consideration preserved without feature-adoption approval;
first-pass retention review scheduled for pass two under `DEF-012`

**2026-10-27:** `DEC-063` activates session-history/rating design from the
relevant part of `DEF-010` and replaces `DEF-011`'s ten-minute feedback expiry.
Friend discovery, unrelated session polish and real integrations remain deferred.
Follow the [next-pass plan](../planning/product-design-pass.md) before implementation.

The legacy backlog, post-MVP roadmap, rejected approaches, and unfinished
implementation are historical evidence, not commitments for the rewrite.

Work may enter this register only after the owner approves it and intentionally
postpones it with a return condition.
`DEF-006` records the approved exclusion/preservation and future reconsideration
boundary, not approval to implement either future feature.

## Owner Hold — Discord Access — 2026-09-28

- **Decision owner and authority:** project owner, explicit instruction to put
  the tests on hold until they can get the test working.
- **Scope:** pause `DEF-001` through `DEF-003`, including the prepared Valorant
  copied-link wave whose host setup involves Riot/Discord linking. Preserve
  the approved cases, account preparation, test order, and acceptance criteria.
- **Reason / evidence class:** the owner reports that Discord is currently
  inaccessible for testing in Turkey because of the restriction and expects
  access to reopen. That expectation is owner-reported context, not a verified
  reopening announcement, date, or legal finding. No date is assumed.
- **Implementation state:** research and test planning are complete; no live
  test has run. This is a pause, not a failed or permanently untestable result.
- **Return condition:** the owner confirms that Discord access is workable for
  the test and asks to resume. Then recheck current provider/client behavior
  and the existing account, relationship/link-state, environment, evidence,
  and cleanup prerequisites before running the first unverified case.
- **Owner recheck:** required if changed availability or feature behavior calls
  for a different test flow, game, dependency, or product decision. A reopening
  announcement alone does not self-activate the test plan.
- **Current boundaries:** `DEC-018` and applicable live-evidence gates remain
  in force. The subsequent `DEC-024` selects Discord room/voice planning and
  replaceable joining without lifting this hold; `OQ-011` is partly resolved.
  No friend-based fallback, VPN workaround or actual joining implementation
  is authorized. Surrounding implementation remains specification-gated.
  `DEF-004` and `DEF-005` are not cancelled, but this instruction does not start
  them or reroute work into them. No monitoring or scheduled retry is requested.
- **Safe work:** under `DEC-024`, surrounding specifications may proceed, and
  approved provider-independent slices may later be implemented, without
  presuming a tested integration or lifting this live-test hold.
- **Resume packet:**
  [resource and sequence plan](../planning/coordination-test-resources-and-sequence.md)

## DEF-001 - Verify Valorant Non-Friend Lobby-Link Acceptance

- **Status:** approved scope; execution paused by the 2026-09-28 owner hold above
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
- **Return condition:** owner resumes after workable Discord access, followed
  by the combined program's readiness checks. Complete it before approving an
  integration specification or implementation slice that treats the lobby link
  as dependable.
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

- **Status:** approved scope; execution paused by the 2026-09-28 owner hold above
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
- **Return condition:** owner resumes after workable Discord access, followed
  by readiness checks alongside `DEF-001`. Valorant's generic case is a friction
  comparison; CS2's case may determine whether its party-entry assessment should
  reopen.
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

- **Status:** approved scope; execution paused by the 2026-09-28 owner hold above
- **Decision owner:** project owner
- **Execution owner:** unassigned
- **Locked decision:** `DEC-023` requires the deliberately parked Discord/
  private-room behavior to be tested. `DEC-024` now selects its planning
  direction ahead of those tests, but does not establish working behavior.
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
- **Return condition:** owner resumes after workable Discord access, followed
  by the named readiness checks. A valid result is required before the product
  relies on the real room's operational behavior; the planning direction is
  already selected by `DEC-024`.
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

## DEF-006 - Reconsider Future Honor Ideas On Owner Request

- **Status:** current exclusion and preservation approved; future feature
  adoption/implementation unapproved, no scheduled or active work
- **Decision owner:** project owner
- **Execution owner:** unassigned; no future implementation assignment
- **Locked decision:** `DEC-034` excludes both ideas from the current
  implementation scope. The approved action is preserving them for possible
  future discussion, not promising either will be built.
- **Objective:** retain incoming-rating volatility/adaptive dampening and the
  less-developed outgoing-reviewer-deviation accountability idea together in
  [future honor ideas](../specs/product-foundations.md#future-honor-ideas---outside-current-implementation).
- **Reason postponed:** the owner considers the existing honor systems
  sufficient for current scope and does not want volatility calculation now.
  The reviewer idea's detection and consequence directions remain undecided.
- **Implementation state:** documentation only; neither indicator, metric,
  data collection nor scoring consequence implemented or selected.
- **Return condition:** owner explicitly reopens one or both for future
  consideration. First resolve whether adoption is warranted; implementation
  then requires its approved specification and evidence-backed acceptance.
  Completion of the current scope is not an automatic trigger.
- **Owner recheck:** required for adoption, detection/consequence direction,
  ranking/matching effects, risk or data/retention changes. Existing startup
  delegation and current no-exact-history direction do not preapprove a future
  feature's method or raw history.
- **Future verification needed:** evaluate usefulness, independent evidence,
  retaliation/brigading, legitimate minority feedback, feedback loops, correction/
  appeal and any data needs; volatility would also need response/matching-stability
  tests. These are future adoption conditions, not current slice blockers.
- **Invalidation:** later changes to feedback format, eligibility, reference,
  honor updates, data contracts or matching may change feasibility and value.

## DEF-007 - Return To Real Discord Integration After Availability And Tests

- **Status:** explicit current implementation exclusion; later slice unapproved
- **Decision owner:** project owner
- **Execution owner:** unassigned until the owner resumes the relevant tests
- **Locked decision:** `DEC-035` selects queueing with/without Discord voice
  and delays actual Discord integration beyond this implementation.
- **Reason postponed:** owner cannot yet run the relevant tests and wants the
  Discord Join and Riot lobby-link availability/behavior established first.
  This is an owner prerequisite, not a fresh verified feature-release claim.
- **Implementation state:** no Discord adapter, bot/server mutation or live
  party handoff implemented. Existing tests and their owner hold are preserved.
- **Return condition:** owner resumption, current provider/client recheck,
  applicable behavioral results and approval of the later coordination slice.
  Current development completion alone cannot activate this work.
- **Owner recheck:** future admission, attendance/recovery, privileged access,
  lifecycle/cleanup, data and real integration dependencies before execution.
  Voice recording remains unapproved, not part of this deferral.
- **Verification required:** applicable cases in the
  [combined validation program](../planning/coordination-and-party-entry-validation-program.md).
  Mocking coordination cannot establish a live pass.
- **Invalidation:** provider features/policy, network availability, game or
  user-flow changes; do not assume dated research remains current.

## DEF-008 - Plan Stronger Protection Against False No-Show Removal Later

- **Status:** owner-approved later planning; concrete safeguards unselected
- **Decision owner:** project owner
- **Execution owner:** unassigned
- **Locked decision:** `DEC-039` preserves the first-version no-show challenge
  direction while explicitly postponing stronger false-accusation/collusion
  checks. `DEC-043` settles basic voting (all other teammates) and stopping
  removal with an I joined acknowledgment; dishonest responses remain a risk.
- **Reason postponed:** owner requests the simpler initial flow and recognizes
  that players could falsely claim a joined teammate is absent.
- **Implementation state:** documentation only, no protection or removal code.
- **Return condition:** owner reopens later abuse/recovery planning; review
  this known risk before real-user release. No production safety claim follows
  from approving the development direction.
- **Owner recheck:** actual evidence, safeguards and consequences before
  adopting them; no automatic honor penalty or ban selected.
- **Verification needed:** false accusations, colluding partial parties,
  honest delayed users, dishonest acknowledgment, disputed joining and recovery
  tests for chosen policies. Future Discord presence is not automatically
  equivalent to verified in-game participation.

## DEF-009 - Plan Moderation Penalties And Correction Policies In A Later Version

- **Status:** owner-approved deferral; specific later policies unapproved
- **Decision owner:** project owner
- **Execution owner:** unassigned
- **Locked decision:** `DEC-040` selects a basic human report inbox now,
  without admin punishment tools. Automatic penalties and sanction/restriction,
  correction and appeal policy are later planning/polish.
- **Current exception / not deferred:** two distinct reports automatically
  invalidate the target's outgoing ratings for that match before human review,
  with an admin tag (`DEC-041`). For the next pass, `DEC-065` limits its score
  effect to inputs not yet applied; later reports do not retrospectively undo
  honor. Owner calls the exclusion an eligibility consequence, not a penalty.
  Do not defer or silently broaden it.
- **Implementation state:** first-pass human inbox and automatic outgoing-rating
  eligibility consequences are implemented and verified locally. Penalties,
  corrections and appeals remain unimplemented and unapproved.
- **Return condition:** owner initiates later moderation planning and approves
  concrete policies/specifications before implementation. Current completion
  is not authorization to choose penalties or operator powers.
- **Verification needed:** notice, review, evidence, correction/appeal and
  abuse tests appropriate to the eventual policy; reassess before release.

## DEF-010 - Plan Past-Teammate History And Friend Discovery Later

- **Status:** partially activated by `DEC-063` for participant session history
  and required rating pages; friend discovery from history remains deferred
- **Decision owner:** project owner
- **Execution owner:** unassigned
- **Locked decision:** `DEC-037` includes basic friends/invitations and partial
  parties now, but postpones past-teammate history UI and sending friend
  requests from that history to a later plan.
- **Reason postponed:** the core session loop can use basic friendships without
  adding this discovery/history surface now.
- **Latest direction:** `DEC-063` selects history/list/detail access to one's
  sessions and mandatory completion of eligible ratings there. This is current
  next-pass scope, not merely a future idea. Exact retention/deletion policy
  remains part of `DEF-012`; no public/lifetime history promise is inferred.
- **Implementation state:** new history/rating requirements recorded; no new
  screen implemented. The prior first pass and its session records remain.
- **Return condition:** owner starts the later social-history plan; specify
  privacy/access, storage purpose and acceptance before implementation.
- **Owner recheck:** no hidden permanent feedback ledger or lifetime session
  history may be inferred from the basic friendship feature.

## DEF-011 - Polish Participant-Declared Session End And Feedback Settlement Later

- **Status:** feedback-expiry portion superseded by `DEC-063`; other session-end
  polish remains deferred unless required by the revised contract
- **Decision owner:** project owner
- **Execution owner:** unassigned until the owner starts a later pass
- **Current decision:** participant Session ended and multiple games per session
  remain. `DEC-063` removes the ten-minute expiry, adds history-based completion
  and immutable sent ratings. `DEC-065` resolves `OQ-013` with immediate eligible
  input application and no retrospective correction. Later reports cannot undo
  already-applied effects; do not preserve the old deadline or whole-session
  settlement as an unchangeable requirement.
- **Reason postponed:** owner wants a simple first version and does not yet
  choose a more automated or refined completion/feedback system.
- **Implementation state:** the approved first-pass session/settlement code and
  deadline, missing-input, retry/concurrency tests cover the earlier version.
  They do not verify `DEC-063`; later unrelated polish remains deferred and no
  real game-end observation was added.
- **Return condition:** owner first-build review or a later polish plan;
  reassess the known risks before real-user release. No automatic activation
  or approval of a particular future detector/provider integration.
- **Risks retained:** premature/malicious end declarations, mismatched end
  times while teammates continue playing, long/multiple-game sessions,
  nonresponse and late feedback/reports. Stronger no-show involvement evidence
  remains alongside this under `DEF-008`, not a current Discord implementation.
- **Verification needed:** initial implementation must still test deadline,
  all-complete early closure, return/nonresponse, pending report invalidation,
  duplicate submissions and no double honor/reference application. Future
  improvements need their own approved contract and abuse/failure evidence.

## DEF-012 - Review Actual Data Retention Immediately After The First Implementation

- **Status:** owner-approved second-pass review; final retention policy unselected
- **Decision owner:** project owner
- **Preparation owner:** implementation agent
- **Locked decision:** `DEC-047` keeps records stored by approved first-pass
  features without automatic expiry, including ordinary and reported sessions.
  Data-cleared admins retain full project-context access under `DEC-045`.
- **Reason postponed:** the owner wants to see what the implemented system
  actually stores before deciding which details should survive and for how long.
- **Implementation state:** the local first pass now has 30 PostgreSQL tables and
  synthetic fixtures. Business evidence survives settlement; runtime slots and
  caches have their documented lifecycle. No business purge is implemented.
  [Actual fields, readers, copies and backup inventory](../operations/first-build-data-inventory.md)
  is ready for the required immediate owner review. The isolated restore passed;
  this does not approve real-user collection or a final retention policy.
- **Return condition:** immediately after the first implementation is fleshed
  out, at the second-pass review. Prepare a concrete inventory of fields,
  records, purposes, sources, readers, storage, logs and backups where present.
  Existing review gates still apply before real-user collection or release.
- **Owner review:** select what to retain, restrict, expire or delete; ordinary
  versus reported-session evidence; account closure/deletion and correction;
  retention periods, holds and backup/restore behavior as relevant. Do not
  automatically adopt the earlier report-only or short-retention proposals.
- **Verification required:** demonstrate authorized admin access and ordinary-
  user isolation; verify that settlement does not silently discard evidence.
  Later expiry/deletion changes need explicit scope, tests, recovery assessment
  and any controlled-operation authorization before execution.
- **Invalidation:** new collected data, provider terms or a planned real-user
  environment may require earlier review of the affected boundary.

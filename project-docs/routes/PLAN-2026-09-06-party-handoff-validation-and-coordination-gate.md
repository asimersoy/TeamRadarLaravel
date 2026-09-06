# Task Route: PLAN-2026-09-06 Party Handoff Validation And Coordination Gate

- **Objective:** clarify the official Valorant lobby-link flow, record the
  owner's designated-human-host direction, define the approved future
  Valorant/CS2 client checks, and preserve the Discord-server coordination
  backbone as a separate critical owner gate
- **Status:** documentation and validation packet complete; critical owner
  coordination decision remains open; behavioral execution deferred
- **Continued by:**
  [RESEARCH-2026-09-06 Discord dependency and restricted-region boundary](RESEARCH-2026-09-06-discord-dependency-and-restricted-region-boundary.md),
  which separates the link-delivery surface from Discord game-invite behavior
  and reframes `OQ-011`
- **Planning owner:** primary Codex agent
- **Decision owner:** project owner
- **Started:** 2026-09-06
- **Completed:** 2026-09-06
- **Baseline:** clean `new-development` at
  `9481e00ccdbac6db5f8346fbfbc5b57b58241fd8`

## Routed Procedures

- The task clarifies a material user journey and prepares a critical product
  decision: yes ->
  `../../portable-project-workflow-system/docs/procedures/product-planning.md`
- Riot/Valorant and Discord capability and policy statements are current,
  source-sensitive facts: yes ->
  `../../portable-project-workflow-system/docs/procedures/research-sourcing-and-search.md`
- Party-entry feasibility affects the first-game and coordination
  recommendation: yes ->
  `../../portable-project-workflow-system/docs/procedures/decision-and-recommendation-safety.md`
- Discord/Riot identity links, account relationships, OAuth, server membership,
  and test observations can involve personal data: yes ->
  `../../portable-project-workflow-system/docs/procedures/privacy-data-and-legal.md`
- The coordination backbone is owner-gated and later concrete data/provider
  behavior may need qualified review: yes ->
  `../../portable-project-workflow-system/docs/procedures/external-review.md`
- Existing decisions, findings, questions, and deferrals must be reconciled:
  yes ->
  `../../portable-project-workflow-system/docs/procedures/audit-and-reconciliation.md`
- The future client checks compare current behaviors to support later product
  reliance: yes ->
  `../../portable-project-workflow-system/docs/procedures/experiments.md`
- Approved tests cannot execute without suitable accounts/clients and remain
  intentionally postponed: yes ->
  `../../portable-project-workflow-system/docs/procedures/deferral-and-owner-review.md`
- Code/configuration, delegation, public content, rendered design, migration,
  deployment, live account/client/server/bot action, destructive action, and
  remote Git action: no

## Source Clarification

- Riot and Discord document a PC feature through which a user who has linked
  Riot and Discord can copy a party/lobby link and put it in a Discord server,
  DM, or elsewhere.
- Those sources describe an official human-facing feature. They do not state
  that QGuard is forbidden to display or relay a link deliberately supplied by
  the host.
- No reviewed public Riot interface lets QGuard itself manufacture that link,
  create the ordinary Valorant party, or join a participant. This is an
  interface/evidence boundary, not a claim that Riot's terms prohibit the
  proposed human flow.
- Riot's terms separately prohibit unauthorized third-party programs and
  automation that interact with Riot Services. The recorded flow avoids that
  path: the user controls the Valorant client and official link action; QGuard
  manages only its own Discord coordination surface and the host-supplied text.

## Owner Direction Recorded

- A designated matched participant may act as the Valorant host.
- That human creates the ordinary Valorant party, obtains the official lobby
  link through the supported Riot/Discord feature, and posts it in the private
  per-match Discord text channel.
- The remaining matched participants click the link and join. For a normal
  five-player Valorant party this means one host and four joiners; no six-player
  requirement is inferred from conversational wording.
- QGuard does not need to create the Riot party or lobby link for this direction
  to be acceptable.
- If the persistent-server/private-channel model works, the owner does not need
  a Discord Group DM. The final selection of that server model remains a
  deliberately separate critical decision rather than an inference from this
  conditional preference.
- The owner approved eventual behavioral checks of the Valorant lobby-link flow
  and Discord's generic Game Invite surfaces for both Valorant and CS2.

The later continuation does not erase this record of the owner's then-proposed
Discord delivery flow. It clarifies that the official Riot link may instead be
submitted through a QGuard-native private match surface and that direct Discord
friend invites and generic Discord Join actions are distinct mechanisms.

## Boundaries And Stop Conditions

- Record the approved flow and exact validation cases without inventing a host-
  selection algorithm, region, mode, account, credential, or implementation.
- Keep QGuard Discord OAuth, Riot/Discord account linking, Discord formal
  friendship, Riot friendship, and shared-server membership as separate facts.
- Do not equate a Discord activity status, overlay, or visible game with a
  working party invite.
- Do not equate one successful current-client observation with a permanent
  documented provider contract.
- Stop before using an account or credential, opening a game client, changing
  friendship/link status, creating a server/bot/channel/invite, joining a
  party, or collecting message/voice content. Those actions require an
  available test environment and must follow the validation packet.
- Do not record the coordination backbone as selected until the owner answers
  the critical decision with deliberate approval.

## Outcome

- The owner's designated-human-host flow is recorded in `DEC-021` as a
  conditional product direction and not as a claim of behavioral proof.
- `DEF-001` now points to the concrete Valorant lobby-link cases.
- `DEF-002` separately queues current-client Discord Game Invite checks for
  Valorant and CS2. These checks are optional optimization/candidate evidence;
  they do not replace `DEF-001`.
- The exact hypotheses, variables, procedure, pass/fail rules, evidence limits,
  and invalidation triggers are in the
  [party-entry behavioral validation packet](../planning/party-entry-behavioral-validation-packet.md).
- The critical backbone question is isolated as `OQ-011`: whether one human-
  owned QGuard Discord server with bot-created private per-match text and voice
  channels becomes the preferred coordination design, without authorizing
  voice recording.

## Remaining Gates

- The owner must deliberately resolve `OQ-011`; this route does not answer it.
- The tests cannot execute in this task because no specific consenting test
  accounts/current client session or redacted evidence/cleanup setup was
  supplied. Credentials and identifying account details must not enter project
  records.
- A passing Valorant link test is required before specifications rely on the
  link. A passing generic Game Invite observation still requires a stability
  and provider-support assessment before reliance.
- Discord admission, membership persistence, access cleanup, failure behavior,
  and data minimization follow only after a positive coordination-backbone
  decision.
- Voice recording, message surveillance, transcripts, moderation evidence, and
  provider applications remain outside this route.

## Verification

- All relative links across 46 project Markdown files resolved and `git diff
  --check` passed. Every changed path was confined to `project-docs/`; the
  portable workflow package and legacy application remained unchanged.
- No application test, live behavioral test, or portable-system validator was
  run because this unit changes project records and validation plans only.
- No account, client, credential, relationship, server, bot, channel, invite,
  OAuth grant, party, message, voice, provider contact, automation, or personal-
  data collection action occurred.
- **Commit boundary:** one coherent additive documentation/validation-planning
  commit after verification; no push.

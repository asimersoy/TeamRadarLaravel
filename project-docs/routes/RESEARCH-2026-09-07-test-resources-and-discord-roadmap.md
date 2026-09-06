# Task Route: RESEARCH-2026-09-07 Test Resources And Discord Roadmap

- **Objective:** split every approved coordination/party-entry test into exact
  resource and relationship requirements, maximize safe account/device reuse,
  select the first execution wave, and research shipped/upcoming Discord party-
  join capabilities for Valorant and CS2
- **Status:** research and execution-readiness planning complete; Wave 1 awaits
  owner confirmation of the named environment
- **Research owner:** primary Codex agent
- **Decision owner:** project owner
- **Started:** 2026-09-07
- **Completed:** 2026-09-07
- **Baseline:** clean `new-development` at
  `7b053af209ab944929352555a66f2dc65ac25b84`

## Routed Procedures

- Product dependency order, reversible sequencing, and decision/completion
  criteria: yes ->
  `../../portable-project-workflow-system/docs/procedures/product-planning.md`
- Date-sensitive provider, release, capability, and roadmap claims: yes ->
  `../../portable-project-workflow-system/docs/procedures/research-sourcing-and-search.md`
- Cross-game recommendation and bounded negative-evidence safety: yes ->
  `../../portable-project-workflow-system/docs/procedures/decision-and-recommendation-safety.md`
- Account relationships, provider linking, Discord identifiers, messages,
  voice, VPN state, and evidence handling: yes ->
  `../../portable-project-workflow-system/docs/procedures/privacy-data-and-legal.md`
- Later product selection and sensitive-flow review remain owner/qualified-
  reviewer gated: yes ->
  `../../portable-project-workflow-system/docs/procedures/external-review.md`
- Existing tests, decisions, open questions, and deferrals must be reconciled:
  yes ->
  `../../portable-project-workflow-system/docs/procedures/audit-and-reconciliation.md`
- The task defines comparable live-client experiments and controls: yes ->
  `../../portable-project-workflow-system/docs/procedures/experiments.md`
- The earlier test program resumes at resource readiness: yes ->
  `../../portable-project-workflow-system/docs/procedures/interruption-and-recovery.md`
- `DEF-001` through `DEF-005` remain active until valid execution evidence:
  yes ->
  `../../portable-project-workflow-system/docs/procedures/deferral-and-owner-review.md`
- Application implementation, delegation, public publication, deployment,
  provider contact, credentialed live testing, destructive action, and remote
  Git action: no

## Evidence Method

- Used current first-party Riot, Valorant, League, Discord, Valve, Steam, and
  Counter-Strike documentation, support material, release notes, announcements,
  and developer references.
- Kept shipped behavior, limited experiments, publisher-controlled integration,
  bounded negative findings, test-design inferences, and owner decisions
  separate.
- Preserved the exact difference among Riot's copied lobby link, Riot's direct
  formal-Discord-friend invitation, Discord's generic Game Invite/Join, a
  Discord coordination room, a Steam saved group chat, and a CS2 server join.
- Recorded the internal claim/source ledger outside Git at
  `/Users/asime/Github/TeamRadarLaravel/scratch/discord-party-testing-2026-09-07/report-source.md`;
  the durable cited findings and execution plan are tracked under
  `project-docs/`.

## Findings That Change Test Preparation

- Valorant's Riot/Discord integration already shipped in 2026; the live test
  checks current nonfriend and link/runtime behavior rather than waiting for a
  future Valorant rollout.
- The two primary Valorant participants must not be Riot or formal Discord
  friends. Start with the host linked and recipient unlinked if safely possible,
  because changing the recipient link later produces the clean comparison.
- A rigorous Discord server-room test needs four human Discord identities:
  two ordinary participants, one ordinary outsider, and a separate owner/admin.
  The owner/admin cannot double as a restricted subject because it bypasses
  channel overwrites.
- Discord's current targeted-user and role-bearing invite API adds a preferred
  admission case before a broad invite or OAuth `guilds.join` fallback.
- Two free CS2 accounts can test an ordinary non-Premier Competitive party;
  Prime/profile-level prerequisites apply only if a later test requires Premier.
- No current first-party source found establishes Discord entry into an
  ordinary CS2 party. The current-client check remains valid bounded evidence,
  while Discord's CS2 server-IP flow remains the wrong target.
- Discord LFG Channels are the most relevant announced direction, but are a
  limited, non-requestable experiment with only ARC Raiders named. No official
  Valorant/CS2 availability or date was found.
- Discord opened its web Connection Entrypoint URL to any developer in August
  2026. It could simplify a future QGuard↔Discord identity link, but it does not
  link Riot/Steam accounts or create a game-party handoff.

## Output

- [Discord-assisted party-entry current state and roadmap](../research/discord-party-entry-current-and-roadmap.md)
- [Coordination test resources and sequence](../planning/coordination-test-resources-and-sequence.md)
- Updated combined validation program, party-entry packet, source ledger,
  deferred records, current state, and project index

## Boundaries

- No credential, token, full user identifier, lobby secret, private message,
  voice content, or full IP address was collected or recorded.
- No account, friendship, connection, client, VPN, bot, server, channel, role,
  invitation, OAuth grant, chat, voice session, Steam group, or game party was
  created or changed.
- No unofficial client automation, matchmaking, persistent Steam Community
  Group, recording, or product implementation was authorized or performed.
- The research package informs test readiness; it does not decide `OQ-011` or
  approve Discord, Valorant, CS2, Steam chat, or any architecture.

## Completion Evidence

- Every active and conditional test has a named device/account/relationship/
  external-object/network prerequisite and a pass/exit condition.
- The overlap plan states the minimum clean reusable identity topology and the
  exact conditions that must remain uncontaminated.
- Wave 1 is selected as the smallest decision-critical start and reduced to a
  concrete owner preparation checklist.
- Material current and future-facing findings are cited to first-party sources;
  negative CS2 and roadmap findings are bounded rather than absolute.
- Repository verification resolved every relative link across 52 project
  Markdown files, passed `git diff --check`, reran the portable workflow
  validator successfully, and found no changed path under the protected
  portable workflow package or legacy application.
- **Commit boundary:** one coherent local documentation/research commit; no
  push, history rewrite, provider action, or deployment.

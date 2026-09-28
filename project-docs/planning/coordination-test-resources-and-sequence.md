# QGuard Coordination Test Resources And Sequence

- **Record type:** execution-readiness and resource plan
- **Status:** Wave 1 and Discord-dependent tests on
  [owner hold](../governance/deferred-work.md#owner-hold--discord-access--2026-09-28);
  preparation retained for resumption; no live test has started
- **Planning owner:** primary Codex agent
- **Decision owner:** project owner
- **Authority:** `DEC-016`, `DEC-018` through `DEC-024`
- **Serves:** `DEF-001` through `DEF-005` and `OQ-011`
- **Created:** 2026-09-07
- **Last updated:** 2026-09-28
- **Implementation authority:** test-only; no product implementation
- **Source companion:**
  [Discord party-entry current state and roadmap](../research/discord-party-entry-current-and-roadmap.md)
- **Execution parent:**
  [coordination and party-entry validation program](coordination-and-party-entry-validation-program.md)

## Owner Preparation After Resumption

No provisioning or workaround is requested during the hold. After the owner
confirms workable Discord test access and resumes, recheck the current
requirements below and prepare only **Wave 1** first:

- two PCs able to run the current Riot Client and Valorant concurrently;
- two consenting Riot/Valorant accounts, `Riot-A` and `Riot-B`, that are not
  Riot friends;
- two distinct consenting Discord accounts, `Discord-A` and `Discord-B`, that
  are not formal Discord friends;
- `Riot-A` linked to `Discord-A` through the official connection flow;
- preferably leave `Riot-B` and `Discord-B` unlinked at the start so the test
  can observe whether the recipient is prompted to link before changing that
  state;
- current Discord on both PCs, even though the first neutral-relay attempt will
  also test with Discord closed;
- a VPN that can reach Discord from the Turkish test location; split tunneling
  is preferred so Discord/browser traffic can use the VPN while Riot Client and
  Valorant retain their normal home-region route; and
- a private neutral non-Discord relay controlled by the owner and tester, such
  as a temporary private note/message surface, that can carry the short-lived
  lobby link without retaining it.

Do not add the accounts as friends to make setup easier. Do not link the second
Riot/Discord pair before its unlinked state is recorded. No Discord server,
bot, Steam account, third Discord control account, or CS2 installation is
needed for the first wave.

### Owner Account Preparation — 2026-09-28

- **Owner's stated plan:** use the owner's existing account for A; create a
  new email address and use it to register separate Riot and Discord accounts
  for B. Account creation, tutorial completion, region, and link state have not
  yet been confirmed. No email address or account identifier is recorded.
- **Preparation:** complete B's mandatory Valorant Basic Training and reach
  the normal Play/lobby screen. Riot documents the follow-on Bot Training
  Match as optional. Record any additional requirement the current client
  actually presents.
- **Test scope:** use an ordinary party with a non-Competitive mode selected.
  This test ends at party membership; account level 20, ranked placements,
  and ranked matches are not preparation requirements. A pass does not prove
  Competitive queue eligibility.
- **Relationship controls:** keep A and B as nonfriends on Riot and Discord.
  Leave B's Riot and Discord accounts unlinked until the unlinked-recipient
  attempt. Reusing an email across the two services does not perform Riot's
  explicit account-connection flow. The host uses its own Riot/Discord pair.
- **Region preparation:** register and first launch Riot/Valorant through the
  normal local connection where possible, and verify A and B have compatible
  shards before testing. A foreign VPN route during first use can affect shard
  assignment. Discord access can be prepared separately.

Sources checked on 2026-09-28; primary agent owns this preparation guidance:

| Publisher and source | Supports | Limit |
|---|---|---|
| Riot, [VALORANT Patch Notes 9.02](https://playvalorant.com/en-us/news/game-updates/valorant-patch-notes-902/) | PC tutorial is mandatory; Bot Training Match is optional | Published 2024-07-30; documentation, not an observation of B's current client |
| Riot Support, [Competitive Mode FAQ](https://support.riotgames.com/en-us/valorant/gameplay/valorant-competitive-mode-faq) | New accounts need level 20 for Competitive access | Does not establish the copied-link recipient requirements |
| Riot, [Discord account linking](https://www.riotgames.com/en/riot-games-discord-account-linking) | Account connection requires an explicit linking flow | Does not prove nonfriend acceptance or B's current link state |
| Riot Support, [Welcome to VALORANT](https://support.riotgames.com/en-us/valorant/gameplay/welcome-to-valorant/) | Initial location/shard relationship and VPN caution | A/B shard compatibility still needs verification |

**Follow-up route:** account-readiness clarification under `DEF-001`;
research/sourcing, privacy/data, and interruption/recovery procedures apply.
Baseline: clean `new-development` at `50d5af1`. Existing test scope and pass
criteria remain in force. Verification covers cited sources, local links,
`git diff --check`, and the scoped diff before one local documentation commit.
No live account, client, remote task, or provider state was changed in this
follow-up; execution and the remaining readiness checks are pending.

## Resource Topology

Two gaming PCs are enough for every game-party test. The complete, rigorous
suite needs the following identities; credentials remain with the owner and
must not be put in Git, chat, screenshots, or test logs.

| Role | Provider identities | Runtime | Required state | Reuse |
|---|---|---|---|---|
| Participant/host A | `Riot-A`, `Discord-A`, `Steam-A` | PC-A | Non-friend of B on all three providers; `Riot-A` linked to `Discord-A` for Valorant link generation | Host for the first attempt; swap with B only where the case requires role reversal |
| Participant/recipient B | `Riot-B`, `Discord-B`, `Steam-B` | PC-B | Non-friend of A on all three providers; begin with `Riot-B`↔`Discord-B` unlinked if possible | Recipient for initial attempts; later link once if required |
| Discord outsider C | `Discord-C` only | phone, browser profile, or other concurrent Discord session | Ordinary member of the test server; no administrator permission and no match-room role/overwrite | Isolation and denied-access control only |
| Discord owner/admin D | `Discord-D` only | browser/phone or bot-management session | Owns or administers the exact test server; not a measured participant or outsider | Creates/authorizes the bot and test objects |
| Discord test application | one bot/application identity | documented API or approved bot harness | Minimum permissions for invites, roles, channels, messages, and cleanup | Discord-room lifecycle only |
| Optional Steam seed E | `Steam-E` | no concurrent game client required | Existing friend of `Steam-A`, if current Steam UI requires a friend to seed a saved group chat | Steam chat creation only; not the non-friend admission subject |

`Discord-D` must be separate from A, B, and C for a clean isolation result.
Discord grants the server owner all permissions, and `ADMINISTRATOR` bypasses
channel overwrites. An owner/administrator therefore cannot prove that an
ordinary matched participant is correctly restricted, and cannot serve as the
outsider control.

The practical maximum is two gaming PCs plus two lightweight concurrent
Discord sessions for C and D. The latter can be phones or separate browser
profiles; they do not need Valorant, Steam, or CS2.

## Relationship And Linking Freeze

Record these states before any test and again after each deliberate change:

| Relationship/state | Required initial value | Why |
|---|---|---|
| `Riot-A` ↔ `Riot-B` | not friends | Core Valorant stranger case |
| `Discord-A` ↔ `Discord-B` | not formal friends | Separates shared-server presence from Riot's documented formal-friend integration |
| `Steam-A` ↔ `Steam-B` | not friends | Core CS2 and Steam-chat stranger case |
| `Riot-A` ↔ `Discord-A` | linked | Host prerequisite documented by Riot for the integration |
| `Riot-B` ↔ `Discord-B` | unlinked if safely available | Allows recipient-link requirement to be observed before the state is changed |
| A and B in QGuard test server | not members before `DCS-2A` | Allows admission itself to be tested; join them only after neutral Valorant-link cases |
| C in QGuard test server | ordinary member, no match role | Allows simultaneous outsider-isolation checks |
| D in QGuard test server | owner/admin | Administration only; never evidence of participant isolation |

One Discord account cannot be linked to multiple Riot IDs. Use a distinct
Discord identity for each Riot participant. If the available A/B accounts are
already friends and removing the relationship would be ambiguous or
undesirable, preserve them for positive controls and create clean test
identities for the primary non-friend cases.

## Ordered Test Waves

The order minimizes setup cost and prevents later server membership,
friendship, or account-link changes from contaminating earlier results.

### Wave 0 — Freeze And Sanity Checks

| Case | Exact check | Needs | State change | Pass/exit |
|---|---|---|---|---|
| `ENV-1` | Record redacted client versions, OS, Riot shard/region, Discord visibility, VPN mode/endpoint country, and all A↔B relationship/link states | PC-A/B; A/B identity pairs; evidence location | none | Matrix is complete without credentials, full IDs, IPs, or links |
| `ENV-2` | Each account independently creates an ordinary Valorant party with a free slot, without matchmaking | PC-A/B; Riot-A/B | temporary party only | Both clients can reach the correct ordinary party state |
| `VAL-NET-1` | Compare feature visibility with the least invasive working network path; prefer Discord/browser split tunnel and ordinary Riot route | PC-A/B; VPN where required | network routing only | Exact visible/missing controls and confounders recorded; absence is not yet a product failure |

### Wave 1 — Valorant Copied Link, No QGuard Discord Server

This is the recommended starting wave because it directly tests the currently
selected game path and uses the smallest clean resource set.

| Case | Exact variable isolated | Accounts/resources | Starting state | Evidence and pass rule |
|---|---|---|---|---|
| `VAL-LINK-1A` | First non-friend official-link acceptance | A host, B recipient, neutral relay | Riot and Discord nonfriends; A linked; B unlinked if available; Discord may be open | B enters A's ordinary party through the official host-copied link; no friend addition; no matchmaking |
| `VAL-LINK-1B` | Repeatability | same | fresh party and fresh link; same relationship/link state as 1A | Second clean success; one success alone is provisional |
| `VAL-LINK-2A` | Recipient-unlinked requirement | same | B remains unlinked | Record success or exact official prompt/failure without changing other variables |
| `VAL-LINK-2B` | Recipient-linked comparison | same | link B to its own Discord account only if 2A fails/prompts or comparison remains needed | Repeat with fresh party/link; classify a successful linked-only result as `pass-with-prerequisite` |
| `VAL-LINK-3N` | Neutral non-Discord delivery | same neutral relay | use the passing link-state baseline | Two fresh-link successes prove that Discord text is not the delivery surface required in this tested state |
| `VAL-LINK-4H` | Host's live Discord-runtime dependency | same | keep relationships and account links fixed; generate once with Discord connected and once fully closed | Record whether the official link control remains exposed/usable in each condition |
| `VAL-LINK-4R` | Recipient's live Discord-runtime dependency | same | use neutral relay; keep relationships and account links fixed; accept once with Discord connected and once fully closed | Record whether B can reach the party in each condition |

If `VAL-LINK-1A` fails because the recipient is explicitly required to link,
that is not yet a mechanism failure. Record the prerequisite, perform
`VAL-LINK-2B`, then repeat the two clean attempts. If the official copy-link
control is not visible after current-client and supported-region checks, stop
and classify the environment; do not add friendship or use unofficial client
automation.

### Wave 2 — Valorant Discord Surfaces

| Case | Exact check | Additional needs | Required state | Pass/exit |
|---|---|---|---|---|
| `VAL-LINK-3D` | Deliver a fresh Riot lobby link in a private Discord server text channel | human-owned test server; A/B admitted as ordinary members | keep A/B Discord nonfriends and Riot nonfriends | Compare acceptance with `VAL-LINK-3N`; Discord delivery itself must not change the result |
| `VAL-DIRECT-1` | Valorant's in-client “Invite by Discord” control | A/B linked to their own Discord accounts; shared test server | A/B remain nonfriends on Discord and Riot | Record whether B appears and can enter; documentation predicts shared-server membership alone will not populate the formal-friend list |
| `VAL-GI-1A` | Discord chat-bar Play/Game Invite | same; game activity sharing and registered-game setting recorded | A hosts an ordinary joinable party | Exact action must exist and B must enter A's party, not merely launch Valorant |
| `VAL-GI-1B` | Discord profile Join or Ask to Join | same | fresh ordinary party | Two total clean successes required for reliance; absence is `not-exposed` |
| `VAL-DIRECT-2` | Formal-Discord-friend positive control | same | conditional; temporarily add A/B as Discord friends only if a negative result remains ambiguous | Confirms setup for the documented friend route; relationship is removed in cleanup if pre-agreed |

Do not run the positive control before all required non-friend cases. Adding the
friend relationship earlier destroys the clean baseline.

### Wave 3 — Discord Private Match-Room Lifecycle

| Case | Exact check | Needs | Required state | Pass/exit |
|---|---|---|---|---|
| `DCS-1` | Bot creates one private match category or equivalent private text and voice pair | server D; bot; exact permissions; C already ordinary member | A/B not yet server members if admission is being tested | Created objects deny `@everyone` and allow only the match role/users; IDs stored only in the execution record as needed |
| `DCS-2A` | Targeted-user, role-bearing invite | A/B Discord user IDs supplied through the approved test harness; bot invite permissions | invite target list contains only A/B; short expiry/use limit | A/B accept; C or an unlisted control cannot; assigned role gives only match-room access |
| `DCS-2B` | Ordinary short-lived/use-limited invite fallback | same without target-user file | run only if 2A is unavailable/fails for a supported reason | Records the security and manual-role gap; not assumed equivalent to 2A |
| `DCS-3T` | Matched text access | A/B ordinary members | no admin permission | Both see roster/instructions and exchange one harmless test message |
| `DCS-3V` | Matched voice access | A/B ordinary members; UDP-capable VPN if needed | no recording or monitoring | Both join/leave; audio content is not retained or evaluated |
| `DCS-4A` | Outsider isolation | C ordinary member | C has no match role/overwrite and no admin | C cannot discover/read/post/join either room |
| `DCS-4B` | Invite failure | expired, exhausted, revoked, or unlisted-user attempt | use a disposable invite | Denial occurs without exposing unrelated server data |
| `DCS-5A` | Access revocation | A or B | revoke match role/overwrite | Revoked participant loses room access |
| `DCS-5B` | Channel cleanup | bot; exact created channel IDs | owner has approved this test cleanup | Bot deletes only the temporary channels; unrelated state remains intact; membership persistence is recorded separately |
| `DCS-3B` | OAuth `guilds.join` comparison | application OAuth configuration and explicit user consent | conditional after invite results | Run only if admission friction remains decision-material |

Targeted-user invites are the preferred first admission test because Discord's
current API can restrict acceptance to named user IDs and attach roles. This is
a current capability proposal for testing, not approval of the final Discord
topology or identity/data flow.

### Wave 4 — CS2 Ordinary-Party And Discord Surfaces

| Case | Exact check | Needs | Required state | Pass/exit |
|---|---|---|---|---|
| `CS2-OBS-1A` | Inspect ordinary lobby for an official link/code | PC-A/B; current Steam/CS2; Steam A/B nonfriends | ordinary non-Premier party, no matchmaking | Record only visible official controls; do not derive a lobby secret |
| `CS2-OBS-1B` | Inspect Nearby/Public Lobby route for exact-recipient use | same | Looking to Play remains excluded | Record discoverability, targeting limits, and actual ordinary-party membership |
| `CS2-GI-1A` | Discord chat-bar Game Invite | Discord A/B shared server, nonfriends; Steam A/B nonfriends; CS2 activity settings recorded | ordinary joinable CS2 party | A Discord action plus actual ordinary-party entry is required; server connection/game launch is not a pass |
| `CS2-GI-1B` | Discord profile Join/Ask to Join | same | fresh party | Repeat or record `not-exposed`, `mechanism-fail`, or `wrong-target` |

Free CS2 accounts are sufficient for the initial ordinary Competitive-party
test. Premier-specific testing is not needed to answer the handoff question; if
later required, both participating accounts need Prime and profile level 10.

### Wave 5 — Steam Saved Group Chat

| Case | Exact check | Needs | Required state | Pass/exit |
|---|---|---|---|---|
| `STM-CHAT-1A` | Human creates/saves the group chat and official invite link | Steam-A and, only if UI requires it, consenting Steam-E already friended with A | B is not a friend and is not in the chat | Record whether seed E is required and every manual action |
| `STM-CHAT-1B` | External non-friend admission | B; neutral relay | A/B remain Steam nonfriends | B joins by official link in web/client without friend addition |
| `STM-CHAT-1C` | Text | A/B | same chat | Both exchange one harmless test message |
| `STM-CHAT-1D` | Voice | A/B | no recording | Both join/leave the chat voice channel |
| `STM-CHAT-1E` | Re-entry and member visibility | A/B | link/state recorded | B leaves/re-enters as supported; participant visibility is documented |
| `STM-CHAT-1F` | Revocation and cleanup | chat owner; exact link/chat | cleanup responsibility agreed | Invite no longer admits; record which chat/membership objects persist and which steps are manual |

This wave can prove human-mediated non-friend coordination. It cannot by itself
meet the owner's semi-automation preference because no supported QGuard API for
chat creation/link/member/voice lifecycle has been established.

### Wave 6 — Conditional Persistent Or Legacy Alternatives

| Case | Exact check | Extra authority/resources | Condition |
|---|---|---|---|
| `CS2-GROUP-1A` | A/B join the exact approved Steam Community Group without friendship | exact existing group, or separate owner approval to create the named persistent group | do not run from general test approval |
| `CS2-GROUP-1B` | Host selects group exposure and B discovers/joins ordinary lobby | same; three attempts plus role reversal | record delay and unintended group-member visibility |
| `DGD-1` | Human-created Discord Group DM invite/text/voice | A/B plus human creator | only if server-room model fails or DM placement becomes material |
| `DGD-2` | Application-created Group DM | reviewed OAuth/token flow | only after separate data-flow review |

Looking to Play, unofficial game-client automation, custom/private matches,
voice recording, and live matchmaking are not tests in this plan.

## Resource Overlap Summary

| Resource | Waves covered | Must remain uncontaminated until |
|---|---|---|
| PC-A and PC-B | 0–2 and 4; also Steam UI in 5 | all two-client game cases finish |
| Riot-A/B | 0–2 | all Valorant nonfriend cases finish |
| Discord-A/B | 0–5 | all nonfriend cases finish; do not add friendship before optional positive control |
| Steam-A/B | 4–6 | all CS2/Steam nonfriend cases finish |
| Discord-C | 3 | outsider-isolation case finishes |
| Discord-D | 3 | Discord server cleanup finishes |
| bot/application | 3 | channel/invite cleanup evidence is complete |
| VPN | 0–5 when Discord access requires it | record its state per attempt rather than assuming it is constant |
| test Discord server | 2–3 | Discord delivery, direct/join checks, and cleanup finish |
| neutral relay | 1 and 5 | fresh Riot/Steam invite links have expired or been revoked |

With clean accounts, the reusable core is **two PCs, two Riot accounts, two
Steam accounts, and two participant Discord accounts**. The full Discord-room
proof adds **two Discord-only human control accounts** and **one bot
application**. An optional third Steam account is needed only if the current
Steam UI will not seed a saved group chat without selecting an existing friend.

### Attempt Reuse Without Confounding

One controlled action may satisfy more than one test record when every required
variable is identical; record the result under each applicable ID rather than
repeating an otherwise identical exposure:

- the first neutral, recipient-unlinked, Discord-connected Valorant attempt can
  supply `VAL-LINK-1A`, `VAL-LINK-2A`, the first `VAL-LINK-3N` attempt, and the
  connected baselines for `VAL-LINK-4H`/`VAL-LINK-4R`;
- an identical fresh-party/fresh-link repeat supplies `VAL-LINK-1B` and the
  second `VAL-LINK-3N` attempt;
- if B must link, two fresh linked-recipient attempts establish both
  `VAL-LINK-2B` and the required passing `VAL-LINK-1` baseline;
- host-Discord-closed and recipient-Discord-closed comparisons remain separate
  actions so a failure is attributable to one runtime side;
- one temporary Discord room pair can support `DCS-3T`, `DCS-3V`, `DCS-4A`,
  and `DCS-5A` before `DCS-5B` deletes it; and
- one Steam saved group chat can proceed through `STM-CHAT-1A` to `1F`, provided
  its link, membership, and permission state changes are timestamped in order.

Do not reuse an attempt when it would change two explanatory variables at once,
use a stale Riot/Steam bearer link, add friendship before a nonfriend case, or
use an administrator as evidence of ordinary access restriction.

## Information Classes

### Verified Facts

- Riot's current integration distinguishes formal Discord friends from people
  who merely share a server.
- Discord owners/administrators bypass channel permission restrictions.
- Current Discord APIs document targeted-user invite lists and role assignment.
- CS2 Premier requires Prime and profile level 10; the first ordinary-party
  handoff test can use non-Premier Competitive instead.

### Owner Decisions

- Test before choosing the coordination backbone or party-handoff dependency.
- Prefer friendship-free ordinary-party entry.
- Looking to Play is excluded.
- The Discord Group DM branch is conditional when server channels work.
- Voice recording is not approved.

### Planning Proposals

- Start with Wave 1 and preserve B's unlinked state until it is observed.
- Use targeted-user/role-bearing Discord invites before ordinary invites or
  OAuth admission.
- Use non-Premier CS2 for the initial handoff check to avoid unnecessary Prime
  and rank prerequisites.

### Assumptions To Confirm At Setup

- Both PCs can run the target clients concurrently.
- The owner can provide an ephemeral neutral relay and an evidence location.
- The VPN supports the chosen split-tunnel or recorded full-tunnel condition.
- A/B relationship states can be verified without disclosing full identifiers.

### Open Questions And Deferred Work

- Exact non-friend Valorant link acceptance and recipient-link requirements:
  `DEF-001`.
- Generic Discord Game Invite behavior for Valorant and CS2: `DEF-002`.
- Discord private-room lifecycle: `DEF-003`.
- Steam non-friend saved group chat: `DEF-004`.
- Current CS2 alternative paths and gated Community Group bridge: `DEF-005`.
- Discord room/voice planning is selected by `DEC-024`; remaining attendance,
  admission, lifecycle, regional behavior and validated handoff details:
  `OQ-011`. The preserved neutral-relay test is diagnostic, not a selected
  QGuard-native product fallback.

## Readiness Gate For Wave 1

Wave 1 is ready only after the owner confirms, without sending credentials:

1. PC-A and PC-B are available at the same time;
2. Riot-A/B are not Riot friends;
3. Discord-A/B are not formal Discord friends;
4. whether each Riot account is currently linked to its corresponding Discord
   account;
5. current Valorant, Riot Client, and Discord are installed or can be updated;
6. the VPN mode available on each PC; and
7. the private neutral relay and redacted evidence location/cleanup owner.

If existing accounts cannot satisfy items 2–4 cleanly, create only the minimum
replacement accounts needed for Wave 1. Do not prepare CS2, the Discord bot, or
the four-account Discord server topology until Wave 1 is runnable or completed.

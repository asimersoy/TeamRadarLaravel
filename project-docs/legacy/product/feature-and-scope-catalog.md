# Legacy Feature And Scope Catalog

- **Record type:** historical feature inventory
- **Status:** draft for owner review
- **Current authority:** none

The catalog separates implemented legacy behavior from intended, exploratory,
rejected, and unresolved capabilities. “Implemented” means code exists, not
that it is complete, secure, tested, or approved for reuse.

| Area | Capability | Historical state | Evidence/confidence | Rewrite status |
| --- | --- | --- | --- | --- |
| Identity | QGuard product name; TeamRadar internal/working name | owner-corrected historical interpretation | owner correction dated 2026-09-05; TeamRadar appears in docs/relay and QueueGuard in Laravel UI | QGuard approved by `DEC-009`; no filesystem/package/public rename implied |
| Marketing | Public landing page | implemented prototype | `resources/views/landing.blade.php` | no legacy public claim approved |
| Accounts | Registration/login/email flows | implemented starter scaffolding | Laravel auth views/routes/tests | evidence only |
| Accounts | Game account model | implemented prototype | `Game`, `GameAccount`, migrations, relationship | evidence only |
| Accounts | Matchmaking gate until game account exists | implemented | route middleware and setup component | evidence only |
| Accounts | Account ownership verification | not implemented | `verified_at` is set immediately | unresolved historical requirement |
| Rank | Self-declared rank | implemented in Valorant prototype; remembered Apex MVP rule | setup form/model plus memory record | future decision required |
| Rank | Reconfirm rank at queue time | remembered plan | memory only | future decision required |
| Rank | Peer challenge/report | planned | TODO and memory record | future decision required |
| Rank | Official API verification | explored, removed from remembered MVP | TODO/memory | no current dependency |
| Rank | Tracker-style third-party lookup | explored | TODO/memory | no current dependency |
| Rank | `nucleusHash` derivation from public ID | explored then remembered rejected | TODO/memory | must not be assumed viable |
| Matchmaking | Static matchmaking screen | implemented prototype | Blade view | no queue behavior verified |
| Matchmaking | Queue job/service | planned | TODO | not implemented |
| Matchmaking | Realtime queue updates | planned | TODO and static UI | not implemented |
| Matchmaking | Game/rank inputs | intended | memory plus legacy UI | exact use unresolved |
| Matchmaking | Honor/reliability signal | intended | landing/matchmaking UI plus memory | exact effect unresolved |
| Matchmaking | Region/language/mic/platform/input/role/playstyle filters | never settled | memory record | historical unknowns |
| Matchmaking | Rank-range widening over time | never settled | memory record | historical unknown |
| Matchmaking | Solo plus partial-party queues | never settled | memory record | historical unknown |
| Coordination | Private matched-team website room | remembered planned core | memory record | not implemented |
| Coordination | Host/party leader | planned but rule unresolved | memory record | not implemented |
| Coordination | Manual account exchange/invites | remembered final simplification | memory record | not implemented |
| Coordination | Lobby join code | Valorant idea | TODO | exploratory |
| Coordination | Ready state | intended | memory and UI vocabulary | not implemented |
| Apex integration | Local LiveAPI endpoint/listener | partially prototyped | `Apex-tap`, LiveAPI docs, orphan relay | direction conflict documented |
| Apex integration | Protobuf event decoding | partial proof of concept | `Apex-tap/index.mjs` and bundled proto | incomplete/buggy prototype |
| Apex integration | Event forwarding to backend | relay client prototype | orphan `gateway_http.ts`/`ui.ts` | Laravel endpoints absent |
| Apex integration | Session/group verification | planned | memory record | not implemented |
| Apex integration | Custom-match control | explored | Apex tap requests/proto/TODO | remembered dropped from pubs MVP |
| Apex integration | Automatic normal-party creation | remembered dropped | memory record | no implementation/support evidence |
| Valorant integration | Riot ID and rank entry | implemented prototype | setup UI/model | not verified |
| Valorant integration | RSO/PUUID/match history | planned after approval | TODO/memory | not implemented; current facts unverified |
| Valorant integration | Local client endpoint access | explored | TODO | unverified historical question |
| Relay | Electron desktop shell | recovered prototype | orphan relay commits | not in current tree |
| Relay | Store gateway URL/LiveAPI URL/PSK | implemented prototype | `src/main.ts`, renderer | plaintext config prototype |
| Relay | HTTP auth/ping/event transport | implemented client prototype | `gateway_http.ts` | backend absent |
| Relay | 15-second keepalive and reauth | implemented prototype | `gateway_http.ts` | incomplete reliability |
| Relay | Connection/event status UI | implemented prototype | renderer HTML/TS | prototype only |
| Relay | Buffering, IDs, ack, dedupe/idempotency | anticipated | memory record | not implemented in recovered client |
| Relay | Background operation | intended | memory/UI shape | not verified |
| Relay | Installed distribution | configured | Electron Builder config | no signed/released artifact verified |
| Trust | Post-session teammate review | core plan | landing UI/memory | not implemented |
| Trust | Honor/reputation score | core plan | UI/memory | formula absent |
| Trust | Trusted reviewers carry more weight | remembered firm rule | memory only | criteria/safety unresolved |
| Trust | Positive/negative categories | options only | memory | not settled |
| Trust | Serious-behavior reports | MVP plan | memory/TODO | not implemented |
| Trust | Manual moderation | possible MVP path | memory | ownership/process absent |
| Trust | Automatic punishments | explicitly postponed/unspecified | memory | not an old MVP requirement |
| Trust | AI/voice toxicity monitoring | post-MVP idea | overview/memory | excluded from old MVP |
| Dashboard | Authenticated shell/settings | implemented | Laravel/Livewire | largely starter content |
| Dashboard | Telemetry/stats views | planned | overview | not implemented |
| Reviews | Frontend/backend | backlog | TODO | not implemented |
| Data | Users/games/game accounts | implemented schema | migrations/models | legacy only |
| Data | PSK/presence/socket state in Redis | proposed/partial | gateway/worker/diagram | inconsistent, incomplete |
| Data | Reviews/reports/honor | conceptual | no schema found | not implemented |
| Infrastructure | Laravel/Nginx/MySQL/Redis/Vite Compose | configured | `docker-compose.yml` | gateway/worker commented out |
| Infrastructure | Node WSS gateway | partial prototype/future path | `gateway/index.mjs` | parity gaps documented |
| Infrastructure | One-server Docker start | old scope preference | TODO/memory | no current decision |
| Infrastructure | GHCR/Actions/SSH deployment | roadmap | deployment plan | not implemented as described |
| Testing | Auth/dashboard/basic page tests | implemented | 12 tracked test files, mainly starter coverage | no matching/relay tests found |
| CI | Test and lint workflows | configured attempt | `.github/workflows/` | effectiveness not verified in this audit |
| Commercial | Monetization | unresolved | memory record | no old decision |

## Scope Interpretation Rules

- A UI label is evidence of a concept, not proof of behavior.
- A TODO item is a proposal, not approval or completion.
- A configured service is not a running or deployed service.
- A memory-described “final” rule is historical evidence with the confidence
  shown in the source ledger; it is not a new decision.
- No catalog row is automatically included in the rewrite.

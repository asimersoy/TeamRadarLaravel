# Legacy MVP Boundary And Roadmap

- **Record type:** historical scope reconstruction
- **Status:** draft for owner review
- **Current authority:** none

## Remembered Apex MVP

The memory reconstruction describes the old minimal complete Apex experience as:

1. register/sign in;
2. link an Apex-facing account name;
3. declare/reconfirm rank;
4. configure/run the TeamRadar Relay;
5. enter the website queue;
6. receive a compatible group in a private room;
7. manually invite/add one another in Apex;
8. play ordinary public/ranked matches;
9. use relay evidence to support review eligibility; and
10. review teammates so honor can evolve.

Even this “MVP” contained several independent high-risk systems—desktop
integration, identity, matchmaking, rooms, reviews, reputation, and
moderation—without testable completion criteria.

## Remembered Old MVP Inclusions

- one game focus, remembered as Apex;
- simple website authentication;
- linked game account and declared rank;
- relay onboarding/status;
- HTTP-based relay/backend transport;
- basic queue and group formation;
- private coordination room;
- manual in-game party creation;
- minimal session evidence;
- simple reviews/reports;
- basic honor; and
- one-server Docker development/deployment approach.

## Remembered Old MVP Exclusions

- automated ordinary Apex party/friend/lobby control;
- custom-tournament lobby workflow as the product core;
- guaranteed/automated rank verification;
- dependency on Tracker or privileged official APIs;
- full hosted WSS gateway as a prerequisite;
- multi-game production support;
- advanced telemetry dashboards;
- AI toxicity or voice analysis;
- complex automated fraud/punishment systems;
- production-scale distributed architecture; and
- mature monetization.

## Historical Phase Model

### Phase 0 - Technical Exploration

- Laravel auth/Docker baseline;
- Apex LiveAPI docs and WebSocket experiments;
- protobuf event decoding and request experiments;
- Node gateway and Redis PSK/presence design;
- Electron relay prototype; and
- static landing/matchmaking UI.

This phase is the part most visible in surviving code.

### Phase 1 - API-Light Product Prototype

The broad intended target was a manually coordinated teammate-finder that did
not wait for privileged game APIs. The tracked late branch attempted this for
Valorant with self-declared Riot ID/rank. The memory reconstruction describes a
similar simplification for Apex.

Planned work included:

- actual matchmaking job;
- tests for matchmaking;
- realtime queue/page updates;
- teammate rank verification/reporting;
- review frontend/backend; and
- simple local/Docker hosting.

These items remain a backlog in `docs/TO_DO.md`, not completed features.

### Phase 2 - Trustworthy Session And Review Loop

- reliable relay authentication/presence;
- session/group correlation;
- review eligibility;
- basic honor calculation;
- reporting and manual moderation; and
- observable failure/retry behavior.

The memory reconstruction places these in MVP, but surviving implementation did
not reach them.

### Phase 3 - Approved Integrations And Hardening

Possible later work included:

- official account/rank integrations;
- direct hosted WSS gateway;
- hardened Electron preload/context isolation/token storage;
- richer telemetry/stats;
- robust buffering, acknowledgements, deduplication, and idempotency;
- CI/CD, HTTPS, immutable image tags, backup/rollback, and monitoring; and
- installer signing/updating.

### Phase 4 - Expansion

Historical possibilities included:

- another supported game;
- game-neutral identity;
- richer team persistence/community;
- advanced trust/fraud systems;
- toxicity monitoring; and
- scaled infrastructure.

No expansion item was a current commitment.

## Valorant Branch Roadmap

The reachable late TODO set a different sequence:

1. build a working/semi-working prototype without privileged Riot endpoints;
2. collect self-declared Riot ID/rank;
3. add teammate verification/reporting and lobby-code coordination;
4. present the prototype for API access;
5. later add RSO, PUUID, match history, and rank where permitted; and
6. decide hosting/integration needs after receiving platform answers.

The current app implemented only account/rank setup and static matchmaking UI.

## Missing Definition Of Done

No historical record set complete acceptance criteria for:

- the user problem and target audience;
- successful queue/group formation;
- no-match/decline/timeout/abandon behavior;
- relay installation, configuration, reconnect, and recovery;
- session proof and review eligibility;
- honor correctness/fairness;
- moderation and appeals;
- privacy/retention/deletion;
- security boundaries;
- accessibility/responsive UX;
- deployment, backup, restore, rollback, or incident handling; or
- measurable product validation.

Therefore “MVP” should be read as a historical intent label, not an
evidence-backed completed scope.

## Rewrite Boundary

Nothing in this roadmap is queued or deferred for the new project. The owner
may use it to identify lessons, then replace the scope in a future approved
brief and completion-criteria record.

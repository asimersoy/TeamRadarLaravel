# Legacy Contradictions And Confidence

- **Record type:** final evidence reconciliation matrix
- **Status:** draft for owner review
- **Purpose:** prevent the historical narrative from appearing more certain
  than its sources justify

## Confidence Scale

- **High:** directly observable in source/config/schema or supported by multiple
  independent historical sources.
- **Medium:** coherent and supported by one strong source plus related evidence,
  but lacking a complete primary decision record.
- **Low:** memory-only, proposal-only, contradicted, or technically unverified.

Confidence concerns the reconstruction of the old idea, not whether an idea is
good or should be reused.

## Claim Matrix

| Historical claim | Supporting evidence | Counterevidence/gap | Confidence |
| --- | --- | --- | --- |
| The project was about finding better teammates and reducing toxic/unreliable experiences | landing/matchmaking UI, overview, memory dump | public language overstates unimplemented capability | high as old intent |
| TeamRadar was the final old name and QueueGuard temporary | initial memory reconstruction plus TeamRadar docs/relay | owner corrected this on 2026-09-05: TeamRadar was internal/working and QGuard is preferred; QueueGuard is pervasive in the Laravel UI | corrected; prior claim superseded |
| Apex was the final old MVP game | early tracked Apex work and detailed memory reconstruction | latest reachable implementation/TO_DO switches to Valorant | medium-low pending owner resolution |
| Valorant was a detour/future game | memory reconstruction | tracked chronology ends on Valorant prototype with explicit focus switch | low-medium |
| The core Apex flow formed parties for ordinary pubs rather than replacing matchmaking | detailed memory record; custom-match API mismatch is technically coherent | no private-room/manual-invite implementation or primary decision record | medium |
| Rank was self-declared in MVP | Valorant code/TODO plus memory | no Apex queue reconfirmation implementation | medium-high as old simplification |
| Automatic rank verification was removed from MVP | TODO exploration plus memory | no formal rejection record | medium |
| `nucleusHash` derivation was rejected | TODO expresses uncertainty; memory explicit | no dated final decision artifact | medium |
| A local TeamRadar Relay existed as a prototype | recovered relay commit chain | absent from reachable branch/current tree | high |
| Relay HTTP auth/ping/event was an intended MVP transport | recovered implementation plus overview/memory | backend endpoints absent; overview wording is broader | high as prototype, medium as final choice |
| Apex should connect to a local relay listener | bundled Apex docs, Apex tap listener, memory correction | recovered Electron relay implements the opposite direction | high as corrected technical model, medium as historical final decision |
| PSKs should be short-lived active-session credentials | memory plus PSK/socket architecture | no lifecycle implementation; worker treats PSK as placeholder input | medium |
| Session evidence would unlock trustworthy reviews | memory and broad LiveAPI/review goals | no correlation/review system implementation | medium-low |
| Honor focused on behavior, not skill | UI copy and memory | no schema/formula | high as concept |
| Trusted players' votes would carry more weight | detailed memory record | no other source or implementation | medium-low |
| AI/voice toxicity monitoring was outside MVP | overview places monitoring later; memory explicit | no formal scope document | medium-high |
| Hosted Node WSS was post-MVP rather than required | memory and recovered HTTP relay | reachable repo invested heavily in gateway first | medium |
| One server plus Docker was preferred initially | TODO and memory | deployment plan explores more automation, still one-server compatible | high as old preference |
| Laravel was the confirmed implementation baseline | manifests/source/history | does not prove rewrite choice | high |
| React or NestJS/Prisma/PostgreSQL rewrite was discussed | memory dump | no supporting local artifact found | low-medium |
| Deployment roadmap used GHCR/Actions/SSH/rollback | deployment plan | no matching production files/deployment evidence | high as proposal, low as implementation |

## Material Contradictions

### 1. Final Game Direction

The latest reachable Git authority says “Switch the project focus to valorant.”
The memory reconstruction says the later retained architecture returned to
Apex. The owner clarified on 2026-09-05 that changing API and local-client
capabilities drove these shifts. Both historical phases remain visible, but
neither selects the current game; current official feasibility evidence will.

### 2. Product Name

TeamRadar appears in project/relay materials; QueueGuard remains the actual web
brand. The owner corrected the earlier memory interpretation: TeamRadar was an
internal/working name used before QGuard and appeared again internally, while
**QGuard** is the selected current product name. This resolves the current name
without rewriting what historical artifacts were called.

### 3. Local WebSocket Role

The relay prototype connects as a client to port 7777. The later tap and Apex
reference model require the local component to listen for the game. The
prototype is evidence of work, not of the correct final architecture.

### 4. “Current MVP” Narrative Versus Code

The overview describes relay HTTP endpoints, matchmaking APIs, lobby
verification, and Redis flows as though they exist. The API controllers are
empty, API routes are absent, matchmaking is static, verification is
placeholder, and services are commented.

### 5. “Verified” Account State

The schema/UI use `verified_at`, but submission assigns it immediately with no
proof. The field name and data do not establish verified identity or rank.

### 6. Realtime Architecture

HTTP polling, direct gateway WSS, Redis pub/sub, database presence, Redis
presence, and local direct LiveAPI paths coexist in files and comments. No
single end-to-end contract was completed.

### 7. Frontend/Backend/Database Direction

Livewire/Laravel/MySQL is implemented; React, SQLite, Node/NestJS, Prisma, and
PostgreSQL are remembered discussions. No final rewrite stack exists.

## Safe Consolidated Historical Statement

The highest-confidence statement is:

> QGuard, also internally called TeamRadar in historical material, was an
> unfinished behavior-focused teammate-finder concept. The
> repository first explored an Apex LiveAPI/relay architecture and later built a
> small Valorant-oriented account/matchmaking UI prototype. A detailed memory
> reconstruction describes the preferred old concept as returning to Apex pubs:
> players would declare rank, use a local relay for session evidence, match into
> a private website room, form the in-game party manually, and review one another
> into an honor signal. The implementation never completed matchmaking, private
> rooms, session correlation, reviews, honor, moderation, or production
> operations.

This wording reports evidence and uncertainty without making the old idea the
new specification.

## Owner Review Needed

- confirm whether the remembered Apex return should be treated as the final old
  chronological phase despite missing dated primary evidence, only if that
  historical label still matters after the feasibility clarification;
- correct any “remembered firm” rule that was only an idea;
- supply any missing relay/backend/design repositories or dumps;
- identify areas that need deeper historical extraction; and
- explicitly close the reconstruction before beginning new boundary decisions.

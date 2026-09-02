# Legacy Superseded, Rejected, And Unresolved Ideas

- **Record type:** historical authority cleanup
- **Status:** draft for owner review
- **Current authority:** none

## Remembered Superseded Or Rejected Paths

The labels in this section are primarily supplied by the owner-provided memory
reconstruction. Surviving repository evidence often proves exploration, not the
final rejection itself.

| Old approach | Remembered later treatment | Evidence note |
| --- | --- | --- |
| QueueGuard as final product name | superseded by TeamRadar | QueueGuard survives in Laravel UI; TeamRadar appears in docs and relay package |
| Automatic Apex friend requests | dropped | no surviving implementation; rejection is memory-supported |
| Automatic ordinary public/ranked lobby joining | dropped | custom-match API experiments do not provide this flow |
| Building normal pubs around custom-match lobbies | rejected | Apex requests/proto show custom-match exploration; memory explains mismatch |
| Automatic rank verification as MVP requirement | replaced by declaration/reporting | Valorant code/TODO corroborate self-declared prototype; Apex final label is memory-supported |
| Derive `nucleusHash` by hashing submitted platform ID | rejected as unreliable | TODO shows exploration/doubt; final rejection is memory-supported |
| Route users by stored IP | replaced by authenticated active session/connection | PSK/socket diagrams and gateway code support later direction |
| Permanent/public PSK identity | rejected | token semantics remain underspecified; memory supplies rejection |
| Hosted WSS gateway required before MVP | replaced by local relay plus HTTP polling | orphan relay implements HTTP client; current Laravel endpoints absent |
| AI/voice toxicity monitoring in MVP | postponed | overview calls richer monitoring later; memory is explicit |
| Complex multi-server production architecture | replaced by one server plus Docker during validation | TODO is explicit; deployment plan remained proposal |
| Depend on privileged Riot/third-party APIs before prototype | replaced by API-light prototype | TODO is explicit |

These approaches have no current authority either way. “Rejected historically”
means only that a future decision must not accidentally revive them as inherited
requirements.

## Historical Decisions That Remained Unresolved

### Product And Audience

- exact target segment and age boundary;
- one-session teammates versus persistent teams;
- competitive versus casual priority;
- solo versus partial-party users;
- exact public promise and success measures; and
- monetization/revenue model.

### Game Scope

- final historical authority between late Valorant code and remembered Apex
  return;
- which game would follow Apex;
- platform and cross-play boundaries; and
- whether multi-game identity was architectural or merely aspirational.

### Matching

- questions/inputs, purpose, validation, skip logic;
- hard exclusions versus weighted preferences;
- rank tolerance and queue-time widening;
- region/language/mic/input/role/playstyle criteria;
- team size and partial-party behavior;
- ties, no-match, contradictory data, manipulation, and fallback;
- blocks/prior pairings/repeated teammates; and
- whether honor affects information, ordering, eligibility, or none.

### Coordination

- host selection;
- room membership/authorization;
- room chat and data retention;
- ready state;
- invite failure/no-show/decline/timeout/replacement;
- room expiry and immediate requeue; and
- persistent team/friend behavior.

### Identity And Rank

- exact account fields by platform;
- ownership/change/recovery;
- self-declaration labels;
- rank reconfirmation cadence;
- challenge/report resolution;
- official/third-party integration conditions; and
- treatment of unranked/private/unavailable data.

### Session Verification

- required LiveAPI events;
- group/session correlation;
- minimum play duration;
- disconnect/partial evidence;
- multiple matches per group;
- proof without a relay; and
- review unlock and dispute handling.

### Honor, Reviews, And Moderation

- review UI and questions;
- starting score, scale, formula, trust weights, sample confidence, decay;
- repeat/reciprocal/brigaded ratings;
- report taxonomy and evidence;
- warnings/restrictions/suspensions/bans;
- moderator ownership, access, service levels, notification, appeal, restore;
- score explanation/correction; and
- retention/deletion/monitoring/rollback.

### Relay And Security

- PSK issuance, expiry, rotation, revocation, storage, and redaction;
- correct local listener implementation;
- event normalization/versioning;
- buffering, acknowledgements, retry/backoff, dedupe, idempotency;
- backend command boundary;
- local diagnostics/support/privacy;
- hardened Electron sandbox/preload/context isolation;
- installer signing/update path; and
- failure behavior when game/backend/network is unavailable.

### Architecture And Operations

- Laravel/Livewire versus React or TypeScript/NestJS rewrite;
- MySQL versus SQLite/PostgreSQL;
- HTTP polling versus direct WSS after MVP;
- presence source of truth and Redis channel/key contracts;
- API contracts and authorization;
- production host/domain/reverse proxy;
- backup/restore/rollback/observability;
- CI behavior and release gates; and
- current platform/API facts.

## Current Treatment

All items above are historical. During redesign the owner may:

- reject an item entirely;
- redefine it as a new open question;
- approve a bounded requirement;
- postpone approved work with a return condition; or
- request current official research before deciding.

None should be copied wholesale into the new specification.

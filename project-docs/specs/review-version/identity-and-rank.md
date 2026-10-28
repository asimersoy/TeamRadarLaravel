# Identity, Guest Access And Rank

**Status:** ID-01–04 approved for bounded R1a execution under DEC-082; live
provider/recovery details remain deferred. Authority: DEC-044/048/052–055/066/082.
**Dependencies:** matching, sessions, data/access. Requirements ID; update on
provider contract, account policy or rank-source changes.

## Identity And Admission

- **ID-01:** keep QGuard account identity and Riot account identity separate.
  Normal signup is open; inherited email/password, verification and recovery
  behavior remains the approved baseline on the confirmed stack. A typed Riot ID is
  not ownership proof. Credentials and reset tokens never appear in reports.
- **ID-02:** normal matchmaking requires actual RSO linking/opt-in when live
  access exists. Before then, show a clear unavailable/pending-approval state.
  No manual Riot ID or guest session bypasses this server-side gate.
- **ID-03:** login offers guest review. Guest data, actors, chat, scores and
  actions are isolated samples. The prototype stores only fictional UI state
  in its local browser scope; this is not a production authentication design.
- **ID-04:** show a reviewer explanation of the intended consent/account link
  flow, a sample successful identity and declined/failed linking variants.
  Never ask for a Riot password on QGuard or present a fake Riot login form.

Expected provider contract: stable player identifier (PUUID), Riot display
identity, connection/consent status and applicable shard, with source/time and
failure status. RSO is OAuth client access; production API keys are separate.
Actual scopes, callbacks, identity uniqueness/link replacement and credential
storage require the later technical integration contract and real evidence.

## Pre-Queue Rank Flow

- **ID-05, approved:** on each matchmaking entry retrieve the latest available
  competitive-match tier through authorized official access, then require
  the player to confirm or correct it. The approved planned retrieval is account
  identification, `GET /val/match/v1/matchlists/by-puuid/{puuid}`, then relevant
  `GET /val/match/v1/matches/{matchId}` and the participant's `competitiveTier`.
  This is an observed match tier, not guaranteed present rank or ranked rating.
- **ID-06:** display “Last observed” rank/time separately from “Rank for this
  session.” Manual correction records a declaration; it does not overwrite
  the observed value or relabel it official. Preserve source/time on snapshots.
- **ID-07, draft recovery:** automatic retrieval is primary. A Retry action
  repeats failed retrieval; a “Check again” control is optional recovery, not
  a manual-only replacement. If a linked account has no retrievable tier,
  show that fact and allow a labeled current-rank declaration under the existing
  fallback direction. The final live failure/timeout policy is reviewed with
  this packet; provider failure never silently passes as fresh official data.
- **ID-08, inherited:** Unknown/unplaced users may complete setup but cannot
  enter the initial placed-rank Competitive queue. Confirm Competitive access;
  a declaration does not establish game-side eligibility. Rank vocabulary and
  game restrictions are versioned provider rules, not hardcoded forever.
- **ID-09:** confirmation applies to one queue attempt and to the current
  identity/settings version. Cancellation/re-entry triggers another check.
  Relevant edits clear readiness and cancel a waiting party entry; they do
  not rewrite a historical session.

## Page States And Data

Registration: blank, invalid input, duplicate, busy, successful verification
prompt. Verification/reset: sent, expired, invalid, throttled and successful.
Profile: incomplete, saved and stale-session rejection. RSO: not available,
not linked, linking, declined, failed and linked. Rank: retrieving, observed,
confirmed, corrected, no ranked data, failure/retry and unknown/unplaced.
Keep a primary next action and explain why queueing is disabled.

The player sees their own account defaults and honor. Friends do not receive
email, linked tokens, honor or rank merely through friendship. Matched players
receive only the authorized session snapshots. Later account/rank checking in
the game lobby is testimony, separate from RSO ownership and API observation.

## Acceptance

Test direct-action admission bypass, failed/declined OAuth, identity replacement,
missing match data, stale observation, correction provenance, repeated queue
entry, edits while queued, rate limiting and guest/live isolation in the later
implementation. The prototype covers these as synthetic visible states, not
as completed OAuth, API or account-security tests.

# Identity, Guest Access And Rank

**Status:** ID-01–04 and the synthetic rank-confirmation/storage boundary are
implemented locally under DEC-085. Live provider/recovery details remain deferred;
see P-06 and the implementation evidence. Authority: DEC-044/048/052–055/066/082/085.
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
  Under the owner's 2026-10-28 instruction to include Riot-required disclosures,
  explain the identity/rank use and matched-teammate visibility on the connection
  screen, before the future RSO redirect. RSO opt-in and this in-app explanation
  are required by the reviewed provider policy; a separate QGuard checkbox is
  not specified there. The current sample button records no real consent.
  Final Privacy Notice/Terms content and links remain part of the pending owner
  review and later live integration; no blanket agreement or legal basis is
  inferred from this copy. See the [source and scope clarification](../../research/riot-policy-pre-submission-review.md#rso-disclosure-and-checkbox-clarification--2026-10-28).

Expected provider contract: stable player identifier (PUUID), Riot display
identity, connection/consent status and applicable shard, with source/time and
failure status. RSO is OAuth client access; production API keys are separate.
Actual scopes, callbacks, identity uniqueness/link replacement and credential
storage require the later technical integration contract and real evidence.

### ID-10 — Subject Opt-In Before Display To Other Players

**Required for live integration; not implemented by the synthetic review build.**
The owner's 2026-10-28 explicit policy check confirms that QGuard must apply both
parts of the [VALORANT opt-in rule](https://developer.riotgames.com/docs/valorant):
signup and RSO-based opt-in, plus the in-app sharing disclosure. Registration,
email verification, a typed Riot ID, or acceptance of general service terms alone
is not Riot data-sharing opt-in. The sample connection is not real consent.

Before displaying a player's Riot-derived individual stats/gameplay data to any
other player, verify that the **subject of the data** signed up for QGuard and
completed its authorized linking/opt-in flow. The viewer being registered/linked
does not authorize exposing an unregistered or non-opted-in opponent, teammate or
other match participant. Extract the consenting player's required rank data from
match responses; do not forward the full response or infer consent for everyone
in it. All five QGuard participants must satisfy their own live admission checks.

The disclosure must describe the actual permitted audience and fields before
the linking action. Current product visibility remains matched teammates and
authorized session access; Riot's reference to public data does not itself
approve creating a globally browsable player directory. Apply the display gate
server-side across page rendering, payloads, history, caches and any later
exports/broadcasts, together with the existing audience restrictions.

The live integration contract must define reliable evidence of opt-in, identity
association, disclosure version, and unlink/revocation handling. Do not rely on
an immutable historical snapshot or cached response to bypass the display gate.
How consent changes are detected, how historical fields are masked and how
retention/deletion works must be settled before real integration is released;
this clarification chooses no deletion period or new credential-storage schema.

### ID-11 — First-Release Age Eligibility

**Approved by DEC-091 on 2026-10-29; visible notice implemented.** Player registration
and use of the first release require age 18 or older. No parental-consent bypass
admits under-18 players. Other game/account eligibility requirements still apply.
The concrete age-check method and any retained evidence need a bounded admission/
privacy contract before real use. No full birth date, identity document, new
provider or RSO age assurance is selected by this requirement.

**Implementation, 2026-10-29:** the real registration page and guest design show
the 18+ rule. Final Terms remain in group five. The reviewed Riot developer pages do not prescribe a
particular QGuard age checkbox, birth-date collection or identity check. This is
communication of the rule, not a claim that Terms alone verify age or satisfy
every real-release obligation. No new age data is collected by this update;
the live admission contract remains separate and does not block synthetic work.

Acceptance for that later slice must cover under-18 rejection, the 18-year
boundary, incomplete/invalid age evidence for the chosen method, and direct-action
bypasses. These are future checks, not results of this documentation update.

## Pre-Queue Rank Flow

- **ID-05, approved:** on each matchmaking entry retrieve the latest available
  competitive-match tier through authorized official access, then require
  the player to confirm or correct it. The approved planned retrieval is account
  identification, `GET /val/match/v1/matchlists/by-puuid/{puuid}`, then relevant
  `GET /val/match/v1/matches/{matchId}` and the participant's `competitiveTier`.
  This is an observed match tier, not guaranteed present rank or ranked rating.
  The owner's 2026-10-28 clarification limits this first-version match-history
  use to the consenting linked player's own rank. Select that player's entry
  by their linked PUUID; ignore the other participants' statistics. Do not
  initiate lookups for those participants, analyze their performance or retain
  their data as a side effect of rank retrieval. Retain only the intended
  player's required rank/source evidence, not the whole match response. ID-10's
  mixed-participant acceptance case verifies this filtering; it does not add
  a feature for displaying other participants' statistics.
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

**Additional live acceptance for ID-10:** registered but unlinked subject;
declined/failed linking; linked viewer with a non-opted-in subject; a returned
match containing non-QGuard opponents/teammates; direct-page/payload access and
cached/history/broadcast exposure after a known loss of opt-in; positive sharing
for opted-in subjects within the approved audience. Verify that fictional linking
cannot satisfy any live gate. These cases are requirements, not executed results.

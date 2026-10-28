# Review-version actual storage and owner review

**Status:** implemented local inventory; owner privacy/retention/launch review
not performed. **Authority:** DEC-047/085, QG-REVIEW-1. **Date:** 2026-10-28.
The database now has 41 tables, including eleven new review-version tables.
This supplements the [baseline inventory](first-build-data-inventory.md), whose
fields/copies still exist. Legacy repository data was not imported. All executed
checks use fictional users in the guarded disposable PostgreSQL target.

## New stored records

| Record | Stored fields and purpose | Source / readers |
| --- | --- | --- |
| game_sessions additions | workflow_version, end_deadline, closed_at, closure_reason | Server transition history. Participants see their session status/deadline; cleared admins see evidence. Old sessions retain first-pass-v1. |
| session_end_requests | id, game_session_id, user_id, created_at; one per participant | User request. Room shows request count and own response, not a feedback vote. Admin evidence retained. |
| review_feedback_cards | id, session, author/recipient user IDs, overall 1–10, nullable communication/play_style 0–100, created/submitted timestamps | Obligations created from original roster at played-session closure. Author sees their own sent receipt; individual received values and mappings are restricted to cleared case admin. Unsent obligations have null values. |
| descriptor_states | id, user_id, dimension, honor_score, smoothed_raw_rating_reference, eligible_rating_count, calculation_version, updated_at | Independent formula streams. Only self sees a qualifying summary; never shared into matching/teammate payloads. Restricted evidence retains full state. |
| review_score_applications | id, card, recipient, dimension, input_rating, calculation_version, parameters JSON, exclusion_reason or before_state/after_state JSON, created_at | Server immutable numerical-order ledger. Cleared admin only; includes excluded inputs without false application claims. |
| session_admissions | id, session, user, created_at | Explicit early-leaving admission, separate from ordinary session end. Restricted evidence. |
| party_code_versions | id, session, host, version, code (max256), created_at | Host-supplied plain code, append-only replacements. Authorized participants can view/copy current version; operator can inspect retained prior versions. Treat codes as access-bearing session data, not verified game state. |
| lobby_discrepancies | id, session, reporter, subject, claimed rank snapshot, state, created/resolved times | User allegation, never official observation. Shared UI shows subject/rank/state; reporter identity restricted. |
| lobby_discrepancy_votes | id, discrepancy, user, mismatch boolean, created_at | Eligible participants' immutable answers. Shared UI exposes only whether the current actor may answer; raw mappings restricted to case admin. |
| match_offers | id, state, common deadline, activated session nullable, created/resolved times | Server reservation outcome. Members see deadline, own response and acceptance count. |
| match_offer_members | id, offer, original queue entry, user, nullable accepted response, responded_at | Server-derived membership, then user answer. Internal recovery preserves complete original premades; not a public queue directory. |
| rank_confirmations | id, user, party/version, identity snapshot, observed rank/time nullable, source, declared rank, confirmed_at, consumed queue_entry_id | Current executable source is explicitly synthetic/unavailable; no fabricated official observation. One queue attempt consumes confirmation. Future real provider mapping requires RSO contract. |

The prior users, parties, queue, roster, chat, conduct-report, administration and
runtime tables remain. Conduct-report `late` in review-v2 means the subject
already had an eligible outgoing application when that report arrived; it does
not impose a deadline. Existing first-pass feedback/settlement records retain
old semantics. Honor continues from stored state; migrations do not reset scores.

## Access, copies and lifecycle

- Business evidence has no automatic expiry. Required feedback stays open;
  sent cards are immutable. Closing a session releases only current membership
  slots and stales pending operational checks; it does not purge history/chat.
- Descriptor reviewer counts derive distinct internal author identities. These
  sets are never sent to players. Three contributors reduces sparse exposure
  but does not guarantee that changes cannot suggest a recent contribution.
- Reports, numerical effects and allegations are separate. No ban, punishment,
  appeal adjudication, score correction or voice recording was added.
- The baseline inventory's login sessions/IP/user-agent, reset tokens, caches,
  jobs, logs, mail, secrets and backup copies still apply. No Riot tokens,
  telemetry vendor, external font, analytics or Discord data was added.
- Guest walkthrough state remains fictional tab-scoped sessionStorage. It does
  not create backend users, chat, scores or reports. The real backend is tested
  with separate synthetic accounts. Browser traces may include test credentials
  and cookies: keep them local/ignored; selected committed renders are fictional.
- PostgreSQL development persistence and secure backup requirements are unchanged.
  This task does not migrate or reset the persistent development volume. Only
  disposable test storage has been written. Real deployment facts remain unknown.
- Collection/release gate stays closed; both matching test switches refuse
  local/production execution. Changing a switch does not grant provider access.

## Owner checkpoint — before any Riot submission

Bring the implemented UI and this inventory to the owner. No expiry period,
age/launch-country boundary or external submission is approved here.

1. Which ordinary session, chat, rating, code, offer and audit records should
   remain, expire, be restricted or be deleted? How do reported cases differ?
2. What happens on account closure, a correction/deletion request, a retained
   allegation, an administrative hold and a restored backup?
3. Who may receive case clearance; what access review and incident contact will
   be operated? What logs/traces/backups are necessary and for how long?
4. What age, platform, country/language and permitted-use boundaries govern the
   first public offering, and which public claims are acceptable?
5. What will the actual hosting, email, jurisdictions, subprocessors and notice
   say? Legal conclusions and provider requirements need their assigned review.

Prepare any approved retention changes as a separate verified implementation
slice. Existing data must not be purged merely because a duration is selected;
actual destructive execution retains its explicit authorization/recovery gate.
Riot submission itself, hosting, public collection and live testing are separate
later actions, not implied by completion of local implementation.


## Executed recovery evidence

The isolated source and a newly created restored database have identical
fingerprints across all 41 tables. Restored dashboard, room, detail and history
rendered successfully. The synthetic mode0600 backup remains in workspace
`snapshots/qguard-review-20261028.dump`, outside Git; the restore copy remains in
the disposable test PostgreSQL service. See the [execution record](../planning/review-version/backend-implementation.md)
for checks, limitations and the owner handoff. No real-user backup was created.

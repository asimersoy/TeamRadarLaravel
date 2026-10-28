# Review-version actual storage and owner review

**Status:** implemented local inventory; owner review in progress. DEC-087–090
settle conditional retention/timestamps, closure direction, one super admin and
EU game region with English/Turkish. DEC-091 now selects first-release age 18+.
DEC-092 defers deletion/retention implementation and detailed disposal review
until after RSO implementation. Applicable handling must be reviewed before
real-data tests; it does not block local fictional development. The live age-check
method remains open; group five is a separate later discussion.
The October 29 [local follow-up](../planning/review-version/owner-follow-up-implementation.md)
implements singleton admin control, English/Turkish application UI and 18+ notice.
Group five has started: DEC-093 selects personal operation, with no existing
domain/hosting/email provider. Provider/contact and final-policy decisions remain.
**Authority:** DEC-047/085/087–092, QG-REVIEW-1. **Updated:** 2026-10-29.
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

## Owner Checkpoint And Deferred Disposal Review

**Timing amendment, 2026-10-29:** DEC-092 supersedes the pre-submission timing
for deletion/retention work. That work returns after
RSO implementation. The remaining external-delivery review still applies;
provider materials must describe the deferred capabilities accurately. Applicable
handling needs review before real-data tests, including private tests. A full
automated deletion feature is not required to continue the synthetic local build.

Read the [current Riot policy briefing](../research/riot-policy-pre-submission-review.md)
first. It separates published provider requirements, QGuard-specific interpretations
and unresolved review matters. It does not select retention periods or record Riot
approval. The owner requested this research on 2026-10-28 before giving dispositions.

**Reviewed scope:** `DEC-086` confirms that future client-automation permission
does not block the first web version; `DEF-015` owns that later review. The owner
accepts the current scope against the listed prohibited-feature categories.
These dispositions do not close the data/retention/launch questions below.

### Owner Review Progress — 2026-10-28

The owner asks whether the requested checks are complete. This status
reconciliation compares the conversation's explicit answers with DEC-055/085/086,
the opt-in audit, this inventory and the checkpoint queue; it is not a new approval.

| Review item | Recorded disposition |
| --- | --- |
| Current web scope against listed prohibited-feature categories | Owner accepts proceeding within the current web scope (DEC-086); no provider verdict inferred. |
| Required non-endorsement notice | Owner explicitly selected Riot's wording; applied and rendered checks passed. |
| RSO opt-in and in-app sharing disclosure | Owner directs using the required disclosure; ID-04/10 records the future live enforcement. Final Privacy Notice/Terms and live RSO are separate. |
| Use of previous matches | Owner confirms own-rank retrieval only (DEC-055/ID-05); other participants' statistics are excluded. |
| Later client automation | Permission research deferred under DEF-015; not a dependency of the current web version. |
| Retention | DEC-087: prefer no routine expiry where permitted, with record/event timestamps. DEC-092 defers detailed review and expiry implementation until after RSO; blanket permanent personal-data retention is not established as permissible. |
| Account closure | DEC-088 direction remains: stop login/use, remove Riot connection material, prefer retaining needed QGuard relations via soft deletion. DEC-092 defers implementation and the full erasure/correction/backup contract until after RSO. |
| Administrative access | DEC-089: one owner-operated super admin. Database singleton enforcement and audited assignment are implemented; actual owner account and group-five contact details remain. |
| Initial audience and languages | DEC-090: EU game region, English/Turkish localization, likely Türkiye-first focus. DEC-091 selects 18+ with no minors flow. Age-check method and exact legal country availability remain open. |
| Hosting/operator/final policies | Group five active: DEC-093 selects the owner personally; no existing domain or providers. Hosting/email/location/contact and final policies remain open. |

The [checkpoint queue](../governance/checkpoint-review-queue.md#current-review-status--2026-10-28)
also retains the nonblocking recap of delegated implementation defaults. No
tool-confirmed automatic answer has been found. Stack, feedback, visibility,
acceptance and session-end choices already settled are not reopened. Live rank
failure handling, actual RSO and party-code checks remain later integration work;
the owner did not forget to perform those deliberately postponed tests.

Route: existing entry path, audit/reconciliation, external owner review and
deferral/owner-review procedures. Documentation-only scope; verify links, scoped
diff and whitespace, retaining this update in the ongoing review batch. No new
application test, live check, remote operation or commit is required for this status update.

Verification: reviewed the three-record scoped diff; 185 local links and 57
Markdown anchors passed with no failures, as did `git diff --check`. No application
or live test was run. The update remains uncommitted with the existing review
batch; no push, deployment or submission occurred.

### First Four Groups: Dispositions And Remaining Work

Read the [focused retention/deletion/age findings](../research/retention-deletion-age-review.md)
for the new owner answers, Riot/KVKK requirements and Gankster's published terms.
Research is not final legal clearance; this pass changes records only.

1. **Retention work deferred, DEC-092:** no routine expiry where permitted,
   preserving record/event dates. Detailed purposes/disposal review and any
   implementation return after RSO. Review applicable handling before a real-data
   test; no arbitrary retention period or permanent-storage promise is selected.
2. **Closure work deferred, DEC-092:** DEC-088's direction survives but is not
   implemented now. Identifier removal, case holds, correction requests,
   provider-derived copies and backups/restores remain in the post-RSO contract.
   Hiding a name alone is not proof of anonymity.
3. **Administrative model settled:** one owner-operated super admin; no partial
   staff roles. Preserve authentication, case access audit and secret protection.
   Singleton database enforcement and explicit audited assignment are implemented.
   Specific incident/privacy contact goes to group five; log/trace/backup retention
   stays with group one. No real admin provisioning has occurred.
4. **Market direction and age settled:** EU game region, English/Turkish product
   localization, likely Türkiye-first market; 18+ under DEC-091, no minors flow.
   Define the age-check method and distinguish the game shard from permitted
   residence countries. Describe
   prototype plans as plans; change to current claims only for working, validated
   capability. The owner explicitly answered the age question on 2026-10-29.
   Terms plus a visible 18+ signup sentence is the prototype recommendation;
   it is not a selected live age-assurance method or a requirement to collect ID.
   The visible registration notice is now implemented in the real app and design;
   final Terms wait for group five. The real app supports EN/TR; the standalone
   review catalog remains identified as English.

### Fifth Group: Separate Discussion After The First Four

Groups one and two are now explicitly deferred rather than unanswered blockers
to local development. This fifth discussion can proceed separately when preparing
external delivery; the owner need not settle it to continue local synthetic work.

5. What will the actual hosting, email, jurisdictions, subprocessors and notice
   say? Legal conclusions and provider requirements need their assigned review.
   Include the final Privacy Notice/Terms content and links at Riot account
   connection. The [RSO disclosure clarification](../research/riot-policy-pre-submission-review.md#rso-disclosure-and-checkbox-clarification--2026-10-28)
   distinguishes the required in-app explanation from an unestablished separate
   checkbox requirement; the current preview does not capture real consent.
   Apply [ID-10](../specs/review-version/identity-and-rank.md#id-10--subject-opt-in-before-display-to-other-players)
   when defining live opt-in evidence and unlink/revocation effects on history,
   cached rank/identity and other-player display. Resolve display permission
   separately from record retention; current participant checks alone do not
   implement that live consent policy.

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

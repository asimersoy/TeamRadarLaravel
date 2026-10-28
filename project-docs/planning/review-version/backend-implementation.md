# QG-REVIEW-1 backend and application implementation

**Date:** 2026-10-28. **Baseline:** `new-development` at `d0f9aa6`, clean.
**Authority:** DEC-085 activates preparation and implementation through the
pre-submission owner review. DEC-052–084 and the review-version modules own
behavior; this file owns technical choices, sequencing and evidence.
**State:** local implementation and verification complete; owner data/retention/
launch checkpoint is next, before any Riot submission.

## Route and boundaries

Routes: product, code, content, recommendation/eligibility, privacy/data,
external review, design/rendered, audit, migration, environment/recovery and
owner-review deferral. Mandatory entry, all selected procedures, project
registers, application instructions and actual services/schema were inspected.
Matching is preference matching; honor is behavioral feedback, not guaranteed
safety or skill. No change to criteria or reviewer authority. No delegation.

All PHP, PostgreSQL and browser execution uses Docker. Only the positively
identified disposable `qguard_test` target may be reset/migrated for tests.
Existing development data is untouched. No external service or real player is
needed. No push, deployment, Riot submission or history rewrite is planned.

## Technical contract and compatibility

1. Add a version marker to sessions and additive review-version tables. Existing
   sessions/ratings/settlements keep first-pass semantics and evidence. Never
   reinterpret historical optional dimensions as new mandatory overall ratings.
   New sessions use `review-v2`; the guarded historical test engine remains for
   compatibility regressions. New engine execution also requires the disposable
   testing environment until the later RSO integration opens normal use.
2. Match offers reserve entire original queue entries for a shared 20 seconds.
   Immutable per-user responses, original entry membership and deadline survive
   refresh. All five accept → one session; otherwise at deadline return fully
   accepted entries, stop failed entries intact. Pending responses retain their
   allotted time after another decline. Reject party/settings mutations during
   a reserved offer. No session or feedback debt on failure.
3. Retain the existing PostgreSQL transaction advisory lock for membership and
   domain transitions, with unique constraints/row locks. This deliberately
   favors correctness over parallel throughput in the initial single-instance
   service; it is not a production scale claim. Deadlines run server-side and
   idempotently on actions/polling as well as scheduler execution.
4. Shared end creates one closure after three requests or five minutes from the
   first. End requests never release slots early. Ordinary closure after all
   players acknowledge and no unresolved discrepancy creates immutable feedback
   obligations from original roster/premades. Pre-play disband creates none.
   Closed sessions retain history/chat but reject new room writes.
5. Each required author/target obligation stores one immutable 1–10 submission,
   nullable intentional 0–100 descriptors, timestamp and exclusion evidence.
   Submission immediately records one application per supplied dimension, using
   existing honor parameters. Reports/admission serialize with submission; no
   replay, reversal or expiry. Distinct eligible authors per trait control its
   self-only display at three, independent of calculation count.
6. Keep new numerical application evidence in a separate ledger referencing the
   new card, with version, parameters, before/after state or exclusion reason.
   Initialize descriptor streams lazily; honor continues from existing state.
   Existing honor does not get reset or recomputed by migration.
7. Host code versions are append-only, trim outer whitespace, retain punctuation
   and case, bound to 256 characters and prohibit control characters. This is
   an agent-selected transport bound, not a game-format claim. Native code only;
   no generated URL or private Riot API. Optimistic version rejects stale edits.
8. Discrepancy stores named subject and claimed rank, unique responses from the
   other three. One corroboration disbands; three denials clear; unanswered stays
   blocking until closure. Voter/reporter identities never reach player payloads.
9. History and all new reads require actual participation; received cards and
   applications remain admin-only. Self may see own sent receipts and qualified
   summaries, never author identity sets. Cleared-admin reads remain audited.
10. Rank confirmation stores sample/source observation separately from declaration,
    tied to settings and one queue attempt. Real API failure policy stays P-06;
    typed/sample identity never enables normal queue. Guest review stays isolated
    in a browser tab; backend behavior is verified with separate synthetic users.

## Ordered coherent units

- R2/R3: additive schema, shared closure, obligations, forward-only applications,
  conduct reports, history/private descriptors, version compatibility and tests.
- R4: offers, rank-attempt checks, host code and discrepancy, queue invariants,
  scheduler/reconnect, no-show compatibility and concurrent tests.
- R1/R5/R6: approved shell/brand/palette in real Blade/Livewire pages, session
  history and per-card forms, account/connections/settings, admin evidence,
  accessible responsive states, real multi-client/browser verification.
- Finish: current actual storage inventory, migration/recovery evidence, security
  and complete scoped diff, owner review packet and coherent local commits.

## Verification and stop conditions

Test legacy preservation, empty migration/idempotence, no reset of honor,
late/duplicate/concurrent card submissions, omitted and intentional midpoint,
report-before/after, repeated reviewers and trait-independent display, required
excluded cards, active/debt queue bypass, 3/5-minute closure races, 20-second
acceptance/requeue across 3+2 and 2+2+1, outsider/removed-user access, stale code,
discrepancy blocking and late votes, and cleared-admin-only evidence.

Then run broader backend regressions, formatting/build, rendered browser journeys
and responsive/keyboard/error checks, plus document links and diff checks. Keep
public collection and real queue disabled. A real missing policy choice blocks
only its dependent work; no completed check is invented. All remaining live
provider, retention/launch and owner-review gates remain visible.


## Implementation choices and verification progress

The physical schema adds eleven tables and four session fields without rewriting
old records. The test migration upgrades a populated old schema, preserves the
existing honor state and reruns as a no-op. New code retains legacy engine tests
and explicitly rejects legacy feedback actions on review-v2 sessions.

Rare historical/corrupt multiple-debt state is preserved, logged without rating
bodies and routed to the oldest outstanding session until all debt is complete;
it never discards cards. This recovery is agent-selected inside the approved
no-bypass rule, not permission to accumulate normal unfinished sessions.

The real Blade/Livewire app now exposes history/detail, immutable feedback,
qualified private summaries, a persistent 20-second offer, native-code relay,
rank discrepancy, shared end, connections and audited admin evidence. Existing
account/settings and chat services are reused. Approved logo assets and calibrated
Forest/Lime tokens are installed locally; no new visual brand or external font.

## Final verification — 2026-10-28

| Check | Result and practical limit |
| --- | --- |
| Backend suite, `docker compose -f compose.test.yaml run --rm php vendor/bin/pest` | **92 passed, 90,446 assertions.** Includes retained first-pass behavior, current review domain/UI authorization, formula property tests and independent-connection races. |
| New concurrent transitions | Five tests pass: duplicate card, report/application ordering, third end versus expiry, duplicate final acceptance and final acceptance versus exact deadline. |
| Existing browser suite | **47 passed, 2 intentionally skipped** duplicate catalog traversals. Chromium full suite; Firefox/WebKit core and guest flows. Guest catalog traversed 83 states once. Includes account recovery, friends, chat, polling outage, no-show, admin and old-data flows. |
| Real review-version browser journey | **3 passed** in Chromium, Firefox and WebKit: five separate accounts → rank declaration → queue → all-five acceptance → automatic room → host code → chat → SPA history/room return → shared closure → mandatory immutable feedback → history/profile/connections. Desktop 1440 and mobile 390 rendered. |
| Final clipboard follow-up | **1 Chromium journey passed** with Copy action, including a truthful manual-copy fallback when the browser has no Clipboard API. |
| Source checks | Scoped Pint checks, JS syntax, source/review-bundle consistency, Markdown local links/anchors and `git diff --check` pass. No protected portable workflow change. |
| Additive migration | Guarded populated historical schema upgrades; an existing user's honor state remains byte-for-value unchanged; second migrate is a no-op. Existing real/persistent development data was not migrated. |
| Backup/restore | All **41 tables** have identical count/content fingerprints in source, restored copy and unchanged source recheck. Includes 240 rows across eight populated new evidence tables; remaining new tables retain their schema. Restored dashboard, room, session detail and history each return 200. |
| Images/release boundary | Final local PHP and nginx production targets build. Offline PHP image returns 503 for public landing/registration/guest while collection disabled; assets present; `.env`, tests and test dependencies absent. No host/deployment/provider tested. |
| Final local preview | Both matching test flags disabled; matcher reports `awaiting_riot_linking`. DB reachable, zero overdue offer/closure/no-show records and zero pending/failed jobs at inspection. |

[Desktop room](rendered/session-desktop.png), [acceptance dialog](rendered/acceptance.png)
and [mobile locked feedback](rendered/feedback-mobile.png) are inspected real-app
renders using fictional users. Approved QGuard identity and palette remain.
The guest walkthrough remains separate from the authenticated backend fixture
journey; its 83 screen variants do not stand in for server tests.

## Failures found and resolved

- Cleared-admin render omitted the newly queried code-version variable; two
  backend failures identified it. The view binding was fixed and the full suite
  subsequently passed.
- An old landing test expected obsolete first-pass text. It now verifies the
  current visible Riot-linking boundary while preserving keyboard/overflow checks.
- One browser attempt lacked test Reverb. The complete test stack was restarted
  and the entire suite rerun from fresh synthetic fixtures; polling behavior was
  never substituted for the expected WebSocket assertion.
- Repeated pre-queue confirmations could expose an older unconsumed record after
  cancellation. Only the user's newest confirmation is eligible now; a regression
  verifies that an older record cannot authorize the next attempt.
- SPA room teardown now clears its initialization marker/listeners before return;
  the real journey verifies chat after leaving for history and returning.
- The new deadline concurrency fixture left accepted entries waiting, interfering
  with later historical test fixtures. It now cancels only those fixture entries
  after asserting recovery. The full 92-test suite then passed.
- The restore helper initially inherited a matching-test switch on a restored DB,
  correctly failing its safety guard. Both switches are disabled for restored
  page reads; all four restored routes then passed. No unsafe target was enabled.

## Data copies, reversibility and operational limits

Backup rehearsal target: `qguard_restore_review_20261028_b`, a new database in the
isolated test PostgreSQL service. Source was not overwritten. The synthetic dump
is outside Git in workspace `snapshots/qguard-review-20261028.dump`, mode 0600. Fingerprint/log/trace
artifacts stay in workspace scratch or ignored test output; raw traces may carry
synthetic credentials. No automatic deletion or real-data purge was performed.

The review schema, services, UI, tests and records form one coherent local commit.
It works without a follow-up commit. Additive compatibility preserves old rows,
but running old workers against active review-v2 sessions is unsafe. Operational
rollback closes admission/stops affected workers, retains evidence and uses a
reviewed forward repair or separately authorized restore. Do not drop the schema
or replay historical honor to revert a display change.

The existing global PostgreSQL transaction fence favors correctness over scale;
this task does not establish production throughput. No test proves live rank
retrieval, RSO approval, code validity/non-friend entry, game completion, Discord
capability or final retention legality. Report-before/after timing remains the
owner-accepted version-one limitation. Self-only descriptor display does not
promise perfect protection from inference after later score movement.

## Agent-selected implementation details for owner visibility

These apply settled policy; no timed-out owner question was treated as approval:

- Preserve abnormal multiple-debt records and resolve oldest first, with a bounded
  diagnostic. Normal queue paths prevent that state.
- Native-code input allows up to 256 characters, trims outer whitespace and rejects
  controls without inventing VALORANT's format. Source is always host-supplied.
- Feedback drafts stay in the current browser component until sent; no backend
  draft store. Sent cards and application evidence are durable.
- Settings reuses the existing account/profile form component; Connections has
  its own page and reuses authorized friendship actions.
- Display times remain explicitly UTC in this version; server deadlines persist
  independently of browser timers. Physical table names and indexes are technical
  choices, not additional product policy.

## Owner handoff and remaining gates

The [actual stored-data inventory and owner questions](../../operations/review-version-data-inventory.md)
are ready for the DEC-085 post-implementation, pre-Riot-submission checkpoint.
R1–R5 and R6's local build are complete. Review ordinary/reported evidence, account
closure, code history, admin clearance, logs/backups, retention and launch audience
before external submission. Implement the resulting approved changes as a new
coherent slice. R7 live RSO/API and P-06, R8 non-friend game checks and later Discord
remain unimplemented by design. No push, public collection, deployment or Riot
submission occurred.

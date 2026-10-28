# Owner boundary follow-up implementation

**Date:** 2026-10-29. **Authority:** explicit owner instruction to finish remaining
local development; DEC-089–092. **Status:** local implementation and verification
complete within the boundaries below.
**Baseline:** new-development at b3d505b, preserving the existing provider-review
batch. No portable-workflow change or unrelated project work.

## Route and contract

Mandatory entry and current records inspected. Routes: product, implementation,
content, privacy/data, decision safety, design/rendered review, audit, migration,
environment/recovery and owner-review deferral. No delegation. Owner has answered
administrative model, audience/languages/age and retention sequencing. Hosting,
email, operator/contact and final policies remain group five. No external action.

1. Preserve the existing admin clearance field and access audit, enforce at most
   one cleared account with a PostgreSQL unique partial index. Refuse migration
   if existing data has multiple admins; never silently demote anyone. Add a
   local operator command assigning an explicitly identified existing verified
   account, idempotently, with audit evidence. No public role-management UI or
   automatically privileged first signup. Actual owner provisioning waits for an
   identified account; tests use fictional accounts only.
2. English/Turkish interface selection uses a validated session preference,
   separate from matchmaking communication language. Translate controls,
   instructions, validation/status, notification and chat-system messages. Keep
   user-entered chat, names, evidence and game codes untouched. Preserve Riot's
   exact English non-endorsement wording alongside translated interface copy.
   The standalone guest/design catalog remains an English review artifact,
   explicitly identified on its entry points; it is not part of the localized
   real application. Brand assets and tagline retain their approved form.
3. Display the approved 18+ rule near registration. No DOB/ID collection or
   claims of verified age. Final Terms/Privacy remain group five; do not publish
   invented legal content. Live age-admission remains a separate contract.
4. No deletion/expiry feature (DEC-092), live RSO, Discord, real game checks or
   public collection. Normal queue gates stay closed outside disposable tests.

Technical defaults above are agent-selected applications of approved policy,
not new owner answers: partial index instead of a new role hierarchy; session
interface preference instead of extra profile fields; no extra age data.

## Verification and commit boundary

Use a separate, positively identified disposable Docker test project. Do not
reset existing development or the owner's current preview. Verify duplicate
admin prevention, direct unauthorized access, registration privilege injection,
command refusal/idempotence/audit; locale validation, session persistence,
Livewire actions, no alteration of matchmaking language or user content; EN/TR
rendering and narrow layout. Run backend regression, formatter/build, browser
checks and documentation/link validation. Inspect the whole pending batch before
one meaningful commit of provider/owner review and its local follow-through.
Stop only affected work for an unapproved real-use policy or unavailable check.

## Implementation evidence — 2026-10-29

- Backend regression: **99 tests, 90,486 assertions passed**, including seven new
  owner-boundary tests. Singleton assignment, existing-admin refusal, direct
  database enforcement, index rollback/reapply, locale isolation, translated
  validation/notification and privileged-field rejection are covered.
- `vendor/bin/pint --test`: **115 files passed**. No host PHP was used.
- Turkish catalog: **574 entries**, no placeholder mismatches or missing literal
  translation keys in the inspected PHP/Blade calls. Raw user content and admin
  evidence are preserved. Email notification language follows the requesting
  interface language; the preference is not a new persistent player field.
- Populated historical-schema upgrade preserves existing user/honor state and
  repeated migration is a no-op. The existing loopback preview received only the
  additive single-admin index; no data reset. Its public and both matchmaking-test
  switches remain false. Actual owner assignment has not been performed.
- Final production image build and no-network smoke check passed: all 574 Turkish
  entries and compiled assets are present, all views compile, public collection
  and debug remain disabled. Image tag: `qguard-app:owner-review-20261029`;
  manifest `c9153c8dca16434ae44764e5a7d0bda062aaa4c04f19b3f2bee2e297f3a84ad0`.

### Browser findings and corrections

Chromium and Firefox passed both language journeys and the localized registration/
admin/settings checks. WebKit initially timed out capturing a background context,
then reported a renderer crash; a clean run also exposed delayed offer delivery.
The installed Livewire source skips 95% of background polls unless keep-alive is
set. Match offers last only 20 seconds, so the dashboard and current-session view
now keep polling while the page is running. This is not a guarantee for a suspended
browser, offline device or sleeping computer; server deadlines still control.

Further diagnosis confirmed a renderer memory kill: the test container's cgroup
reported `oom_kill 1`, and the Docker VM has approximately 4 GiB total memory.
A temporary shared-memory allowance did not resolve it and was removed. The
five-account harness now uses 1280×720 for WebKit, while Chromium/Firefox retain
1440×1000. Screenshots and acceptance actions foreground the relevant context.
All five independent accounts, deadlines and functional assertions remain.
Single-page registration checks use 1440×900 and narrow checks use 390px. This
does not change product layouts, server resources or other running projects.
For WebKit, offer/room screenshots are covered by the Chromium/Firefox captures;
the five-account WebKit case keeps the functional assertions and takes its mobile
feedback screenshot after releasing the other four renderers. WebKit's separate
registration/admin/settings case still takes desktop and narrow captures.

A second isolated-run failure occurred before the fresh `schedule:work` process
reached its first minute boundary. The test's wait for an offer to **exist** now
allows 75 seconds for scheduler startup. Its real acceptance deadline remains
20 seconds from formation. No accept/decline or session rule is relaxed.

**Final browser result:** six Chromium/Firefox cases passed; the three WebKit
cases passed in the follow-up run after the runner corrections. Each browser
completed both EN/TR five-player journeys and localized registration/validation/
admin/settings. There are nine distinct passing cases across these runs, not a
claim that the earlier failing runs passed. Five-player desktop captures were
inspected from Chromium at 1440px; WebKit's final registration capture is 1440px
and its feedback capture 390px. Turkish mobile registration/settings were also
visually inspected. Layout/overflow and uncaught-script checks passed.

Six final WebKit captures are preserved outside Git under
`/Users/asime/Github/TeamRadarLaravel/outputs/qguard-owner-followup-20261029/`.
The earlier Chromium/Firefox captures were temporary test output; this record
preserves their executed results, not a promise those files survive another run.

Both generated design bundles match their source; JavaScript syntax, scoped
diff/whitespace and local documentation checks passed (332 targets, 68 anchors).
The protected workflow and unrelated services/work remain unchanged. No live
Riot/Discord, real-player game or production-data check was performed.

## Remaining work and group-five handoff

The core implementation already covers accounts/email verification, profiles,
friends/premades, matching/acceptance, code relay, private text, shared sessions,
required immutable ratings, honor/descriptors and report/admin review. These are
local synthetic capabilities, not working live Riot integration.

- DEC-093 records **personal operation by the owner** and the owner's statement
  that **no domain, hosting or email provider exists**. Budget is the next pending
  question; no provider or public contact details have been selected or inferred.
- Hosting/email/domain choices, operator contact and final Privacy Notice/Terms
  remain group five. No account purchase, deployment or Riot submission occurred.
- Real RSO, consent enforcement and rank retrieval require their integration
  contract and provider access. Real non-friend party-code checks remain post-RSO.
- Discord and client automation remain deferred. Deletion/retention work returns
  after RSO under DEC-092; applicable real-data handling remains a separate check.
- The 18+ notice is implemented; no live age-assurance claim is made. The English
  standalone walkthrough is separate from the translated application.

All review/disclosure decisions and their local follow-through form one coherent
rollback unit, recorded in the local commit containing this report. The index can
be rolled back without deleting users/audit rows, but that removes singleton
enforcement; do not operate the new administrative model without it. No push,
deployment, purchase or provider submission is authorized or performed.

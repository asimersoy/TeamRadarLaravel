# Reports And Cleared-Admin Review

**Status:** QG-REVIEW-1 draft. Authority: DEC-039/041/043/045/047/052/056–058/065/078/079.
**Dependencies:** sessions, feedback and data/access. Requirements RP.

## Distinct Processes

| Process | Trigger/consequence | Must not become |
| --- | --- | --- |
| Pre-play account/rank discrepancy | Named report, one of three corroborating votes → QGuard team disband | Conduct conviction, rank replacement or automatic honor deduction |
| No-show | Existing timed participant challenge/response → disband when met | Automatic game attendance sensor or Discord requirement |
| Conduct report | Session evidence; two distinct qualifying reporters exclude unapplied outgoing ratings | Immediate punishment, score rollback or majority-based conviction |
| Human review | Cleared staff read context, note and mark reviewed | Sanctions, appeals or score-correction tools |

## Submission And Receipt

- **RP-01:** only relevant session participants report; server derives author
  and verifies target/relationship. Original premades may report one another
  even though they cannot exchange honor ratings. Reject self, outsider and
  duplicated report events; multiple categories do not create multiple reporters.
- **RP-02:** keep inherited conduct categories “left before game finished” and
  “harmful/unsportsmanlike language,” optional bounded plain-text context, and
  distinct explicit self-admission where relevant. No Discord-noncommunication
  category while Discord is absent. An ordinary session end is not admission.
- **RP-03:** give the reporter a private submission receipt. Do not disclose
  report author or individual received ratings to the subject/teammates. Shared
  discrepancy UI identifies the disputed player and rank, not who voted which way.
- **RP-04:** reports remain possible from authorized session history; arrival
  after applied honor is labeled later evidence. No feedback deadline is
  reintroduced as a hidden report cutoff. Bound spam through idempotency and
  later technical rate limits without silently adding a reporting policy.

## Automatic Effect And Evidence

Qualifying report threshold is two distinct other participants in the same
session. Apply only to the reported person's outgoing **unapplied** inputs.
Record whether input was excluded before application or had already taken
effect; do not label retained effects removed. Incoming ratings, future sessions,
accounts and game ranks are not automatically penalized. Reports themselves
are not recursively erased when a reviewer's numeric input is ineligible.

DEC-079 keeps an excluded author's permitted teammate cards required. Submission
completes the obligation and retains immutable evidence without applying
excluded honor/descriptor updates. Optional sliders remain optional. Reports
cannot grant a completion bypass; existing self/premade and pre-play exclusions
still prevent prohibited obligations.

## Admin Screens

- **RP-05:** inbox shows case/session, reported participant, categories, received
  time, review status and relevant automatic-effect label. Filters: open/reviewed,
  category and applied-before-report versus excluded-before-application.
- **RP-06:** case detail shows relevant immutable roster/rank/honor snapshots,
  reports/authors, submitted ratings/descriptors, session text and chronological
  application/exclusion evidence. These are cleared-admin privileges, not public
  participant views. Never include credentials or reusable provider secrets.
- **RP-07:** internal notes and mark reviewed update case workflow only. Keep
  evidence immutable and record actor/time/version. Reopening/review conflicts
  must not overwrite another review invisibly. No ban/mute, rank edit, score
  correction, identity impersonation or “resolve by deleting evidence” button.
- **RP-08:** admin demo is an explicit synthetic reviewer scenario reached from
  review controls, never a role switch available to real players. Actual
  clearance is server-controlled and audited in the future build.

## Acceptance

Outsider/self reports, duplicate categories and duplicate submission; reporter
identity leakage; known versus later threshold; old session evidence; safe text
rendering; cleared-admin route/action/access audit; unauthorized deep links;
empty inbox; stale review version; note validation; evidence untouched by review.
No claim of automated misconduct detection, legal adjudication or proven truth.

# External Review

## Trigger

Use for owner, clinical, professional, safeguarding, legal, commercial,
security, accessibility, operational, or other qualified review outside the
implementation agent's internal QA.

## Review Packet

Give the reviewer finished or stable artifacts and specify:

- reviewer role and required qualification;
- exact records, claims, behavior, or questions in scope;
- controlling decisions and evidence;
- what is explicitly outside scope;
- requested verdict vocabulary;
- required findings, limitations, and follow-up;
- whether the review gates drafting, implementation, database entry,
  publication, deployment, or public data collection.

Do not ask a reviewer to design unrelated workflow or reopen settled product
decisions unless the review identifies a concrete conflict.

## Register

Maintain one consolidated register with artifact, reviewer type, scope,
status, date, findings, blocker, and evidence link. Internal QA must not mark an
external review complete.

## Verdicts

Use `pass`, `pass-with-conditions`, `revision-required`, `not-reviewed`, or
`not-applicable`. A pass applies only to the assigned domain and artifact
version. Material changes after review require impact assessment and, when the
reviewed matter changed, re-review.

## Owner Contextual Review

For rendered owner review, present one decision at a time with surrounding
context. Record approved wording or decisions immediately. If implementation
would take more than the agreed interaction threshold and no later owner
decision depends on it, record it in the owner-review queue and continue.

## Completion Evidence

Record the reviewer, scope, artifact version, verdict, conditions, unresolved
findings, affected gates, and whether subsequent changes require re-review.

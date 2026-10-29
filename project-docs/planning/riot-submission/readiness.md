# Riot submission readiness

**Status:** local preparation; external submission not ready or authorized.
**Owner:** project owner decides missing provider/operator/policy particulars and
authorizes external actions; Riot decides access. **Updated:** 2026-10-29.

## Submission checklist

| Item | State / evidence |
| --- | --- |
| Product purpose and intended API use | Drafted in [application text](application-draft.md); owner reviews before sending |
| Reviewable signup/linking/queue/session flows | Standalone package passed nine Chromium/Firefox/WebKit checks; [evidence](README.md#verification) |
| Local backend exists beyond the demonstration | [Implementation audit](../review-version/implementation-status-audit.md), plus linked test evidence |
| Exact Riot non-endorsement | Present in application and walkthrough; also included in reviewer entry |
| Linking disclosure and own-rank-only purpose | Demonstrated; live subject-specific consent enforcement remains later work |
| Accessible HTTPS product/review site | Missing host/domain and deployment authorization; localhost/ZIP/Git repository are not a verified public website |
| Final Terms / Privacy Notice | Missing actual operator/contact/provider facts and owner approval; draft-policy screens are not final notices |
| Ownership verification | Await real portal challenge; do not invent a token or publish a fabricated `riot.txt` |
| Hosted smoke/security/header check | Cannot be completed until an authorized host exists |
| Owner authorization to submit | Not granted by “get ready”; show the finished URL, text and policy links before requesting it |
| Riot approval and subsequent RSO provisioning | Not requested or granted; post-submission milestones |

The remaining prerequisite discussion is the existing group five: domain/hosting,
email/contact particulars and final policies. Operator type, 18+, EU game region,
English/Turkish, Discord deferral and matching priority are already recorded.
No new broad product questionnaire is needed. A static reviewer artifact has no
registration backend or email dispatch; future product email remains a separate
deployment dependency. Hosting logs still need a truthful privacy description.

## Hosting handoff once approved

Upload only the generated `site/` files, after replacing draft-status policy copy
with approved accessible Terms/Privacy links and relevant operator contact.
Keep application text, internal readiness records and manifests outside the public
site root. The reviewer bundle contains no Laravel configuration, credentials,
database, private evidence, backend test accounts or source repository.

Use HTTPS and provider-appropriate headers: restrictive Content-Security-Policy
matching the packaged inline scripts, `frame-ancestors 'none'`, `X-Content-Type-Options:
nosniff`, `Referrer-Policy: no-referrer`, and an indexing policy appropriate to this
review artifact. The embedded CSP protects scripts/connections/forms; meta tags
cannot enforce frame-ancestors, so the host must add that response header. Verify
the actual deployment rather than assuming any particular host applies these.

Add only the real ownership challenge at the path specified by Riot. Verify the
hosted entry, all deep links, reset/guest flow, logo, notices, mobile layout and
failure scenarios without signing into QGuard or Riot. Confirm that the artifact
makes no API/analytics requests and sends no form data. Do not turn on normal
application registration/matching to make this demonstration accessible.

## Later implementation, not current review claims

Production API/RSO integration needs its own contract, fixtures and provider tests.
Resolve rank-failure P-06, token handling, opt-in/revocation/read filtering and
applicable real-data handling before live processing. Resume party-code checks
under DEF-014 after RSO; then complete operational/load, mail, recovery and launch
verification. DEC-092 retains deletion/retention implementation after RSO.
No current prototype verdict substitutes for those results.

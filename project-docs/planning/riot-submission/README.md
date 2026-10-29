# Riot Games submission preparation

**Task:** QG-RIOT-SUBMISSION-1. **Owner:** project owner; primary agent prepares.
**Date:** 2026-10-29. **Status:** local package prepared and verified; external
hosting/policies and submission remain pending.
**Authority:** owner's explicit “get ready to be sent to Riot Games,” DEC-066–068,
085, 092–096. No authorization to publish, purchase, contact or submit.
**Baseline:** `new-development`, `92a34b9`, preserving the ongoing owner-review
documentation batch. Update this packet when scope, hosted artifact or Riot's
requirements change.

## Route and bounded contract

Read mandatory entry, project records and selected product, implementation,
content, research, decision safety, privacy/data, external review, rendered
design, audit, environment/recovery and deferral procedures. No delegation.
The product is preference matching, not a skill-rating replacement. No changes
to matching priorities, live provider access, retention or public admission.

Prepare a self-contained fictional review bundle, a guided reviewer entry,
draft application text and an evidence/gate checklist. Reuse the approved design;
do not choose a host or expose local accounts. The source repository is not a
submission substitute. Final policies and deployment facts remain owner work.
Run package/link/isolation and rendered browser checks, preserve their evidence,
then stop temporary services under DEC-095. Batch the completed local readiness
work with the related status/owner-operating decisions; no per-file commits.

## Artifacts

- [Application draft](application-draft.md): product description, data purpose,
  intended endpoints and provider-review distinctions. Not an exact portal form.
- [Readiness checklist](readiness.md): verified local work versus external gates.
- [Reviewer entry source](reviewer-guide.html): navigation and capability guide
  packaged alongside the existing fictional walkthrough.
- [Package builder](build-package.py): emits only allowlisted public review files,
  plus private handoff text, checksums and a ZIP containing the site folder only.
- [Current API-access research](../../research/riot-review-and-rso-access.md):
  dated official sources; policy conclusions remain distinct from approval.

## Build locally

From the repository root, select a fresh output directory outside Git:

```sh
python3 project-docs/planning/riot-submission/build-package.py --output ../outputs/qguard-riot-review-20261029
```

The builder refuses an existing destination and stale generated walkthroughs.
`site/index.html` is the review entry; `site/walkthrough.html` is the unchanged
approved fictional demonstration with restrictive browser security metadata.
No PHP, database, scheduler, worker, Reverb, API keys or mail service is needed
to host this review artifact. This is an artifact delivery option, not a change
to the Laravel application stack or a hosting decision. The real authenticated
backend remains separately implemented and tested with synthetic accounts.

Serve the `site/` directory over loopback HTTP for local review, then stop the
temporary server. The generated ZIP is a local handoff artifact, not a delivery
to Riot and not ready for publication until the readiness gates pass. Hosting
logs and final notices still need actual provider facts even for a static demo.

## Verification

The package was built at
`/Users/asime/Github/TeamRadarLaravel/outputs/qguard-riot-review-20261029/`.
Only `index.html`, `walkthrough.html` and `brand.svg` appear in its site ZIP.
Manifest file hashes, ZIP contents and CRC integrity passed. Archive SHA-256:
`a665c8c0c44b1e027afec0ec89c8bc6896413787cf77b1e2162273333b9cce26`.
An independent rebuild produced the identical ZIP. Existing-output and in-repository
output requests were refused without writes; Python syntax passed. Local document
checks covered 246 link targets and 40 Markdown anchors with zero failures;
scoped whitespace/diff review passed.

Nine focused browser tests passed: three each in Chromium, Firefox and WebKit.
They verify guide/deep links, desktop/mobile overflow and brand loading, a
sample match acceptance → code → closure → immutable feedback journey, separate
tab state, reset and CSP rejection of an outbound API probe. No real API or
registration request was made. Existing 99 backend tests were not rerun: this
pass changes review packaging/content/tests, not the Laravel domain code.

Desktop 1440px Chromium and mobile 390px WebKit guide renders were inspected;
screenshots are under the output's `browser-results/`. The inherited design
keeps its current generated source unchanged. Reproduce package checks with
`qguard/playwright.riot-review.config.ts` against a local HTTP server serving
`site/`; use Docker as required by the application instructions. The transient
test container/server exited. Local worker, scheduler and Reverb stay stopped.

Reviewer guide copy, API claims and [remaining gates](readiness.md) were checked
against decisions and current official research. Package success is not Riot
approval, final policy approval, a verified public URL or live integration proof.
No site was published, message sent or application submitted. This is one local
readiness batch with the preceding audit and owner operating clarifications.

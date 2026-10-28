# Riot policies before the privacy, retention and launch review

- **Record type:** dated primary-source research and implementation comparison;
  not an owner decision, Riot approval or legal compliance opinion.
- **Checked:** 2026-10-28. Recheck at submission, before live integration and
  when Riot changes its policies or supplies application-specific terms.
- **Task:** QG-RIOT-POLICY-1. Owner requested this briefing before reviewing the
  [actual storage and launch packet](../operations/review-version-data-inventory.md).
- **Repository baseline:** `new-development`, `b3d505b`, clean at entry.
- **Later owner review:** [retention, deletion and age follow-up](retention-deletion-age-review.md)
  records DEC-087–090 and the first-four-groups source check; group five stays separate.
- **Route:** research/sourcing, privacy/data/legal, decision safety, external
  review, audit/reconciliation and content lifecycle. Mandatory repository and
  portable entry path read. Application and protected workflow remain unchanged.

## Main finding and source authority

Riot lists LFG tools among accepted VALORANT use-case categories. This supports
the purpose of QGuard; it does not approve this particular product, its conduct
scoring, data handling or future integrations. The prototype can be evaluated
before live RSO is supplied. Separate developer policies, API contractual terms,
player terms and IP permissions apply; a useful API endpoint is not itself
permission to use it.

Only Riot primary sources support the provider-policy findings below. Dates are
the dates displayed by the pages, not a claim that every paragraph was last
amended then. The API terms still display 2013 despite including GDPR content;
they remain linked from the current developer policy. Obtain and review any
additional terms supplied during the actual production-key/RSO process.

| Source | Displayed date | Relevant findings, paraphrased |
| --- | --- | --- |
| [General developer policies](https://developer.riotgames.com/policies/general) | 2025-05-29 | Register products and submit changes for audit; use supported ingestion; display the specified non-endorsement notice. No alternative skill rankings/MMR/Elo calculators, unfair advantage, concealed-player exposure or gambling. Monetization has approval, free-tier and transformative-value conditions. Use HTTPS, protect keys and keep one product per key. |
| [VALORANT developer documentation](https://developer.riotgames.com/docs/valorant) | No overall revision date shown | LFG is an accepted opt-in category. RSO requires production access; personal-key applications are unsupported. Testable prototypes/mockups can demonstrate account and queue flows. Players must opt into the service before their individual stats/gameplay data are shown to others; the linking disclosure must explain sharing. Prohibited cases include opponent scouting, personal-only products, store tracking and immediate in-game advice/obstructive overlays. |
| [API terms](https://developer.riotgames.com/terms) | 2013-12-09 as displayed | Protect keys, report compromise, comply with applicable law/privacy and accurately disclose the app. Riot forwards deletion identifiers to developers. Ending the licence requires ceasing use and deleting Game Information. The terms also restrict API-derived contact with players and require permission for specified paid uses. These clauses need reading alongside the newer game policies, not silently ignoring. |
| [General Terms of Service](https://www.riotgames.com/en/terms-of-service), especially §§7.1–7.2 | 2024-12-01 | Unauthorized automation interacting with Riot services is restricted beyond cheats alone. Access-control bypass, private-area access, boosting and encouraging violations are also restricted. Business use requires permission. Riot can impose account penalties; API approval is not ownership of Riot IP or unrestricted access to its services. |
| [Third-party application guidance](https://support.riotgames.com/en-us/riot/events/third-party-applications) | 2025-02-10 | Riot recognizes teammate-finding tools as useful. It distinguishes approved official-API applications from unfair-advantage tools, actions performed for players, concealed information and actionable in-game assistance. This is explanatory guidance, not an exhaustive safe-app certification. |
| [Legal Jibber Jabber / IP permissions](https://www.riotgames.com/en/legal) | August 2018 | Fan-project permission is limited and revocable, with commercial/API exceptions and trademark conditions. A business cannot assume every free fan-use permission applies to it. QGuard should retain its own identity and use Riot assets only within the applicable specific permission; competitor inspiration does not license copying assets. |
| [Riot Privacy Notice](https://www.riotgames.com/en/privacy-notice) | 2026-04-28 | This explains Riot's own processing, rights and retention; it does not govern independent third parties' privacy practices. Riot's retention examples do not establish QGuard retention periods or authorize QGuard voice recording. |

For the required non-endorsement text, use the exact current boilerplate in the
general policy's General section when preparing the approved submission build.
At the research baseline, the short independent-product label was not that
boilerplate. The owner subsequently authorized its implementation; see the
[notice follow-up](#owner-authorized-notice-follow-up--2026-10-28) below.

## Application to QGuard — facts versus interpretation

These comparisons use the current [storage inventory](../operations/review-version-data-inventory.md),
[implementation record](../planning/review-version/backend-implementation.md),
`qguard/resources/views/` and the packaged walkthrough in
`qguard/resources/review/qguard-review.html`. They are not new product decisions.

| Verified QGuard fact | Interpretation / remaining review |
| --- | --- |
| QGuard assembles five teammates; honor is peer conduct feedback, separate from declared/observed official rank. | A conduct reputation score has a different purpose from estimating game skill. This is our interpretation of the skill-ranking restriction, not explicit permission for QGuard's exact formula. Show Riot what is rated and how it affects teammate selection; avoid presenting honor as a substitute VALORANT rank. |
| Available-match rank is to be fetched after RSO and confirmed/corrected before each queue. Real fetching is not implemented. | Disclose the real source and observed-versus-declared distinction. Do not treat the demonstration's fictional identity or typed Riot ID as verified ownership. Match responses can contain other participants; receiving a response is not permission to publish non-opted-in players' individual data. |
| A host manually enters a native party code; others copy it into the game. There is no game-client automation. | This relay is materially different from making private game API calls. No reviewed rule specifically prohibits this human-mediated LFG flow. Non-friend joining remains the owner's planning assumption, not a passed test or a consequence of Riot approval. |
| QGuard users coordinate in private application chat. | The older API terms' contact restriction is broad; newer documentation expressly accepts LFG and Discord tools. Our intended chat is between service members who choose to participate, not unsolicited outreach to accounts found in game data. Describe this boundary in the application; seek written clarification if its evaluation leaves the clause unresolved. Do not declare all QGuard chat prohibited. |
| Optional descriptors are self-only; individual received ratings and authors are restricted. | RSO permission for game data does not settle consent, retention, moderation or disclosure rules for QGuard-created feedback and allegations. Those remain in the owner review. |
| The guest walkthrough is fictional and isolated. Live RSO, Discord, game telemetry and normal operation remain unavailable/gated. | This is a review demonstration for an intended public product, not a request for a permanently personal-only tool. Nothing here authorizes submission, publication, real-user collection or credentials. |
| At the research baseline, the source scan found no required Riot non-endorsement boilerplate. The sample connection page explains planned sharing; the signup policy link leads to draft status. | Non-endorsement is resolved by the owner-authorized follow-up below. Privacy/consent copy still needs the approved privacy decisions and actual RSO contract before external presentation. |

The opt-in wording does not clearly require that every linked profile be exposed
to the entire internet. QGuard plans limited participant visibility. Explain that
audience accurately and confirm the disclosure with Riot if needed; do not silently
expand it to worldwide public profiles to satisfy a literal reading of “public.”

Future desktop automation is a separate question. A private cloud endpoint can
still use game-client credentials and remain outside the public developer API.
Its location on Riot servers does not authorize it. The present build contains no
such integration; do not reopen it as an assumed implementation dependency.

## Inputs to the owner's retention and launch review

**No universal number of retention days was found in the reviewed public developer
and VALORANT policies.** This is an absence finding scoped to these sources, not
permission for indefinite storage or a conclusion about applicable law.

Use three explicit categories when choosing the lifecycle:

1. **Future Riot-sourced data:** account identifiers, match/rank observations,
   response caches and copies. Plan the Riot deletion-request channel and licence
   termination handling, including logs, backups and derived copies.
2. **QGuard-origin data:** login/contact information, session membership, chat,
   peer ratings, reports, administrative access and audit evidence. Choose purpose,
   access, retention, account closure and legally required exceptions separately.
3. **Mixed records:** sessions and evidence containing both Riot identity/rank and
   QGuard feedback. Do not assume removing a token erases the data, or that every
   independent rating automatically becomes Riot Game Information. Clarify the
   affected fields and derived-data scope before implementing deletion rules.

Current development storage has no automatic business-record expiry and no real
Riot tokens/data. That is an implementation fact, not an approved public privacy
policy. Immutable submitted ratings need not imply permanent identifying records;
how erasure, restricted case evidence and score continuity interact needs an
explicit owner/legal disposition. Do not invent a retention duration here.

The existing checkpoint should settle age/countries, operator/contact, hosting and
processors, disclosure audiences, retention/deletion/backup treatment and reporting
access. Riot approval would address its platform conditions; it would not certify
compliance with all launch-country laws or authorize Discord recording. Discord
implementation/voice remains deferred under the existing decisions.

## Proposed submission preparation — not performed or newly approved

- Present the entire actual flow, including honor-based assembly, manual rank
  correction, discrepancy reports, required feedback and the guest/live boundary.
- Complete the visible non-endorsement notice and accurate privacy/opt-in copy
  after owner review. Keep game rank, peer conduct and allegations distinct.
- Confirm the applicable production-key/RSO terms and data scopes, and resolve
  any remaining conduct-ranking, limited-audience or API-derived-contact ambiguity
  through the product application. No message to Riot has been sent.
- Translate approved lifecycle decisions into verified implementation; describe
  unfinished live integrations honestly. Retain the existing post-RSO live party
  test and separate submission/public-launch authorization boundaries.

## Completion evidence and limits

Official pages were read on the research date; the comparison inspected current
local records and rendered-source files. No current Riot reviewer correspondence,
private RSO contract or live game test was available. No new owner decision was
inferred. No application, database, service, provider account or protected workflow
was changed. Verified 79 local link targets and 18 Markdown anchors with zero
failures; inspected the full new report and three linked-record diffs. Whitespace
checks passed, including the new report. Application tests were not run for this
documentation-only pass. These four files remain uncommitted for the coherent
owner-review documentation batch; no push, deployment or submission occurred.

## Owner-authorized notice follow-up — 2026-10-28

**QG-RIOT-NOTICE-1:** the owner explicitly requested displaying Riot's prescribed
non-endorsement notice wherever relevant. This authorizes the disclosure edit;
it does not approve privacy, retention, launch boundaries or external submission.
Mandatory entry and the code, content, design/rendered, privacy/legal and source
verification procedures were read. Existing research edits were preserved.

**Implementation:** the [shared Blade layout](../../qguard/resources/views/components/layout.blade.php)
now displays the full prescribed wording, substituting only QGuard for the product
placeholder. This covers public/account forms and authenticated pages using that
layout. The [prototype source](../design/qguard-review/prototype/app.js) reuses
one notice helper across its landing, auth and application footers; the documented
builder regenerates the standalone design and packaged `/guest` copy. Historical
screenshots and superseded studies are not rewritten.

**Agent placement choice:** an always-expanded, readable paragraph on its own
footer row, instead of a legal-page-only link or modal. It follows the existing
layout, remains available without signing in, and is reversible without changing
product behavior. Text uses the approved muted color at 12px with 1.6 line height;
mobile wraps naturally. No new page, tracking, consent control or data flow exists.

**Verification:** Docker Vite build and source/bundle consistency checks pass.
Rendered Chromium checks cover 15 routes at 1440×900 and 390×844, including
public/account, guest and authenticated pages using existing synthetic accounts.
They verify exact text, one notice, full viewport visibility after scrolling,
no horizontal overflow, its own footer row, text size and at least 4.5:1 contrast.
Desktop and mobile captures were also visually inspected. The complete source
diff and generated-output consistency passed review; 83 local links and 20
Markdown anchors passed with zero failures, as did whitespace checks. Broad domain tests are unnecessary for
this presentation-only change; no seed, migration or business-data reset ran.

**Version boundary:** retain these edits with the related pre-submission review
batch, rather than a separate footer-only commit. No commit, push, deployment or
Riot submission was performed. The local preview reflects the notice; all other
owner/privacy/provider gates remain as recorded.

## RSO disclosure and checkbox clarification — 2026-10-28

**QG-RSO-DISCLOSURE-1 / authority:** the owner asked whether a Terms clause or
pre-RSO acknowledgement checkbox is required, and instructed including what
Riot requires. The existing routing additionally covers this bounded source
check and connection-copy edit. No expanded sharing, live RSO, consent-storage
schema or final privacy terms were authorized.

**Verified provider statements:** the [VALORANT game policy](https://developer.riotgames.com/docs/valorant)
requires RSO opt-in plus an in-app disclosure about sharing linked player data.
It does not prescribe a separate QGuard checkbox, exact disclosure wording, or
a specific Terms clause as a substitute for that explanation. This is a finding
about the reviewed public text, not a guarantee about later RSO requirements.
Riot's [RSO explanation](https://support-developer.riotgames.com/hc/en-us/articles/22801670382739-RSO-Riot-Sign-On)
describes the player's acknowledgement of third-party data access in its OAuth
flow before the return to the application. The official-linked
[RSO implementation guide](https://docs.google.com/document/d/e/2PACX-1vTSthxkWOIqPFe8Xqqjv4Ona5pRa5W3X6bLg4I47X15gJjG9ae-HU5a0by7VIVLWdPMgB9fTr5gvQcY/pub)
also discusses privacy-policy and terms URLs as client metadata; it does not
establish a separate pre-redirect checkbox requirement. The older basic guide
was linked but its body was not readable through the available web extractor.
All sources were checked on this date; private onboarding terms remain unknown.

**Applied interpretation:** show a specific explanation on the connection screen
before the future redirect, identifying verification/rank retrieval, matching
purpose and what matched teammates see. Do not rely on a buried generic agreement
to unspecified purposes. No checkbox is added solely on the claim Riot mandates
one. This implements the owner's conditional instruction and the existing ID-02/04
flow; it does not settle the applicable legal basis or eliminate later review.

**Implementation:** the real Connections page and the prototype's unlinked,
declined and failed connection states now show the same disclosure. The existing
sample identity action remains explicitly fictional; no OAuth request, real
data sharing or consent record is created. Both generated review copies are
rebuilt. No Terms/Privacy document is fabricated: finalize those documents and
their working links during the already-pending owner review, with provider-specific
scope/consent evidence checked during actual RSO integration. Explaining the
limited teammate audience does not approve public internet profiles.

**Verification and state:** eight rendered connection-state/viewport checks pass
at 1440×900 and 390×844, including declined/failed sample linking and the real
Connections page. Copy is visible without overflow; the fictional connection
still reaches the sample dashboard. No JavaScript errors or external requests
were observed. Desktop/mobile captures were inspected. Both generated copies
match source; 86 local links and 23 Markdown anchors pass, with clean whitespace
checks. No broad domain suite was rerun for this copy-only edit. Changes remain
uncommitted in the same pre-submission review batch; no external action occurred.

## Owner disposition: web scope and later automation — 2026-10-28

**QG-RIOT-REVIEW-2:** route through product planning, deferred/owner review,
source verification, privacy/legal evidence separation and record reconciliation.
The entry path, live registers and selected procedures were read; existing
uncommitted research/disclosure changes were preserved.

- **Owner decision:** [DEC-086](../governance/decisions.md#dec-086--proceed-with-the-web-version-independently-of-client-automation)
  accepts the current web scope against the listed prohibited-feature categories
  and makes future client-automation permission independent of version one.
  [DEF-015](../governance/deferred-work.md#def-015--review-client-automation-permission-before-any-later-integration)
  retains the research and possible later Riot clarification before such an
  integration. No provider permission or new implementation is inferred.
- **Owner interpretation, not a verified provider rule:** the owner understood
  clear non-endorsement to be sufficient for branding/commercial use. Clarification
  supplied: the notice addresses affiliation; it does not replace asset/trademark
  permission or monetization conditions. The [general policy](https://developer.riotgames.com/policies/general)
  separately limits Riot-brand asset use and requires Approved/Acknowledged status,
  a free tier and added value for paid offerings. The [IP policy](https://www.riotgames.com/en/legal)
  has separate commercial-use conditions and an API-specific exception. Both were
  rechecked on this date. No new asset use or commercial model is selected here.
- **Review state:** no new change to the existing QGuard brand is requested by
  this discussion. Keep the already-added notice. Remaining actual privacy,
  retention, launch and provider-integration matters stay in the owner packet.
  Avoid reopening the generic client-automation question during that web review.

This is a records-only disposition. No application, design, database, live test
or service changed in this follow-up; no message was sent to Riot. Keep it in the
ongoing review batch rather than committing this single owner reply separately.
Verification: inspected the scoped record changes; 162 local link targets and
45 Markdown anchors passed with no failures, as did whitespace checks. No
application tests were rerun for this records-only follow-up.

## Explicit Opt-In Policy Audit — 2026-10-28

**QG-RSO-POLICY-AUDIT-1:** the owner supplied both Riot paragraphs and requested
a careful fit check so neither is missed. The same text was rechecked on the
[official VALORANT page](https://developer.riotgames.com/docs/valorant). This is a
bounded source/repository audit and authorized disclosure/spec clarification,
using the existing research, privacy/legal, audit, code/content and rendered-review
routes. It does not activate live RSO or reopen the audience decision.

**Result:** the planned signup → disclosed RSO opt-in → limited teammate display
flow is consistent with the stated requirements. Actual live compliance remains
unverified because no real RSO or subject-specific sharing control is implemented.
The word public is retained as source evidence; it does not by itself instruct us
to expose everyone globally. QGuard's submission must accurately explain its
limited teammate/session audience. The provider's actual review remains separate.

| Requirement / finding | Inspected evidence and disposition |
| --- | --- |
| Signup and opt-in must both precede other-player data display | ID-01/02/04 already plan account creation and linking. Added explicit [ID-10](../specs/review-version/identity-and-rank.md#id-10--subject-opt-in-before-display-to-other-players): check the subject's consent, not merely the viewer's login. RSO proof is not a typed ID, email verification, general Terms acceptance or a fictional connection. |
| An in-app sharing disclosure is also required | Connections and the prototype already describe purpose, fields and teammate audience. Added an explicit signup-and-linking prerequisite sentence and rebuilt both review copies. No checkbox is claimed to be mandated. |
| API responses may include people who never joined QGuard | ID-10 now explicitly forbids treating one linked user's match response as permission to display all other participants. Added negative cases for non-member opponents/teammates and positive audience-scoped cases. |
| Current runtime guard is broader than future per-person consent | `ReviewVersion`, `QueueService`, `Matcher` and `RankConfirmation` restrict operational matching to guarded synthetic testing; `GuestReviewController` serves fictional state with network/form restrictions. These do not constitute an implemented live RSO policy. |
| Existing room/history readers authorize participation, not live subject consent | `Room` and `ReviewDetail` select retained roster identity/rank snapshots after participant checks. Before live Riot data is introduced, those reads and any cache/broadcast/export paths need ID-10 enforcement. Storage immutability cannot silently authorize later display. |

**Later contract boundary:** record reliable opt-in evidence and define known
unlink/revocation propagation, historical-field display and copy handling before
live release. Retention/deletion choices remain in the owner packet; this audit
does not pick a duration or migrate stored records. Existing synthetic-test modes
must not become a shortcut for real player availability.

**Evidence limits:** the code paths and existing gate-test source were inspected;
no database reset or real-provider test was run. The earlier passing synthetic
tests are not evidence that future consent enforcement exists. This pass changes
disclosure copy, specs and review records; no live data or consent is captured.

**Completion evidence:** eight connection-state/viewport checks passed at desktop
and mobile sizes with the added prerequisite sentence, no overflow, JavaScript
errors or external requests; sample navigation still works. The mobile rendering
was inspected. Both generated review copies match source. Reviewed the scoped
diff; 173 local links and 53 Markdown anchors passed with no failures, together
with whitespace checks. Live consent enforcement tests remain future acceptance
work under ID-10. Changes remain uncommitted with the related review batch; no
push, deployment or Riot submission occurred.

### Owner Clarification: Own-Rank Retrieval Only — 2026-10-28

The owner confirms that the first version consults Alice's prior matches solely
to obtain Alice's latest available rank after her opt-in. Looking up, analyzing
or displaying other participants' statistics is outside that use case. Recorded
in DEC-055 and ID-05; ID-10 remains the live consent/filtering requirement rather
than a proposal to add other-player statistics. An API response may contain
extra participants, so receiving a response and using each participant's data
must remain distinct. Extract the linked player's rank and required source
evidence; ignore unrelated participant data rather than storing the full payload.

This is an owner scope clarification under the existing product-planning,
privacy/data and reconciliation route. It introduces no live API access, new
product feature or provider-compliance certification. The audit's prior example
was a filtering safeguard, not evidence of a planned non-member statistics feature.

Verification: reviewed the scoped clarification and its DEC-055/ID-05 agreement;
174 local link targets and 53 Markdown anchors passed with no failures, together
with whitespace checks. This follow-up changes records only; application tests
and live-provider checks were not run. Retained in the ongoing uncommitted review
batch; no push, deployment or provider submission.

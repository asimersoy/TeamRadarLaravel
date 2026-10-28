# Retention, Account Closure And Initial Audience Review

- **Date / task:** 2026-10-28, QG-OWNER-BOUNDARIES-1.
- **Status:** primary-source findings and owner-direction reconciliation; no
  legal certification, live implementation or public release approval.
- **Current sequencing:** DEC-092 (2026-10-29) defers deletion/retention work
  until after RSO implementation. See the follow-up below; earlier next-work
  wording describes the preceding discussion, not a current local-build blocker.
- **Authority:** owner answers to checkpoint groups one through four;
  DEC-087–090 record the dispositions. Group five (hosting/email/operator
  particulars and final policies) stays for a separate discussion afterward.
- **Baseline:** `new-development`, `b3d505b`, with the existing uncommitted
  provider-review batch preserved. No application, database or protected workflow
  changes. Owner directions, verified facts and proposals below are distinct.
- **Route:** mandatory entry path and current registers; product planning,
  research/sourcing, privacy/data/legal, decision safety, external owner review,
  audit/reconciliation and deferral/owner review. Primary agent researches and
  reconciles; owner selects unresolved policies. Check links, scoped diff and
  whitespace; retain with the meaningful review batch rather than commit a reply.

## Retention: Direction And Constraint

**Owner direction:** keep business records indefinitely for now if permitted,
without routine age-based purges; preserve record/event timestamps so a later
retention policy can select records by date. This means no scheduled expiry,
not no retention. It does not extend authentication-token or cache lifetimes.

**Verified provider evidence:** the reviewed Riot pages do not prescribe a
universal number of retention days. The API terms describe forwarding end-user
deletion identifiers to developers and require deleting Game Information when
the API licence ends. VALORANT's documentation links those terms, whose displayed
date and some wording are old. Later application-specific terms remain to review.
Deleting credentials alone does not delete previously retrieved rank/identity
data. [Riot API terms](https://developer.riotgames.com/terms),
[VALORANT documentation](https://developer.riotgames.com/docs/valorant).

**Applicable-law issue:** Türkiye's Law 6698 Article 4 limits storage to the
statutory period or the period needed for the processing purpose. Article 7
requires disposal when processing conditions cease; Article 11 includes
correction/erasure rights. Riot's silence therefore cannot establish unrestricted
retention. Where GDPR applies, the European Commission likewise describes
purpose-based storage limits and review/erasure time limits. This report does
not determine every launch jurisdiction or prescribe arbitrary retention days.
[KVKK law](https://www.kvkk.gov.tr/Icerik/6649/Personal-Data-Protection-Law),
[European Commission principles](https://commission.europa.eu/law/law-topic/data-protection/information-business-and-organisations/principles-gdpr_en).

**Disposition:** DEC-087 records the conditional preference, not an approved
public promise to retain every identifiable record forever. Existing synthetic
development storage continues. Before real use, justify the purpose and handling
of each record class and required erasure events, including reported evidence.

## Account Closure Is Not Automatically Erasure

**Owner direction:** stop login/use after closure and hard-remove the user's
Riot connection material; prefer preserving needed QGuard feedback/report
relations through soft deletion and hiding/removing the name. The complete
method is still provisional: the owner explicitly says this needs a larger
discussion. Do not turn that preference into an approved universal erasure method.

RSO connection material comprises provider credentials and account mapping,
not simply a permanent access code. The live contract must cover stored access/
refresh credentials where issued, identity association, known consent withdrawal
and retained provider-sourced copies. No live RSO storage exists yet.

KVKK distinguishes erasure (inaccessible and non-reusable to relevant users),
destruction (unrecoverable by anyone), and anonymisation (not re-identifiable,
including through other data). A Laravel soft-delete flag plus continued broad
admin/business access does not by itself demonstrate any of those outcomes.
A method that genuinely restricts all relevant access may be assessed separately;
physical row deletion is not asserted to be the only legally available method.
[KVKK disposal rules](https://www.kvkk.gov.tr/Icerik/5441/KISISEL-VERILERIN-SILINMESI-YOK-EDILMESI-VEYA-ANONIM-HALE-GETIRILMESI-HAKKINDA-YONETMELIK).

Replacing a visible name while retaining email, Riot ID, stable account links,
chat identifiers or reversible mappings does not establish anonymity. The
European Commission distinguishes pseudonymous from irreversibly anonymous
data, and explains that justified legal-claim/other exceptions can affect erasure.
[Personal-data definitions](https://commission.europa.eu/law/law-topic/data-protection/information-business-and-organisations/application-gdpr_en),
[erasure requests](https://commission.europa.eu/law/law-topic/data-protection/information-business-and-organisations/dealing-requests-individuals_en).

**Agent proposal, not adopted:** separate immediate account deactivation from
the completed data-erasure process. Remove unnecessary identifying/provider
material; keep non-identifying score effects or relational evidence only where
the actual design and permitted purpose support that retention. Any identifying
case hold needs a purpose, restricted use and an end/review condition. Do not
erase other people's records or recalculate honor merely because an author closes
an account. Nor promise retained records are anonymous without testing linkage.
The precise treatment of authorship, descriptor reviewer counts, allegations,
snapshot identities, requests, backups and restored copies is still unresolved.

## What Gankster Publishes

The inspiration source is Gankster's own published policy, not evidence of its
database implementation. Both pages display March 8, 2023; reviewed 2026-10-28.

- Its [Terms](https://gankster.gg/terms/) require age 18 or legal parental/
  guardian consent; below 18 the parent/guardian agrees on the minor's behalf.
- Its [Privacy Policy](https://gankster.gg/privacy-policy/) says under-16s are
  not the intended audience, then permits an exception with parental consent.
  It describes necessary business/lawful retention, erasure after withdrawal with
  stated exceptions, rights to correction/deletion and need-to-know security access.

These are useful topics to cover, not QGuard permission to copy legal text,
assume the same legal basis, reproduce their under-16 exception or claim the
same safeguards. Their policies do not support blanket permanent soft deletion.

## Minimum Age: Evidence And Open Choice

Riot's own [Barcelona event FAQ](https://valorantesports.com/en-GB/news/barcelona-finals-know-before-you-go)
identifies VALORANT as PEGI 16. Its event's entry restriction is not a universal
game-account rule. The PEGI database page could not be retrieved in this research;
the rating statement here is attributed to Riot.

[Riot's Terms §1.1](https://www.riotgames.com/en/terms-of-service) require an adult,
emancipated minor or valid parental/guardian consent. Its current
[age-verification guidance](https://support.riotgames.com/en-us/riot/account/age-verification)
says the consent threshold varies by region. There is no single worldwide number
established by these sources. A game's content rating, Riot account eligibility,
QGuard contract/data consent and contact with strangers are separate issues.

**Owner constraint:** do not admit someone below the applicable VALORANT minimum;
research the additional QGuard boundary. At the 2026-10-28 research stage no
exact age was selected. **Options presented:** 18+ for the initial release, or a 16+ direction with a
defined parental-consent process for 16–17-year-olds, still subject to applicable
game/regional eligibility. The former avoids initially building the latter
process; neither is a complete safety/privacy guarantee. No timeout or preselected
response becomes approval. Do not assume RSO gives QGuard verified age or
parental permission.

**Owner resolution, 2026-10-29:** the explicit reply selects “18+ for the first
release,” recorded as DEC-091. No under-18 parental-consent route is included.
SC-06/ID-11 carry the rule; the exact age-check method/data are still to specify,
not implemented by this response. Do not reopen the minimum-age choice.

## Settled Admin And Market Direction

- DEC-089 selects one owner-operated super-admin account and one administrative
  role for project evidence and privacy/security requests. No staff-role hierarchy
  now. Keep authentication, access logs and secret protection; full project access
  does not mean displaying credentials or creating unrelated punishment tools.
- DEC-090 selects the EU game region, English and Turkish localization and a
  likely Türkiye-first commercial/community focus, with international expansion
  possible. A game shard is not a legal country list or a hosting location.
- Feature descriptions must distinguish the prototype's intended future flows
  and fictional examples from genuinely operating features after integration and
  validation. “Claims” means those statements, not a new marketing deliverable or
  a promise of guaranteed safe/non-toxic teammates.

## Repository Evidence And Next Work

The October 28 migration has event dates for feedback submission/application,
party-code versions, closure and offers. Some child records use a parent's event
time; aggregate descriptor state has an update time. Existing first-pass tables
similarly mix direct and parent-derived dates. Migration filenames are schema
history, not per-record creation dates. Preserve meaningful record/event UTC
timestamps and audit coverage before a later purge feature; this is not a claim
that every table has both Laravel timestamp columns.

`User` currently has `admin_cleared`, not an enforced one-super-admin model or
completed soft-deletion process. Existing UI copy is English; a queue's language
choice does not prove Turkish interface localization. New admin/localization/
closure requirements are recorded for a coherent later implementation slice.
No account was changed, deleted, created or granted authority in this review.

Immediate remaining owner discussion: qualified retention/erasure treatment;
minimum age is now resolved by DEC-091. Age-check method/data require a later
contract. Group five remains deliberately outside this pass. Party-code,
Discord and real RSO tests keep their existing later gates. No live provider,
age-verification, deletion or anonymisation capability was tested.

## Completion Evidence

Reviewed the changed decisions, specs and progress records against the explicit
owner directions and dated primary sources. Local documentation checks passed:
208 targets and 61 heading anchors, no failures; whitespace checks passed for
tracked changes and this new report. No application or rendered test was needed
for this records-only pass; no claim is made that newly recorded policies are
implemented. Changes remain uncommitted in the ongoing owner-review batch.
No push, deployment, Riot submission, account mutation or destructive operation.

**Age-answer reconciliation, 2026-10-29:** DEC-091 records the explicit 18+
answer. The existing product/privacy, owner-review and reconciliation route
applies; updated scope/admission requirements, current state, owner queue and
open-question dispositions. Checked the scoped changes and remaining age-open
references: 210 local links and 61 anchors passed, as did whitespace checks.
No fresh factual research, application/live tests or account changes were needed.
The rule is recorded, not implemented; age-check design remains separate. Keep
this with the existing uncommitted review batch; no remote action occurred.

## Deletion Deferral And Age Disclosure Follow-up — 2026-10-29

**Owner decision:** DEC-092 defers deletion and scheduled expiry implementation
until after RSO implementation. DEF-012 now carries that return condition instead
of requiring the detailed disposal contract before Riot submission. The earlier
closure direction remains; no expiry, erasure, anonymisation or account mutation
is performed now. Real-data handling and external delivery remain distinct from
local implementation against fictional records.

**Verified source boundary:** Law 6698 Articles 2–3 cover automated personal-data
processing, including storage. Public launch is not their applicability trigger.
Private testing with real identities can therefore raise the same obligations;
the current fictional prototype does not require a live deletion feature merely
to continue development. Review the actual handling before a real-data test,
without assuming that the whole automated disposal feature must be built now.
Riot's general policies also require lawfulness. Its API terms describe forwarding
deletion identifiers and require removing Game Information at licence termination;
the reviewed text does not impose a universal routine-expiry period.
[Law 6698](https://www.kvkk.gov.tr/Icerik/6649/Personal-Data-Protection-Law),
[Riot general policies](https://developer.riotgames.com/policies/general),
[Riot API terms](https://developer.riotgames.com/terms). Rechecked 2026-10-29.
This separates published requirements from the owner's timing preference; it is
not a determination that a particular future deployment is compliant.

**Age question and recommendation:** 18+ remains the owner's selected audience.
The owner asks whether stating it in Terms is enough for now; this question is
not approval of a particular live assurance mechanism. No specific QGuard age
checkbox, date-of-birth form or identity-document check was found in the reviewed
[VALORANT developer documentation](https://developer.riotgames.com/docs/valorant)
and general policies. The API terms' developer legal-contract-age statement does
not prescribe QGuard player onboarding. For the synthetic prototype, recommend
the Terms rule plus a visible signup sentence: “QGuard is for players aged 18 and
over.” This is communication, not proof of age or a real-release legal verdict.
Collect no new age data as part of this documentation task. The later admission
contract should choose only what the actual use and applicable requirements need.

**Readiness:** the DEC-085 core local implementation is already complete. No new
foundational product decision blocks further bounded local work. Reconcile the
one-super-admin model, English/Turkish interface and age-rule presentation in
their implementation slices. Hosting/email/operator/final policies remain group
five before external delivery; live RSO requires provider access, and game-entry
checks retain their existing return condition. Deferred deletion is not silently
reactivated. No code, schema, protected workflow or external account changed.

**Route and verification scope:** same product/research/privacy/decision-safety,
owner-review, audit and deferral route as above; the latest explicit owner timing
change controls. Reconcile current indexes, specs, decision/deferral records and
review queue, then check local links, anchors, scoped diff and whitespace. Retain
the result with the ongoing review batch; no per-reply commit or application
test is needed for these documentation-only changes.

**Completed checks:** reconciled the affected record changes and supersession
references; 317 local targets and 68 Markdown anchors passed with no failures.
Tracked whitespace and this new report's whitespace checks passed. Application
and live-provider tests were not run for this documentation-only update. The
existing review batch remains uncommitted; no push, deployment or submission.

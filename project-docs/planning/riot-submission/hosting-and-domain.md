# Hosting and domain plan

**Task:** QG-HOSTING-1. **Initial check:** 2026-10-29; budget/email follow-up 2026-10-30.
**Status:** all-Laravel-Cloud provider choice approved; domain and deployment details pending.
**Authority:** owner requested settling hosting/domain; DEC-093/094 control
operator type and cost/scaling priorities; DEC-099 selects the initial provider.
**Baseline:** `new-development`, `1764614`, initially clean working tree.
**Owner:** project owner selects provider/domain/budget; agent prepares evidence.
**Update trigger:** owner answer, changed provider prices, domain availability,
review artifact requirements or live workload.

**Current decision:** DEC-099 selects all-Laravel-Cloud hosting and approximately
$50/month as the point to reassess actual usage, performance and revenue before
expanding spend. The owner prefers convenience initially and can scale on Cloud
when the economics justify it. The [lower-cost comparison](hosting-lower-cost-options.md)
is retained research, not an active split-provider plan. Resource sizes below
remain untested proposals. This choice does not activate a hard spending cutoff
or authorize provisioning, purchases or deployment.

## Route and scope

Mandatory entry and project registers read. Selected product planning, research,
decision/recommendation safety, external owner review, deployment readiness and
interruption/recovery procedures, plus always-applicable system documents and
project workflow governance. This is an informational commercial recommendation,
not a change to player matching. No delegation or application implementation.

Compare a bounded shortlist against low initial cost, managed Laravel operation,
growth without rebuilding, PostgreSQL, scheduled work, queues, Reverb and HTTPS.
Check domain registry evidence separately from registrar prices. Preserve all
approved product/data decisions. No purchase, account creation, DNS change,
deployment, provider contact or Riot submission is included. Final policies and
operator contact remain their existing separate discussion.

Verification: inspect actual requirements; use dated primary provider sources
and public registry responses; check arithmetic, local links and scoped diff.
Keep this with the ongoing hosting decision batch, not a commit per reply.

## Existing facts and owner priorities

- DEC-093: owner personally operates QGuard; no domain/hosting/email exists by
  owner report. No public identity/address is inferred from machine metadata.
- DEC-094: minimize initial expense; prefer capacity/tier upgrades to rebuilding;
  autoscaling and scale-to-zero desirable. No numeric ceiling selected.
- Actual application lives in `qguard/`, not the legacy repository root.
  `qguard/composer.json` requires PHP 8.5 and Laravel 13.17 or compatible later
  releases; Compose uses PostgreSQL 18 and database-backed queue/cache/sessions.
- `qguard/routes/console.php` schedules matching every five seconds and deadline/
  settlement commands every second. Production Compose defines a queue worker
  polling every second. These are active-work dependencies, not a sleeping blog.
- The [prepared review bundle](README.md) is static and fictional. Hosting it
  needs no database, queue, scheduler, Reverb or live RSO. The full Laravel backend
  is a separate artifact. `DevelopmentBoundary.php` deliberately blocks production
  HTTP access unless public use is enabled; do not enable real admission just to
  expose a reviewer demonstration.

## Selected provider and remaining configuration proposals

Use **Laravel Cloud** for the application, PostgreSQL and Reverb under DEC-099.
**Starter** remains the proposed initial plan, with **Frankfurt** as the proposed
region. Keep the domain at a separate registrar; prefer **playqguard.com**,
provisionally through **Porkbun**. Domain/registrar and region are not selected.
Preserve QGuard as
the visible product name. Frankfurt is a geographic/operational proposal for
the EU/Türkiye audience, not measured latency or a legal residency conclusion.

Cloud supports our PHP version [S3], managed PostgreSQL [S4], background processes
[S5] and managed Reverb [S6]. Custom domains receive automatic SSL issuance and
renewal [S7]; there is no separate certificate purchase. Docker Compose remains
the local environment. Cloud deployment needs its own root/build/environment/
service mapping; it is not an untested upload of the existing Compose file.

Starter can host the initial review presence. Upgrade the same application to
Growth when horizontal autoscaling or separate worker compute is needed. This
avoids choosing a new host solely because traffic grows. It does not promise
unlimited scale without application changes: multi-instance scheduling, shared
state/locks, matcher throughput and database connections still need load and
failure testing. No scale-to-zero rewrite or queue-driver change is selected here.

### Costs and what scale-to-zero actually means

Current plans [S1/S2]: Starter is **$5/month**, Growth **$20/month**, each including
**$5 usage credit**, with further usage charged separately. Starter has one app
replica; Growth includes horizontal autoscaling up to ten by default. The first
Starter month is free; recurring planning below does not rely on that promotion.

Frankfurt resource rates, observed in the live pricing page's regional table:

| Resource | Price / assumption |
| --- | --- |
| Flex 512 MiB app | $7 monthly compute cap |
| Flex 1 GiB app | $14 monthly compute cap |
| Minimum Postgres compute | 0.25 × $0.106/hour |
| Postgres storage | $0.50/GB-month |
| Smallest Reverb cluster | $5/month; 100 concurrent connections, 200,000 messages/day |

**Illustrative live baseline, not a capacity test or quote:** one 1 GiB app
sharing its compute with one worker and the scheduler; Postgres at 0.25 units
for 730 hours; 1 GB storage; smallest Reverb. Resource usage is approximately
`14 + (0.25 × 0.106 × 730) + 0.50 + 5 = $38.845`.
Starter total is `5 + max(0, 38.845 − 5)`, approximately **$39/month**. Growth
with the same resources would be about **$54/month**; an additional 1 GiB worker
cluster would bring that example to about **$68/month**. These are alternatives,
not an approved deployment size or bill cap. A larger database or more replicas
increases costs. Domain, email, taxes, exchange fees, additional storage/backup
usage, bandwidth overages and other add-ons are excluded. Confirm actual regional
resource settings and a full estimate before provisioning.

A review-only environment with one 512 MiB compute instance and none of those
backend resources models roughly **$5–7/month** before extras, depending on sleep.
Its dedicated serving/build configuration has not been prepared or deployed.

The frequent QGuard scheduler can prevent the app from sleeping; its shared
database cache locks and queue polling can also keep PostgreSQL awake. Cloud
explicitly documents this behavior [S8/S9]. Queued work by itself does not wake a
sleeping app [S9]. Therefore budget the present live design as continuously
running; do not promise the bill will scale to zero whenever the queue is empty.
An event-driven redesign could be considered later, with its own verified timing
contract, if savings justify it. It is not required to choose a host today.

Cloud offers alerts and an optional stop-compute spending limit [S10]. The
default is alerts only. Stopping compute can interrupt the service; storage
continues to accrue charges and in-flight work can cause an overrun. A ceiling
and the desired response to reaching it need owner choice before provisioning.

### Alternatives considered

| Option | Fit and trade-off |
| --- | --- |
| Laravel Cloud throughout | Recommended for managed Laravel resources and staying on one application platform as it grows. Minimum plan fee applies even to a quiet review site. |
| Cloudflare Pages for review, Laravel Cloud later | Static asset delivery is free [S11]. It can serve our existing review bundle, not the current PHP/PostgreSQL application. Cheapest review phase; later add Cloud hosting and change DNS, without rewriting QGuard. |
| Render | Supports web services, workers, PostgreSQL and Docker [S12]. Credible alternative, but requires mapping the Laravel services into more separately managed components. No verified like-for-like cost advantage was established; not recommended over Cloud on current evidence. |

No provider signup, capacity measurement or deployment was performed. For the
immediate reviewer-only phase, free static hosting is a valid cost choice, not
evidence that the complete live service can run for free.

## Domain evidence

Read-only registry RDAP requests on 2026-10-29 returned:

| Candidate | Registry observation | Recommendation |
| --- | --- | --- |
| `qguard.com` | Verisign HTTP 200; registered since 2003-06-30 | Do not assume ordinary registration is possible; no aftermarket negotiation proposed |
| `qguard.app` | Google registry HTTP 200; registered since 2026-03-13 | Already registered |
| `playqguard.com` | Verisign HTTP 404, no record | Preferred candidate: clear gaming wording, works beyond one game |
| `getqguard.com` | Verisign HTTP 404, no record | Alternative if the owner prefers a general product/download name |

Registry absence is not a reservation, registrar checkout result, guaranteed
price or name-rights clearance. Recheck before any authorized registration.
Porkbun's standard non-premium `.com` registration and renewal price is currently
**$11.08/year** [S13]. `.gg` is materially dearer at **$51.80/year** in the same
table; no `qguard.gg` availability claim is made. One `.com` is sufficient for
this recommendation; no defensive-domain bundle is proposed.

## Starter configuration and email estimate — 2026-10-30

**Owner authority:** DEC-097 selects pricing before the owner's budget choice.
It does not approve a final configuration, email provider or subscription.

The lowest supported app size is 512 MiB; its sufficiency for QGuard has not
been established. Price it as a test candidate, with 1 GiB as the agent's
recommended initial full-backend size. The additional $7/month buys memory
headroom for web requests, scheduler subprocesses and one queue worker. This is
an engineering estimate, not a measured minimum, concurrent-user guarantee or
reason to upgrade to Growth. Both sizes fit the Starter offering.

Proposed initial full-backend configuration:

- One Frankfurt Flex app, one replica, PHP 8.5, rooted at `qguard/`.
- One database-queue worker sharing app compute. Use Cloud's scheduler for the
  existing commands; no dedicated worker cluster or second scheduler process.
- Managed PostgreSQL, minimum 0.25 compute units, with 1 GB-month storage used
  for the estimate. Database version, backup settings and actual storage require
  confirmation. Raising database compute increases the estimate.
- Managed Reverb's smallest plan. Its 100 connections are simultaneous socket
  connections, not registered users; multiple tabs can consume multiple slots.
- Existing database cache/session drivers. No paid Redis/Valkey, object store,
  managed-queue add-on, separate staging environment or monitoring add-on is
  included. The inspected current app has no file-upload storage dependency.
- Resend Free for low-volume verification/password-reset emails. Laravel Cloud
  offers direct account integration; SMTP is also available [S14/S15]. A mailer
  configuration entry alone does not prove live delivery or SDK installation.

| Monthly item | 512 MiB test candidate | 1 GiB recommended starting estimate |
| --- | ---: | ---: |
| Starter subscription | $5.00 | $5.00 |
| App compute, continuous operation | $7.00 | $14.00 |
| PostgreSQL compute, 0.25 × $0.106 × 730 hours | $19.35 | $19.35 |
| PostgreSQL storage assumption, 1 GB-month | $0.50 | $0.50 |
| Managed Reverb | $5.00 | $5.00 |
| Initial transactional email within free limits | $0.00 | $0.00 |
| Included Cloud usage credit | −$5.00 | −$5.00 |
| **Estimated total** | **$31.85 ≈ $32** | **$38.85 ≈ $39** |

The Frankfurt resource rates above were directly inspected on October 29;
Cloud's plan/worker documentation and Resend's current pricing/quotas were checked
on October 30. These are recurring estimates, not promotional first-month prices.
Domain, tax/currency conversion, operator contact mailbox, extra storage/backup
charges, resource growth and bandwidth overages are outside this comparison.
DEC-099 now sets a roughly $50/month hosting review point, not an enforced spending
limit. Alerts and a stop-compute limit have the different availability/cost
consequences described above; their actual configuration remains open.

Resend Free allows 3,000 emails/month and 100/day, with incoming mail also counted
if enabled [S16]. Treat that as emails, not users: verification resends and password
resets consume the same allowance. Actual signup volume is unknown; this is a
low-volume assumption, not a guarantee that open launch fits free email. Resend
Pro currently starts at $20/month for 50,000 emails and removes the daily cap
[S15], making the 1 GiB example about $59/month if selected later. Do not enable
paid upgrades or overages without owner authorization. Public contact/reply
handling is not solved by choosing an application sender.

Current code evidence: `qguard/app/Models/User.php` sends verification/reset
notifications; `qguard/config/mail.php` supports SMTP and a Resend transport entry.
The static review bundle sends no mail and still needs none of these backend
resources. Its separate $5–7 Cloud estimate remains the cheapest proposed
review-only presence on this provider.

Before calling either backend size sufficient, test concurrent five-player
acceptance/session traffic with the worker and scheduler active, including
memory pressure, overdue work, database queries, websocket delivery and a deploy
restart. A local Docker measurement is not proof of Cloud's runtime behavior.
No load test was run for this pricing pass, and no production capability was
enabled. Do not represent the fictional reviewer bundle as the live backend.

**Owner disposition:** DEC-098 requested cheaper full-backend research; after
reviewing that comparison and scaling trade-offs, DEC-099 selects all Cloud with
a roughly $50 hosting reassessment point. Do not re-open the provider choice or
the earlier $45-target question as unanswered. Review-only hosting remains a
separate artifact/configuration question, not a replacement for the backend.

## Owner questions and next work

**Budget clarification, 2026-10-30:** the owner requested reissuing the budget
question using Laravel Cloud as the working basis. They expect to start on
Starter if sufficient and consider Growth if needed. Their references to
$10–25/$25–60 and a $20 plan are discussion context, not an approved total
budget or purchase. Explain that both tiers are managed and that plan fees
and resource charges differ; do not frame the choice as lean versus managed.
The current pricing documentation was rechecked on this date. A $20 Growth
subscription includes $5 usage credit, not $20 of bundled app/database capacity.
First-review and full-backend costs must stay distinct. The owner has now chosen
the concrete-estimate-first option in DEC-097; the section above supplies that
estimate. Do not re-ask that sequence question or infer a numeric budget from it.

1. Provider choice is settled by DEC-099. Prepare the initial Cloud configuration
   and review-artifact delivery plan without introducing a second host by default.
2. Select the preferred domain; availability must be rechecked at purchase.
3. Before provisioning, translate the roughly $50 review point into explicit
   alerts/limits and total-charge expectations, settle exact resources/region
   and authorize the particular external actions.
4. Continue group five with an operator contact mailbox, transactional email
   needs and final Terms/Privacy using actual provider/location/logging facts.
   Hosting/domain choice alone does not complete or approve those policies.

After selection, prepare the bounded provider-specific deployment plan, review
access boundary, migration/backup/restore and rollback checks. Do not silently
choose a different PostgreSQL major version; verify PostgreSQL 18 availability
or test and review a deliberate compatibility change. Live RSO, game-party
checks and public release retain their existing gates.

## Primary source ledger

Initial checks were on 2026-10-29; S2/S5 were rechecked and S14–S16 added on
2026-10-30. Publisher facts describe offered capabilities, not a successful
QGuard deployment. Prices and availability must be refreshed before use.

| ID | Publisher / source | Supports / limits |
| --- | --- | --- |
| S1 | Laravel, [Cloud pricing](https://laravel.com/cloud/pricing) | Current plans; regional UI inspected with Frankfurt selected, Compute/Postgres/Reverb tables. No account or checkout. |
| S2 | Laravel, [Plans and pricing](https://laravel.com/cloud/docs/pricing) | Credits, plan limits, metering and upgrades. Older `marketing.cloud.laravel.com` search results advertise different Starter terms and were not used as current authority. |
| S3 | Laravel, [Runtimes](https://laravel.com/cloud/docs/runtimes) | PHP 8.5 supported. Does not prove our build passes. |
| S4 | Laravel, [Serverless Postgres](https://laravel.com/cloud/docs/resources/databases/postgres) | Managed Neon, same-region requirement, resizing/recovery. Exact major-version offering not established in this pass. |
| S5 | Laravel, [Workers](https://laravel.com/cloud/docs/workers) | Shared app processes versus separate worker clusters. |
| S6 | Laravel, [WebSockets](https://laravel.com/cloud/docs/resources/websockets) | Managed Reverb and environment integration. |
| S7 | Laravel, [Domains](https://laravel.com/cloud/docs/domains) | Automatic SSL and DNS attachment; registration separate. |
| S8 | Laravel, [Scheduled tasks](https://laravel.com/cloud/docs/scheduled-tasks) | Frequent wakeups and cache activity can prevent sleep. |
| S9 | Laravel, [Compute](https://laravel.com/cloud/docs/compute) | Sleep/wake behavior; queue jobs do not themselves wake app compute. |
| S10 | Laravel, [Spending limits](https://laravel.com/cloud/docs/spending-limits) | Alerts versus stop-compute, continuing storage and possible overrun. |
| S11 | Cloudflare, [Pages pricing](https://developers.cloudflare.com/pages/functions/pricing/) | Free static requests; not Laravel runtime hosting. |
| S12 | Render, [Service/pricing overview](https://render.com/pricing) | Docker, web/worker/database offerings; no complete QGuard bill verified. |
| S13 | Porkbun, [Domain prices](https://porkbun.com/products/domains) | Standard TLD fees, not candidate-specific purchase guarantee. |
| S14 | Laravel, [Email integration](https://laravel.com/cloud/docs/resources/email) | Direct Resend connection and alternative providers through configuration. No account connection performed. |
| S15 | Resend, [Transactional pricing](https://resend.com/pricing) | Free and Pro costs; published limits, not verified delivery for QGuard. |
| S16 | Resend, [Account quotas and limits](https://resend.com/docs/knowledge-base/account-quotas-and-limits) | Daily/monthly quotas, inbound counting and recipient accounting. |
| D1 | Verisign, [qguard.com RDAP](https://rdap.verisign.com/com/v1/domain/qguard.com) | Existing registration, public registry response. |
| D2 | Verisign, [playqguard.com RDAP](https://rdap.verisign.com/com/v1/domain/playqguard.com) | HTTP 404 at check; expected absent-record URL. |
| D3 | Verisign, [getqguard.com RDAP](https://rdap.verisign.com/com/v1/domain/getqguard.com) | HTTP 404 at check; expected absent-record URL. |
| D4 | Google Registry, [qguard.app RDAP](https://pubapi.registry.google/rdap/domain/qguard.app) | Existing registration, public registry response. |

## Verification and handoff

Repository requirements, provider tables and public registry responses were
inspected. Cost arithmetic and local document targets are checked alongside the
scoped diff. No runtime test was needed for research-only edits; hosted behavior,
resource sufficiency, latency, database-version compatibility and registrar
checkout remain untested. No services started. Canonical workflow untouched.
No external state changed. DEC-099 subsequently closes the hosting provider
choice; the research and decision form one local documentation batch. Domain
selection and concrete deployment particulars are next.

October 30 follow-up: inspected current app mail use and resource definitions;
checked email quotas, refreshed provider plan/worker facts and verified arithmetic.
The default Compose project's read-only inventory returned no containers; this
does not assert that every differently named project or Docker context is empty.
No process was started, stopped or benchmarked. DEC-099 now records the owner's
all-Cloud choice and roughly $50 monthly reassessment point. Local links, scoped
diff and cost arithmetic were checked for the coherent research/decision commit;
no new runtime or provider test is claimed.

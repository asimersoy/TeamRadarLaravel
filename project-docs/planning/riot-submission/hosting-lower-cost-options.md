# Lower-cost full-backend hosting options

**Task:** QG-HOSTING-1 follow-up. **Checked:** 2026-10-30.
**Status:** retained alternative research; DEC-099 subsequently selects all Cloud.
**Authority:** owner requested investigating a cheaper full backend before choosing
a budget; DEC-094/097/098. **Owner:** project owner makes the commercial choice.
**Baseline:** `new-development`, `1764614`, preserving the ongoing uncommitted
hosting documentation. **Update trigger:** owner choice, pricing/capacity changes,
measured workload or deployment configuration.

**Current disposition:** the owner selected all-Laravel-Cloud hosting in DEC-099
with about $50/month as a reassessment point. The alternatives/recommendations
below preserve the comparison that informed that choice; they are not selected
deployment plans. Return to them if measured costs/traction warrant reconsidering.

## Scope and evidence

Continue the research/product/decision-safety/owner-review/deployment-readiness
route in the [hosting proposal](hosting-and-domain.md#route-and-scope). No code,
database, scheduler, queue, data-policy or protected-workflow changes. No agents
delegated, resources provisioned, providers contacted or synthetic/live data sent.

The earlier $39 estimate was an all-Laravel-Cloud configuration with managed
Postgres, not the minimum price of every managed solution. The owner did not
accept the $10/$45 planning targets. This comparison examines the largest cost
component first: the approximately $19.85 continuously awake database.

## Comparison using the same application size

Keep one Frankfurt Laravel Cloud Starter 1 GiB app ($14), shared app worker and
scheduler, managed Reverb ($5), and transactional email within Resend Free's
limits ($0). Cloud's $5 fee is offset by its $5 usage credit at this usage level.
That makes **$19/month before the database**. These are low-volume estimates,
excluding tax, domain, operator mailbox, traffic overages, added storage/backup
charges, higher database compute and capacity upgrades. They are not bill caps.

| Database choice | Database price | Whole-backend baseline | Material trade-off |
| --- | ---: | ---: | --- |
| Cloud-integrated Postgres, previous example | ~$19.85 | ~$39 | One resource dashboard; frequent polling prevents sleep |
| Render paid `0.1c-256mb`, 1 GB storage | $6 | **~$25** | Managed database, but 256 MB RAM/0.1 CPU and cross-provider connection |
| Aiven Free | $0 | **~$19** | Development/prototype option; 1 GB disk, 20 connections, no SLA, location constraints |
| Aiven Developer | $5 | **~$24** | Development option; 8 GB disk, 15 default connections, location constraints |

Render's live pricing page lists the first 1 GB storage as included and additional
storage at $0.30/GB-month [R1]. Set the initial size explicitly in any future
configuration; do not accept a larger default without updating the estimate.
The current 1 GiB Cloud rate and external-database FAQ were inspected in its
Frankfurt pricing UI on this date [R0]. No checkout quote was obtained.

Dropping the app to 512 MiB subtracts another $7, producing a roughly $18 Render
combination. That is a test candidate, not the recommendation: memory for PHP web
requests, worker and scheduler has not been validated at that limit. Do not stack
two untested resource reductions and describe the result as proven capacity.

## Recommended candidate to validate: Cloud plus paid Render Postgres

Laravel Cloud explicitly supports external publicly reachable databases [R0].
Render supports PostgreSQL 18, an external TLS connection and Frankfurt placement
[R2/R4]. Therefore the approved PostgreSQL engine and application stack can stay;
the prospective change is provider/connection configuration, not a rewrite of
QGuard's matching or data model. Do not attach a second paid Cloud database too.

Render's free Hobby workspace has no base fee and supports paid databases for a
solo builder [R1/R6]. Its paid database has a three-day point-in-time recovery
window on that workspace plan [R3]. This is the $6 paid database, not Render's
temporary free database offering.

The lower database size is not equivalent to the original Cloud database.
Its published 100-connection limit is not a promise of good performance with
100 busy queries. Queue/cache/session traffic shares this database with matching.
If it needs the next 1 GB database tier ($19), the total becomes about **$38**,
mostly removing the savings [R1]. Start with evidence, not an assumed permanent
$25 live-service bill.

Cross-provider queries use the external endpoint, rather than a shared private
network. Same-city placement does not guarantee low latency. Confirm TLS with
certificate/hostname validation, connection credentials, available egress ranges
and database inbound restrictions in the actual deployment plan. Never disable
TLS to solve connectivity. Render includes 5 GB/month outbound bandwidth on Hobby,
then $0.15/GB; Cloud has its own traffic allowance and overage rules [R1/R0].
Repeated queries and result sizes require measurement. Neither quote includes
unmeasured overages.

Growing the app can remain on Cloud; growing the database can remain on Render.
Both providers add capacity without rewriting QGuard, but database resizing,
restarts, scheduler duplication and higher-throughput matching need operational
checks. This is two dashboards/bills, not a single-provider setup or a no-future-
changes scaling guarantee.

## Lower initial development cost: Aiven

Aiven Free provides 1 CPU, 1 GB RAM and 1 GB disk, managed backups and 20 database
connections; no pooling, SLA or support service. Inactive instances can be stopped,
and the provider may change placement/configuration [R7]. Developer is $5/month,
with 8 GB disk and no idle shutdown; its current default is 15 connections
[R8/R9]. Aiven distinguishes these from its production-oriented plans [R10].

The provider permits choosing a broad geographical area such as Europe for the
Developer tier, but not a specific cloud or region [R8]. Do not claim Frankfurt
colocation or a fixed country. That matters both to database round-trip latency
and to truthful provider/location particulars in the eventual privacy notice.
Backups advertised for these tiers do not establish a tested recovery window or
owner-controlled restore procedure. Verify those details and PostgreSQL 18
availability before provisioning.

This is a credible cheap full-backend development/demo route, subject to connection
limits and tests. It is not a substitute for the normal-use operational review.
Paid upgrades exist, but the eventual production tier can cost materially more;
do not sell $19 as a lifetime production budget. The $24 Developer option saves
only $1 against the Render candidate while adding placement uncertainty, so it
is not the leading paid recommendation here.

## Other savings investigated

- **Direct Neon:** its current Free plan provides 100 compute-unit hours per
  project/month [R11]. A continuously awake 0.25-unit database uses
  `0.25 × 730 = 182.5` unit-hours, so this is not a free always-on substitute.
  Direct paid compute is also $0.106/unit-hour; its lower storage price makes
  little difference at 1 GB. Splitting accounts alone does not create meaningful
  savings here.
- **Make Cloud truly sleep:** possible research direction, not a completed
  optimization. The DB-backed queue poll and scheduler/cache activity currently
  keep resources awake. A replacement must wake for queued work and preserve
  acceptance/session deadlines even with no open browser. Simply disabling the
  scheduler when the matchmaking pool is empty would not satisfy that contract.
  A durable wake/deadline design and tests need a separate implementation slice;
  no guaranteed low-cost result is assumed.
- **Railway:** usage-based compute may be cheaper at small actual memory/CPU
  use [R12]. Its $5 minimum is not an all-inclusive backend quote. No QGuard
  workload was metered there, so a monthly total or equivalent database recovery
  service was not established. Not selected merely from its headline minimum.
- **A self-managed VM:** Hetzner's published CX23 price is €5.49/month before
  IPv4/tax, and server backups add 20% [R13/R14]. This is an infrastructure price,
  not an available, tested complete service quote; regional stock was not
  established. QGuard would own OS/database patching, process supervision,
  consistent database backups, restoration and availability. It can run the stack,
  but it changes the maintenance burden and scaling model, so it is not the first
  recommendation under the owner's managed/scaling preference.

## Growth comparison: Laravel Cloud and Hetzner — 2026-10-30

**Owner clarification, not provider approval:** the owner wants the cost of growing
the full system compared, rather than optimizing only its entry price. If the
total costs become similar, the owner prefers managed convenience. The suggested
50,000 concurrent users before a database upgrade is an unverified example, not
a requirement, forecast, sizing result or approved capacity claim. The owner has
not accepted the split Cloud/Render proposal or selected Cloud/Hetzner.

This follows the same research/commercial recommendation and deployment-readiness
route above. No experiment, new architecture, new service or benchmark is executed.

### What Cloud separates, and what it does not require

The earlier ~$39 configuration already runs web requests, the queue worker and
scheduler together on a single app instance. It uses one PostgreSQL cluster for
application data, queue, cache and sessions; it does not buy a separate database
for each worker. Dedicated worker compute is optional [R15]. Cloud's managed
queues are another optional service: they execute jobs on separately managed
workers and bill for their use. They are not a second PostgreSQL database, are
not part of that estimate, and have not been selected for QGuard [R16].

The independent scaling axes are:

| Workload | Cloud mechanism | Cost consequence |
| --- | --- | --- |
| Web requests | Change instance size; Growth enables additional replicas within configured bounds | Pay for each running replica; Starter $5 and Growth $20 both include $5 usage credit |
| Background jobs | Initially share app compute; later separate worker cluster or managed queues | Extra worker compute or managed-queue usage, if selected |
| PostgreSQL queries/data | Set minimum/maximum compute; database adjusts within that range; storage grows separately | $0.106 per compute-unit hour plus $0.50/GB-month, not one flat lifetime database price |
| Live browser connections/events | Choose/increase managed Reverb capacity | Connection tiers also have daily message limits; separate from database size |

Cloud's current Starter database maximum is 1 CU; Growth defaults to 4 CU and
10 app/worker replicas, with some higher limits available by request [R0/R17].
The app can scale horizontally on Growth within configured limits [R18]. More
replicas do not automatically remove application locks or make every matcher
operation parallel. Flex sleep can save money only when the application's real
work permits it; the current frequent DB activity cannot be assumed to sleep.

### Concrete Cloud price sensitivity

Frankfurt pricing UI rechecked for Compute, Serverless Postgres and Reverb.
App monthly caps: 1 GiB $14, 2 GiB $28, Pro 4 GiB $34. For 730 continuously
awake database hours, compute alone is:

| PostgreSQL setting | Published CPU / memory | Monthly compute arithmetic |
| --- | --- | ---: |
| 0.25 CU | 0.25 vCPU / 1 GB | $19.35 |
| 0.5 CU | 0.5 vCPU / 2 GB | $38.69 |
| 1 CU | 1 vCPU / 4 GB | $77.38 |

These are constant-use examples, not predicted monthly utilization; an autoscaled
database costs the integral of its actual awake size over time. Storage is extra.
Cloud's 28-day app-compute cap does not replace the database-hour calculation.
Source: [R0/R17].

| Managed Reverb simultaneous connections | Daily message allowance | Monthly price |
| ---: | ---: | ---: |
| 100 | 200,000 | $5 |
| 500 | 1,000,000 | $25 |
| 2,000 | 8,000,000 | $100 |
| 5,000 | 16,000,000 | $200 |

Source: rendered Frankfurt pricing UI [R0]. A browser tab/connection is not a
registered account or necessarily one distinct user. Raising just the Reverb
tier from 100 to 500 adds $20 to the earlier estimate before other upgrades.
This arithmetic is not evidence that the unchanged app/database can serve 500
active people. Do not extrapolate a 50,000-connection quote from the published
table or promise that the $5 tier handles that audience.

### How Hetzner grows

An initial VM can run Nginx, PHP, PostgreSQL, the scheduler, workers and Reverb
together. Increased CPU/RAM can be obtained by rescaling the VM within the same
CPU architecture; it does not inherently require reinstalling the application.
Plan the operation and recovery rather than assuming a disruption-free resize.
Keeping the original disk size preserves more downgrade options; an enlarged
primary disk cannot later be shrunk through rescaling [R19].

Beyond a suitable single machine, a proposed path is separate database and app
machines, then multiple app instances behind a load balancer. We would configure
shared state, deployments, scheduling ownership, monitoring and recovery.
Self-hosted Reverb horizontal scaling uses a shared Redis service and load
balancing; this is future architecture work, not an approved Redis addition
[R21]. Hetzner provides infrastructure and automation APIs, not Cloud's configured
Laravel app/worker/database autoscaling policy. Powering a VM off does not stop
its bill [R14].

Published Germany/Finland regular-performance examples, using the vendor's USD
prices (not a guessed currency conversion):

| Hetzner VM | CPU / RAM | VM + 20% server-backup charge per month |
| --- | --- | ---: |
| CPX22 | 2 shared vCPU / 4 GB | $27.59 + IPv4 |
| CPX32 | 4 shared vCPU / 8 GB | $50.39 + IPv4 |
| CPX42 | 8 shared vCPU / 16 GB | $98.39 + IPv4 |

Sources [R13/R14/R20]. Taxes, other services and application/database recovery
work are excluded. Server backups alone are not a tested PostgreSQL point-in-time
recovery system. These are catalog prices, not checkout/stock confirmations or
QGuard capacity measurements. The main Hetzner page currently labels its cheaper
cost-optimized family unavailable; availability must be checked at ordering,
including the regular-performance family [R22]. The earlier CX23 headline price
must not be treated as an available production offer.

### Capacity and the price crossover

There is no established user-count crossover. One server may remain cheaper for
sustained workloads because its spare resources can be shared and self-hosted
Reverb has no separate vendor per-connection plan. An equivalent reliability
design may add more servers, storage, monitoring and maintenance. Conversely,
Cloud's app, database, connection and traffic charges also grow. Comparing a
larger Hetzner VM to Cloud's unchanged entry bill does not compare the same work
or operating guarantees.

No database upgrade threshold can be inferred from 50,000 accounts or concurrent
users. Active requests, query/write rates, lock time, data size, cache behavior,
job backlog and sockets are different measurements. Illustrative arithmetic:
50,000 online clients each making one request per 30 seconds means about 1,667
requests/second. This is not a measured QGuard request pattern or benchmark.

Actual repository evidence: `qguard/routes/console.php` schedules matching every
five seconds and deadline/settlement commands every second; database queue/cache/
sessions are configured. `qguard/app/Domain/Matching/Matcher.php` takes a shared
matcher lease and runs through `MembershipTransaction`, whose PostgreSQL advisory
transaction lock serializes relevant domain changes. The implementation record
explicitly calls this an initial correctness choice, not production-scale proof.
Adding replicas alone cannot establish 50,000-user capacity. Benchmark realistic
workload mixes and lock/queue/deadline behavior before deciding sizes or changing
this concurrency design.

**Recommendation, still not an owner decision:** all-Cloud is a reasonable default
if the owner values its operational convenience enough to accept the initial
~$39 estimate and measured growth costs. Do not justify it with a promise that
Hetzner inevitably catches up in price. Compare total operating cost: provider
bills plus maintenance/recovery effort and the required reliability. At small
scale even a modest monthly management saving may justify Cloud; at sustained
scale the infrastructure premium can remain significant. Provider choice and
budget remain open.

## Owner choice and verification still needed

For reducing the bill while keeping the app on Cloud, **Cloud plus paid Render
Postgres at roughly $25/month** remains the balanced lower-cost candidate. For
the owner's later emphasis on convenience, retaining all resources on Cloud is
also reasonable with the growth caveats above. The owner must choose whether
the second managed provider and small database are acceptable before changing
the architecture/provider record or preparing its execution plan. No budget is
selected by this report. Aiven Free is an alternative if the immediate objective
is a lower-cost development environment with the stated limitations.

Before provisioning: confirm current plan/version/region/storage and full charges,
prepare access/recovery controls and obtain specific external-action authorization.
Before normal use: exercise synthetic concurrent matching, shared acceptance,
deadline handling, notifications, reconnects, restore and deploy/restart behavior;
measure database CPU/memory, query latency, connection use and bandwidth. Revert
the provider proposal or resize if evidence fails; do not change product rules
to make a cheap resource size pass. Existing RSO and real-player gates remain.

## Source ledger

All checked 2026-10-30. Primary vendor sources describe offerings, not a passed
QGuard integration. Queries covered managed Postgres prices/limits, external
database support, backup/region/scaling behavior and VM/usage-based alternatives.

| ID | Publisher and source | Evidence / limitation |
| --- | --- | --- |
| R0 | Laravel, [Cloud pricing](https://laravel.com/cloud/pricing) and [billing details](https://laravel.com/cloud/docs/pricing) | Frankfurt app rate and expanded bring-your-own-database FAQ observed in browser; credits/traffic billing. |
| R1 | Render, [Pricing](https://render.com/pricing) | Rendered paid database rates, included 1 GB, workspace and traffic prices inspected. |
| R2 | Render, [Create/connect Postgres](https://render.com/docs/postgresql-creating-connecting) | Version 18, initial storage, external TLS and access controls. |
| R3 | Render, [Backups and recovery](https://render.com/docs/postgresql-backups) | Paid database PITR window, not our restore test. |
| R4 | Render, [CLI reference](https://render.com/docs/cli-reference) | Frankfurt/version/size choices; no CLI mutation executed. |
| R5 | Render, [Blueprint specification](https://render.com/docs/blueprint-spec) | Explicit configuration and defaults; no Blueprint created. |
| R6 | Render, [Workspace plans](https://render.com/docs/new-workspace-plans) | Free Hobby workspace for solo builders, separate paid resources. |
| R7 | Aiven, [Free tier](https://aiven.io/docs/products/postgresql/concepts/pg-free-tier) | Limits, shutdown/placement conditions and upgrade path. |
| R8 | Aiven, [Developer tier announcement](https://aiven.io/blog/new-developer-tier-for-aiven-for-postgres) | Region-area choice, idle behavior and tier intent. |
| R9 | Aiven, [Connection limits](https://aiven.io/docs/products/postgresql/reference/pg-connection-limits) | Current Free/Developer defaults; provider uses connections too. |
| R10 | Aiven, [Postgres pricing](https://aiven.io/pricing/postgresql) | Free/$5 development plans and resource sizes; production tiers separate. |
| R11 | Neon, [Pricing](https://neon.com/pricing) | Free compute allowance and direct paid rates. |
| R12 | Railway, [Pricing](https://railway.com/pricing) | Actual-usage billing; no measured QGuard monthly bill. |
| R13 | Hetzner, [2026 price adjustment](https://docs.hetzner.com/general/infrastructure-and-availability/price-adjustment/) | Published server-only rate; no live stock confirmation. |
| R14 | Hetzner, [Billing FAQ](https://docs.hetzner.com/cloud/billing/faq/) | Backup surcharge; not application-consistent restore evidence. |
| R15 | Laravel, [Workers](https://laravel.com/cloud/docs/workers) | Shared app processes versus optional separate worker clusters. |
| R16 | Laravel, [Managed queues](https://laravel.com/cloud/docs/queues) | Optional managed job execution; not a second PostgreSQL cluster. |
| R17 | Laravel, [Postgres](https://laravel.com/cloud/docs/resources/databases/postgres) | CU CPU/RAM mapping, autoscaling, pooling and plan limits. |
| R18 | Laravel, [Compute](https://laravel.com/cloud/docs/compute) | App/worker scaling within configured ranges; not app-level throughput proof. |
| R19 | Hetzner, [Server FAQ](https://docs.hetzner.com/cloud/servers/faq/) | Rescaling, architecture/disk constraints and dynamic availability. |
| R20 | Hetzner, [Regular performance](https://www.hetzner.com/cloud/regular-performance/) | CPX server CPU/RAM specifications; catalog not stock confirmation. |
| R21 | Laravel, [Reverb scaling](https://laravel.com/docs/13.x/reverb#scaling) | Shared Redis and load-balancing requirements for self-hosted horizontal scaling. |
| R22 | Hetzner, [Cloud](https://www.hetzner.com/cloud/) | Main page labels cost-optimized shared servers unavailable when checked. |

## Handoff

Pricing UI/source checks and estimate arithmetic completed; local links and scoped
diff checked. No load, deployment, network-latency, recovery or live-provider test
was performed. No background service started. DEC-099 closes the provider choice
and this research joins its coherent local decision batch. Next work is the
domain and concrete Cloud deployment particulars in the hosting plan; do not
reissue the earlier $45 target or provider-choice question.

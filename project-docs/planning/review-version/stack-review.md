# Stack Review At The Design Checkpoint

**Status:** core stack confirmed under DEC-074/075. Inspected
2026-10-27; repository and primary documentation rechecked 2026-10-28 as the
owner starts checkpoint group 1. DEC-062 requires this review before new
application implementation. That stack review is now complete; policy/specification
and execution approvals remain separate.

## Owner-Confirmed Stack

Laravel/PHP; Blade with Livewire; Alpine/JavaScript; Tailwind CSS; PostgreSQL;
Laravel Reverb; Docker Compose; nginx. DEC-075 records the exact selection and
the owner's explicit correction of the speech transcription from Vapor to Reverb.
No hosting-platform change is selected. Earlier comparisons/explanations below
retain the reasoning; their then-pending choices are resolved by DEC-075.

No further foundational stack question is needed at this checkpoint. Preserve
the existing no-initial-Redis/database-backed jobs/cache and test direction.
Vite, dependency managers and test-runner/browser details remain supporting
engineering choices within the approved framework. Verify exact versions and
compatibility when preparing the implementation slice. Production hosting,
credentials, operational sizing and future desktop technology keep their own
later scope/evidence gates rather than blocking this core-stack selection.

## Active Review Route — QG-STACK-1

The owner asks to begin stack reconsideration, then review assumptions/defaults
and remaining feedback/privacy policies in that order. The initial request
started discussion; DEC-074 selects Livewire and DEC-075 confirms the full named
core stack. None grants implementation approval.

Baseline: clean `new-development` at `187d9a7`. Read repository/portable entry
path, task routing, always-applicable system documents, project entry/current
state, workflow governance, relevant live-register entries and checkpoint packet.
Selected procedures: product planning, research/sourcing, owner external review,
evidence-only repository reconciliation, and deferral/owner review. The primary
agent compares the current source and authoritative documentation; the owner
selects the stack. No delegated work or application/runtime changes.

Verification for this discussion: inspect dependency declarations/locks, Compose,
routes and representative domain/UI boundaries; check primary documentation and
local record links/diff. No dependency installation, benchmark, runtime-health or
new application test is claimed. Save related notes during discussion; batch
the resulting decision and dependent contracts at a meaningful review boundary,
not one commit per explanation.

## Recommendation

Keep Laravel + Blade/Livewire, PostgreSQL and Docker for the next web version.
Use small client-side interactions for sliders, dialogs and draft state, and
server authority for matching, eligibility and honor. This is an engineering
recommendation subsequently accepted for the named components under DEC-075.
The current prototype's plain JavaScript is a disposable review artifact.

The proposed screens do not expose a requirement that forces a framework
replacement. The hard work is consistent domain state, privacy, delayed ratings,
provider boundaries and recovery. Changing frontend frameworks does not resolve
those concerns. Existing application code may be retained where correct; its
tests cannot certify the new behavior until updated and rerun.

## Verified Repository Baseline

Inspected [composer.json](../../../qguard/composer.json),
[package.json](../../../qguard/package.json) and
[compose.yaml](../../../qguard/compose.yaml). These are declarations/configuration,
not a fresh runtime-health or dependency-upgrade test:

- PHP `^8.5`, Laravel `^13.17`, Livewire `^4.0`, Laravel Reverb.
- Blade, Tailwind 4, Vite 8; browser tests use Playwright in the application.
- PostgreSQL 18 with a named persistent volume; database-backed queue/cache;
  worker, scheduler, Reverb, nginx and local mail services. No initial Redis.
- Pest/PHPUnit application tests and earlier concurrency/browser evidence exist.
- No application, Docker engine, lockfile or running container was changed in
  this design pass. Earlier Docker Desktop evidence is dated in the first-pass
  implementation record; it is not a new inventory of engines on this Mac.

Recheck at `187d9a7`: the locks contain Laravel `13.34.0`, Livewire `4.4.7`,
Reverb `1.12.0`, Tailwind `4.3.3`, Vite `8.3.2` and Playwright `1.63.0`.
These are locked versions, not claims about installed/running versions or the
latest secure releases. Exact upgrade decisions need their own compatibility
and vulnerability checks before implementation. The newer `qguard/` first pass
is distinct from the original legacy app. Its routes and Dashboard call domain
services; the matcher uses transactions/locks. This is useful separation to
preserve, not evidence that superseded rules already satisfy the next packet.

## Proposed Roles In The Next Version

| Component | Proposed responsibility | Reason for this product |
| --- | --- | --- |
| Laravel/PHP | Account access, matching, sessions, honor, reports and future provider calls | Central place to enforce approved rules and authorization across every UI |
| Blade + Livewire, with Alpine/local JavaScript | Pages/forms and immediate local interactions | Fits the designed workflows; keep slider movement, dialogs and drafts local rather than requesting the server for every movement |
| Tailwind/CSS + Vite | Approved visual system and asset build | Framework choice does not require changing the accepted design |
| PostgreSQL | Durable users, memberships, sessions, feedback and obligations | Relational records and transactions suit atomic team formation and once-only rating application; correctness still needs explicit contracts/tests |
| Reverb/WebSockets | Notify authorized room members about committed changes | Realtime chat/roster/status updates; reconnect must refetch authoritative state |
| Database-backed jobs/cache initially | Background work and bounded coordination | Preserve the approved simpler initial setup; measure queue delay and database contention before adding another service |
| Docker Compose + nginx | Consistent development/test services and packaging | Preserves the approved environment direction and persistent database storage |
| Pest/PHPUnit + browser tests | Domain, concurrency, access and complete-flow evidence | New product behavior needs new or revised assertions, not just previous test results |

The named core components are confirmed under DEC-075; supporting engineering
details follow the existing delegation.
A single Laravel application can run web,
worker, scheduler and realtime processes separately without splitting product
rules into independent microservices. No hosting vendor, production sizing or
new Docker engine is selected here.

## Options Against This Product

Comparison retained for rationale. DEC-074/075 selects A and the named supporting
core components; these alternatives are not outstanding selection questions.

| Option | What it offers here | Cost / reason to choose differently |
| --- | --- | --- |
| **A. Keep Laravel + Livewire — recommended** | Reuses the current backend, auth, persistence and testing structure; server-driven forms with local JS interactions suit the designed flow | Requires disciplined event/state handling for realtime rooms; measure latency and avoid a server round trip for every slider movement |
| B. Laravel + React/TypeScript through Inertia | Preserves Laravel domain work while giving the frontend a richer component/state ecosystem | Rebuilds the UI and frontend tests. Prefer if complex client interactions, a React-skilled team or shared React components become a concrete priority |
| C. TypeScript/Next.js application | A coherent JS/TS UI ecosystem with server/client composition | Broadest migration: authentication, persistence, jobs, domain rules, realtime deployment and regression evidence must be rebuilt/reselected. The present screens alone do not justify that cost |

This is a qualitative fit assessment, not a benchmark or claim of universal
superiority. Team staffing, hosting constraints or a materially different
desktop requirement could change the recommendation. No package purchases,
host selection, framework installation or migration is implied.

The most useful first comparison is A versus B. React/Inertia does not require
discarding Laravel or creating a separate API-only backend. It makes more UI
composition and draft state explicit in React/TypeScript; it also introduces a
larger frontend implementation/testing surface for this existing PHP-centered
project. Both choices still need server authorization, persistence and realtime
recovery. React does not itself make the matchmaking algorithm faster, and
Livewire does not require a page reload or server request for every visual action.

Prefer B if a dedicated React team, a substantially richer client-side workspace,
or a packaged/offline desktop UI becomes a concrete near-term requirement. A
future desktop ambition alone does not establish that requirement. Switching
later remains possible but costs a UI migration and regression work; do not
describe it as free. No team skill/maintenance capacity or throughput target has
been measured in this review. They are reasons to revisit the recommendation if
the owner supplies a constraint that changes the tradeoff.

## Primary Documentation Checked

### Dynamic Navigation Clarification — 2026-10-28

**Owner requirement/preference:** QGuard needs a dynamic interface, including a
match-acceptance popup and system-driven movement into the match room. Prefer
SPA-style navigation for these connected flows. Keep Livewire if it meets those
needs simply; examine React if it makes those flows unnecessarily hard. This is
a conditional preference and concrete evaluation criterion, not a blanket stack
or implementation approval. The owner recalls achieving dynamic behavior with
plain JavaScript in an earlier project; no legacy-code reuse is required.

**Subsequent disposition:** DEC-074 explicitly confirms Livewire after this
capability discussion. The conditional wording above describes the earlier stage.

**Verified capabilities:** Livewire 4 documents
[background page navigation and programmatic redirects](https://livewire.laravel.com/docs/4.x/navigate)
through `wire:navigate`, `redirect(..., navigate: true)` and
`Livewire.navigate(url)`. Its
[events documentation](https://livewire.laravel.com/docs/4.x/events#real-time-events-using-laravel-echo)
supports authenticated realtime subscriptions. Alpine/local JavaScript can
control a dialog immediately. These are standard building blocks for the
requested flow, rather than a bespoke browser router. Background navigation
still fetches server-rendered HTML; it is not an offline/client-rendered React
application. Automated navigation is also possible without SPA navigation;
SPA-style transitions improve continuity rather than granting that capability.

**Proposed flow:** server identifies the relevant matching state → authenticated
event prompts the client to reconcile state → show the acceptance dialog →
submit the player's response → when the server permits entry, navigate to the
session URL without a full document reload. Other members' state can update
live. Neither the event payload nor a locally clicked button grants membership.
The acceptance deadline, decline/nonresponse outcome and exact entry condition
are product rules still to reconcile, not defaults chosen by this example.

**Fit assessment:** these requirements strengthen the need to deliberately use
Livewire's navigation/event features, but do not establish an advantage large
enough to justify replacing the frontend with React. Retain the recommendation
for Livewire + Alpine + Reverb, with actual multi-client evidence required in
the implementation slice. This is engineering judgment, not a benchmark.

**Concrete first-pass gap:** `qguard/resources/views/livewire/matched.blade.php`
currently offers an Open team room link. `qguard/resources/js/app.js` initializes
chat on `DOMContentLoaded` and tears down its socket/timer on `pagehide`; its
validation observer also initializes on the first document load. These paths
need explicit navigation lifecycle initialization/cleanup before enabling SPA
navigation. Merely adding link attributes is insufficient. Do not stack duplicate
listeners or retain an old room's subscription after leaving it.

**Later acceptance evidence:** two or more clients receive/reconcile formation
and response events; eligible clients automatically reach the correct room;
refresh/back/direct URL and reconnect recover current state; repeated or delayed
events do not show duplicate dialogs, navigate into an obsolete team or submit
twice. Check keyboard focus, drafts, reduced motion, subscription cleanup and
navigation failure. No live multi-client test or application edit occurred in
this discussion. The approved visual artifact does not yet demonstrate a real
match-acceptance protocol.

### Framework Sources

- Laravel's [13.x starter-kit documentation](https://github.com/laravel/docs/blob/13.x/starter-kits.md)
  supports Livewire and React/Inertia routes. The React route keeps Laravel
  server routing/controllers while using React and TypeScript for the UI.
- Livewire's [Alpine documentation](https://livewire.laravel.com/docs/4.x/alpine)
  documents local browser interaction alongside Livewire. Keeping slider drafts
  local is feasible without adopting an entirely different frontend.
- [Laravel Reverb](https://laravel.com/framework/docs/13.x/reverb) documents the
  realtime server and production operation/scaling. Existing configuration is
  a starting point, not proof that new room/reconnect behavior is correct.
- Next.js documents [server and client components](https://nextjs.org/docs/app/getting-started/server-and-client-components).
  It can support interactive pages and protected server work; that capability
  does not supply QGuard's domain rules, workers or operational design by itself.
- Electron's [process model](https://www.electronjs.org/docs/latest/tutorial/process-model)
  distinguishes its main process and web renderers. A future desktop companion
  is a separate integration/security decision, not simply permission to call
  private game APIs from a web page.

Rechecked 2026-10-28: Laravel's current
[starter-kit page](https://laravel.com/framework/docs/13.x/starter-kits),
Livewire Alpine, Reverb and Electron process-model documentation above.
Laravel's [database transactions](https://laravel.com/framework/docs/13.x/database#database-transactions)
and [queue drivers](https://laravel.com/framework/docs/13.x/queues) support the
proposed transactional/background-work building blocks. These are capability
sources, not QGuard performance or correctness evidence. Reverb documents Redis
for scaling across multiple Reverb servers: initial Redis omission is bounded,
not a promise that the same deployment handles arbitrary global load.

## Future Desktop And Discord

Keep provider adapters separate from matching/session rules. A future desktop
bridge can be evaluated against actual needs and permitted APIs; the web UI does
not need a desktop shell now. The owner's Chromium preference is conditional;
Gankster's shell and private integration implementation were not verified.

Either frontend can be displayed in a web-rendering desktop shell. A locally
packaged React interface can offer reusable client components if that desktop
architecture is later selected; an Inertia web app is not automatically an
offline desktop application. Native/game-client access still needs an explicit
desktop bridge, authentication/security design and validated permitted API.
Official Riot integrations and future Discord work do not themselves require
React, Electron or a JavaScript backend.

Discord returns only after Riot approval and RSO integration under DEC-067.
Nothing in A/B/C makes Discord or the native party-code assumption proven.
The backend/frontend choice does not grant Riot access or bypass DEF-014.

## Owner Decision And Next Evidence

DEC-074/075 completes the named core-stack choice. Next review the recorded
assumptions/defaults, then unresolved product policies. Prepare the affected
implementation slices and technical
contracts, including real guest isolation, provider credentials, transactions,
retention and regression tests. Stop application work until those approvals
are in place or the owner explicitly gives a narrow override.


## Discussion Verification — 2026-10-28

Repository declarations, locks and representative boundaries were checked against
`187d9a7`; primary sources above were re-read. All 72 local Markdown link targets
in the four changed records existed, and `git diff --check` passed. Changes are
limited to this review, current-state routing, CRQ-010 and the matching draft
clarification. No runtime/application
checks or benchmarks ran; no app, dependency, container or remote mutation occurred.
Those interim notes were saved during the discussion. DEC-074/075 subsequently
closes the core-stack decision group; the related research, UI requirement and
decision records now form one coherent local commit batch. Implementation
approval remains separate.

## Reverb Explanation — 2026-10-28

Reverb is Laravel's WebSocket server. Browsers keep a connection to it so the
application can push events as state changes. In the proposed QGuard flow,
Laravel validates and stores an acceptance response, Reverb delivers the update
to authorized recipients, and Livewire/JavaScript updates their popup or moves
them to the permitted session. Private channels restrict subscriptions through
application authorization; Reverb does not decide matching or replace database
state. Reconnecting clients must reconcile missed updates with the application.

Primary sources rechecked: [Reverb](https://laravel.com/framework/docs/13.x/reverb)
and [Laravel broadcasting](https://laravel.com/framework/docs/13.x/broadcasting).
The actual first pass already declares a `reverb` Compose service and a private
`RoomChanged` event carrying a session ID/version. That is source/configuration
evidence, not a fresh operational test or the future acceptance flow. Continued
use was the agent recommendation during that explanation. DEC-075 subsequently
explicitly confirms Reverb.


## Core-Stack Decision Group Closure — 2026-10-28

DEC-074/075 records explicit owner confirmations, including the typed correction
to Reverb; no question timeout or silence was used as approval. The final batch
contains nine project-document files: the comparison/capability research, matching
UI clarification, two decisions and dependent entry/review records. All 233 local
reference targets in those files existed; final scoped-diff and whitespace checks
passed. These are documentation and source-reconciliation checks, not application,
load, integration or runtime tests. No application, dependency, Docker engine,
container, protected workflow package or remote state was changed.

Save this completed decision group as one additive local commit. The next group
is the owner's requested assumptions/defaults recap, then remaining product
policies and technical contracts. Do not reopen the approved core stack or start
application implementation merely because this discussion is complete.

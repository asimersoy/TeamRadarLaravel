# QGuard execution plan — QG-FIRST-PASS-1

**Status:** approved under DEC-052 for revision 1 plus its matched-honor amendment;
S1–S4 are verified under the owner's explicit start-through-completion instruction;
S5 feedback/honor/admin implementation is next.
The DEC-008/051 packet gate is satisfied. Actual evidence and remaining stages
are tracked in the [implementation record](implementation-evidence.md).
All modules in the [manifest](../../specs/first-pass/README.md)
and the [acceptance matrix](acceptance-matrix.md) govern the complete slice.
Responsible executor: implementation agent; owner reviews policy changes and
first-build outcome. General procedures remain in the protected workflow system.

## Entry checks and execution rules

Re-read mandatory repository entry path and current decisions; verify branch,
working tree and any concurrent work. Record packet approval exactly. Inspect
new-code path, Docker availability/ports, relevant dependency versions and access
before changing anything. No use of root legacy Compose or host PHP.

The packet authorizes creating `qguard/` at S1. Resolve install/build network permissions
through the normal approval flow. All app/test services remain local. Do not
reuse credentials, submit a provider application or resume a held test.

Complete stages in order. Each stage is a coherent runnable local commit with
its tests/docs; no broken dependencies on the next commit. Hide unfinished
actions behind server-enforced feature readiness, not links to broken routes.
Self-contained and deployment-shaped does not mean authorized to deploy or
approved for real users. If a stage fails, fix it before declaring it complete;
safe independent work may continue without concealing the failure.

## Stages

| Stage | Scope / specification dependencies | Evidence before stage completion | Commit boundary |
| --- | --- | --- | --- |
| S1 Foundation | Architecture/data-security: fresh Laravel app; Docker PHP/Postgres/Nginx; DB jobs/cache/sessions; isolated test services; basic layout/health and command runbook | T01–T04 initial checks, PHPUnit/Pest smoke, browser app render; persistent row survives recreate; no root legacy diff | Runnable isolated foundation with locks/config/tests/docs, no promised domain routes |
| S2 Identity and premades | Identity/rank, product flows, party commands: local auth, profile, own baseline honor, declared fallback, exact-handle friends/invites/ready parties | F01–F04/F11; I01–I03 contracts; M02 membership races; X01/X02; fictional fixtures | Working account and social/party preparation loop; queue action still disabled |
| S3 Match assembly | Matching service/worker, database slot invariants, current five-stack policy, widening, roster snapshots and a read-only matched roster showing teammate honor/rank under DEC-052 | F05, M01–M05 including multiple PostgreSQL processes, baseline honor and compatibility outcomes; X01 matched-only score access | Complete cancel/queue/match vertical slice; room clearly says chat/feedback not yet available |
| S4 Sessions and chat | Sessions/chat module; native private text/Reverb/polling, no-show lifecycle, Session ended and safe participant release; no fake handoff | F06/F07; S01/S02; C01–C03; outsider/stale-socket tests and rendered checks | Runnable coordination slice; feedback action remains disabled until S5, no silent lost submission |
| S5 Feedback and review | Entire feedback/honor/report module; optional submissions, deadline/early settlement, eligibility, raw/honor recurrence, admin inbox/audit | F08–F10; S03/S04; H01–H08; R01–R06; X01/X03; duplicate/crash settlement tests | Complete first-pass product loop with all feedback routes enabled and consistent data |
| S6 Full verification and handoff | Cross-module regression; responsive UI; operational docs; production-image config without deployment; backup/isolated restore; actual field inventory | All acceptance rows mapped to real tests/results; failure recovery, fresh checkout setup, browser evidence, no unexplained required skips | Verified first-build checkpoint, exact residual risks and owner review/DEF-012 packet |

If initial data models needed by later stages are added earlier, include their
constraints/tests with that stage; unused tables do not count as implemented
features. Keep transitions at S4/S5 compatible: disabled feedback does not
pretend feedback already happened. Development synthetic resets, if necessary,
must be restricted to declared disposable test targets, never persistent dev data.

## Test/build command deliverables

S1 creates commands documented in qguard/README for Docker build/up/health,
migrations, opt-in demo seeding, frontend asset build, format/static checks,
Pest backend suite, PHPUnit TestCase suite and Playwright browser suite. Name
actual container/service paths then; do not copy commands from the old root app.
All DB tests use PostgreSQL. Unit math tests can be pure functions but still run
in the PHP container. Never substitute a host SQLite test to claim PG evidence.

Testing setup must use distinct DB/schema and application port from development.
Parallel workers receive isolated targets; concurrency tests intentionally share
one test DB using independent connections/processes and synchronization barriers.
No transaction-wrapper test that makes the contested records invisible to the
second process may be called a concurrency test.

## Stop, recovery and release boundaries

Stop for a genuine product-policy conflict, unsafe data exposure, blocked
required test, unavailable necessary access or uncontrolled mutation. Explain
the evidence and smallest decision/access needed; do not restart the old broad
questionnaire. Package/library patch adjustments, descriptive names, UI layout
and proven parameter tuning remain delegated.

Do not push, create PRs, deploy, delete persistent data, rewrite history or contact
providers without specific authorization. Public/real-player use additionally
requires applicable audience/legal/privacy and provider approval work. No fixed
hosting bill, worldwide release or game integration is assumed.

On failure retain useful evidence and a coherent state. Prefer forward fixes;
record any unfinished work precisely. Do not use hard reset or revert other
people's changes. Database restoration is first rehearsed into an isolated target;
overwriting a persistent database requires a separate authorized recovery action.

## Definition of first-pass completion

Every required behavior has working code and passing assertion-based tests;
each implemented user/admin flow has browser assertions and relevant rendered,
permission/failure checks. Persistence and isolated restore are demonstrated.
No unresolved critical privacy, duplicate-settlement or match-integrity failure.
Record exact commands, versions, counts, evidence and any non-blocking limits;
unrun/blocked is not passed. No arbitrary coverage percentage replaces the matrix.

Owner receives the runnable local demo, synthetic-account setup, concise flow
guide, commit status and residual-risk list. Immediately present actual data
inventory for DEF-012 and first-build product review. Implementing retention
deletion, penalties or live integration then requires its own approved next slice.

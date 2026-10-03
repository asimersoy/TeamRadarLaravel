# Data, authorization and transaction contracts

**Status/owner/update:** [manifest](README.md). Authority: DEC-037, DEC-041,
DEC-045, DEC-047, DEC-048, DEC-050. Shared dependency of all domain modules.
Acceptance: X01–X04, R01–R06, M01–M05, T01–T04. Schema names are proposed;
equivalent structures may change without weakening these invariants.

## Stored business records

| Entity | Essential data and purpose | Integrity/access boundary |
| --- | --- | --- |
| users / profiles | Immutable ID, email, password hash, handle, clearance, stated game identifier/rank/source/shard/language | Unique normalized email/handle; separate self-edit allowlist from admin authority; credentials never serialized |
| honor_states | Score, nullable raw reference, eligible count, version/time | One per user; finite bounded score/reference; count >= 0; player sees own score only |
| friendships / requests | Canonical pair, requester, state, times | Unique normalized pair; no self; crossed requests atomic |
| parties / memberships / invitations | Owner, roster, readiness/settings version, invite state/time | Capacity <= 5 enforced with party lock; one active membership; recipient acceptance and friend check |
| active_participations | User ID and party or session ID | Unique user, exactly one destination; transactionally agrees with domain membership |
| queue_entries | Party, immutable queued roster/version/settings/time, state | At most one waiting entry per party; members occupy the expected active slots |
| sessions / participants | Size/mode/shard/language, status/time, roster origin and profile snapshots, attendance | Five distinct users; unique session/user; origin snapshot immutable; access never derived from mutable friendship |
| no_show_requests / votes | Session, target, deadline, resolution, voters | One active target/session; unique voter/request; actor not target; timestamps server-controlled |
| chat_messages | Session, sender, plain text, client key, server time | Unique session/sender/client key; access via membership and session state |
| feedback_submissions / ratings | Author/session, finalized time, skip/admission, target, three dimensions, mapped input | One finalized submission/session/author; unique author/target/session; eligible targets validated server-side |
| reports / rank_observations | Reporter/target/session, categories, text/observation, received time, late flag | No self; distinct reporter counting; separate numeric-rating eligibility; original evidence immutable |
| session_settlements / honor_applications | Session close, version/settings, eligibility reasons, canonical order, before/after state | Unique settlement/session and application/input; one atomic all-target settlement |
| admin_reviews / access_audit | Actor, case, viewed/reviewed time, note/status | Cleared-admin only, no client-selected role; audit access without duplicating sensitive payloads |

Retain individual dimensions as submission evidence for authorized review. The
honor input is still their mean, not three separate reputation dimensions. The
owner said storing dimensions separately was unnecessary, not prohibited, and
later explicitly requested full stored review context (DEC-045/047). Record this
minimal evidence choice in the actual inventory, not as public history scope.

Use foreign keys, check/unique constraints and indexes for membership, waiting
bucket/time, session/deadline, message cursor, report case and pending submissions.
Avoid cascade deletion of business evidence as ordinary cleanup. Database schema
and exact indexes are refined with PostgreSQL query plans during implementation.

## Authorization matrix

| Data/action | Self | Matched teammate | Outsider | Cleared admin |
| --- | --- | --- | --- | --- |
| Own honor | Read | No | No | Read relevant state |
| Public handle | Read | Read | Minimal exact lookup | Read |
| Email/account internals | Own relevant fields | No | No | Relevant case fields; never secrets |
| Session rank/identifier snapshot | Participant | Participant | No | Read |
| Session text | Subject to room lifecycle | Same | No | Audited read |
| Numeric feedback/report author/content | Own submission receipt only | No received detail | No | Full stored case detail |
| Rating/report creation | Only eligible session actor | Same rules | No | Not impersonation |
| Admin review state/note | No | No | No | Read/write without score effects |

Use authorization policies on routes, Livewire actions, queries and broadcast
authorization. Hiding a component does not secure its endpoint. Never mass-assign
owner IDs/clearance/score/eligibility/deadlines from request fields. Escaped output,
CSRF protection, secure session cookies and auth throttling are mandatory.
Origin IDs and reviewer details are not included in shared payloads merely
because the frontend does not display them.

## Settlement transaction and recovery

1. Lock session; return prior result if already settled or not due.
2. Freeze accepted submissions/reports and compute all outgoing eligibility.
3. Lock affected honor states in sorted user order, calculate each ordered input.
4. Write states, application evidence, admin flags and settlement marker atomically.
5. Commit, then notify. A failure rolls back all recipients, not a partial batch.

Unique settlement/application keys are the second guard against duplicate jobs.
No external network call inside this transaction. Recompute pending derived
values safely on retry; never apply twice after a worker timeout. A crashed
notification does not roll back committed honor; refetch recovers it.

Match assignment has the equivalent all-or-nothing contract, including current
active slots. Chat writes use idempotency keys. Admin marks reviewed use version
checks to prevent silently overwriting another review. Server UTC instants govern
deadlines; display local time without changing eligibility.

## Retention and minimization

Under DEC-047 keep stored first-pass business records until explicitly deleted:
ordinary/reported sessions, messages, submitted ratings/reports, profiles and
calculation evidence. No automatic settlement cleanup or hidden retention timer.
This does not require collecting unrelated data, passwords in logs, voice or
external game history. Cache expiry, session-token expiry, completed queue-job
cleanup and short-lived verification tokens are technical lifecycle controls,
not destruction of the retained business evidence; keep their purpose explicit.

No account deletion/purge UI in this pass. Actual erase/retention/correction policy
returns immediately after the first build in DEF-012, using a field-level inventory
of purpose, source, audience, backup copies and lifecycle. It must be settled
with applicable legal/privacy review before real-user release; indefinite local
development storage is not a legal conclusion. Admin clearance permits relevant
case context, never dumping passwords, tokens, encryption keys or infrastructure
secrets into the panel.

## Environment and abuse limits

Factories/seeders create fictional accounts, disjoint five-player sessions,
premades, outsider and admin roles, varied rank/honor, reports and deadlines.
Synthetic credentials are generated at runtime and shared only through local
developer setup, not committed into records. No real provider access is needed.
Seeding refuses production; test reset checks environment, DB hostname/name
and designated disposable target. Bind local services to loopback.

Rate-limit auth, lookup, invitations, chat and submissions; validate length/range
and actor IDs. Record denied access and failed jobs without sensitive body logs.
Document remaining collusion, early-end, false-report and self-acknowledgment
risks; don't claim the first pass solves them. Public use is not approved by a
passing local suite. Security regression tests and dependency review are
required, but neither is a professional compliance certification.

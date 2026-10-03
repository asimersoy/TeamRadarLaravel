# First-build data inventory — DEF-012 owner review

Status: implementation inventory, 2026-10-03. Not a new retention policy or legal
approval. Scope: fresh `qguard/` PostgreSQL schema and local Docker runtime;
legacy data is not imported. All accounts used for implementation checks are
fictional. DEC-047 retains business records until explicitly deleted. No business
purge, score correction, account deletion or voice recording is implemented.

## What actually exists

Every table below also has its listed identity/foreign keys; timestamps represent
server UTC. Field names are from the additive migrations, not inferred future
features. **Restricted** means data-cleared case admins plus authorized database
operators, not all players. Admin pages explicitly exclude secrets.

| Table | Actual fields / purpose | Source and readers |
| --- | --- | --- |
| users | id, name, email, email_verified_at, password hash, remember_token, created/updated_at, handle, riot_id, shard, language, stated_rank, competitive_access, admin_cleared, is_synthetic | Self-input/framework/operator fixtures. Self profile; exact handle to friends; relevant identity/profile fields to restricted case admin. Password/token never in admin/player payloads. Name initially duplicates handle. |
| honor_states | user_id, honor_score, smoothed_raw_rating_reference, eligible_rating_count, calculation_version, timestamps | Eligible settlement inputs. Self current score; restricted complete state. Not an exact-window calculation. |
| friendships | id, user_low/high, requester_id, state, timestamps | Consenting users; the two parties see handles/state. Restricted DB evidence. Pair record reused on later requests, not a complete event history. |
| parties | id, owner_id, state, shard, language, mode, version, timestamps | Owner/settings and lifecycle services; current members see relevant state. Restricted DB evidence. |
| party_memberships | id, party_id, user_id, ready, joined_at, left_at | Membership service; current party roster; retained origin/leave evidence. |
| party_invitations | id, party_id, recipient_id, state, timestamps | Owner/recipient actions; their current invites. Reinviting reuses pair row, not immutable invitation-event history. |
| active_participations | user_id, party_id OR game_session_id | Derived live exclusivity slot. Removed on leave/end, unlike retained membership evidence. Self/current domain services. |
| queue_entries | id, party_id, state, shard, language, mode, party_version, roster JSON user IDs, queued_at, search_cursor JSON, search_status, timestamps | Queue/matcher; player sees own status, not another party's honor or raw roster. Retained queue evidence; cursor is operational state. |
| matcher_progress | bucket, anchor_cursor, timestamps | Matcher traversal only; operator. No extra player profile data. |
| game_sessions | id, state, shard, language, mode, coordinator_id, compatibility_version, feedback_started_at/deadline, settled_at, version, timestamps | Atomic matcher and lifecycle services; authorized participants see applicable state/deadline. |
| session_participants | id, game_session_id, user_id, origin_party_id, handle, riot_id, rank_snapshot/source, ownership, honor_snapshot, state, acknowledged_at, ended_at, timestamps | Immutable matching snapshot plus attendance transitions. Teammates see handle/identifier/rank/aggregate honor/state, **not** origin IDs or feedback mappings. Removed no-show target loses room access. |
| chat_messages | id, game_session_id, sender_id, client_message_id, body, created_at | Player plain text, including any player-supplied links. Authorized room participants and audited case admin. No URL preview fetching. |
| no_show_requests | id, game_session_id, target_id, state, response_deadline, timestamps | Reports and server clock. Room sees request/deadline; restricted review sees full evidence. |
| no_show_votes | id, no_show_request_id, voter_id, created_at | Explicit teammate votes; restricted evidence. No automatic honor penalty. |
| feedback_submissions | id, game_session_id, participant_id, skipped, self_admitted_early_leave, finalized_at | User's final submission/skip. Self receipt only; restricted case evidence. |
| behavior_ratings | id, submission_id, reviewer/recipient_participant_id, communication, sportsmanship, effort | Three 1–10 choices. Restricted evidence; no player received-history/reviewer mapping. Their mean is one honor input. Stored dimensions do not create separate honor axes. |
| conduct_reports | id, game_session_id, reporter/target_participant_id, category, note, late, created_at | User allegation, not verified fact. Restricted admin; two distinct timely reporters affect outgoing eligibility only. One immutable late item per actor/target/category; retries do not duplicate or overwrite. |
| rank_observations | id, submission_id, target_participant_id, observation | Matches/Different/Not observed. Restricted evidence; never official verification or automatic rank correction. |
| honor_settlements | id, game_session_id, calculation_version, parameters JSON, exclusions JSON, created_at | Atomic close/audit. Restricted; numeric values and eligibility reasons retained. |
| honor_applications | id, settlement_id, rating_id, recipient_id, input_rating, before_state/after_state JSON, created_at | Exactly-once ordered calculation audit. Restricted. Calculation uses aggregate state, not historical-row scans. |
| moderation_cases | id, game_session_id, status, has_late_evidence, automatic_invalidations JSON, review_note, version, timestamps | Evidence flags and cleared human review. Restricted. Marking reviewed does not change scores/evidence. |
| admin_access_events | id, actor_id, case_id, action, context JSON, created_at | Inbox/case view/review audit. Context holds filters/status/previous version, not duplicated rating/chat bodies or credentials. Restricted operator evidence. |

Retaining ratings/audit rows for human review is distinct from computing an
exact rolling history: the approved honor method still uses only score, smoothed
raw reference and count. No volatility/reviewer-accountability state exists.

## Operational records and copies

| Storage | Fields/content and exposure | Lifecycle / backup treatment |
| --- | --- | --- |
| sessions | login-session id, user_id, ip_address, user_agent, serialized payload, last_activity | Framework login sessions, not game sessions. Expire after configured 120 minutes inactivity; logout/password changes invalidate. Operator-only; payload may include CSRF/flash input. Included in full DB dumps, handle as sensitive. |
| password_reset_tokens | email, hashed token, created_at | Short-lived framework recovery token; never in app views/log reports. DB backup copy also sensitive. |
| cache / cache_locks | key, value/owner, expiration | Rate limits, matcher/scheduler leases and last-success heartbeat. Technical expiry; no business evidence purge. |
| jobs / job_batches / failed_jobs | job id/UUID, queue/connection, serialized payload, attempts/reservation/availability, batch counts/options/times, failed exception/time | Operational worker data. QGuard room notifications carry session ID/version only. Successful jobs are removed; failed jobs retained for operator investigation. Do not export raw exception bodies casually. |
| migrations | id, migration, batch | Schema migration ledger; operator; included in full backup. |
| runtime storage | compiled views, logs, private generated demo credentials and testing clock offset | Logs include bounded denial actor/route metadata and exceptions; no intentional chat/rating-body logging. Generated credentials mode0600, ignored by Git. Compiled views operational. Browser clock only in guarded test storage. |
| .env / future production secret file | app encryption key, independent DB/test passwords, Reverb signing secret | Host-local ignored file, never image/Git/report. Back up securely separately from DB. Losing APP_KEY can invalidate encrypted material. Reverb public app key is not its secret. |
| Mailpit | fictional recipient/body and verification/reset links | Local-only development mail store; test mail has no host port. Development inbox loopback8123; anyone with local access can read it. No real mail delivery. Not business evidence; separate local container data. |
| browser artifacts | screenshots, traces, request/DOM snapshots, generated synthetic test accounts | Ignored test-results and outer outputs; can contain fixture data, cookies and submitted test passwords. Do not publish raw traces. Inspect/use locally. |
| PostgreSQL volume / dumps | All fields above, including hashes/tokens and operational tables | Dev named volume survives rebuild. Test DB is explicitly disposable tmpfs. Isolated rehearsal dumps live outside Git in workspace snapshots, mode0600. Restore creates an additional database copy, never silently replaces source. |

No object storage, external telemetry, Discord voice/text, Riot account tokens,
payment data or external game history is collected by this build. Browsers load
local assets/system fonts. Socket notifications contain only room ID/version;
authorized HTTP fetches supply allowed content.

## Decisions now ready for the owner, not silently made by implementation

Review this actual inventory and the working UI, then decide retention for
ordinary versus reported-session text/ratings/audit; account closure/deletion;
correction/appeal evidence; admin access review; time limits/holds; and treatment
of backups/restored copies and debugging traces. Current indefinite **local
development** retention is not approval for real-user collection or worldwide
release. Applicable legal/privacy and provider gates remain before that boundary.

Any deletion/expiry implementation needs an approved next slice, tests and
specific destructive-operation authority. Nothing in this inventory authorizes
purging current records or expanding collection.

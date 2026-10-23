# Identity and rank source contract

**Status/owner/update:** [manifest](README.md). Authority: DEC-013, DEC-017,
DEC-018, DEC-044, DEC-045, DEC-048, DEC-052. Dependencies: [data/security](data-and-security.md),
[matching](parties-and-matchmaking.md). Acceptance: F01–F02, F08, I01–I03.

**Later direction:** `DEC-055` adds the future queue/lobby checks below. The
first-pass contract and implementation remain the baseline until that change's
open rules, data contract and acceptance tests are settled; this is not a claim
that RSO or repeated rank confirmation is already implemented.

## QGuard identity

Use framework-supported email/password authentication, hashed passwords,
verification and reset. Development email goes to a local mail sink, not actual
recipients. Synthetic users can be marked verified by the dev-only seeder.
Immutable user ID is internal authority; public unique handle is for deliberate
friend lookup. No public email/account directory. Admin clearance is assigned
through a restricted seed/operational command, never user-controlled fields.

Profile holds a Riot ID as a user-entered coordination identifier, stated rank,
game shard and preferred language. Riot ID entry is not ownership verification.
Do not collect Riot/Discord passwords, session cookies, local-client tokens or
computer access. QGuard login does not authenticate a game account.

## Provider decision and fallback

Current official evidence: RSO needs production approval; it identifies an
opted-in account but does not by itself guarantee complete current-rank data.
The documented rank endpoint is a leaderboard, not demonstrated all-player
rank coverage. See [research](../../research/first-pass-technical-foundations.md).

No approved credentials/access are established in this repository review. At
S2 recheck available **authorized** official access. If there is none, implement
the selected declared-rank fallback now. Do not block the build waiting for
Riot, submit applications, scrape private APIs or represent mocks as integration.
Real provider retrieval is included only if its permissions, coverage and
data handling are proven within scope; otherwise leave that adapter unavailable.

Define a small `GameProfileProvider` contract returning identifier, ownership
status, rank value/source/observed-at, or explicit unavailable/unknown. First-pass
production code has declared input and unavailable official adapter; test doubles
remain test-only. No fake successful OAuth in the normal UI.

Ownership values: `unverified`, or `provider_verified` only with actual evidence.
Rank provenance: `self_declared`, `official` only if evidenced, or `unknown`.
Keep these independent. Store provider time and retrieval method/version if a
real adapter is later enabled. Matchmaking never silently upgrades provenance.

## Queue validation and snapshots

Offer the current game rank vocabulary and Unknown/unplaced. For the initial
Competitive development queue, require a declared placed rank and declaration
of Competitive access; unknown users can finish setup but cannot enter that
specific queue. This is an agent-selected first-pass restriction, not a promise
of game-side verification or a final treatment of placement players.

Queue selections use the same shard and a common selected language for all
premade members. Each member confirms readiness against current settings.
Editing a relevant field while queued cancels/requires re-readying that entry;
no silent mutation of a queued roster. Matched session stores immutable rank,
source, identifier and premade snapshots. Later profile edits affect only future
queue entries and do not falsify old report context.

Show stated rank/provenance and the participant's match-time aggregate honor
snapshot to authorized matched teammates (DEC-052). Do not attach private
received-rating details or reviewer identities to that roster.
At Session ended ask whether a teammate's observed rank differed. Allow
Matches / Different / Not observed; Different can include observed rank and
brief optional explanation. A response is testimony, not proof or official
account verification. Unknown does not count as confirmation.

Discrepancy evidence appears in the admin case context; no automatic rank
replacement, honor deduction or sanction. Proposed category treatment is defined
once in [feedback/reports](feedback-honor-and-reports.md); do not implement a
second conflicting invalidation rule in the profile module.

## Access and later real-user use

Riot's current LFG/registration/opt-in policies require attention even when an
app uses declarations. A locally testable synthetic build does not prove a
compliant public workaround. Provider registration/RSO and release review must
be resolved before serving real Valorant players. This gates release, not local
feature implementation. Revisit data inventory when any real adapter is added.

## Subsequent Owner Direction — Queue Confirmation And Lobby Check

**Authority/status:** `DEC-055`, 2026-10-23; behavior direction approved,
detailed slice not implementation-ready. Current provider and test gates apply.

- Before each matchmaking entry, use authorized official access after RSO to
  retrieve the latest available ranked-match tier. Ask the player to confirm it
  or enter a corrected current rank. Every later entry repeats this checkpoint;
  extra after-game/session polling is not separately selected.
- Preserve API-observed tier/time separately from the player-confirmed or
  manually corrected declaration. Neither user nor peer confirmation guarantees
  current rank or proves which account is actually present in a game lobby.
  Existing fallback covers unavailable integration; exact failure/reset and
  unknown-rank behavior still needs the slice contract.
- After QGuard forms the team, ask teammates whether everyone in the game lobby
  is using the declared accounts/ranks. A qualifying discrepancy dissolves the
  QGuard team, explains the reported account/rank mismatch, and allows voluntary
  requeue through the same confirmation process. It does not remove players
  from VALORANT or automatically punish them.
- **Next owner question:** is one discrepancy report enough, or must other
  teammates corroborate it? Do not borrow the no-show or honor-report quorum.
  Successful confirmation requirements, unobservable/unknown answers, timeout,
  disputes and correction behavior also need specification. What ranks/accounts
  peers can actually inspect in the game remains a live-evidence dependency.
- **Implementation impact to specify:** account/rank source labels and
  snapshots, queued-edit cancellation, pre-play session transitions, atomic slot
  release, member notification/access, requeue, and feedback eligibility for a
  discrepancy-disbanded team. Existing post-session discrepancy evidence remains;
  no new automatic score or feedback-invalidating consequence is approved.
- **Required evidence:** tests for refresh/confirmation/correction, unavailable
  or stale data, the eventual report threshold, unauthorized/duplicate reports,
  races against session end/requeue and correct user explanations. Existing
  first-pass I01–I03/S01–S04 results do not validate this new flow. Use labeled
  fixtures for local tests and the existing gates for any real integration.

Source facts: [official-match rank research](../../research/valorant-client-api-and-ui-status.md#rank-from-the-latest-available-competitive-match).
Lifecycle changes belong with [sessions](sessions-chat-and-handoff.md), not a
second independent cancellation implementation in this module. Revisit this
section when the owner resolves the report rule or authorizes the later slice.

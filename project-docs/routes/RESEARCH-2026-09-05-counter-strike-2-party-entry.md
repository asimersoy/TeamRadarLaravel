# Task Route: RESEARCH-2026-09-05 Counter-Strike 2 Party Entry

- **Objective:** determine whether current Counter-Strike 2 provides an
  official, sufficiently usable way for QGuard-matched players to join an
  ordinary matchmaking party without first becoming Steam friends, and, if it
  does, continue far enough into rank, access, and policy constraints to show
  whether CS2 merits an owner game-selection review alongside Valorant
- **Status:** research complete; the later owner decision in `DEC-019`
  rejected the proposed Looking to Play route, while a separate Steam group
  route remains under review; no game-selection change approved
- **Owner:** primary Codex agent for research; project owner for any product or
  game-selection decision
- **Started:** 2026-09-05
- **Completed:** 2026-09-05
- **Baseline:** clean `new-development` at
  `55a50ecee8d15679d042835071114218210f6ac8`

## Routed Procedures

- Current CS2, Steam, Discord, API, rank, and provider-policy facts are
  date-sensitive: yes ->
  `../../portable-project-workflow-system/docs/procedures/research-sourcing-and-search.md`
- The result may reopen the selected-game and party-entry decision: yes ->
  `../../portable-project-workflow-system/docs/procedures/product-planning.md`
- Rank, matchmaking, reputation, or access findings may affect eligibility and
  user decisions: yes ->
  `../../portable-project-workflow-system/docs/procedures/decision-and-recommendation-safety.md`
- Steam identifiers, account linking, and a future integration may create a
  personal-data flow: yes ->
  `../../portable-project-workflow-system/docs/procedures/privacy-data-and-legal.md`
- Valve/Steam permission and later qualified review may gate a concrete flow:
  yes ->
  `../../portable-project-workflow-system/docs/procedures/external-review.md`
- Current Valorant conclusions and cross-game comparisons require
  reconciliation after the new evidence: yes ->
  `../../portable-project-workflow-system/docs/procedures/audit-and-reconciliation.md`
- Any new selection remains an owner decision; current Valorant verification
  may remain deferred while the comparison is reviewed: yes ->
  `../../portable-project-workflow-system/docs/procedures/deferral-and-owner-review.md`
- Code/configuration, delegation, public content, rendered design, migration,
  deployment, provider contact, live-account/client testing, destructive
  action, or remote Git action: no

## Research Questions And Counting Rule

1. Can two current PC players join the same ordinary CS2 public/ranked
   matchmaking party without first becoming Steam friends?
2. What exact player-visible mechanism enables this: an official lobby link,
   lobby identifier/code, Steam invite, in-game discovery/invite, Discord Join,
   or another documented route?
3. Can a normal host expose the required token or action to QGuard or a
   QGuard-managed coordination room without an undocumented interface?
4. What recipient prerequisites, visibility rules, privacy settings, regions,
   modes, expiry behavior, and failure states are documented or still require
   a live test?
5. If party entry is promising, what official rank data and supported
   integration surfaces are available, and what provider-policy constraints
   apply to the exact QGuard actions under consideration?

A dedicated/community server connection, workshop session, private match,
custom game, tournament code, spectator link, or friend-first invite does not
count as the desired ordinary matchmaking-party flow. A non-friend invitation
can count only if current first-party evidence shows how ordinary users expose
and accept it; a generic Steamworks capability available only to a game's
developer does not by itself establish a QGuard-usable CS2 flow.

## Authority, Boundaries, And Risks

- **Controlling decisions:** `DEC-004`, `DEC-008`, `DEC-011`, `DEC-013`, and
  `DEC-015` through `DEC-018`.
- **Owner instruction recorded for this task:** investigate CS2 as another
  candidate; if a friendship-free lobby path exists, pursue the bounded
  feasibility research and bring the route back for comparison. This is not
  approval to replace Valorant.
- **Included:** current public first-party Valve, Steam, CS2, and relevant
  Discord documentation; carefully labelled corroborating evidence only when
  first-party material does not document the player-visible edge; party entry,
  token exposure, rank access, exact policy fit, and comparison with the
  already-recorded Valorant candidate.
- **Excluded:** assuming Steamworks developer APIs are callable by QGuard;
  reverse engineering, memory reading, network interception, undocumented
  console or URI dependence, credentials, live clients/accounts, collecting
  player data, provider contact, implementation, legal conclusions, game
  replacement, remote/destructive operations, publication, or deployment.
- **Primary risks:** confusing server joining with party joining; confusing a
  game-developer lobby API with a third-party integration; treating old CS:GO
  behavior as current CS2 behavior; overlooking privacy/friend-only settings;
  or turning a promising mechanism into an approved requirement without an
  owner decision and behavioral test.

## Planned Evidence And Stop Conditions

- Record publisher, title, canonical URL, access date, supported claim,
  evidence class, and limitation for each material source.
- Separate verified facts, bounded inferences, owner instruction, proposal,
  open questions, and deferred/live verification.
- Stop before any conclusion requiring an undocumented client surface,
  provider permission not in evidence, a live account/client experiment, or a
  product decision reserved to the owner.
- Reconcile the source ledger, focused findings, decisions/open questions,
  deferred work, product foundations, planning sequence, README, and current
  state only to the degree the evidence changes their routing.
- Verify project-document links, `git diff --check`, complete diff scope, and
  preservation of the canonical workflow package and legacy application.
- **Commit boundary:** one additive project-research/documentation commit after
  internal verification; no push.

## Outcome

- Valve's Looking to Play feature is a credible official route for inviting
  non-friends into an ordinary CS2 party. CS2 release notes establish its CS2
  lineage, but deterministic exact-user discovery in the current client is
  unverified.
- Old first-party Nearby/Public and Steam Group lobby descriptions provide two
  additional current-client test candidates; their old UI descriptions are not
  treated as current guarantees.
- No current first-party player-visible shareable ordinary-party link/code,
  CS2 Discord Game Invite, supported QGuard AppID 730 lobby-control interface,
  or all-player exact-rank endpoint was found.
- Steam OpenID is an official identity-linking path. It does not prove rank,
  Prime status, lobby membership, or good standing.
- The exact user-mediated actions reviewed are not classified as cheating by
  the cited sources. Unauthorized client control or non-human automation is a
  distinct restricted path and is not proposed.
- The findings are recorded in the
  [focused CS2 research report](../research/counter-strike-2-party-entry-feasibility.md)
  and [source ledger](../research/game-api-source-ledger.md).

## Remaining Owner And Verification Gates

- `DEC-018` remains current because the research instruction did not
  unambiguously select CS2 over Valorant.
- On 2026-09-06, the owner rejected Looking to Play for QGuard under `DEC-019`.
  The proposed Looking to Play test is cancelled and is no longer an open gate.
- A later follow-up answered the bounded Steam communication questions, and
  `DEC-020` clarified that manual chat and persistent Community Group membership
  do not meet the preferred coordination criterion. See the
  [Steam communication and group route](RESEARCH-2026-09-06-steam-nonfriend-communication-and-group.md).
- The current cross-game conclusion is owned by the
  [Discord coordination route](RESEARCH-2026-09-06-discord-coordination-and-game-join-comparison.md):
  Discord communication is feasible for CS2, but an ordinary CS2 party handoff
  is not established; Valorant remains selected under `DEC-018`.
- No account, client, credential, API call, provider contact, or live experiment
  occurred in this route.

## Verification

- Project Markdown relative links were checked after reconciliation.
- `git diff --check` was run after reconciliation.
- The changed-path review confirmed project-record-only scope; the portable
  workflow package and legacy application remained unchanged.
- No application test or portable-system validator was required because this
  route changes only TeamRadar-specific research and planning records.

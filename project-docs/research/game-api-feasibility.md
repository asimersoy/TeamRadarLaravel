# QGuard Game API Feasibility Research Brief

- **Record type:** current research brief
- **Status:** required; execution pending
- **Research owner:** primary Codex agent
- **Decision owner:** project owner
- **Authority:** `DEC-011` and `DEC-013`
- **Created:** 2026-09-05
- **Date sensitivity:** high; legacy platform/API claims are not current facts
- **Implementation authority:** none

## Decision Supported

Determine which game and integration boundary can support a working,
low-friction first QGuard product. Begin with Apex Legends and Valorant. The
research informs, but does not make, the owner's game or fallback-flow decision.

## Research Questions

For each candidate game, establish from current authoritative sources:

1. what official server-side APIs expose identity, profile, rank, competitive
   tier, match, party, lobby, or session data;
2. what documented or legitimate local-client APIs exist and whether they can
   create a normal party/lobby, invite matched users, accept/join, or otherwise
   reduce party-formation friction;
3. whether capabilities apply to ordinary public/ranked parties, custom
   matches, tournaments, or only another context;
4. required developer registration, user authorization, application approval,
   credentials, scopes, rate limits, platform/region restrictions, and review;
5. published platform policy, acceptable-use, distribution, anti-cheat,
   automation, security, and data-handling constraints;
6. stability/support status, versioning, deprecation history, and whether the
   interface is documented, supported, gated, unofficial, or unverified;
7. accuracy, freshness, missing/private/unranked cases, and reconciliation needs
   for rank data; and
8. practical failure and fallback states when an API, client, account,
   permission, party action, or rank value is unavailable.

## Evidence Standard

- Use current official developer documentation, platform policy, terms, and
  first-party announcements as primary sources.
- Record publisher, title, canonical URL, access date, supported claim, limits,
  access/approval conditions, and relevant version/date in the
  [source ledger](game-api-source-ledger.md).
- Label gated, undocumented, unofficial, community-inferred, contradictory, or
  unavailable information explicitly.
- Do not treat old bundled docs, implementation experiments, search snippets,
  third-party wrappers, or remembered capabilities as current authority.
- Separate documented capability from policy permission and from experimentally
  verified behavior.

## Outcome Vocabulary

Classify each capability as `supported`, `supported-with-conditions`,
`approval-gated`, `unsupported`, `undocumented/unverified`, or `unknown`.

## Boundaries

This research does not authorize client automation, reverse engineering,
anti-cheat interaction, traffic interception, credential use, live-client
experiments, account access, data collection, provider contact, implementation,
or a final game choice. If both initial candidates lack the preferred
capabilities, present the evidence before expanding to other games or selecting
an alternate product flow.

## Completion Evidence

- source ledger with current primary sources and access dates;
- side-by-side capability/policy matrix for Apex and Valorant;
- explicit unknowns and inaccessible/gated documentation;
- risk and feasibility findings separated from product recommendations;
- viable integration boundaries and fallback options; and
- owner decision still required for the first game and implementation scope.

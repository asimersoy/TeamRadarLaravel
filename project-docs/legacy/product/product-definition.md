# Legacy Product Definition

- **Record type:** historical product reconstruction
- **Status:** draft for owner review
- **Current authority:** none; this does not define the rewrite
- **Primary sources:** owner-provided memory reconstruction, legacy Laravel UI,
  `docs/PROJECT_OVERVIEW.md`, `docs/TO_DO.md`, and Git history

## Identity

The remembered final name was **TeamRadar**. **QueueGuard** appeared throughout
the Laravel UI as a temporary codename or label. The current owner also refers
to the project as TeamRadar, but the historical claim that QueueGuard was
formally superseded is supplied mainly by the memory reconstruction.

## Core Problem

The old concept assumed that ordinary multiplayer matchmaking is effective at
placing players into a game but poor at helping them find teammates who are:

- behaviorally reliable;
- compatible in goals and play style;
- willing to communicate and coordinate;
- approximately compatible in skill/rank; and
- interested in playing together rather than acting as anonymous randoms.

The intended comparison was not only in-game random queueing. The concept also
positioned TeamRadar as faster and more structured than posting a static
advertisement in a Discord server, forum, or looking-for-group channel.

## Remembered Value Proposition

TeamRadar would match people for compatibility before they entered ordinary
game matchmaking, create a low-friction place to coordinate, and build a
behavioral trust signal from post-session teammate feedback.

The old concept's distinguishing loop was:

> find teammates -> coordinate -> play together -> review teammates -> improve
> the trust signal used or displayed in later matching

The intended value was behavioral reliability, not a promise of winning,
mechanical skill, safety, or freedom from harassment.

## Most Developed Historical Product Shape

The memory reconstruction describes the most developed idea as an
**Apex Legends public-match teammate finder**:

- TeamRadar forms a party; it does not replace Apex matchmaking.
- Players manually add or invite one another and then enter pubs/ranked through
  Apex itself.
- A local relay may observe Apex LiveAPI session events so that TeamRadar can
  establish presence and connect reviews to a real matched session.
- Rank is declared by the player for MVP rather than guaranteed by an API.
- Post-session feedback contributes to honor/reputation.
- A trusted player's vote was remembered as carrying more weight, although no
  formula survives.

This shape is coherent with the repository's earlier Apex integration work,
but its “final” status is not fully corroborated because the latest reachable
product commit switched the app toward Valorant. See
[contradictions and confidence](../../evidence/contradictions-and-confidence.md).

## Product Boundaries Remembered For The Apex MVP

### Inside The Old MVP Concept

- public landing page and TeamRadar account authentication;
- one linked game account;
- declared/reconfirmed current rank;
- optional or expected local relay setup for Apex integration;
- queue entry and a still-undefined compatibility match;
- private website coordination room;
- manual game-account exchange/invites;
- readiness/party coordination;
- session/presence evidence where the relay is active;
- post-session teammate reviews/reports;
- basic honor/reputation calculation and display; and
- simple moderation when reports require human handling.

### Outside Or Removed From The Old MVP

- automatic Apex friend requests;
- automatic creation or joining of ordinary public/ranked parties;
- custom/private tournament lobbies as the main product flow;
- automatic rank verification through an official or third-party API;
- deterministic derivation of Apex `nucleusHash` from a public platform ID;
- voice recording, speech monitoring, or AI toxicity detection;
- sophisticated fraud, confidence, decay, or punishment systems;
- multi-game production support;
- mandatory hosted WebSocket infrastructure before an MVP works; and
- distributed production infrastructure before product validation.

Most exclusion labels above come from the memory reconstruction. The repository
shows that several were explored, but not always the exact rejection decision.

## Audience

The inferred primary audience was an Apex player entering normal public or
ranked play who did not already have a suitable party. Possible secondary
audiences included partial parties looking for one player and people seeking a
longer-term reliable group, but neither path was fully specified.

The old records never firmly settled:

- age boundary;
- region/market;
- platform/cross-play scope;
- competitive versus casual focus;
- accessibility needs;
- whether the product served one-session introductions, persistent teams, or
  both; or
- whether solo and partial-party users shared one queue.

## Historical Positioning

Legacy UI used strong phrases such as “Find teammates, not toxicity,” “No
toxicity allowed,” “Anti-Toxicity Filters,” and “Good Standing.” It also showed
placeholder online counts, wait times, ranks, reviews, and recent-match data.

Those phrases expressed intended positioning, not proven capability. A future
product must not repeat them without a concrete moderation model, truthful
metrics, and evidence that the experience supports the claim.

## Product Principles Inferred From The Old Idea

These are historical hypotheses, not current principles:

1. Party formation should be easier than an unstructured LFG post.
2. Behavioral reliability should remain distinct from mechanical rank.
3. Matching should be mutual and explainable rather than a static directory.
4. A normal decline should not be treated as misconduct.
5. Reviews should be limited to people who plausibly played together.
6. Technical integration should support trust/coordination, not control the
   game unnecessarily.
7. The earliest version should avoid external integrations that prevent
   shipping a prototype.
8. Infrastructure should stay simple until the product boundary stabilizes.

## Historical Success Concept

No approved targets survive. The implicit success model was that a player
could find a compatible group, successfully coordinate and play, then provide
useful feedback that made future group formation more trustworthy.

Candidate measures such as wait time, match acceptance, completed sessions,
repeat grouping, review participation, report rates, or retention were not
defined as historical decisions and must not be fabricated retroactively.

## What This Record Does Not Decide

It does not decide that the rewrite will target Apex, use a relay, use rank or
honor, collect reviews, use Laravel, or retain any old MVP boundary. Those are
future owner decisions.

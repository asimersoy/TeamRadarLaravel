# Legacy Matchmaking, Honor, And Moderation

- **Record type:** historical decision-system reconstruction
- **Status:** draft for owner review
- **Current authority:** none
- **Risk note:** the owner now approves behavioral honor as QGuard's central
  concept, but no score, weighting, visibility, matching, eligibility,
  restriction, punishment, or moderation mechanism is approved

## Intended Separation Of Signals

The old idea treated two broad dimensions as different:

- **Rank/skill:** an approximation of mechanical level or competitive tier.
- **Honor/reliability:** an approximation of whether someone behaves like a
  dependable teammate.

The project did not intend honor to be a disguised win-rate score. Legacy copy
focused on communication, teamwork, quitting, toxicity, and good standing.
The owner confirmed this behavioral-honor versus mechanical-rank separation for
current QGuard in `DEC-010`; the details below remain historical evidence and
open design questions.

## Matching Classification

The historical system is best classified as proposed **preference matching**
with a possible **screening/eligibility** layer if low honor affects queue
access or visibility. The old records never fixed which of these applied.

That distinction matters:

- displaying honor as information lets users make their own decision;
- using honor as a match weight changes ordering and visibility;
- separating or deprioritizing low-honor users creates eligibility effects; and
- warnings, restrictions, suspensions, or bans create moderation decisions.

The legacy idea moved among these possibilities without an approved rule set.

## Match Inputs With Historical Support

### Strongest Support

- game;
- declared current rank/skill;
- behavioral honor/reliability; and
- a user actively entering the TeamRadar queue.

### Mentioned Or Plausible But Unsettled

- mode such as competitive or unrated;
- region/data center;
- language;
- microphone/communication preference;
- platform, input method, and cross-play;
- legend/role/team composition;
- relaxed versus aggressive play style;
- availability/session length;
- solo versus pre-made partial party;
- desired team size; and
- how criteria widen as wait time grows.

No final questionnaire, validation, skip logic, weights, hard exclusions, tie
rules, or fallback behavior survives.

## Queue Behavior

The UI implied:

- a Find Match action;
- online population;
- estimated wait;
- selected mode;
- current account/rank/reputation; and
- a transition to a matched group.

The actual page is static. There is no surviving queue job, criteria version,
candidate retrieval, matching function, deterministic fixture set, timeout
behavior, or no-match result.

Historical unknowns include:

- exact rank tolerance;
- whether wait time widens rank or preference boundaries;
- whether honor is a filter, weight, badge, or none of these;
- whether new/unrated users share a pool;
- whether low-honor users are separated or simply labelled;
- whether the first complete group always has three players for Apex;
- how partial parties affect fairness and wait; and
- how blocks, reports, prior pairings, or repeated teammates affect candidates.

## Review Eligibility

The remembered design wanted reviews tied to a TeamRadar-created group that
actually played together. The relay/session layer was meant to reduce arbitrary
votes between strangers.

No final rule defined sufficient proof. Candidate evidence might have included:

- all relevant relays connected;
- identifiers observed in the same lobby or session;
- a session-start event;
- a minimum duration;
- a session-end event; or
- manual confirmation when relay evidence was unavailable.

Each option has failure cases: relay disconnects, platform differences, event
gaps, players leaving early, false correlations, parties playing several
matches, and people who legitimately played without the relay.

## Honor And Review Model

### Remembered Core

- teammates review one another after play;
- feedback updates an honor/reputation signal;
- honor reflects behavior/reliability rather than skill;
- a trusted reviewer's vote should carry more weight than a new or distrusted
  reviewer's vote; and
- serious behavior or inaccurate information can be reported.

### Unsettled Interface

- thumbs up/down;
- numerical rating;
- “would play again”;
- positive commendations;
- separate communication/teamwork/reliability/quitting/toxicity labels;
- free text;
- negative reason codes; or
- a separate report flow.

Free text would introduce materially greater moderation, privacy, retention,
and harmful-content handling obligations. The old idea did not address them.

### Unsettled Formula

- starting score/prior;
- reviewer trust weight;
- minimum sessions before display;
- positive/negative balance;
- confidence or sample-size display;
- time decay;
- repeated-teammate limits;
- reciprocal-rating treatment;
- coordinated abuse resistance;
- effect of overturned reports;
- score recovery; and
- whether rank/skill ever interacts with honor.

No mathematical formula or versioned criteria survive. Weighted voting is a
remembered design intention, not an implementable specification.

## Historical Abuse And Fairness Risks

The old anti-abuse intuition—trusted votes have more weight—addresses only a
small part of the problem. Unresolved risks included:

- new-account and sock-puppet abuse;
- reciprocal boosting;
- brigading or coordinated negative ratings;
- retaliation after rejection or a lost match;
- discrimination hidden as “preference” or “toxicity” feedback;
- popular players accumulating disproportionate influence;
- an early score creating a self-reinforcing visibility loop;
- friends rating one another repeatedly;
- false rank/account reports;
- moderator inconsistency;
- lack of correction or appeal; and
- account deletion/recreation to escape reputation.

## Moderation Boundary

The remembered MVP allowed basic reports and possibly manual moderation. It
explicitly did not require AI voice monitoring, live speech analysis, advanced
behavior classification, or a fully automated punishment system.

No historical operator policy defined:

- report taxonomy and severity;
- emergency versus ordinary handling;
- moderator access and evidence minimization;
- service levels;
- warnings/restrictions/suspensions/bans;
- notification of reasons;
- appeals and restoration;
- evidence retention and deletion;
- law-enforcement or safeguarding escalation; or
- audit/monitoring of moderator actions.

## Explanation And User Control

The old project did not specify what users would be told about:

- why they received a match or no match;
- which preference was decisive;
- whether honor affected ordering;
- why an honor score changed;
- how many reviews support a score;
- whether a review was excluded or down-weighted;
- why a restriction was applied; or
- how to correct profile data or appeal a decision.

Any future use of ranking, reputation, or eligibility needs these explanations
and corresponding deterministic/adversarial tests before implementation.

## Historical Completion Gap

No matching algorithm, review model, honor schema, moderation workflow,
criteria version, test fixture inventory, monitoring plan, or rollback method
was implemented. The legacy material defines a product aspiration and risk
area, not a completed decision system.

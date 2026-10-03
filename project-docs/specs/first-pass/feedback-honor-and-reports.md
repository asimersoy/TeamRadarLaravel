# Feedback eligibility, honor calculation and human review

**Status/owner/update:** [manifest](README.md). Authority: DEC-026–034,
DEC-037–043, DEC-045, DEC-047–048. Dependencies: immutable session roster,
session state, data/security. Acceptance: F08–F10, H01–H08, R01–R06.
This contract, including agent-authored edge treatments and numerical defaults,
is accepted in the DEC-052 packet approval. It does not claim the owner originally
designed each detail. Teammates see aggregate honor under DEC-052, never the
received-feedback authors or individual received ratings described here.

## Submission contract and timer

Each participant opens feedback through Session ended. For each eligible
non-premade teammate, optionally supply all three integer ratings: communication,
sportsmanship, effort, each 1–10. Either all three are present or no numeric
rating exists for that target. No self-rating, no numeric default and no mutual
rating within the original premade. Other players can rate premade members.

Separate “Dishonorable actions” flags default No: left before the game finished,
harmful/unsportsmanlike language. Discord noncommunication is absent while there
is no Discord-enabled queue. Reports have optional bounded explanatory text.
The rank observation question is separate (Matches/Different/Not observed).
Allow explicit self-admission of leaving early, distinct from ordinary Session
ended. Session ended, closing a tab or finishing feedback alone is not an
early-leaving admission. Display this distinction clearly.

Finalize commits one immutable submission with its numeric inputs, reports,
observations and optional admission, or an explicit skip with no numeric input.
Allow editing a local draft before finalization; no server-side draft is used
for eligibility. Server validation rejects impossible target/category/value.
Retrying finalization returns the existing result; it does not create another
vote. Do not require a rating of every teammate or block the next queue.

The first finalized submission after Session ended starts a **ten-minute**
server deadline for the session. Finalized explicit skip counts as completion.
All five finalized => settle early; otherwise settle at the stored deadline.
No first finalized submission => no timer and no fabricated honor change.
Returning users see a pending prompt while eligible; they may skip. Missing
responses at close contribute nothing, not a neutral or negative rating.

At the exact deadline, new numeric finalization is closed, regardless of worker
lag. Submission and settlement lock the session row; accepted payloads must
commit consistently with the time check. A small scheduler delay cannot extend
the allowed window. Late evidence may be submitted to the human report inbox
by a session participant, tagged Late; it does not reopen settled honor.
Record this limitation in the UI. Corrections/appeals remain DEF-009.

## Eligibility and automatic consequences

At settlement, assess reports before applying any numeric rating:

1. Count distinct other participants reporting a target in any qualifying
   dishonorable-action category, not number of flags or submissions.
2. Two or more invalidate **all that target's outgoing numeric ratings for this
   session**, automatically before human review. Incoming ratings are unaffected.
3. An explicit self-admitted early leaver also has ineligible outgoing ratings.
4. Numeric input between original premade members is ineligible regardless of
   reports. Invalid inputs affect neither honor nor the raw reference/count.
5. Tag the admin case with the reason, reporter count, invalidated inputs and
   settlement version. Do not subtract honor, ban, mute or alter a game rank.

Packet-approved evidence treatment: one unconfirmed early-leave accusation is a report,
not a proven departure; without self-admission, the existing two-reporter rule
determines automatic invalidation. There is no game attendance sensor. This is
an accepted first-pass interpretation, not an anti-griefing proof.

All actual session participants, including original premades and participants
whose numeric ratings are invalidated, may submit reports. Invalidating numeric
ratings does not erase their reports or create recursive report-count cascades.
Distinct colluding accounts can still reach two; stronger safeguards are deferred.

Packet-approved rank-discrepancy treatment: record it as report evidence for human review
but not a qualifying dishonorable-action flag for automatic invalidation. Do
not silently turn an unobserved/incorrectly remembered rank into that consequence.
The owner review explicitly calls out this separation. No-show-disbanded sessions
produce no numeric inputs, as defined in the sessions module.

## Honor state, units and descriptive names

Each player stores `honor_score`, nullable `smoothed_raw_rating_reference`,
`eligible_rating_count`, calculation version and update time. No last-N buffer,
variance/volatility value or outgoing-reviewer accountability field.
Retained submission evidence under DEC-047 is not the algorithm's rolling history.

Use a 0–100 internal scale with fractional precision; map the three-dimension
mean using `(dimension_mean - 1) * 100 / 9`. Newcomer honor is fixed **50**,
independent of community average. It is a neutral prior, not fabricated ratings.
Own score may display one decimal; do not round intermediate calculations to
integers. Proposed storage: PostgreSQL numeric(14,8), validated finite values,
with bounded rounding tolerance in tests. Mathematical code can use double
precision consistently before persistence; display rounding never feeds back.

Development parameters (separate named settings even when equal):

| Setting | Start | Meaning |
| --- | --- | --- |
| `raw_rating_reference_response_divisor` | 20 | Eligible raw input moves the reference 5% toward itself |
| `allowed_rating_deviation` | 20 rating points | Distance at which influence is one half; not an allowed/forbidden cutoff |
| `established_honor_response_fraction` | 0.10 | Honor's maximum per-input response before dampening |
| `startup_honor_response_fraction` | 0.05 | Lower maximum response during initial low-confidence inputs |
| `startup_eligible_rating_count` | 5 | First five eligible inputs use the startup response; not five games |

The divisor start is owner-selected/tunable; other values are agent-selected
development starts. Startup method is delegated, not an owner blocker. Keep
count internal; do not publish confidence or apply extra matching/eligibility
penalties. At zero count, reference is null and honor remains the fixed baseline.

## Per-input calculation and ordering

For an eligible input, `new_input_teammate_behavior_rating` is the mapped mean
of that teammate's three scores. Compute influence against the **previous**
reference, before incorporating the input:

```text
if eligible_rating_count == 0:
    rating_influence_multiplier = 1
else:
    distance_from_previous_smoothed_raw_rating_reference = abs(
        new_input_teammate_behavior_rating - previous_smoothed_raw_rating_reference)
    rating_influence_multiplier = 1 / (1 + (
        distance_from_previous_smoothed_raw_rating_reference / allowed_rating_deviation
    )^2)

honor_response_fraction = startup_honor_response_fraction
    if eligible_rating_count < startup_eligible_rating_count
    else established_honor_response_fraction

new_honor_score = previous_honor_score + honor_response_fraction
    * rating_influence_multiplier
    * (new_input_teammate_behavior_rating - previous_honor_score)

new_smoothed_raw_rating_reference = new_input_teammate_behavior_rating
    if eligible_rating_count == 0
    else previous_smoothed_raw_rating_reference
        + (new_input_teammate_behavior_rating - previous_smoothed_raw_rating_reference)
          / raw_rating_reference_response_divisor

new_eligible_rating_count = eligible_rating_count + 1
```

First input initializes the reference from actual evidence; lower startup response
limits its honor effect. Later disagreeing early inputs can still move the raw
reference. This method is not proof of cold-start robustness; review synthetic
extreme-first sequences and tune within DEC-031/032 rather than asking the owner
to choose constants. Validate divisor >= 1, deviation > 0 and response fractions
in (0,1]. Influence is in (0,1], exactly 1 at zero distance.

At a session settlement, freeze eligibility and parameter version. For each
recipient, process eligible inputs in a deterministic order by the reviewer's
immutable session participant ID, not arrival time. IDs are assigned at match
creation; refresh/resubmission cannot reorder them. Sequential smoothing is
order-dependent; this explicit canonical order prevents fast submission from
choosing order but is not a mathematical order-independence claim. Document
measured sensitivity in tests. Do not replace per-rating 5% updates with an
unapproved per-session average update.

Use row locks on all affected honor-state rows in sorted user order. Serialize
settlements sharing a player; each session settles once. Store applied parameters,
input order, exclusion reasons and before/after aggregates for admin audit.
Overlapping sessions may settle in database commit order; that order is persisted
and tests replay it exactly. No hidden backdating/recalculation later.

## Required behavior and known tradeoff

Small departures usually carry more influence. An isolated extreme negative
can cause less immediate honor damage than a moderate negative: intended under
DEC-032, not a bug to remove silently. Both still enter the unadjusted reference
if eligible. Repeated negative or positive inputs move reference and honor
toward the sustained level without admin intervention. Not a guarantee against
coordinated attacks, biased feedback or rapid real behavior changes.

The developer may tune constants/small behavior-preserving functions with
documented regression evidence. A changed product meaning, new scoring factor,
volatility model or new penalty needs approval. Config version changes affect
future settlements, not retroactively rewriting prior values.

## Human review interface

Inbox supports open/reviewed status, category/late/automatic-invalidation filters,
case detail and an internal note. Show relevant roster, stated ranks/provenance,
messages, rater/reporter identities, numeric dimensions, exclusions and calculation
audit to cleared admins. Players never get received-review details or reviewer
identities through pages, JSON or broadcasts. Mark reviewed changes only case
workflow, not data evidence or scores. No punishment, correction or appeal tools.

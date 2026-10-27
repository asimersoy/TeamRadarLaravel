# Feedback, Honor And Descriptive Summaries

**Status:** QG-REVIEW-1 draft. Authority: DEC-027–034/037/041/043/047/052/061/063/065.
**Dependencies:** immutable session roster, reports, queue gate, data/access.
Requirements FB. Update on scoring, eligibility, display or timing decisions.

## Obligations And Submission

- **FB-01:** every eligible teammate requires one overall integer 1–10 honor
  rating. Explain it as behavior while playing together, not aim, skill or rank.
  Do not preselect a number. Self and original co-premade ratings are excluded;
  friendship alone does not exclude a participant. Pre-play disband has no debt.
- **FB-02:** feedback has no deadline. Session ended routes to detail; Find
  match returns the player to unfinished eligible feedback before any queue.
  Finishing one's own requirements allows requeue without waiting for others.
- **FB-03:** a sent rating is immutable; explicit draft versus submitted states
  prevent accidental locking. Retries return the same result. The proposed
  interaction submits one teammate card at a time with an explicit confirmation
  explaining irreversibility. This granularity is a draft detail (P-02).
- **FB-04:** individual received values, reviewer identities and report authors
  are never exposed to players. Self can see their own submitted receipt under
  the existing evidence policy; no received ledger or cross-user live-score feed.

## Optional Descriptors

- **FB-05, approved:** two peer sliders, communication tendency and play style,
  are optional. Untouched midpoint means null/omitted. Touching and returning
  to midpoint is an intentional answer; “Clear” restores omission before send.
  They never affect honor, matching, eligibility, penalties or ordering.
- **FB-06, draft display:** label endpoints Quiet ↔ Talkative and Deliberate ↔
  Aggressive; these describe tendencies, not good/bad conduct. Final wording,
  arithmetic aggregation and sparse-data display are P-01/P-03 for review.
  The prototype uses sample aggregates and labels them as descriptive.
- **FB-07, approved audience:** self and authorized matched teammates may see
  the summary, never individual descriptor votes/authors. Proposed roster
  snapshots use pre-session aggregates rather than revealing this session's
  incoming answers in real time. No public/friend-only profile exposure.

## Forward-Only Honor Application

- **FB-08:** apply each finalized eligible input once against current committed
  honor/reference/count without waiting for a whole-session batch. Later old-
  session input is applied now; never backdate/replay/undo prior effects.
- **FB-09:** known same-session two-distinct-reporter exclusion or explicit
  early-leaving admission prevents not-yet-applied outgoing inputs. Incoming
  ratings are unaffected. Threshold reached later does not reverse already
  applied effects. Preserve the accepted timing race under DEF-013.
- **FB-10:** count distinct eligible reporting participants, not categories,
  repeated clicks or reports from another session. Rank-discrepancy evidence
  does not silently become a qualifying conduct report. Reports remain valid
  evidence even when their author's numeric ratings are excluded.
- **FB-11:** server-side ordering, locking and unique application keys make
  simultaneous ratings/reports consistent. Record order, rule/parameter version,
  source input and truthful exclusion/application evidence. Transport retries
  and concurrent requests must not double-apply. This does not remove the
  deliberately accepted before-versus-after threshold difference.

## Preserved Calculation Contract

Internal scale remains 0–100 with fractions, fixed newcomer honor 50. Map the
single overall rating with `(overall_rating - 1) * 100 / 9`. Never average the
optional descriptors into honor. Preserve the accepted adaptive-influence model:

```text
distance = absolute difference between new mapped rating and prior raw reference
influence = 1 for the first eligible input;
            otherwise 1 / (1 + (distance / allowed_rating_deviation)^2)
response = startup_honor_response_fraction for the first startup input count;
           otherwise established_honor_response_fraction
new_honor = old_honor + response * influence * (mapped_rating - old_honor)
new_reference = mapped_rating for the first eligible input;
                otherwise old_reference + (mapped_rating - old_reference) / 20
new_count = old_count + 1
```

Descriptive parameter names in the old packet remain: deviation 20, startup
response 0.05 for the first five eligible inputs, established response 0.10,
reference divisor 20. These are inherited development defaults, with divisor
20 owner-selected and bounded tuning delegated. No new variance metric,
reviewer-deviation score, per-session average or retroactive correction.
Display rounding never feeds back. Validate finite range/parameters and test
extreme-first sequences; no mathematical claim that timing differences vanish.

## Consequential Detail For Review

P-04 asks whether an author whose remaining ratings become ineligible still
must complete the UI obligation. The existing exclusion and queue requirement
do not unambiguously select that new edge case. The prototype's core walkthrough
uses an eligible reviewer; admin evidence illustrates exclusion without choosing
a bypass rule. Do not force fake ratings or silently waive required ones.

## Acceptance

Untouched/cleared/intentional-midpoint descriptors; 1 and 10 bounds; zero/fraction
rejection; immutable retry receipt; unauthorized targets; full-premade/no-target
state; long-late returns; multiple outstanding sessions; per-author completion;
known/late report threshold; one versus two distinct reporters; no double apply;
reference input unaffected by attenuation; no raw ratings in shared responses.

# Feedback, Honor And Descriptive Summaries

**Status:** QG-REVIEW-1 draft. Authority: DEC-027–034/037/041/043/047/052/061/063/065/076/077/078/079.
**Dependencies:** immutable session roster, reports, queue gate, data/access.
Requirements FB. Update on scoring, eligibility, display or timing decisions.

## Obligations And Submission

- **FB-01:** every eligible teammate requires one overall integer 1–10 honor
  rating. Explain it as behavior while playing together, not aim, skill or rank.
  Do not preselect a number. Self and original co-premade ratings are excluded;
  friendship alone does not exclude a participant. Pre-play disband has no debt.
  Permitted teammate cards stay required even if the author’s numerical effect
  becomes excluded; submission obligation and numerical eligibility are separate.
- **FB-02:** feedback has no deadline. Shared session closure under SS-08 routes
  to detail; an end request alone does not end participation or unlock queueing.
  Find match returns an active player to that session, or an ended-session player
  to its unfinished required feedback, including numerically excluded cards.
  After shared closure, finishing one's own requirements permits requeue without waiting for others' ratings. Normal
  operation cannot accumulate unfinished feedback across multiple sessions.
- **FB-03:** a sent rating is immutable; explicit draft versus submitted states
  prevent accidental locking. Retries return the same result. DEC-076 approves
  one teammate card at a time with explicit confirmation explaining
  irreversibility; unsubmitted cards remain drafts (P-02).
- **FB-04:** individual received values, reviewer identities and report authors
  are never exposed to players. Self can see their own submitted receipt under
  the existing evidence policy; no received ledger or cross-user live-score feed.

## Optional Descriptors

- **FB-05, approved:** two peer sliders, communication tendency and play style,
  are optional. Untouched midpoint means null/omitted. Touching and returning
  to midpoint is an intentional answer; “Clear” restores omission before send.
  They never affect honor, matching, eligibility, penalties or ordering.
- **FB-06, approved labels:** Quiet ↔ Talkative and Deliberate ↔ Aggressive
  describe tendencies, not good/bad conduct (DEC-076/P-01). DEC-078 selects
  independent honor-formula updates for each descriptor, specified below.
  Minimum evidence and disclosure-safe display remain P-03/OQ-014; the earlier
  arithmetic-mean proposal is superseded. Sample fixtures prove no calculation.
- **FB-07, approved audience:** only the player being described may see their
  summary (DEC-076). Matched teammates, friends and unrelated players cannot.
  Individual received votes/authors remain hidden; existing cleared-admin case
  access is unchanged. Remove teammate-summary snapshots from shared responses
  and future UI. These peer observations are separate from a signup bio.

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

## Independent Descriptor Calculations — DEC-078

Maintain communication and play-style value/reference/count separately from
one another and from honor. For each intentionally supplied eligible slider
value, use the formula above with that dimension's prior state and count, not
the player's honor state. Agent-selected units are the existing 0–100 scale:
Quiet/Deliberate = 0, Talkative/Aggressive = 100. Initialize each numerical stream
at midpoint 50 with no observed input yet; this is not a received description.
Use the same deviation 20, startup response 0.05 for five eligible inputs,
established response 0.10 and reference divisor 20 as current honor defaults.
A descriptor is already on the backend scale; only the overall 1–10 honor
rating needs `(overall_rating - 1) * 100 / 9` conversion.

Omission means no state/count/reference change; intentional midpoint is input.
Apply each supplied dimension at most once per card, with separate eligibility/
order evidence. Excluded input cannot regain influence through a descriptor.
Use current-state/forward-only handling without replay; no combined style score
or influence on honor/matching. Minimum display count/update privacy remains
OQ-014; three reviewers is an unapproved display proposal, not a calculation gate.

## Required Submission Despite Numerical Exclusion — DEC-079

A permitted target's card stays required when reports/admission exclude the
author's outgoing numerical effect. They must choose and submit the overall
rating before requeue. Save immutable evidence and complete the obligation,
but skip excluded numerical value/reference/count updates. Optional descriptors
remain optional. Completion does not lift exclusion; later exclusion does not
reopen completed cards or reverse applied effects. No prohibited self/premade
rating is newly required.

## Acceptance

Untouched/cleared/intentional-midpoint descriptors; 1 and 10 bounds; zero/fraction
rejection; immutable retry receipt; unauthorized targets; full-premade/no-target
state; long-late returns; prevention of multiple active/unfinished sessions;
shared closure before rating/requeue; per-author completion;
excluded-author completion without numerical effect; independent descriptor
states/counts and endpoints; omitted versus intentional midpoint; no descriptor
influence on honor/matching; known/late report threshold; one versus two distinct
reporters; no double apply;
reference input unaffected by attenuation; no raw ratings in shared responses.

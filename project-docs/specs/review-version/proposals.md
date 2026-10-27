# Details To Review At The Checkpoint

**Status:** proposed, not owner-approved. These are deliberate drafts, not
auto-resolved questions. Requirements remain subject to the [packet](README.md).

| ID | Proposed detail | Why / alternative | Review status |
| --- | --- | --- | --- |
| P-01 | Descriptor endpoints Quiet–Talkative and Deliberate–Aggressive; no good/bad color scale | Short readable tendencies; alternatives include Reserved–Communicative and Calculated–Aggressive. Words can mischaracterize skill or imply value | Draft copy; owner can revise at design review |
| P-02 | Save/confirm each teammate card independently; sent card locks; unsubmitted cards remain drafts | Supports interrupted sessions and visible progress; alternative is one immutable whole-form submission | Draft interaction; does not permit editing sent ratings |
| P-03 | Arithmetic mean of submitted descriptor values, separate nullable counts; show summary only after three distinct eligible reviewers, use a pre-session snapshot for teammates | Avoids falsely treating untouched values as neutral and reduces single-review disclosure; alternative is a different threshold/aggregation | Consequential privacy/display proposal; threshold/aggregation must be approved before implementing live summaries; prototype uses fixed fictional samples |
| P-04 | When reports/admission exclude a reviewer's remaining outgoing ratings, mark those obligations ineligible rather than requiring ratings with no effect | Literal eligible-teammate rule and avoids purposeless input; alternative requires completion for evidence despite exclusion. Potential escape/abuse tradeoff | Owner choice pending; core prototype uses eligible author, no bypass selected |
| P-05 | Unresolved pre-play discrepancy remains blocking; add a deliberate cancellation path rather than an automatic default vote | Avoids guessing and indefinite stranded state; cancellation authority/timeout could be abused | Owner choice pending for authority/timeout; prototype demonstrates wait and approved corroboration/disband only |
| P-06 | Retry retrieval or declare current rank when an already RSO-linked user's match-data request fails; keep failure provenance visible | Continues existing fallback/manual-confirmation direction; alternative blocks queue until retrieval recovers | Draft live-provider failure contract; does not allow bypassing RSO or queueing unknown/unplaced |
| P-07 | Oldest unfinished session first, then remaining sessions, then rank confirmation | Predictable debt-clearing path; alternative is an owner-selected history list | Reversible navigation default |
| P-08 | Desktop sidebar, dark navigation and light task surfaces; mobile stacks secondary connections | Readable task hierarchy, own brand distinct from competitor | Visual proposal, not a production framework selection |
| P-09 | Self-contained buildless HTML/CSS/JS prototype with isolated fictional local state and three visual modes | Simple review artifact, no live services/dependencies; alternative is disposable design tool | Artifact implementation choice only; does not choose QGuard's stack |

Existing approved rules are not reopened by these proposals: no skip or feedback
expiry, no descriptor use in matching, private received ratings, one corroborating
discrepancy vote, no “can't verify” option, forward-only honor and no first-version
Discord. P-04/P-05 cannot be silently settled by implementing an easy default.

Final review should distinguish acceptance of the visible prototype from policy
approval. A request to adjust color/layout does not approve missing data rules.
Material changes require the normal decision record; ordinary delegated details
can be recorded as such after review. Existing checkpoint entries remain visible.

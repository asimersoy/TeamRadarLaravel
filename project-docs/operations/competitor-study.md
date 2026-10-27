# QGuard Competitor Study Procedure

- **Record type:** project-specific operating instructions
- **Authority:** `DEC-059` and the existing [workflow governance](workflow-governance.md)
- **Owner:** project owner; primary agent maintains observations and comparisons
- **Status:** active for the Gankster study
- **Update trigger:** owner changes browsing permission or study scope

The owner navigates and interacts with Gankster. Until the owner explicitly
delegates exploration, the agent only reads the page the owner has reached,
including its rendered view and page accessibility/DOM state. Do not click,
type, scroll, submit, navigate, open additional site pages, alter account
settings or use background requests to explore around that boundary. A
suggested next screen is a suggestion for the owner, not permission to open it.
Passive inspection does not require a separate confirmation at each screen.

## Where Records Belong

- Study index, observations and QGuard comparisons:
  [Gankster study](../research/competitors/gankster/README.md).
- Material adopted QGuard choices: the existing decision register and affected
  specifications, using normal approval semantics.
- Study execution instructions: this operations file. The portable workflow
  remains untouched.

## Evidence and Detail

For each observed step, record the date, URL, entry context, state, visible
controls and defaults, hierarchy, relevant wording, and what action produced
the next state. Attribute actions to the owner. Note form validation, loading,
empty, success, failure, recovery and persistence only when actually observed;
do not exercise them on the owner's behalf while observation-only mode applies.

Separate these classes in every finding:

1. **Observed:** directly seen rendered behavior or DOM/accessibility state.
   Background DOM beneath a modal is not evidence of an accessible live flow.
2. **Provider-documented:** a specific published claim, with source and date.
3. **Owner-reported:** context or actions described by the owner.
4. **Inference:** a possible explanation, including backend/API hypotheses.
5. **QGuard candidate:** a possible adaptation and its tradeoffs, not approval.
6. **Unobserved/open:** the specific evidence still needed.

A control's presence does not prove its effects or implementation. A manual
refresh button does not rule out automatic refresh. A working invitation does
not identify its API. Mark the underlying implementation unknown unless a
source establishes it. Similarity to QGuard does not establish that the other
product has solved every edge case correctly.

Keep account names, profile IDs, emails, real player identities, private
messages, session credentials and reusable join codes out of tracked study
records. Summarize the interface with neutral examples. Inspecting a screenshot
does not require retaining its unredacted pixels in Git. Save a durable image
only when useful and suitably redacted; never modify the live site to redact it.

## Applying Findings

Keep a compact comparison against QGuard's existing decisions. State which
details could be adapted, what problem each would solve, and what would need
to change. Do not convert inspiration into an adopted feature, provider choice,
data requirement or implementation permission. In particular, `DEC-055` still
requires the future pre-queue rank retrieval/confirmation flow; discussion of
a manual button does not supersede it.

Maintain the study index as the resume point. Extend an existing feature note
when the owner reveals another state of that feature; create a new note for
a distinct flow. Verify links and the scoped diff, and group each coherent
study checkpoint into an additive local commit under existing policy. No
external site action, push or game-test resumption follows from committing notes.

# Decision And Recommendation Safety

## Trigger

Use whenever user inputs, rules, scores, models, editorial choices, or
commercial factors can affect recommendations, eligibility, ordering,
visibility, safety messaging, or a user's consequential decision.

## Required Classification

Before implementation, classify each outcome as informational,
preference matching, commercial ranking, professional recommendation,
screening, triage, diagnosis-adjacent, or emergency/safeguarding. If multiple
classes apply, use the strictest route.

## Required Records

Document:

- each question's purpose and necessity;
- answer options, validation, and skip logic;
- data collected and retention;
- recommendation inputs, weights, exclusions, ties, and fallback behavior;
- who controls candidate or option eligibility and underlying source facts;
- user-facing explanation and uncertainty;
- adverse, empty, manipulation, and emergency states;
- testing, monitoring, and qualified-review gates.

## Safety Rules

- Do not imply diagnosis, clinical suitability, guaranteed fit, or guaranteed
  outcome unless a qualified and legally valid process genuinely supports it.
- Never collect or infer more sensitive information than the decision needs.
- Do not conceal commercially influenced ordering behind a neutral-fit claim.
- Keep urgent safety guidance separate from ordinary matching logic.
- Provide a truthful no-match or insufficient-information state.
- Recommendation changes require versioned criteria and regression tests.

## Verification

Test deterministic fixtures, boundary answers, contradictory answers, missing
data, ties, no-match results, excluded candidates, ordering stability, explanation
accuracy, and safety paths. Sensitive claims require the assigned external
review before public use.

## Completion Evidence

Record the approved classification, criteria version, test fixture inventory,
reviewers and verdicts, known limitations, data-flow approval, monitoring plan,
and rollback method.

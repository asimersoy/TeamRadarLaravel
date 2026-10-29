# Review Prototype And Access

- **Status:** approved product direction; implemented locally under DEC-085.
  The original draft contract below records the planning baseline. Current
  implementation evidence and remaining gates are in the
  [submission packet](../planning/riot-submission/README.md); earlier pending
  implementation/stack wording below does not reopen completed milestones.
- **Authority:** `DEC-066`–`DEC-068`, with `DEC-017`, `DEC-053`–`DEC-055` and `DEC-062`
- **Owner:** project owner; agent prepares specification/design
- **Updated:** 2026-10-27
- **Dependencies:** [provider evidence](../research/riot-review-and-rso-access.md),
  [product/design plan](../planning/product-design-pass.md),
  [current foundations](product-foundations.md),
  [existing identity/rank baseline](first-pass/identity-and-rank.md)

## Approved Direction

Registration is open. The next version first becomes a Riot-reviewable
prototype: implement the approved QGuard workflows except live RSO, using
expected provider-data contracts to exercise the dependent features. The
login page includes guest entry. Normal player matchmaking waits for actual
RSO integration and required player linking/opt-in; registration alone is
insufficient. This is a milestone distinction, not an invite-only beta.

`DEC-067` excludes Discord implementation fully from this version and the
review prototype. Use native website text; no Discord room simulation or
alternative voice implementation is required. Discord returns only after
Riot approval and live RSO integration, through the later approved slice.
`DEC-068` authorizes assuming native party codes work for non-friends: the
host generates a code in VALORANT and submits it through QGuard's dedicated
form; the other four copy and enter it in-game. Actual validation waits until
after RSO integration (`DEF-014`), before normal-use reliance.

The review prototype must demonstrate the product, not merely display an
unimplemented sign-in screen. Cover onboarding and account linking intent,
rank retrieval/confirmation, parties and queue, team formation and host
handoff, communication states, session completion/history, mandatory feedback
and reporting under the applicable decisions. Preserve the distinction between
QGuard team formation and actually joining or controlling a VALORANT party.

The existing local first pass remains historical implementation evidence.
Its declared-rank fallback does not authorize bypassing the new RSO requirement
for real-player use. The design/stack checkpoint still precedes new application
backend/frontend implementation; this decision does not override it.

## Draft Review Experience And Data Boundary

These details apply the approved direction and must be reviewed with the page
design and implementation packet; they are not new owner selections.

- Show guest entry on the login screen and explain that it opens a sample
  walkthrough. Keep the sample-data status visible throughout the experience.
- Give each guest isolated demonstration state and synthetic teammates, so a
  reviewer can exercise the flow without waiting for real players. Guest edits,
  ratings, reports and chat affect only the demo, never real user records or
  production game sessions. No Discord calls or demo rooms are required.
  No administrative clearance follows from guest
  access. Exact reset/lifetime mechanics remain implementation details.
- Demonstrate successful linking and its failure/declined states as simulated
  outcomes. Do not collect Riot credentials or call a simulated result verified
  ownership. Keep live sign-in visibly unavailable until it actually works.
- Separate identity/consent from match-data retrieval. Model a stable Riot
  account identifier, display identity and connection/consent state separately
  from latest observed competitive tier, observation time, retrieval status
  and the user's confirmation/correction. Preserve rank provenance and the
  difference between an observed past tier and a current-rank claim.
- Use synthetic values for those expected fields and the downstream session
  snapshots. Include missing/delayed rank, cancelled linking, provider failure
  and the pending-RSO state; a happy-path fixture is not integration evidence.
- Keep provider-independent behavior usable with those fixtures. Later live
  integration must satisfy the same domain contracts with real evidence,
  secure OAuth handling and provider-response validation. Do not assume adding
  an API key to a setting alone completes that work.

## Milestones And Remaining Questions

| Milestone | Result and boundary |
| --- | --- |
| Specifications and design | Full scoped flows, monochrome then visual design, HTML prototype; stack review before application implementation |
| Implemented review prototype | Working QGuard flows with guest walkthrough and explicit simulated provider data; no normal matchmaking without RSO |
| Riot application | Prepare a concise use-case/data/flow explanation and accessible review artifact; actual publishing/submission requires specific authorization |
| Live RSO integration | After production approval and RSO client provisioning, implement and verify actual linking and authorized match-data retrieval |
| Normal player availability | Open registration plus required verified linking/opt-in and remaining release checks; prototype access is not release approval |
| Later Discord integration | After Riot approval and working RSO, resume applicable tests and specify/approve the integration slice; not a first-version dependency |

**Resolved scope:** Discord is deferred and native party codes are the
owner-authorized working assumption for the non-Discord handoff. Missing live
evidence does not block design, the review prototype or an otherwise approved
implementation slice. The post-RSO real-player check remains required; Riot
approval is not evidence that joining works. If it fails, return to the owner
before selecting an alternative. Existing Discord/link test holds remain.

## Discord Dependency Check

| Flow | First-version dependency result |
| --- | --- |
| Registration, guest review and later RSO identity | No Discord requirement; live RSO remains its own milestone |
| Official match-data rank and player confirmation | No Discord requirement; expected data can be demonstrated before authorized Riot access |
| Matching, parties and roster | QGuard state; no Discord account, membership or voice queue required |
| Team communication | Existing native private text; QGuard-provided voice deferred, no replacement voice product added |
| Entering the game party | Structured native party-code route under `DEC-068`; post-RSO real-player validation in `DEF-014` |
| Attendance, session end and history | QGuard acknowledgments/session controls; Discord presence is neither required nor proof of game attendance |
| Honor, descriptors and conduct reports | QGuard participant records and submissions; no Discord evidence or voice recording required |
| Discord-specific features | Bot-created rooms, voice, admission, permissions, cleanup and Discord game Join all deferred under `DEF-007` |

This is a dependency assessment from the current specifications and existing
local session/handoff boundary, not test evidence for the next version.

Future companion apps and out-of-scope competitor features are not added by
“everything except RSO.” Account-authentication refinements, exact guest reset
behavior and final provider DTOs will be specified with their relevant slices.

## Acceptance To Carry Into The Implementation Packet

1. Open registration does not require an invitation; an unlinked normal account
   cannot enter real matchmaking, including through a direct request.
2. A reviewer can enter from the login page without RSO and complete the scoped
   demonstration with synthetic peers. No real accounts, sessions, messages,
   rank claims or scores are created or changed by the walkthrough.
3. Expected identity and rank contracts drive the downstream behavior; sample
   and live provenance cannot be confused or silently promoted.
4. End-of-session history, required immutable feedback and the requeue gate
   follow the latest decisions in both normal design and the demonstration.
5. Report timing follows `DEC-065`: two qualifying reports before application
   exclude the outgoing input; afterward they do not reverse it. `DEF-013`
   defers changing that policy, not testing or implementing it correctly.
6. The reviewer guide identifies simulated integrations and unresolved live
   evidence. Live RSO acceptance is a separate later result, not a prototype
   completion claim. No Discord connection, membership, voice attendance or
   simulated-room task is required to exercise or complete the first version.
7. Native-code handoff follows the explicit assumption during the prototype;
   real non-friend joining is verified at `DEF-014`, not claimed from Riot's
   approval or a synthetic demonstration.

These are proposed verification cases, not executed tests. No provider approval,
prototype completion or public deployment is claimed.

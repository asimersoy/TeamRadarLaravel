# VALORANT Party Codes and Gankster Findings

- **Record type:** research and reconciliation of owner-supplied side-chat evidence
- **Checked:** 2026-10-27
- **Research owner:** primary Codex agent; product approval remains with the owner
- **Authority:** standing instruction to preserve useful project evidence; owner
  supplied the side conversation for reconciliation with existing decisions
- **Status:** documentary findings verified where cited; no live-client result
- **Update trigger:** owner resumes game tests, current UI changes, provider
  clarification, or a proposed integration slice

**Subsequent owner direction, 2026-10-27:** `DEC-068` now authorizes using native
party codes as the working non-friend handoff assumption for specifications,
prototype and approved implementation. Validate with real players after Riot
approval and live RSO integration under `DEF-014`. Earlier candidate/unselected
and test-first wording below records the prior research stage; it no longer
blocks that work. The official patch was rechecked today; no live result was
obtained, and owner acceptance of an assumption does not turn it into evidence.

Native VALORANT Party Invite Codes are an official player feature, separate
from the Riot–Discord lobby-link feature and from private party APIs. This
adds a candidate for the structured human-host handoff already approved in
`DEC-054`. It does not select that candidate or establish its current
non-friend behavior. Gankster supplies relevant competitor evidence, but its
rank retrieval and invitation implementation remain undisclosed in the
reviewed sources.

## Native Party Invite Codes

Riot's [patch 7.12 notes](https://playvalorant.com/en-us/news/game-updates/valorant-patch-notes-7-12/),
published December 5, 2023, establish that party leaders generate invite codes
which other players enter in-game to join the party. The earlier research
statement that no separate public party code was found is therefore superseded.
This is documentation of a player-facing feature, not a public developer API
for QGuard to generate codes or join on someone's behalf.

**Proposed QGuard use:** prompt the designated host to create their party and
submit its code through the dedicated form; display it with copy instructions
to the other four players, who enter it in VALORANT themselves. QGuard only
relays the user-supplied value. This design needs no QGuard call to a party API.
Whether the current game accepts it without Discord or friendship is a live
test question, not a result inferred from this design.

The patch notes do not supply the current button location, friendship rules,
mode restrictions, expiry or revocation behavior. The pasted side chat describes
Party Code → Generate Code and Party Code → Join Party controls from an
organizer's guide, but its source URL was not included. Preserve that as a UI
lead to check, not a verified guide to today's client.

## Lobby Links Remain a Different Mechanism

Riot's [account-linking page](https://www.riotgames.com/en/riot-games-discord-account-linking)
continues to advertise copying a lobby link and sharing it with a server or
elsewhere. It separately requires formal Discord friendship and linked
accounts for appearance in the integrated friend list. That list requirement
does not settle every shared-link recipient's requirements. Supported-region,
account-linking and actual non-friend entry remain relevant test variables.

The page's VALORANT Social → Add Friends → Connect Discord Account instructions
locate account linking, not the copy-lobby-link button. Do not merge native
party-code entry, copied-link acceptance and Discord's game-specific Join
action into a single claimed capability.

## Gankster Evidence and Limits

**Subsequent owner-led study:** [current screen observations and design comparisons](competitors/gankster/README.md)
now live in a dedicated folder under `DEC-059`. This report retains the earlier
published-source findings and side-chat reconciliation; it is not a live UI log.

| Topic | Verified documentary evidence | Implication for QGuard |
| --- | --- | --- |
| Products | Its [homepage](https://gankster.gg/) separates Duos, LFG Communities for five-stacks/fills, and Competitive for teams/scrims | Relevant competitor scope; not a requirement to copy those products |
| Group formation and feedback | The [VALORANT LFG guide](https://gankster.gg/find-valorant-players/) describes group posts, join requests, leader acceptance, voice coordination and post-match reviews; it says reviews require someone in the group to have the app installed | Overlap with teammate finding and reputation, but no proof of QGuard's automatic full-team matching by similar honor |
| Party assistance | The [Communities page](https://gankster.gg/communities/) advertises game-client/Discord integration, status synchronization and automatic invitations | Evidence of advertised behavior, not disclosure of a particular endpoint, credential model or public Riot API entitlement |
| Rank refresh | Its [rank-refresh guide](https://gankster.gg/how-to-update-your-rank-on-gankster/), dated February 14, 2024, describes a reload control and suggests another three to five ranked games if newly reached Immortal does not update | Consistent with match-dependent data, but insufficient to identify the retrieval method |
| Data sources | Its [privacy policy](https://gankster.gg/privacy-policy/) includes information received from Riot when users register/link through it | Voluntarily supplied information need not mean manually typed rank; that wording alone is not a contradiction with automatic retrieval |

**Owner hypothesis:** the additional-match advice may indicate a rank-retrieval
approach like QGuard's planned match-history approach. That is plausible, but
the reviewed guide does not name an endpoint or explain the delay. It does
not establish use of the latest match's tier, nor justify changing `DEC-055`.

**Technical inference only:** a desktop component could account for the
advertised game integration. The side chat's private-client/private-cloud
explanation is one possible architecture, not a verified description of
Gankster. QGuard's official-developer-API preference under `DEC-053` stands.

The side chat also reports Party Code listings for Competitive, an independent
non-friend success report, dedicated Discord voice allocation, and Duos scoring
and monetization details. Those exact citations were not preserved in the
pasted transcript. The public VALORANT app returned a JavaScript shell during
this review, so its listings were not independently verified. These remain
research leads, not current-client test evidence or adopted QGuard requirements.

## Reconciliation with Approved Decisions

| Side-chat statement or proposal | Current disposition |
| --- | --- |
| Fetch available match-associated rank, then ask the player | Already approved by `DEC-055`; use the [canonical retrieval sequence](valorant-client-api-and-ui-status.md#rank-from-the-latest-available-competitive-match) and [future identity/rank contract](../specs/first-pass/identity-and-rank.md#subsequent-owner-direction--queue-confirmation-and-lobby-check) |
| Discrepancy threshold remains unresolved | Stale: `DEC-057` excludes reporter/subject and makes one of the other three confirming mismatch sufficient, even against two denials; `DEC-058` excludes an unable-to-verify answer in this prompt |
| Test native codes first | Agent proposal worth evaluating; no new owner selection or resumption is present in the supplied conversation |
| Start link testing with both accounts linked | Does not replace the [prepared sequence](../planning/coordination-test-resources-and-sequence.md), which preserves an initially unlinked recipient where available before the linked comparison |
| Gankster probably retrieves rank as we planned | Owner hypothesis, not a verified competitor fact or a new product decision |

No new numbered decision is created. Approved direction remains distinct from
implementation: response timing, nonresponse/recovery and actual lobby rank
visibility still need their existing contract/evidence. This reconciliation
does not reopen the settled voting rule or select private APIs.

## Proposed Native Code Check

This is a proposed addition for owner resumption, not an activated test or a
replacement for the existing held link/Discord program.

1. Prepare two PCs with current VALORANT clients and two consenting Riot
   accounts that are not friends and can party together in the same region.
   Use accounts eligible for the mode being checked; new-account competitive
   eligibility is separate from basic party entry.
2. Record current build, region, mode, Riot friendship and Discord linking/runtime
   state. For the independence check, keep Discord closed and use unlinked
   accounts where available; closed Discord alone does not prove linking is absent.
3. Host opens an ordinary party, locates the native code control and generates
   a code. Relay it privately outside Discord. Record the actual current UI.
4. Recipient enters the code in VALORANT. Pass requires visible membership of
   the same ordinary party without adding a friend, not just game launch or a
   custom-match success. Repeat with a fresh party/code and swap host where practical.
5. Inspect intended mode availability separately. A two-player party check does
   not establish five-player competitive eligibility or a successful ranked game.
   Record invalid/expired-code behavior only where safely observable.

Store redacted results, not passwords, session tokens, live reusable codes or
unnecessary account identifiers. The
[existing owner hold](../governance/deferred-work.md#owner-hold--discord-access--2026-09-28)
remains in force; no live actions were performed. A Discord-independent code
test can be proposed separately when the owner is ready, without implying that
the Discord-dependent tests have resumed.

## Source and Completion Record

All linked public sources above were opened on 2026-10-27. Riot owns the feature
claims; Gankster owns its product descriptions. Neither supplies a QGuard live
test result. The supplied conversation is undated apart from times of day and
is owner-provided evidence; its assistant conclusions do not confer approval.

**Route:** RECONCILE-2026-10-27-SIDE-CHAT, baseline clean `new-development` at
`acb09f4`. Mandatory entry/system and project governance records read; research
and reconciliation routes selected, with the previously read unchanged product
planning, decision safety, privacy/data, owner review and deferral procedures
controlling related boundaries. Scope is six project documentation files,
excluding application code, portable workflow and existing decision history.
Research inputs were the pasted conversation, the existing API/party-entry
records, and bounded Riot/Gankster source checks. Owner remains the reviewer
for any integration selection, test resumption or implementation approval.

**Verification:** the complete scoped diff and new report were reviewed; all
148 local links, 32 anchors and 58 unique decision headings passed checks,
as did `git diff --check`. Evidence is documentary, structural and reconciled;
runtime, game-client and provider-access checks are unrun. The portable-system
validator is inapplicable because that package is unchanged. Existing first-pass
behavior is unchanged. This unit is recorded as one additive local documentation
commit; no push, deployment, account operation or provider application occurred.

# Page And State Inventory

**Packet:** QG-REVIEW-1. All pages are drafts. Hash routes belong to the local
prototype, not approved production URLs. Query-like state parameters are inside
the hash, for example `#rank?state=unavailable`. Shared shell and dialogs are
part of coverage rather than separate backend routes.

| ID / route | Audience and purpose | Main actions / exit | Required variants |
| --- | --- | --- | --- |
| D00 `#review` | Reviewer: screen catalog and explanation | Open page/state; choose visual mode/reset | Coverage and proposal notices |
| D01 `#welcome` | Visitor: understand the session loop | Register, login, guest | Desktop/mobile, no global conduct guarantee |
| D02 `#login` | Visitor: account or guest access | Sign in, guest, recovery/register | Invalid; live Riot availability is on D08 |
| D03 `#register` | Visitor: open local signup | Create sample account → verify | Validation, duplicate, draft legal links |
| D04 `#verify` | Unverified account | Resend, sample verification → setup | Sent, expired, throttled |
| D05 `#forgot` | Account recovery | Request link → generic receipt | Invalid, sent, throttled; no enumeration |
| D06 `#reset` | Token holder | New password → login | Invalid/expired, confirmation mismatch |
| D07 `#setup` | New/guest player | Handle, shard/language → connection | Incomplete, invalid, defaults |
| D08 `#connect` | Registered player: Riot gate | Intended consent explanation; sample link | Pending approval, declined, linked, failed |
| D09 `#dashboard` | Player: matchmaking home | Find match, manage party; connections | Ready, unlinked, feedback due, empty party |
| D10 `#rank` | Player: pre-queue confirmation | Confirm/correct → ready; retry | Loading, observed, corrected, unavailable, unplaced |
| D11 `#party` | Player/owner: premade assembly | Invite, ready, leave, owner queue | Solo/partial/full, pending/stale invite, non-owner |
| D12 `#friends` | Player: exact lookup/requests | Request, accept/decline/remove, invite | Empty, no result, duplicate, incoming/pending |
| D13 `#queue` | Queued player/party | Cancel, sample formation | Waiting, service failure, reconnect, formed-before-cancel result |
| D14 `#team` | Matched participant/host | Host code, copy, acknowledgment, text, end | Host/recipient, no/empty code, chat offline, ready, no-show vote/acknowledgment |
| D15 `#discrepancy` | Eligible corroborator | Confirm/deny, show waiting/disband result | Reporter/subject excluded; waiting, one corroboration |
| D16 `#disbanded` | Former participant | Reason, voluntary Find match | Rank mismatch, no-show, no feedback debt |
| D17 `#history` | Participant: own session list | Open session | Feedback due, complete, empty; disbanded detail is D18 |
| D18 `#session` | Participant: history/detail/rating | Rate eligible cards, optional sliders, report, continue | Unsent, partial, locked, complete, premade/no-target, disbanded |
| D19 `#report` | Participant: conduct evidence | Target/category/context → receipt | Invalid, submitted, later evidence; no automatic sanction |
| D20 `#profile` | Self or authorized matched teammate | Account settings or return to team | Baseline, established, sparse/no descriptors, teammate snapshot |
| D21 `#settings` | Self: defaults/linked identity | Save, security, rank refresh entry | Saved, validation, queued-change warning |
| D22 `#security` | Self: account safety | Password/logout sample actions | Validation, confirmation; no actual credentials |
| D23 `#admin` | Cleared-admin sample | Open case | Open, reviewed, empty; unauthorized recovery is D25 |
| D24 `#case` | Cleared-admin sample | Evidence sections, note, mark reviewed | Excluded before application, applied before reports, stale review |
| D26 `#acceptance` | Proposed five / reviewer | Accept, decline, review peer responses | 20-second deadline, all-five activation, solo removal/return, pending premade exception |
| D25 `#error` | Visitor/player | Retry, home or login as relevant | Denied, session expired, offline, not found |

## Shared Interaction Coverage

Shell: active navigation, visible sample label, keyboard skip link, mobile
navigation, account security/logout, unobtrusive status announcements. Contextual
dialogs: immutable rating confirmation, party leave and session
end; focus enters the dialog, Escape dismisses reversible actions, focus returns.
Messages: success, inline error, pending, empty and reconnect; not color-only.
Code replacement reopens the structured form. Clipboard failure shows manual
copy guidance; no server checks code validity. No-show deadline fixtures are
frozen review states, not a real timed multi-user attendance implementation.
Connections sidebar: minimal identities, requests/invitations, no inferred
Riot-friend/game presence or friend honor disclosure.

## Key Test Paths

Guest: D02→D07→D08 sample→D09→D10→D13→D26→D14→D18→D09.
Feedback debt: D09 Find match→D18 incomplete→D18 complete→D10.
Premade: D12→D11, all-member readiness then D10/D13.
Report: D18→D19→receipt; admin reviewer D23→D24.
Discrepancy: D14→D15, one confirmation→D16→D10.
Security/error states use separate direct catalog routes and are simulations.

No voice/Discord screen, public player browse or competitor-like paid tier is
part of this inventory. Complete five-person roster and per-participant history
are required; a landing page alone is not this design deliverable.


## Current behavior additions — DEC-076–082

- `#acceptance` / queue offer dialog: common 20-second counter, own acceptance,
  fictional peer actions, unanimous activation, solo removal/return on expiry.
  A decline prevents activation; pending peers retain the remainder of the
  window in this preview. Exact server early-failure contract belongs to R4.
- `#team?state=ending`: shared-end design sketch; actual demo countdown starts
  on Request to end. Third request or deadline opens eligible feedback.
- `#discrepancy?state=waiting`: end requests stay available, no separate vote
  timeout, pre-play closure creates no rating cards.
- `#session?state=excluded-author`: required immutable cards remain; explain
  that numerical effects are excluded. Sample UI only, no calculator evidence.
- `#profile?state=teammate`: rank/honor snapshot only, no descriptor summaries.
  `#profile`: self-only descriptor layout; display threshold explicitly pending.

The revised design
has 26 product routes plus the review catalog; historical coverage counts stay
attached to the versions that were actually tested.

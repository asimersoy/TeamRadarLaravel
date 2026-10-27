# Gankster Matching and Game Status

- **Record type:** sourced competitor analysis, not a QGuard specification
- **Checked:** 2026-10-27
- **Questions:** automatic team matchmaking versus LFG; source of In Match;
  distinction between teammate selection and game invitation automation
- **UI evidence:** [GANK-OBS-004](observations/desktop-and-group-discovery.md)
- **Owner:** primary agent maintains research; project owner decides adoption
- **Update trigger:** new provider explanation or an authorized observed transition

## Findings

**The inspected VALORANT Groups experience is primarily LFG listing and selection.**
Its official guide says a player requests entry and the leader decides whom to
accept. The live list and access filters fit that description. Recommendations
can help discovery: a January 2025 announcement by a Gankster developer expressly
mentions recommended groups. That does not establish automatic assembly of a
complete team by similar honor. [G1, G4]

**Gankster does offer matching in another sense.** Its separate Duos product
advertises compatible partner recommendations and mutual likes that form a pair.
The login page and community promotion expose this separate destination; the
developer's App Store listing explains the mutual-like flow. Its exact algorithm
and a logged-in matching session were not inspected. A broad claim that Gankster
has no matchmaking would therefore be incorrect. [G5, G6]

**Automatic game-state synchronization is an explicit provider claim.** The
current Communities page advertises automatic status synchronization alongside
game-client integration. In its October 2023 launch explanation, Gankster's
developer specifically attributes real-time game-state synchronization and match
tracking to the desktop app's connection to the running game client. This is
strong evidence that status can be game-derived, rather than simply a field a
host writes when creating a listing. [G2, G3]

**The exact In Match implementation is still unverified.** We observed the label
but did not watch a known party enter/leave a game. The documented integration
is the best-supported explanation for the integrated path. We have not proved
which endpoint supplies it, which member needs the app, whether there is a
manual override, or how web-only/stale/disconnected groups behave. The creation
form was not successfully inspected. Do not turn the provider's general claim
into a guarantee about every card.

## Capabilities Are Separate

| Capability | Evidence and classification | Relation to QGuard |
| --- | --- | --- |
| Groups discovery | Observed list/filter/access controls; documented leader acceptance [G1] | A different selection flow from QGuard automatically assembling compatible teammates |
| Group recommendations | Developer-announced [G4]; ranking logic unknown | May assist discovery without automatically forming a team |
| Duos | Documented compatibility suggestions and mutual-like pairing [G5, G6]; live inspection stops at login | Pair matching, not evidence of an automatic five-player honor queue |
| Recruitment and scrims | Observed posts and scheduling/filter interfaces | Longer-term roster/opponent discovery, not the same as filling a normal game party |
| Game-party invitations | Documented desktop automation [G2, G3]; UI separately exposes Party Code access | Getting already selected people into the game is distinct from selecting them |
| Game status | In Match label observed; synchronization/tracking documented [G2, G3] | Could reduce manual status updates, but QGuard has not approved this integration |
| Discord voice | Developer describes dedicated channels in partnered servers [G3] | Supports the coordination concept; does not prove the current permissions, cleanup or QGuard access |

No evidence in these inspected surfaces or cited sources establishes automatic
formation of complete five-player teams based on closeness of honor scores.
This is a bounded research conclusion, not proof that no private, experimental
or future Gankster feature does so.

## Join Versus In Match

Join is an entry affordance; In Match is a game/activity state presented on a
listing. A host choosing Invite Only versus Party Code determines an access
route, not necessarily the source of the activity state. Gankster's published
LFG guide describes Join as a request to the leader, while its separate desktop
integration claim explains that game state can update automatically. [G1–G3]

The defensible answer to the owner's question is: **Gankster says its desktop
app reads/synchronizes game state; we have not established that In Match is
manually entered at creation or that manual status is impossible.** No Riot
public developer endpoint, private-cloud endpoint or local-client method is
identified by these sources. The historical/private API hypotheses remain
hypotheses, and QGuard's official developer API preference remains unchanged.

## Sources and Evidence Limits

All URLs were checked on 2026-10-27. Historical announcements describe their
publication-time behavior; a current marketing page is still a provider claim,
not a reproduced test. Mutable articles may contain later edits despite an
older original publication date.

| ID | Primary source | What it supports |
| --- | --- | --- |
| G1 | [Gankster LFG guide](https://gankster.gg/find-valorant-players/), dated 2023-09-30 | Group posts, join requests, leader acceptance; guide also says reviews need someone in the group to have the app |
| G2 | [Current Communities product page](https://gankster.gg/communities/) | Game-client integration, automatic status synchronization, party invitation assistance |
| G3 | [Developer launch explanation](https://www.reddit.com/r/VALORANT/comments/174rm4i/), 2023-10-10 | Self-identified Gankster developer explains desktop connection, real-time game state, match tracking, invitations and partnered Discord voice channels |
| G4 | [Developer 2025 update](https://www.reddit.com/r/VALORANT/comments/1hr9vu1/), 2025-01-01 | Recommended groups, long-term duo posts and play-style indicators; developer reply still describes asking to join listed groups |
| G5 | [Gankster Duos App Store listing](https://apps.apple.com/us/app/gankster-duos-gamer-friends/id6755520323) | Developer-supplied description of recommendations, swiping and mutual-like pairs |
| G6 | [Gankster's compatible-duo article](https://gankster.gg/your-teammates-are-the-problem-heres-how-to-fix-that/), dated 2026-03-03 | Advertised matching by rank, playstyle and communication; no algorithm specification |

No provider contact was sent. No game client was installed/started, endpoint
called with account credentials, group joined, match played or status altered.
Unredacted player records, codes and screenshots were not added to Git.

## QGuard Candidates and Deferred Evidence

Potential details to compare are visible state distinctions, compact roster
slots, access labels and readable desktop hierarchy. They do not require
adopting Gankster's host-selection model, desktop client, subscriptions or
reputation display. See [candidate comparison](qguard-comparison.md).

If later authorized, a controlled demonstration could check status before,
during and after a game, with the desktop app present versus absent, and inspect
host controls without confusing a manual declaration with observed game state.
Those actions are deferred; this research does not resume the existing live-test
hold or authorize a new competitor-account experiment. Public documentation or
an owner-provided demonstration can also narrow the remaining uncertainty.

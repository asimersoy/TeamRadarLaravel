# Stack Review At The Design Checkpoint

**Status:** recommendation for owner review, not a new stack decision. Inspected
2026-10-27. DEC-062 requires this review before new application implementation.

## Recommendation

Keep Laravel + Blade/Livewire, PostgreSQL and Docker for the next web version.
Use small client-side interactions for sliders, dialogs and draft state, and
server authority for matching, eligibility and honor. This is an engineering
recommendation based on the approved product and repository, not an approval.
The current prototype's plain JavaScript is a disposable review artifact.

The proposed screens do not expose a requirement that forces a framework
replacement. The hard work is consistent domain state, privacy, delayed ratings,
provider boundaries and recovery. Changing frontend frameworks does not resolve
those concerns. Existing application code may be retained where correct; its
tests cannot certify the new behavior until updated and rerun.

## Verified Repository Baseline

Inspected [composer.json](../../../qguard/composer.json),
[package.json](../../../qguard/package.json) and
[compose.yaml](../../../qguard/compose.yaml). These are declarations/configuration,
not a fresh runtime-health or dependency-upgrade test:

- PHP `^8.5`, Laravel `^13.17`, Livewire `^4.0`, Laravel Reverb.
- Blade, Tailwind 4, Vite 8; browser tests use Playwright in the application.
- PostgreSQL 18 with a named persistent volume; database-backed queue/cache;
  worker, scheduler, Reverb, nginx and local mail services. No initial Redis.
- Pest/PHPUnit application tests and earlier concurrency/browser evidence exist.
- No application, Docker engine, lockfile or running container was changed in
  this design pass. Earlier Docker Desktop evidence is dated in the first-pass
  implementation record; it is not a new inventory of engines on this Mac.

## Options Against This Product

| Option | What it offers here | Cost / reason to choose differently |
| --- | --- | --- |
| **A. Keep Laravel + Livewire — recommended** | Reuses the current backend, auth, persistence and testing structure; server-driven forms with local JS interactions suit the designed flow | Requires disciplined event/state handling for realtime rooms; measure latency and avoid a server round trip for every slider movement |
| B. Laravel + React/TypeScript through Inertia | Preserves Laravel domain work while giving the frontend a richer component/state ecosystem | Rebuilds the UI and frontend tests. Prefer if complex client interactions, a React-skilled team or shared React components become a concrete priority |
| C. TypeScript/Next.js application | A coherent JS/TS UI ecosystem with server/client composition | Broadest migration: authentication, persistence, jobs, domain rules, realtime deployment and regression evidence must be rebuilt/reselected. The present screens alone do not justify that cost |

This is a qualitative fit assessment, not a benchmark or claim of universal
superiority. Team staffing, hosting constraints or a materially different
desktop requirement could change the recommendation. No package purchases,
host selection, framework installation or migration is implied.

## Primary Documentation Checked

- Laravel's [13.x starter-kit documentation](https://github.com/laravel/docs/blob/13.x/starter-kits.md)
  supports Livewire and React/Inertia routes. The React route keeps Laravel
  server routing/controllers while using React and TypeScript for the UI.
- Livewire's [Alpine documentation](https://livewire.laravel.com/docs/4.x/alpine)
  documents local browser interaction alongside Livewire. Keeping slider drafts
  local is feasible without adopting an entirely different frontend.
- [Laravel Reverb](https://laravel.com/framework/docs/13.x/reverb) documents the
  realtime server and production operation/scaling. Existing configuration is
  a starting point, not proof that new room/reconnect behavior is correct.
- Next.js documents [server and client components](https://nextjs.org/docs/app/getting-started/server-and-client-components).
  It can support interactive pages and protected server work; that capability
  does not supply QGuard's domain rules, workers or operational design by itself.
- Electron's [process model](https://www.electronjs.org/docs/latest/tutorial/process-model)
  distinguishes its main process and web renderers. A future desktop companion
  is a separate integration/security decision, not simply permission to call
  private game APIs from a web page.

## Future Desktop And Discord

Keep provider adapters separate from matching/session rules. A future desktop
bridge can be evaluated against actual needs and permitted APIs; the web UI does
not need a desktop shell now. The owner's Chromium preference is conditional;
Gankster's shell and private integration implementation were not verified.

Discord returns only after Riot approval and RSO integration under DEC-067.
Nothing in A/B/C makes Discord or the native party-code assumption proven.
The backend/frontend choice does not grant Riot access or bypass DEF-014.

## Owner Decision And Next Evidence

At this checkpoint choose A, B or C, or state the constraint requiring another
comparison. Record the precise selection; do not infer it from approval of the
visual design. Then prepare the affected implementation slices and technical
contracts, including real guest isolation, provider credentials, transactions,
retention and regression tests. Stop application work until those approvals
are in place or the owner explicitly gives a narrow override.

# First-pass technical evidence — 2026-10-03

**Purpose:** verify a small set of current facts needed by QG-FIRST-PASS-1.
Primary web sources checked 2026-10-03; repository inspected at `c0008f7`.
This is research, not owner approval or proof of deployed behavior. Older
integration reports remain historical; live tests remain paused.

## Verified sources and bounded conclusions

| ID | Primary source | Relevant finding / limit |
| --- | --- | --- |
| TF01 | [Laravel 13 releases](https://laravel.com/framework/docs/13.x/releases) | Laravel 13 lists PHP 8.3–8.5 support. Choosing 13/8.5 for the new app is an agent recommendation, not inherited legacy configuration. |
| TF02 | [Laravel starter kits](https://laravel.com/framework/docs/13.x/starter-kits) | The Livewire starter uses Livewire 4. Free components can support the proposed frontend; no paid package is required by this plan. |
| TF03 | [Reverb scaling](https://laravel.com/framework/docs/13.x/reverb#scaling) | Redis is described for horizontal Reverb scaling. The proposed single-instance setup keeps scaling disabled; actual no-Redis runtime still needs a test. |
| TF04 | [Pest installation](https://pestphp.com/docs/installation) and [PHPUnit migration](https://pestphp.com/docs/migrating-from-phpunit-guide) | Current Pest requires PHP 8.4+. Pest and PHPUnit-style tests can coexist; resolve compatible locked versions instead of assuming the legacy toolchain. |
| TF05 | [Playwright Docker](https://playwright.dev/docs/docker) | Browser image and installed runner versions must match; current example is 1.63.0. Pin matching versions at implementation. Docker browser tests don't validate Windows game clients. |
| TF06 | [PostgreSQL official image](https://hub.docker.com/_/postgres) | PostgreSQL 18 images use versioned PGDATA and the /var/lib/postgresql volume target. Older-image mount recipes must not be copied blindly. |
| TF07 | [Docker volumes](https://docs.docker.com/engine/storage/volumes/) | Named-volume lifetime is distinct from container lifetime; deletion of the volume still destroys its data. Use separate backups and prove recreation persistence. |
| TF08 | [PostgreSQL 18 locking](https://www.postgresql.org/docs/18/explicit-locking.html) | Row/advisory locks and deadlock handling support the proposed transaction design; they do not automatically supply application invariants. |
| TF09 | [Riot Competitive FAQ](https://support.riotgames.com/en-us/valorant/gameplay/valorant-competitive-mode-faq) | The current article distinguishes small-party restrictions from unrestricted five-stack rank disparity, with RR adjustments. It also describes rank visibility. Neither claim is a live QGuard/client test. |
| TF10 | [Riot developer documentation](https://developer.riotgames.com/docs/valorant) | RSO requires production access. Its API listing includes account identification, matches and ranked leaderboards, not demonstrated universal live-rank retrieval. LFG is an opt-in use case; products serving players need registration. |
| TF11 | [Riot developer FAQ](https://developer.riotgames.com/docs/faqs) | Production-key review requires a demonstrable application/user flow. This does not grant access or authorize this agent to submit an application. |
| TF12 | [Riot patch 3.10](https://playvalorant.com/en-us/news/game-updates/valorant-patch-notes-3-10/) | Historical primary evidence for the five-stack exception. Use TF09 for current detail, not the old patch's numeric RR schedule. |

## Repository facts

Clean `new-development` at `c0008f7` before this task. Root composer.json is the
legacy Laravel 12/Volt application; it is not the selected new stack. No rewrite
`qguard/` directory existed. Current product authority was DEC-001–DEC-050,
with detailed contracts still pending. Planning modifies only project-docs.

## Agent conclusions and remaining uncertainty

The selected stack has a supported-looking dependency path; only S1 resolution,
build and tests can establish compatibility on this machine. Propose PostgreSQL
18 persistent named storage and separate disposable test targets. No workload
benchmark supports a public capacity promise.

Plan the rank fallback without pretending it verifies identity or game access.
Current access has not been granted/established here. Do not infer that an
approval-free public LFG service is permitted simply because no API is called.
Record provider/real-user release review separately from local synthetic development.

The five-player game exception means QGuard's rank proximity can be a tunable
preference while true game restrictions remain hard. This distinction requires
first-build review and later current-rule checks; it is not authority to relax
a genuine provider restriction. No Apex/CS2/Discord live research or tests were
restarted by this bounded stack/compatibility check.

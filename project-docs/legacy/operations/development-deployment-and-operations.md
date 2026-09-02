# Legacy Development, Deployment, And Operations

- **Record type:** historical operational reconstruction
- **Status:** draft for owner review
- **Current authority:** none
- **Deployment status:** no production deployment was verified

## Legacy Local Web Development

The repository's Composer `dev` script intends to run:

- Laravel development server;
- queue listener;
- Laravel Pail logs;
- Vite development server; and
- process coordination through `concurrently`.

The package scripts also provide Vite build/dev commands. The legacy code uses
an ignored `.env`, Composer dependencies under `vendor/`, and npm dependencies
under `node_modules/`.

No local onboarding README at repository root defines a verified start-to-finish
setup for TeamRadar.

## Docker Compose Development Stack

The active Compose configuration defines:

- `app`: source-mounted PHP-FPM;
- `vite`: source-mounted Vite on host port 5173;
- `nginx`: source-mounted web server on host port 8080;
- `mysql`: MySQL 8 with a named data volume;
- `redis`: Redis 7 with append-only persistence; and
- a named Vite node-modules volume.

Commented services describe:

- a Node WebSocket gateway on port 8443; and
- a Laravel LiveAPI verification worker.

The config parsed during inspection, but no Compose services were running.

## Legacy Relay Development

The recovered Electron package supports:

- TypeScript watch/compile;
- Electron start;
- Electron Builder packaging;
- Windows NSIS and portable x64 builds;
- Linux AppImage x64; and
- macOS DMG configuration.

The memory reconstruction says the old workflow expected:

- convenient development on Linux;
- mock local WebSocket/event generation without Apex;
- real Apex testing on Windows;
- final Windows packaging on Windows or CI;
- clean rebuilds when builder/NSIS artifacts became stale; and
- awareness of AppImage/FUSE requirements.

Those workflow details are memory-supported; no complete test/release automation
for the relay survives in the active tree.

## GitHub Actions

### Test Workflow

Configured for pushes/pull requests targeting `develop` and `main`:

- Ubuntu runner;
- PHP 8.4 plus Composer and Xdebug;
- Node 22 with npm cache;
- `npm i`;
- private Flux Composer credentials from secrets;
- Composer install;
- `.env.example` copy and app key generation;
- Vite build; and
- Pest.

No local `develop` or `main` branch exists in the inspected checkout; the remote
default is `master`. GitHub run status and secret configuration were not
inspected.

### Linter Workflow

Also targets `develop` and `main`, grants `contents: write`, installs Composer
and npm dependencies, and runs Pint in modifying mode. An auto-commit step is
commented out. Therefore the current workflow may report success after modifying
the ephemeral runner rather than checking that committed code was already
formatted.

This is a legacy configuration finding, not a current workflow decision.

## Historical Deployment Preference

The TODO says to keep development local and use a simple one-server Docker setup
until the product and platform/API direction became stable. The remembered
rationale was solo-developer scope and avoidance of premature distributed
infrastructure.

That preference is historical. It does not select a deployment model for the
rewrite.

## Deployment Roadmap

`docs/deployment-plan.md` proposes:

- build/publish images to GHCR on `main` and tags;
- immutable commit-SHA image tags plus a moving `main` tag;
- production Compose without source bind mounts;
- HTTPS on a development subdomain;
- reverse proxy and Let's Encrypt;
- server bootstrap with Docker/Compose;
- SSH deployment from GitHub Actions;
- alternatives using webhook or Watchtower;
- rollback by selecting an earlier image tag; and
- later logging/metrics/uptime checks.

Unresolved inputs include namespace/image names, domain, reverse proxy, server,
SSH details, gateway containerization, and final delivery mechanism. No
production Compose or build-and-push workflow matching the plan was found.

## Operational Behaviors Anticipated But Not Completed

- relay/backend reconnection and reauthentication;
- event buffering and retry;
- command acknowledgement and idempotency;
- presence timeout;
- health checks beyond PHP-FPM socket reachability;
- logs/metrics/alerts;
- rate limits and abuse monitoring;
- database migration strategy;
- backup schedule and immutable snapshots;
- restore test;
- release approval;
- rollback triggers and verification;
- incident response;
- desktop crash/update reporting; and
- support diagnostics with secret/data redaction.

## Legacy Verification Results From This Audit

- `docker compose config --quiet`: passed.
- `docker compose ps --format json`: no services returned.
- `npm run build`: passed with warnings about stale Browserslist data, CSS
  import order, and an empty JS chunk.
- `php artisan test`: did not start because the local PHP binary could not load
  `libnetsnmp.40.dylib`.
- workflow Markdown validator: passed before project-specific record creation.

These results describe the inspection environment on 2026-09-02. They do not
prove historical CI or deployment behavior.

## What A Future Operational Plan Must Re-Decide

- supported local environments and onboarding;
- dependency/runtime versions;
- chosen app/desktop services;
- environments and providers;
- secret management;
- build/test/security gates;
- data migrations;
- backup/restore;
- deployment approval and rollback;
- observability/SLOs/incident response;
- desktop signing/notarization/update; and
- remote/production authorization.

No legacy operational plan is authorized for reuse merely because it exists.

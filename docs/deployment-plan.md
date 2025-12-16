# Deployment Plan: GHCR, GitHub Actions, Dev Subdomain

Plan for moving the stack to GHCR-backed images with CI/CD, while keeping fast local dev via the existing Compose setup.

## Goals
- Build and publish images to GHCR on push to `main` (and tags), using GitHub Actions.
- Run the deployed stack from GHCR images on the server; keep local dev using source-mounted Compose.
- Serve the app on a dev subdomain with HTTPS via a reverse proxy.
- Automate pulls/restarts on the server when new images are published.

## Inputs to confirm
- GHCR namespace: `ghcr.io/<org-or-user>` and desired image names.
- Domain for the dev subdomain (e.g., `dev.example.com`) and which reverse proxy to use (nginx/Traefik/Caddy).
- Server OS/SSH access details for automation (host/user/port, SSH key).
- Whether the Node gateway should be containerized for prod (requires a Dockerfile).

## Milestones and tasks

### 1) Repository prep
- Add `.dockerignore` to trim build context.
- Add `docker-compose.prod.yml` that references GHCR images (no bind mounts; uses env files for secrets).
- If the gateway is needed in prod, add a Dockerfile under `docker/gateway/Dockerfile`.
- Keep `docker-compose.yml` for local dev; optional `docker-compose.override.yml` for developer tweaks.

### 2) Image naming and tagging
- Images: `ghcr.io/<ns>/teamradar-app`, `ghcr.io/<ns>/teamradar-vite`, `ghcr.io/<ns>/teamradar-gateway` (if used), `ghcr.io/<ns>/teamradar-nginx` (only if baking nginx config into an image).
- Tags: `${{ github.sha }}` for immutability, `main` (and optionally `latest`) for the moving prod tag, and semver tags when cutting releases.

### 3) GitHub Actions: build and push
- Workflow: `.github/workflows/build-and-push.yml`.
- Triggers: push to `main` and tags; pull requests run build-only (no push) for validation.
- Steps per job: `checkout` → `setup-buildx` → `login` to GHCR (`packages: write`, `contents: read`) → `docker/build-push-action` with cache → push `:sha` and `:main` tags.
- Build jobs: app (`docker/app/Dockerfile`), vite (`docker/vite/Dockerfile`), gateway (if Dockerfile exists). Reuse `GITHUB_TOKEN` or `GHCR_PAT` secret.
- Optional: save `IMAGE_SHA` outputs for deployment job.

### 4) Production Compose and config
- Create `docker-compose.prod.yml` that pins images via env vars: `APP_IMAGE=ghcr.io/<ns>/teamradar-app`, `IMAGE_TAG=main` (override with a specific SHA when deploying).
- Use `.env.production` (not committed) for DB creds, app keys, etc.
- Include a reverse proxy service or mount host-level proxy config to route `dev.example.com` to the app/vite/nginx container; request certificates via Let’s Encrypt.

### 5) Server bootstrap
- Install Docker and Compose plugin; open firewall for HTTPS.
- `docker login ghcr.io -u <user> -p $GHCR_TOKEN` (token with `read:packages`).
- Copy repo or just the prod compose/env files to the server.
- Bring up stack: `IMAGE_TAG=main docker compose -f docker-compose.prod.yml pull && docker compose -f docker-compose.prod.yml up -d --remove-orphans`.
- Verify health (nginx 200s, php-fpm healthcheck, DB migrations if needed).

### 6) Delivery automation (pick one)
- **Recommended:** Add a deploy job in the Actions workflow (runs after successful pushes to `main`) that SSHes to the server and runs `docker compose -f docker-compose.prod.yml pull && docker compose -f docker-compose.prod.yml up -d --remove-orphans`, passing the built `${{ github.sha }}` as `IMAGE_TAG`. Secrets: `SSH_HOST`, `SSH_USER`, `SSH_KEY`, `SSH_KNOWN_HOSTS`.
- **Alternative:** Webhook to a small server script that runs the same `docker compose pull && up -d` when GHCR publishes or when GitHub sends a `push` event.
- **Alternative:** Run Watchtower on the server to monitor/pull `:main` tags; less control over rollout but minimal setup.

### 7) Local development flow
- Keep using `docker-compose.yml` with bind mounts and local builds.
- If you want to test prod images locally: `IMAGE_TAG=main docker compose -f docker-compose.prod.yml up` (no code mounts).
- Use different env files for dev vs prod to avoid leaking secrets.

### 8) Release, rollback, and observability
- Release: merge to `main` → images build/push → deploy job updates the server.
- Rollback: deploy a previous GHCR tag (prior SHA or semver tag) by setting `IMAGE_TAG` and rerunning compose.
- Add logs/metrics shipping (e.g., container logs to a log host) and uptime checks on the dev subdomain.

## Next actions to start implementation
1. Confirm GHCR namespace and dev domain/reverse proxy choice.
2. Decide whether to containerize the gateway for prod.
3. Add `.dockerignore` and author `docker-compose.prod.yml` with image placeholders.
4. Add the GitHub Actions workflow to build/push images.
5. Set server secrets in GitHub and configure the deploy mechanism (recommended: SSH deploy step).

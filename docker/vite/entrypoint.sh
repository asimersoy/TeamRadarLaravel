#!/bin/sh
set -e

CACHE_DIR=/opt/vite/node_modules
TARGET_DIR=/var/www/html/node_modules

# Seed the bind-mounted node_modules volume from the prebuilt cache if needed
if [ ! -d "$TARGET_DIR" ] || [ -z "$(ls -A "$TARGET_DIR")" ]; then
  echo "Seeding node_modules from image cache..."
  mkdir -p "$TARGET_DIR"
  cp -R "$CACHE_DIR"/. "$TARGET_DIR"/
fi

exec npm run dev -- --host 0.0.0.0 --port 5173

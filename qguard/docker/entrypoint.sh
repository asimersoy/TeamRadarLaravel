#!/bin/sh
set -eu
if [ "${APP_ENV:-production}" = production ] && [ "${APP_DEBUG:-false}" != false ]; then
    echo 'Refusing production with debug enabled.' >&2
    exit 1
fi
mkdir -p /app/storage/framework/cache/data /app/storage/framework/sessions /app/storage/framework/views /app/storage/logs /app/bootstrap/cache
if [ "$(id -u)" = 0 ]; then
    chown -R www-data:www-data /app/storage /app/bootstrap/cache
fi
exec "$@"

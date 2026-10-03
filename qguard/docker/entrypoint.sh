#!/bin/sh
set -eu
if [ "${APP_ENV:-production}" = production ] && [ "${APP_DEBUG:-false}" != false ]; then
    echo 'Refusing production with debug enabled.' >&2
    exit 1
fi
if [ "${APP_ENV:-production}" = production ]; then
    if [ "${QGUARD_TEST_DATABASE:-false}" != false ] || [ "${QGUARD_BROWSER_CLOCK:-false}" != false ]; then
        echo 'Refusing production with test controls enabled.' >&2
        exit 1
    fi
    export SESSION_SECURE_COOKIE=true
fi
mkdir -p /app/storage/framework/cache/data /app/storage/framework/sessions /app/storage/framework/views /app/storage/logs /app/bootstrap/cache
if [ "$(id -u)" = 0 ]; then
    chown -R www-data:www-data /app/storage /app/bootstrap/cache
fi
exec "$@"

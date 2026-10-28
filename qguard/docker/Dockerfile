FROM composer:2@sha256:d8f6343d3fae98107426bc49163ccad46ef85aabd4a27d80a74401fab4aba332 AS composer
FROM php:8.5-fpm-bookworm@sha256:53eab56a8f43f51a92119f6c29b3448af98eec288ff17f92829354a4b4c9ca05 AS runtime
RUN apt-get update && apt-get install -y --no-install-recommends \
    libpq-dev libicu-dev libzip-dev libonig-dev unzip git curl \
    && docker-php-ext-install -j2 pdo_pgsql intl zip mbstring bcmath pcntl \
    && rm -rf /var/lib/apt/lists/*
COPY --from=composer /usr/bin/composer /usr/local/bin/composer
WORKDIR /app
RUN printf 'upload_max_filesize=1M\npost_max_size=2M\nexpose_php=Off\n' > /usr/local/etc/php/conf.d/qguard.ini
FROM runtime AS development
COPY --chmod=755 docker/entrypoint.sh /usr/local/bin/qguard-entrypoint
ENTRYPOINT ["qguard-entrypoint"]
CMD ["php-fpm"]

FROM runtime AS production-dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --no-interaction --prefer-dist

FROM node:24-alpine@sha256:e67514e5d0f6c46656005e1b693b2ec9d52e80b641307de684d4a015ba7a4eaf AS assets
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci --ignore-scripts
COPY resources ./resources
COPY lang ./lang
COPY --from=production-dependencies /app/vendor/laravel/framework/src/Illuminate/Pagination/resources/views ./vendor/laravel/framework/src/Illuminate/Pagination/resources/views
COPY vite.config.js ./
RUN npm run build

FROM production-dependencies AS production-build
COPY app ./app
COPY bootstrap ./bootstrap
COPY config ./config
COPY lang ./lang
COPY database/migrations ./database/migrations
COPY public ./public
COPY resources/views ./resources/views
COPY resources/review ./resources/review
COPY routes ./routes
COPY artisan ./
RUN mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs storage/app/private bootstrap/cache \
    && composer dump-autoload --no-dev --classmap-authoritative --no-scripts \
    && php artisan package:discover --ansi
COPY --from=assets /app/public/build ./public/build

FROM runtime AS production
COPY --from=production-build --chown=www-data:www-data /app /app
COPY --chmod=755 docker/entrypoint.sh /usr/local/bin/qguard-entrypoint
ENV APP_ENV=production APP_DEBUG=false QGUARD_PUBLIC_ENABLED=false QGUARD_TEST_DATABASE=false QGUARD_BROWSER_CLOCK=false SESSION_SECURE_COOKIE=true
USER www-data
ENTRYPOINT ["qguard-entrypoint"]
CMD ["php-fpm"]

FROM nginx:1.29-alpine@sha256:5616878291a2eed594aee8db4dade5878cf7edcb475e59193904b198d9b830de AS production-web
COPY --from=production-build /app/public /app/public
COPY docker/nginx.conf /etc/nginx/conf.d/default.conf

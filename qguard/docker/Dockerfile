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

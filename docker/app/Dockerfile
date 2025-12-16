FROM php:8.3-fpm-alpine

WORKDIR /var/www/html

# Install system dependencies and PHP extensions once at build time
ENV PKG_CONFIG_PATH=/usr/lib/pkgconfig:/usr/local/lib/pkgconfig

RUN apk add --no-cache \
      git bash libpng-dev oniguruma-dev autoconf g++ make zlib-dev \
      sqlite sqlite-dev icu-libs icu-dev pkgconf netcat-openbsd icu-data-full \
    && docker-php-ext-configure intl \
    && docker-php-ext-install -j"$(nproc)" pdo pdo_mysql pdo_sqlite intl \
    && printf "\n" | pecl install -o -f igbinary \
    && printf "\n" | pecl install -o -f redis \
    && docker-php-ext-enable igbinary redis

CMD ["php-fpm", "-F"]

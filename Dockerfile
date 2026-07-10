FROM dunglas/frankenphp:php8.3

# This MUST come before composer install
RUN install-php-extensions \
    pdo_sqlite \
    sqlite3 \
    zip \
    pcntl \
    posix

RUN setcap -r /usr/local/bin/frankenphp || true

WORKDIR /app

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts --no-interaction

COPY . .

RUN composer dump-autoload --optimize \
    && mkdir -p storage/framework/{sessions,views,cache} bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 8080

ENTRYPOINT ["/entrypoint.sh"]

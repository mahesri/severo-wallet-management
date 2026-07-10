FROM dunglas/frankenphp:php8.3

RUN install-php-extensions \
    pdo_sqlite \
    sqlite3 \
    zip \
    pcntl \
    posix

RUN setcap -r /usr/local/bin/frankenphp || true

# Force PHP to print all errors to stderr so Render's logs catch them
RUN { \
    echo "display_errors=1"; \
    echo "display_startup_errors=1"; \
    echo "error_reporting=E_ALL"; \
    echo "log_errors=1"; \
    echo "error_log=/dev/stderr"; \
    } > /usr/local/etc/php/conf.d/zz-debug-errors.ini

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

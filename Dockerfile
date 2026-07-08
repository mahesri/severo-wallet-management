FROM dunglas/frankenphp:php8.3

# Install PHP extensions required by Laravel + SQLite
RUN install-php-extensions \
    pdo_sqlite \
    sqlite3 \
    zip

WORKDIR /app

# Copy Composer from the official Composer image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy project
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Create SQLite database
RUN mkdir -p database \
    && touch database/database.sqlite

# Cache configuration
RUN php artisan config:clear
RUN php artisan route:clear

EXPOSE 8080

CMD ["php", "artisan", "octane:frankenphp", "--host=0.0.0.0", "--port=8080"]

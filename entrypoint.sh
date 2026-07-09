#!/bin/sh
set -e

# Ensure the SQLite file exists (only matters on first boot / before disk has data)
mkdir -p "$(dirname "$DB_DATABASE")"
touch "$DB_DATABASE"

# Run migrations against the current (persisted) database
php artisan migrate --force

# Optional: cache config/routes now that real env vars are present
php artisan config:cache
php artisan route:cache

exec php artisan octane:frankenphp --host=0.0.0.0 --port="${PORT:-8080}"

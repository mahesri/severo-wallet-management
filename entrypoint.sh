#!/bin/sh
set -e

echo "== Checking DB_DATABASE: [$DB_DATABASE] =="

if [ -z "$DB_DATABASE" ]; then
  echo "ERROR: DB_DATABASE environment variable is not set." >&2
  exit 1
fi

mkdir -p "$(dirname "$DB_DATABASE")"
touch "$DB_DATABASE"
echo "== DB file ready =="

echo "== Running migrations =="
php artisan migrate --force
echo "== Migrations done =="

echo "== Starting Octane on port ${PORT:-8080} =="
exec php artisan octane:frankenphp --host=0.0.0.0 --port="${PORT:-8080}"

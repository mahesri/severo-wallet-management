#!/bin/sh
set -e

if [ -z "$DB_DATABASE" ]; then
  echo "ERROR: DB_DATABASE environment variable is not set." >&2
  exit 1
fi

mkdir -p "$(dirname "$DB_DATABASE")"
touch "$DB_DATABASE"

echo "== Running migrations =="
php artisan migrate --force
echo "== Migrations done =="

echo "== DEBUG: running worker script directly =="
php public/frankenphp-worker.php

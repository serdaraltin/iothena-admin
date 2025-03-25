#!/bin/bash

echo "Checking migration status..."

if [ ! -f /var/www/html/storage/.migrations_done ]; then
  echo "Running migrations..."
  php artisan migrate --force

  touch /var/www/html/storage/.migrations_done
  echo "Migration completed and flag created."
else
  echo "Migrations have already been run."
fi
#!/bin/sh
set -e

composer install --prefer-dist

MIGRATE_NOT_MIGRATED_STATUS=$(php artisan migrate:status | grep "not found" | wc -l)

if [ $MIGRATE_NOT_MIGRATED_STATUS = "1" ];
then
  php artisan migrate
fi

php artisan view:clear
php artisan route:clear
php artisan config:clear
php artisan config:cache

composer dump-autoload

php artisan optimize:clear

npm install

npm run build

exec php-fpm


#!/bin/bash
set -x

echo "Mengatur hak akses direktori storage dan bootstrap/cache..."
mkdir -p /var/www/html/storage/logs
touch /var/www/html/storage/logs/laravel.log
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

cd /var/www/html

echo "Membaca environment dari file .env..."
APP_ENV=$(grep '^APP_ENV=' .env | cut -d '=' -f2 | tr -d '\r')
echo "Environment Laravel: $APP_ENV"

echo "Menjalankan optimisasi Laravel..."
composer validate --strict
composer install --optimize-autoloader --no-dev
php artisan migrate

if [ "$APP_ENV" = "production" ]; then
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
else
    echo "Mode development: membersihkan cache..."
    php artisan config:clear
    php artisan cache:clear
    php artisan view:clear
    php artisan route:clear
fi

exec php-fpm8.2

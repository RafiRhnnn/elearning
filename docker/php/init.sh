#!/bin/bash
set -x  # Tambah ini agar semua perintah di-log saat dijalankan



# atur kepemilikan dan hak akses direktori
chown -R www-data:www-data /var/www/html
echo "Mengatur hak akses direktori storage dan bootstrap/cache..."
# Buat folder dan file log jika belum ada
mkdir -p /var/www/html/storage/logs
touch /var/www/html/storage/logs/laravel.log
# Baru set permission
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

cd /var/www/html
echo "Membaca environment dari file .env..."

# Ambil APP_ENV dari .env file
APP_ENV=$(grep ^APP_ENV= .env | cut -d '=' -f2 | tr -d '\r')

if [[ -z "$APP_ENV" ]]; then
    echo "APP_ENV tidak ditemukan di file .env. Menggunakan 'local' sebagai default."
    APP_ENV=local
fi

echo "Environment Laravel: $APP_ENV"

echo "Menjalankan optimisasi Laravel..."
composer validate --strict
composer install --optimize-autoloader --no-dev

# Migrate database jika ada yang perlu 
php artisan migrate
# Jalankan perintah artisan sesuai environment
if [ "$APP_ENV" = "production" ]; then
    echo "Mode production: menjalankan caching..."
    php artisan config:clear
    php artisan cache:clear
    php artisan view:clear
    php artisan route:clear

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

# Jalankan Apache agar container tetap aktif
exec apache2-foreground
#!/bin/bash
set -e

# Atur kepemilikan dan hak akses direktori
# Pastikan direktori ada sebelum mengubah kepemilikan
if [ -d "/var/www/html/storage" ] && [ -d "/var/www/html/bootstrap/cache" ]; then
    echo "Mengatur hak akses direktori storage dan bootstrap/cache..."
    chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
fi

# Jalankan Apache agar container tetap aktif
exec apache2-foreground
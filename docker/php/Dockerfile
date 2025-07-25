# Gunakan base image PHP-FPM
FROM php:8.2-fpm

# Install dependensi yang dibutuhkan
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev \
    libfreetype6-dev libjpeg62-turbo-dev libzip-dev \
    libicu-dev libcurl4-openssl-dev pkg-config libssl-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        bcmath \
        openssl \
        zip \
        json \
        ctype

# Salin composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node.js 20 dan NPM global
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm

# Salin entrypoint script
COPY docker/php/init.sh /usr/local/bin/init.sh
RUN chmod +x /usr/local/bin/init.sh

# Atur user dan group untuk PHP-FPM
RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data

# Ekspos port PHP-FPM (default 9000)
EXPOSE 9000

# Jalankan entrypoint script
ENTRYPOINT ["/usr/local/bin/init.sh"]
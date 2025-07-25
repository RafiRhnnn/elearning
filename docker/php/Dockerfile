# Gunakan base image PHP-FPM
FROM ubuntu:22.04



RUN add-apt-repository -y ppa:ondrej/php
RUN apt update
RUN apt install -y php8.2\
    php8.2-cli\
    php8.2-common\
    php8.2-fpm\
    php8.2-mysql\
    php8.2-zip\
    php8.2-gd\
    php8.2-mbstring\
    php8.2-curl\
    php8.2-xml\
    php8.2-bcmath\
    php8.2-pdo

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
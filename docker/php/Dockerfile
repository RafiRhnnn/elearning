FROM php:8.2-fpm

# Install tools dasar + add-apt-repository
RUN apt-get update && apt-get install -y \
    software-properties-common \
    curl \
    gnupg2 \
    ca-certificates \
    lsb-release

# Tambah PPA ondrej/php
RUN add-apt-repository -y ppa:ondrej/php

# Update & install PHP + extensions
RUN apt-get update && apt-get install -y \
    php8.2 \
    php8.2-cli \
    php8.2-common \
    php8.2-fpm \
    php8.2-mysql \
    php8.2-zip \
    php8.2-gd \
    php8.2-mbstring \
    php8.2-curl \
    php8.2-xml \
    php8.2-bcmath \
    php8.2-pdo

# Copy composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node.js 20 dan npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm

# Copy script init
COPY docker/php/init.sh /usr/local/bin/init.sh
RUN chmod +x /usr/local/bin/init.sh

# Set user www-data (opsional)
RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data

EXPOSE 9000
ENTRYPOINT ["/usr/local/bin/init.sh"]

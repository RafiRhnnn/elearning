FROM ubuntu:22.04

RUN apt-get update && apt-get install -y \
    software-properties-common 

RUN add-apt-repository -y ppa:ondrej/php

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

# Install nodejs 20 dari Nodesource
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    ln -s /usr/bin/node /usr/local/bin/node && \
    ln -s /usr/bin/npm /usr/local/bin/npm



COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN mkdir -p /run/php && chown www-data:www-data /run/php

RUN echo "[global]\ndaemonize = no\n[www]\nlisten = 0.0.0.0:9000\n" > /etc/php/8.2/fpm/pool.d/zz-docker.conf

WORKDIR /var/www/html
COPY docker/php/init.sh /usr/local/bin/init.sh
RUN chmod +x /usr/local/bin/init.sh

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

EXPOSE 9000
ENTRYPOINT ["/usr/local/bin/init.sh"]

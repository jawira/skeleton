FROM php:8.0-fpm

WORKDIR /app

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV TZ=Europe/Brussels
COPY resources/dc/fpm/zzz-php-settings.ini /usr/local/etc/php/conf.d/
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY . /app

# Install dependencies
RUN set -ex \
    && echo "### apg-get ###" \
    && apt-get update \
    && apt-get --yes --no-install-recommends install \
        wget \
        mysql-common \
        libonig-dev \
        libicu-dev \
        gdebi \
        zlib1g-dev \
        libpng-dev
RUN set -ex \
    && echo "### Phing ###" \
    && wget -nv -O /usr/local/bin/phing https://github.com/phingofficial/phing/releases/download/3.0.0-RC1/phing-3.0.0-RC2.phar \
    && chmod +x /usr/local/bin/phing
RUN set -ex \
    && echo "### PHP extensions ###" \
    && docker-php-source extract \
    && pecl install xdebug \
    && docker-php-ext-configure intl \
    && docker-php-ext-install \
        gd \
        iconv \
        intl \
        ctype \
        mbstring \
        tokenizer \
    && docker-php-ext-enable \
        xdebug \
    && echo "### Install MariaDB extension ###" \
    && apt-get --yes --no-install-recommends install \
        mariadb-client \
    && docker-php-ext-install \
        pdo_mysql \
    && echo "### ZIP extension ###" \
    && apt-get --yes --no-install-recommends install \
        zip \
        libzip-dev \
    && docker-php-ext-install \
        zip
RUN set -ex \
    && echo "### Cleaning ###" \
    && docker-php-source delete \
    && apt-get clean \
    && rm -rf \
        /var/lib/apt/lists/* \
        /tmp/* \
        /var/tmp/* \
        /usr/share/doc/*

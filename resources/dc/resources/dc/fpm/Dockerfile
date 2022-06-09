FROM php:8.1-fpm

WORKDIR /app

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV TZ=Europe/Brussels
COPY --from=composer /usr/bin/composer /usr/bin/composer


RUN set -ex \
    && echo "### apg-get ###" \
    && apt-get update \
    && apt-get --yes --no-install-recommends install \
        wget \
        gdebi

RUN set -ex \
    && echo "### Extensions without requirements ###" \
    && docker-php-ext-install \
        gd \
        intl \
        xsl \
        xml \
        zip \

RUN set -ex \
    && echo "### Phing ###" \
    && wget -nv -O /usr/local/bin/phing https://github.com/phingofficial/phing/releases/download/3.0.0-RC3/phing-3.0.0-RC3.phar \
    && chmod +x /usr/local/bin/phing


RUN set -ex \
    && echo "### xdebug ###" \
    && pecl channel-update pecl.php.net \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug


# https://github.com/docker-library/php/issues/75#issuecomment-82075678
RUN set -ex  \
    && echo "### ldap extension ###" \
    && apt-get --yes --no-install-recommends install \
        libldap2-dev \
    && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/  \
    && docker-php-ext-install ldap


RUN set -ex \
    && echo "### Postgres extension ###" \
    && apt-get --yes --no-install-recommends install \
        libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install \
        pdo \
        pdo_pgsql \
        pgsql


RUN set -ex \
    && echo "### imap extension ###" \
    && apt-get --yes --no-install-recommends install \
        libc-client-dev \
        libkrb5-dev \
    && docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-install imap


RUN set -ex \
    && echo "### CA Certificates ###" \
    && apt-get --yes --no-install-recommends install \
        ca-certificates
COPY resources/dc/fpm/certificate.crt /usr/local/share/ca-certificates/
RUN set -ex \
    && chmod 644 /usr/local/share/ca-certificates/* \
    && update-ca-certificates


RUN set -ex \
    && echo "### Cleaning ###" \
    && docker-php-source delete \
    && apt-get clean \
    && rm -rf \
        /var/lib/apt/lists/* \
        /tmp/* \
        /var/tmp/* \
        /usr/share/doc/*


COPY resources/dc/fpm/zzz-php-settings.ini /usr/local/etc/php/conf.d/
COPY . /app

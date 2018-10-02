FROM php:7.2-apache

WORKDIR /var/www/my-site

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

COPY . /var/www/my-site/

COPY ./resources/docker/my-site.local.conf /etc/apache2/sites-available/

#Custom PHP configuration, automatically loaded
COPY resources/docker/99-php-custom.ini /usr/local/etc/php/conf.d/

#https://github.com/docker-library/php/issues/75#issuecomment-82075678
RUN echo "### Apache configuration" \
    && a2enmod \
        rewrite \
        vhost_alias \
        deflate \
        expires \
    && a2dissite *.conf \
    && a2ensite my-site.local.conf \
    && echo "### apt-get" \
    && apt-get update \
    && apt-get --yes --no-install-recommends install \
        composer \
        phing \
        make \
        wget \
    && echo "### Composer ###" \
    && composer self-update \
    && composer global require hirak/prestissimo
    && echo "### Install sendmail replacement" \
    && mkdir /opt/mailhog \
    && wget -O /opt/mailhog/mhsendmail https://github.com/mailhog/mhsendmail/releases/download/v0.2.0/mhsendmail_linux_amd64 \
    && chmod +x /opt/mailhog/mhsendmail \
    && echo "### PHP extensions" \
    && docker-php-source extract \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ \
    && docker-php-ext-install \
       gd \
       ldap \
       mcrypt \
       mysql \
       pdo \
       pdo_mysql \
       soap \
    && echo "### Cleaning" \
    && composer cache-clear \
    && docker-php-source delete \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

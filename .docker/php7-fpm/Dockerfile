FROM php:7.0-fpm-alpine

ARG HOST_UID=1000
ARG WEB_USER=www-data
ARG WEB_GROUP=www-data
ARG PHP_ROOT_DIR=/usr/local/etc
ARG XDEBUG_REMOTE_PORT=9100

# Installing php env requirements
RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
    && pecl install xdebug \
    && docker-php-ext-install mysqli \
    && docker-php-ext-enable xdebug \      
    && apk del .build-deps

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --filename=composer --install-dir=/bin
ENV PATH /root/.composer/vendor/bin:$PATH

# Copying PHP/Files Configurations into containers:
COPY ./config/php.ini ${PHP_ROOT_DIR}/php/
COPY ./config/zz-custom-xdebug.ini ${PHP_ROOT_DIR}/php/conf.d/zz-custom-xdebug.ini
COPY ./config/zz-www.conf ${PHP_ROOT_DIR}/php-fpm.d/zz-www.conf

# Final permissions adjustments:
RUN apk --no-cache add shadow \
    && usermod -u ${HOST_UID} ${WEB_USER} \
    && groupmod -g ${HOST_UID} ${WEB_GROUP} \
    && chgrp -R ${WEB_GROUP} ${PHP_ROOT_DIR}/php-fpm.d/zz-www.conf

# Expose xdebug port ${XDEBUG_REMOTE_PORT}
EXPOSE ${XDEBUG_REMOTE_PORT}

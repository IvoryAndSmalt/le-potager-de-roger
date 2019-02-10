FROM php:7-apache

RUN set -ex \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb
RUN set -ex \
    && docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-enable pdo pdo_mysql
RUN a2enmod rewrite
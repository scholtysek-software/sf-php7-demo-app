FROM php:7.0.10-apache

RUN apt-get update
RUN apt-get install -y git zlib1g-dev curl libcurl3 libcurl3-dev libxml2 libxml2-dev libicu-dev \
    && docker-php-ext-install zip curl pdo pdo_mysql mbstring opcache soap intl
RUN a2enmod rewrite
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/bin/composer

RUN pecl install xdebug
ADD xdebug.ini /usr/local/etc/php/conf.d
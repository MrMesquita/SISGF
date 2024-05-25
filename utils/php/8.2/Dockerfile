FROM php:8.2-fpm

RUN docker-php-ext-install pdo pdo_mysql mysqli

# Instalação de extensões necessárias do PHP para o Laravel
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libbz2-dev \
        libxslt-dev \
        libmcrypt-dev \
        libzip-dev \
        zip \
        unzip \
        git \
        libyaml-dev \
        libssh2-1-dev 

# Instalação do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

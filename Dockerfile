FROM php:8.0.8-fpm

RUN apt-get update && apt-get install -y git

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

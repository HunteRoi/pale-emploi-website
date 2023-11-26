FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    && docker-php-ext-install mysqli \
	&& docker-php-ext-enable mysqli

EXPOSE 80

FROM php:8.1-fpm-alpine

WORKDIR /var/www

RUN apk --update add wget \
	curl \
	libmemcached-dev \
	libmcrypt-dev \
	libxml2-dev \
	zlib-dev \
	autoconf \
	pcre-dev \
	cyrus-sasl-dev \ 
	openssl \
	openssl-dev \
	oniguruma-dev \
	postgresql-dev

RUN docker-php-ext-install pdo_pgsql pcntl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN rm /var/cache/apk/*
FROM php:8.1-fpm-alpine as builder
ARG UID
ARG GID
ENV UID=${UID}
ENV GID=${GID}
RUN echo http://dl-2.alpinelinux.org/alpine/edge/community/ >> /etc/apk/repositories
RUN apk --no-cache add shadow
RUN groupmod --non-unique --gid "${GID}" www-data
RUN usermod --non-unique --uid "${UID}" www-data

RUN apk add icu-dev
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-configure intl && docker-php-ext-install intl


COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

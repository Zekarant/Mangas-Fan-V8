FROM php:8.2-fpm

ENV WORKDIR=/var/www/mf
ENV APP_ENV=dev

WORKDIR ${WORKDIR}

ARG UID=1000
ARG GID=1000

RUN groupmod --gid $GID www-data \
    && usermod --uid $UID www-data \
;

RUN apt-get update && apt-get install -y \
    build-essential \
    libbz2-dev \
    libfreetype6-dev \
    libjpeg-dev \
    libpng-dev \
    libwebp-dev \
    libxpm-dev \
    libzip-dev \
    zip \
    curl \
    git

RUN docker-php-ext-install pdo_mysql zip exif pcntl

RUN chown www-data:www-data /var/www/mf
RUN chown -R www-data:www-data /var/www/mf

USER www-data

COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

COPY --chown=www-data:www-data . ${WORKDIR}

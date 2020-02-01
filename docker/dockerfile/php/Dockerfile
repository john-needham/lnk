FROM php:7.4.2-fpm
RUN docker-php-ext-install pdo pdo_mysql exif

RUN apt-get update -y && apt-get install -y libwebp-dev libjpeg62-turbo-dev libpng-dev libxpm-dev \
    libfreetype6-dev \
    libonig-dev

RUN apt-get update -y && apt-get install -y libpng-dev

# RUN docker-php-ext-install gd

# RUN docker-php-ext-configure gd

# RUN docker-php-ext-install gd

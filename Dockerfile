FROM php:7.4.33-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

COPY . /var/www/app
WORKDIR /var/www/app

RUN mv .env.docker .env

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --optimize-autoloader

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo pdo_mysql gd

RUN chown -R www-data:www-data /var/www

RUN php artisan key:generate
RUN php artisan config:cache

RUN php artisan storage:link

EXPOSE 9000

USER www-data

CMD ["php-fpm"]

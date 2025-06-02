FROM php:8.2-fpm
LABEL authors="nar programmer"
#Instalaramos dependencias para que el pryect

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif

# obteniendo composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# estableciendo directorio de trabajo
WORKDIR /var/www

COPY . .

## Cambiar persmisos carpetas necesarias

RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

RUN composer install

CMD ["php-fpm"]

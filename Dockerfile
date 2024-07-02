# Gunakan image PHP-FPM resmi
FROM php:8.1-fpm-bullseye

# Instal dependensi yang diperlukan
RUN apt-get update && apt-get install -y \
    libmemcached-dev \
    zlib1g-dev \
    && pecl install memcached-3.1.5 \
    && docker-php-ext-enable memcached 

# Set working directory
WORKDIR /var/www/html

# Salin file aplikasi ke dalam container
COPY . /var/www/html

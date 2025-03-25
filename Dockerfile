FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    redis-server \
    git \
    curl \
    libpq-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    supervisor \
    build-essential \
    openssl \
    libcurl4-openssl-dev

RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/*
RUN rm -rf /var/cache/apk/*

RUN docker-php-ext-install gd pdo pdo_pgsql sockets exif ftp curl
RUN docker-php-ext-install pcntl
RUN docker-php-ext-configure pcntl --enable-pcntl

# Enable Apache rewrite module
RUN a2enmod rewrite
RUN a2enmod headers
RUN a2enmod proxy_http
RUN a2enmod proxy_wstunnel

# Set the document root to Laravel public folder
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# CORS başlıklarını ekleyelim (Pusher ile sorun yaşanıyorsa gerekli olabilir)
RUN echo "Header set Access-Control-Allow-Origin '*'" >> /etc/apache2/apache2.conf
RUN echo "Header set Access-Control-Allow-Methods 'GET, POST, OPTIONS'" >> /etc/apache2/apache2.conf
RUN echo "Header set Access-Control-Allow-Headers 'Origin, X-Requested-With, Content-Type, Accept, Authorization'" >> /etc/apache2/apache2.conf

#COPY apache_defaul.conf /etc/apache2/sites-available/000-default.conf

# Set the working directory
WORKDIR /var/www/html

COPY . .
COPY .env.production .env

# Get the latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install project dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev

RUN php artisan reverb:install
RUN php artisan optimize

# Set permissions
RUN chown -R www-data:www-data  /var/www/html/public /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 5173
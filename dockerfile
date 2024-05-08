# Use the official PHP image with Alpine Linux
FROM php:8.2-alpine AS php

# Set working directory
WORKDIR /var/www/html

# Install PHP extensions and dependencies
RUN apk --no-cache add \
    git \
    curl \
    libpng \
    libpng-dev \
    libjpeg-turbo \
    libjpeg-turbo-dev \
    libxml2 \
    libxml2-dev \
    libzip \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql bcmath exif pcntl zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy only Composer files for caching
COPY composer.json composer.lock ./

# Install PHP dependencies
RUN composer install --no-scripts --prefer-dist

# Copy Laravel files to container
COPY . .

# Generate optimized autoloader and cache
# RUN composer dump-autoload --optimize && php artisan optimize

# Set permissions (optional, adjust as needed)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage

# Expose port 8000 (default for Laravel's php artisan serve)
EXPOSE 8000

# Start Laravel application using php artisan serve
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

# Use the official PHP image with FPM (FastCGI Process Manager) on Alpine Linux
FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install PHP extensions and dependencies
RUN docker-php-ext-install pdo pdo_mysql bcmath

# Copy Laravel files to container
COPY . .

# Set permissions (optional, adjust as needed)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage

# Expose port 9000 (default for PHP-FPM)
EXPOSE 8000

# Start PHP-FPM server
CMD ["php-fpm"]
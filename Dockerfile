# Use official PHP image with CLI and necessary extensions
FROM php:8.2-cli

# Set working directory
WORKDIR /var/www

# Install system dependencies (for Laravel dependencies)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    git \
    zip \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions (required by Laravel)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Install Composer (PHP dependency manager)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy your application code into the container
COPY . .

# Set correct permissions for Laravel storage and cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Install PHP dependencies using Composer
RUN composer install --no-interaction --prefer-dist

# Expose the port (adjust based on your needs, 8000 is default for Laravel)
EXPOSE 8000

# Command to run Laravel's built-in server (for local development)
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]

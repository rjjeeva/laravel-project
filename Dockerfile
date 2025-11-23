# Use PHP with Apache (works best for Laravel deployments)
FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    nodejs \
    npm

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Install NPM dependencies & build (important for Vite)
RUN npm install && npm run build

# Generate app key
RUN php artisan key:generate

# Cache Laravel config & routes
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]

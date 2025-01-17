# Use the official PHP image as base
FROM php:8.2-fpm

ARG user
ARG uid

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer
 
# Create a non-root user
RUN useradd -G www-data,root -u $uid -d /home/$user $user \
    && mkdir -p /home/$user/.composer \
    && chown -R $user:$user /home/$user


# Set the working directory
WORKDIR /var/www

# Copy the composer files
COPY composer.json composer.lock /var/www/

# Copy the rest of the application code
COPY . /var/www
COPY --chown=${user}:${user} .env.example /var/www/.env

# Install PHP dependencies using Composer
RUN composer install --optimize-autoloader --no-interaction --no-progress
RUN php artisan key:generate

# Set proper permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expose port 9000 and start the PHP-FPM server
EXPOSE 9000
CMD ["php-fpm"]

FROM php:8.2-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install mongodb ext
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

RUN docker-php-ext-install mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instal Yarn
RUN npm install -g yarn

# Set working directory
WORKDIR /var/www
COPY . /var/www

# Install dependencies
RUN composer install --no-interaction
RUN yarn install


# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

USER $user
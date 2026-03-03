FROM php:8.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite3 \
    libsqlite3-dev \
    mariadb-client \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    xml

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /app

# Copy application
COPY . .

# Create required directories
RUN mkdir -p bootstrap/cache storage/framework/sessions storage/framework/views storage/framework/cache storage/logs

# Install dependencies
RUN composer install --no-interaction --prefer-dist

# Set permissions
RUN chown -R www-data:www-data /app && chmod -R 755 /app

# Install Node dependencies if needed
RUN if [ -f package.json ]; then \
    apt-get update && apt-get install -y nodejs npm && \
    npm install && \
    npm run build && \
    rm -rf /var/lib/apt/lists/*; \
    fi

# Run migrations
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000

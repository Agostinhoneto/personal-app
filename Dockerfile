FROM php:8.4-fpm

# 2. Instalar Node.js 20.x (atualizado para resolver o erro EBADENGINE)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm@latest \
    && rm -rf /var/lib/apt/lists/*

# 1. Instalação segura de dependências
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    zlib1g-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# 2. Instalação passo-a-passo das extensões
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install gd

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install exif
RUN docker-php-ext-install pcntl
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install zip
RUN docker-php-ext-install opcache
RUN docker-php-ext-install sockets


# 4. Instalação do Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

RUN usermod -u 1000 www-data

COPY . .

# Criar diretórios necessários e ajustar permissões
RUN mkdir -p storage/framework/cache \
    && mkdir -p storage/framework/sessions \
    && mkdir -p storage/framework/views \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache \
    && chown -R www-data:www-data /var/www/storage \
    && chown -R www-data:www-data /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage \
    && chmod -R 775 /var/www/bootstrap/cache

# Copiar package.json e instalar dependências
COPY package.json vite.config.js ./
RUN npm install

COPY . .

CMD ["php-fpm"]
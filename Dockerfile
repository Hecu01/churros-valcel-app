FROM php:8.4-fpm-alpine

# Instalar el comando nativo de Docker para copiar extensiones oficiales
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

# Instalar dependencias del sistema esenciales
RUN apk add --no-cache nginx wget supervisor zip unzip git openssh bash

# Instalar las extensiones que te pide Laravel
RUN install-php-extensions pdo_mysql pdo_pgsql bcmath zip gd intl opcache redis ctype curl dom fileinfo filter session mbstring xml openssl tokenizer

# Configurar directorio de trabajo
WORKDIR /var/www/html
COPY . .

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalar dependencias de PHP ignorando bloqueos de plataforma
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Permisos para Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

CMD ["sh", "-c", "php artisan migrate --force && php artisan config:cache && php artisan route:cache && nginx -g 'daemon off;'"]

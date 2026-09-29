FROM php:8.4-fpm-alpine

# Instalar dependencias del sistema y herramientas esenciales
RUN apk add --no-cache nginx wget supervisor zip unzip git openssh bash

# Descargar el instalador automático de extensiones de PHP profesional
ADD https://github.com /usr/local/bin/

# Instalar todas las extensiones requeridas nativamente por Laravel
RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions pdo_mysql pdo_pgsql bcmath zip gd intl opcache redis ctype curl dom fileinfo filter session mbstring xml openssl tokenizer

# Configurar directorio de trabajo
WORKDIR /var/www/html
COPY . .

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalar dependencias de PHP ignorando requisitos de plataforma por seguridad en la build de Docker
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Permisos requeridos para Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

CMD ["sh", "-c", "php artisan migrate --force && php artisan config:cache && php artisan route:cache && nginx -g 'daemon off;'"]

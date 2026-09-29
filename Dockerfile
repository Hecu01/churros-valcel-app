FROM php:8.4-fpm-alpine

# Instalar el comando nativo de Docker para copiar extensiones oficiales
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

# Instalar dependencias del sistema esenciales
RUN apk add --no-cache nginx wget supervisor zip unzip git openssh bash

# Instalar las extensiones que te pide Laravel
RUN install-php-extensions pdo_mysql pdo_pgsql bcmath zip gd intl opcache redis ctype curl dom fileinfo filter session mbstring xml openssl tokenizer

# Configurar Nginx para que apunte a la carpeta public de Laravel
RUN mkdir -p /run/nginx && \
    echo "server { \
        listen 80; \
        root /var/www/html/public; \
        index index.php index.html; \
        location / { \
            try_files \$uri \$uri/ /index.php?\$query_string; \
        } \
        location ~ \.php\$ { \
            fastcgi_pass 127.0.0.1:9000; \
            fastcgi_index index.php; \
            include fastcgi_params; \
            fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name; \
        } \
    }" > /etc/nginx/http.d/default.conf

# Configurar directorio de trabajo
WORKDIR /var/www/html
COPY . .

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalar dependencias de PHP
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Permisos para Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Comando para encender PHP-FPM y Nginx juntos
CMD ["sh", "-c", "php-fpm -D && php artisan migrate --force && php artisan config:cache && php artisan route:cache && nginx -g 'daemon off;'"]

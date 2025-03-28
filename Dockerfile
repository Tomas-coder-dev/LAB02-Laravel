# Usa una imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala dependencias necesarias para Laravel
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    curl \
    git \
    && docker-php-ext-install pdo pdo_pgsql

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Habilita mod_rewrite para Laravel
RUN a2enmod rewrite

# Configura Apache para que use la carpeta 'public' como raíz
RUN echo '<VirtualHost *:80>
    DocumentRoot /var/www/html/public
    <Directory /var/www/html/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Copia los archivos de la aplicación
COPY . /var/www/html/

# Establece permisos correctos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Establece el directorio de trabajo en Laravel
WORKDIR /var/www/html

# Instala dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader  

# Ejecuta comandos de optimización de Laravel
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Expone el puerto 80 para Apache
EXPOSE 80

# Comando para iniciar Apache
CMD ["apache2-foreground"]

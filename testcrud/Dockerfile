# Usa una imagen oficial de PHP con Apache
FROM php:8.4-apache

# Instala extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_pgsql

# Configura el directorio de trabajo
WORKDIR /var/www/html

# Copia la configuración de Apache
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

# Copia los archivos de Laravel
COPY . /var/www/html

# Instala Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Da permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Da permisos al directorio 'public'
RUN chmod -R 755 /var/www/html/public

RUN a2ensite 000-default.conf


# Habilita el módulo de Apache rewrite
RUN a2enmod rewrite

# Exponer el puerto
EXPOSE 80

# Comando de inicio
CMD ["apache2-foreground"]


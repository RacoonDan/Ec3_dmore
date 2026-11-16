
FROM php:8.2-apache

# Habilitar únicamente el MPM prefork
RUN a2dismod mpm_event || true \
    && a2dismod mpm_worker || true \
    && a2enmod mpm_prefork

# Instalar la extensión para MySQL
RUN docker-php-ext-install mysqli

# Copiar el proyecto
COPY . /var/www/html/

EXPOSE 80

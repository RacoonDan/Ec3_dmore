
FROM php:8.2-apache

# Desactivar otros MPM y habilitar solamente prefork
RUN a2dismod mpm_event || true; \
    a2dismod mpm_worker || true; \
    a2dismod mpm_prefork || true; \
    a2enmod mpm_prefork

# Instalar conexión MySQL
RUN docker-php-ext-install mysqli

# Copiar archivos del proyecto
COPY . /var/www/html/

# Configurar Apache para el puerto de Railway
CMD ["bash", "-c", "PORT=${PORT:-8080}; sed -i \"s/^Listen 80$/Listen ${PORT}/\" /etc/apache2/ports.conf; sed -i \"s#<VirtualHost \\*:80>#<VirtualHost *:${PORT}>#\" /etc/apache2/sites-enabled/000-default.conf; apache2ctl -t && exec apache2-foreground"]

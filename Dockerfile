
FROM php:8.2-apache

# Eliminar los módulos MPM habilitados
RUN rm -f /etc/apache2/mods-enabled/mpm_event.* \
    /etc/apache2/mods-enabled/mpm_worker.* \
    /etc/apache2/mods-enabled/mpm_prefork.* \
    && a2enmod mpm_prefork \
    && apache2ctl -t

# Instalar soporte para MySQL
RUN docker-php-ext-install mysqli

# Copiar archivos del proyecto
COPY . /var/www/html/

# Configurar el puerto de Railway
CMD ["bash", "-c", "PORT=${PORT:-8080}; sed -i \"s/^Listen .*/Listen ${PORT}/\" /etc/apache2/ports.conf; sed -i \"s#<VirtualHost \\*:80>#<VirtualHost *:${PORT}>#\" /etc/apache2/sites-enabled/000-default.conf; apache2ctl -t && exec apache2-foreground"]


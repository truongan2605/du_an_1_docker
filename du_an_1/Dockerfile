# Dockerfile
FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite

# Sửa lại document root về /var/www/html
RUN echo "DocumentRoot /var/www/src" > /etc/apache2/sites-available/000-default.conf

# Thiết lập quyền
RUN chown -R www-data:www-data /var/www

WORKDIR /var/www/html

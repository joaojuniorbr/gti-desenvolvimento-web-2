FROM php:8.2-apache

RUN a2enmod rewrite

RUN docker-php-ext-install mysqli pdo_mysql

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

WORKDIR /var/www/html

EXPOSE 80

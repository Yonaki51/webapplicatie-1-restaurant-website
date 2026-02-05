FROM php:8.2-apache

# PHP extensies voor MariaDB
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Apache modules
RUN a2enmod rewrite
 
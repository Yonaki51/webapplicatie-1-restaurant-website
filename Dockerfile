# Dockerfile – Bouwt een PHP 8.2 + Apache container voor de Sushi House website.
# Gebruik: docker build -t sushihouse . && docker run -p 80:80 sushihouse

FROM php:8.2-apache

# PHP extensies voor MariaDB / MySQL database-connectiviteit
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Apache mod_rewrite inschakelen (benodigd voor URL-herschrijving)
RUN a2enmod rewrite
 
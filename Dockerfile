FROM php:7.4-apache

RUN chmod 777 /var/www/html/
ADD build /var/www/html/
# COPY . /var/www/html/
RUN docker-php-ext-install mysqli

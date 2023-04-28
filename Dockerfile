FROM php:8.1-apache

RUN docker-php-ext-install mysqli

RUN chown -R www-data:www-data /var/www/html
RUN chmod -R u=rwX,g=rX,o= /var/www/html

COPY ./index.php ./

EXPOSE 80
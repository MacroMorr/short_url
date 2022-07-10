FROM php:7.4-fpm

RUN apt-get update
RUN apt-get install curl
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

VOLUME /var/www/cache-test
WORKDIR /var/www/cache-test

RUN composer install
    # && cp .evn.example .env \
    # && php artisan migrate

CMD ["/bin/bash", "php", "artisan", "serve"]
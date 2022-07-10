FROM php:7.4-fpm

MAINTAINER Marian Radev <macromorr@gmail.com>

ARG APPLICATION_PATH
ARG APP_ENV
ARG NGINX_HOST_HTTP_PORT
ARG MYSQL_USER
ARG MYSQL_PASSWORD
ARG MYSQL_ROOT_PASSWORD
ARG MYSQL_DATABASE
ARG NETWORK_SUBNET
ARG XDEBUG_REMOTE_HOST

ENV APPLICATION_PATH ${APPLICATION_PATH}
ENV APP_ENV ${APP_ENV}
ENV NGINX_HOST_HTTP_PORT ${NGINX_HOST_HTTP_PORT}
ENV DB_USERNAME ${MYSQL_USER}
ENV DB_PASSWORD ${MYSQL_PASSWORD}
ENV DB_ROOT_PASSWORD ${MYSQL_ROOT_PASSWORD}
ENV DB_DATABASE ${MYSQL_DATABASE}
ENV NETWORK_SUBNET ${NETWORK_SUBNET}

# Ставим все необходимые для работы пакеты
RUN apt-get update        \
    && apt-get install -y \
            curl          \
            git           \
            less          \
            vim           \
            libzip-dev    \
            zip

# Устанавливаем php-расширения
RUN docker-php-ext-install -j$(nproc) \
    bcmath                            \
    pdo_mysql                         \
    zip

# Устанавливаем composer
RUN curl -sS https://getcomposer.org/installer                \
    | php -- --install-dir=/usr/local/bin --filename=composer

# Устанавливаем рабочую дирректорию
WORKDIR ${APPLICATION_PATH}

# Entrypoint
COPY ./build/php-fpm/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]

EXPOSE 9000

CMD ["php", "artisan", "serve", "--host", "0.0.0.0", "--port=9000"]

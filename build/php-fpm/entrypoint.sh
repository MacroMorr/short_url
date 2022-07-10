#!/bin/bash

clear
rm -rf ./var/cache/*

RANDOM_STRING=$(cat /dev/urandom | tr -dc 'a-zA-Z0-9' | fold -w 32 | head -n 1)

echo 'Создание и наполнение переменных окружений в проект...'

cp ./.env.example './.env' && chmod 777 './.env'
sed -i "s/^APP_ENV=/APP_ENV=${APP_ENV}/" './.env'
sed -i "s/^APP_KEY=/APP_KEY=${RANDOM_STRING}/" './.env'
sed -i "s/^DB_HOST=/DB_HOST=${NETWORK_SUBNET}.2/" './.env'
sed -i "s/^DB_PORT=/DB_PORT=3306/" './.env'
sed -i "s/^DB_ROOT_PASSWORD=/DB_ROOT_PASSWORD=${DB_ROOT_PASSWORD}/" './.env'
sed -i "s/^DB_DATABASE=/DB_DATABASE=${DB_DATABASE}/" './.env'
sed -i "s/^DB_USERNAME=/DB_USERNAME=${DB_USERNAME}/" './.env'
sed -i "s/^DB_PASSWORD=/DB_PASSWORD=${DB_PASSWORD}/" './.env'
sed -i "s/^NGINX_HOST_HTTP_PORT=/NGINX_HOST_HTTP_PORT=${NGINX_HOST_HTTP_PORT}/" './.env'
source ./.env

echo 'Подтягиваем composer зависимости...'
composer install -n

echo 'Ждем поднятия контейнера с mysql... (200sec)';
sleep 200 # TODO: use healthcheck in future

echo 'Запускаем миграции...';
./artisan migrate

echo 'Запускаем php artisan serve...'
exec "$@"

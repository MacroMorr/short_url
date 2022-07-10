FROM mysql:8

MAINTAINER Marian Radev <macromorr@gmail.com>

ARG APPLICATION_PATH
ARG MYSQL_USER
ARG MYSQL_PASSWORD
ARG MYSQL_ROOT_PASSWORD
ARG MYSQL_DATABASE

ENV APPLICATION_PATH ${APPLICATION_PATH}
ENV MYSQL_USER ${MYSQL_USER}
ENV MYSQL_PASSWORD ${MYSQL_PASSWORD}
ENV MYSQL_ROOT_PASSWORD ${MYSQL_ROOT_PASSWORD}
ENV MYSQL_DATABASE ${MYSQL_DATABASE}

# Устанавливаем нативную аутентификацию для пользователя
RUN QUERY="ALTER USER '${MYSQL_USER}'@'%' IDENTIFIED WITH mysql_native_password BY '${MYSQL_PASSWORD}';" \
    && QUERY="${QUERY}FLUSH PRIVILEGES;"                                                                 \
    && echo "${QUERY}" > /docker-entrypoint-initdb.d/user_change_password_plugin.sql

# Копируем mysql-конфигурацию внутрь контейнера
COPY ./build/mysql/conf.d/mysql.cnf /etc/mysql/conf.d/mysql.cnf

# Устанавливаем рабочую дирректорию
WORKDIR /etc/mysql

EXPOSE 3306

CMD ["mysqld"]

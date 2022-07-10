## Laravel - сокращатель ссылок

### Технлогии:

- PHP 7.4
- Laravel 9
- MySql 8 
- Bootstrap 5.2

### Установка:

1. `git clone https://github.com/MacroMorr/short_url.git`
2. `cd short_url`
3. Run `docker-compose up -d --build`

_Так же есть возможность установки env переменных перед сборкой:_
`SHORT_URL_MYSQL_USER=new-user SHORT_URL_MYSQL_PASSWORD=new-password docker-compose up -d --build`

### Список доступных переменных:
 - SHORT_URL_MYSQL_USER=short-url
 - SHORT_URL_MYSQL_PASSWORD=short-url-password
 - SHORT_URL_MYSQL_ROOT_PASSWORD=root-password
 - SHORT_URL_MYSQL_DATABASE=short-url
 - SHORT_URL_MYSQL_HOST_PORT=33060
 - SHORT_URL_NETWORK_SUBNET=192.168.222

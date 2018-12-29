### Настройка .env docker
```
cp .env.example .env
```

### Запуск и остановка контейнеров
```
cd docker
$ sudo docker-compose up -d nginx postgres
$ sudo docker-compose stop
```

### Подключение к контейнерам
Подключение к bash в контейнере рабочей области под под хост пользователем 
```
$ sudo docker-compose exec --user=laradock workspace bash
```

### Настройка laravel
Выполните следущие действия
```
sudo chmod 777 storage -R
composer update
cp .env.example .env
php artisan key:generate
```
В файле .env укажите настройки хостов соответствующие названиям контейнеров
```
DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT=5432
```

Настройка базы данных в laravel
```
DB_DATABASE=activesys
DB_USERNAME=activesys_user
DB_PASSWORD=secret
```

### Инициализация проекта

Запуск миграций и сидов
```
php artisan migrate --seed
```

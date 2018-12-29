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

### Endpoints

##### [GET] /api/expense - Возможность выбора периода для получения данных по расходу за выбранной период с разбивкой по категориям 
```
{
	"from": "2018-12-26 00:00:00",
	"to": "2018-12-30 00:00:00",
	"category_id": 1
}
```

---

##### [POST] /api/expense - Добавление статьи расхода 
```
{
	"category_id": 1,
	"description": "test desc",
	"sum": 111
}
```

---

##### [PATCH] /api/expense/{id} - Редактирование статьи расхода 
```
{
	"category_id": 1,
	"description": "test desc",
	"sum": 111
}
```

---

##### [DELETE] /api/expense/{id} - Удаление статьи расхода 

---

##### [GET] /api/category/{id} - Выбор категории расхода из справочника категорий 


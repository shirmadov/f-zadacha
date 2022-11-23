
## Задание


Разработать REST API для записной книжки . Примерная структура методов:


    1.1. GET /api/v1/notebook/
    1.2. POST /api/v1/notebook/
    1.3. GET /api/v1/notebook/<id>/
    1.4. POST /api/v1/notebook/<id>/
    1.5. DELETE /api/v1/notebook/<id>/


Поля для POST запискной книжки:


    1. ФИО (обязательное)
    2. Компания
    3. Телефон (обязательное)
    4. Email (обязательное)
    5. Дата рождения 
    6. Фото


Отображения методов api (https://swagger.io/)

    php artisan scribe:generate
    http://127.0.0.1:8000/docs

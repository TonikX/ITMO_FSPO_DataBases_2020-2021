# Таблица клиент

## Содержание таблицы

|Имя|Тип|Первичный ключ|Внешний ключ|Уникальность|Ограничение целостности|
|---|---|--------------|------------|------------|-----------------------|
|id |integer|+||+||
|name|varchar(25)||||not null|
|last_name|varchar(25)|||||
|phone|varchar(25)||||not null|
|email|varchar(25)||||not null|

## Код создания таблицы
```sql
CREATE TABLE "Client" (
"id" SERIAL PRIMARY KEY,
"name" varchar(25) not null,
"last_name" varchar(25),
"phone" varchar(25) not null,
"email" varchar(25) not null 
);
```

## Пример заполнения таблицы
```sql
insert into "Client"
("name", "last_name", "phone", "email")
values
('Fedor', 'Bobrov', '+79453456576', 'bobrov@mail.ru');
```

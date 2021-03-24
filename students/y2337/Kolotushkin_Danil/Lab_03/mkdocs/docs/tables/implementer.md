# Таблица исполнитель

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
CREATE TABLE "Implementer" (
"id" SERIAL PRIMARY KEY,
"name" varchar(25) not null,
"last_name" varchar(25),
"phone" varchar(25) not null,
"email" varchar(25) not null
);
```
## Пример добавления данных
```sql
insert into "Implementer"
("name", "last_name", "phone", "email")
values
('Voland', 'S', '+78884563446', 'voland@satan@hell.god');
```

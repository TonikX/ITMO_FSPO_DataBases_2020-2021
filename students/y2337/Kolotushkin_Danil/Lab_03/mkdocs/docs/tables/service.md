# Таблица услуги

## Содержание таблицы

|Имя|Тип|Первичный ключ|Внешний ключ|Уникальность|Ограничение целостности|
|---|---|--------------|------------|------------|-----------------------|
|id|integer|+||+||
|name|varchar(25)||||not null|
|description|varchar(45)||||not null|
|cost|integer||||not null|

## Код создания таблицы

```sql
CREATE TABLE "Service" (
"id" SERIAL PRIMARY KEY,
"name" varchar(25) not null,
"description" varchar(45) not null,
"cost" integer not null
);
```

## Пример добавления данных
```sql
insert into "Service"
("name", "description", "cost")
values
("banner", "just a banner", 60);
```

# Таблица материал

## Содержание таблицы

|Имя|Тип|Первичный ключ|Внешний ключ|Уникальность|Ограничение целостности|
|---|---|--------------|------------|------------|-----------------------|
|id|integer|+||+||
|name|varchar(25)||||not null|
|description|varchar(45)||||not null|
|cost|integer||||not null|

## Код создания таблицы

```sql
CREATE TABLE "Material" (
"id" SERIAL PRIMARY KEY,
"name" varchar(25) not null,
"description" varchar(45) not null,
"cost" integer
);
```

## Пример добавления данных
```sql
insert into "Material"
("name", "description", "cost")
values
('paper', 'just a paper', 50);
```

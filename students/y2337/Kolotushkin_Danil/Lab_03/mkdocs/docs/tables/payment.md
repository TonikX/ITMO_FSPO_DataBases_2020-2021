# Таблица оплата

## Содержание таблицы

|Имя|Тип|Первичный ключ|Внешний ключ|Уникальность|Ограничение целостности|
|---|---|--------------|------------|------------|-----------------------|
|id|integer|+||+||
|requisites|varchar(19)||||not null|
|status|boolean||||not null|
|paydate|date||||not null|

## Код создания таблицы

```sql
CREATE TABLE "PaymentOrder" (
"id" SERIAL PRIMARY KEY,
"requisites" varchar(19) not null,
"status" boolean not null,
"paydate" date not null
);
```

## Пример добавления данных
```sql
insert into "PaymentOrder"
("requisites", "status", "paydate")
values
('1234 5343 5464 1312', true, '2010-10-10');
```

# Таблица заказ

## Содержание таблицы

|Имя|Тип|Первичный ключ|Внешний ключ|Уникальность|Ограничение целостности|
|---|---|--------------|------------|------------|-----------------------|
|id|integer|+||+||
|client_id|integer|client.id|||not null|
|payment_id|integer|payment.id|||not null|
|time_id|integer|timelimit.id|||not null|

```sql
CREATE TABLE "Order" (
"id" SERIAL PRIMARY KEY,
"client_id" int references "Client"("id"),
"payment_id" int references "PaymentOrder"("id"),
"time_id" int references "TimeLimit"("id")
);
```

## Пример добавления данных
```sql
insert into "Order"
("client_id", "payment_id", "time_id")
values
(1, 2, 3);
```

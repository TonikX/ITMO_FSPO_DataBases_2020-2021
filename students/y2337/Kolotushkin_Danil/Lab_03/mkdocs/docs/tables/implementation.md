# Таблица исполнение

## Содержание таблицы

|Имя|Тип|Первичный ключ|Внешний ключ|Уникальность|Ограничение целостности|
|---|---|--------------|------------|------------|-----------------------|
|id|integer|+||+||
|service_id|integer||service.id||not null|
|order_id|integer||order.id||not null|

## Код создания таблицы

```sql
CREATE TABLE "Implementation" (
"id" SERIAL PRIMARY KEY,
"order_id" int references "Order"("id"),
"implementer_id" int references "Implementer"("id"),
"status" boolean
);
```
## Пример добавления данных
```sql
insert into "Implementation"
("order_id", "implementer_id", "status")
values
(1, 1, true);
```

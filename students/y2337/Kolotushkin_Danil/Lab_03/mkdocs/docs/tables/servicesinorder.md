# Таблица услуги в заказе

## Содержание таблицы

|Имя|Тип|Первичный ключ|Внешний ключ|Уникальность|Ограничение целостности|
|---|---|--------------|------------|------------|-----------------------|
|id|integer|+||+||
|service_id|integer||service.id||not null|
|order_id|integer||order.id||not null|

## Код создания таблицы

```sql
CREATE TABLE "ServicesInOrder" (
"id" SERIAL PRIMARY KEY,
"service_id" int references "Service"("id"),
"order_id" int references "Material"("id")
);
```

## Пример добавления данных
```sql
insert into "ServicesinOrder"
("service_id", "order_id")
values
(1, 2);
```

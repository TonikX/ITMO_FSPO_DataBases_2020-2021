# Таблица материалы в услуге

## Содержание таблицы

|Имя|Тип|Первичный ключ|Внешний ключ|Уникальность|Ограничение целостности|
|---|---|--------------|------------|------------|-----------------------|
|id|integer|+||+||
|material_id|integer||material.id||not null|
|service_id|integer||service.id||not null|

## Код создания таблицы

```sql
CREATE TABLE "materialsInService" (
"id" SERIAL PRIMARY KEY,
"material_id" int references "Material"("id"),
"service_id" int references "Service"("id")
);
```

## Пример добавления данных
```sql
insert into "materialsInService"
("material_id", "service_id")
values
(1, 1);
```

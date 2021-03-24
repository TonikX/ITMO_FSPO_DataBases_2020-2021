# Таблица временные лимиты

## Содержание таблицы

|Имя|Тип|Первичный ключ|Внешний ключ|Уникальность|Ограничение целостности|
|---|---|--------------|------------|------------|-----------------------|
|id|integer|+||+||
|admission|date||||not null|
|completion|date||||not null|
|payment|date||||not null|

## Код создания таблицы

```sql
CREATE TABLE "TimeLimit" (
"id" SERIAL PRIMARY KEY,
"admission" date not null,
"completion" date not null,
"payment" date not null
);
```

## Пример добавления данных
```sql
insert into "TimeLimit"
("admission", "completion", "payment")
values
('2004-04-02', '2004-04-09','2004-04-07');
```

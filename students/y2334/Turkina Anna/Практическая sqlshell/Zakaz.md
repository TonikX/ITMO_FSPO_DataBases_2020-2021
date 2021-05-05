# Zakaz - заказ

## Table

| Name                     | Data type     | Not NULL? | Primary key? |
|:------------------------ |:--------------|:----------|:-------------|
| `id_zakaz`               | `integer`     | `YES`     | `YES`        |
| `zakazchik`              | `text`        | `NO`      | `NO`         |
| `book`                   | `text`        | `NO`      | `NO`         |
| `name_book`              | `text`        | `NO`      | `NO`         |

## Create table

```
CREATE TABLE public.zakaz
(
    id_zakaz integer NOT NULL,
    zakazchik text COLLATE pg_catalog."default",
    book text COLLATE pg_catalog."default",
    name_book text COLLATE pg_catalog."default",
    CONSTRAINT zakaz_pkey PRIMARY KEY (id_zakaz)
);
```



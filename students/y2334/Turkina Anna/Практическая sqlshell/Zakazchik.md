# Zakazchik - заказчик

## Table

| Name                     | Data type     | Not NULL? | Primary key? |
|:------------------------ |:--------------|:----------|:-------------|
| `id_zakazchik`           | `integer`     | `YES`     | `YES`        |
| `name_zakazchik`         | `text`        | `NO`      | `NO`         |
| `zakazi`                 | `text`        | `NO`      | `NO`         |

## Create table

```
CREATE TABLE public.zakazchik
(
    id_zakazchik integer NOT NULL,
    name_zakazchik text COLLATE pg_catalog."default",
    zakazi text COLLATE pg_catalog."default",
    CONSTRAINT zakazchik_pkey PRIMARY KEY (id_zakazchik)
);
```



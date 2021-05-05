# Book - книга


## Table

| Name                     | Data type     | Not NULL? | Primary key? |
|:------------------------ |:--------------|:----------|:-------------|
| `id_book`                | `integer`     | `YES`     | `YES`        |
| `name_book`              | `text`        | `NO`      | `NO`         |
| `authors`                | `text`        | `NO`      | `NO`         |
| `zakazchik`              | `text`        | `NO`      | `NO`         |


## Create table

```
CREATE TABLE public.book
(
    id_book integer NOT NULL,
    name_book text COLLATE pg_catalog."default",
    authors text COLLATE pg_catalog."default",
    zakazchik text COLLATE pg_catalog."default",
    CONSTRAINT book_pkey PRIMARY KEY (id_book)
);
```



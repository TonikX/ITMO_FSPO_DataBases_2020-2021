# Pravka - редакторская правка


## Table

| Name            | Data type     | Not NULL? | Primary key? |
|:--------------- |:--------------|:----------|:-------------|
| `id_pravka`     | `integer`     | `YES`     | `YES`        |
| `id_redactor`   | `integer`     | `NO`      | `NO`         |
| `id_zakaz`      | `integer`     | `NO`      | `NO`         |
| `id_book`       | `integer`     | `NO`      | `NO`         |
| `text_pravki`   | `text`        | `NO`      | `NO`         |


## Create table

```
CREATE TABLE public.pravka
(
    id_pravka integer NOT NULL,
    id_redactor integer,
    id_zakaz integer,
    id_book integer,
    text_pravki text COLLATE pg_catalog."default",
    CONSTRAINT pravka_pkey PRIMARY KEY (id_pravka)
);
```
## Insert

```
1. insert into pravka values(1, 1, 1, 1, 'uhdaufhfud uaufua');

2. insert into pravka values(2, 2, 2, 2, 'uhdaufhfud uaufua');

3. insert into pravka values(3, 3, 3, 3, 'uhdaufhfud uaufua');
```
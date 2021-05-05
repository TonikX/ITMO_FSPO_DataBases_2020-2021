# Avtor - автор


## Table

| Name            | Data type     | Not NULL? | Primary key? |
|:--------------- |:--------------|:----------|:-------------|
| `id_avtor`      | `integer`     | `YES`     | `YES`        |
| `name_avtor`    | `text`        | `NO`      | `NO`         |
| `book`          | `text`        | `NO`      | `NO`         |


## Create table

```
CCREATE TABLE public.avtor
(
    id_avtor integer NOT NULL,
    name_avtor text COLLATE pg_catalog."default",
    books text COLLATE pg_catalog."default",
    CONSTRAINT avtor_pkey PRIMARY KEY (id_avtor)
);
```



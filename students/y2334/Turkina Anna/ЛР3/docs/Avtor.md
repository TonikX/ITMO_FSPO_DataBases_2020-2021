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
## Insert

```
1. insert into avtor values(1, 'Popov Ivan', 'miss, look book, mb i know you');

2. insert into avtor values(2, 'Mr Dog', 'my book');

3. insert into avtor values(3, 'Mr Black', 'Black or pink');
```


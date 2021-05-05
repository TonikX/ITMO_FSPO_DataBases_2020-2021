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

## Insert

```
1. insert into book values(1, 'miss', 'Popov Ivan', 'Maria Violetin');

2. insert into book values(2, 'miss mamamia', 'Mr Black and Mr Dog', 'Alex Frintih');

3. insert into book values(3, 'miss mamamia 2', 'Mr Black and Mr Dog', 'Alex Frintih');
```

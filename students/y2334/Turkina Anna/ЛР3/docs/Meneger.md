# Meneger - менеджер


## Table

| Name            | Data type     | Not NULL? | Primary key? |
|:--------------- |:--------------|:----------|:-------------|
| `id_meneger`    | `integer`     | `YES`     | `YES`        |
| `name_meneger`  | `text`        | `NO`      | `NO`         |

## Create table

```
CREATE TABLE public.meneger
(
    id_meneger integer NOT NULL,
    name_manager text COLLATE pg_catalog."default",
    CONSTRAINT meneger_pkey PRIMARY KEY (id_meneger)
);
```
## Insert

```
1. insert into meneger values(1, 'kamila linina');

2. insert into meneger values(2, 'Nikita Andreev');

3. insert into meneger values(3, 'Samil Jandercher');
```
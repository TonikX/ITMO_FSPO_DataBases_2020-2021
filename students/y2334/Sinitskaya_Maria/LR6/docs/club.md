# Club - клуб

## Table

| Name            | Data type     | Not NULL? | Primary key? |
|:--------------- |:--------------|:----------|:-------------|
| `id`    | `integer`     | `YES`     | `YES`        |
| `name`    | `varchar(40)`     | `NO`     | `NO`        |
| `city`    | `varchar(40)`     | `NO`     | `NO`        |
| `email`    | `varchar(100)`     | `NO`     | `NO`        |
| `phone`    | `varchar(12)`     | `NO`     | `NO`        |
| `holder_contacts`    | `varchar(150)`     | `NO`     | `NO`        |
| `country_id`    | `integer`     | `NO`     | `NO`        |

## Constraints

**Primary key** : `id integer PRIMARY KEY`

**Foreign key** : `country_id integer REFERENCES country(id)`

## Create table

```
CREATE TABLE public.club (
    id integer NOT NULL,
    name character varying(40) NOT NULL,
    city character varying(40) NOT NULL,
    email character varying(100) NOT NULL,
    phone character varying(12) NOT NULL,
    holder_contacts character varying(150) NOT NULL,
    country_id integer
);
```

## Commands

```
INSERT INTO club VALUES (1, Yalta, Moscow, loghorrean74@gmail.com, 89213043881, Fedorov Ilya Igorevich, 1), (2, Pendos, New-York, azaza@mail.ru, 89213817417, Sinitskaya Maria Valeryevna, 2), (3, Ponaduser, Kiiv, simp@gmail.com, 89000000000, Alabushed Dmitriy Bezotchestva, 3);
```
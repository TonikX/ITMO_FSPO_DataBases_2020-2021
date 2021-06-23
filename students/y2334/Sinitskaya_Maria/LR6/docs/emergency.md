# Emergency - внештатная ситуация

## Table

| Name            | Data type     | Not NULL? | Primary key? |
|:--------------- |:--------------|:----------|:-------------|
| `id`    | `integer`     | `YES`     | `YES`        |
| `ascending_id`    | `integer`     | `NO`     | `NO`        |
| `alpinist_id`    | `integer`     | `NO`     | `NO`        |
| `explanaition`    | `varchar(255)`     | `NO`     | `NO`        |

## Constraints

**Primary key** : `id integer PRIMARY KEY`

**Foreign key** : `ascending_id integer REFERENCES ascending(id), alpinist_id integer REFERENCES alpinist(id)`

## Create table

```
CREATE TABLE public.emergency (
    id integer NOT NULL,
    ascending_id integer,
    alpinist_id integer,
    explanaition character varying(255) NOT NULL
);
```

## Commands

```
INSERT INTO emergency VALUES (1, 1, 1, Ok), (2, 2, 2, Ok), (3, 3, 3, Injure);
```
# Country - страна

## Table

| Name            | Data type     | Not NULL? | Primary key? |
|:--------------- |:--------------|:----------|:-------------|
| `id`    | `integer`     | `YES`     | `YES`        |
| `name`    | `varchar(40)`     | `NO`     | `NO`        |

## Constraints

**Primary key** : `id integer PRIMARY KEY`

## Create table

```
CREATE TABLE public.country (
    id integer NOT NULL,
    name character varying(40) NOT NULL
);
```

## Commands

```
INSERT INTO country VALUES (1, Russia), (2, USA), (3, Ukraine);
```
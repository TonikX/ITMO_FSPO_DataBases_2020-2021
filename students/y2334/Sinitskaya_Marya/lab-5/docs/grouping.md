# Grouping Ascending - группа альпинистов

## Table

| Name            | Data type     | Not NULL? | Primary key? |
|:--------------- |:--------------|:----------|:-------------|
| `id`    | `integer`     | `YES`     | `YES`        |
| `name`    | `varchar(40)`     | `NO`     | `NO`        |
| `created_at`    | `date`     | `NO`     | `NO`        |

## Constraints

**Primary key** : `id integer PRIMARY KEY`

## Create table

```
CREATE TABLE public."grouping" (
    id integer NOT NULL,
    name character varying(40) NOT NULL,
    created_at date NOT NULL
);
```

## Commands

```
INSERT INTO finished_ascending VALUES (1, Group 1, 2021-05-27), (2, Group 2, 2021-05-27), (3, Group 3, 2021-05-27);
```
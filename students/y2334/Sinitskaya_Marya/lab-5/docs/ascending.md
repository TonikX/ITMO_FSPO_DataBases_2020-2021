# Ascending - восхождение

## Table

| Name            | Data type     | Not NULL? | Primary key? |
|:--------------- |:--------------|:----------|:-------------|
| `id`    | `integer`     | `YES`     | `YES`        |
| `start`    | `timestamp`     | `NO`     | `NO`        |
| `ending`    | `timestamp`     | `NO`     | `NO`        |
| `grouping_id`    | `integer`     | `NO`     | `NO`        |

## Constraints

**Primary key** : `id integer PRIMARY KEY`

**Foreign key** : `grouping_id integer REFERENCES grouping(id)`

## Create table

```
CREATE TABLE public.ascending (
    id integer NOT NULL,
    start timestamp without time zone NOT NULL,
    ending timestamp without time zone NOT NULL,
    grouping_id integer
);
```

## Commands

```
INSERT INTO ascending VALUES (1, 2021-05-27 23:36:42.489515, 2021-05-27 23:36:42.489515, 1), (2, 2021-05-27 23:36:45.177962, 2021-05-27 23:36:45.177962, 2), (3, 2021-05-27 23:36:47.523538, 2021-05-27 23:36:47.523538, 3);
```
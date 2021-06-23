# Finished Ascending - завершенное восхождение

## Table

| Name            | Data type     | Not NULL? | Primary key? |
|:--------------- |:--------------|:----------|:-------------|
| `id`    | `integer`     | `YES`     | `YES`        |
| `ascending_id`    | `integer`     | `NO`     | `NO`        |
| `status`    | `varchar(255)`     | `NO`     | `NO`        |

## Constraints

**Primary key** : `id integer PRIMARY KEY`

**Foreign key** : `ascending_id integer REFERENCES ascending(id)`

## Create table

```
CREATE TABLE public.finished_ascending (
    id integer NOT NULL,
    ascending_id integer,
    status character varying(255) NOT NULL,
    CONSTRAINT fk_ascending FOREIGN KEY(ascending_id) REFERENCES ascending(id)
);
```

## Commands

```
INSERT INTO finished_ascending VALUES (1, 1, Finished), (2, 2, Finished), (3, 3, Finished);
```
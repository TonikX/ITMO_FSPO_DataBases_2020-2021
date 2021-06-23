# Waypoint - точка восхождения

## Table

| Name            | Data type     | Not NULL? | Primary key? |
|:--------------- |:--------------|:----------|:-------------|
| `id`    | `integer`     | `YES`     | `YES`        |
| `name`    | `varchar(40)`     | `NO`     | `NO`        |
| `description`    | `varchar(255)`     | `NO`     | `NO`        |
| `mountain_id`    | `integer`     | `NO`     | `NO`        |

## Constraints

**Primary key** : `id integer PRIMARY KEY`

**Foreign key** : `mountain_id integer REFERENCES mountain(id)`

## Create table

```
CREATE TABLE public.waypoint (
    id integer NOT NULL,
    name character varying(40) NOT NULL,
    description character varying(255) NOT NULL,
    mountain_id integer,
    CONSTRAINT fk_mountain FOREIGN KEY(mountain_id) REFERENCES mountain(id)
);
```

## Commands

```
INSERT INTO finished_ascending VALUES (1, Name 1, Description 1, 1), (2, Name 2, Description 2, 2), (3, Name 3, Description 3, 3);
```
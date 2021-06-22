# Ascending Route - маршрут восхождения

## Table

| Name            | Data type     | Not NULL? | Primary key? |
|:--------------- |:--------------|:----------|:-------------|
| `id`    | `integer`     | `YES`     | `YES`        |
| `waypoint_id`    | `timestamp`     | `NO`     | `NO`        |
| `ascending_id`    | `timestamp`     | `NO`     | `NO`        |

## Constraints

**Primary key** : `id integer PRIMARY KEY`

**Foreign key** : `waypoint_id integer REFERENCES waypoint(id), ascending_id integer REFERENCES ascending(id)`

## Create table

```
CREATE TABLE public.ascending_route (
    id integer NOT NULL,
    waypoint_id integer,
    ascending_id integer
);
```

## Commands

```
INSERT INTO ascending_route VALUES (4, 1, 1), (5, 2, 2), (6, 3, 3);
```
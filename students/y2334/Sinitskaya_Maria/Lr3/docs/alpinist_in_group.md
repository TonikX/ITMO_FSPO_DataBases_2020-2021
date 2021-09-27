# Alpinist In Group - альпинист в группе

## Table

| Name            | Data type     | Not NULL? | Primary key? |
|:--------------- |:--------------|:----------|:-------------|
| `id`    | `integer`     | `YES`     | `YES`        |
| `alpinist_id`    | `integer`     | `NO`     | `NO`        |
| `grouping_id`    | `integer`     | `NO`     | `NO`        |

## Constraints

**Primary key** : `id integer PRIMARY KEY`

**Foreign key** : `alpinist_id integer REFERENCES alpinist (id), grouping_id integer REFERENCES grouping(id)`

## Create table

```
CREATE TABLE public.alpinist_in_group (
    id integer NOT NULL,
    alpinist_id integer,
    grouping_id integer
);
```

## Commands

```
INSERT INTO alpinist_in_group VALUES (1, 1, 1), (2, 2, 2), (3, 3, 3);
```
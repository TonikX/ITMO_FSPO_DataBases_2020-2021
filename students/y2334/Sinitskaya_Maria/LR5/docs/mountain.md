# Mountain - гора

## Table

| Name            | Data type     | Not NULL? | Primary key? |
|:--------------- |:--------------|:----------|:-------------|
| `id`    | `integer`     | `YES`     | `YES`        |
| `name`    | `varchar(40)`     | `NO`     | `NO`        |
| `height`    | `integer`     | `NO`     | `NO`        |
| `district_id`    | `integer`     | `NO`     | `NO`        |

## Constraints

**Primary key** : `id integer PRIMARY KEY`

**Foreign key** : `district_id integer REFERENCES district(id)`

## Create table

```
CREATE TABLE public.mountain (
    id integer NOT NULL,
    name character varying(40) NOT NULL,
    height integer NOT NULL,
    district_id integer,
    CONSTRAINT fk_district FOREIGN KEY(district_id) REFERENCES district(id)
);
```

## Commands

```
INSERT INTO finished_ascending VALUES (1, Ural, 100, 1), (2, Rashmor, 200, 2), (3, Holmik, 10000, 3);
```
# District - район

## Table

| Name            | Data type     | Not NULL? | Primary key? |
|:--------------- |:--------------|:----------|:-------------|
| `id`    | `integer`     | `YES`     | `YES`        |
| `name`    | `varchar(40)`     | `NO`     | `NO`        |
| `country_id`    | `integer`     | `NO`     | `NO`        |

## Constraints

**Primary key** : `id integer PRIMARY KEY`

**Foreign key** : `country_id integer REFERENCES dcountry(id)`

## Create table

```
CREATE TABLE public.district (
    id integer NOT NULL,
    name character varying(40) NOT NULL,
    country_id integer,
    CONSTRAINT fk_country FOREIGN KEY(country_id) REFERENCES country(id)
);
```

## Commands

```
INSERT INTO district VALUES (1, Frunzenskiy, 1), (2, LA, 2), (3, Vinnitsa, 3);
```
# Alpinist - альпинист

## Table

| Name            | Data type     | Not NULL? | Primary key? |
|:--------------- |:--------------|:----------|:-------------|
| `id`    | `integer`     | `YES`     | `YES`        |
| `name` | `varchar(40)`     | `NO`      | `NO`         |
| `surname` | `varchar(40)`     | `NO`      | `NO`         |
| `age` | `integer`     | `NO`      | `NO`         |
| `experience` | `integer`     | `NO`      | `NO`         |
| `address` | `varchar(40)`     | `NO`      | `NO`         |
| `club_id` | `integer`     | `NO`      | `NO`         |

## Constraints

**Primary key** : `id integer PRIMARY KEY`

**Foreign key** : `club_id integer REFERENCES club (id)`

## Create table

```
CREATE TABLE public.alpinist (
    id integer NOT NULL,
    name character varying(40) NOT NULL,
    surname character varying(40) NOT NULL,
    age integer NOT NULL,
    experience integer NOT NULL,
    address character varying(150) NOT NULL,
    club_id integer,
    CONSTRAINT fk_club FOREIGN KEY(club_id) REFERENCES club(id)
);
```

## Commands

```
INSERT INTO alpinist VALUES (1, German, Ishakov	10, 1, Nikolskoe, 1), (2, Alina, Antipova, 20, 5, Petroga, 2), (3, Kirill, Vyaznikov, 15, 2, Odessa, 3);
```
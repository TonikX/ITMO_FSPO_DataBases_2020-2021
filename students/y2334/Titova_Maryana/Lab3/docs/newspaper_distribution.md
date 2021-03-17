# Newspaper distribution - распределение газет


## Table

| Name                         | Data type                 | Not NULL? | Primary key? |
|:---------------------------- |:--------------------------|:----------|:-------------|
| `id_newspaper_distribution`  | `integer`                 | `YES`     | `YES`        |
| `number_of_copies`           | `integer`                 | `NO`      | `NO`         |
| `cost_release`               | `double precision`        | `NO`      | `NO`         |
| `id_printing_office_fk`      | `integer`                 | `NO`      | `NO`         |
| `id_post_office_fk`          | `integer`                 | `NO`      | `NO`         |


## Constraints


**Primary key** : `ID_newspaper_distribution integer PRIMARY KEY`

**Foreign key** : `ID_printing_office_FK integer REFERENCES printing_office (ID_printing_office)`

**Foreign key** : `ID_post_office_FK integer REFERENCES post_office (ID_post_office)`


## Create table

```
CREATE TABLE newspaper_distribution (
	ID_newspaper_distribution integer PRIMARY KEY,
	number_of_copies integer,
	cost_release float,
	ID_printing_office_FK integer REFERENCES printing_office (ID_printing_office),
	ID_post_office_FK integer REFERENCES post_office (ID_post_office)
);
```

## Commands

```
INSERT INTO newspaper_distribution VALUES (1, 100000, 150, 1, 2), (2, 400000, 100, 2, 2);
```



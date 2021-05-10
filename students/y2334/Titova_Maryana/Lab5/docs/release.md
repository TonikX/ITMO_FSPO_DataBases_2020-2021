# Release - выпуск


## Table

| Name                        | Data type              | Not NULL? | Primary key? |
|:--------------------------- |:-----------------------|:----------|:-------------|
| `id_release`                | `integer`              | `YES`     | `YES`        |
| `date_of_issue_release`     | `date`                 | `YES`     | `NO`         |
| `publication_index_release` | `integer`              | `NO`      | `NO`         |
| `cost_copy`                 | `double precision`     | `NO`      | `NO`         |
| `id_printing_office_fk`     | `integer`              | `NO`      | `NO`         |
| `id_newspaper_fk`           | `integer`              | `NO`      | `NO`         |



## Constraints


**Primary key** : `ID_release integer PRIMARY KEY`

**Foreign key** : `ID_printing_office_FK integer REFERENCES printing_office (ID_printing_office)`

**Foreign key** : `ID_newspaper_FK integer REFERENCES newspaper (ID_newspaper)`


## Create table

```
CREATE TABLE release (
	ID_release integer PRIMARY KEY,
	date_of_issue_release date,
	publication_index_release integer,
	cost_copy float,
	ID_printing_office_FK integer REFERENCES printing_office (ID_printing_office),
	ID_newspaper_FK integer REFERENCES newspaper (ID_newspaper)
); 
```

## Commands

```
INSERT INTO release VALUES (1, '2020-01-01', 2435, 100, 2, 2), (2, '2020-05-01', 24635, 120, 1, 1);
```





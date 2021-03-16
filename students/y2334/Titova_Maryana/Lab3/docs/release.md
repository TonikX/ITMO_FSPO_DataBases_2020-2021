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




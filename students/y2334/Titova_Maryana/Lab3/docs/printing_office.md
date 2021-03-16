# Printing office - типография

## Table

| Name                         | Data type                 | Not NULL? | Primary key? |
|:---------------------------- |:--------------------------|:----------|:-------------|
| `id_printing_office`         | `integer`                 | `YES`     | `YES`        |
| `name_printing_office`       | `text`                    | `YES`     | `NO`         |
| `address_printing_office`    | `text`                    | `NO`      | `NO`         |
| `count`                      | `integer`                 | `NO`      | `NO`         |
| `schedule_printing_office`   | `text`                    | `NO`      | `NO`         |
| `id_newspaper_fk`            | `integer`                 | `NO`      | `NO`         |


## Constraints


**Primary key** : `ID_printing_office integer PRIMARY KEY`

**Foreign key** : `ID_newspaper_FK integer REFERENCES newspaper (ID_newspaper)`




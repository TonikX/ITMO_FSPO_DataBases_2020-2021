# Newspaper - газета


## Table

| Name                         | Data type                 | Not NULL? | Primary key? |
|:---------------------------- |:--------------------------|:----------|:-------------|
| `id_newspaper`               | `integer`                 | `YES`     | `YES`        |
| `title_newspaper`            | `text`                    | `YES`     | `NO`         |
| `cost_newspaper`             | `double precision`        | `YES`     | `NO`         |
| `publication_index`          | `integer`                 | `NO`      | `NO`         |
| `number_office`              | `integer`                 | `NO`      | `NO`         |
| `date_of_issue`              | `date`                    | `NO`      | `NO`         |
| `id_post_office_fk`          | `integer`                 | `NO`      | `NO`         |


## Constraints


**Primary key** : `ID_newspaper integer PRIMARY KEY`

**Foreign key** : `ID_post_office_FK integer REFERENCES post_office (ID_post_office)`



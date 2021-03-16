# Сorrection - правка


## Table

| Name                     | Data type     | Not NULL? | Primary key? |
|:------------------------ |:--------------|:----------|:-------------|
| `id_correction`          | `integer`     | `YES`     | `YES`        |
| `content`                | `text`        | `YES`     | `NO`         |
| `id_editorial_office_fk` | `integer`     | `NO`      | `NO`         |
| `id_article_fk`          | `integer`     | `NO`      | `NO`         |


## Constraints


**Primary key** : `ID_correction integer PRIMARY KEY`

**Foreign key** : `ID_editorial_office_FK integer REFERENCES editorial_office (ID_editorial_office)`

**Foreign key** : `ID_article_FK integer REFERENCES article (ID_article)`




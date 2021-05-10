# Article - статья


## Table

| Name            | Data type     | Not NULL? | Primary key? |
|:--------------- |:--------------|:----------|:-------------|
| `id_article`    | `integer`     | `YES`     | `YES`        |
| `id_release_fk` | `integer`     | `NO`      | `NO`         |


## Constraints


**Primary key** : `ID_article integer PRIMARY KEY`

**Foreign key** : `ID_release_FK integer REFERENCES release (ID_release)`


## Create table

```
CREATE TABLE article (
	ID_article integer PRIMARY KEY, 
	ID_release_FK integer REFERENCES release (ID_release)
);
```

## Commands

```
INSERT INTO article VALUES (1, 2), (2, 2), (3, 1);
```



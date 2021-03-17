# Editorial office - редакция


## Table

| Name                     | Data type     | Not NULL? | Primary key? |
|:------------------------ |:--------------|:----------|:-------------|
| `id_editorial_office`    | `integer`     | `YES`     | `YES`        |
| `name`                   | `text`        | `YES`     | `NO`         |


## Constraints


**Primary key** : `ID_editorial_office integer PRIMARY KEY`


## Create table

```
CREATE TABLE editorial_office (
	ID_editorial_office integer PRIMARY KEY, 
	name text NOT NULL
);
```

## Commands

```
INSERT INTO editorial_office VALUES (1, 'Ivanov S.S.'), (2, 'Petrova A.M.'), (3, 'Medvedeva Z.A.');
```



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


## Create table

```
CREATE TABLE newspaper (
	ID_newspaper integer PRIMARY KEY,
	title_newspaper text NOT NULL,
	cost_newspaper float NOT NULL,
	publication_index integer,
	number_office integer,
	date_of_issue date,
	ID_post_office_FK integer REFERENCES post_office (ID_post_office)
);
```

## Commands

```
INSERT INTO newspaper VALUES (1, 'ITMO', 12, 54785, 345, '2021-03-16', 1), (2, 'ITMO2', 45, 5675, 125, '2021-02-11', 2);
```



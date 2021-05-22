# Post office - почтовое отделение


## Table

| Name                         | Data type                 | Not NULL? | Primary key? |
|:---------------------------- |:--------------------------|:----------|:-------------|
| `id_post_office`             | `integer`                 | `YES`     | `YES`        |
| `number_office`              | `integer`                 | `YES`     | `NO`         |
| `address_office`             | `text`                    | `YES`     | `NO`         |


## Constraints


**Primary key** : `ID_post_office integer PRIMARY KEY`


## Create table

```
CREATE TABLE post_office (
	ID_post_office integer PRIMARY KEY, 
	number_office integer NOT NULL, 
	address_office text NOT NULL
);
```

## Commands

```
INSERT INTO post_office VALUES (1, 3489, 'Nevskij'), (2, 357857, 'Petroga');
```





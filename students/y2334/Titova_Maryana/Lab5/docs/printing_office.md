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


## Create table

```
CREATE TABLE printing_office (
	ID_printing_office integer PRIMARY KEY,
	name_printing_office text NOT NULL,
	address_printing_office text,
	count integer,
	schedule_printing_office text,
	ID_newspaper_FK integer REFERENCES newspaper (ID_newspaper)
); 
```

## Commands

```
INSERT INTO printing_office VALUES (1, 'qwerty', 'Gorkovskaya, 15', 12000, '8-00 22-00', 2), (2, 'wasd', 'Gorkovskaya, 244a', 2400, '10-00 20-00', 1);
```





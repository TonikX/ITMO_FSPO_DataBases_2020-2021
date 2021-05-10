# Edition - Редакция

## Table

|Column|Data type |Null|Primary|
|:-----|:---------|:---|:------|
|`id`  |`INT`     |`NO`|`YES`  |
|`name`|`CHAR(64)`|`NO`|`NO`   |


## Constraints

**Primary key**: `id`

## Create table

```
CREATE TABLE edition (
    id SERIAL,
    name CHAR(64) NOT NULL
);
```

## Insertion

```
INSERT INTO edition (name)
VALUES ("New edition");
```

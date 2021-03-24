# Redactors - Редакторы

## Table

|Column|Data type |Null|Primary|
|:-----|:---------|:---|:------|
|`id`  |`INT`     |`NO`|`YES`  |
|`name`|`CHAR(64)`|`NO`|`NO`   |


## Constraints

**Primary key**: `id`

## Create table

```
CREATE TABLE redactors (
    id SERIAL,
    name CHAR(64) NOT NULL
);
```

## Insertion

```
INSERT INTO redactors (name)
VALUES ("New redactor");
```


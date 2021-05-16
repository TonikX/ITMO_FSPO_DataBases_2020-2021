# Printings - Издания

## Table

|Column       |Data type  |Null|Primary|
|:------------|:----------|:---|:------|
|`id`         |`INT`      |`NO`|`YES`  |
|`name`       |`CHAR(64)` |`NO`|`NO`   |
|`address`    |`CHAR(128)`|`NO`|`NO`   |
|`status`     |`CHAR(32)` |`NO`|`NO`   |

## Constraints

**Primary Pey**: `id`

## Create table

```
CREATE TABLE printings (
    id SERIAL,
    name CHAR(64) NOT NULL,
    address CHAR(128) NOT NULL,
    status CHAR(32) NOT NULL,
);
```

## Insertion

```
INSERT INTO printings (name, address, status)
VALUES ("New printing", "New printing's address", "working");
```


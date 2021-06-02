# Posts - Почтовые отделения

## Table

|Column       |Data type  |Null|Primary|
|:------------|:----------|:---|:------|
|`id`         |`INT`      |`NO`|`YES`  |
|`address`    |`CHAR(128)`|`NO`|`NO`   |

## Constraints

**Primary Pey**: `id`

## Create table

```
CREATE TABLE posts (
    id SERIAL,
    address CHAR(128) NOT NULL
);
```

## Insertion

```
INSERT INTO posts (address)
VALUES ("New post's address");
```


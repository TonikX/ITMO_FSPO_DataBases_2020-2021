# Issues - Выпуски

## Table

|Column       |Data type |Null|Primary|
|:------------|:---------|:---|:------|
|`id`         |`INT`     |`NO`|`YES`  |
|`edition_id` |`INT`     |`NO`|`NO`   |
|`printing_id`|`INT`     |`NO`|`NO`   |
|`redactor_id`|`INT`     |`NO`|`NO`   |
|`name`       |`CHAR(64)`|`NO`|`NO`   |
|`copy_price` |`INT`     |`NO`|`NO`   |
|`circulation`|`INT`     |`NO`|`NO`   |

## Constraints

**Primary Pey**: `id`

**Foreign Key**: `edition_id REFERENCES edition(id)`

**Foreign Key**: `printing_id REFERENCES printings(id)`

**Foreign Key**: `redactor_id REFERENCES redactors(id)`


## Create table

```
CREATE TABLE issues (
    id SERIAL,
    edition_id INT NOT NULL,
    printing_id INT NOT NULL,
    redactor_id INT NOT NULL,
    name CHAR(64) NOT NULL,
    copy_price INT NOT NULL,
    circulation INT NOT NULL,
    FOREIGN KEY (post_id) REFERENCES posts(id),
    FOREIGN KEY (paper_id) REFERENCES papers(id),
    FOREIGN KEY (redactor_id) REFERENCES redactors(id)
);
```

## Insertion

```
INSERT INTO issues (edition_id, printing_id, redactor_id, name, copy_price, circulation)
VALUES (1, 1, 1, "New paper", 30, 100000);
```


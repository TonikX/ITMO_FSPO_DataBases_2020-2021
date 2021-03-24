# Papers in posts - Газеты в почтовых отделенияx

## Table

|Column     |Data type |Null|Primary|
|:----------|:---------|:---|:------|
|`id`       |`INT`     |`NO`|`YES`  |
|`post_id`  |`INT`     |`NO`|`NO`   |
|`paper_id` |`INT`     |`NO`|`NO`   |
|`count`    |`INT`     |`NO`|`NO`   |

## Constraints

**Primary Pey**: `id`

**Foreign Key**: `post_id REFERENCES posts(id)`

**Foreign Key**: `paper_id REFERENCES papers(id)`

## Create table

```
CREATE TABLE papers_in_posts (
    id SERIAL,
    post_id INT NOT NULL,
    paper_id INT NOT NULL,
    count INT NOT NULL,
    FOREIGN KEY (post_id) REFERENCES posts(id),
    FOREIGN KEY (paper_id) REFERENCES papers(id)
);
```

## Insertion

```
INSERT INTO papers_in_posts (post_id, paper_id, count)
VALUES (1, 1, 5000);
```

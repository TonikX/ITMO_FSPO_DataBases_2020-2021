# Redactor - редактор


## Table

| Name            | Data type     | Not NULL? | Primary key? |
|:--------------- |:--------------|:----------|:-------------|
| `id_redactor`   | `integer`     | `YES`     | `YES`        |
| `name_redactor` | `text`        | `NO`      | `NO`         |

## Create table

```
CREATE TABLE public.redactor
(
    id_redactor integer NOT NULL,
    name_radactor text COLLATE pg_catalog."default",
    CONSTRAINT redactor_pkey PRIMARY KEY (id_redactor)
);
```

## Insert

```
1. insert into redactor values(1, 'Mary Smith');

2. insert into redactor values(2, 'David Friy');

3. insert into redactor values(3, 'Fraud Graund');
```
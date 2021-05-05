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

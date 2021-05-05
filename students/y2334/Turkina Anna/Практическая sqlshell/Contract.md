# Сontract - контракт


## Table

| Name                     | Data type     | Not NULL? | Primary key? |
|:------------------------ |:--------------|:----------|:-------------|
| `id_contract`            | `integer`     | `YES`     | `YES`        |
| `id_meneger`             | `integer`     | `NO`      | `NO`         |
| `id_zakaz`               | `integer`     | `NO`      | `NO`         |
| `id_book`                | `integer`     | `NO`      | `NO`         |
| `id_avtor`               | `integer`     | `NO`      | `NO`         |


## Create table

```
CREATE TABLE public.contract
(
    id_contract integer NOT NULL,
    id_meneger integer,
    id_zakaz integer,
    id_book integer,
    id_avtor integer,
    date date,
    cost integer,
    CONSTRAINT contract_pkey PRIMARY KEY (id_contract)
);
```

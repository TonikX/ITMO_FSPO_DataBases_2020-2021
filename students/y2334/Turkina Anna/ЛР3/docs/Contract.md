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

## Insert

```
1. insert into contract values(1, 1, 1, 1, 2, '2020-12-12', 4650);

2. insert into contract values(2, 2, 2, 2, 1, '2020-12-02', 7850);

3. insert into contract values(3, 3, 3, 3, 3, '2021-03-29', 7420);
```
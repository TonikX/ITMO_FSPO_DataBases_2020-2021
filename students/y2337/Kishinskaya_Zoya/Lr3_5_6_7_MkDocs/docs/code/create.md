## Создание

#### Создание базы данных
```
CREATE DATABASE chicken;
```
#### Создание схемы
```
CREATE SCHEMA workplace;
```
#### Создане таблицы Работник
```
CREATE TABLE workplace.worker
(
    id integer NOT NULL,
    fio character varying(40) COLLATE pg_catalog."default" NOT NULL,
    pass integer NOT NULL,
    salary double precision NOT NULL,
    contract character varying[] COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT worker_pkey PRIMARY KEY (id)
)

TABLESPACE pg_default;

ALTER TABLE workplace.worker
    OWNER to postgres;
```
#### Создане таблицы Курица
```
-- Table: workplace.chicken

-- DROP TABLE workplace.chicken;

CREATE TABLE workplace.chicken
(
    id integer NOT NULL,
    weight double precision NOT NULL,
    age double precision NOT NULL,
    performance integer NOT NULL,
    breed_id integer NOT NULL,
    CONSTRAINT chicken_pkey PRIMARY KEY (id),
    CONSTRAINT breed_id FOREIGN KEY (breed_id)
        REFERENCES workplace.breed (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)

TABLESPACE pg_default;

ALTER TABLE workplace.chicken
    OWNER to postgres;
```
#### Создание таблицы Пребывание
```
CREATE TABLE workplace.stay
(
    id integer NOT NULL,
    chicken_id integer NOT NULL,
    cell_id integer NOT NULL,
    date_start date NOT NULL,
    date_delete date,
    CONSTRAINT stay_pkey PRIMARY KEY (id),
    CONSTRAINT cell_id FOREIGN KEY (cell_id)
        REFERENCES workplace.cell (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT chicken_id FOREIGN KEY (chicken_id)
        REFERENCES workplace.chicken (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)

TABLESPACE pg_default;

ALTER TABLE workplace.stay
    OWNER to postgres;
```
#### Создане таблицы Клетка
```
-- Table: workplace.cell

-- DROP TABLE workplace.cell;

CREATE TABLE workplace.cell
(
    id integer NOT NULL,
    num_row integer NOT NULL,
    num integer NOT NULL,
    workshop_id integer NOT NULL,
    CONSTRAINT cell_pkey PRIMARY KEY (id),
    CONSTRAINT workshop_id FOREIGN KEY (workshop_id)
        REFERENCES workplace.workshop (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)

TABLESPACE pg_default;

ALTER TABLE workplace.cell
    OWNER to postgres;
```
#### Создание таблицы Обслуживание
```
CREATE TABLE workplace.serving
(
    id integer NOT NULL,
    worker_id integer NOT NULL,
    cell_id integer NOT NULL,
    date_serving date NOT NULL,
    CONSTRAINT serving_pkey PRIMARY KEY (id),
    CONSTRAINT cell_id FOREIGN KEY (cell_id)
        REFERENCES workplace.cell (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT worker_id FOREIGN KEY (worker_id)
        REFERENCES workplace.worker (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)

TABLESPACE pg_default;

ALTER TABLE workplace.serving
    OWNER to postgres;
```
#### Создание таблицы Диета
```
CREATE TABLE workplace.diet
(
    id integer NOT NULL,
    name character varying(20) COLLATE pg_catalog."default" NOT NULL,
    content character varying(200) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT diet_pkey PRIMARY KEY (id)
)

TABLESPACE pg_default;

ALTER TABLE workplace.diet
    OWNER to postgres;
```
#### Создание таблицы Порода
```
-- Table: workplace.breed

-- DROP TABLE workplace.breed;

CREATE TABLE workplace.breed
(
    id integer NOT NULL,
    name character varying(20) COLLATE pg_catalog."default" NOT NULL,
    weight double precision NOT NULL,
    performance integer NOT NULL,
    diet_id integer NOT NULL,
    CONSTRAINT breed_pkey PRIMARY KEY (id),
    CONSTRAINT diet_id FOREIGN KEY (diet_id)
        REFERENCES workplace.diet (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)

TABLESPACE pg_default;

ALTER TABLE workplace.breed
    OWNER to postgres;
```

#### Создание таблицы Цех
```
CREATE TABLE workplace.workshop
(
    id integer NOT NULL,
    number_workshop integer NOT NULL,
    quantity integer NOT NULL,
    CONSTRAINT workshop_pkey PRIMARY KEY (id)
)

TABLESPACE pg_default;

ALTER TABLE workplace.workshop
    OWNER to postgres;
```

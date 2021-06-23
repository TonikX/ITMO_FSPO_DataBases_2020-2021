## Создание

#### Создание базы данных
```
CREATE DATABASE chicken;
```
#### Создание схемы
```
CREATE SCHEMA workplace;
```
#### Создане таблицы Директор
```
CREATE TABLE workplace."Director"
(
    "Director_id" SMALLSERIAL,
    "Director_pass" character(30) NOT NULL,
    PRIMARY KEY ("Director_id")
);
```
#### Создане таблицы Работник
```
CREATE TABLE workplace."Worker"
(
    "Worker_id" SMALLSERIAL,
    "Worker_pass" date NOT NULL,
    "Worker_salary" integer NOT NULL,
    PRIMARY KEY ("Worker_id")
);
```
#### Создане таблицы Цех
```
CREATE TABLE workplace."Workshop"
(
    "Workshop_id" SMALLSERIAL,
    "Workshop_quantity" integer NOT NULL,
    UNIQUE ("Workshop_id")
);
```
#### Создане таблицы Курица
```
CREATE TABLE workplace."Chicken"(
    "Chicken_id" SMALLSERIAL,
    "Chicken_age" integer NOT NULL,
    "Chicken_weight" integer NOT NULL,
    PRIMARY KEY ("Chicken_id"),
    UNIQUE ("Chicken_id")
);
```


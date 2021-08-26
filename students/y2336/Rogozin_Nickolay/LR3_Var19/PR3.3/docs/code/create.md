## Создание

#### Создание базы данных
```
CREATE DATABASE zoo;
```
#### Создание схемы
```
CREATE SCHEMA workplace;
```
#### Создане таблицы Животные
```
CREATE TABLE workplace."Animal"
(
    "Animal_id" SMALLSERIAL,
    "Animal_type" character(30) NOT NULL,
    "Animal_dob" date NOT NULL,
    "Animal_sex" character(1) NOT NULL,
    PRIMARY KEY ("Animal_id")
);
```
#### Создане таблицы Животных по обмену
```
CREATE TABLE workplace."Animal_transfered"
(
    "Animal_transfered_id" SMALLSERIAL,
    "Animal_transfered_dob" date NOT NULL,
    "Animal_transfered_sex" character(1) NOT NULL,
    "Animal_transfered_cost" real NOT NULL,
    "Animal_transfered_owner" character(100) NOT NULL,
    "Animal_transfered_type" character(30) NOT NULL,
    PRIMARY KEY ("Animal_transfered_id")
);
```
#### Создане таблицы Птиц
```
CREATE TABLE workplace."Animal_bird"
(
    "Bird_id" SMALLSERIAL,
    "Animal_id" integer NOT NULL,
    "Bird_flyover" boolean NOT NULL,
    "Bird_flyover_id" integer,
    "Bird_flyover_out" date,
    "Brid_flyover_back" date,
    "Bird_flyover_place" character(50),
    PRIMARY KEY ("Bird_id"),
    FOREIGN KEY ("Animal_id") REFERENCES Animal("Animal_id"),
    UNIQUE ("Animal_id"),
    UNIQUE ("Bird_flyover_id")
);
```
#### Создане таблицы Рептилий
```
CREATE TABLE workplace."Animal_reptile"(
    "Reptile_id" SMALLSERIAL,
    "Animal_id" integer NOT NULL,
    "Reptile_normal_temp" real NOT NULL,
    "Reptile_hyber_start" date NOT NULL,
    "Reptile_hyber_end" date NOT NULL,
    PRIMARY KEY ("Reptile_id"),
    FOREIGN KEY ("Animal_id") REFERENCES Animal("Animal_id"),
    UNIQUE ("Animal_id")
);
```
#### Создане таблицы Клетка
```
CREATE TABLE workplace."Cage"(
    "Cage_id" SMALLSERIAL,
    "Cage_building_id" integer NOT NULL,
    "Cage_size" integer NOT NULL,
    "Cage_isolated" boolean NOT NULL,
    "Cage_department" character(30) NOT NULL,
    "Cage_additions" character(100),
    PRIMARY KEY ("Cage_id"),
);
```
#### Создане таблицы Доктор
```
CREATE TABLE workplace."Doctor"(
    "Doctor_id" SMALLSERIAL,
    "Doctor_dob" date NOT NULL,
    "Doctor_name" character(100) NOT NULL,
    "Doctor_contacts" character(100) NOT NULL,
    PRIMARY KEY("Doctor_id")
);
```
#### Создане таблицы Надзиратель
```
CREATE TABLE workplace."Overseer"(
    "Overseer_id" SMALLSERIAL,
    "Overseer_dob" date NOT NULL,
    "Overseer_name" character(100) NOT NULL,
    "Overseer_contacts" character(100) NOT NULL,
    PRIMARY KEY("Overseer_id")
);
```
#### Создане таблицы План питания
```
CRATE TABLE workplace."Meal"(
    "Meal_id" SMALLSERIAL NOT NULL,
    "Meal_date_of_change" date NOT NULL,
    "Meal_subtype" integer NOT NULL,
    "Meal_titile" character(50) NOT NULL,
    "Meas_content" character(100) NOT NULL,
    PRIMARY KEY("Meal_id")
);
``` 
#### Создане таблицы Обмен
```
CREATE TABLE workplace."Transfer"(
    "Transfer_id" SMALLSERIAL,
    "Animal_id" integeer NOT NULL,
    "Animal_transfered_id" integer NOT NULL,
    "Transfer_date" date NOT NULL,
    "Transfer_date_end" date NOT NULL
    PRIMARY KEY("Transfer_id"),
    FOREIGN KEY("Animal_transfered_id") REFERENCES Animal_transfered("Animal_transfered_id"),
    FOREIGN KEY("Animal_id") REFERENCES Animal("Animals_id"),
    UNIQUE ("Animal_id"),
    UNIQUE ("Animal_transfered_id")
);
```
#### Создане таблицы Смена
```
CREATE TABLE workplace."Shift"(
    "Shift_id" SMALLSERIAL,
    "Shift_date" date NOT NULL,
    "Overseer_id" integer NOT NULL,
    "Animal_id" integer NOT NULL,
    PRIMARY KEY("Shift_id"),
    FOREIGN KEY("Overseer_id") REFERENCES Overseer("Overseer_id"),
    FOREIGH KEY("Animal_id) REFERENCES Animal("Animal_id),
    UNIQUE ("Animal_id")
    UNIQUE ("Overseer_id")
);
```
#### Создане таблицы Заселение
```
CREATE TABLE workplace."Settling"(
    "Settling_id" SMALLSERIAL,
    "Settling_date" date NOT NULL,
    "Animal_id" integer NOT NULL,
    "Cage_id" integer NOT NULL,
    PRIMARY KEY("Settling_id"),
    FOREIGN KEY("Animal_id"), REFERENCES Animal("Animal_id"),
    FOREIGN KEY("Cage_id"), REFERENCES Cage("Cage_id"),
    UNIQUE ("Animal_id"),
    UNIQUE ("Cage_id")
);
```
#### Создане таблицы Лечение
```
CREATE TABLE workplace."Healing"(
    "Healing_id" SMALLSERIAL,
    "Healing_date" date NOT NULL,
    "Animal_id" integer NOT NULL,
    "Doctor_id" integer NOT NULL,
    PRIMARY KEY("Healing_id"),
    FOREIGN KEY("Animal_id") REFERENCES Animal("Animal_id"),
    FOREIGN KEY("Doctor_id") REFERENCES Doctor("Doctor_id"),
    UNIQUE ("Animal_id"),
    UNIQUE ("Doctor_id")
);
```
#### Создане таблицы Кормление
```
CREATE TABLE workplace."Feeding"(
    "Feeding_id" integer NOT NULL,
    "Feeding_date" date NOT NULL,
    "Animal_id" integer NOT NULL,
    "Meal_id" integer NOT NULL,
    PRIMARY KEY("Feeding"),
    FOREIGN KEY("Animal_id") REFERENCES Animal("Animal_id"),
    FOREIGN KEY("Meal_id") REFERENCES Meal("Meal_id),
    UNIQUE ("Animal_id"),
    UNIQUE ("Meal_id")
);
```

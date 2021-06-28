##Create

#### Создание таблицы "Животные":
```
CREATE TABLE animals (
    id_animal integer NOT NULL PRIMARY KEY,
    name character varying(10) NOT NULL,
    birthday date NOT NULL
);
```
#### Создание таблицы "Вид":
```
CREATE TABLE type (
    id_type integer NOT NULL PRIMARY KEY,
    foreign key(id_animal) references animals(id_animal),
    name character varying(10) NOT NULL,
    information_about_wintering character varying(250),
    normal_temperature character varying(30)
);
```
#### Создание таблицы "Рацион кормления":
```
CREATE TABLE feeding_ration (
    id_feeding_ration integer NOT NULL PRIMARY KEY,
    type character varying(30),
    description character varying(80)
);
```
#### Создание таблицы "Питание":
```
CREATE TABLE nutrition (
    id_nutrition integer NOT NULL PRIMARY KEY,
    foreign key(id_animal) references animals(id_animal),
    foreign key(id_feeding_ration) references feeding_ration(id_feeding_ration),
    feeding_time time without time zone
);
```
#### Создание таблицы "Зона обитания":
```
CREATE TABLE habitat_area (
    id_habitat_area integer NOT NULL PRIMARY KEY,
    name character varying(30),
    habitat character varying(65),
    characteristics character varying(300)
);
```
#### Создание таблицы "Обитание":
```
CREATE TABLE habitation (
    id_habitation integer NOT NULL,
    foreign key(id_animal) references animals(id_animal),
    foreign key(id_habitat_area) references habitat_area(id_habitat_area)
);
```
#### Создание таблицы "Здание":
```
CREATE TABLE building (
    id_building integer NOT NULL PRIMARY KEY,
    address character varying(30) NOT NULL
);
```
#### Создание таблицы "Территория зоопарка":
```
CREATE TABLE zoo_territory (
    id_zoo_territory integer NOT NULL PRIMARY KEY,
    foreign key(id_animal) references animals(id_animal),
    foreign key(id_building) references building(id_building),
    habitat_period character varying(30) NOT NULL
);
```
#### Создание таблицы "Сотрудник":
```
CREATE TABLE worker (
    id_worker integer NOT NULL PRIMARY KEY,
    fio character varying(30) NOT NULL,
    birthday date NOT NULL,
    post character varying(30) NOT NULL,
    email character varying(30) NOT NULL,
    phone_number  character varying(12) NOT NULL
);
```
#### Создание таблицы "Обслуживание":
```
CREATE TABLE service (
    id_service integer NOT NULL PRIMARY KEY,
    foreign key(id_worker) references worker(id_worker),
    foreign key(id_animal) references animals(id_animal),
    service character varying(50) NOT NULL
);
```


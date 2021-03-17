# **Lab 3**

## **Зачем?**

Реализовать вот это по заданию лабораторной работы

![1](./preview.png)

## **На чем?**

POSTGRE version `13.1`

## **Breed**

| name           | type           | primary key    | references          |
|:-------------- |:-----------    |:-------------- |:------------------- |
| breed_id       | `int`          | `true`         | `null`              |
| average_kpd    | `int`          | `false`        | `null`              |
| average_weight | `int`          | `false`        | `null`              |

### **Creation**

`create table breed(breed_id int primary key, average_kpd int, average_weight int);`

### **Commands**

`insert into breed values (1,2,3);`

## **Diet**

| name           | type           | primary key    | references          |
|:-------------- |:-----------    |:-------------- |:------------------- |
| diet_id        | `int`          | `true`         | `null`              |
| content        | `varchar(40)`  | `false`        | `null`              |
| season         | `varchar(40)`  | `false`        | `null`              |
| breed          | `int`          | `false`        | `Breed.breed_id`    |

### **Creation**

`create table diet (diet_id int primary key, content varchar(40), season varchar(40), breed int, foreign key (breed) references breed (breed_id));`

### **Commands**

`insert into diet values (1, "2", "3", 1)`

## **Chicken**

| name           | type           | primary key    | references          |
|:-------------- |:-----------    |:-------------- |:------------------- |
| chicken_id     | `int`          | `true`         | `null`              |
| weight         | `int`          | `false`        | `null`              |
| age            | `int`          | `false`        | `null`              |
| kpd            | `int`          | `false`        | `null`              |
| place          | `varchar(40)`  | `false`        | `null`              |
| breed          | `int`          | `false`        | `Breed.breed_id`    |

### **Creation**

`create table chicken (chicken_id int primary key, weight int, age int, kpd int, place varchar(40), breed int, foreign key (breed) references breed (breed_id));`

### **Commands**

`insert into diet values (1, 100, 10, 50, "here", 1)`

## **Worker**

| name           | type           | primary key    | references          |
|:-------------- |:-----------    |:-------------- |:------------------- |
| worker_id      | `int`          | `true`         | `null`              |
| passport       | `varchar(40)`  | `false`        | `null`              |
| passport_timing| `varchar(40)`  | `false`        | `null`              |
| fio            | `varchar(80)`  | `false`        | `null`              |
| work_place     | `varchar(40)`  | `false`        | `null`              |
| salary         | `int`          | `false`        | `null`              |
| doc            | `int`          | `false`        | `null`              |
| fire           | `boolean`      | `false`        | `null`              |
| hire           | `date`         | `false`        | `null`              |

### **Creation**

`insert into worker (worker_id int primary key, passport varchar(40), passport_timing varchar(40), fio varchar(80), work_place varchar(40), salary int, doc int, fire boolean, hire date);`

### **Commands**

`insert into diet values (1, "133333", "12.02.2020", "Antonov Anton Antonovich", "here", 15000, 123, false, "12.03.2019")`

## **Department**

| name           | type           | primary key    | references          |
|:-------------- |:-----------    |:-------------- |:------------------- |
| department_id  | `int`          | `true`         | `null`              |
| capacity       | `int`          | `false`        | `null`              |
| address        | `varchar(40)`  | `false`        | `null`              |

### **Creation**

`insert into department (department_id int primary key, capacity int, address varchar(40));`

### **Commands**

`insert into diet values (1, 100, "Pushkin's st.")`

## **Cell**

| name           | type           | primary key    | references                 |
|:-------------- |:-----------    |:-------------- |:-------------------        |
| cell_id        | `int`          | `true`         | `null`                     |
| row            | `int`          | `false`        | `null`                     |
| cell           | `int`          | `false`        | `null`                     |
| department     | `int`          | `false`        | `Department.department_id` |

### **Creation**

`insert into cell (cell_id int primary key, row int, cell int, department int, foreign key (department) references department (department_id));`

### **Commands**

`insert into diet values (1, 2, 3, 1)`

## **Cleaning**

| name           | type           | primary key    | references                 |
|:-------------- |:-----------    |:-------------- |:-------------------        |
| cleaning_id    | `int`          | `true`         | `null`                     |
| cell           | `int`          | `false`        | `Cell.cell_id`             |
| worker         | `int`          | `false`        | `Worker.worker_id`         |

### **Creation**

`insert into cleaning (cleaning_id int primary key, cell int, worker int, foreign key (cell) references cell (cell_id), foreign key (worker) references worker (worker_id));`

### **Commands**

`insert into diet values (1, 1, 1, 1)`

## **Maintenance**

| name           | type           | primary key    | references                 |
|:-------------- |:-----------    |:-------------- |:-------------------        |
| maintenance_id | `int`          | `true`         | `null`                     |
| in_d           | `date`         | `false`        | `null`                     |
| out_d          | `date`         | `false`        | `null`                     |
| cell           | `int`          | `false`        | `Cell.cell_id`             |
| chicken        | `int`          | `false`        | `Chicken.chicken_id`       |

### **Creation**

`insert into maintenance (maintenance_id int primary key, in_d date, out_d date, cell int, chicken int, foreign key (cell) references cell (cell_id), foreign key (chicken) references chicken (chicken_id));`

### **Commands**

`insert into diet values (1, "20.03.2018", "23.04.2018", 1, 1)`
# Tables documentation

## Breed

| name           | type           | primary key    | references          |
|:-------------- |:-----------    |:-------------- |:------------------- |
| breed_id       | `int`          | `true`         | `null`              |
| average_kpd    | `int`          | `false`        | `null`              |
| average_weight | `int`          | `false`        | `null`              |

## Diet

| name           | type           | primary key    | references          |
|:-------------- |:-----------    |:-------------- |:------------------- |
| diet_id        | `int`          | `true`         | `null`              |
| content        | `varchar(40)`  | `false`        | `null`              |
| season         | `varchar(40)`  | `false`        | `null`              |
| breed          | `int`          | `false`        | `Breed.breed_id`    |

## Chicken

| name           | type           | primary key    | references          |
|:-------------- |:-----------    |:-------------- |:------------------- |
| chicken_id     | `int`          | `true`         | `null`              |
| weight         | `int`          | `false`        | `null`              |
| age            | `int`          | `false`        | `null`              |
| kpd            | `int`          | `false`        | `null`              |
| place          | `varchar(40)`  | `false`        | `null`              |
| breed          | `int`          | `false`        | `Breed.breed_id`    |

## Worker

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

## Department

| name           | type           | primary key    | references          |
|:-------------- |:-----------    |:-------------- |:------------------- |
| department_id  | `int`          | `true`         | `null`              |
| capacity       | `int`          | `false`        | `null`              |
| address        | `varchar(40)`  | `false`        | `null`              |

## Cell

| name           | type           | primary key    | references                 |
|:-------------- |:-----------    |:-------------- |:-------------------        |
| cell_id        | `int`          | `true`         | `null`                     |
| row            | `int`          | `false`        | `null`                     |
| cell           | `int`          | `false`        | `null`                     |
| department     | `int`          | `false`        | `Department.department_id` |

## Cleaning

| name           | type           | primary key    | references                 |
|:-------------- |:-----------    |:-------------- |:-------------------        |
| cleaning_id    | `int`          | `true`         | `null`                     |
| cell           | `int`          | `false`        | `Cell.cell_id`             |
| worker         | `int`          | `false`        | `Worker.worker_id`         |

## Maintenance

| name           | type           | primary key    | references                 |
|:-------------- |:-----------    |:-------------- |:-------------------        |
| maintenance_id | `int`          | `true`         | `null`                     |
| in_d           | `date`         | `false`        | `null`                     |
| out_d          | `date`         | `false`        | `null`                     |
| cell           | `int`          | `false`        | `Cell.cell_id`             |
| chicken        | `int`          | `false`        | `Chicken.chicken_id`       |

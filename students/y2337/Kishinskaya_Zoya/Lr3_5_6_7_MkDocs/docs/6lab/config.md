
### config.php
```
<?php
    $dbuser = "postgres";
    $dbpass = "123456789";
    $dbhost = "localhost";
    $dbname = "postgres";

    $tables = [
        "worker" => array(
            "name" => 'Работник',
            "fields" => array(
                "id" => 'id',
                "fio" => 'ФИО',
                "pass" => 'Паспорт',
                "salary" => 'Зарплата',
                "contract" => 'Договор'
            )
        ),
        "chicken" => array(
            "name" => 'Курица',
            "fields" => array(
                "id" => 'id',
                "weight" => 'Вес',
                "age" => 'Возраст',
                "performance" => 'Производительность',
                "breed_id" => 'id породы',
            )
        ),
        "stay" => array (
            "name" => 'Пребывание',
            "fields" => array(
                "id" => 'id',
                "chicken_id" => 'id курицы',
                "cell_id" => 'id клетки',
                "date_start" => 'Дата заселения',
                "date_delete" => 'Дата выселения',
            )
        ),

        "cell" => array (
            "name" => 'Клетка',
            "fields" => array(
                "id" => 'id',
                "num_row" => 'Номер ряда',
                "num" => 'Номер клетки',
                "workshop_id" => 'id цеха',
            )
        ),

        "serving" => array (
            "name" => 'Обслуживание',
            "fields" => array(
                "id" => 'id',
                "worker_id" => 'id работника',
                "cell_id" => 'id клетки',
                "date" => 'Дата обслуживания',
            )
        ),
        "diet" => array (
            "name" => 'Диета',
            "fields" => array(
                "id" => 'id',
                "name" => 'Название',
                "content" => 'Описание',
            )
        ),
        "breed" => array (
            "name" => 'Порода',
            "fields" => array(
                "id" => 'id',
                "name" => 'Название',
                "weight" => 'Вес',
                "performance" => 'Производиельность',
                "diet_id" => 'id диеты',
            )
        ),
        "workshop" => array (
            "name" => 'Цех',
            "fields" => array(
                "id" => 'id',
                "number" => 'Номер цеха',
                "quantity" => 'Колицество',
            )
        ),
    ];
```
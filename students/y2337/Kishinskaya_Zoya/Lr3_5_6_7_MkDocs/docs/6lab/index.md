### index.php
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=2">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Таблицы</title>
</head>
<body>
    <header>
        <div class="container">

            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Главная</a>
                </li>
                <?php
                require_once "config.php";
                foreach ($tables as $table => $value)
                {
                    echo "<li class='nav-item'><a class='nav-link' href='table.php?table_name=$table'>" . $tables[$table]["name"] . "</a></li>";
                }
                ?>
            </ul>
        </div>

    </header>

	<div class="container">
        <h1>Запросы</h1>

        <?
        require_once "config.php";
        try {
            $db = new PDO("pgsql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (\Throwable $th) {
            echo "<pre>" . $th . "</pre>";
        }

        ?>

        <h3>Вывод информации о курицах, вес которых превышает вес породы</h3>
        <div class="code">
            <code>
                select id as id_chicken, weight from public.chicken where weight > all (select weight from public.breed);
            </code>
        </div>

        <table class="table mb-3">
            <thead>
            <tr>
                <th>id_chicken</th>
                <th>weight</th>
            </tr>
            </thead>
            <tbody>
            <?
            $query = "select id as id_chicken, weight from public.chicken where weight > all (select weight from public.breed);";

            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['id_chicken'] . "</td>";
                echo "<td>" . $row['weight'] . "</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>

        <h3>Вывод информации о том, какие породы находятся в клетке 2</h3>
        <div class="code">
            <code>select * from public.breed where id in (select breed_id from public.chicken where id in
                (select chicken_id from public.stay where cell_id = 2));</code>
        </div>
        <table class="table mb-3">
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>weight</th>
                <th>performance</th>
                <th>diet_id</th>
            </tr>
            </thead>
            <tbody>
            <?
            $query = "select * from public.breed where id in (select breed_id from public.chicken where id in 
										   (select chicken_id from public.stay where cell_id = 2));";
            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['weight'] . "</td>";
                echo "<td>" . $row['performance'] . "</td>";
                echo "<td>" . $row['diet_id'] . "</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>

        <h3>Вывод информации о пребывании куриц, которых заселили в апреле до 15 числа</h3>
        <div class="code">
            <code>
                select * from public.stay where (select extract(day from date_start)<15
                and extract(month from date_start) =4);
            </code>
        </div>
        <table class="table mb-3">
            <thead>
            <tr>
                <th>id</th>
                <th>chicken_id</th>
                <th>cell_id</th>
                <th>date_start</th>
                <th>date_delete</th>
            </tr>
            </thead>
            <tbody>
            <?
            $query = "select * from public.stay where (select extract(day from date_start)<15
									and extract(month from date_start) =4);";
            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['chicken_id'] . "</td>";
                echo "<td>" . $row['cell_id'] . "</td>";
                echo "<td>" . $row['date_start'] . "</td>";
                echo "<td>" . $row['date_delete'] . "</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>

        <h3>Вывод информации о работнике с максимальной зп</h3>
        <div class="code">
            <code>
                select * from public.worker where salary>=all
                (select salary from public.worker);
            </code>
        </div>
        <table class="table mb-3">
            <thead>
            <tr>
                <th>id</th>
                <th>fio</th>
                <th>pass</th>
                <th>salary</th>
                <th>contract</th>
            </tr>
            </thead>
            <tbody>
            <?
            $query = "select * from public.worker where salary>=all
(select salary from public.worker);";
            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['fio'] . "</td>";
                echo "<td>" . $row['pass'] . "</td>";
                echo "<td>" . $row['salary'] . "</td>";
                echo "<td>" . $row['contract'] . "</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>

        <h3>Вывод информации о работниках, которые хоть раз обслуживали клетки</h3>
        <div class="code">
            <code>
                select fio from public.worker
                where id in
                (select public.serving.worker_id from public.serving);
            </code>
        </div>
        <table class="table mb-3">
            <thead>
            <tr>
                <th>fio</th>
            </tr>
            </thead>
            <tbody>
            <?
            $query = "select fio from public.worker
where id in
(select public.serving.worker_id from public.serving);";
            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['fio'] . "</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>
```
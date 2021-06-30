<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Запросы</title>
</head>

<body>

    <?
    require_once "config.php";
    try {
        $db = new PDO("pgsql:host=" . dbconfig::$host . ";dbname=" . dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (\Throwable $th) {
        echo "<pre>" . $th . "</pre>";
    }

    ?>

    <h1>Запросы:</h1>

    <h3>Узнать дату, в которую водитель ездил на определенной машине:</h3>
    <div class="code">
        <code>
            select id, trip_date from trip where driver_id = 4 and car_id = 5;
        </code>
    </div>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>trip_date</th>
            </tr>
        </thead>
        <tbody>
            <?
            $query = "select id, trip_date from trip where driver_id = 4 and car_id = 5;";

            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['trip_date'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h3>Узнать, сколько поездок в этом году:</h3>
    <div class="code">
        <code>select count(*) from trip where extract(year from trip_date) = extract(year from now());</code>
    </div>
    <table>
        <thead>
            <tr>
                <th>count</th>
            </tr>
        </thead>
        <tbody>
            <?
            $query = "select count(*) from trip where extract(year from trip_date) = extract(year from now());";
            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['count'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h3>Вывести те путевые листы, где поездку выполнял четвертый водитель и пробег больше 200 км:</h3>
    <div class="code">
        <code>
            select * from waybill where trip_id in (select id from trip where driver_id = 4) and mileage_total > 200;
        </code>
    </div>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>point_of_loading</th>
                <th>point_of_unloading</th>
                <th>mileage_total</th>
                <th>mileage_cargo</th>
                <th>consignee</th>
                <th>order_time</th>
                <th>trip_id</th>
            </tr>
        </thead>
        <tbody>
            <?
            $query = "select * from waybill where trip_id in (select id from trip where driver_id = 4) and mileage_total > 200;";
            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['point_of_loading'] . "</td>";
                echo "<td>" . $row['point_of_unloading'] . "</td>";
                echo "<td>" . $row['mileage_total'] . "</td>";
                echo "<td>" . $row['mileage_cargo'] . "</td>";
                echo "<td>" . $row['consignee'] . "</td>";
                echo "<td>" . $row['order_time'] . "</td>";
                echo "<td>" . $row['trip_id'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h3>Узнать максимальный общий пробег, где либо время в пути от 5 часов, либо пробег с грузом больше 100 км:</h3>
    <div class="code">
        <code>
            select MAX(mileage_total) from waybill where order_time > 5 or mileage_cargo > 100;
        </code>
    </div>
    <table>
        <thead>
            <tr>
                <th>max</th>
            </tr>
        </thead>
        <tbody>
            <?
            $query = "select MAX(mileage_total) from waybill where order_time > 5 or mileage_cargo > 100;";
            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['max'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h3>Посчитать средний пробег у одного водителя:</h3>
    <div class="code">
        <code>
            select AVG(mileage_cargo) from waybill where trip_id in (select id from trip where driver_id = 4);
        </code>
    </div>
    <table>
        <thead>
            <tr>
                <th>AVG</th>
            </tr>
        </thead>
        <tbody>
            <?
            $query = "select AVG(mileage_cargo) from waybill where trip_id in (select id from trip where driver_id = 4);";
            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['avg'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
	</table>

	<a href='index.php'>Вернуться на главную</a>


    <style>
        table th,
        td {
            padding: 10px;
            border: 1px solid #000;
        }

        .code {
            margin-bottom: 5px;
            padding: 3px;
        }
    </style>

</body>

</html>

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

    <h3>Найти номера дешевле 1000, находящиеся не выше 1-го этажа:</h3>
    <div class="code">
        <code>
            SELECT * from hotel_number
            WHERE hotel_number.cost < 1500
            AND hotel_number.floor < 2;
        </code>
    </div>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>type</th>
                <th>cost</th>
                <th>floor</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            <?
            $query = "SELECT * from hotel_number
WHERE hotel_number.cost < 1500
AND hotel_number.floor < 2;";

            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row['cost'] . "</td>";
                echo "<td>" . $row['floor'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h3>Найти номера, в которых уборка проводиться после определенного времени в течении дня, а также после выбранной даты:</h3>
    <div class="code">
        <code>SELECT hotel_number.id, hotel_number.type, hotel_number.cost,
                    hotel_number.floor, hotel_number.status, clean.date AS clean_date, 
                    clean.time AS clean_time
                    FROM clean
                    JOIN hotel_number 
                    ON clean.hotel_number_id = hotel_number.id
                    WHERE clean.time > '10:00'
                    AND clean.date > '2021-02-21';</code>
    </div>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>type</th>
                <th>cost</th>
                <th>floor</th>
                <th>status</th>
                <th>clean_date</th>
                <th>clean_time</th>
            </tr>
        </thead>
        <tbody>
            <?
            $query = "SELECT hotel_number.id, hotel_number.type, hotel_number.cost,
                    hotel_number.floor, hotel_number.status, clean.date AS clean_date, 
                    clean.time AS clean_time
                    FROM clean
                    JOIN hotel_number 
                    ON clean.hotel_number_id = hotel_number.id
                    WHERE clean.time > '10:00'
                    AND clean.date > '2021-02-21';";

            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row['cost'] . "</td>";
                echo "<td>" . $row['floor'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['clean_date'] . "</td>";
                echo "<td>" . $row['clean_time'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h3>Найти данные о номере клиенте - время уборки; время, когда в номер заселелились; кто заселилися:</h3>
    <div class="code">
        <code>
            SELECT clean.time AS clean_time, clean.date AS clean_date, 
check_in.date AS check_in_date, klient.name
FROM public.clean
JOIN public.check_in
ON clean.hotel_number_id = check_in.hotel_number_id
JOIN public.klient
ON check_in.klient_id = klient.id;
        </code>
    </div>
    <table>
        <thead>
            <tr>
                <th>clean_time</th>
                <th>clean_date</th>
                <th>check_in_date</th>
                <th>name</th>
            </tr>
        </thead>
        <tbody>
            <?
            $query = "SELECT clean.time AS clean_time, clean.date AS clean_date, 
check_in.date AS check_in_date, klient.name
FROM public.clean
JOIN public.check_in
ON clean.hotel_number_id = check_in.hotel_number_id
JOIN public.klient
ON check_in.klient_id = klient.id; ";
            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['clean_time'] . "</td>";
                echo "<td>" . $row['clean_date'] . "</td>";
                echo "<td>" . $row['check_in_date'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h3>Вывести все номера с ценой за каждый и датой заселения, по которой список отсортирован:</h3>
    <div class="code">
        <code>
            SELECT hotel_number.id AS hotel_room, hotel_number.cost , check_in.date AS check_in_date
            FROM hotel_number
            JOIN check_in
            ON hotel_number.id = check_in.hotel_number_id
            ORDER BY check_in_date;
        </code>
    </div>
    <table>
        <thead>
            <tr>
                <th>hotel_room</th>
                <th>cost</th>
                <th>check_in_date</th>
            </tr>
        </thead>
        <tbody>
            <?
            $query = "SELECT hotel_number.id AS hotel_room, hotel_number.cost , check_in.date AS check_in_date
FROM hotel_number
JOIN check_in
ON hotel_number.id = check_in.hotel_number_id
ORDER BY check_in_date;";
            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['hotel_room'] . "</td>";
                echo "<td>" . $row['cost'] . "</td>";
                echo "<td>" . $row['check_in_date'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h3>Вывод средней стоимости всех газет:</h3>
    <div class="code">
        <code>
            SELECT AVG(price) FROM newspaper;
        </code>
    </div>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>date</th>
            </tr>
        </thead>
        <tbody>
            <?
            $query = "SELECT hotel_number.id, check_in.date
FROM hotel_number
JOIN check_in
ON hotel_number.id = check_in.hotel_number_id
WHERE hotel_number.id = 2;";
            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

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
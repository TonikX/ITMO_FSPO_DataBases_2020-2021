<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Запросы</title>
</head>
<body>
    
    <?php
        require_once "config.php";
        try {
            $db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (\Throwable $th) {
            echo "<pre>" . $th . "</pre>";
        }
        
    ?>

    <h1>Запросы:</h1>

    <h3>Вывести имя Авиаперевозчика и соответствующий ему самолёт:</h3> 
    <div class="code">
        <code>
        SELECT AirCarrier.name, Plane.Stamp FROM AirCarrier INNER JOIN Plane ON  idAirCarrier = idPlane;
        </code>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>Stamp</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT AirCarrier.name, Plane.Stamp FROM AirCarrier INNER JOIN Plane ON  idAirCarrier = idPlane;";
                $res = $db->query($query);
                while ($row = $res->fetch()) {
                    echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['stamp'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <h3>Выбрать пилота с именем Роман из сотрудников аэропорта:</h3> 
    <div class="code">
        <code>SELECT * FROM Member WHERE name = “Roman” AND role = “Pilot”;</code>
    </div>
    <table>
        <thead>
            <tr>
                <th>idMember</th>
                <th>Name</th>
                <th>Age</th>
                <th>Role</th>
                <th>Age_experience</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM Member WHERE name = 'Roman' AND role = 'Pilot';";
                $res = $db->query($query);
                while ($row = $res->fetch()) {
                    echo "<tr>";
                        echo "<td>" . $row['idmember'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['age'] . "</td>";
                        echo "<td>" . $row['role'] . "</td>";
                        echo "<td>" . $row['age_experience'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <h3>Вывести марку самолёта и соответствующую ей транзитную посадку:</h3>
    <div class="code">
        <code>
        SELECT Plane.Stamp, Transit_landings.Point_landings FROM Plane INNER JOIN Transit_landings ON  idPlane = idTransit_landings;
        </code> 
    </div>
    <table>
        <thead>
            <tr>
                <th>Stamp</th>
                <th>Point_landings</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT Plane.Stamp, Transit_landings.Point_landings FROM Plane INNER JOIN Transit_landings ON  idPlane = idTransit_landings;";
                $res = $db->query($query);
                while ($row = $res->fetch()) {
                    echo "<tr>";
                        echo "<td>" . $row['stamp'] . "</td>";
                        echo "<td>" . $row['point_landings'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <h3>Вернуть список рейсов, совершенных в 2021 году:</h3> 
    <div class="code">
        <code>
        SELECT * FROM Trip WHERE (SELECT EXTRACT(YEAR FROM Date_departure) = 2021);
        </code>
    </div>
    <table>
        <thead>
            <tr>
                <th>idTrip</th>
                <th>pointdeparture</th>
                <th>Destination</th>
                <th>Date_departure</th>
                <th>Date_destination</th>
                <th>Distance</th>
                <th>Tickets_sold</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM Trip WHERE (SELECT EXTRACT(YEAR FROM Date_departure) = 2021);";
                $res = $db->query($query);
                while ($row = $res->fetch()) {
                    echo "<tr>";
                        echo "<td>" . $row['idtrip'] . "</td>";
                        echo "<td>" . $row['pointdeparture'] . "</td>";
                        echo "<td>" . $row['destination'] . "</td>";
                        echo "<td>" . $row['date_departure'] . "</td>";
                        echo "<td>" . $row['date_destination'] . "</td>";
                        echo "<td>" . $row['distance'] . "</td>";
                        echo "<td>" . $row['tickets_sold'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <h3>Выбрать сотрудника с возрастом 30 лет и опытом работы 3 года:</h3> 
    <div class="code">
        <code>SELECT * FROM Member WHERE Age = 30 AND Age_experience = 3;</code>
    </div>
    <table>
        <thead>
            <tr>
                <th>idMember</th>
                <th>Name</th>
                <th>Age</th>
                <th>Role</th>
                <th>Age_experience</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM Member WHERE Age = 30 AND Age_experience = 3;";
                $res = $db->query($query);
                while ($row = $res->fetch()) {
                    echo "<tr>";
                        echo "<td>" . $row['idmember'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['age'] . "</td>";
                        echo "<td>" . $row['role'] . "</td>";
                        echo "<td>" . $row['age_experience'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

<style>
table th, td {
	padding: 10px;
	border: 1px solid #001;
    font-size: 120%; 
    font-family: Verdana, Arial, Helvetica, sans-serif;
    color: #900020;
}
.code {
    margin-bottom: 6px;
    padding: 4px;
    color: blue;
}
</style>

</body>
</html>
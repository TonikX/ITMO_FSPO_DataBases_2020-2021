<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web-site</title>
    <style>
        .tables {
            display: flex;
            justify-content: space-evenly;
        }

        .forms {
            display: flex;
            justify-content: space-evenly;
            margin-bottom: 50px;
        }

        .form_wrapper {
            display: block;
        }

        table {
            border: 2px solid black;
            border-collapse: collapse;
        }

        td {
            border: 2px solid black;
        }
    </style>
</head>
<body>

    <div class="forms">
        <div class="form_wrapper">
        <h3>Выборка</h3>
        <form action="select.php" method="get">
        <input type="radio" name="tables" value="diet" id="diet" />
        <label for="diet">Diet</label>
        <input type="radio" name="tables" value="breed" id="breed" />
        <label for="breed">Breed</label>
        <input type="radio" name="tables" value="chicken" id="chicken" />
        <label for="chicken">Chicken</label>
        <input type="radio" name="tables" value="worker" id="worker" />
        <label for="worker">Worker</label>
        <input type="radio" name="tables" value="department" id="department" />
        <label for="department">Department</label>
        <input type="radio" name="tables" value="cell" id="cell" />
        <label for="cell">Cell</label>
        <input type="radio" name="tables" value="cleaning" id="cleaning" />
        <label for="cleaning">Cleaning</label>
        <input type="radio" name="tables" value="maintenance" id="maintenance" />
        <label for="maintenance">Maintenance</label>
        <button type="submit">Вывести данные</button>
        </form>
        </div>

        <div class="form_wrapper">
        <h3>Удаление</h3>
        <form action="delete.php" method="get">
        <input type="radio" name="tables" value="diet" id="diet" />
        <label for="diet">Diet</label>
        <input type="radio" name="tables" value="breed" id="breed" />
        <label for="breed">Breed</label>
        <input type="radio" name="tables" value="chicken" id="chicken" />
        <label for="chicken">Chicken</label>
        <input type="radio" name="tables" value="worker" id="worker" />
        <label for="worker">Worker</label>
        <input type="radio" name="tables" value="department" id="department" />
        <label for="department">Department</label>
        <input type="radio" name="tables" value="cell" id="cell" />
        <label for="cell">Cell</label>
        <input type="radio" name="tables" value="cleaning" id="cleaning" />
        <label for="cleaning">Cleaning</label>
        <input type="radio" name="tables" value="maintenance" id="maintenance" />
        <label for="maintenance">Maintenance</label>
        <input type="number" name="id" placeholder="Id записи">
        <button type="submit">Удалить данные</button>
        </form>
        </div>

        <div class="form_wrapper">
        <h3>Добавление в таблицу Chicken</h3>
        <form action="insert.php" method="get">
        <input type="number" name="id" placeholder="chicken_id">
        <input type="number" name="weight" placeholder="weight">
        <input type="number" name="age" placeholder="age">
        <input type="number" name="kpd" placeholder="kpd">
        <input type="text" name="place" placeholder="place">
        <input type="number" name="breed" placeholder="breed">
        <button type="submit">Добавить данные</button>
        </form>
        </div>
    </div>
    <h1>Доказательство, что я умею выводить информацию:</h1>
    <div class="tables">
<?php
$dbuser = "postgres";
$dbpass = "root";
$host = "localhost";
$dbname="opbd";

$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stmt = $pdo->query("select * from chicken, breed order by chicken");
echo "<table>";
echo "<tr>";
echo "<td>" . "chicken_id" . "</td>";
echo "<td>" . "weight" . "</td>";
echo "<td>" . "age" . "</td>";
echo "<td>" . "kpd" . "</td>";
echo "<td>" . "place" . "</td>";
echo "<td>" . "breed" . "</td>";
echo "<td>" . "breed_id" . "</td>";
echo "</tr>";
while ($row = $stmt->fetch())
{

echo "<tr>";
echo "<td>" . $row["chicken_id"] . "</td>";
echo "<td>" . $row["weight"] . "</td>";
echo "<td>" . $row["age"] . "</td>";
echo "<td>" . $row["kpd"] . "</td>";
echo "<td>" . $row["place"] . "</td>";
echo "<td>" . $row["breed"] . "</td>";
echo "<td>" . $row["breed_id"] . "</td>";
echo "</tr>";
}
echo "</table>";

$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stmt = $pdo->query("select * from maintenance where (select extract(month from in_d) = 3) and chicken = 1");
echo "<table>";
echo "<tr>";
echo "<td>" . "maintenance_id" . "</td>";
echo "<td>" . "in_d" . "</td>";
echo "<td>" . "out_d" . "</td>";
echo "<td>" . "cell" . "</td>";
echo "<td>" . "chicken" . "</td>";
echo "</tr>";
while ($row = $stmt->fetch())
{

echo "<tr>";
echo "<td>" . $row["maintenance_id"] . "</td>";
echo "<td>" . $row["in_d"] . "</td>";
echo "<td>" . $row["out_d"] . "</td>";
echo "<td>" . $row["cell"] . "</td>";
echo "<td>" . $row["chicken"] . "</td>";
echo "</tr>";
}
echo "</table>";

$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stmt = $pdo->query("select concat(chicken_id, ' - ', place) as id_place from chicken");
echo "<table>";
echo "<tr>";
echo "<td>" . "id_place" . "</td>";
echo "</tr>";
while ($row = $stmt->fetch())
{

echo "<tr>";
echo "<td>" . $row["id_place"] . "</td>";
echo "</tr>";
}
echo "</table>";

$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stmt = $pdo->query("select * from breed where breed_id in (select breed from chicken where chicken_id = 2)");
echo "<table>";
echo "<tr>";
echo "<td>" . "breed_id" . "</td>";
echo "<td>" . "average_kpd" . "</td>";
echo "<td>" . "average_weight" . "</td>";
echo "</tr>";
while ($row = $stmt->fetch())
{

echo "<tr>";
echo "<td>" . $row["breed_id"] . "</td>";
echo "<td>" . $row["average_kpd"] . "</td>";
echo "<td>" . $row["average_weight"] . "</td>";
echo "</tr>";
}
echo "</table>";

$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stmt = $pdo->query("select sum(weight) as current, sum(average_weight) as target from chicken, breed where breed_id = 1");
echo "<table>";
echo "<tr>";
echo "<td>" . "current" . "</td>";
echo "<td>" . "target" . "</td>";
echo "</tr>";
while ($row = $stmt->fetch())
{

echo "<tr>";
echo "<td>" . $row["current"] . "</td>";
echo "<td>" . $row["target"] . "</td>";
echo "</tr>";
}
echo "</table>";

$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stmt = $pdo->query("select * from chicken");
echo "<table>";
echo "<tr>";
echo "<td>" . "chicken_id" . "</td>";
echo "<td>" . "weight" . "</td>";
echo "<td>" . "age" . "</td>";
echo "<td>" . "kpd" . "</td>";
echo "<td>" . "place" . "</td>";
echo "<td>" . "breed" . "</td>";
echo "</tr>";
while ($row = $stmt->fetch())
{

echo "<tr>";
echo "<td>" . $row["chicken_id"] . "</td>";
echo "<td>" . $row["weight"] . "</td>";
echo "<td>" . $row["age"] . "</td>";
echo "<td>" . $row["kpd"] . "</td>";
echo "<td>" . $row["place"] . "</td>";
echo "<td>" . $row["breed"] . "</td>";
echo "</tr>";
}
echo "</table>";
?>
</div>


</body>
</html>
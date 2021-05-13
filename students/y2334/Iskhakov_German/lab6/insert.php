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


    <?php
$dbuser = "postgres";
$dbpass = "root";
$host = "localhost";
$dbname="opbd";

$id = $_GET['id'];
$weight = $_GET['weight'];
$age = $_GET['age'];
$kpd = $_GET['kpd'];
$place = $_GET['place'];
$breed = $_GET['breed'];

$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stmt = $pdo->query("insert into chicken (chicken_id, weight, age, kpd, place, breed) values (" . $id . ", " . $weight . ", " . $age . ", " . $kpd . ", '" . $place . "', " . $breed . ")");

$tmp = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$result = $tmp->query('select * from chicken limit 1');
$fields = array_keys($result->fetch(PDO::FETCH_ASSOC));

$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stmt = $pdo->query("select * from chicken");
echo "<table>";
echo "<tr>";

foreach ($fields as $elem) {
    echo "<td>" . $elem . "</td>";
}
echo "</tr>";
while ($row = $stmt->fetch())
{

echo "<tr>";
foreach ($fields as $elem) {
    echo "<td>" . $row[$elem] . "</td>";
}
echo "</tr>";
}
echo "</table>";
?>

        <a href="part2.php"><button>Назад на главную</button></a>

</body>
</html>
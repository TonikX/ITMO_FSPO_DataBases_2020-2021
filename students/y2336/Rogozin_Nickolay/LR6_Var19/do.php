<?php
$mode = $_POST['mode'];
$table = $_POST['table'];

$dbuser = "postgres";
$dbpass = "";
$host = "localhost";
$dbname="opdb";

echo $mode;

$tmp = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

if (strcmp($mode, 'select') == 0){
    $result = $tmp->query('select * from '.$table);
    $fields = array_keys($result->fetch(PDO::FETCH_ASSOC));

    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
    $stmt = $pdo->query('select * from '.$table);
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
}
if (strcmp($mode, 'add') == 0){
    if (strcmp($table, 'animals') == 0){
        echo "<form action='add.php' method='post'>
<p>Тип</p>
<input type='text' name='type'>
<p>Дата рождения</p>
<input type='text' name='dob'>
<p>Пол</p>
<input type='text' name='sex'>
<input type='hidden' name='table' value='$table'>
<br>
<input type='submit'>
</form>";
    }
}
if (strcmp($mode, 'add') == 0){
    if (strcmp($table, 'overseer') == 0 || strcmp($table, 'doctor') == 0) {
        echo "<form action='add.php' method='post'>
<p>Имя</p>
<input type='text' name='name'>
<p>Контакты</p>
<input type='text' name='contacts'>
<p>Дата рождения</p>
<input type='text' name='sex'>
<input type='hidden' name='table' value='$table'>
<br>
<input type='submit'>
</form>";
    }
}

if (strcmp($mode, 'delete') == 0){
    echo "<form action='delete.php' method='post'>
<p>Id</p>
<input type='text' name='id'>
<input type='hidden' name='table' value='$table'>
<br>
<input type='submit'>
</form>";
}
?>
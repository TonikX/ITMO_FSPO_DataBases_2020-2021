<?php
$mode = $_POST['mode'];
$table = $_POST['table'];

$dbuser = "postgres";
$dbpass = "";
$host = "localhost";
$dbname="chicken";

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
    if (strcmp($table, 'director') == 0){
        echo "<form action='add.php' method='post'>
<p>Passport</p>
<input type='text' name='pass'>
<input type='hidden' name='table' value='$table'>
<br>
<input type='submit'>
</form>";
    }
}

if (strcmp($mode, 'add') == 0){
    if (strcmp($table, 'worker') == 0) {
        echo "<form action='add.php' method='post'>
<p>Passport</p>
<input type='text' name='pass'>
<p>Salary</p>
<input type='text' name='salary'>
<input type='hidden' name='table' value='$table'>
<br>
<input type='submit'>
</form>";
    }
}
if (strcmp($mode, 'add') == 0){
    if (strcmp($table, 'contract') == 0) {
        echo "<form action='add.php' method='post'>
<p>Counditions</p>
<input type='text' name='counditions'>
<p>Date Start</p>
<input type='date' name='date_start'>
<p>Date End</p>
<input type='date' name='date_end'>
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
<?php
$table = $_GET['table'];
$mode = $_GET['mode'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo "$table $mode" ?>
    </title>
</head>

<body>

<?php
echo "<h2>$table $mode</h2>";
?>

<form action="apply.php" method="post">

<?php
if (strcmp($table, 'animals') == 0 && strcmp($mode, 'add') == 0){
    echo "<input type = 'hidden' name='table' value='animals'>";
    echo "<input type = 'hidden' name='mode' value='add'>";
    echo "id<br>";
    echo "<input type = 'text' name='id'><br>";
    echo "type<br>";
    echo "<input type = 'text' name='type'><br>";
    echo "dob<br>";
    echo "<input type = 'text' name='dob'><br>";
    echo "sex<br>";
    echo "<input type = 'text' name='sex'><br>";
    echo "<input type='submit' value='Save'>" ;
}
if (strcmp($table, 'animals') == 0 && strcmp($mode, 'add') == 0){
    echo "<input type = 'hidden' name='table' value='animals'>";
    echo "<input type = 'hidden' name='mode' value='remove'>";
    echo "id<br>";
    echo "<input type = 'text' name='id'><br>";
    echo "<input type='submit' value='Save'>" ;
}
if (strcmp($table, 'animals') == 0 && strcmp($mode, 'add') == 0){
    echo "<input type = 'hidden' name='table' value='animals'>";
    echo "<input type = 'hidden' name='mode' value='select'>";
    echo "id<br>";
    echo "<input type = 'text' name='id'><br>";
    echo "<input type='submit' value='Save'>" ;
}
if (strcmp($table, 'doctor') == 0 && strcmp($mode, 'add') == 0){
    echo "<input type = 'hidden' name='table' value='doctor'>";
    echo "<input type = 'hidden' name='mode' value='add'>";
    echo "id<br>";
    echo "<input type = 'text' name='id'><br>";
    echo "name<br>";
    echo "<input type = 'text' name='name'><br>";
    echo "contacts<br>";
    echo "<input type = 'text' name='contacts'><br>";
    echo "dob<br>";
    echo "<input type = 'text' name='dob'><br>";
    echo "<input type='submit' value='Save'>" ;
}
if (strcmp($table, 'doctor') == 0 && strcmp($mode, 'add') == 0){
    echo "<input type = 'hidden' name='table' value='doctor'>";
    echo "<input type = 'hidden' name='mode' value='remove'>";
    echo "id<br>";
    echo "<input type = 'text' name='id'><br>";
    echo "<input type='submit' value='Save'>" ;
}
if (strcmp($table, 'doctor') == 0 && strcmp($mode, 'add') == 0){
    echo "<input type = 'hidden' name='table' value='doctor'>";
    echo "<input type = 'hidden' name='mode' value='select'>";
    echo "id<br>";
    echo "<input type = 'text' name='id'><br>";
    echo "<input type='submit' value='Save'>" ;
}
if (strcmp($table, 'overseer') == 0 && strcmp($mode, 'add') == 0){
    echo "<input type = 'hidden' name='table' value='overseer'>";
    echo "<input type = 'hidden' name='mode' value='add'>";
    echo "id<br>";
    echo "<input type = 'text' name='id'><br>";
    echo "name<br>";
    echo "<input type = 'text' name='name'><br>";
    echo "contacts<br>";
    echo "<input type = 'text' name='contacts'><br>";
    echo "dob<br>";
    echo "<input type = 'text' name='dob'><br>";
    echo "<input type='submit' value='Save'>" ;
}
if (strcmp($table, 'overseer') == 0 && strcmp($mode, 'add') == 0){
    echo "<input type = 'hidden' name='table' value='doctor'>";
    echo "<input type = 'hidden' name='mode' value='remove'>";
    echo "id<br>";
    echo "<input type = 'text' name='id'><br>";
    echo "<input type='submit' value='Save'>" ;
}
if (strcmp($table, 'overseer') == 0 && strcmp($mode, 'add') == 0){
    echo "<input type = 'hidden' name='table' value='doctor'>";
    echo "<input type = 'hidden' name='mode' value='select'>";
    echo "id<br>";
    echo "<input type = 'text' name='id'><br>";
    echo "<input type='submit' value='Save'>" ;
}
?>

</form>

</body>

</html>
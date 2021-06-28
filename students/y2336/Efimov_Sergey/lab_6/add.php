<?php
$table = $_POST['table'];
$pass = $_POST['pass'];
$salary = $_POST['salary'];
$counditions = $_POST['counditions'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];

$dbuser = "postgres";
$dbpass = "";
$host = "localhost";
$dbname="opdb";
$tmp = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

echo $table;

if (strcmp($table, 'director')==0){
    $statement = "insert into director (pass) values ('$pass')";
    $result = $tmp->query($statement);
}

if (strcmp($table, 'contract')==0){
    $statement = "insert into ".$table." (counditions, date_start, date_end) values ('$counditions','$date_start', '$date_end')";
    $result = $tmp->query($statement);
}
if (strcmp($table, 'worker')==0){
    $statement = "insert into ".$table." (pass, salary) values ('$pass','$salary')";
    $result = $tmp->query($statement);
}


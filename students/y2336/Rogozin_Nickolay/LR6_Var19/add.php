<?php
$table = $_POST['table'];
$type = $_POST['type'];
$dob = $_POST['dob'];
$name = $_POST['name'];
$contacts = $_POST['contacts'];
$sex = $_POST['sex'];

$dbuser = "postgres";
$dbpass = "";
$host = "localhost";
$dbname="opdb";
$tmp = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

echo $table;

if (strcmp($table, 'animals')==0){
    $statement = "insert into animals (type, dob, sex) values ('$type','$dob', '$sex')";
    $result = $tmp->query($statement);
}

if (strcmp($table, 'overseer')==0 || strcmp($table, 'doctor')==0 ){
    $statement = "insert into ".$table." (name, contacts, dob) values ('$name','$contacts', '$dob')";
    $result = $tmp->query($statement);
}


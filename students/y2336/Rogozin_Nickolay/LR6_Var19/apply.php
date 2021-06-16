<?php

$table = $_POST['table'];
$mode = $_GET['mode'];
$id = $_POST['id'];
$type = $_POST['type'];
$dob = $_POST['dob'];
$sex = $_POST['sex'];
$name = $_POST['name'];
$contacts = $_POST['contacts'];
$sql = '';

if ( strcmp($table, 'animals') == 0 && strcmp($mode, 'add') == 0 ){
    $sql = 'INSERT INTO $table VALUES ($id, "$type", "$dob", "$sex")';
}

if ( strcmp($table, 'animals') == 0 && strcmp($mode, 'remove') == 0 ){
    $sql = 'DELETE FROM $table WHERE id = $id';
}

if ( strcmp($table, 'animals') == 0 && strcmp($mode, 'remove') == 0 ){
    $sql = 'SELECT * FROM $table WHERE id = $id';
}

if ( strcmp($table, 'doctor') == 0 && strcmp($mode, 'add') == 0 ){
    $sql = 'INSERT INTO $table VALUES ($id, "$name", "$contacts", "$dob")';
}

if ( strcmp($table, 'doctor') == 0 && strcmp($mode, 'remove') == 0 ){
    $sql = 'DELETE FROM $table WHERE id = $id';
}

if ( strcmp($table, 'doctor') == 0 && strcmp($mode, 'remove') == 0 ){
    $sql = 'SELECT * FROM $table WHERE id = $id';
}

if ( strcmp($table, 'overseer') == 0 && strcmp($mode, 'add') == 0 ){
    $sql = 'INSERT INTO $table VALUES ($id, "$name", "$contacts", "$dob")';
}

if ( strcmp($table, 'overseer') == 0 && strcmp($mode, 'remove') == 0 ){
    $sql = 'DELETE FROM $table WHERE id = $id';
}

if ( strcmp($table, 'overseer') == 0 && strcmp($mode, 'remove') == 0 ){
    $sql = 'SELECT * FROM $table WHERE id = $id';
}

try {
    $dsn = 'pgsql:dbname=postgres;host=127.0.0.1';
    $user = 'postgres';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $res = $dbh->query($sql);
    exit();
}catch (\Throwable $th){
    echo "<pre>" . $th . "</pre>";
}

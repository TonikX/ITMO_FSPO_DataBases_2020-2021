<?php
$table = $_POST['table'];
$id = $_POST['id'];

$dbuser = "postgres";
$dbpass = "";
$host = "localhost";
$dbname="opdb";
$tmp = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$statement = "delete from ".$table." where id = ".$id;
$result = $tmp->query($statement);

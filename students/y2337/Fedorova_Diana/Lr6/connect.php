<?php 

$dbconn = pg_connect("host=localhost dbname=zoo user=postgres password=12345678")
    or die('Не удалось соединиться: ' . pg_last_error());
?>



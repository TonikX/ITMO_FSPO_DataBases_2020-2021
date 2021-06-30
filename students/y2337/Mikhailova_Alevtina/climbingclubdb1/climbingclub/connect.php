<?php 

$dbconn = pg_connect("host=localhost dbname=climbingclubdb user=postgres password=1234")
    or die('Не удалось соединиться: ' . pg_last_error());
?>



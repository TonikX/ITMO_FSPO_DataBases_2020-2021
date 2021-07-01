<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INSERT</title>
	<link rel="styledheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h2>Введите данные о клиенте:</h2>
<form method="POST" action="client_insert.php">
    Введите id клиента:
    <input name="id" type="number">
    <p>Введите полное имя :
    <input name="fio" type="text"></p>
    <p>Введите паспортные данные:
    <input name="passport_data" type="text"></p>
    <p>Введите id города:
    <input name="city_id" type="number">
    <p><INPUT type='submit' value="Добавить"></p>
</form>

    <form method="LINK" action="client.php">
        <input type="submit" value="К выбору действия">
    </form>

    <form method="LINK" action="index.php">
        <input type="submit" value="Меню">
    </form>
    
<?php
if (isset($_POST['id'])) {
    $dbuser = 'postgres';
    $dbpass = '12345';
    $host = 'localhost';
    $dbname = 'hotel';
    $db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
    $result = pg_query($db, "INSERT INTO \"hotel\".client (id, fio, passport_data, city_id) VALUES ('{$_POST['id']}', '{$_POST['fio']}','{$_POST['passport_data']}','{$_POST['city_id']}')");
}
?>
</body>
</html>
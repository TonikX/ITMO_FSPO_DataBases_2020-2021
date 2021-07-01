<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INSERT</title>
	<link rel="styledheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h2>Введите данные о городе:</h2>
<form method="POST" action="cleaning_insert.php">
    Введите id уборки:
    <input name="id" type="number">
    <p>Введите дату уборки:
    <input name="date" type="date">
    <p>Введите этаж уборки:
    <input name="floor" type="number">
    <p>Введите id администратора:
    <input name="admin_id" type="number">
    <p>Введите id служащего:
    <input name="servant_id" type="number">
    <p>Введите id номера:
    <input name="suite_id" type="number">
    <p><INPUT type='submit' value="Добавить"></p>
</form>

    <form method="LINK" action="cleaning.php">
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
    $result = pg_query($db, "INSERT INTO \"hotel\".cleaning (id, date, floor, admin_id, servant_id, suite_id) VALUES ('{$_POST['id']}', '{$_POST['date']}','{$_POST['floor']}','{$_POST['admin_id']}','{$_POST['servant_id']}','{$_POST['suite_id']}')");
}
?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INSERT</title>
	<link rel="styledheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h2>Введите данные о номере:</h2>
<form method="POST" action="suite_insert.php">
    Введите id номера:
    <input name="id" type="number">
    <p>Введите статус номера:
    <input name="status" type="boolean">
    <p>Введите номер номера:
    <input name="number" type="number">
    <p>Введите кол-во комнат:
    <input name="rooms" type="number">
    <p>Введите цену номера:
    <input name="price" type="number">
    <p>Введите этаж:
    <input name="floor" type="number">
    <p><INPUT type='submit' value="Добавить"></p>
</form>

    <form method="LINK" action="suite.php">
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
    $result = pg_query($db, "INSERT INTO \"hotel\".suite (id, status, number, rooms, price, floor) VALUES ('{$_POST['id']}', '{$_POST['status']}','{$_POST['number']}','{$_POST['rooms']}','{$_POST['price']}','{$_POST['floor']}')");
}
?>
</body>
</html>
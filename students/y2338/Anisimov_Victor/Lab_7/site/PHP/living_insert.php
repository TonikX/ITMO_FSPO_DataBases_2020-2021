<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INSERT</title>
	<link rel="styledheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h2>Введите данные о проживании:</h2>
<form method="POST" action="living_insert.php">
    Введите id проживания:
    <input name="id" type="number">
    <p>Введите дату въезда:
    <input name="date_in" type="date">
    <p>Введите дату выезда:
    <input name="date_out" type="date">
    <p>Введите id администратора:
    <input name="admin_id" type="number">
    <p>Введите id номера:
    <input name="suite_id" type="number">
    <p>Введите id проживающего:
    <input name="client_id" type="number">
    <p><INPUT type='submit' value="Добавить"></p>
</form>

    <form method="LINK" action="living.php">
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
    $result = pg_query($db, "INSERT INTO \"hotel\".living (id, date_in, date_out, admin_id, suite_id, client_id) VALUES ('{$_POST['id']}', '{$_POST['date_in']}','{$_POST['date_out']}','{$_POST['admin_id']}','{$_POST['suite_id']}','{$_POST['client_id']}')");
}
?>
</body>
</html>
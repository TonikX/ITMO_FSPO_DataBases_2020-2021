<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INSERT</title>
	<link rel="styledheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h2>Введите данные об администраторе:</h2>
<form method="POST" action="admin_insert.php">
    Введите id администратора:
    <input name="id" type="number">
    <p>Введите полное имя:
    <input name="fio" type="text"></p>
    <p><INPUT type='submit' value="Добавить"></p>
</form>

    <form method="LINK" action="admin.php">
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
    $result = pg_query($db, "INSERT INTO admin VALUES ('{$_POST['id']}', '{$_POST['fio']}')");
}
?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INSERT</title>
</head>
<body>
<h2>Введите данные о городе:</h2>
<form method="POST" action="city_insert.php">
    Введите id города:
    <input name="id" type="number">
    <p>Введите название города:
    <input name="name" type="text"></p>
    <p><INPUT type='submit' value="Добавить"></p>
</form>

    <form method="LINK" action="city.php">
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
    $result = pg_query($db, "INSERT INTO \"hotel\".city (id, name) VALUES ('{$_POST['id']}', '{$_POST['name']}')");
}
?>
</body>
</html>
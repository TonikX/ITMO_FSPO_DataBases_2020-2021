<!DOCTYPE html>
<head>
    <title>UPDATE</title>
</head>
<body>
<h3>Введите id удаляемого города:</h3>
<form action="city_delete.php" method="POST">
    <p>id выставки:
        <input type="number" name='city'>
        <input type="submit" name="submit" value="Удалить"></p>

</form>
<?php
$dbuser = 'postgres';
$dbpass = '12345';
$host = 'localhost';
$dbname = 'hotel';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
if (isset($_POST['city'])) {
    $result = pg_query($db, "SELECT *	FROM \"hotel\".city WHERE id_city = '{$_POST['city']}'");
    if (pg_num_rows($result) == 0) {
        echo "Warning: Город с таким id не найден, увы";
    } else {
        $result = pg_query($db, "DELETE FROM \"hotel\".city WHERE id_city = '{$_POST['city']}'");
        echo "Удаление выполнено";
    }
}
?>
    <form method="LINK" action="city.php">
        <input type="submit" value="К выбору действия">
    </form>

    <form method="LINK" action="index.php">
        <input type="submit" value="Меню">
    </form>
</body>
</html>
<!DOCTYPE html>
<head>
    <title>UPDATE</title>
	<link rel="styledheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h3>Введите id удаляемого проживания:</h3>
<form action="living_delete.php" method="POST">
    <p>id выставки:
        <input type="number" name='living'>
        <input type="submit" name="submit" value="Удалить"></p>

</form>
<?php
$dbuser = 'postgres';
$dbpass = '12345';
$host = 'localhost';
$dbname = 'hotel';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
if (isset($_POST['living'])) {
    $result = pg_query($db, "SELECT *	FROM \"hotel\".living WHERE id_living = '{$_POST['living']}'");
    if (pg_num_rows($result) == 0) {
        echo "Warning: Проживание с таким id не найдено";
    } else {
        $result = pg_query($db, "DELETE FROM \"hotel\".living WHERE id_living = '{$_POST['living']}'");
        echo "Удаление выполнено";
    }
}
?>
    <form method="LINK" action="living.php">
        <input type="submit" value="К выбору действия">
    </form>

    <form method="LINK" action="index.php">
        <input type="submit" value="Меню">
    </form>
</body>
</html>
<!DOCTYPE html>
<head>
    <title>UPDATE</title>
	<link rel="styledheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h3>Введите id удаляемого служащего:</h3>
<form action="servant_delete.php" method="POST">
    <p>id выставки:
        <input type="number" name='servant'>
        <input type="submit" name="submit" value="Удалить"></p>

</form>
<?php
$dbuser = 'postgres';
$dbpass = '12345';
$host = 'localhost';
$dbname = 'hotel';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
if (isset($_POST['servant'])) {
    $result = pg_query($db, "SELECT *	FROM \"hotel\".servant WHERE id_servant = '{$_POST['servant']}'");
    if (pg_num_rows($result) == 0) {
        echo "Warning: Служащий с таким id не найден";
    } else {
        $result = pg_query($db, "DELETE FROM \"hotel\".servant WHERE id_servant = '{$_POST['servant']}'");
        echo "Удаление выполнено";
    }
}
?>
    <form method="LINK" action="servant.php">
        <input type="submit" value="К выбору действия">
    </form>

    <form method="LINK" action="index.php">
        <input type="submit" value="Меню">
    </form>
</body>
</html> 	
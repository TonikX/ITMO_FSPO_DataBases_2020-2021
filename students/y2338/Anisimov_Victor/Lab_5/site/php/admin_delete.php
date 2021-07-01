<!DOCTYPE html>
<head>
    <title>UPDATE</title>
	<link rel="styledheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h3>Введите id удаляемого администратора:</h3>
<form action="admin_delete.php" method="POST">
    <p>id выставки:
        <input type="number" name='admin'>
        <input type="submit" name="submit" value="Удалить"></p>

</form>
<?php
$dbuser = 'postgres';
$dbpass = '12345';
$host = 'localhost';
$dbname = 'hotel';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
if (isset($_POST['admin'])) {
    $result = pg_query($db, "SELECT *	FROM admin WHERE id_admin = '{$_POST['admin']}'");
    if (pg_num_rows($result) == 0) {
        echo "Warning: Администратор с таким id не найден";
    } else {
        $result = pg_query($db, "DELETE FROM admin WHERE id_admin = '{$_POST['admin']}'");
        echo "Удаление выполнено";
    }
}
?>
    <form method="LINK" action="admin.php">
        <input type="submit" value="К выбору действия">
    </form>

    <form method="LINK" action="index.php">
        <input type="submit" value="Меню">
    </form>
</body>
</html> 	
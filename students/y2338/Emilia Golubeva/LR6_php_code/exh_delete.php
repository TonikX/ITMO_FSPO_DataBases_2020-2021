<!DOCTYPE html>
<head>
    <title>UPDATE</title>
</head>
<body>
<h3>Введите id удаляемой выставки</h3>
<form action="exh_delete.php" method="POST">
    <p>id выставки:
        <input type="number" name='exhibit'>
        <input type="submit" name="submit" value="Удалить"></p>

</form>
<?php
$dbuser = 'postgres';
$dbpass = '333';
$host = 'localhost';
$dbname = 'exhibition';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
if (isset($_POST['exhibit'])) {
    $result = pg_query($db, "SELECT *	FROM \"public\".exhibit WHERE id_exhibit = '{$_POST['exhibit']}'");
    if (pg_num_rows($result) == 0) {
        echo "Warning: Пользователь с таким id не найден";
    } else {
        $result = pg_query($db, "DELETE FROM \"public\".exhibit WHERE id_exhibit = '{$_POST['exhibit']}'");
        echo "Удаление выполнено";
    }
}
?>
    <form method="LINK" action="exh.php">
        <input type="submit" value="К выбору действия">
    </form>

    <form method="LINK" action="index.php">
        <input type="submit" value="Меню">
    </form>
</body>
</html>

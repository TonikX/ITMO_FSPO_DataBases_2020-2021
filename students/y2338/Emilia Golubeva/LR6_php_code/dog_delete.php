<!DOCTYPE html>
<head>
    <title>UPDATE</title>
</head>
<body>
<h3>Введите id удаляемого участника</h3>
<form action="dog_delete.php" method="POST">
    <p>id собаки участника:
        <input type="number" name='dog'>
        <input type="submit" name="submit" value="Удалить"></p>

</form>
<?php
$dbuser = 'postgres';
$dbpass = '333';
$host = 'localhost';
$dbname = 'exhibition';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
if (isset($_POST['dog'])) {
    $result = pg_query($db, "SELECT *	FROM \"public\".dog WHERE id_dog = '{$_POST['dog']}'");
    if (pg_num_rows($result) == 0) {
        echo "Warning: Пользователь с таким id не найден";
    } else {
        $result = pg_query($db, "DELETE FROM \"public\".dog WHERE id_dog = '{$_POST['dog']}'");
        echo "Удаление выполнено";
    }
}
?>
    <form method="LINK" action="dog.php">
        <input type="submit" value="К выбору действия">
    </form>

    <form method="LINK" action="index.php">
        <input type="submit" value="Меню">
    </form>
</body>
</html>

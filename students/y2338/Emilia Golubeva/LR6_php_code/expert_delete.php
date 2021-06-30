<!DOCTYPE html>
<head>
    <title>UPDATE</title>
</head>
<body>
<h3>Введите id удаляемого эксперта</h3>
<form action="expert_delete.php" method="POST">
    <p>id эксперта:
        <input type="number" name='expert'>
        <input type="submit" name="submit" value="Удалить"></p>

</form>
<?php
$dbuser = 'postgres';
$dbpass = '333';
$host = 'localhost';
$dbname = 'exhibition';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
if (isset($_POST['expert'])) {
    $result = pg_query($db, "SELECT *	FROM \"public\".expert WHERE id_expert = '{$_POST['expert']}'");
    if (pg_num_rows($result) == 0) {
        echo "Warning: Пользователь с таким id не найден";
    } else {
        $result = pg_query($db, "DELETE FROM \"public\".expert WHERE id_expert = '{$_POST['expert']}'");
        echo "Удаление выполнено";
    }
}
?>
    <form method="LINK" action="expert.php">
        <input type="submit" value="К выбору действия">
    </form>

    <form method="LINK" action="index.php">
        <input type="submit" value="Меню">
    </form>
</body>
</html>

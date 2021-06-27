<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INSERT</title>
</head>
<body>
<h2>Введите данные о добавляемой выставке:</h2>
<form method="POST" action="exh_insert.php">
    Введите id выставки:
    <input name="id_exhibit" type="number">
    <p>Введите тип выставки:
        <input name="type_exhibit" type="text"></p>

    <p><INPUT type='submit' value="Добавить"></p>
</form>

    <form method="LINK" action="exh.php">
        <input type="submit" value="К выбору действия">
    </form>

    <form method="LINK" action="index.php">
        <input type="submit" value="Меню">
    </form>
    
<?php
if (isset($_POST['exhibit'])) {
    $dbuser = 'postgres';
    $dbpass = '333';
    $host = 'localhost';
    $dbname = 'exhibition';
    $db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
    $result = pg_query($db, "INSERT INTO \"public\".exhibit (id_exhibit, type_exhibit) VALUES ('{$_POST['id_exhibit']}', '{$_POST['type_exhibit']}')");
}
?>
</body>
</html>
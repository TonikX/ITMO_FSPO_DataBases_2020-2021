<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INSERT</title>
</head>
<body>
<h2>Введите данные об участнике:</h2>
<form method="POST" action="dog_insert.php">
    Введите id собаки:
    <input name="id_dog" type="number">
    <p>Введите имя собаки:
        <input name="dog_name" type="text"></p>
    <p>Введите номер паспорт:
        <input name="pasport" type="number"></p>
    Введите статус контракта
    <SELECT name="contract">
        <option value='t'>да</option>
        <option value='f'>нет</option>
    </SELECT>
    <p>Введите название клуба:
        <input name="id_dog_club" type="number"></p>

    <p><INPUT type='submit' value="Добавить"></p>
</form>

    <form method="LINK" action="dog.php">
        <input type="submit" value="К выбору действия">
    </form>

    <form method="LINK" action="index.php">
        <input type="submit" value="Меню">
    </form>
    
<?php
if (isset($_POST['dog'])) {
    $dbuser = 'postgres';
    $dbpass = '333';
    $host = 'localhost';
    $dbname = 'exhibition';
    $db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
    $result = pg_query($db, "INSERT INTO \"public\".dog (id_dog, dog_name, pasport, contract, id_dog_club) VALUES ('{$_POST['id_dog']}', '{$_POST['dog_name']}', '{$_POST['pasport']}', '{$_POST['contract']}','{$_POST['id_dog_club']}')");
}
?>
</body>
</html>
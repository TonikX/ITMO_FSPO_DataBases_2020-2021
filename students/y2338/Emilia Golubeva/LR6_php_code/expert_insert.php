<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INSERT</title>
</head>
<body>
<h2>Введите данные об экспертах:</h2>
<form method="POST" action="expert_insert.php">
    Введите id эксперта:
    <input name="id_expert" type="number">
    <p>Введите имя и фамилию эксперта:
        <input name="full_name" type="text"></p>
    <p>Введите название клуба:
        <input name="expert_club" type="text"></p>
    Введите статус контракта
    <SELECT name="contract">
        <option value='t'>да</option>
        <option value='f'>нет</option>
    </SELECT>

    <p><INPUT type='submit' value="Добавить"></p>
</form>

    <form method="LINK" action="expert.php">
        <input type="submit" value="К выбору действия">
    </form>

    <form method="LINK" action="index.php">
        <input type="submit" value="Меню">
    </form>
    
<?php
if (isset($_POST['expert'])) {
    $dbuser = 'postgres';
    $dbpass = '333';
    $host = 'localhost';
    $dbname = 'exhibition';
    $db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
    $result = pg_query($db, "INSERT INTO \"public\".expert (id_expert, full_name, expert_club, contract) VALUES ('{$_POST['id_expert']}', '{$_POST['full_name']}', '{$_POST['expert_club']}', '{$_POST['contract']}')");
}
?>
</body>
</html>
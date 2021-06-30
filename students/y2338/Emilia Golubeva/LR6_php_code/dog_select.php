<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SELECT</title>
</head>
<body> 
    <h2>Участники выставки</h2>
<?php
$dbuser = 'postgres';
$dbpass = '333';
$host = 'localhost';
$dbname='exhibition';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$result = pg_query($db, "SELECT * FROM \"public\".dog");
$arr = pg_fetch_all($result);
    if ($result){
	foreach ($arr as &$row) {
  echo <<<OUT
<ul>
	<h3>$row[id_dog] участник</h3>
	<li>Имя: $row[dog_name]</li>
 	<li>Паспорт №: $row[pasport]</li>
	<li>Статус участия: $row[contract]</li>
	<li>Номер клуба: $row[id_dog_club]</li>
</ul>
OUT;
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
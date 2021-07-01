<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SELECT</title>
	<link rel="styledheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body> 
<?php
$dbuser = 'postgres';
$dbpass = '12345';
$host = 'localhost';
$dbname='hotel';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$result = pg_query($db, "SELECT * FROM \"hotel\".suite");
$arr = pg_fetch_all($result);
    if ($result){
	foreach ($arr as &$row) {
  echo <<<OUT
<ul>
	<h3>Номер №$row[id] </h3>
	<li>Номер номера: $row[number]</li>
 	<li>Статус: $row[status]</li>
	<li>Кол-во комнат: $row[rooms_number]</li>
	<li>Цена: $row[cost]</li>
	<li>Этаж: $row[floor]</li>
</ul>
OUT;
}
}

?>
    <form method="LINK" action="suite.php">
        <input type="submit" value="К выбору действия">
    </form>
    
    <form method="LINK" action="index.php">
        <input type="submit" value="Меню">
    </form>
</body>
</html> 
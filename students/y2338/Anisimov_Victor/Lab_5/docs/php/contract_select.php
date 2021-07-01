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
$result = pg_query($db, "SELECT * FROM \"hotel\".contract");
$arr = pg_fetch_all($result);
    if ($result){
	foreach ($arr as &$row) {
  echo <<<OUT
<ul>
	<h3>Контракт №$row[id] </h3>
	<li>Статус: $row[status]</li>
	<li>Текст договора: $row[text]</li>
 	<li>Дата подписания: $row[date_of_agreement]</li>
    <li>Администратор: $row[admin_id]</li>
	<li>Нанимаемый: $row[serv_id]</li>
</ul>
OUT;
}
}

?>
    <form method="LINK" action="contract
.php">
        <input type="submit" value="К выбору действия">
    </form>
    
    <form method="LINK" action="index.php">
        <input type="submit" value="Меню">
    </form>
</body>
</html> 
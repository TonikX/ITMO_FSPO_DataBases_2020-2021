<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SELECT</title>
</head>
<body> 
<?php
$dbuser = 'postgres';
$dbpass = '12345';
$host = 'localhost';
$dbname='hotel';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$result = pg_query($db, "SELECT * FROM \"hotel\".city");
$arr = pg_fetch_all($result);
    if ($result){
	foreach ($arr as &$row) {
  echo <<<OUT
<ul>
	<h3>Город №$row[id] </h3>
	<li>Название: $row[fio]</li>
 	<li>Паспортные данные: $row[passport_data]</li>
	<li>Город: $row[city_id]</li>
</ul>
OUT;
}
}

?>
    <form method="LINK" action="city.php">
        <input type="submit" value="К выбору действия">
    </form>
    
    <form method="LINK" action="index.php">
        <input type="submit" value="Меню">
    </form>
</body>
</html> 
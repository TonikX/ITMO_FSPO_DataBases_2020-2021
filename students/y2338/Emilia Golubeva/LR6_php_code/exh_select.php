<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SELECT</title>
</head>
<body> 
<?php
$dbuser = 'postgres';
$dbpass = '333';
$host = 'localhost';
$dbname='exhibition';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$result = pg_query($db, "SELECT * FROM \"public\".exhibit");
$arr = pg_fetch_all($result);
    if ($result){
	foreach ($arr as &$row) {
  echo <<<OUT
<ul>
	<h3>Информация о выставке №$row[id_exhibit]</h3>
 	<li>Тип выставки: $row[type_exhibit]</li>
</ul>
OUT;
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
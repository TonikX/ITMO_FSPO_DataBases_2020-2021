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
$result = pg_query($db, "SELECT * FROM admin");
$arr = pg_fetch_all($result);
    if ($result){
	foreach ($arr as &$row) {
  echo <<<OUT
  <div class="container mt-4">
	<p style="text-align: justify;">
	<ul>
	<h3>Администратор №$row[id] </h3>
	<li>ФИО: $row[fio]</li>
</ul>
</div>
OUT;
}
}

?>
<div class="container mt-4">
	<p style="text-align: justify;">
    <form method="LINK" action="admin.php">
        <input type="submit" value="К выбору действия">
    </form>
    
    <form method="LINK" action="index.php">
        <input type="submit" value="Меню">
    </form>
</div>
</div>
</body>
</html> 
<!DOCTYPE html>
<head>
    <title>UPDATE</title>
	<link rel="styledheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class='container mt-4'>
	<p style='text-align: justify;'>
<h3>Введите id администратора</h3>
<form action="admin_update.php" method="POST">
    <p>id участника:
        <input type="number" name='admin'>
        <input type="submit" name="submit" value="Ввести"></p>
	</div>
</form>

<?php
error_reporting(E_ERROR | E_PARSE);
$dbuser = 'postgres';
$dbpass = '12345';
$host = 'localhost';
$dbname = 'hotel';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");

if (isset($_POST['id_updated'])){
		$q = $_POST['id_updated'];
		$b = $_POST['fio_updated'];
		$a = $_POST['id_old'];
		$result = pg_query_params($db, "UPDATE admin SET
                                id = $1,
                                fio = $2
                            WHERE id = $3", array($q, $b, $a));
		}

if (isset($_POST['admin'])) {
    $result = pg_query($db, "SELECT * FROM admin WHERE id = '{$_POST['admin']}'");
    $row = pg_fetch_assoc($result);

    if (pg_num_rows($result)==0){
        echo"
	<div class='container mt-4'>
	<p style='text-align: justify;'>Администратор с таким id не найден</div>";
    } else {
        echo "
	<div class='container mt-4'>
	<p style='text-align: justify;'>
        <form action='admin_update.php' method='POST' >
        <h3> Изменить данные для: </h3>
            <ul>id администратора : 
        <input type='number' name='id_old'  value='$_POST[admin]'></p>
        <h3> Новые данные </h3>
            <ul>id администратора : 
        <input type='number' name='id_updated'  value='$_POST[admin]'></p>
	        <p>ФИО: 
	    <input type='text' name='fio_updated' value='$row[fio]'></p>";
        echo "
	    <p><input type='submit' name='new' value='Обновить' /></p>
        </form>
		</div>";
	
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
</body>
</html>
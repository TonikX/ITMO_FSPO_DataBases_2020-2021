<!DOCTYPE html>
<head>
    <title>UPDATE</title>
	<link rel="styledheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h3>Введите id работника</h3>
<form action="servant_update.php" method="POST">
    <p>id участника:
        <input type="number" name='servant'>
        <input type="submit" name="submit" value="Ввести"></p>
</form>

<?php
error_reporting(E_ERROR | E_PARSE);
$dbuser = 'postgres';
$dbpass = '12345';
$host = 'localhost';
$dbname = 'hotel';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");

if (isset($_POST['id_updated'])
  ||isset($_POST['fio_updated'])){
   $result = pg_query($db, "UPDATE \"hotel\".servant SET
                                id = '{$_POST['id_updated']}',
                                fio = '{$_POST['number_updated']}'
                            WHERE id = '{$_POST['id_updated']}'");

}

if (isset($_POST['servant'])) {
    $result = pg_query($db, "SELECT * FROM \"hotel\".servant WHERE id = '{$_POST['servant']}'");

    $row = pg_fetch_assoc($result);

    if (pg_num_rows($result)==0){
        echo"Работник с таким id не найден";
    } else {
        echo "
            <form action='servant_update.php' method='POST' >
            <h3> Внесите изменяемые данные </h3>
                <ul>id работника : 
            <input type='number' name='id_updated'  value='$_POST[servant]'></p>
	            <p>ФИО: 
	        <input type='number' name='fio_updated' value='$row[fio]'></p>";
        echo "
	        <p><input type='submit' name='new' value='Обновить' /></p>
            </form>";
    }
}

?>
    <form method="LINK" action="servant.php">
        <input type="submit" value="К выбору действия">
    </form>
    
    <form method="LINK" action="index.php">
        <input type="submit" value="Меню">
    </form>
</body>
</html>
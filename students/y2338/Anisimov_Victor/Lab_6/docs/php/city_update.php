<!DOCTYPE html>
<head>
    <title>UPDATE</title>
</head>
<body>
<h3>Введите id города</h3>
<form action="city_update.php" method="POST">
    <p>id участника:
        <input type="number" name='city'>
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
  ||isset($_POST['name_updated'])){
   $result = pg_query($db, "UPDATE \"hotel\".city SET
                                id = '{$_POST['id_updated']}',
                                name = '{$_POST['name_updated']}'
                            WHERE id = '{$_POST['id_updated']}'");

}

if (isset($_POST['city'])) {
    $result = pg_query($db, "SELECT * FROM \"hotel\".city WHERE id = '{$_POST['city']}'");

    $row = pg_fetch_assoc($result);

    if (pg_num_rows($result)==0){
        echo"Город с таким id не найден";
    } else {
        echo "
            <form action='city_update.php' method='POST' >
            <h3> Внесите изменяемые данные </h3>
                <ul>Новый id города : 
            <input type='number' name='id_updated'  value='$_POST[city]'></p>
	            <p>Новое название: 
	        <input type='number' name='name_updated' value='$row[name]'></p>";
        echo "
	        <p><input type='submit' name='new' value='Обновить' /></p>
            </form>";
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
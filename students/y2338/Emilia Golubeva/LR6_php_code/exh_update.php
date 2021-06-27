<!DOCTYPE html>
<head>
    <title>UPDATE</title>
</head>
<body>
<h3>Введите id выставки</h3>
<form action="exh_update.php" method="POST">
    <p>id выставки:
        <input type="number" name='exhibit'>
        <input type="submit" name="submit" value="Ввести"></p>
</form>
<?php
error_reporting(E_ERROR | E_PARSE);
#$owner_id = $_POST['exh'];
#echo $_POST['exh'];
#echo $id_exhibtion;
$dbuser = 'postgres';
$dbpass = '333';
$host = 'localhost';
$dbname = 'exhibition';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
if (isset($_POST['pasport_updated'])) {
    $result = pg_query($db, "UPDATE \"public\".exhibit SET type_exhibit = '{$_POST['exhibit_updated']}' WHERE id_exhibit = '{$_POST['id_exhibit']}'");

}
if (isset($_POST['exhibit'])) {
    $result = pg_query($db, "SELECT *	FROM \"public\".exhibit WHERE id_exhibit = '{$_POST['exhibit']}'");
    $row = pg_fetch_assoc($result);
    if (pg_num_rows($result)==0){
        echo"Пользователь с таким id не найден";
    }else {
        echo "
  <form action='exh_update.php' method='POST' >
  <h3> Внесите изменяемые данные </h3>
  <ul>
    id выставки : 
    <input type='number' name='id_exhibit_updated' value='$_POST[id_exhibit]'></p>
	<p>Тип выставки: 
	<input name='type_exhibit_update' type='text' value='$row[type_exhibit]'></p>
        
	<p><input type='submit' name='new' value='Обновить' /></p>

</form>";
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
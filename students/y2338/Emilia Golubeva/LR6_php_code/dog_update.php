<!DOCTYPE html>
<head>
    <title>UPDATE</title>
</head>
<body>
<h3>Введите id участника</h3>
<form action="dog_update.php" method="POST">
    <p>id участника:
        <input type="number" name='dog'>
        <input type="submit" name="submit" value="Ввести"></p>
</form>
<?php
error_reporting(E_ERROR | E_PARSE);
#$owner_id = $_POST['dog'];
#echo $_POST['dog'];
#echo $id_dog;
$dbuser = 'postgres';
$dbpass = '333';
$host = 'localhost';
$dbname = 'exhibition';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
if (isset($_POST['pasport_updated'])) {
    $result = pg_query($db, "UPDATE \"public\".dog SET pasport = '{$_POST['pasport_updated']}', dog_name = '{$_POST['dog_name_updated']}', 
        contract = '{$_POST['contract_updated']}', id_dog_club = '{$_POST['id_dog_club_updated']}' WHERE id_dog = '{$_POST['id_dog_updated']}'");

}
if (isset($_POST['dog'])) {
    $result = pg_query($db, "SELECT *	FROM \"public\".dog WHERE id_dog = '{$_POST['dog']}'");
    $row = pg_fetch_assoc($result);
    if (pg_num_rows($result)==0){
        echo"Пользователь с таким id не найден";
    }else {
        echo "
  <form action='dog_update.php' method='POST' >
  <h3> Внесите изменяемые данные </h3>
  <ul>
    id собаки : 
    <input type='text' name='id_dog_updated' value='$_POST[dog]'></p>
	<p>Имя: 
	<input name='dog_name_updated' type='text' value='$row[dog_name]'></p>
    <p>Паспорт №: 
	<input type='number' name='pasport_updated' value='$row[pasport]'></p>
	<p>Номер клуба участников: 
	<input id_dog_club='id_dog_club_updated' type='text' value='$row[id_dog_club]'></p>
	<p>Статус участия: ";
        if ($row['contract'] == 't') {
            echo "
                <SELECT name='contract_updated' autofocus>
            	<option selected = '$row[contract]'>да</option>
	            <option value='f'>нет</option>
	            </SELECT>";
        } else {
            echo "
            <SELECT name='contract_updated' autofocus>
            <option selected = '$row[contract]'>нет</option>
	        <option value='t'>да</option>
	        </SELECT>";
        }
        echo "
	<p><input type='submit' name='new' value='Обновить' /></p>

</form>";
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
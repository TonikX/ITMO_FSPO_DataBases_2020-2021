<!DOCTYPE html>
<head>
    <title>UPDATE</title>
</head>
<body>
<h3>Введите id эксперта</h3>
<form action="expert_update.php" method="POST">
    <p>id эксперта:
        <input type="number" name='expert'>
        <input type="submit" name="submit" value="Ввести"></p>
</form>
<?php
error_reporting(E_ERROR | E_PARSE);
#$owner_id = $_POST['expert'];
#echo $_POST['expert'];
#echo $id_expert;
$dbuser = 'postgres';
$dbpass = '333';
$host = 'localhost';
$dbname = 'exhibition';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
if (isset($_POST['pasport_updated'])) {
    $result = pg_query($db, "UPDATE \"public\".expert SET id_expert = '{$_POST['id_expert']}', full_name = '{$_POST['full_name_updated']}', 
        contract = '{$_POST['contract_updated']}', expert_club = '{$_POST['expert_club_updated']}' WHERE id_expert = '{$_POST['id_expert_updated']}'");

}
if (isset($_POST['expert'])) {
    $result = pg_query($db, "SELECT *	FROM \"public\".expert WHERE id_expert = '{$_POST['expert']}'");
    $row = pg_fetch_assoc($result);
    if (pg_num_rows($result)==0){
        echo"Пользователь с таким id не найден";
    }else {
        echo "
  <form action='expert_update.php' method='POST' >
  <h3> Внесите изменяемые данные </h3>
  <ul>
    id эксперта: 
    <input type='text' name='id_expert_updated' value='$_POST[id_expert]'></p>
	<p>Имя эксперта: 
	<input name='full_name_updated' type='text' value='$row[full_name]'></p>
	<p>Название клуба: 
	<input expert_club='expert_club_updated' type='text' value='$row[iexpert_club]'></p>
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
    <form method="LINK" action="expert.php">
        <input type="submit" value="К выбору действия">
    </form>
    
    <form method="LINK" action="index.php">
        <input type="submit" value="Меню">
    </form>
</body>
</html>
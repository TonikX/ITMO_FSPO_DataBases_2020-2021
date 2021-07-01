<!DOCTYPE html>
<head>
    <title>UPDATE</title>
	<link rel="styledheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h3>Введите id номера</h3>
<form action="suite_update.php" method="POST">
    <p>id участника:
        <input type="number" name='suite'>
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
  ||isset($_POST['number_updated'])
  ||isset($_POST['rooms_number_updated'])
  ||isset($_POST['cost_updated'])) {
   $result = pg_query($db, "UPDATE \"hotel\".suite SET 
                                id = '{$_POST['id_updated']}',
                                number = '{$_POST['number_updated']}',
                                rooms_number = '{$_POST['rooms_number_updated']}',
                                cost = '{$_POST['cost_updated']}',
                                floor = '{$_POST['floor_updated']}',
                                status = '{$_POST['status_updated']}'
                            WHERE id_suite = '{$_POST['id_updated']}'");

}

if (isset($_POST['suite'])) {
    $result = pg_query($db, "SELECT * FROM \"hotel\".suite WHERE id = '{$_POST['suite']}'");

    $row = pg_fetch_assoc($result);

    if (pg_num_rows($result)==0){
        echo"Номер с таким id не найден";
    } else {
        echo "
        <form action='suite_update.php' method='POST' >
        <h3> Внесите изменяемые данные </h3>
            <ul>id номера : 
        <input type='number' name='id_updated'              value='$_POST[suite]'></p>
	        <p>Номер номера: 
	    <input type='number' name='number_updated'          value='$row[number]'></p>
            <p>Кол-во номеров: 
        <input type='number' name='rooms_number_updated'    value='$row[rooms_number]'></p>
            <p>Цена: 
        <input type='number' name='cost_updated'            value='$row[cost]'></p>
            <p>Этаж: 
        <input type='number' name='floor_updated'           value='$row[floor]'></p>
	        <p>Статус номера: ";
            if ($row['status'] == 't') {
                echo "
                    <SELECT name='status_updated' autofocus>
            	    <option selected = '$row[status]'>да</option>
	                <option value='0'>нет</option>
	                </SELECT>";
            } else {
                echo "
                    <SELECT name='status_updated' autofocus>
                    <option selected = '$row[status]'>нет</option>
	                <option value='1'>да</option>
	                </SELECT>";
            }
        echo "
	    <p><input type='submit' name='new' value='Обновить' /></p>
        </form>";
    }
}

?>
    <form method="LINK" action="suite.php">
        <input type="submit" value="К выбору действия">
    </form>
    
    <form method="LINK" action="index.php">
        <input type="submit" value="Меню">
    </form>
</body>
</html>
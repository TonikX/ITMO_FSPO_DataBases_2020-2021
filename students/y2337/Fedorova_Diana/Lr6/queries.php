<?php 
require_once "connect.php"
?>

<!DOCTYPE html>
<html lang = "ru">
<head>
	<meta charset="UTF-8">
	<title>Lab_6</title>
	<link rel="styledheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="zoo/blocks/header.php">
</head>

<body>
	<?php require "header.php"?>
	<div class="container mt-4">
	<h1 class="mb-4">Запросы</h1>
	<h2 class="mb-4">Запрос №1</h2>
	<h3 class="mb-4">Вывести информацию о всех обслуживаниях, сортированную по именам животных</h3>
	<table class = 'table mt-4 mx-auto'  style='width: 1100px'>
		<tr class="bg-primary text-white">
			<th>ID_service</th>
			<th>Name</th>
			<th>FIO</th>
		</tr>

	<?php 
	$query = 'SELECT service.id_service, animals.name,worker.fio from service, animals,worker where (service.id_worker = worker.id_worker) and (service.id_animal=animals.id_animal) ORDER by animals.name';
	$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    echo "\t<tr>\n";
	    ?>
	    	<?php
	    foreach ($line as $col_value) {
	        echo "\t\t<td>$col_value</td>\n";  

	    }
	    ?>
	    
	    
  		<?php
	    echo "\t</tr>\n";
	}
	?>
	</table>
	</div>

	<div class="container mt-4">
	<h2 class="mb-4">Запрос №2</h2>
	<h3 class="mb-4">Вывести информацию о сотрудниках, которые родились позже 1979 года.</h3>
	<table class = 'table mt-4 mx-auto'  style='width: 1100px'>
		<tr class="bg-primary text-white">
			<th>ID_worker</th>
			<th>fio</th>
			<th>Birthday</th>
			<th>post</th>
			<th>email</th>
			<th>phone_number</th>
		</tr>

	<?php 
	$query = 'SELECT * from worker where(EXTRACT(year FROM birthday))>1979';
	$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    echo "\t<tr>\n";
	    ?>
	    	<?php
	    foreach ($line as $col_value) {
	        echo "\t\t<td>$col_value</td>\n";  

	    }
	    ?>
	    
	    
  		<?php
	    echo "\t</tr>\n";
	}
	?>
</table>
</div>

<div class="container mt-4">
	<h2 class="mb-4">Запрос №3</h2>
	<h3 class="mb-4">Вывести основную информацию (id,ФИО,должность) только о тех сотрудниках, которые обслуживают животных.</h3>
	<table class = 'table mt-4 mx-auto'  style='width: 1100px'>
		<tr class="bg-primary text-white">
			<th>ID_worker</th>
			<th>fio</th>
			<th>post</th>
		</tr>

	<?php 
	$query = 'SELECT id_worker, fio, post from worker where EXISTS(Select * from service where worker.id_worker = service.id_worker);';
	$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    echo "\t<tr>\n";
	    ?>
	    	<?php
	    foreach ($line as $col_value) {
	        echo "\t\t<td>$col_value</td>\n";  

	    }
	    ?>
	    
	    
  		<?php
	    echo "\t</tr>\n";
	}
	?>
</table>
</div>


<div class="container mt-4">
	<h2 class="mb-4">Запрос №4</h2>
	<h3 class="mb-4">Вывести подробную информацию о всех животных и их типе.</h3>
	<table class = 'table mt-4 mx-auto'  style='width: 1100px'>
		<tr class="bg-primary text-white">
			<th>ID_animal</th>
			<th>name</th>
			<th>birthday</th>
			<th>type</th>
			<th>information about wintering</th>
			<th>normal_temperatur</th>
		</tr>

	<?php 
	$query = 'SELECT animals.id_animal,animals.name,animals.birthday,type.name as type,type.information_about_wintering,type.normal_temperature from animals inner join type on animals.id_animal=type.id_animal ORDER by id_animal;';
	$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    echo "\t<tr>\n";
	    ?>
	    	<?php
	    foreach ($line as $col_value) {
	        echo "\t\t<td>$col_value</td>\n";  

	    }
	    ?>
	    
	    
  		<?php
	    echo "\t</tr>\n";
	}
	?>
</table>
</div>

<div class="container mt-4">
	<h2 class="mb-4">Запрос №5</h2>
	<h3 class="mb-4">Вывести год рождения самого страшего сотрудника среди сотрудников, у которых id больше 2.</h3>
	<table class = 'table mt-4 mx-auto'  style='width: 1100px'>
		<tr class="bg-primary text-white">
			<th>Year</th>
		</tr>

	<?php 
	$query = 'SELECT min(EXTRACT(year FROM birthday)) as YEAR from worker where id_worker>2;';
	$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    echo "\t<tr>\n";
	    ?>
	    	<?php
	    foreach ($line as $col_value) {
	        echo "\t\t<td>$col_value</td>\n";  

	    }
	    ?>
	    
	    
  		<?php
	    echo "\t</tr>\n";
	}
	?>
</table>
</div>


</body>
</html>
<?php

	$dbuser = 'postgres';
	$dbpass = '1234';
	$host = 'localhost';
	$port = '5433';
	$dbname = 'laba3';

	$db = pg_connect("host=$host port=$port dbname=$dbname user=$dbuser password=$dbpass");

	$query = "select * from laba3.doctors;";
	$result = pg_query($db, $query);
	$rows = pg_num_rows($result);
	$row = pg_fetch_assoc($result);
	$organizations=[];

	while ($myrow = pg_fetch_array($result)) {
		$organizations[]=$myrow;

	}


	if (isset($_GET['doctor_id'])) {

		$sql_delete = "delete  from laba3.doctors where doctor_id = '" .$_GET['doctor_id']."'";
		$query_delete = pg_query($db,$sql_delete);

		if($query_delete){
			echo "Deleted";
		}
		else{
			echo pg_error($db);
		}
	}
?>

<!DOCTYPE html>
	<html>
	<head>
		<link rel = "stylesheet" type = "text/css" href = "style.css"/>
		<title>organizations</title>
	</head>
	<body>
		<!-- <h1>Таблица организаций</h1> -->
	<br><br>
	<table id="tb">
		<thead>
			<tr>
				<th>ID</th>
				<th>Имя</th>
				<th>Специализация</th>
				<th>Образование</th>
				<th>Пол</th>
				<th>День рождения</th>
				<th>Дата трудоустройства</th>
				<th>Контракт</th>
				<th>Удалить</th>
				<th>Редактировать</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($organizations as $organization):
			?>
				  <tr>
				  	<td><?php echo $organization['doctor_id'] ?></td>
				  	<td><?php echo $organization['doctor_fio'] ?></td>
				  	<td><?php echo $organization['doctor_specializacion'] ?></td>
				  	<td><?php echo $organization['doctor_learn'] ?></td>
				  	<td><?php echo $organization['doctor_gender'] ?></td>
				  	<td><?php echo $organization['doctor_birthday'] ?></td>
				  	<td><?php echo $organization['doctor_work'] ?></td>
						<td><?php echo $organization['doctor_contract'] ?></td>
				  	<td><button class="delete"><a href="?doctor_id=<?php echo $organization['doctor_id'] ?>">Удалить</a></button></td>
					<td><button class="edit"><a href="edit.php?edit=<?php echo $organization['doctor_id'] ?>">Редактировать</a></button></td>
				  </tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<br><br>

	</body>
</html>

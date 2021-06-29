<?php

	include 'connection.php';

	$connect = mysqli_connect('localhost','root','','lab_6');

	if (isset($_GET['id'])) {

		$sql_delete = "delete from organization where id = '" .$_GET['id']."'";
		$query_delete = mysqli_query($con,$sql_delete);

		if($query_delete){
			echo "Deleted";
		}
		else{
			echo mysqli_error($con);
		}
	}

	$organizations=[];

	$sql="select * from organization";
	$query=mysqli_query($con,$sql);
	while ($row= mysqli_fetch_array($query,MYSQLI_ASSOC)) {
		$organizations[]=$row;

	}
?>

<!DOCTYPE html>
	<html>
	<head>
		<link rel = "stylesheet" type = "text/css" href = "style.css"/>
		<title>organizations</title>
	</head>
	<body>
		<h1>Таблица организаций</h1>
	<br><br>
	<table id="tb">
		<thead>
			<tr>
				<th>ID</th>
				<th>Контракт</th>
				<th>Полное имя</th>
				<th>Краткое имя</th>
				<th>Адрес</th>
				<th>Счет в банке</th>
				<th>Специализация</th>
				<th>Удалить</th>
				<th>Редактировать</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($organizations as $organization): 
			?>
				  <tr>
				  	<td><?php echo $organization['id'] ?></td>
				  	<td><?php echo $organization['contract'] ?></td>
				  	<td><?php echo $organization['full_name'] ?></td>
				  	<td><?php echo $organization['short_name'] ?></td>
				  	<td><?php echo $organization['address'] ?></td>
				  	<td><?php echo $organization['bunk_sum'] ?></td>
				  	<td><?php echo $organization['specialization'] ?></td>
				  	<td><button class="delete"><a href="?id=<?php echo $organization['id'] ?>">Удалить</a></button></td>
					<td><button class="edit"><a href="edit.php?edit=<?php echo $organization['id'] ?>">Редактировать</a></button></td>
				  </tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<br><br>
	<div class="end">
		<button class="logout"><a href="logout.php">LOGOUT</button>
	</div>
	</body>
</html>
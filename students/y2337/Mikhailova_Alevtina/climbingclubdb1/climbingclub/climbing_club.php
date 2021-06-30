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
	<link rel="stylesheet" href="clinbingclubdb/header.php">
</head>

<body>
	<?php require "header.php"?>
	<table class = 'table mt-4 mx-auto'  style='width: 1100px'>
		<tr class="bg-primary text-white">
			<th>ID_climbingClub</th>
			<th>contact_person</th>
			<th>city</th>
			<th>country</th>
			<th>email</th>
			<th>clubs_name</th>
			<th>telephone</th>
		</tr>
	<?php
	$query = 'SELECT * FROM climbing_club';
	$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    echo "\t<tr>\n";
	    foreach ($line as $col_value) {
	        echo "\t\t<td>$col_value</td>\n";
	    }
	    echo "\t</tr>\n";
	}

	?>
	</table>
	</table>
	<div class ="container mt-4">
	<div class ="row">
		<div class ="col">
		<h3 class ="mx-auto">Add new climbing club</h3>
		<form  action = "create.php" class ="mx-auto mb-2" method="post">
		        <p class="mt-1">id_climbingClub</p>
		        <input type ="number" name ="id_climbingClub">
				<p class="mt-1">contact_person</p>
				<input type ="text" name ="contact_person">
				<p class="mt-1">city</p>
                <input type ="text" name ="city">
                <p class="mt-1">country</p>
                <input type ="text" name ="country">
                <p class="mt-1">email</p>
                <input type ="text" name ="email">
                <p class="mt-1">clubs_name</p>
                <input type ="text" name ="clubs_name">
                <p class="mt-1">telephone</p>
                <input type ="text" name ="telephone"></br>
				<button type = "submit" class = "btn-primary"> Add</button>
			</form>
		</div>
	<div class ="col">
				<h3 class ="">Update</h3>
					<form  action = "update_form.php" class ="mx-auto mb-5" method="post">
							<label class="prefix" for="id_climbing_club" class ="mx-auto mb-5">climbing club:</label>
		   					<select id="id_climbing_club" name="id_climbing_club">
						    <option value="">choose a climbing club</option>
						    <?php
						      $result = pg_query('SELECT * from climbing_club');
						      while ($row = pg_fetch_array($result))
						      {
						         echo "<option value='".$row["id_climbing_club"]."'>".$row["id_climbing_club"]."</option>";
						      }
						    ?>
						   </select>
							<button type = "submit" class = "btn-primary"> Update</button>
					</form>
			</div>
			<div class ="col">
					<h3 class ="">Delete</h3>
					<form  action = "delete.php" class ="mx-auto mb-5" method="post">
							<label class="prefix" for="id_climbing_club" class ="mx-auto mb-5">climbing club:</label>
		   					<select id="id_climbing_club" name="id_climbing_club">
						    <option value="">choose a climbing club</option>
						    <?php
						      $result = pg_query('SELECT * FROM climbing_club');
						      while ($row = pg_fetch_array($result))
						      {
						         echo "<option value='".$row["id_climbing_club"]."'>".$row["id_climbing_club"]."</option>";
						      }
						    ?>
						   </select></br>
							<button type = "submit" class = "btn-primary"> Delete</button>
					</form
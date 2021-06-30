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
			<th>ID_route</th>
			<th>route_description</th>
			<th>ID_top</th>
		</tr>
	<?php 
	$query = 'SELECT * FROM route order by route';
	$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    foreach ($line as $col_value) {
	        echo "\t\t<td>$col_value</td>\n";
	    }
	    echo "\t</tr>\n";
	}
	?>
	</table>
	<div class ="container mt-4">
	<div class ="row">
		<div class ="col">
			<form method = "POST" action = "create.php" class = "mt-4 mx-auto"> 
			<h3 class ="mx-auto">Add new route</h3>
            <p class="mt-1">id_route</p>
            <input type ="number" name ="id_route">
            <p class="mt-1">route_description</p>
            <input type ="text" name ="route_description"><br>
            <p class="mt-1">id_top</p>
            <input type ="text" name ="id_top"><br>

            <button type = "submit" class = "btn-primary mx-auto"> Add</button>
		 <br>
		
	</form>
	</div>
	<div class ="col">
					<h3 class ="">Update</h3>
						<form  action = "update_form.php" class ="mx-auto mb-5" method="post">
								<label class="prefix" for="id_route" class ="mx-auto mb-5">route:</label>
			   					<select id="id_route" name="id_route">
							    <option value="">choose an route</option>
							    <?php
							      $result = pg_query('SELECT * FROM route order by id_route');
							      while ($row = pg_fetch_array($result))
							      {
							         echo "<option value='".$row["id_route"]."'>".$row["id_route"]."</option>";
							      }
							    ?>
							   </select>
								<button type = "submit" class = "btn-primary"> Update</button>
						</form>
				</div>
	<div class ="col">
					<h3 class ="">Delete</h3>
					<form  action = "delete.php" class ="mx-auto mb-5" method="post">
							<label class="prefix" for="id_route" class ="mx-auto mb-5">route:</label>
		   					<select id="id_route" name="id_route">
						    <option value="">choose an route</option>
						    <?php
						      $result = pg_query('SELECT * FROM route order by route');
						      while ($row = pg_fetch_array($result))
						      {
						         echo "<option value='".$row["id_route"]."'>".$row["id_route"]."</option>";
						      }
						    ?>
						   </select>
							<button type = "submit" class = "btn-primary"> Delete</button>
					</form>
			</div>
	</div>
</body>
</html>
</html>

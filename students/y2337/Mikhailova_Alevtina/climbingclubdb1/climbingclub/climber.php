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
			<th>ID_climber</th>
			<th>climber_name</th>
			<th>clubs_name</th>
			<th>address</th>
			<th>ascent_chronicle</th>
			<th>id_climbingClub</th>
		</tr>
	<?php 
	$query = 'SELECT * FROM climber';
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
    			<form method = "POST" action = "create.php" class = "mt-4 mx-auto">
    			<h3 class ="mx-auto">Add new climber</h3>
                <p class="mt-1">id_climber</p>
                <input type ="number" name ="id_climber">
                <p class="mt-1">climbers_name</p>
                <input type ="text" name ="climbers_name">
                <p class="mt-1">clubs_name</p>
                <input type ="text" name ="clubs_name">
                <p class="mt-1">address</p>
                <input type ="text" name ="address">
                <p class="mt-1">ascent_chronicle</p>
                <input type ="text" name ="ascent_chronicle">
                <p class="mt-1">id_climbingClub</p>
                <input type ="number" name ="id_climbingClub">
                <button type = "submit" class = "btn-primary mx-auto"> Add</button>
    		 <br>

    	</form>
    	</div>
	<div class ="col">
				<h3 class ="">Update</h3>
					<form  action = "update_form.php" class ="mx-auto mb-5" method="post">
							<label class="prefix" for="id_climber" class ="mx-auto mb-5">climber:</label>
		   					<select id="id_climber" name="id_climber">
						    <option value="">choose a climber</option>
						    <?php
						      $result = pg_query('SELECT * FROM climber order by id_climber');
						      while ($row = pg_fetch_array($result))
						      {
						         echo "<option value='".$row["id_climber"]."'>".$row["id_climber"]."</option>";
						      }
						    ?>
						   </select>
							<button type = "submit" class = "btn-primary"> Update</button>
					</form>
			</div>
			<div class ="col">
					<h3 class ="">Delete</h3>
					<form  action = "delete.php" class ="mx-auto mb-5" method="post">
							<label class="prefix" for="id_climber" class ="mx-auto mb-5">climber:</label>
		   					<select id="id_climber" name="id_climber">
						    <option value="">choose a climber</option>
						    <?php
						      $result = pg_query('SELECT * FROM climber order by id_climber');
						      while ($row = pg_fetch_array($result))
						      {
						         echo "<option value='".$row["id_climber"]."'>".$row["id_climber"]."</option>";
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
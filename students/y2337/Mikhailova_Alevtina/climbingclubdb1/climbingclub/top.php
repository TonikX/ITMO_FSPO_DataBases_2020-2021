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
			<th>ID_top</th>
			<th>top_name</th>
			<th>location</th>
			<th>country_name</th>
			<th>top_height</th>
			<th>area_name</th>
			<th>ascent_num</th>
		</tr>
	<?php 
	$query = 'SELECT * FROM top order by id_top';
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
				<h3 class ="mx-auto">Add new top</h3>
			    <p class="mt-1">id_top</p>
                <input type ="number" name ="id_top">
                <p class="mt-1">top_name</p>
                <input type ="text" name ="top_name">
                <p class="mt-1">location</p>
                <input type ="text" name ="location">
                 <p class="mt-1">country_name</p>
                 <input type ="text" name ="country_name">
                 <p class="mt-1">top_height</p>
                 <input type ="text" name ="top_height">
                 <p class="mt-1">area_name</p>
                 <input type ="text" name ="area_name">
                 <p class="mt-1">ascent_num</p>
                 <input type ="text" name ="ascent_num">
			   <br>
				<button type = "submit" class = "btn-primary mx-auto"> Add</button>
			</form>
		</div>

		
		<div class ="col">
				<h3 class ="">Update</h3>
					<form  action = "update_form.php" class ="mx-auto mb-5" method="post">
							<label class="prefix" for="id_top" class ="mx-auto mb-5">top:</label>
		   					<select id="id_top" name="id_top">
						    <option value="">choose an top</option>
						    <?php
						      $result = pg_query('SELECT * FROM top order by id_top');
						      while ($row = pg_fetch_array($result))
						      {
						         echo "<option value='".$row["id_top"]."'>".$row["id_top"]."</option>";
						      }
						    ?>
						   </select>
							<button type = "submit" class = "btn-primary"> Update</button>
					</form>
			</div>
			<div class ="col">
					<h3 class ="">Delete</h3>
					<form  action = "delete.php" class ="mx-auto mb-5" method="post">
							<label class="prefix" for="id_top" class ="mx-auto mb-5">top:</label>
		   					<select id="id_top" name="id_top">
						    <option value="">choose an top</option>
						    <?php
						      $result = pg_query('SELECT * FROM top order by id_top');
						      while ($row = pg_fetch_array($result))
						      {
						         echo "<option value='".$row["id_top"]."'>".$row["id_top"]."</option>";
						      }
						    ?>
						   </select>
							<button type = "submit" class = "btn-primary"> Delete</button>
					</form>
			</div>
	</div>

</body>
</html>



<?php 
	require_once "connect.php";
	
?>

<!DOCTYPE html>
<html lang = "ru">
<head>
	<meta charset="UTF-8">
	<title>Update Animals</title>
	<link rel="styledheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="zoo/blocks/header.php">
</head>
<?php require "header.php"?>
<?php
	if (isset($_POST['id_animal'])){
		$animal_id =$_POST['id_animal'];
		$query = "SELECT * FROM animals where id_animal = '$animal_id'";
		$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		$line=pg_fetch_array($result);
		$number =1;
	}
	elseif (isset($_POST['id_building'])){
		$building_id =$_POST['id_building'];
		$query = "SELECT * FROM building where id_building = '$building_id'";
		$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		$line=pg_fetch_array($result);
		$number =2;
	}
	elseif(isset($_POST['id_feeding_ration'])){
		$id =$_POST['id_feeding_ration'];
		$query = "SELECT * FROM feeding_ration where id_feeding_ration = '$id'";
		$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		$line=pg_fetch_array($result);
		$number =3;
	}
	elseif(isset($_POST['id_habitat_area'])){
		$habitat_area_id =$_POST['id_habitat_area'];
		$query = "SELECT * FROM habitat_area where id_habitat_area = '$habitat_area_id'";
		$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		$line=pg_fetch_array($result);
		$number =4;
	}
	elseif(isset($_POST['id_habitation'])){
		$habitation_id =$_POST['id_habitation'];
		$query = "SELECT * FROM habitation where id_habitation = '$habitation_id'";
		$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		$line=pg_fetch_array($result);
		$number =5;
	}
	elseif(isset($_POST['id_nutrition'])){
		$nutrition_id =$_POST['id_nutrition'];
		$query = "SELECT * FROM nutrition where id_nutrition = '$nutrition_id'";
		$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		$line=pg_fetch_array($result);
		$number =6;
	}
	elseif(isset($_POST['id_service'])){
		$service_id =$_POST['id_service'];
		$query = "SELECT * FROM service where id_service = '$service_id'";
		$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		$line=pg_fetch_array($result);
		$number =7;
	}
	elseif(isset($_POST['id_type'])){
		$type_id =$_POST['id_type'];
		$query = "SELECT * FROM type where id_type = '$type_id'";
		$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		$line=pg_fetch_array($result);
		$number =8;
	}
	elseif(isset($_POST['id_worker'])){
		$worker_id =$_POST['id_worker'];
		$query = "SELECT * FROM worker where id_worker = '$worker_id'";
		$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		$line=pg_fetch_array($result);
		$number =9;
	}
	elseif(isset($_POST['id_zoo_territory'])){
		$zoo_territory_id =$_POST['id_zoo_territory'];
		$query = "SELECT * FROM zoo_territory where id_zoo_territory = '$zoo_territory_id'";
		$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		$line=pg_fetch_array($result);
		$number =10;
	}



	

	if ($number ==1){
?>
<body>
	<div class="mt-4 mx-auto" style='width: 1100px'>
		<h3 class ="mx-auto">Update animal</h3>
	</div>
	<div class="mx-auto" style='width: 1100px'>
		<form  action = "update.php" class ="mx-auto mb-5" method="post">
				<p class="mt-2">ID</p>
				<input type ="text" name ="animal_id" value ="<?=$line['id_animal'] ?>">
				<p class="mt-2">Name</p>
				<input type ="text" name ="name" value ="<?=$line['name'] ?>">
				<p class="mt-2">Birthday</p>
				<input type ="text" name ="birthday" value ="<?=$line['birthday'] ?>">
				<button type = "submit" class = "btn-primary"> Update</button>
		</form>
	</div>

<?php
}
elseif ($number ==2) {
?>
	
	<div class="mt-4 mx-auto" style='width: 1100px'>
		<h3 class ="mx-auto">Update building</h3>
	</div>
	<div class="mx-auto" style='width: 1100px'>
		<form  action = "update.php" class ="mx-auto mb-5" method="post">
				<p class="mt-2">ID</p>
				<input type ="text" name ="building_id" value ="<?=$line['id_building'] ?>">
				<p class="mt-2">Address</p>
				<input type ="text" name ="address" class="form-control" value ="<?=$line['address'] ?>"></br>
				<button type = "submit" class = "btn-primary"> Update</button>
		</form>
	</div>


<?php
}
elseif ($number ==3) {
?>
	
	<div class="mt-4 mx-auto" style='width: 1100px'>
		<h1 class ="mx-auto">Update feeding ration</h1>
	</div>
	<div class="mx-auto" style='width: 1100px'>
		<form  action = "update.php" class ="mx-auto mb-5" method="post">
				<p class="mt-2">ID</p>
				<input type ="text" name ="feeding_ration_id" class="form-control" value ="<?=$line['id_feeding_ration'] ?>">
				<p class="mt-2">Type</p>
				<input type ="text" name ="type"class="form-control" value ="<?=$line['type'] ?>">
				<p class="mt-2">Description</p>
				<TEXTAREA type ="text"name ="description" class="form-control"> <?=$line['description'] ?></TEXTAREA></br>
				<button type = "submit" class = "btn-primary"> Update</button>
		</form>
	</div>


<?php
}
elseif ($number ==4) {
?>
	<div class="mx-auto" style='width: 1100px'>
		<h1 class ="mx-auto">Update habitat area</h1>
		</div>
	<div class="mx-auto" style='width: 1100px'>
		<form  action = "update.php" class ="mx-auto mb-5" method="post">
				<p class="mt-2">ID</p>
				<input type ="text" class="form-control" name ="habitat_area_id" value ="<?=$line['id_habitat_area'] ?>">
				<p class="mt-2">Name</p>
				<input type ="text" class="form-control" name ="name" value ="<?=$line['name'] ?>">
				<p class="mt-2">Habitat</p>
				<input type ="text" class="form-control" name ="habitat" value ="<?=$line['habitat'] ?>">
				<p class="mt-2">Characteristics</p>
				<TEXTAREA type ="text"name ="characteristics" class="form-control"> <?=$line['characteristics'] ?></TEXTAREA></br>
				<button type = "submit" class = "btn-primary"> Update</button>
		</form>
	</div>


<?php
}
elseif ($number ==5) {
?>
	<form method = "POST" action = "update.php" class = "mt-4 mx-auto"> 
		<div class="mt-4 mx-auto" style='width: 1100px'>
				
				<h3 class ="mx-auto">Update habitation</h3>
				<p class="mt-2">ID</p>
				<input type ="text" class ="mx-auto mb-3" name ="habitation_id" value ="<?=$line['id_habitation'] ?>"><br>
			   <label class="prefix" for="animal_id" class ="mx-auto mb-5">Animal:</label>
			   <select id="animal_id" name="animal_id">

			    <option value=""><?=$line['id_animal']?></option>
			    <?php
			      $result = pg_query('SELECT * FROM animals');
			      while ($row = pg_fetch_array($result))
			      {
			         echo "<option value='".$row["id_animal"]."'>".$row["name"]."</option>";
			      }
			    ?>
			   </select><br>
				
			   <label class="prefix" for="habitat_area_id" class ="mx-auto mb-5">Habitat_area:</label>
			   <select id="habitat_area_id" name="habitat_area_id">
			    <option value="<?=$line['id_habitat_area'] ?>"><?=$line['id_habitat_area'] ?></option>
			    <?php
			      $result = pg_query('SELECT * FROM habitat_area');
			      while ($row = pg_fetch_array($result))
			      {
			         echo "<option value='".$row["id_habitat_area"]."'>".$row["id_habitat_area"]."</option>";
			      }
			    ?>
			   </select>
				<button type = "submit" class = "btn-primary mx-auto"> Update</button>
			
			</div>
		</form>
<?php
}
elseif ($number ==6) {
?>
	<form method = "POST" action = "update.php" class = "mt-4 mx-auto"> 
		<div class="mx-auto" style='width: 1100px'>
			<h3 class ="mx-auto">Update nutrition</h3>
			<p class="mt-2">ID</p>
			<input type ="text" class ="mx-auto mb-3" name ="id_nutrition" value ="<?=$line['id_nutrition'] ?>"><br>
		   	<label class="prefix" for="animal_id" class ="mx-auto mb-5">Animal</label>
		   	<select id="animal_id" name="animal_id">
		    <option value="<?=$line['id_animal'] ?>"><?=$line['id_animal'] ?></option>
		    <?php
		      $result = pg_query('SELECT * FROM animals');
		      while ($row = pg_fetch_array($result))
		      {
		         echo "<option value='".$row["id_animal"]."'>".$row["id_animal"]."</option>";
		      }
		    ?>
		   </select><br>

		   <label class="prefix" for="feeding_ration_id" class ="mx-auto mb-5">Feeding ration</label>
		   <select id="feeding_ration_id" name="feeding_ration_id">
		    <option value="<?=$line['id_feeding_ration'] ?>"><?=$line['id_feeding_ration'] ?></option>
		    <?php
		      $result = pg_query('SELECT * FROM feeding_ration');
		      while ($row = pg_fetch_array($result))
		      {
		         echo "<option value='".$row["id_feeding_ration"]."'>".$row["id_feeding_ration"]."</option>";
		      }
		    ?>
		   </select><br>
			<label class="prefix" for="feeding_time" class ="mx-auto mb-5">Time</label>
			<input type ="time" name ="feeding_time" value ="<?=$line['feeding_time'] ?>"></p>
			<button type = "submit" class = "btn-primary"> Update</button>
		
	</form>

<?php
}
elseif ($number ==7) {
?>

	<form method = "POST" action = "update.php" class = "mt-4 mx-auto"> 
		<div class="mx-auto" style='width: 1100px'>
		<h1 class ="mx-auto">Update service</h1>
		<p class="mt-2">ID</p>
		<input type ="text" class ="mx-auto mb-3" name ="id_service" value ="<?=$line['id_service'] ?>"><br>
	   <label class="prefix" for="worker_id" class ="mx-auto mb-5">Worker</label>
	   <select id="worker_id" name="worker_id">
	    <option value="<?=$line['id_worker'] ?>"><?=$line['id_worker'] ?></option>
	    <?php
	      $result = pg_query('SELECT * FROM worker');
	      while ($row = pg_fetch_array($result))
	      {
	         echo "<option value='".$row["id_worker"]."'>".$row["id_worker"]."</option>";
	      }
	    ?>
	   </select><br>
	   <label class="prefix" for="animal_id" class ="mx-auto mb-5">Animal</label>
	   <select id="animal_id" name="animal_id">
	    <option value="<?=$line['id_animal'] ?>"><?=$line['id_animal'] ?></option>
	    <?php
	      $result = pg_query('SELECT * FROM animals');
	      while ($row = pg_fetch_array($result))
	      {
	         echo "<option value='".$row["id_animal"]."'>".$row["id_animal"]."</option>";
	      }
	    ?>
	   </select><br>
	
		<label class="prefix" for="service" class ="mx-auto mb-5">Service</label>
		<TEXTAREA type ="text"name ="service" class="form-control"> <?=$line['service'] ?></TEXTAREA></br>
		<button type = "submit" class = "btn-primary"> Update</button>
		</div>
	</form>

<?php
}
elseif ($number ==8) {
?>
	<form  action = "update.php" class ="mx-auto mb-5" method="post">
			<div class="mx-auto" style='width: 1100px'>
		<h1 class ="mx-auto">Update type</h1>
		</div>
		<div class="mx-auto" style='width: 1100px'>
		<p class="mt-2">ID</p>
			<input type ="text" class ="mx-auto mb-3" name ="id_type" value ="<?=$line['id_type'] ?>"><br>
	   <label class="prefix" for="animal_id" class ="mx-auto mb-5">Animal</label>
	   <select id="animal_id" name="animal_id">
	    <option value="<?=$line['id_animal'] ?>"><?=$line['id_animal'] ?></option>
	    <?php
	      $result = pg_query('SELECT * FROM animals');
	      while ($row = pg_fetch_array($result))
	      {
	         echo "<option value='".$row["id_animal"]."'>".$row["id_animal"]."</option>";
	      }
	    ?>
	   </select><br>
		
				<p class="mt-2">Name</p>
				<input type ="text" name ="name"value="<?=$line['name'] ?>">
				<p class="mt-2">Information about wintering</p>
				<TEXTAREA type ="text"name ="Information_about_wintering" class="form-control"> <?=$line['information_about_wintering'] ?></TEXTAREA></br>
				<p class="mt-2">Normal temperature</p>
				<input type ="text" class="mb-3"name ="Normal_temperature" value ="<?=$line['normal_temperature'] ?>"><br>
				<button type = "submit" class = "btn-primary"> Add</button>
		</form>
	</div>
<?php
}
elseif ($number ==9) {
?>

		<form  action = "update.php" class ="mx-auto mb-5" method="post">
			<div class="mx-auto" style='width: 1100px'>
		<h1 class ="mx-auto">Update worker</h1>
		</div>
		<div class="mx-auto" style='width: 1100px'>
			<p class="mt-2">ID</p>
			<input type ="text" class =" form-control mx-auto mb-2" name ="worker_id" value ="<?=$line['id_worker'] ?>">
				<p class="mt-2">FIO</p>
				<input type ="text" name ="FIO" class="form-control" value ="<?=$line['fio']?>">
				<p class="mt-2">Birthday</p>
				<input type ="text" name ="birthday" class="form-control" value ="<?=$line['birthday']?>">
				<p class="mt-2">Post</p>
				<input type ="text" name ="post" class="form-control"  value ="<?=$line['post']?>">
				<p class="mt-2">Email</p>
				<input type ="text" name ="email" class="form-control" value ="<?=$line['email']?>">
				<p class="mt-2">Phone number</p>
				<input type ="text" name ="phone" class="form-control" value ="<?=$line['phone_number']?>"><br>
				<button type = "submit" class = "btn-primary"> Update</button>
			</form>
		</div>
<?php
}
elseif ($number ==10) {
?>
<form method = "POST" action = "update.php" class = "mt-4 mx-auto"> 
		<div class="mx-auto" style='width: 1100px'>
		<h1 class ="mx-auto">Update zoo territory</h1>
		</div>
		<div class="mx-auto" style='width: 1100px'>
		<p class="mt-2">ID</p>
				<input type ="text" class="form-control" name ="zoo_territory_id" value ="<?=$line['id_zoo_territory'] ?>"><br>
		
	   <label class="prefix" for="animal_id" class ="mx-auto mb-5">Animal</label>
	   <select id="animal_id" name="animal_id">
	   	<option value="<?=$line['id_animal'] ?>"><?=$line['id_animal'] ?></option>
	   	<?php
	      $result = pg_query('SELECT * FROM animals');
	      while ($row = pg_fetch_array($result))
	      {
	         echo "<option value='".$row["id_animal"]."'>".$row["id_animal"]."</option>";
	      }
	    ?>
	   </select><br>
	   <label class="prefix" for="building_id" class ="mx-auto mb-5">Building</label>
	   <select id="building_id" name="building_id">
	   <option value="<?=$line['id_building'] ?>"><?=$line['id_building'] ?></option>
	    <?php
	      $result = pg_query('SELECT * FROM building');
	      while ($row = pg_fetch_array($result))
	      {
	         echo "<option value='".$row["id_building"]."'>".$row["id_building"]."</option>";
	      }
	    ?>
	   </select><br>
		<label class="prefix" for="habitat_period" class ="mx-auto mb-5">Habitat period</label>
		<input type ="text" name ="habitat_period" value ="<?=$line['habitat_period']?>"></p>
		<button type = "submit" class = "btn-primary"> Update</button>
	</div></form>
<?php
}
?>
</body>
</html>
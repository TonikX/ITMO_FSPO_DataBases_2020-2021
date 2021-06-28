<?php
require_once "connect.php"
?>

<?php
	if(isset($_POST['name']) && isset($_POST['birthday'])){
		$name = $_POST['name'];
		$birthday = $_POST['birthday'];
		$query = "INSERT into animals (name, birthday) values('$name','$birthday')";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/animals.php');
	}
	if (isset($_POST['address'])){
		$address = $_POST['address'];
		$query = "INSERT INTO building (address) values ('$address')";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/building.php');
	}
	if (isset($_POST['type']) && isset($_POST['description'])){
		$type = $_POST['type'];
		$description=$_POST['description'];
		$query = "INSERT INTO feeding_ration (type,description) values ('$type','$description')";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/feeding_ration.php');

	}
	if (isset($_POST['name']) && isset($_POST['habitat']) && isset($_POST['characteristics'])){
		$name =$_POST['name'];
		$habitat=$_POST['habitat'];
		$characteristics=$_POST['characteristics'];
		$query = "INSERT INTO habitat_area (name,habitat,characteristics) values ('$name','$habitat','$characteristics')";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/habitat_area.php');
	}
	if(isset($_POST['FIO']) && isset($_POST['birthday']) && isset($_POST['post']) && isset($_POST['email'])&& isset($_POST['phone'])){
		$name = $_POST['FIO'];
		$birthday = $_POST['birthday'];
		$post = $_POST['post'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$query = "INSERT INTO worker (fio,birthday,post,email,phone_number) values ('$name','$birthday','$post','$email','$phone')";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/worker.php');
}
	if(isset($_POST['habitat_area_id']) && isset($_POST['animal_id'])){
		$animal = $_POST['animal_id'];
		$habitat_area = $_POST['habitat_area_id'];
		$query = "INSERT INTO habitation (id_animal,id_habitat_area) values ('$animal','$habitat_area')";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/habitation.php');
	}
	if(isset($_POST['animal_id']) && isset($_POST['feeding_ration_id']) && isset($_POST['feeding_time'])){
		$animal = $_POST['animal_id'];
		$feeding_ration = $_POST['feeding_ration_id'];
		$feeding_time = $_POST['feeding_time'];
		$query = "INSERT INTO nutrition (id_animal,id_feeding_ration, feeding_time) values ('$animal','$feeding_ration','$feeding_time')";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/nutrition.php');
	}
	if(isset($_POST['worker_id']) && isset($_POST['animal_id']) && isset($_POST['service'])){
		$worker = $_POST['worker_id'];
		$animal = $_POST['animal_id'];
		$service = $_POST['service'];
		$query = "INSERT INTO service (id_worker,id_animal, service) values ('$worker','$animal','$service')";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/service.php');
	}
	if(isset($_POST['animal_id']) && isset($_POST['name']) && (isset($_POST['Information_about_wintering']) || isset($_POST['Normal_temperature']))){
		$animal = $_POST['animal_id'];
		$name = $_POST['name'];
		$inf = $_POST['Information_about_wintering'];
		$Normter = $_POST['Normal_temperature'];
		$query = "INSERT INTO type (id_animal, name,  information_about_wintering, normal_temperature) values ('$animal','$name','$inf','$Normter')";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/type.php');
	}
	if(isset($_POST['animal_id']) && isset($_POST['building_id']) && isset($_POST['habitat_period'])){
		$animal = $_POST['animal_id'];
		$building = $_POST['building_id'];
		$habitat_period = $_POST['habitat_period'];
		$query = "INSERT INTO zoo_territory (id_animal, id_building,  habitat_period) values ('$animal','$building','$habitat_period')";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/zoo_territory.php');
	}


?>

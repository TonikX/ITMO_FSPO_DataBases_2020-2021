<?php 
	require_once "connect.php";
?>
<?php
	if(isset($_POST['name']) && isset($_POST['birthday'])){
			$id = $_POST['animal_id'];
			$name = $_POST['name'];
			$birthday = $_POST['birthday'];
			$query = "Update animals set name = '$name', birthday = '$birthday' where id_animal = '$id'";
			pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
			header('Location: /zoo/animals.php');

	}
	if (isset($_POST['address'])){
		$id_building = $_POST['building_id'];
		$address = $_POST['address'];
		$query = "Update building set address = '$address' where id_building = '$id_building'";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/building.php');
	}
	if (isset($_POST['type']) && isset($_POST['description'])){
		$id_feeding_ration = $_POST['feeding_ration_id'];
		$type = $_POST['type'];
		$description=$_POST['description'];
		$query = "Update  feeding_ration set type = '$type', description = '$description' where id_feeding_ration = '$id_feeding_ration'";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/feeding_ration.php');

	}
	if (isset($_POST['name']) && isset($_POST['habitat']) && isset($_POST['characteristics'])){
		$id_habitat_area = $_POST['habitat_area_id'];
		$name =$_POST['name'];
		$habitat=$_POST['habitat'];
		$characteristics=$_POST['characteristics'];
		$query = "Update habitat_area set name = '$name', habitat = '$habitat', characteristics ='$characteristics' where id_habitat_area = '$id_habitat_area'";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/habitat_area.php');
	}
	
	if(isset($_POST['animal_id']) && isset($_POST['habitat_area_id'])){
		$habitation = $_POST['habitation_id'];
		$animal = $_POST['animal_id'];
		$habitat_area = $_POST['habitat_area_id'];
		$query = "Update habitation set id_animal ='$animal',id_habitat_area = '$habitat_area' where id_habitation = '$habitation'";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/habitation.php');
	}
	if(isset($_POST['animal_id']) && isset($_POST['feeding_ration_id']) && isset($_POST['feeding_time'])){
		$nutrition = $_POST['id_nutrition'];
		$animal = $_POST['animal_id'];
		$feeding_ration = $_POST['feeding_ration_id'];
		$feeding_time = $_POST['feeding_time'];
		$query = "Update nutrition set  id_animal ='$animal', id_feeding_ration = '$feeding_ration', feeding_time = '$feeding_time' where id_nutrition = '$nutrition'";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/nutrition.php');
}
	if(isset($_POST['worker_id']) && isset($_POST['animal_id']) && isset($_POST['service'])){
		$id_service = $_POST['id_service'];
		$worker = $_POST['worker_id'];
		$animal = $_POST['animal_id'];
		$service = $_POST['service'];
		$query = "Update  service set id_worker ='$worker',id_animal = '$animal', service ='$service' where id_service = '$id_service'";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/service.php');
	}
	if(isset($_POST['animal_id']) && isset($_POST['name']) && (isset($_POST['Information_about_wintering']) || isset($_POST['Normal_temperature']))){
		$id_type = $_POST['id_type'];
		$animal = $_POST['animal_id'];
		$name = $_POST['name'];
		$inf = $_POST['Information_about_wintering'];
		$Normter = $_POST['Normal_temperature'];
		$query = "Update type set id_animal = '$animal', name ='$name', information_about_wintering = '$inf',normal_temperature = '$Normter' where id_type = '$id_type'";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/type.php');
	}
	if(isset($_POST['FIO']) && isset($_POST['birthday']) && isset($_POST['post']) && isset($_POST['email']) && isset($_POST['phone']) ){
		$id = $_POST['worker_id'];
		$fio = $_POST['FIO'];
		$birthday = $_POST['birthday'];
		$post = $_POST['post'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$query = "Update worker set fio ='$fio', birthday = '$birthday', post ='$post', email = '$email',phone_number = '$phone' where id_worker = '$id' ";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/worker.php');
	}
	if(isset($_POST['animal_id']) && isset($_POST['building_id']) && isset($_POST['habitat_period'])){
		$id = $_POST['zoo_territory_id'];
		$animal = $_POST['animal_id'];
		$building = $_POST['building_id'];
		$habitat_period = $_POST['habitat_period'];
		$query = "Update zoo_territory set id_animal = '$animal', id_building = '$building',  habitat_period = '$habitat_period' where id_zoo_territory = '$id'";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/zoo_territory.php');
	}
?>
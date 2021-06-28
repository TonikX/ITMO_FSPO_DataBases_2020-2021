<?php 
	require_once "connect.php";

	if(isset($_POST['id_animal'])){
		$id = $_POST['id_animal'];
		$query = "DELETE FROM animals where id_animal = $id";
		pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/animals.php');
	}
	if(isset($_POST['id_building'])){
		$id = $_POST['id_building'];
		$query = "DELETE FROM building where id_building = $id";
		pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/building.php');
	}
	if(isset($_POST['id_feeding_ration'])){
		$id = $_POST['id_feeding_ration'];
		$query = "DELETE FROM feeding_ration where id_feeding_ration = $id";
		pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/feeding_ration.php');
	}
	if(isset($_POST['id_habitat_area'])){
		$id = $_POST['id_habitat_area'];
		$query = "DELETE FROM habitat_area where id_habitat_area = $id";
		pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/habitat_area.php');
	}
	if(isset($_POST['id_habitation'])){
		$id = $_POST['id_habitation'];
		$query = "DELETE FROM habitation where id_habitation = $id";
		pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/habitation.php');
	}
	if(isset($_POST['id_nutrition'])){
		$id = $_POST['id_nutrition'];
		$query = "DELETE FROM nutrition where id_nutrition = $id";
		pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/nutrition.php');
	}
	if(isset($_POST['id_service'])){
		$id = $_POST['id_service'];
		$query = "DELETE FROM service where id_service = $id";
		pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/service.php');
	}
	if(isset($_POST['id_type'])){
		$id = $_POST['id_type'];
		$query = "DELETE FROM type where id_type = $id";
		pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/type.php');
	}
	if(isset($_POST['id_worker'])){
		$id = $_POST['id_worker'];
		$query = "DELETE FROM worker where id_worker = $id";
		pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/worker.php');
	}
	if(isset($_POST['id_zoo_territory'])){
		$id = $_POST['id_zoo_territory'];
		$query = "DELETE FROM zoo_territory where id_zoo_territory = $id";
		pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /zoo/zoo_territory.php');
	}

?>
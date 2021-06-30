<?php
require_once "connect.php"
?>

<?php

	if(isset($_POST['id_admin']) && isset($_POST['admin_name'])){
	    $id_admin = $_POST['id_admin'];
		$admin_name = $_POST['admin_name'];
		$query = "INSERT INTO admin (id_admin, admin_name) values ('$id_admin','$admin_name')";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /climbingclubdb1/climbingclub/admin.php');
}
	if(isset($_POST['id_top']) && isset($_POST['top_name'])&& isset($_POST['location'])&& isset($_POST['country_name'])&& isset($_POST['top_height'])&& isset($_POST['area_name'])&& isset($_POST['ascent_num'])){
        $id_top = $_POST['id_top'];
		$top_name = $_POST['top_name'];
		$location = $_POST['location'];
		$country_name = $_POST['country_name'];
		$top_height = $_POST['top_height'];
		$area_name = $_POST['area_name'];
		$ascent_num = $_POST['ascent_num'];
		$query = "INSERT INTO top (id_top, top_name, location, country_name, top_height, area_name, ascent_num) values ('$id_top','$top_name', '$location','$country_name','$top_height','$area_name', '$ascent_num')";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /climbingclubdb1/climbingclub/top.php');
	}

if(isset($_POST['id_route']) && isset($_POST['route_description']) && isset($_POST['id_top'])){
    	    $id_route = $_POST['id_route'];
    		$route_description = $_POST['route_description'];
    		$top_id = $_POST['id_top'];
    		$query = "INSERT INTO route (id_route, route_description, id_top ) values ('$id_route','$route_description','$top_id' )";
    		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
    		header('Location: /climbingclubdb1/climbingclub/route.php');
    		}
if(isset($_POST['id_climber']) && isset($_POST['climber`s_name']) && isset($_POST['club`s_name'])  && isset($_POST['address'])  && isset($_POST['ascent_chronicle'])  && isset($_POST['id_climbingClub'])){
    	    $id_climber = $_POST['id_climber'];
    		$climbers_name = $_POST['climber`s_name'];
    		$clubs_name = $_POST['club`s_name'];
    		$address = $_POST['adress'];
    		$ascent_chronicle = $_POST['ascent_chronicle'];
    		$climbingclub_id = $_POST['id_climbingClub'];
    		$query = "INSERT INTO climber (id_climber, 'climber`s_name', 'club`s_name', 'address', ascent_chronicle, id_climbingClub) values ('$id_climber','$climbers_name', '$clubs_name', '$address', '$ascent_chronicle', '$climbingclub_id')";
    		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
    		header('Location: /climbingclubdb1/climbingclub/climber.php');
    		}

if(isset($_POST['id_climbingClub']) && isset($_POST['contact_person']) && isset($_POST['city'])  && isset($_POST['country'])  && isset($_POST['email'])  && isset($_POST['club`s_name']) & isset($_POST['telephone'])){
    	    $id_climbingClub = $_POST['id_climbingClub'];
    		$contact_person = $_POST['contact_person'];
    		$city = $_POST['city'];
    		$country = $_POST['country'];
    		$email = $_POST['email'];
    		$clubs_name = $_POST['club`s_name'];
    		$telephone = $_POST['telephone'];
    		$query = "INSERT INTO climbing_club (id_climbingClub, contact_person, city, country, email, 'club`s_name', telephone) values ('$id_climbingClub','$contact_person', '$city', '$country', '$email', '$clubs_name', '$telephone')";
    		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
    		header('Location: /climbingclubdb1/climbingclub/climbing_club.php');
    		}

	if(isset($_POST['id_group']) && isset($_POST['group_name'])){
	    $id_group = $_POST['id_group'];
		$group_name = $_POST['group_name'];
		$query = "INSERT INTO climbing_group (id_group, group_name) values ('$id_group','$group_name')";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /climbingclubdb1/climbingclub/group.php');
}

    if(isset($_POST['ascent_date']) && isset($_POST['ascent_success'])&& isset($_POST['ascent_duration']) && isset($_POST['id_admin']) && isset($_POST['id_group']) && isset($_POST['id_route']) && isset($_POST['id_top'])&& isset($_POST['ascent_time'])){
    	    $ascent_date = $_POST['ascent_date'];
    		$ascent_success = $_POST['ascent_success'];
    		$ascent_duration = $_POST['ascent_duration'];
    		$admin_id = $_POST['id_admin'];
    		$group_id = $_POST['id_group'];
    		$route_id = $_POST['id_route'];
    		$top_id = $_POST['id_top'];
    		$ascent_time = $_POST['ascent_time'];
    		$query = "INSERT INTO group_composition (ascent_date, ascent_success, ascent_duration, id_admin, id_group, id_route, id_top, ascent_time) values ('&ascent_date','$ascent_success', '$ascent_duration' '$admin_id', '$group_id', '$route_id', '$top_id', '$ascent_time')";
    		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
    		header('Location: /climbingclubdb1/climbingclub/ascent.php');
    }
?>

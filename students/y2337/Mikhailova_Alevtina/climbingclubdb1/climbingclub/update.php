<?php 
	require_once "connect.php";
?>
<?php
	
	if(isset($_POST['id_top']) && isset($_POST['top_name'])&& isset($_POST['location'])&& isset($_POST['country_name'])&& isset($_POST['top_height'])&& isset($_POST['area_name'])&& isset($_POST['ascent_num'])){
		$id_top = $_POST['id_top'];
		$top_name = $_POST['top_name'];
		$location = $_POST['location'];
		$country_name = $_POST['country_name'];
		$top_height = $_POST['top_height'];
		$area_name = $_POST['area_name'];
		$ascent_num = $_POST['ascent_num'];
		$query = "Update top set id_top ='$id_top',top_name = '$top_name',location = '$location',country_name = '$country_name',top_height = '$top_height',area_name = '$area_name',ascent_num = '$ascent_num'where id_top = '$id_top'";
		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /climbingclubdb1/climbingclub/top.php');
	}

	if(isset($_POST['id_admin']) && isset($_POST['admin_name'])){
    		$id_admin = $_POST['id_admin'];
    		$admin_name = $_POST['admin_name'];
    		$query = "Update admin set admin_name ='$admin_name' where id_admin= '$id_admin'";
    		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
    		header('Location: /climbingclubdb1/climbingclub/admin.php');
    	}

    if(isset($_POST['id_route']) && isset($_POST['id_top']) && isset($_POST['route_description'])){
        		$id_route = $_POST['id_route'];
        		$top_id = $_POST['id_top'];
        		$route_description = $_POST['route_description'];
        		$query = "Update route set id_top='$top_id', route_description='$route_description' where id_route= '$id_route'";
        		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
        		header('Location: /climbingclubdb1/climbingclub/route.php');
        }
if(isset($_POST['id_climber']) && isset($_POST['climber`s_name']) && isset($_POST['club`s_name'])  && isset($_POST['adress'])  && isset($_POST['ascent_chronicle'])  && isset($_POST['id_climbingClub'])){
    	    $id_climber = $_POST['id_climber'];
    		$climbers_name = $_POST['climber`s_name'];
    		$clubs_name = $_POST['club`s_name'];
    		$address = $_POST['adress'];
    		$ascent_chronicle = $_POST['ascent_chronicle'];
    		$climbingclub_id = $_POST['id_climbingClub'];
    		$query = "Update climber set id_climber='$id_climber', 'climber`s_name'='$clubs_name', 'club`s_name'=$clubs_name, 'adress'=$address, 'ascent_chronicle'=$ascent_chronicle, 'id_climbingClub'=$climbingclub_id where id_climber= '$id_climber'";
    		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
    		header('Location: /climbingclubdb1/climbingclub/climber.php');
    		}
if(isset($_POST['id_group']) && isset($_POST['group_name'])){
    		$id_group = $_POST['id_group'];
    		$group_name = $_POST['group_name'];
    		$query = "Update climbing_group set group_name ='$group_name' where id_group= '$id_group'";
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
    		$query = "Update ascent set ascent_date ='$ascent_date', ascent_success='$ascent_success', ascent_duration='$ascent_duration' id_admin='$admin_id', id_group='$group_id', id_route='$route_id', id_top='$top_id', ascent_time='$ascent_time' where ascent_date= '$ascent_date'";
    		pg_query($query)or die('Ошибка запроса: ' . pg_last_error());
    		header('Location: /climbingclubdb1/climbingclub/ascent.php');
    	}
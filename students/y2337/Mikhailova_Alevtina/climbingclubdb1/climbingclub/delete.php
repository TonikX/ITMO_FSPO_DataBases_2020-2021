<?php 
	require_once "connect.php";


	if(isset($_POST['id_top'])){
		$id_top= $_POST['id_top'];
		$query = "DELETE FROM top where id_top = '$id_top'";
		pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /climbingclubdb1/climbingclub/top.php');
	}
	if(isset($_POST['id_admin'])){
		$id_admin = $_POST['id_admin'];
		$query = "DELETE FROM admin where id_admin = '$id_admin'";
		pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		header('Location: /climbingclubdb1/climbingclub/admin.php');
	}
    if(isset($_POST['id_route'])){
    		$id_route = $_POST['id_route'];
    		$query = "DELETE FROM route where id_route = '$id_route'";
    		pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
    		header('Location: /climbingclubdb1/climbingclub/route.php');
    	}

    if(isset($_POST['id_climbingClub'])){
        		$id_route = $_POST['id_climbingClub'];
        		$query = "DELETE FROM 'climbingClub' where id_climbingClub = '$id_climbingClub'";
        		pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
        		header('Location: /climbingclubdb1/climbingclub/climbing_club.php');
        	}
if(isset($_POST['id_group'])){
        		$id_group = $_POST['id_group'];
        		$query = "DELETE FROM climbing_group where id_group = '$id_group'";
        		pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
        		header('Location: /climbingclubdb1/climbingclub/group.php');
        	}
?>
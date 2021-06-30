<?php 
	require_once "connect.php";
	
?>

<!DOCTYPE html>
<html lang = "ru">
<head>
	<meta charset="UTF-8">
	<title>Update </title>
	<link rel="styledheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="climbingclubdb/header.php">
</head>
<?php require "header.php"?>
<?php
	if(isset($_POST['id_top'])){
		$id_top =$_POST['id_top'];
		$query = "SELECT * FROM top where id_top = '$id_top'";
		$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		$line=pg_fetch_array($result);
		$number =1;
	}
	elseif(isset($_POST['id_route'])){
		$id_route =$_POST['id_route'];
		$query = "SELECT * FROM route where id_route = '$id_route'";
		$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		$line=pg_fetch_array($result);
		$number =2;
	}
	elseif(isset($_POST['id_admin'])){
		$id_admin =$_POST['id_admin'];
		$query = "SELECT * FROM admin where id_admin = '$id_admin'";
		$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
		$line=pg_fetch_array($result);
		$number =3;
    }

    elseif(isset($_POST['id_climber'])){
    		$id_climber =$_POST['id_climber'];
    		$query = "SELECT * FROM climber where id_climber = '$id_climber'";
    		$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
    		$line=pg_fetch_array($result);
    		$number =4;
        }

       elseif(isset($_POST['id_climbing_club'])){
       		$id_climbingClub =$_POST['id_climbing_club'];
       		$query = "SELECT * FROM climbing_club where id_climbing_club = '$id_climbingClub'";
       		$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
       		$line=pg_fetch_array($result);
       		$number =5;
           }
        elseif(isset($_POST['id_group'])){
       		$id_group =$_POST['id_group'];
       		$query = "SELECT * FROM climbing_group where id_group = '$id_group'";
       		$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
       		$line=pg_fetch_array($result);
       		$number =6;
           }

        elseif(isset($_POST['num_of_climbers'])){
    		$num_of_climbers = $_POST['num_of_climbers'];
       		$query = "SELECT * FROM group_composition where num_of_climbers = '$num_of_climbers'";
       		$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
       		$line=pg_fetch_array($result);
       		$number =7;
           }

        elseif(isset($_POST['id_emergency'])){
    		$id_emergency = $_POST['id_emergency'];
       		$query = "SELECT * FROM emergency_situation where id_emergency = '$id_emergency'";
       		$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
       		$line=pg_fetch_array($result);
       		$number =8;
}
        elseif(isset($_POST['ascent_date'])){
    		$ascent_date = $_POST['ascent_date'];
       		$query = "SELECT * FROM ascent where ascent_date = 'ascent_date'";
       		$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
       		$line=pg_fetch_array($result);
       		$number =9;
           }

if ($number ==1) {
?>
	<form  action = "update.php" class ="mx-auto mb-5" method="post">
    			<div class="mx-auto" style='width: 1100px'>
    		<h1 class ="mx-auto">Update top</h1>
    		</div>
    		<div class="mx-auto" style='width: 1100px'>
    			<p class="mt-2">ID_top</p>
    			<input type ="number" class =" form-control mx-auto mb-2" name ="id_top" value ="<?=$line['id_top'] ?>">
    				<p class="mt-2">top_name</p>
    				<input type ="text" name =top_name class="form-control" value ="<?=$line['top_name']?>">
    				<p class="mt-2">location</p>
                    <input type ="text" name =location class="form-control" value ="<?=$line['location']?>">
                    <p class="mt-2">country_name</p>
                    <input type ="text" name =country_name class="form-control" value ="<?=$line['country_name']?>">
                    <p class="mt-2">top_height</p>
                    <input type ="text" name =top_height class="form-control" value ="<?=$line['top_height']?>">
                    <p class="mt-2">area_name</p>
                    <input type ="text" name =area_name class="form-control" value ="<?=$line['area_name']?>">
                    <p class="mt-2">ascent_num</p>
                    <input type ="text" name =ascent_num class="form-control" value ="<?=$line['ascent_num']?>">
    				<button type = "submit" class = "btn-primary"> Update</button>
    			</form>
    		</div>
    <?php
    }
elseif ($number ==2) {
?>
	<form method = "POST" action = "update.php" class = "mt-4 mx-auto">
		<div class="mx-auto" style='width: 1100px'>
			<h3 class ="mx-auto">Update route</h3>
			<p class="mt-2">ID_route</p>
			<input type ="number" class ="mx-auto mb-3" name ="id_route" value ="<?=$line['id_route'] ?>"><br>
			<p class="mt-2">route_description</p>
            <input type ="text" class ="mx-auto mb-3" name ="route_description" value ="<?=$line['route_description'] ?>">
            <button type = "submit" class = "btn-primary"> Update</button>
            <br>
		   	<label class="prefix" for="id_top" class ="mx-auto mb-5">top:</label><br>
		   	<select id="id_top" name="id_top">
		    <option value=""><?=$line['id_top'] ?></option>
		    <?php
		      $result = pg_query('SELECT * FROM top');
		      while ($row = pg_fetch_array($result))
		      {
		         echo "<option value='".$row["id_top"]."'>".$row["id_top"]."</option>";
		      }
		    ?>

	</form>
	</div>
    <?php
}
elseif ($number ==3) {
?>

		<form  action = "update.php" class ="mx-auto mb-5" method="post">
			<div class="mx-auto" style='width: 1100px'>
		<h1 class ="mx-auto">Update admin</h1>
		</div>
		<div class="mx-auto" style='width: 1100px'>
			<p class="mt-2">ID</p>
			<input type ="number" class =" form-control mx-auto mb-2" name ="id_admin" value ="<?=$line['id_admin'] ?>">
				<p class="mt-2">admin_name</p>
				<input type ="text" name =admin_name class="form-control" value ="<?=$line['admin_name']?>">
				<button type = "submit" class = "btn-primary"> Update</button>
			</form>
		</div>
<?php
}

elseif ($number ==4) {
?>

		<form  action = "update.php" class ="mx-auto mb-5" method="post">
			<div class="mx-auto" style='width: 1100px'>
		<h1 class ="mx-auto">Update climber</h1>
		</div>
		<div class="mx-auto" style='width: 1100px'>
			<p class="mt-2">ID</p>
			<input type ="number" class =" form-control mx-auto mb-2" name ="id_climber" value ="<?=$line['id_climber'] ?>">
                                <p class="mt-1">climbers_name</p>
                                <input type ="text"  name ="climbers_name" class="form-control" value ="<?=$line['climber`s_name']?>">
                                <p class="mt-1">clubs_name</p>
                                <input type ="text" name ="clubs_name" class="form-control" value ="<?=$line['club`s_name']?>">
                                <p class="mt-1">address</p>
                                <input type ="text" name ="address" class="form-control" value ="<?=$line['adress']?>">
                                <p class="mt-1">ascent_chronicle</p>
                                <input type ="text" name ="ascent_chronicle" class="form-control" value ="<?=$line['ascent_chronicle']?>">
                                <p class="mt-1">id_climbingClub</p>
                                <input type ="number" name ="id_climbing_club" class="form-control" value ="<?=$line['id_climbing_club']?>">
				<button type = "submit" class = "btn-primary"> Update</button>
			</form>
		</div>
<?php
}

elseif ($number ==5) {
?>

		<form  action = "update.php" class ="mx-auto mb-5" method="post">
			<div class="mx-auto" style='width: 1100px'>
		<h1 class ="mx-auto">Update climbingClub</h1>
		</div>
		<div class="mx-auto" style='width: 1100px'>
			<p class="mt-2">ID</p>
			<input type ="number" class =" form-control mx-auto mb-2" name ="id_climbingClub" value ="<?=$line['id_climbing_club'] ?>">
			<p class="mt-2">"contact_person"</p>
			<input type ="text" name ="contact_person" class="form-control" value ="<?=$line['city']?>">
			<p class="mt-2">"city"</p>
			<input type ="text" name ="city" class="form-control" value ="<?=$line['city']?>">
			<p class="mt-2">"country"</p>
			<input type ="text" name ="country" class="form-control" value ="<?=$line['country']?>">
			<p class="mt-2">"email"</p>
			<input type ="text" name ="email" class="form-control" value ="<?=$line['email']?>">
			<p class="mt-2">"club`s_name"</p>
			<input type ="text" name ="club`s_name" class="form-control" value ="<?=$line['club`s_name']?>">
			<p class="mt-2">"telephone"</p>
            <input type ="text" name ="telephone" class="form-control" value ="<?=$line['telephone']?>">
			<button type = "submit" class = "btn-primary"> Update</button>
			</form>
		</div>
<?php
}

elseif ($number ==6) {
?>

		<form  action = "update.php" class ="mx-auto mb-5" method="post">
			<div class="mx-auto" style='width: 1100px'>
		<h1 class ="mx-auto">Update group</h1>
		</div>
		<div class="mx-auto" style='width: 1100px'>
			<p class="mt-2">ID</p>
			<input type ="number" class =" form-control mx-auto mb-2" name ="id_group" value ="<?=$line['id_group'] ?>">
				<p class="mt-2">group_name</p>
				<input type ="text" name ="group_name" class="form-control" value ="<?=$line['group_name']?>">
				<button type = "submit" class = "btn-primary"> Update</button>
			</form>
		</div>
<?php
}

elseif ($number ==7) {
?>

		<form  action = "update.php" class ="mx-auto mb-5" method="post">
			<div class="mx-auto" style='width: 1100px'>
		<h1 class ="mx-auto">Update group composition</h1>
		</div>
		<div class="mx-auto" style='width: 1100px'>
			<p class="mt-2">num_of_climbers</p>
			<input type ="number" class =" form-control mx-auto mb-2" name ="num_of_climbers" value ="<?=$line['num_of_climbers'] ?>">
			<p class="mt-2">"climbers_information"</p>
			<input type ="text" name ="climbers_information" class="form-control" value ="<?=$line['climbers_information']?>">
			<p class="mt-2">"id_admin"</p>
			<input type ="number" name ="id_admin" class="form-control" value ="<?=$line['id_admin']?>">
			<p class="mt-2">"id_group"</p>
			<input type ="number" name ="id_group" class="form-control" value ="<?=$line['id_group']?>">
			<p class="mt-2">"id_climber"</p>
			<input type ="number" name ="id_climber" class="form-control" value ="<?=$line['id_climber']?>">
			<p class="mt-2">"id_climbingClub"</p>
			<input type ="number" name ="id_climbing_club" class="form-control" value ="<?=$line['id_climbing_club']?>">
			<button type = "submit" class = "btn-primary"> Update</button>
			</form>
		</div>
<?php
}

elseif ($number ==8) {
?>

		<form  action = "update.php" class ="mx-auto mb-5" method="post">
			<div class="mx-auto" style='width: 1100px'>
		<h1 class ="mx-auto">Update Emergency Situation</h1>
		</div>
		<div class="mx-auto" style='width: 1100px'>
			<p class="mt-2">id_emergency</p>
			<input type ="number" class =" form-control mx-auto mb-2" name ="num_of_climbers" value ="<?=$line['id_emergency'] ?>">
			<p class="mt-2">"reason"</p>
			<input type ="text" name ="reason" class="form-control" value ="<?=$line['reason']?>">
			<p class="mt-2">"id_admin"</p>
			<input type ="number" name ="id_admin" class="form-control" value ="<?=$line['id_admin']?>">
			<p class="mt-2">"id_group"</p>
			<input type ="number" name ="id_group" class="form-control" value ="<?=$line['id_group']?>">
			<p class="mt-2">"id_climber"</p>
			<input type ="number" name ="id_climber" class="form-control" value ="<?=$line['id_climber']?>">
			<p class="mt-2">"id_climbing_club"</p>
			<input type ="number" name ="id_climbing_club" class="form-control" value ="<?=$line['id_climbing_club']?>">
			<p class="mt-2">"id_route"</p>
			<input type ="number" name ="id_route" class="form-control" value ="<?=$line['id_route']?>">
			<p class="mt-2">"id_top"</p>
			<input type ="number" name ="id_top" class="form-control" value ="<?=$line['id_top']?>">
			<button type = "submit" class = "btn-primary"> Update</button>
			</form>
		</div>
<?php

}
elseif ($number ==9) {
?>

		<form  action = "update.php" class ="mx-auto mb-5" method="post">
			<div class="mx-auto" style='width: 1100px'>
		<h1 class ="mx-auto">Update ascent</h1>
		</div>
		<div class="mx-auto" style='width: 1100px'>
			<p class="mt-2">ascent_date</p>
			<input type ="date" class =" form-control mx-auto mb-2" name ="ascent_date" value ="<?=$line['ascent_date'] ?>">
			<p class="mt-2">"ascent_success"</p>
			<input type ="number" name ="ascent_success" class="form-control" value ="<?=$line['ascent_success']?>">
			<p class="mt-2">"ascent_duration"</p>
			<input type ="number" name ="ascent_duration" class="form-control" value ="<?=$line['ascent_duration']?>">
			<p class="mt-2">"id_admin"</p>
			<input type ="number" name ="id_admin" class="form-control" value ="<?=$line['id_admin']?>">
			<p class="mt-2">"id_group"</p>
			<input type ="number" name ="id_group" class="form-control" value ="<?=$line['id_group']?>">
			<p class="mt-2">"id_route"</p>
			<input type ="number" name ="id_route" class="form-control" value ="<?=$line['id_route']?>">
			<p class="mt-2">"id_top"</p>
			<input type ="number" name ="id_top" class="form-control" value ="<?=$line['id_top']?>">
			<p class="mt-2">"ascent_time"</p>
			<input type ="time" name ="ascent_time" class="form-control" value ="<?=$line['ascent_time']?>">
			<button type = "submit" class = "btn-primary"> Update</button>
			</form>
		</div>
<?php
}
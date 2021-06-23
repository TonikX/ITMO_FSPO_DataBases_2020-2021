<?php

		define('HOST', 'localhost');
		define('USERNAME', 'root');
		define('PASSWORD', '');
		define('DB', 'lab_6');

		$con=mysqli_connect(HOST,USERNAME,PASSWORD,DB) 
		or die(mysqli_connect_error());
		
?>
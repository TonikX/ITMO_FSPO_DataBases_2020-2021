<?php
$dbuser = 'postgres';
$dbpass = 'toor';
$host = 'localhost';
$dbname='Birzha';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
	if (isset($_POST['submit']))
	{	
 			 $result1 = pg_query($db, "INSERT INTO batch(id_batch, delivery_conditions) VALUES ('$_POST[id_batch_added]',
  			'$_POST[delivery_conditions_added]')");
	}
?>
<?php
$dbuser = 'postgres';
$dbpass = 'toor';
$host = 'localhost';
$dbname='Birzha';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
	if (isset($_POST['submit']))
	{	
 			 $result1 = pg_query($db, "INSERT INTO manufactory(id_manufactory, type_manufactory_product, id_manufactory_product) VALUES ('$_POST[id_manufactory_added]', '$_POST[type_manufactory_product_added]', '$_POST[id_manufactory_product_added]')");
	}
?>
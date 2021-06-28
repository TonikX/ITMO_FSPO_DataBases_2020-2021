<?php
$dbuser = 'postgres';
$dbpass = 'toor';
$host = 'localhost';
$dbname='Birzha';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
	if (isset($_POST['submit']))
	{	
 			 $result1 = pg_query($db, "INSERT INTO customer(id_customer, name_customer) VALUES ('$_POST[id_customer_added]',
  			'$_POST[name_customer_added]')");
	}
?>
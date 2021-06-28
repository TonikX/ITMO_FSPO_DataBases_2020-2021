<?php
$dbuser = 'postgres';
$dbpass = 'toor';
$host = 'localhost';
$dbname='Birzha';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
	if (isset($_POST['submit']))
	{	
 			 $result1 = pg_query($db, "INSERT INTO manufactory(id_manufactory, name_manufactory, specialization, contacts) VALUES ('$_POST[id_manufactory_added]', '$_POST[name_manufactory_added]', '$_POST[specialization_added]', '$_POST[contacts_added]')");
	}
?>
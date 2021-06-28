<?php
$dbuser = 'postgres';
$dbpass = 'toor';
$host = 'localhost';
$dbname='Birzha';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
	if (isset($_POST['submit']))
	{	
 			 $result1 = pg_query($db, "INSERT INTO manufactory(id_office, name_office, contacts_office, id_broker) VALUES ('$_POST[id_office_added]', '$_POST[name_office_added]', '$_POST[contacts_office_added]', '$_POST[id_broker_added]')");
	}
?>
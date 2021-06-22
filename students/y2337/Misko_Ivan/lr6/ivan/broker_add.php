<?php
$dbuser = 'postgres';
$dbpass = 'toor';
$host = 'localhost';
$dbname='Birzha';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
	if (isset($_POST['submit']))
	{	
 			 $result1 = pg_query($db, "INSERT INTO manufactory(id_broker, company_payments, name_broker, income) VALUES ('$_POST[id_broker_added]', '$_POST[company_payments_added]', '$_POST[name_broker_added]', '$_POST[income_added]')");
	}
?>
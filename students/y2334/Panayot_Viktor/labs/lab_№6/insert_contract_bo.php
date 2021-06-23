<h2>Insert row into contract_bo table</h2>
	<ul>
		<form name="insert" action="insert_contract_bo.php" method="POST">
			<li>idcontract_bo:</li>
			<input type="text" name="idcontract_bo" />
			<li>idoffice:</li>
			<input type="text" name="idoffice" />
			<li>idbroker:</li>
			<input type="text" name="idbroker" />
			<li>office_percent:</li>
			<input type="text" name="office_percent" />
			<li>salary:</li>
			<input type="text" name="salary" />
			<li>date_of_duration:</li>
			<input type="text" name="date_of_duration" />
            <li>
			<input type="submit" name="submit_insert" /> 
            </li>
        </form>
	</ul>
<?php
require_once "config.php";
$db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
if (isset($_POST['submit_insert']))
{
	$db->beginTransaction();
	$insert_query = "INSERT INTO contract_bo VALUES
	               ('$_POST[idcontract_bo]',
                    '$_POST[idoffice]',
                    '$_POST[idbroker]',
                    '$_POST[office_percent]',
                    '$_POST[salary]',
                    '$_POST[date_of_duration]')";

$insert_result = $db->exec($insert_query);
$db->commit();
header("Location: contract_bo.php");
}
?>

<head>
	<title>table broker</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style>
	li {
		listt-style: none;
	}
	input[type=submit] {
		background-color: #8B0000;
		border: none;
		color: white;
		padding: 8px 16px;
		cursor: pointer;
	}
	</style>
</head>
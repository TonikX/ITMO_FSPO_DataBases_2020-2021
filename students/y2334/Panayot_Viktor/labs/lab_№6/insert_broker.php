<h2>Insert row into broker table</h2>
	<ul>
		<form name="insert" action="insert_broker.php" method="POST">
			<li>idbroker:</li>
			<input type="text" name="idbroker" />
			<li>name_broker:</li>
			<input type="text" name="name_broker" />
			<li>succsess_percent:</li>
			<input type="text" name="succsess_percent" />
			<li>work_experience:</li>
			<input type="text" name="work_experience" />
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
$insert_query = "INSERT INTO broker VALUES 
                    ('$_POST[name_broker]',
                    '$_POST[succsess_percent]',
                    '$_POST[idbroker]',
                    '$_POST[work_experience]')";

$insert_result = $db->exec($insert_query);
$db->commit();
header("Location: broker.php");
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
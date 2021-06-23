<h2>Insert row into office table</h2>
	<ul>
		<form name="insert" action="insert_office.php" method="POST">
			<li>idoffice:</li>
			<input type="text" name="idoffice" />
			<li>name_office:</li>
			<input type="text" name="name_office" />
			<input type="submit" name="submit_insert" /> 
            </li>
        </form>
	</ul>
<?php
require_once "config.php";
$db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass);
if (isset($_POST['submit_insert']))
{
  $insert_query = "INSERT INTO office VALUES
                   ('$_POST[idoffice]',
                    '$_POST[name_office]')";

  $insert_result = $db->query($insert_query);
  header("Location: office.php");
}
?>

<head>
	<title>table office</title>
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
<h2>Insert row into batch table</h2>
	<ul>
		<form name="insert" action="insert_batch.php" method="POST">
			<li>idbatch:</li>
			<input type="text" name="idbatch" />
			<li>name_batch:</li>
			<input type="text" name="name_batch" />
			<li>amount_of_product:</li>
			<input type="text" name="amount_of_product" />
			<li>price_batch:</li>
			<input type="text" name="price_batch" />
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
	$insert_query = "INSERT INTO batch VALUES
					 ('$_POST[idbatch]',
					  '$_POST[name_batch]',
					  '$_POST[amount_of_product]',
					  '$_POST[price_batch]')";
  
	$insert_result = $db->exec($insert_query);
	$db->commit();
	header("Location: batch.php");
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
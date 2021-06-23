<?php
$item_id = $_GET['id'];
require_once "config.php";

$db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$redact_query = "SELECT * FROM office WHERE idoffice = $item_id";
$redact_result = $db->query($redact_query);
$row = $redact_result->fetch();
echo "<ul>
<form name='update' method='POST'>
<li>idoffice:</li>
<li><input type='text' name='upt_idoffice' value='$row[idoffice]'/></li>
<li>name_office:</li>
<li><input type='text' name='upt_name_office' value='$row[name_office]'/></li>
<li><input type='submit' name='new'/></li>
</form>
</ul>";
if (isset($_POST['new']))
{
$new_query = "UPDATE office
SET name_office = '$_POST[upt_name_office]'
WHERE idoffice = '$_POST[upt_idoffice]'";
$new_result = $db->query($new_query);
if (!$new_result)
{
echo "Error. Think about this. _P";
} else
{
header("Location: office.php");
}
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
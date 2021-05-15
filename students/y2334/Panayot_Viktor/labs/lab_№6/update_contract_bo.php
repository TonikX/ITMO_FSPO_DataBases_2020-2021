<h2>Update row. Enter a id broker</h2>
    <?php
    $id = $_GET['id'];
    require_once "config.php";
    $db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $redact_query = "SELECT * FROM contract_bo WHERE idcontract_bo = '$id'";
	$redact_result = $db->query($redact_query);
	$row = $redact_result->fetch();
	echo "<ul>
    <form name='update' method='POST'>
    <li>idcontract_bo:</li>
    <li><input type='text' name='upt_idcontract_bo' value='$row[idcontract_bo]'/></li>
    <li>idoffice:</li>
    <li><input type='text' name='upt_idoffice' value='$row[idoffice]'/></li>
    <li>idbroker:</li>
    <li><input type='text' name='upt_idbroker' value='$row[idbroker]'/></li>
    <li>office_percent:</li>
    <li><input type='text' name='upt_office_percent' value='$row[office_percent]'/></li>
    <li>salary:</li>
    <li><input type='text' name='upt_salary' value='$row[salary]'/></li>
	<li>date_of_duration:</li>
    <li><input type='text' name='upt_date_of_duration' value='$row[date_of_duration]'/></li>
    <li><input type='submit' name='new'/></li>
    </form>
    </ul>";
	if (isset($_POST['new']))
	
	{
		$db->beginTransaction();
		$new_query = "UPDATE contract_bo
                SET idoffice = '$_POST[upt_idoffice]',
                    idbroker = '$_POST[upt_idbroker]',
                    office_percent = '$_POST[upt_office_percent]',
                    salary = '$_POST[upt_salary]',
                    date_of_duration = '$_POST[upt_date_of_duration]'
                WHERE idcontract_bo = '$_POST[upt_idcontract_bo]'";
	$new_result = $db->exec($new_query);
    $db->commit();
	if (!$new_result)
	{
		echo "Error. Think about this. _P";
	} else
	{
		header("Location: contract_bo.php");
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
<h2>Update row. Enter a id broker</h2>
    <?php
    $id = $_GET['id'];
    require_once "config.php";
    $db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $redact_query = "SELECT * FROM broker WHERE idbroker = '$id'";
    $redact_result = $db->query($redact_query);
    $row = $redact_result->fetch();
    echo "<ul>
    <form name='update' method='POST'>
    <li>idbroker:</li>
    <li><input type='text' name='upt_idbroker' value='$row[idbroker]'/></li>
    <li>name_broker:</li>
    <li><input type='text' name='upt_name_broker' value='$row[name_broker]'/></li>
    <li>succsess_percent:</li>
    <li><input type='text' name='upt_succsess_percent' value='$row[succsess_percent]'/></li>
    <li>work_experience:</li>
    <li><input type='text' name='upt_work_experience' value='$row[work_experience]'/></li>
    <li><input type='submit' name='new'/></li>
    </form>
    </ul>";
	if (isset($_POST['new']))
	{
    $db->beginTransaction();
    $new_query = "UPDATE broker
                SET name_broker = '$_POST[upt_name_broker]',
                    succsess_percent = '$_POST[upt_succsess_percent]',
                    work_experience = '$_POST[upt_work_experience]'
                WHERE idbroker = '$_POST[upt_idbroker]'";
	$new_result = $db->exec($new_query);
    $db->commit();
	if (!$new_result)
	{
	echo "Error. Think about this. _P";
	} else
	{
	header("Location: broker.php");
	}
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

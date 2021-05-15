<h2>Update row</h2>
    <?php
    $id = $_GET['id'];
    require_once "config.php";
    $db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $redact_query = "SELECT * FROM batch WHERE idbatch = '$id'";
    $redact_result = $db->query($redact_query);
    $row = $redact_result->fetch();
    echo "<ul>
    <form name='update' method='POST'>
    <li>idbatch:</li>
    <li><input type='text' name='upt_idbatch' value='$row[idbatch]'/></li>
    <li>name_batch:</li>
    <li><input type='text' name='upt_name_batch' value='$row[name_batch]'/></li>
    <li>amount_of_product:</li>
    <li><input type='text' name='upt_amount_of_product' value='$row[amount_of_product]'/></li>
    <li>price_batch:</li>
    <li><input type='text' name='upt_price_batch' value='$row[price_batch]'/></li>
    <li><input type='submit' name='new'/></li>
    </form>
    </ul>";
	if (isset($_POST['new']))

	{
    $db->beginTransaction();
    $new_query = "UPDATE batch
                SET name_batch = '$_POST[upt_name_batch]',
                    amount_of_product = '$_POST[amount_of_product]',
                    price_batch = '$_POST[upt_price_batch]'
                WHERE idbatch = '$_POST[upt_idbatch]'";
	$new_result = $db->exec($new_query);
    $db->commit();
	if (!$new_result)
	{
	echo "Error. Think about this. _P";
	} else
	{
	header("Location: batch.php");
	}
	}
    ?>

<head>
	<title>table batch</title>
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
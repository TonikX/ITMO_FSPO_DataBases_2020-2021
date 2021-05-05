<h1>Table batch<h1>
<a href='index.php'>Main Page</a> <br/>
<h2>batch</h2>
<?php
	$host = "localhost";
	$dbname = "market";
	$dbuser = "postgres";
	$dbpass = "1234";
	$db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
	$result = $db->query("SELECT * FROM batch");
?>

<body>
	<table>
		<tr>
			<th>idbatch</th>
			<th>name_batch</th>
			<th>amount_of_product</th>
			<th>price_batch</th>
		</tr>
    <?php
	while ($row = $result->fetch()) {
    echo '<tr>';
		echo '<td>' . $row['idbatch'] . '</td>';
		echo '<td>' . $row['name_batch'] . " " . '</td>';
		echo '<td>' . $row['amount_of_product'] . " " . '</td>';
		echo '<td>' . $row['price_batch'] . "<br>" . '</td>';
    echo '</tr>';
	}
    ?>
</table></body></html>


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

<h2>Insert row into batch table</h2>
	<ul>
		<form name="insert" action="batch.php" method="POST">
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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style>
	li {
		list-style: none;
	}
	</style>
</head>
<body>
	<h2>Update row. Enter a id batch</h2>
	<ul>
		<form name="display" action="batch.php" method="POST">
			<li>idbatch:</li>
			<li>
				<input type="text" name="upt_idbatch" />
			</li>
			<li>
				<input type="submit" name="submit_update" />
			</li>
		</form>
	</ul>
</body>
    
    <?php
	if (isset($_POST['submit_update']))
	{
    $redact_query = "SELECT * FROM batch WHERE idbatch = '$_POST[upt_idbatch]'";
    $redact_result = $db->query($redact_query);
    $row = $redact_result->fetch();
    echo "<ul>
    <form name='update' action='batch.php' method='POST'>
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
	}
    ?>

    <?php
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        li {
        list-style: none;
        }
    </style>
</head>
<body>
    <h2>Delete row. Enter a id batch</h2>
    <ul>
        <form name="display" action="batch.php" method="POST" >
            <li>idbatch:</li>
            <li><input type="text" name="del_idbatch"/></li>
            <li><input type="submit" name="submit_delete" /></li>
        </form>
    </ul>
</body>

    <?php
	if (isset($_POST['submit_delete']))
	{
  $db->beginTransaction();
  $delete_query = "DELETE FROM batch
                   WHERE idbatch = '$_POST[del_idbatch]'";
	$detete_result = $db->exec($delete_query);
  $db->commit();
	if (!$detete_result)
	{
	echo "Error. Think about this. _P";
	} else
	{
	header("Location: batch.php");
	}
	}
	echo '</html>';
    ?>

<html>
    <body><table><tr>
    <head>
        <style>
    table {
    font-family: times, sans-serif;
    border-collapse: collapse;
    table-layout: fixed;
    }
    td, th {
    border: 1px solid #8B0000;
    text-align: center;
    padding: 12px;
    }
    tr:nth-child(even){background-color: #f2f2f2}
    tr:hover {background-color: #ddd;}
    </style>
    </head>
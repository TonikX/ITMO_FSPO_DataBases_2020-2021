<h1>Table Firm<h1>
<a href='index.php'>Main Page</a> <br/>
<h2>Firm</h2>
<?php
	$host = "localhost";
	$dbname = "market";
	$dbuser = "postgres";
	$dbpass = "1234";
	$db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
	$result = $db->query("SELECT * FROM firm");
?>

<body>
	<table>
		<tr>
			<th>idfirm</th>
			<th>name_firm</th>
			<th>specialization_firm</th>
		</tr>
    <?php
	while ($row = $result->fetch()) {
    echo '<tr>';
		echo '<td>' . $row['idfirm'] . '</td>';
		echo '<td>' . $row['name_firm'] . " " . '</td>';
		echo '<td>' . $row['specialization_firm'] . "<br>" . '</td>';
    echo '</tr>';
	}
    ?>
</table></body></html>


<head>
	<title>table Firm</title>
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

<h2>Insert row into Firm table</h2>
	<ul>
		<form name="insert" action="Firm.php" method="POST">
			<li>idfirm:</li>
			<input type="text" name="idfirm" />
			<li>name_firm:</li>
			<input type="text" name="name_firm" />
			<li>specialization_firm:</li>
			<input type="text" name="specialization_firm" />
            <li>
			<input type="submit" name="submit_insert" /> 
            </li>
        </form>
	</ul>
<?php
if (isset($_POST['submit_insert']))
{
  $db->beginTransaction();
  $insert_query = "INSERT INTO firm VALUES
                   ('$_POST[idfirm]',
                    '$_POST[name_firm]',
                    '$_POST[specialization_firm]')";

  $insert_result = $db->exec($insert_query);
  $db->commit();
  header("Location: Firm.php");
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
	<h2>Update row. Enter a id broker</h2>
	<ul>
		<form name="display" action="Firm.php" method="POST">
			<li>idfirm:</li>
			<li>
				<input type="text" name="upt_idfirm" />
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
    $redact_query = "SELECT * FROM firm WHERE idfirm = '$_POST[upt_idfirm]'";
    $redact_result = $db->query($redact_query);
    $row = $redact_result->fetch();
    echo "<ul>
    <form name='update' action='Firm.php' method='POST'>
    <li>idfirm:</li>
    <li><input type='text' name='upt_idfirm' value='$row[idfirm]'/></li>
    <li>name_firm:</li>
    <li><input type='text' name='upt_name_firm' value='$row[name_firm]'/></li>
    <li>specialization_firm:</li>
    <li><input type='text' name='upt_specialization_firm' value='$row[specialization_firm]'/></li>
    <li><input type='submit' name='new'/></li>
    </form>
    </ul>";
	}
    ?>

    <?php
	if (isset($_POST['new']))

	{
    $db->beginTransaction();
    $new_query = "UPDATE firm
                SET name_firm = '$_POST[upt_name_firm]',
                    specialization_firm = '$_POST[upt_specialization_firm]'
                WHERE idfirm = '$_POST[upt_idfirm]'";
	$new_result = $db->exec($new_query);
    $db->commit();
	if (!$new_result)
	{
	echo "Error. Think about this. _P";
	} else
	{
	header("Location: Firm.php");
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
    <h2>Delete row. Enter a idfirm</h2>
    <ul>
        <form name="display" action="Firm.php" method="POST" >
            <li>idfirm:</li>
            <li><input type="text" name="del_idfirm"/></li>
            <li><input type="submit" name="submit_delete" /></li>
        </form>
    </ul>
</body>

    <?php
	if (isset($_POST['submit_delete']))
	{
  $db->beginTransaction();
  $delete_query = "DELETE FROM firm
                   WHERE idfirm = '$_POST[del_idfirm]'";
	$detete_result = $db->exec($delete_query);
  $db->commit();
	if (!$detete_result)
	{
	echo "Error. Think about this. _P";
	} else
	{
	header("Location: Firm.php");
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
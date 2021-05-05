<h1>Table broker<h1>
<a href='index.php'>Main Page</a> <br/>
<h2>broker</h2>
<?php
	$host = "localhost";
	$dbname = "market";
	$dbuser = "postgres";
	$dbpass = "1234";
	$db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
	$result = $db->query("SELECT * FROM broker");
?>

<body>
	<table>
		<tr>
			<th>idbroker</th>
			<th>name_broker</th>
			<th>succsess_percent</th>
			<th>work_experience</th>
		</tr>
    <?php
	while ($row = $result->fetch()) {
    echo '<tr>';
		echo '<td>' . $row['idbroker'] . '</td>';
		echo '<td>' . $row['name_broker'] . " " . '</td>';
		echo '<td>' . $row['succsess_percent'] . " " . '</td>';
		echo '<td>' . $row['work_experience'] . "<br>" . '</td>';
    echo '</tr>';
	}
    ?>
</table></body></html>


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

<h2>Insert row into broker table</h2>
	<ul>
		<form name="insert" action="broker.php" method="POST">
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
		<form name="display" action="broker.php" method="POST">
			<li>idbroker:</li>
			<li>
				<input type="text" name="upt_idbroker" />
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
    $redact_query = "SELECT * FROM broker WHERE idbroker = '$_POST[upt_idbroker]'";
    $redact_result = $db->query($redact_query);
    $row = $redact_result->fetch();
    echo "<ul>
    <form name='update' action='broker.php' method='POST'>
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
	}
    ?>

    <?php
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        li {
        list-style: none;
        }
    </style>
</head>
<body>
    <h2>Delete row. Enter a id broker</h2>
    <ul>
        <form name="display" action="broker.php" method="POST" >
            <li>idbroker:</li>
            <li><input type="text" name="del_idbroker"/></li>
            <li><input type="submit" name="submit_delete" /></li>
        </form>
    </ul>
</body>

    <?php
	if (isset($_POST['submit_delete']))
	{
  $db->beginTransaction();
  $delete_query = "DELETE FROM broker
                   WHERE idbroker = '$_POST[del_idbroker]'";
	$detete_result = $db->exec($delete_query);
  $db->commit();
	if (!$detete_result)
	{
	echo "Error. Think about this. _P";
	} else
	{
	header("Location: broker.php");
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
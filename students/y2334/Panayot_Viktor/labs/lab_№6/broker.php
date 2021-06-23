<h1>Table broker<h1>
<a href='index.php'>Main Page</a> <br/>
<a href="insert_broker.php">Добавить запись</a>
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
			<th>update</th>
			<th>delete</th>
		</tr>
    <?php
	while ($row = $result->fetch()) {
    echo '<tr>';
		echo '<td>' . $row['idbroker'] . '</td>';
		echo '<td>' . $row['name_broker'] . " " . '</td>';
		echo '<td>' . $row['succsess_percent'] . " " . '</td>';
		echo '<td>' . $row['work_experience'] . "<br>" . '</td>';
		echo '<td>'. '<a href="update_broker.php?id='. $row['idbroker'] .'">Редактировать</a>' . '<br>' . '</td>';
		echo '<td>'. '<a href="delete.php?table_name=broker&id_name=idbroker&id='. $row['idbroker'] . '">Удалить</a>' . '<br>' . '</td>';
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
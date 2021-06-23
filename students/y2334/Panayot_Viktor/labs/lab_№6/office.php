<h1>Table office<h1>
<a href='index.php'>Main Page</a> <br/>
<a href="insert_office.php">Добавить запись</a>
<h2>office</h2>
<?php
	$host = "localhost";
	$dbname = "market";
	$dbuser = "postgres";
	$dbpass = "1234";
	$db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
	$result = $db->query("SELECT * FROM office");
?>

<body>
	<table>
		<tr>
			<th>idoffice</th>
			<th>name_office</th>
			<th>update</th>
			<th>delete</th>
		</tr>
    <?php
	while ($row = $result->fetch()) {
    echo '<tr>';
		echo '<td>' . $row['idoffice'] . '</td>';
		echo '<td>' . $row['name_office'] . " " . '</td>';
		echo '<td>'. '<a href="update_office.php?id='. $row['idoffice'] . '">Редактировать</a>' . '<br>' . '</td>';
		echo '<td>'. '<a href="delete.php?table_name=office&id_name=idoffice&id='. $row['idoffice'] . '">Удалить</a>' . '<br>' . '</td>';
    echo '</tr>';
	}
    ?>
</table></body></html>


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
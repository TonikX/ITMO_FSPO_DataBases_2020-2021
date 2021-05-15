<h1>Table contract_bo<h1>
<a href='index.php'>Main Page</a> <br/>
<a href="insert_contract_bo.php">Добавить запись</a>
<h2>contract_bo</h2>
<?php
	$host = "localhost";
	$dbname = "market";
	$dbuser = "postgres";
	$dbpass = "1234";
	$db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
	$result = $db->query("SELECT * FROM contract_bo");
	?>

	<body>
		<table>
			<tr>
				<th>idcontract_bo</th>
				<th>idoffice</th>
				<th>idbroker</th>
				<th>office_percent</th>
				<th>salary</th>
				<th>date_of_duration</th>
				<th>update</th>
				<th>delete</th>
			</tr>
		<?php
		while ($row = $result->fetch()) {
		echo '<tr>';
			echo '<td>' . $row['idcontract_bo'] . '</td>';
			echo '<td>' . $row['idoffice'] . " " . '</td>';
			echo '<td>' . $row['idbroker'] . " " . '</td>';
			echo '<td>' . $row['office_percent'] . "<br>" . '</td>';
			echo '<td>' . $row['salary'] . "<br>" . '</td>';
			echo '<td>' . $row['date_of_duration'] . "<br>" . '</td>';
			echo '<td>'. '<a href="update_contract_bo.php?id='. $row['idcontract_bo'] .'">Редактировать</a>' . '<br>' . '</td>';
			echo '<td>'. '<a href="delete.php?table_name=contract_bo&id_name=idcontract_bo&id='. $row['idcontract_bo'] . '">Удалить</a>' . '<br>' . '</td>';
			echo '</tr>';
		}
		?>
	</table></body></html>


<head>
	<title>table contract_bo</title>
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
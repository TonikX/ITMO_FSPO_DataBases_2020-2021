<body>
	<form method = "POST">
		<input type = "text" name = "tableName" placeholder = "Table name"><br>
		<input type = "text" name = "rowId" placeholder = "Row id"><br>
		<input type = "submit" value = "delete">
	</form>
	<form action = "index.php"> 
		<input type = "submit" value = "go back">
	</form>

</body>
<?php
	include "functions.php";
	if (isset($_POST["tableName"]) and isset($_POST["rowId"]))
	{
		$tableName = $_POST["tableName"];
		$rowId = $_POST["rowId"];
		$db = pg_connect("host = localhost dbname = market user = danil") or die("Error: " . pg_last_error());
		$result = pg_query("delete from \"$tableName\" where id = $rowId;") or die('Error: ' . pg_last_error());
		echo "Successfully deleted";
		pg_close($db);
	}
?>

<body>
	<form method = "POST">
		<input type = "text" name = "tableName" placeholder = "Table name"><br>
		<input type = "submit" value = "print">
	</form>
	<form action = "index.php"> 
		<input type = "submit" value = "go back">
	</form>
</body>
<?php
	include "functions.php";
	if (isset($_POST["tableName"]))
	{
		$tableName = $_POST["tableName"];
		$db = pg_connect("host = localhost dbname = market user = danil") or die("Error: " . pg_last_error());
#		$pdo = new PDO("pgsql:host = localhost;dbname = market", "danil");
#		$res = $pdo->query("select * from \"$tableName\";");

		$result = pg_query("select * from \"$tableName\";") or die('Error: ' . pg_last_error());
		echo "<h3>$tableName</h3>";
		printTable($result);
		pg_free_result($result);
		pg_close($db);
	}
?>

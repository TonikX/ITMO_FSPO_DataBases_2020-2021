<?php
	if (isset($_POST["tableName"]))
	{
		session_start();
		$tableName = $_POST["tableName"];
		$_SESSION["tableName"] = $tableName;
		$db = pg_connect("host = localhost dbname = market user = danil") or die("Error: " . pg_last_error());
		$result = pg_query("select * from \"$tableName\";") or die('Error: ' . pg_last_error());
		$_SESSION["fields"] = array();

		$numberOfRows = pg_num_fields($result);

		echo "<form method = \"POST\" action = \"add.php\">";
		for ($i = 0 ; $i < $numberOfRows ; $i++)
		{
			$field = pg_field_name($result, $i);
			$_SESSION["fields"][$i] = $field; 
			echo "<input type = \"text\" name = $field placeholder = \"$field\"><br>\n";
		}
		echo "<input type = \"submit\" value = \"add\">";
		echo "</form>";
		echo "<form action = \"index.php\">";
		echo "<input type = \"submit\" value = \"go back\">\n";
		echo "</form>";

		pg_free_result($result);
		pg_close($db);
	}
?>

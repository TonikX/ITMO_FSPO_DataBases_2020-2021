<form action = "index.php">
	<input type = "submit" value = "go back">
</form>
<?php
	session_start();
	if (isset($_SESSION["tableName"]) and isset($_SESSION["fields"]))
	{
		$db = pg_connect("host = localhost dbname = market user = danil") or die("Error: " . pg_last_error());
		$tableName = $_SESSION["tableName"];
		$fields = $_SESSION["fields"];
		$request = "insert into \"$tableName\" ";
		$values = "(";
		foreach ($fields as $field)
		{
			$values = $values . $field . ", ";
		}
		$values = substr($values, 0, -2) . ")";
		$request = $request . $values . " values ";
		$values = "(";
		foreach ($_POST as $elem)
		{
			if (is_numeric($elem))
			{
				$values = $values . $elem . ", ";
			}
			else
			{
				$values = $values . "'" . $elem . "', ";
			}
		}
		$values = substr($values, 0, -2) . ")";
		$request = $request . $values . ";";

		$result = pg_query($request) or die('Error: ' . pg_last_error());
		echo "Successfully added";
	}
	session_destroy();
	pg_close($db);
?>

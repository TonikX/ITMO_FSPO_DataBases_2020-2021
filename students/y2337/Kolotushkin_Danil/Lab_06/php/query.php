<body>
	<form method = "POST">
		<textarea name = "request" placeholder = "Enter your request"></textarea><br>
		<input type = "submit" value = "execute">
	</form>
	<form action = "index.php"> 
		<input type = "submit" value = "go back">
	</form>
</body>

<?php
	include "functions.php";
	if (isset($_POST["request"]))
	{
		$selectPattern = '/select+/';
		$query = $_POST["request"];
		if (!preg_match($selectPattern, $query)) die('This request is not a select!');
		$dbname = "market";
		$dbuser = "danil";
		$db = pg_connect("host = localhost dbname = $dbname user = $dbuser")
		or die('Connection failed' . pg_last_error());

		$result = pg_query($query) or die('Request execution error ' . pg_last_error());
		echo "<h3>Request</h3>\n";
		echo "<p>$query</p>\n";
		printTable($result);
		pg_free_result($result);
		pg_close($db);

	}
?>

<h2>Insert</h2>

	<ul>
		<form name="insert" action="newspaper_insert.php" method="POST">

        <li>id_newspaper:</li>
            <input type="text" name="id_newspaper" />

		<li>title_newspaper:</li>
            <input type="text" name="title_newspaper" />
			
        <li>cost_newspaper:</li>
			<input type="text" name="cost_newspaper" />
			
        <li>publication_index:</li>
			<input type="text" name="publication_index" />

        <li>number_office:</li>
			<input type="text" name="number_office" />

        <li>date_of_issue:</li>
			<input type="text" name="date_of_issue" />

        <li>
			<input type="submit" name="insert" />
        </li>

        </form>

        <a href="newspaper.php">Назад к таблице</a><br/><br/>

	</ul>

<?php
    require_once "config.php";
    $db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    if (isset($_POST['insert'])) {
        $db->beginTransaction();
        $insert_query = "INSERT INTO newspaper VALUES
                        ('$_POST[id_newspaper]',
                        '$_POST[title_newspaper]',
                        '$_POST[cost_newspaper]',
                        '$_POST[publication_index]',
                        '$_POST[number_office]',
                        '$_POST[date_of_issue]')";

        $insert_result = $db->exec($insert_query);
        $db->commit();
        header("Location: newspaper.php");
    }
?>

<head>
	<style>
	li {
		list-style: none;
        margin-top: 10px;
	}
    input[type=submit] {
        padding: 8px 16px;
        margin-top: 20px;
    }
	</style>
</head> 
<h2>Insert</h2>

	<ul>
		<form name="insert" action="release_insert.php" method="POST">

        <li>id_release:</li>
            <input type="text" name="id_release" />

		<li>date_of_issue_release:</li>
            <input type="text" name="date_of_issue_release" />
			
        <li>publication_index_release:</li>
			<input type="text" name="publication_index_release" />
			
        <li>publication_index:</li>
			<input type="text" name="cost_copy" />

        <li>
			<input type="submit" name="insert" />
        </li>

        </form>

        <a href="release.php">Назад к таблице</a><br/><br/>

	</ul>

<?php
    require_once "config.php";
    $db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    if (isset($_POST['insert'])) {
        $db->beginTransaction();
        $insert_query = "INSERT INTO release VALUES
                        ('$_POST[id_release]',
                        '$_POST[date_of_issue_release]',
                        '$_POST[publication_index_release]',
                        '$_POST[cost_copy]')";

        $insert_result = $db->exec($insert_query);
        $db->commit();
        header("Location: release.php");
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
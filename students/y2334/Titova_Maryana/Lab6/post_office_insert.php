<h2>Insert</h2>

	<ul>
		<form name="insert" action="post_office_insert.php" method="POST">

        <li>id_post_office:</li>
            <input type="text" name="id_post_office" />

		<li>number_office:</li>
            <input type="text" name="number_office" />
			
        <li>address_office:</li>
			<input type="text" name="address_office" />
			
        <li>
			<input type="submit" name="insert" />
        </li>

        </form>

        <a href="post_office.php">Назад к таблице</a><br/><br/>

	</ul>

<?php
    require_once "config.php";
    $db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    if (isset($_POST['insert'])) {
        $db->beginTransaction();
        $insert_query = "INSERT INTO post_office VALUES
                        ('$_POST[id_post_office]',
                        '$_POST[number_office]',
                        '$_POST[address_office]')";

        $insert_result = $db->exec($insert_query);
        $db->commit();
        header("Location: post_office.php");
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
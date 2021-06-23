<h2>Insert</h2>

	<ul>
		<form name="insert" action="printing_office_insert.php" method="POST">

        <li>id_printing_office:</li>
            <input type="text" name="id_printing_office" />

		<li>name_printing_office:</li>
            <input type="text" name="name_printing_office" />
			
        <li>address_printing_office:</li>
			<input type="text" name="address_printing_office" />
			
        <li>count:</li>
			<input type="text" name="count" />

        <li>schedule_printing_office:</li>
			<input type="text" name="schedule_printing_office" />

        <li>
			<input type="submit" name="insert" />
        </li>

        </form>

        <a href="printing_office.php">Назад к таблице</a><br/><br/>

	</ul>

<?php
    require_once "config.php";
    $db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    if (isset($_POST['insert'])) {
        $db->beginTransaction();
        $insert_query = "INSERT INTO printing_office VALUES
                        ('$_POST[id_printing_office]',
                        '$_POST[name_printing_office]',
                        '$_POST[address_printing_office]',
                        '$_POST[count]',
                        '$_POST[schedule_printing_office]')";

        $insert_result = $db->exec($insert_query);
        $db->commit();
        header("Location: printing_office.php");
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
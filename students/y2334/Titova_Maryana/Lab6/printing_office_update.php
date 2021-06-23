<h2>Update</h2>
    <?php
        $id = $_GET['id'];
        require_once "config.php";
        $db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $redact_query = "SELECT * FROM printing_office WHERE id_printing_office = '$id'";
        $redact_result = $db->query($redact_query);
        $row = $redact_result->fetch();
        echo "<ul>
            <form name='update' method='POST'>

            <li>id_printing_office:</li>
            <li><input type='text' name='id_printing_office_updated' value='$row[id_printing_office]'/></li>

            <li>name_printing_office:</li>
            <li><input type='text' name='name_printing_office_updated' value='$row[name_printing_office]'/></li>

            <li>address_printing_office:</li>
            <li><input type='text' name='address_printing_office_updated' value='$row[address_printing_office]'/></li>

            <li>count:</li>
            <li><input type='text' name='count_updated' value='$row[count]'/></li>

            <li>schedule_printing_office:</li>
            <li><input type='text' name='schedule_printing_office_updated' value='$row[schedule_printing_office]'/></li>

            <li><input type='submit' name='new'/></li>
            </form>
            </ul>";

        if (isset($_POST['new'])) {
            $db->beginTransaction();

            $new_query = "UPDATE printing_office
                    SET name_printing_office = '$_POST[name_printing_office_updated]',
                        address_printing_office = '$_POST[address_printing_office_updated]',
                        count = '$_POST[count_updated]',
                        schedule_printing_office = '$_POST[schedule_printing_office_updated]'
                    WHERE id_printing_office = '$_POST[id_printing_office_updated]'";
                    
	        $new_result = $db->exec($new_query);
            $db->commit();

            if (!$new_result) {
                echo "Update failed!!";
            } else {
                header("Update successfull!");
            }
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
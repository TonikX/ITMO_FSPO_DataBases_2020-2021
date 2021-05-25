<h2>Update</h2>
    <?php
        $id = $_GET['id'];
        require_once "config.php";
        $db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $redact_query = "SELECT * FROM post_office WHERE id_post_office = '$id'";
        $redact_result = $db->query($redact_query);
        $row = $redact_result->fetch();
        echo "<ul>
            <form name='update' method='POST'>

            <li>id_post_office:</li>
            <li><input type='text' name='id_post_office_updated' value='$row[id_post_office]'/></li>

            <li>number_office:</li>
            <li><input type='text' name='number_office_updated' value='$row[number_office]'/></li>

            <li>address_office:</li>
            <li><input type='text' name='address_office_updated' value='$row[address_office]'/></li>

            <li><input type='submit' name='new'/></li>
            </form>
            </ul>";

        if (isset($_POST['new'])) {
            $db->beginTransaction();

            $new_query = "UPDATE post_office
                    SET number_office = '$_POST[number_office_updated]',
                        address_office = '$_POST[address_office_updated]'
                    WHERE id_post_office = '$_POST[id_post_office_updated]'";
                    
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
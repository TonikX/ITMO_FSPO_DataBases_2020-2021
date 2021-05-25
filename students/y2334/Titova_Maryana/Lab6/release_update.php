<h2>Update</h2>
    <?php
        $id = $_GET['id'];
        require_once "config.php";
        $db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $redact_query = "SELECT * FROM release WHERE id_release = '$id'";
        $redact_result = $db->query($redact_query);
        $row = $redact_result->fetch();
        echo "<ul>
            <form name='update' method='POST'>

            <li>id_release:</li>
            <li><input type='text' name='id_release_updated' value='$row[id_release]'/></li>

            <li>date_of_issue_release:</li>
            <li><input type='text' name='date_of_issue_release_updated' value='$row[date_of_issue_release]'/></li>

            <li>publication_index_release:</li>
            <li><input type='text' name='publication_index_release_updated' value='$row[publication_index_release]'/></li>

            <li>cost_copy:</li>
            <li><input type='text' name='cost_copy_updated' value='$row[cost_copy]'/></li>

            <li><input type='submit' name='new'/></li>
            </form>
            </ul>";

        if (isset($_POST['new'])) {
            $db->beginTransaction();

            $new_query = "UPDATE release
                    SET date_of_issue_release = '$_POST[date_of_issue_release_updated]',
                        publication_index_release = '$_POST[publication_index_release_updated]',
                        cost_copy = '$_POST[cost_copy_updated]'
                    WHERE id_release = '$_POST[id_release_updated]'";
                    
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
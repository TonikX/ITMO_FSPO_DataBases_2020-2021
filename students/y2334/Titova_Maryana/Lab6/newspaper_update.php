<h2>Update</h2>
    <?php
        $id = $_GET['id'];
        require_once "config.php";
        $db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $redact_query = "SELECT * FROM newspaper WHERE id_newspaper = '$id'";
        $redact_result = $db->query($redact_query);
        $row = $redact_result->fetch();
        echo "<ul>
            <form name='update' method='POST'>

            <li>id_newspaper:</li>
            <li><input type='text' name='id_newspaper_updated' value='$row[id_newspaper]'/></li>

            <li>title_newspaper:</li>
            <li><input type='text' name='title_newspaper_updated' value='$row[title_newspaper]'/></li>

            <li>cost_newspaper:</li>
            <li><input type='text' name='cost_newspaper_updated' value='$row[cost_newspaper]'/></li>

            <li>publication_index:</li>
            <li><input type='text' name='publication_index_updated' value='$row[publication_index]'/></li>

            <li>number_office:</li>
            <li><input type='text' name='number_office_updated' value='$row[number_office]'/></li>

            <li>date_of_issue:</li>
            <li><input type='text' name='date_of_issue_updated' value='$row[date_of_issue]'/></li>

            <li><input type='submit' name='new'/></li>
            </form>
            </ul>";

        if (isset($_POST['new'])) {
            $db->beginTransaction();

            $new_query = "UPDATE newspaper
                    SET title_newspaper = '$_POST[title_newspaper_updated]',
                        cost_newspaper = '$_POST[cost_newspaper_updated]',
                        publication_index = '$_POST[publication_index_updated]',
                        number_office = '$_POST[number_office_updated]',
                        date_of_issue = '$_POST[date_of_issue_updated]'
                    WHERE id_newspaper = '$_POST[id_newspaper_updated]'";
                    
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
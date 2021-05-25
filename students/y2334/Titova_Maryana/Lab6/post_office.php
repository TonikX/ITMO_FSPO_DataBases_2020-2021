<h2>Post office</h2>
<?php
	$host = "localhost";
	$dbname = "lab3";
	$dbuser = "postgres";
	$dbpass = "1234";
	$db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
	$result = $db->query("SELECT * FROM post_office");
?>
    <body>
	    <table>
		    <tr>
			    <th>id_post_office</th>
			    <th>number_office</th>
			    <th>address_office</th>
			    <th>update</th>
			    <th>delete</th>
		    </tr>
        <?php
	    while ($row = $result->fetch()) {
        echo '<tr>';
		    echo '<td>' . $row['id_post_office'] . '</td>';
		    echo '<td>' . $row['number_office'] . " " . '</td>';
		    echo '<td>' . $row['address_office'] . " " . '</td>';
		    echo '<td>'. '<a href="post_office_update.php?id='. $row['id_post_office'] .'">Редактировать</a>' . '<br>' . '</td>';
		    echo '<td>'. '<a href="delete.php?table_name=post_office&id_name=id_post_office&id='. $row['id_post_office'] . '">Удалить</a>' . '<br>' . '</td>';
        echo '</tr>';
	    }
        ?>
        </table>

        <a href="post_office_insert.php">Добавить запись</a><br/><br/>
        <a href='index.php'>На главную</a> 

        <style>
            table {
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            table th, td {
	            padding: 10px 20px;
                text-align: center;
	            border: 1px solid #bbbbbb;
            }

            tr:first-child{background-color: #f2f2f2}
        </style>

    </body>
</html>
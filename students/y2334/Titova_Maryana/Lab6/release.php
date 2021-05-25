<h2>Release</h2>
<?php
	$host = "localhost";
	$dbname = "lab3";
	$dbuser = "postgres";
	$dbpass = "1234";
	$db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
	$result = $db->query("SELECT * FROM release");
?>
    <body>
	    <table>
		    <tr>
			    <th>id_release</th>
			    <th>date_of_issue_release</th>
			    <th>publication_index_release</th>
			    <th>cost_copy</th>
			    <th>update</th>
			    <th>delete</th>
		    </tr>
        <?php
	    while ($row = $result->fetch()) {
        echo '<tr>';
		    echo '<td>' . $row['id_release'] . '</td>';
		    echo '<td>' . $row['date_of_issue_release'] . " " . '</td>';
		    echo '<td>' . $row['publication_index_release'] . " " . '</td>';
		    echo '<td>' . $row['cost_copy'] . "<br>" . '</td>';
		    echo '<td>'. '<a href="release_update.php?id='. $row['id_release'] .'">Редактировать</a>' . '<br>' . '</td>';
		    echo '<td>'. '<a href="delete.php?table_name=release&id_name=id_release&id='. $row['id_release'] . '">Удалить</a>' . '<br>' . '</td>';
        echo '</tr>';
	    }
        ?>
        </table>

        <a href="release_insert.php">Добавить запись</a><br/><br/>
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
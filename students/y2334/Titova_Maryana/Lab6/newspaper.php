<h2>Newspaper</h2>
<?php
	$host = "localhost";
	$dbname = "lab3";
	$dbuser = "postgres";
	$dbpass = "1234";
	$db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
	$result = $db->query("SELECT * FROM newspaper");
?>
    <body>
	    <table>
		    <tr>
			    <th>id_newspaper</th>
			    <th>title_newspaper</th>
			    <th>cost_newspaper</th>
			    <th>publication_index</th>
                <th>number_office</th>
                <th>date_of_issue</th>
			    <th>update</th>
			    <th>delete</th>
		    </tr>
        <?php
	    while ($row = $result->fetch()) {
        echo '<tr>';
		    echo '<td>' . $row['id_newspaper'] . '</td>';
		    echo '<td>' . $row['title_newspaper'] . " " . '</td>';
		    echo '<td>' . $row['cost_newspaper'] . " " . '</td>';
		    echo '<td>' . $row['publication_index'] . "<br>" . '</td>';
            echo '<td>' . $row['number_office'] . "<br>" . '</td>';
            echo '<td>' . $row['date_of_issue'] . "<br>" . '</td>';
		    echo '<td>'. '<a href="newspaper_update.php?id='. $row['id_newspaper'] .'">Редактировать</a>' . '<br>' . '</td>';
		    echo '<td>'. '<a href="delete.php?table_name=newspaper&id_name=id_newspaper&id='. $row['id_newspaper'] . '">Удалить</a>' . '<br>' . '</td>';
        echo '</tr>';
	    }
        ?>
        </table>

        <a href="newspaper_insert.php">Добавить запись</a><br/><br/>
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
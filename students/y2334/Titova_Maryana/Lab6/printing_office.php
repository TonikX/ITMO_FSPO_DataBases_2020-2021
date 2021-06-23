<h2>Printing office</h2>
<?php
	$host = "localhost";
	$dbname = "lab3";
	$dbuser = "postgres";
	$dbpass = "1234";
	$db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
	$result = $db->query("SELECT * FROM printing_office");
?>
    <body>
	    <table>
		    <tr>
			    <th>id_printing_office</th>
			    <th>name_printing_office</th>
			    <th>address_printing_office</th>
			    <th>count</th>
                <th>schedule_printing_office</th>
			    <th>update</th>
			    <th>delete</th>
		    </tr>
        <?php
	    while ($row = $result->fetch()) {
        echo '<tr>';
		    echo '<td>' . $row['id_printing_office'] . '</td>';
		    echo '<td>' . $row['name_printing_office'] . " " . '</td>';
		    echo '<td>' . $row['address_printing_office'] . " " . '</td>';
		    echo '<td>' . $row['count'] . "<br>" . '</td>';
            echo '<td>' . $row['schedule_printing_office'] . "<br>" . '</td>';
		    echo '<td>'. '<a href="printing_office_update.php?id='. $row['id_printing_office'] .'">Редактировать</a>' . '<br>' . '</td>';
		    echo '<td>'. '<a href="delete.php?table_name=printing_office&id_name=id_printing_office&id='. $row['id_printing_office'] . '">Удалить</a>' . '<br>' . '</td>';
        echo '</tr>';
	    }
        ?>
        </table>

        <a href="printing_office_insert.php">Добавить запись</a><br/><br/>
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
<body>
    <?php
        require_once "config.php";
        try {
            $db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (\Throwable $th) {
            echo "<pre>" . $th . "</pre>";
        }
        
    ?>

    <h2>Запросы:</h2>

    <h3>1. Вывести информацию о названии газеты и её стоимости:</h3> 

    <div class="text">
        <text>
            select concat (title_newspaper, ', ',  cost_newspaper, '₽') <br>
            from newspaper;
        </text>
    </div>
    
    <table>
		    <tr>
			    <th>concat</th>
		    </tr>

            <?php
                $query = "select concat (title_newspaper, ', ',  cost_newspaper, '₽') from newspaper";

                $res = $db->query($query);
                while ($row = $res->fetch()) {
                    echo "<tr>";
                        echo "<td>" . $row['concat'] . "</td>";
                    echo "</tr>";
                }
            ?>
    </table>


    <h3>2. Вывести длину названий типографий:</h3> 

    <div class="text">
        <text>
            select name_printing_office, length(name_printing_office) <br>
            from printing_office;
        </text>
    </div>
    
    <table>
		    <tr>
			    <th>name_printing_office</th>
                <th>length</th>
		    </tr>

            <?php
                $query = "select name_printing_office, length(name_printing_office) from printing_office";

                $res = $db->query($query);
                while ($row = $res->fetch()) {
                    echo "<tr>";
                        echo "<td>" . $row['name_printing_office'] . "</td>";
                        echo "<td>" . $row['length'] . "</td>";
                    echo "</tr>";
                }
            ?>
    </table>


    <h3>3. Вывести информацию о газетах, которые не печатались в почтовых отделениях с id = 2:</h3> 

    <div class="text">
        <text>
            select * from newspaper <br>
            except select * from newspaper <br>
            where id_post_office_fk = 2 <br>
            order by id_newspaper;
        </text>
    </div>
    
    <table>
		    <tr>
			    <th>id_newspaper</th>
                <th>title_newspaper</th>
                <th>cost_newspaper</th>
                <th>publication_index</th>
                <th>number_office</th>
                <th>date_of_issue</th>
                <th>id_post_office_fk</th>
		    </tr>

            <?php
                $query = "select * from newspaper except select * from newspaper where id_post_office_fk = 2 order by id_newspaper;";

                $res = $db->query($query);
                while ($row = $res->fetch()) {
                    echo "<tr>";
                        echo "<td>" . $row['id_newspaper'] . "</td>";
                        echo "<td>" . $row['title_newspaper'] . "</td>";
                        echo "<td>" . $row['cost_newspaper'] . "</td>";
                        echo "<td>" . $row['publication_index'] . "</td>";
                        echo "<td>" . $row['number_office'] . "</td>";
                        echo "<td>" . $row['date_of_issue'] . "</td>";
                        echo "<td>" . $row['id_post_office_fk'] . "</td>";
                    echo "</tr>";
                }
            ?>
    </table>


    <h3>4. Вывести основную информацию о напечатанных и реализованных газетах:</h3> 

    <div class="text">
        <text>
            select newspaper.title_newspaper, release.date_of_issue_release, release.cost_copy, printing_office.name_printing_office <br>
            from newspaper <br>
            join printing_office <br>
            on newspaper.id_newspaper = printing_office.id_newspaper_fk <br>
            join release  <br>
            on printing_office.id_printing_office = release.id_printing_office_fk <br>
            order by newspaper;
        </text>
    </div>
    
    <table>
		    <tr>
			    <th>title_newspaper</th>
                <th>date_of_issue_release</th>
                <th>cost_copy</th>
                <th>name_printing_office</th>
		    </tr>

            <?php
                $query = "select newspaper.title_newspaper, release.date_of_issue_release, release.cost_copy, printing_office.name_printing_office from newspaper 
                join printing_office 
                on newspaper.id_newspaper = printing_office.id_newspaper_fk
                join release 
                on printing_office.id_printing_office = release.id_printing_office_fk
                order by newspaper;";

                $res = $db->query($query);
                while ($row = $res->fetch()) {
                    echo "<tr>";
                        echo "<td>" . $row['title_newspaper'] . "</td>";
                        echo "<td>" . $row['date_of_issue_release'] . "</td>";
                        echo "<td>" . $row['cost_copy'] . "</td>";
                        echo "<td>" . $row['name_printing_office'] . "</td>";
                    echo "</tr>";
                }
            ?>
    </table>


    <h3>5. Вывести индексы выпусков, которые были реализованы в 2021 году:</h3> 

    <div class="text">
        <text>
            select id_release, date_of_issue_release, publication_index_release <br>
            from release <br>
            where (select extract(year from date_of_issue_release)) = '2021';
        </text>
    </div>
    
    <table>
		    <tr>
			    <th>id_release</th>
                <th>date_of_issue_release</th>
                <th>publication_index_release</th>
		    </tr>

            <?php
                $query = "select id_release, date_of_issue_release, publication_index_release from release where (select extract(year from date_of_issue_release)) = '2021';";

                $res = $db->query($query);
                while ($row = $res->fetch()) {
                    echo "<tr>";
                        echo "<td>" . $row['id_release'] . "</td>";
                        echo "<td>" . $row['date_of_issue_release'] . "</td>";
                        echo "<td>" . $row['publication_index_release'] . "</td>";
                    echo "</tr>";
                }
            ?>
    </table>

    <a href='index.php'>На главную</a> 


    <style>

        h3 {
            padding-top: 30px;    
        }

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

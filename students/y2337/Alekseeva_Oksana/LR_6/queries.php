<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Запросы</title>
</head>
<body>
    
    <?php
        require_once "config.php";
        try {
            $db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (\Throwable $th) {
            echo "<pre>" . $th . "</pre>";
        }
        
    ?>

    <h1>Запросы:</h1>

    <h3>Выбор администраторов, у которых опыт работы 2 года, с сортировкой по дате заезда:</h3> 
    <div class="code">
        <code>
            SELECT full_name, contact_details, experience, id_inhabitation, check_in_date, check_out_date, client_id, room_id <br>
            FROM administration, inhabitation WHERE experience = '2 years' ORDER BY check_in_date;
        </code>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>full_name</th>
                <th>contact_details</th>
                <th>experience</th>
                <th>id_inhabitation</th>
                <th>check_in_date</th>
                <th>check_out_date</th>
                <th>client_id</th>
                <th>room_id</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT full_name, contact_details, experience, id_inhabitation, check_in_date, check_out_date, client_id, room_id 
                FROM administration, inhabitation WHERE experience = '2 years' ORDER BY check_in_date;";

                $res = $db->query($query);
                while ($row = $res->fetch()) {
                    echo "<tr>";
                        echo "<td>" . $row['full_name'] . "</td>";
                        echo "<td>" . $row['contact_details'] . "</td>";
                        echo "<td>" . $row['experience'] . "</td>";
                        echo "<td>" . $row['id_inhabitation'] . "</td>";
                        echo "<td>" . $row['check_in_date'] . "</td>";
                        echo "<td>" . $row['check_out_date'] . "</td>";
                        echo "<td>" . $row['client_id'] . "</td>";
                        echo "<td>" . $row['room_id'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <h3>Выбор пользователей, которые живут в городе 'SPb' и их номер > 2:</h3> 
    <div class="code">
        <code>SELECT * FROM client WERE city = 'SPb' AND id_client > 2;</code>
    </div>
    <table>
        <thead>
            <tr>
                <th>id_client</th>
                <th>full_name</th>
                <th>passport_id</th>
                <th>city</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM client WHERE city = 'SPb' AND id_client > 2;";
                $res = $db->query($query);
                while ($row = $res->fetch()) {
                    echo "<tr>";
                        echo "<td>" . $row['id_client'] . "</td>";
                        echo "<td>" . $row['full_name'] . "</td>";
                        echo "<td>" . $row['passport_id'] . "</td>";
                        echo "<td>" . $row['city'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <h3>Выбор клиента без повторений, у которого город 'SPb' и любое ФИО:</h3>
    <div class="code">
        <code>
            SELECT DISTINCT id_client, full_name, passport_id FROM client
            WHERE city = 'SPb' AND full_name = ALL(SELECT full_name FROM inhabitation);
        </code> 
    </div>
    <table>
        <thead>
            <tr>
                <th>id_client</th>
                <th>full_name</th>
                <th>passport_id</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT DISTINCT id_client, full_name, passport_id FROM client
                WHERE city = 'SPb' AND full_name = ALL(SELECT full_name FROM inhabitation);";
                $res = $db->query($query);
                while ($row = $res->fetch()) {
                    echo "<tr>";
                        echo "<td>" . $row['id_client'] . "</td>";
                        echo "<td>" . $row['full_name'] . "</td>";
                        echo "<td>" . $row['passport_id'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <h3>Выбор клиентов и администраторов, которые оформляли им проживание(пересечение):</h3> 
    <div class="code">
        <code>
            SELECT id_client, client.full_name, city, id_inhabitation, check_in_date, check_out_date, id_admin, 
            administration.full_name as adm_full_name, experience from client, inhabitation, administration WHERE admin_id = id_admin;
        </code>
    </div>
    <table>
        <thead>
            <tr>
                <th>id_client</th>
                <th>client.full_name</th>
                <th>city</th>
                <th>id_inhabitation</th>
                <th>check_in_date</th>
                <th>check_out_date</th>
                <th>id_admin</th>
                <th>administration.full_name</th>
                <th>experience</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT id_client, client.full_name, city, id_inhabitation, check_in_date, check_out_date, id_admin, 
                administration.full_name as adm_full_name, experience from client, inhabitation, administration WHERE admin_id = id_admin;";
                $res = $db->query($query);
                while ($row = $res->fetch()) {
                    echo "<tr>";
                        echo "<td>" . $row['id_client'] . "</td>";
                        echo "<td>" . $row['full_name'] . "</td>";
                        echo "<td>" . $row['city'] . "</td>";
                        echo "<td>" . $row['id_inhabitation'] . "</td>";
                        echo "<td>" . $row['check_in_date'] . "</td>";
                        echo "<td>" . $row['check_out_date'] . "</td>";
                        echo "<td>" . $row['id_admin'] . "</td>";
                        echo "<td>" . $row['adm_full_name'] . "</td>";
                        echo "<td>" . $row['experience'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <h3>Выбор клиентов и объединение с проживанием:</h3>
    <div class="code">
        <code>
            SELECT full_name AS name, id_inhabitation, check_in_date, check_out_date, room_id, admin_id 
            FROM inhabitation INNER JOIN client ON id_client = client_id;
        </code> 
    </div>
    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>id_inhabitation</th>
                <th>check_in_date</th>
                <th>check_out_date</th>
                <th>room_id</th>
                <th>admin_id</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT full_name AS name, id_inhabitation, check_in_date, check_out_date, room_id, admin_id 
                FROM inhabitation INNER JOIN client ON id_client = client_id;";
                $res = $db->query($query);
                while ($row = $res->fetch()) {
                    echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['id_inhabitation'] . "</td>";
                        echo "<td>" . $row['check_in_date'] . "</td>";
                        echo "<td>" . $row['check_out_date'] . "</td>";
                        echo "<td>" . $row['room_id'] . "</td>";
                        echo "<td>" . $row['admin_id'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

<style>
table th, td {
	padding: 10px;
	border: 1px solid #000;
}
.code {
    margin-bottom: 5px;
    padding: 3px;
}
</style>

</body>
</html>
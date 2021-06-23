<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Запросы</title>
</head>

<body>

    <?
    require_once "config.php";
    try {
        $db = new PDO("pgsql:host=" . dbconfig::$host . ";dbname=" . dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (\Throwable $th) {
        echo "<pre>" . $th . "</pre>";
    }

    ?>

    <h1>Запросы:</h1>

    <h3>Выбор газет, которые хранятся, где редактор 'Danilin Artem' с сортировкой по количеству:</h3>
    <div class="code">
        <code>
            SELECT newspaper.id as newspaper_id, name, price, full_name_editor, publication_index, production.id as production_id, 
        quantity FROM newspaper, production  WHERE full_name_editor = 'Danilin Artem' order by price;
        </code>
    </div>

    <table>
        <thead>
            <tr>
                <th>newspaper_id</th>
                <th>name</th>
                <th>price</th>
                <th>full_name_editor</th>
                <th>publication_index</th>
                <th>production_id</th>
                <th>quantity</th>
            </tr>
        </thead>
        <tbody>
            <?
            $query = "SELECT newspaper.id as newspaper_id, name, price, full_name_editor, publication_index, production.id as production_id, 
        quantity FROM newspaper, production  WHERE full_name_editor = 'Danilin Artem' order by price";

            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['newspaper_id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['full_name_editor'] . "</td>";
                echo "<td>" . $row['publication_index'] . "</td>";
                echo "<td>" . $row['production_id'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h3>Выбор почтовых отделений, которые находятся в городе 'SPb' и их номер > 1:</h3>
    <div class="code">
        <code>SELECT * FROM postoffice WHERE address = 'SPb' AND id_postoffice > 1;</code>
    </div>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>address</th>
                <th>number</th>
            </tr>
        </thead>
        <tbody>
            <?
            $query = "SELECT * FROM postoffice WHERE address = 'SPb' AND id > 1;";
            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['number'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h3>Выбор газет и их редакторов с использованием функции смены регистра:</h3>
    <div class="code">
        <code>
            SELECT id_newspaper, LOWER(full_name_editor) AS FIO, publication_index, price FROM newspaper;
        </code>
    </div>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>FIO</th>
                <th>publication_index</th>
                <th>price</th>
            </tr>
        </thead>
        <tbody>
            <?
            $query = "SELECT id, LOWER(full_name_editor) AS FIO, publication_index, price FROM newspaper;";
            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['fio'] . "</td>";
                echo "<td>" . $row['publication_index'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h3>Выбор почтовых отделений с использованием функции добавления указанных символов до определенной длины:</h3>
    <div class="code">
        <code>
            SELECT id, number, LPAD(address, 30, '-')  AS address FROM postoffice;
        </code>
    </div>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>address</th>
            </tr>
        </thead>
        <tbody>
            <?
            $query = "SELECT id, number, LPAD(address, 30, '-')  AS address FROM postoffice;";
            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h3>Вывод средней стоимости всех газет:</h3>
    <div class="code">
        <code>
            SELECT AVG(price) FROM newspaper;
        </code>
    </div>
    <table>
        <thead>
            <tr>
                <th>AVG</th>
            </tr>
        </thead>
        <tbody>
            <?
            $query = "SELECT AVG(price) FROM newspaper;";
            $res = $db->query($query);
            while ($row = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['avg'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <style>
        table th,
        td {
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
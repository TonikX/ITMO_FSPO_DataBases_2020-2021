<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>select</title>
</head>
<body>
    <h1>Click to select from table</h1>
    <form action="do.php" method="post">
        <select name="table" id="table">
            <option value="director">director</option>
            <option value="worker">worker</option>
            <option value="contract">contract</option>
        </select>
        <select name="mode" id="mode">
            <option value="add">add</option>
            <option value="delete">delete</option>
            <option value="select">select</option>
        </select>
<!--        <input type="text" name="table" placeholder="table">-->
        <input type="submit">
    </form>

<!--   --><?php
//    $dbuser = "postgres";
//    $dbpass = "";
//    $host = "localhost";
//    $dbname="opdb";
//
//
//    $tmp = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
//    $result = $tmp->query('select * from doctor');
//    $fields = array_keys($result->fetch(PDO::FETCH_ASSOC));
//
//    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
//    $stmt = $pdo->query('select * from doctor');
//    echo "<table>";
//    echo "<tr>";
//
//    foreach ($fields as $elem) {
//        echo "<td>" . $elem . "</td>";
//    }
//    echo "</tr>";
//    while ($row = $stmt->fetch())
//    {
//
//        echo "<tr>";
//        foreach ($fields as $elem) {
//            echo "<td>" . $row[$elem] . "</td>";
//        }
//        echo "</tr>";
//    }
//    echo "</table>";
//    ?>

</body>
</html>


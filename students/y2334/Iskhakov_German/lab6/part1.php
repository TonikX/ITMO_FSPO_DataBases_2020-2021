<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part 1</title>
</head>
<body>
    <?php 

        // variables
        $str = "string";
        $num = 16;
        $bool = true;

        // arrays

        $arr = array(1, 2, 3);

        $obj = array("foo" => "Maryana");

        // conditions

        if ($num == 16) $str = "true"; else $str = "false";
        ($num == 16) ? $str = "false" : $str = true;

        // loops

        for ($i = 0; $i < count($arr); $i++) {
            echo "<p>" . $arr[$i] . "</p>";
        }

        foreach ($arr as $elem) {
            echo "<p>" . $elem . "</p>";
        }

        // functions

        function func() {
            $number = 777;
            return $number;
        }

        echo func();

        // sessions

        session_start();
        if (!isset($_SESSION['time'])) {
            $_SESSION['time'] = date("H:i:s");
        }
        echo "<br/>" . $_SESSION['time'];

    ?>
</body>
</html>
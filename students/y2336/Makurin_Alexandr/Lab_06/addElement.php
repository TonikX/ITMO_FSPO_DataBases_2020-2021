<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/constants.php';
require_once dbFilePath;

if (isset($_GET['tableName'])) {
    $tableName = $_GET['tableName'];
    $db = new DB();
    $columns = $db->getTableColumns($tableName);
    if ($columns == false) {
        $error = 'Неверно указано имя таблицы';
    } else {
    }
} else {
    $error = 'Не указано имя таблицы';
}

$isCorrect = true;
foreach ($columns as $name => $type) {
    if (!isset($_POST[$name])) {
        $isCorrect = false;
        break;
    }
}
if ($isCorrect) {
    $values = [];
    foreach ($columns as $name => $type) {
        if ($type == 'date' && $_POST[$name] == '') {
            $values[$name] = null;
        } else {
            $values[$name] = $_POST[$name];
        }
    }
    try {
        $db->addTableRow($tableName, $values);
    } catch (PDOException $e) {
        $updateError = 'Ошибка изменения данных. SQL код ошибки: ' . $e->getCode();
    }
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add row to table
        <? echo $tableName; ?>
    </title>
    <style>
        td {
            font-weight: bold;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <?
    if (isset($error)) {
        echo "<span color=red>$error</span>";
    } else {
?>
    <button onclick="if(document.referrer == document.URL) history.back(); else location.assign(document.referrer);">Назад</button>
    <form action="<? echo $_SERVER['REQUEST_URI']; ?>" method="POST">
        <table>
            <?
        foreach($columns as $name => $type) {
            echo "<tr><td>$name: </td>";
            $inputType = 'text';
            switch ($type) {
                case 'date':
                    $inputType = 'date';
                    break;
                case 'int':
                case 'int2':
                case 'int4':
                case 'int8':
                case 'int16':
                    $inputType = 'number';
                    break;
            }
            echo "<td><input name='$name' type='$inputType'/></td>";
            echo '</tr>';
        }
    }?>
        </table>
        <? if(isset($updateError)) echo "<span class='error'>$updateError</span><br>"; ?>
        <input type="submit">
    </form>
    <script>
        var temp = $.ajax({
            url: '/getTableMaxID.php',
            data: {
                tableName: "<? echo $tableName; ?>"
            }
        }).done((jqXHR) => {
            $('input[name=id]').attr('value', parseInt(jqXHR) + 1);
        });
    </script>
</body>

</html>

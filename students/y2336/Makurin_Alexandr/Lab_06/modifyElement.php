<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/constants.php';
require_once dbFilePath;

if (isset($_GET['tableName']) && isset($_GET['id'])) {
    $tableName = $_GET['tableName'];
    $id = $_GET['id'];
    $db = new DB();
    $columns = $db->getTableColumns($tableName);
    if ($columns == false) {
        $error = 'Неверно указано имя таблицы';
    } else {
        $row = $db->getTableRow($tableName, (int) $id);
        if ($row == false) {
            $error = 'Неверно указан id';
        }
    }
} else {
    $error = 'Не указано имя таблицы или id';
}

$isCorrect = true;
foreach ($columns as $name => $type) {
    if (!isset($_POST[$name])) {
        $isCorrect = false;
        break;
    }
}
if ($isCorrect) {
    $newValues = [];
    foreach ($columns as $name => $type) {
        if ($type == 'date' && $_POST[$name] == '') {
            $newValues[$name] = null;
        } else {
            $newValues[$name] = $_POST[$name];
        }
    }
    try {
        $db->updateTableRow($tableName, (int) $id, $newValues);
        $row = $db->getTableRow($tableName, $id = $newValues['id']);
    } catch (PDOException $e) {
        $updateError = 'Ошибка изменения данных. SQL код ошибки: ' . $e->getCode();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit row with id
        <? echo $id; ?>
    </title>
    <style>
        td {
            font-weight: bold;
        }
    </style>
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
            echo "<td><input name='$name' type='$inputType' value='{$row[$name]}'/></td>";
            echo '</tr>';
        }
    }?>
        </table>
        <? if(isset($updateError)) echo "<span class='error'>$updateError</span><br>"; ?>
        <input type="submit">
    </form>
</body>

</html>

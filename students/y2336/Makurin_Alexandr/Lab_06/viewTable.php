<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/constants.php';
require_once dbFilePath;
$db = new DB();
if (!isset($_GET['tableName'])) {
    $error = 'Не указано имя таблицы';
} else {
    $tableName = $_GET['tableName'];
    $table = $db->getTable($tableName);
    if ($table == false) {
        $error = 'Таблица с указанным именем не найдена';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table
        <? echo $tableName; ?>
    </title>
    <style>
        table {
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid black;
        }

        td,
        th {
            padding: 1em;
        }

        th {
            border-width: 2px;
        }

        th:nth-last-child(2),
        td:nth-last-child(2) {
            padding: 0;
            padding-left: 0.5em;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <button id="backButton" onclick="location.assign('..');">Назад</button>

    <center>
        <?
    if (isset($error)) {
        echo "<span color=red>$error</span>";
    } else {
?>
        <table>
            <tr>
                <?
        foreach($table->headers as $header) {
            echo "<th>$header<br><span style='font-weight: normal;'>({$table->types[$header]})</span></th>";
        }
?>
                <th style='border: none;'></th>
                <th style='border: none;'></th>
            </tr>
            <?
        foreach($table->rows as $row) {
            echo "<tr id={$row['id']}>";
            foreach($row as $rowElement) {
                echo "<td>$rowElement</td>";
            }
?>
            <td style='border: none;'><button class='modifyElement'>Изменить</button></td>
            <td style='border: none;'><button class='removeElement'>Удалить</button></td>
            </tr>
            <?}?>
        </table>
        <? } ?>
        <span id="error" style="color: red; font-weight: bold;"></span>
        <center><button onclick="location.assign('/addElement.php?tableName=<? echo $tableName ?>')">Добавить</button></center>
        <script>
            if (document.referrer == null || document.referrer == document.URL) {
                $('#backButton').remove();
            }

            $('.modifyElement').click(function(event) {
                id = $(this).parent().parent().attr('id');
                location.assign('/modifyElement.php?tableName=<? echo $_GET["tableName"]; ?>&id=' + id);
            });
            $('.removeElement').click(function(event) {
                $('#error').html('');
                id = $(this).parent().parent().attr('id');
                removeElement(id);
            });

            function removeElement(id) {
                var temp = $.ajax({
                    url: '/removeElement.php',
                    data: {
                        id: id,
                        tableName: "<? echo $_GET['tableName'] ?>"
                    }
                }).done(() => $('#' + id).remove()).fail((jqXHR) => {
                    console.log(jqXHR);
                    var errorText = 'Не удалось удалить удалить элемент. SQL код ошибки: ' + jqXHR.responseText;
                    $('#error').html(errorText);
                });
                console.log(temp);
            }
        </script>
    </center>
</body>

</html>

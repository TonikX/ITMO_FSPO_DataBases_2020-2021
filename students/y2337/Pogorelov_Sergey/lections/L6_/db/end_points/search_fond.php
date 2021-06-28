<?php
require_once '../models/fond.php';

$handler = new Fond();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $result = $handler->readFond($id);

    $rows = pg_num_rows($result);
    echo "Найдено объектов: " . $rows . ".\n";
    
    $data = pg_fetch_assoc($result);

    echo "<ul>
        <form name='update' action='search_fond.php' method='POST' >
            <li>Id fond:</li><li><input type='text' name='id' value='$data[id_fond]' /></li>
            <li>Fond`s name:</li><li><input type='text' name='fond_name' value='$data[fond_name]' /></li>
            <li>Director`s name:</li><li><input type='text' name='name' value='$data[name]' /></li>

            <li><input type='submit' name='update' value='Обновить' /></li>
            <li><input type='submit' name='delete' value='Удалить' /></li>
        </form>
        </ul>";
}

if (isset($_POST['update'])) {
    $up_result = $handler->updateFond($_POST['fond_name'], $_POST['name'], $_POST['id']);

    if (!$up_result) {
        echo "UPDATE FAILD !!!";
    } else {
        echo "UPDATED SUCCESSFULLY !";
    }
}

if (isset($_POST['delete'])) {
    $del_result = $handler->deleteFond($_POST['id']);

    if (!$del_result) {
        echo "DELETE FAILD !!!";
    } else {
        echo "DELETED SUCCESSFULLY !";
    }
}
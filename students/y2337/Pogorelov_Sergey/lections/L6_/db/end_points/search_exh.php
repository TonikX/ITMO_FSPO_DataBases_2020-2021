<?php
require_once '../models/exh.php';

$handler = new Exh();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $result = $handler->readExh($id);

    $rows = pg_num_rows($result);
    echo "Найдено объектов: " . $rows . ".\n";
    
    $data = pg_fetch_assoc($result);

    echo "<ul>
        <form name='update' action='search_exh.php' method='POST' >
            <li>Id exhibition:</li><li><input type='text' name='id' value='$data[id_exh]' /></li>
            <li>Name:</li><li><input type='text' name='name' value='$data[name]' /></li>

            <li><input type='submit' name='update' value='Обновить' /></li>
            <li><input type='submit' name='delete' value='Удалить' /></li>
        </form>
        </ul>";
}

if (isset($_POST['update'])) {
    $up_result = $handler->updateExh($_POST['name'], $_POST['id']);

    if (!$up_result) {
        echo "UPDATE FAILD !!!";
    } else {
        echo "UPDATED SUCCESSFULLY !";
    }
}

if (isset($_POST['delete'])) {
    $del_result = $handler->deleteExh($_POST['id']);

    if (!$del_result) {
        echo "DELETE FAILD !!!";
    } else {
        echo "DELETED SUCCESSFULLY !";
    }
}
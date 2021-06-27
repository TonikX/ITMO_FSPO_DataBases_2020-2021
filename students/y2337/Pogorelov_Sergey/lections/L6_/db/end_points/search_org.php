<?php
require_once '../models/org.php';

$handler = new Org();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $result = $handler->readOrg($id);

    $rows = pg_num_rows($result);
    echo "Найдено объектов: " . $rows . ".\n";
    
    $data = pg_fetch_assoc($result);

    echo "<ul>
        <form name='update' action='search_org.php' method='POST' >
            <li>Id org:</li><li><input type='text' name='id' value='$data[id_org]' /></li>
            <li>Org`s name:</li><li><input type='text' name='org_name' value='$data[org_name]' /></li>
            <li>Director`s name:</li><li><input type='text' name='name' value='$data[name]' /></li>

            <li><input type='submit' name='update' value='Обновить' /></li>
            <li><input type='submit' name='delete' value='Удалить' /></li>
        </form>
        </ul>";
}

if (isset($_POST['update'])) {
    $up_result = $handler->updateOrg($_POST['org_name'], $_POST['name'], $_POST['id']);

    if (!$up_result) {
        echo "UPDATE FAILD !!!";
    } else {
        echo "UPDATED SUCCESSFULLY !";
    }
}

if (isset($_POST['delete'])) {
    $del_result = $handler->deleteOrg($_POST['id']);

    if (!$del_result) {
        echo "DELETE FAILD !!!";
    } else {
        echo "DELETED SUCCESSFULLY !";
    }
}
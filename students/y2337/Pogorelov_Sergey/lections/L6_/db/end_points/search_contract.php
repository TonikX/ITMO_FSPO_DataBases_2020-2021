<?php
require_once '../models/contract.php';

$handler = new Contract();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $result = $handler->readContract($id);

    $rows = pg_num_rows($result);
    echo "Найдено объектов: " . $rows . ".\n";
    
    $data = pg_fetch_assoc($result);

    echo "<ul>
        <form name='update' action='search_contract.php' method='POST' >
            <li>Id contract:</li><li><input type='text' name='id' value='$data[id_contract]' /></li>
            <li>Id fond:</li><li><input type='text' name='id_fond' value='$data[id_fond]' /></li>
            <li>Id org:</li><li><input type='text' name='id_org' value='$data[id_org]' /></li>
            <li>Id exhibition:</li><li><input type='text' name='id_exh' value='$data[id_exh]' /></li>
            <li>Start date:</li><li><input type='date' name='start_date' value='$data[start_date]' /></li>
            <li>Final date:</li><li><input type='date' name='fin_date' value='$data[fin_date]' /></li>

            <li><input type='submit' name='update' value='Обновить' /></li>
            <li><input type='submit' name='delete' value='Удалить' /></li>
        </form>
        </ul>";
}

if (isset($_POST['update'])) {
    $up_result = $handler->updateContract($_POST['id_fond'], $_POST['id_org'], $_POST['id_exh'], $_POST['start_date'], $_POST['fin_date'], $_POST['id']);

    if (!$up_result) {
        echo "UPDATE FAILD !!!";
    } else {
        echo "UPDATED SUCCESSFULLY !";
    }
}

if (isset($_POST['delete'])) {
    $del_result = $handler->deleteContract($_POST['id']);

    if (!$del_result) {
        echo "DELETE FAILD !!!";
    } else {
        echo "DELETED SUCCESSFULLY !";
    }
}
<?php
require_once '../models/piece.php';

$handler = new Piece();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $result = $handler->readPiece($id);

    $rows = pg_num_rows($result);
    echo "Найдено объектов: " . $rows . ".\n";
    
    $data = pg_fetch_assoc($result);

    echo "<ul>
        <form name='update' action='search_piece.php' method='POST' >
            <li>Id piece:</li><li><input type='text' name='id' value='$data[id_piece]' /></li>
            <li>Name:</li><li><input type='text' name='piece_name' value='$data[piece_name]' /></li>
            <li>Start date:</li><li><input type='date' name='creation_date' value='$data[creation_date]' /></li>
            <li>Status:</li><li><input type='text' name='status' value='$data[status]' /></li>
            <li>Id author:</li><li><input type='text' name='id_author' value='$data[id_author]' /></li>

            <li><input type='submit' name='update' value='Обновить' /></li>
            <li><input type='submit' name='delete' value='Удалить' /></li>
        </form>
        </ul>";
}

if (isset($_POST['update'])) {
    $up_result = $handler->updatePiece($_POST['piece_name'], $_POST['creation_date'], $_POST['status'], $_POST['id_author'], $_POST['id']);

    if (!$up_result) {
        echo "UPDATE FAILD !!!";
    } else {
        echo "UPDATED SUCCESSFULLY !";
    }
}

if (isset($_POST['delete'])) {
    $del_result = $handler->deletePiece($_POST['id']);

    if (!$del_result) {
        echo "DELETE FAILD !!!";
    } else {
        echo "DELETED SUCCESSFULLY !";
    }
}
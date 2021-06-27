<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once '../models/author.php';

$handler = new Author();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $result = $handler->readAuthor($id);

    $rows = pg_num_rows($result);
    echo "Найдено объектов: " . $rows . ".\n";
    
    $data = pg_fetch_assoc($result);

    echo "<ul>
        <form name='update' action='search_author.php' method='POST' >
            <li>Id author:</li><li><input type='text' name='id' value='$data[id_author]' /></li>
            <li>Author`s name:</li><li><input type='text' name='name' value='$data[name]' /></li>
            <li>Birth date:</li><li><input type='date' name='birth_date' value='$data[birth_date]' /></li>
            <li>Country:</li><li><input type='text' name='country' value='$data[country]' /></li>

            <li><input type='submit' name='update' value='Обновить' /></li>
            <li><input type='submit' name='delete' value='Удалить' /></li>
        </form>
        </ul>";
}

if (isset($_POST['update'])) {
    $up_result = $handler->updateAuthor($_POST['birth_date'], $_POST['name'], $_POST['country'], $_POST['id']);

    if (!$up_result) {
        echo "UPDATE FAILD !!!";
    } else {
        echo "UPDATED SUCCESSFULLY !";
    }
}

if (isset($_POST['delete'])) {
    $del_result = $handler->deleteAuthor($_POST['id']);

    if (!$del_result) {
        echo "DELETE FAILD !!!";
    } else {
        echo "DELETED SUCCESSFULLY !";
    }
}
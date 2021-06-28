<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/constants.php';
require_once dbFilePath;

if (isset($_GET['tableName'])) {
    $tableName = $_GET['tableName'];
    $db = new DB();
    try {
        $id = $db->query('SELECT COALESCE(MAX(id), 0) FROM ' . $db->getTableName($tableName) . ';')[0][0];
        echo $id;
    } catch (PDOException $e) {
    }
}

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/constants.php';
require_once dbFilePath;
$db = new DB();
if (isset($_GET['tableName']) && isset($_GET['id'])) {
    try {
        if ($db->deleteRowFromTable($_GET['tableName'], (int) $_GET['id']) == false) {
            http_response_code(503);
        }
    } catch(PDOException $e) {
        http_response_code(503);
        echo $e->getCode();
    }
}
?>

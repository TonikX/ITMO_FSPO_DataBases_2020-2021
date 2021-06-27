<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

class BaseModel {
    // Getting DB connection
    public function __construct() {
        require_once '../db_connection.php';
    }
}
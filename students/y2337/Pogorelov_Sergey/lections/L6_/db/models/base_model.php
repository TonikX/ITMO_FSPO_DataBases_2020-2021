<?php

class BaseModel {
    // Getting DB connection
    public function __construct() {
        require_once '../db_connection.php';
    }
}

?>
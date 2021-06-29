<?php

class TS100 {

    public $model;
    public $conn;
    public $temp;

    public function __construct($model, $conn, $temp) {
        $this->model  = $model;
        $this->conn  = $conn;
        $this->temp = $temp;
    }

    public static function get(){
        return new TS100($_POST['model'], $_POST['conn'], $_POST['temp']);
    }
}

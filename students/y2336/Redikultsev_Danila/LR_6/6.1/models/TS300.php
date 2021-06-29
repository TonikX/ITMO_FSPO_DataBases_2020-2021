<?php


class TS300
{
    public $model;
    public $conn;
    public $temp;
    public $mono;

    public function __construct($model,$conn, $temp, $mono)
    {
        $this->model = $model;
        $this->conn = $conn;
        $this->temp = $temp;
        $this->mono = $mono;
    }

    public static function get()
    {
        return new TS300($_POST['model'], $_POST['conn'], $_POST['temp'], $_POST['mono']);
    }
}
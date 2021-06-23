<?php


class TS200{

    public $model;
    public $type;
    public $conn;
    public $temp;

    public function __construct($model, $type ,$conn, $temp)
    {
        $this->model = $model;
        $this->type = $type;
        $this->conn = $conn;
        $this->temp = $temp;
    }

    public static function get()
    {
        return new TS200($_POST['model'], $_POST['type'] , $_POST['conn'], $_POST['temp']);
    }
}

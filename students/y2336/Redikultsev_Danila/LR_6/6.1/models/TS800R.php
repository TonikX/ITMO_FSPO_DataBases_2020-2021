<?php


class TS800R
{
    public $model;
    public $model_type;
    public $protect;
    public $conn;
    public $mount;
    public $clime;
    public $comm;
    public $switch;

    public function __construct($model, $model_type, $protect, $conn, $mount, $clime, $comm, $switch)
    {
        $this->model = $model;
        $this->model_type = $model_type;
        $this->protect = $protect;
        $this->conn = $conn;
        $this->mount = $mount;
        $this->clime = $clime;
        $this->comm = $comm;
        $this->switch = $switch;

    }

    public static function get()
    {
        return new TS800R($_POST['model'], $_POST['model_type'], $_POST['protect'], $_POST['conn'], $_POST['mount'], $_POST['clime'], $_POST['comm'], $_POST['switch']);
    }
}
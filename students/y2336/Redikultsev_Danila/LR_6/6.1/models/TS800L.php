<?php


class TS800L
{
    public $model;
    public $model_type;
    public $protect;
    public $conn;
    public $lever;
    public $clime;
    public $comm;
    public $switch;

    public function __construct($model, $model_type, $protect, $conn, $lever, $clime, $comm, $switch)
    {
        $this->model = $model;
        $this->model_type = $model_type;
        $this->protect = $protect;
        $this->conn = $conn;
        $this->lever = $lever;
        $this->clime = $clime;
        $this->comm = $comm;
        $this->switch = $switch;
    }

    public static function get()
    {
        return new TS800L($_POST['model'], $_POST['model_type'], $_POST['protect'], $_POST['conn'], $_POST['lever'], $_POST['clime'], $_POST['comm'], $_POST['switch']);
    }
}
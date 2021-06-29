<?php


class TS900L
{
    public $model;
    public $model_type;
    public $protect;
    public $conn;
    public $lever;
    public $clime;
    public $comm;
    public $sign;

    public function __construct($model, $model_type, $protect, $conn, $lever, $clime, $comm, $sign)
    {
        $this->model = $model;
        $this->model_type = $model_type;
        $this->protect = $protect;
        $this->conn = $conn;
        $this->lever = $lever;
        $this->clime = $clime;
        $this->comm = $comm;
        $this->sign  = $sign;

    }

    public static function get()
    {
        return new TS900L($_POST['model'], $_POST['model_type'], $_POST['protect'], $_POST['conn'], $_POST['lever'], $_POST['clime'], $_POST['comm'], $_POST['sign']);
    }
}
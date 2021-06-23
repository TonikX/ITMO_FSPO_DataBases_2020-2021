<?php


class TS600L
{
    public $model;
    public $protect;
    public $conn;
    public $lever;
    public $clime;
    public $linear;

    public function __construct($model, $protect, $conn, $lever, $clime, $linear)
    {
        $this->model = $model;
        $this->protect = $protect;
        $this->conn = $conn;
        $this->lever = $lever;
        $this->clime = $clime;
        $this->linear = $linear;

    }

    public static function get()
    {
        return new TS600L($_POST['model'], $_POST['protect'], $_POST['conn'], $_POST['lever'], $_POST['clime'], $_POST['linear']);
    }
}
<?php


class TS600R
{
    public $model;
    public $protect;
    public $conn;
    public $mount;
    public $clime;
    public $rotate;

    public function __construct($model, $protect, $conn, $mount, $clime, $rotate)
    {
        $this->model = $model;
        $this->protect = $protect;
        $this->conn = $conn;
        $this->mount = $mount;
        $this->clime = $clime;
        $this->rotate = $rotate;

    }

    public static function get()
    {
        return new TS600R($_POST['model'], $_POST['protect'], $_POST['conn'], $_POST['mount'], $_POST['clime'], $_POST['rotate']);
    }
}
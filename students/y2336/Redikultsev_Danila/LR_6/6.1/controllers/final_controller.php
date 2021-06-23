<?php

class FinalController {

    public function final() {

        if (isset($_POST['model_type']))
            $model_name = $_POST['model'] . $_POST['model_type'];
        else
            $model_name = $_POST['model'];

        switch ($model_name){
            case 'TS100':
                $ts = TS100::get();
                $string = $ts->model . $ts->conn . $ts->temp;
                break;
            case 'TS200':
                $ts = TS200::get();
                $string = $ts->model . $ts->type . $ts->conn . $ts->temp;
                break;
            case 'TS300':
                $ts = TS300::get();
                $string = $ts->model . $ts->conn . $ts->temp . $ts->mono;
                break;
            case 'TS305':
                $ts = TS305::get();
                $string = $ts->model . $ts->conn . $ts->temp . $ts->mono;
                break;
            case 'TS600L':
                $ts = TS600L::get();
                $string = $ts->model . $ts->protect . $ts->conn . $ts->lever . $ts->clime . $ts->linear;
                break;
            case 'TS600R':
                $ts = TS600R::get();
                $string = $ts->model . $ts->protect . $ts->conn . $ts->mount . $ts->clime . $ts->rotate;
                break;
            case 'TS800L':
                $ts = TS800L::get();
                $string = $ts->model . $ts->model_type . $ts->protect . $ts->conn . $ts->lever . $ts->clime . $ts->comm . $ts->switch;
                break;
            case 'TS800R':
                $ts = TS800R::get();
                $string = $ts->model . $ts->model_type . $ts->protect . $ts->conn . $ts->mount . $ts->clime . $ts->comm . $ts->switch;
                break;
            case 'TS820L':
                $ts = TS820L::get();
                $string = $ts->model . $ts->model_type . $ts->protect . $ts->conn . $ts->lever . $ts->clime . $ts->comm . $ts->switch . $ts->length;
                break;
            case 'TS820R':
                $ts = TS820R::get();
                $string = $ts->model . $ts->model_type . $ts->protect . $ts->conn . $ts->mount . $ts->clime . $ts->comm . $ts->switch . $ts->length;
                break;
            case 'TS900L':
                $ts = TS900L::get();
                $string = $ts->model . $ts->model_type . $ts->protect . $ts->conn . $ts->lever . $ts->clime . $ts->comm . $ts->sign;
                break;
            case 'TS900R':
                $ts = TS900R::get();
                $string = $ts->model . $ts->model_type . $ts->protect . $ts->conn . $ts->mount . $ts->clime . $ts->comm . $ts->sign;
                break;
        }

        require_once('views/final/final.php');
    }
}




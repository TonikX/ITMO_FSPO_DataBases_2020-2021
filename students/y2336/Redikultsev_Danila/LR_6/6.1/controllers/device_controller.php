<?php
class DeviceController {

    public function blocking_valve() {
        require_once('views/device/blocking_valve.php');
    }

    public function positioner() {
        require_once('views/device/positioner.php');
    }

    public function booster() {
        require_once('views/device/booster.php');
    }

    public function filter_regulator() {
        require_once('views/device/filter_regulator.php');
    }
}
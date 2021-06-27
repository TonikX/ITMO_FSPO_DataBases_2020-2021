<?php
require_once 'base_model.php';

class Exh extends BaseModel {
    public function __construct() {
        parent::__construct();
    }

    public function createExh($name) {
        $query = "INSERT INTO exh(name) VALUES ('$name')";
        pg_query($query);
    }

    public function readExh($id) {
        $query = "SELECT * FROM exh WHERE id_exh = '$id'";
        $result = pg_query($query);

        return $result;
    }

    public function updateExh($name, $id) {
        $query = "UPDATE exh SET name = '$name' WHERE id_exh = '$id'";
        $result = pg_query($query);

        return $result;
    }

    public function deleteExh($id) {
        $query = "DELETE FROM exh WHERE id_exh = '$id'";
        pg_query($query);
    }

}

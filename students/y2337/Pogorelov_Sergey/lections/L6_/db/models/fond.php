<?php
require_once 'base_model.php';

class Fond extends BaseModel {
    public function __construct() {
        parent::__construct();
    }

    public function createFond($fond_name, $name) {
        $query = "INSERT INTO fond(fond_name, name) VALUES ('$fond_name', '$name')";
        pg_query($query);
    }

    public function readFond($id) {
        $query = "SELECT * FROM fond WHERE id_fond = '$id'";
        $result = pg_query($query);

        return $result;
    }

    public function updateFond($fond_name, $name, $id) {
        $query = "UPDATE fond SET fond_name = '$fond_name', name = '$name' WHERE id_fond = '$id'";
        $result = pg_query($query);

        return $result;
    }

    public function deleteFond($id) {
        $query = "DELETE FROM fond WHERE id_fond = '$id'";
        pg_query($query);
    }

}

?>
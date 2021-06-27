<?php
require_once 'base_model.php';

class Contract extends BaseModel {
    public function __construct() {
        parent::__construct();
    }

    public function createContract($id_fond, $id_org, $id_exh, $start_date, $fin_date) {
        $query = "INSERT INTO contract(id_fond, id_org, id_exh, start_date, fin_date) VALUES ('$id_fond', '$id_org', '$id_exh', '$start_date', '$fin_date')";
        pg_query($query);
    }

    public function readContract($id) {
        $query = "SELECT * FROM contract WHERE id_contract = '$id'";
        $result = pg_query($query);

        return $result;
    }

    public function updateContract($id_fond, $id_org, $id_exh, $start_date, $fin_date, $id) {
        $query = "UPDATE contract SET id_fond = '$id_fond', id_org = '$id_org', id_exh = '$id_exh', start_date = '$start_date', fin_date = '$fin_date' WHERE id_contract = '$id'";
        $result = pg_query($query);

        return $result;
    }

    public function deleteContract($id) {
        $query = "DELETE FROM contract WHERE id_contract = '$id'";
        pg_query($query);
    }

}

?>
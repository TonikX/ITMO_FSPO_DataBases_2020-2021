<?php
require_once 'base_model.php';

class Org extends BaseModel {
    public function __construct() {
        parent::__construct();
    }

    public function createOrg($org_name, $name) {
        $query = "INSERT INTO org(org_name, name) VALUES ('$org_name', '$name')";
        pg_query($query);
    }

    public function readOrg($id) {
        $query = "SELECT * FROM org WHERE id_org = '$id'";
        $result = pg_query($query);

        return $result;
    }

    public function updateOrg($org_name, $name, $id) {
        $query = "UPDATE org SET org_name = '$org_name', name = '$name' WHERE id_org = '$id'";
        $result = pg_query($query);

        return $result;
    }

    public function deleteOrg($id) {
        $query = "DELETE FROM org WHERE id_org = '$id'";
        pg_query($query);
    }

}

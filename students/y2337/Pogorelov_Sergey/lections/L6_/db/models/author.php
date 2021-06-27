<?php
require_once 'base_model.php';

class Author extends BaseModel {
    public function __construct() {
        parent::__construct();
    }

    public function createAuthor($birth_date, $name, $country) {
        $query = "INSERT INTO author(birth_date, name, country) VALUES ('$birth_date', '$name', '$country')";
        pg_query($query);
    }

    public function readAuthor($id) {
        $query = "SELECT * FROM author WHERE id_author = '$id'";
        $result = pg_query($query);

        return $result;
    }

    public function updateAuthor($birth_date, $name, $country, $id) {
        $query = "UPDATE author SET birth_date = '$birth_date', name = '$name', country = '$country' WHERE id_author = '$id'";
        $result = pg_query($query);

        return $result;
    }

    public function deleteAuthor($id) {
        $query = "DELETE FROM author WHERE id_author = '$id'";
        pg_query($query);
    }

}

?>
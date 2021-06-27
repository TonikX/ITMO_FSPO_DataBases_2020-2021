<?php
require_once 'base_model.php';

class Piece extends BaseModel {
    public function __construct() {
        parent::__construct();
    }

    public function createPiece($piece_name, $creation_date, $status, $id_author) {
        $query = "INSERT INTO piece(piece_name, creation_date, status, id_author) VALUES ('$piece_name', '$creation_date', '$status', '$id_author')";
        pg_query($query);
    }

    public function readPiece($id) {
        $query = "SELECT * FROM piece WHERE id_piece = '$id'";
        $result = pg_query($query);

        return $result;
    }

    public function updatePiece($piece_name, $creation_date, $status, $id_author, $id) {
        $query = "UPDATE piece SET piece_name = '$piece_name', creation_date = '$creation_date', status = '$status', id_author = '$id_author' WHERE id_piece = '$id'";
        $result = pg_query($query);

        return $result;
    }

    public function deletePiece($id) {
        $query = "DELETE FROM piece WHERE id_piece = '$id'";
        pg_query($query);
    }

}

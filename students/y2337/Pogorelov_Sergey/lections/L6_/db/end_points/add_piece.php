<?php
require_once '../models/piece.php';

$handler = new Piece();
if (isset($_POST['submit'])) {	
    $handler->createPiece($_POST['piece_name'], $_POST['creation_date'], $_POST['status'], $_POST['id_author']);
}
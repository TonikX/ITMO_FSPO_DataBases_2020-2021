<?php
require_once '../models/exh.php';

$handler = new Exh();
if (isset($_POST['submit'])) {	
    $handler->createExh($_POST['name']);
}

?>
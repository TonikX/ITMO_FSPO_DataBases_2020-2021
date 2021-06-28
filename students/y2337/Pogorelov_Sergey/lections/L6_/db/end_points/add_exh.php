<?php
require_once '../models/exh.php';

$handler = new Exh();
if (isset($_POST['submit'])) {	
    $handler->createExh($_POST['name']);
}

header("Location: http://localhost/front/search_exh.html")
?>
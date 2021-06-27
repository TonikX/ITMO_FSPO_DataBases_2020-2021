<?php
require_once '../models/fond.php';

$handler = new Fond();
if (isset($_POST['submit'])) {	
    $handler->createFond($_POST['fond_name'], $_POST['name']);
}
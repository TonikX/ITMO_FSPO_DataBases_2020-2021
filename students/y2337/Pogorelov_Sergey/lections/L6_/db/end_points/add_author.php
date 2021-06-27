<?php
require_once '../models/author.php';

$handler = new Author();
if (isset($_POST['submit'])) {	
    $handler->createAuthor($_POST['birth_date'], $_POST['name'], $_POST['country']);
}
<?php
require_once '../models/contract.php';

$handler = new Contract();
if (isset($_POST['submit'])) {	
    $handler->createContract($_POST['id_fond'], $_POST['id_org'], $_POST['id_exh'], $_POST['start_date'], $_POST['fin_date']);
}
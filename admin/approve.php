<?php
include '../database/model.php';

$db = new PDO('mysql:host=localhost;dbname=bean_bar', 'root');

$dbc = new DatabaseConnection($db);


if (isset($_POST['coffee'])) {
    $dbc->approveCoffee($_POST['id']);
} else {
    $dbc->approveGrower($_POST['id']);
}

print 'approved?!';
<?php
include '../database/model.php';

$db = new PDO('mysql:host=localhost;dbname=bean_bar', 'root');

$dbc = new DatabaseConnection($db);

//If caff is set, then we have a coffee submission
if (isset($_POST['caff'])) {
    $c_name = $_POST['c_name'];
    $g_id = $_POST['g_id'];
    $roast = $_POST['roast'];
    $caff = $_POST['caff'];
    $short_desc = $_POST['short_desc'];
    $long_desc = $_POST['long_desc'];

    $dbc->insertNewCoffee($c_name, $g_id, $roast, $caff, $short_desc, $long_desc);
} else {
    $g_f_name = $_POST['g_f_name'];
    $g_l_name= $_POST['g_l_name'];
    $loc = $_POST['loc'];
    $farm = $_POST['farm'];
    $short_desc = $_POST['short_desc'];
    $long_desc = $_POST['long_desc'];

    $dbc->insertNewGrower($g_f_name, $g_l_name, $farm, $loc, $short_desc, $long_desc);
}

header('Location: ./field.php');
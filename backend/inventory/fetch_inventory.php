<?php


include('../includes/db.php');
include('../includes/functions.php');


$inventory = fetchInventory();


header('Content-Type: application/json');
echo json_encode($inventory);
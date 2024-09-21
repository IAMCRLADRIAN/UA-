<?php

header('Content-Type: application/json');


$data = [
    "message" => "Hello from the PHP backend!"
];


echo json_encode($data);
?>

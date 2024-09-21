<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $input = json_decode(file_get_contents('php://input'), true);
    
    
    echo json_encode([
        'status' => 'success',
        'message' => 'Data received!',
        'data' => $input
    ]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Only POST requests are accepted.']);
}
?>
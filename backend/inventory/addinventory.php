<?php

function addInventoryItem($product_name, $available, $total) {
    global $conn;
    

    $product_name = sanitizeInput($product_name);
    $available = (int) sanitizeInput($available);
    $total = (int) sanitizeInput($total);

   
    $sql = "INSERT INTO inventory (product_name, available, total) VALUES ('$product_name', '$available', '$total')";
    return $conn->query($sql);
}
?>
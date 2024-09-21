<?php

function updateInventoryItem($id, $product_name, $available, $total) {
    global $conn;

    
    $id = (int) sanitizeInput($id);
    $product_name = sanitizeInput($product_name);
    $available = (int) sanitizeInput($available);
    $total = (int) sanitizeInput($total);

   
    $sql = "UPDATE inventory SET product_name='$product_name', available='$available', total='$total' WHERE id='$id'";
    return $conn->query($sql);
}
?>
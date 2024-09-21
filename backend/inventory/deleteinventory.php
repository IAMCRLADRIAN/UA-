<?php

function deleteInventoryItem($id) {
    global $conn;


    $id = (int) sanitizeInput($id);


    $sql = "DELETE FROM inventory WHERE id='$id'";
    return $conn->query($sql);
}
?>
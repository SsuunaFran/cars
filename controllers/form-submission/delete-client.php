<?php
require_once "../../database/database.php";
 echo "yoooooooooooooo";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $stmt = $conn->prepare("DELETE FROM clients WHERE client_id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: /view-clients");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
} else {
    echo "Invalid ID";
    exit();
}

$conn->close();


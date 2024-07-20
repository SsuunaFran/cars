<?php
require_once "../../database/database.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $stmt = $conn->prepare("DELETE FROM parking_lots WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: /view-lots");
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

<?php
require_once "../../database/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $parking_lot_fee = $_POST['parking_lot_fee'];

    $stmt = $conn->prepare("UPDATE parking_lots SET parking_lot_fee = ? WHERE id = ?");
    $stmt->bind_param("ii", $parking_lot_fee, $id);
    
    if ($stmt->execute()) {
        header("Location: /view-charges");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();


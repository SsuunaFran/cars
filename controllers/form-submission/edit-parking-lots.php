<?php
require_once "../../database/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $parking_lot_name = $_POST['parking_lot_name'];
    $parking_rows = $_POST['parking_rows'];
    $parking_columns = $_POST['parking_columns'];
    $parking_lot_desc = $_POST['parking_lot_desc'];

    $stmt = $conn->prepare("UPDATE parking_lots SET parking_lot_name = ?, parking_rows = ?, parking_columns = ?,description=? WHERE id = ?");
    $stmt->bind_param("siisi", $parking_lot_name, $parking_rows, $parking_columns, $parking_lot_desc, $id);
    
    if ($stmt->execute()) {
        header("Location: /view-lots");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();


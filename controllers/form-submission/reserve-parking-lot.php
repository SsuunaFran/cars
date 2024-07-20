<?php
require_once "../../database/database.php";

$parking_lot_id = $_POST['parking_lot_id'];
$row_index = $_POST['row'];
$column_index = $_POST['column'];
$new_value = $_POST['new_value'];

$json_path = "$[$row_index][$column_index]";

// Prepare the update statement
$sql = "UPDATE parking_lots_map
        SET grid = JSON_SET(grid, ?, ?)
        WHERE parking_lot_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sii", $json_path, $new_value, $parking_lot_id);

if ($stmt->execute()) {
    echo "Grid updated successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();


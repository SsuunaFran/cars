<?php
require_once "../../database/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $parking_lot_name = $_POST['parking_lot_name'];
    $parking_rows = $_POST['parking_rows'];
    $parking_columns = $_POST['parking_columns'];
    $parking_lot_fee = $_POST['parking_lot_fee'];
    $parking_lot_desc = $_POST['parking_lot_desc'];

    $stmt = $conn->prepare("INSERT INTO parking_lots (parking_lot_name, parking_rows, parking_columns,parking_lot_fee,description ) VALUES (?, ?, ?,?,?)");
    $stmt->bind_param("siiis", $parking_lot_name, $parking_rows, $parking_columns,$parking_lot_fee,$parking_lot_desc);

    if ($stmt->execute()) {
        $parking_lot_id = $stmt->insert_id;
    
        $parkingLot = array_fill(0, $parking_rows, array_fill(0, $parking_columns, 0));
        $grid_json = json_encode($parkingLot);
    
        $stmt = $conn->prepare("INSERT INTO parking_lots_map (parking_lot_id, grid) VALUES (?, ?)");
        $stmt->bind_param("is", $parking_lot_id, $grid_json);
    
        if ($stmt->execute()) {    
            header("Location: /view-lots");
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $redis->close();
    $stmt->close();
    $conn->close();
}

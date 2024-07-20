<?php
require_once "../../database/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_name = $_POST['client_name'];
    $client_phone = $_POST['client_phone'];
    $client_email = isset($_POST['client_email']) ? $_POST['client_email'] : null;
    $client_numberplates = $_POST['client_numberplates'];

    $stmt = $conn->prepare("INSERT INTO clients (client_name, client_phone, client_email, client_numberplates) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $client_name, $client_phone, $client_email, $client_numberplates);

    if ($stmt->execute()) {
        header("Location: /view-clients");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

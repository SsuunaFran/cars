<?php
require_once "../../database/database.php";

$id = intval($_GET['id']);

$stmt = $conn->prepare("SELECT client_name, client_phone, client_email, client_numberplates FROM clients WHERE client_id = ?");
$id = intval($_POST['id']);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($client_name, $client_phone, $client_email, $client_numberplates);
$stmt->fetch();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_client_name = $_POST['client_name'];
    $new_client_phone = $_POST['client_phone'];
    $new_client_email = $_POST['client_email'];
    $new_client_numberplates = $_POST['client_numberplates'];

    $stmt = $conn->prepare("UPDATE clients SET client_name = ?, client_phone = ?, client_email = ?, client_numberplates = ? WHERE client_id = ?");
    $stmt->bind_param("ssssi", $new_client_name, $new_client_phone, $new_client_email, $new_client_numberplates, $id);

    if ($stmt->execute()) {
        header("Location: /view-clients");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
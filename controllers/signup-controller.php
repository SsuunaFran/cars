<?php
session_start();
require_once "../database/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password = trim($_POST['password']);
    $verify_password = trim($_POST['verify_password']);
    $contact = trim($_POST['contact']);


    if (empty($username) || empty($password) || empty($verify_password) || empty($contact)) {
        echo "All fields except email are required.";
        exit();
    }

    if ($password !== $verify_password) {
        echo "Passwords do not match.";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash, contact) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $hashed_password, $contact);

    if ($stmt->execute()) {
        header("Location: /login");
    } else {
        // echo "Error: " . $stmt->error;
        header("Location: /signup");
    }

    $stmt->close();
    $conn->close();
}


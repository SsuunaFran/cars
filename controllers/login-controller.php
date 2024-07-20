<?php
session_start();
require_once "../database/database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, email, role, password_hash FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $email, $role, $password_hash);
        $stmt->fetch();

        if (password_verify($password, $password_hash)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['loggedIn']=true;
            $_SESSION['role']=$role;

            header("Location: /");
            exit();
        } else {
            $_SESSION['error']="Invalid Password";
            header("Location: /login");
        }
    } else {
        $_SESSION['error']="No user found with that username.";
        header("Location: /login");
    }
    $stmt->close();
}
$conn->close();

<?php
$host = 'localhost';
$db   = 'parking_db';
$user = 'root';
$pass = 'Ancis@2001';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $row = $_POST['pin'];
    echo $row;
}
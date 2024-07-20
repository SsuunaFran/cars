<?php
session_start();

$loggedIn = isset($_SESSION['loggedIn']) ? $_SESSION['loggedIn'] : false;
$role = $_SESSION['role'];

function loadComponent($file)
{
    $safePath = realpath($file);
    if ($safePath && strpos($safePath, __DIR__) === 0) {
        require $safePath;
    } else {
        header("HTTP/1.0 404 Not Found");
        echo 'Page not found';
        exit();
    }
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($loggedIn) {
    require_once "components/header.php";

    switch ($uri) {
        case '/':
            if ($role == 'user') {
                loadComponent('components/usersdash.php');
            } elseif ($role == 'admin') {
                loadComponent('components/dashboard.php');
            }
            break;
        case '/parking-lots':
            loadComponent('components/parking-lot.php');
            break;
        case '/view-lots':
            loadComponent('tables/parking-lots.php');
            break;
        case '/view-clients':
            loadComponent('tables/viewclients.php');
            break;
        case '/view-charges':
            loadComponent('tables/parking-lots-charges.php');
            break;
        default:
            header("HTTP/1.0 404 Not Found");
            echo 'Page not found';
            break;
    }

    // Include the footer only for logged-in users
    require_once "components/footer.php";
} else {
    // Route management for non-logged-in users
    switch ($uri) {
        case '/signup':
            loadComponent('components/signup.php');
            break;
        default:
            loadComponent('components/login.php');
            break;
    }
}

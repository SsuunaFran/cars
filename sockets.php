<?php
$host = '127.0.0.1';
$port = 8080;

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    echo "socket_create() failed: " . socket_strerror(socket_last_error()) . "\n";
}

$result = socket_bind($socket, $host, $port);
if ($result === false) {
    echo "socket_bind() failed: " . socket_strerror(socket_last_error($socket)) . "\n";
}

$result = socket_listen($socket, 5);
if ($result === false) {
    echo "socket_listen() failed: " . socket_strerror(socket_last_error($socket)) . "\n";
}

do {
    $clientSocket = socket_accept($socket);
    if ($clientSocket === false) {
        echo "socket_accept() failed: " . socket_strerror(socket_last_error($socket)) . "\n";
        break;
    }

    $input = socket_read($clientSocket, 1024);
    echo "Received: $input\n";
    var_dump("ok ok ok");

    // Send response to the client
    $response = "Hello, client!".$input;
    socket_write($clientSocket, $response, strlen($response));

    socket_close($clientSocket);
} while (true);

socket_close($socket);


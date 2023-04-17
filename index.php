<?php

// Initialize variables
$stun_host = "stun.example.com";
$stun_port = 3478;

// Create a UDP socket
$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);

// Bind the socket to the host and port
socket_bind($socket, $stun_host, $stun_port);

// Receive data from clients
while (true) {
    $data = '';
    $from = '';
    $port = '';
    socket_recvfrom($socket, $data, 1024, 0, $from, $port);

    // Create a STUN response
    $response = "STUN response data";

    // Send the response to the client
    socket_sendto($socket, $response, strlen($response), 0, $from, $port);
}

// Close the socket
socket_close($socket);

?>

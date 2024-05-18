<?php

    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $database = "php_webapp";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection Failed:" . $conn->connect_error);
    }
// echo "Connected Successfully!";
?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $database = "php_webapp";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection Failed:" . $conn->connect_error);
    }
    echo "Connected Successfully!";
?>
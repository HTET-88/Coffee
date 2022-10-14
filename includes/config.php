<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "coffee";

    // session_start();
    // Create connection
    $conn = new mysqli($servername, $username, $password,$db);
    $errors = array(); 
    
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connected successfully";

?>
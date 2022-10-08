<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "arviedsproject";

    if(!$conn = mysqli_connect($server, $username, $password, $database)){
        die("Failed to Connect to Database!");
    }

    // if(!$conn = mysqli_connect($server, $username, $password, $database)){
    //     die("Failed to Connect to Database!");
    // } else $conn = mysqli_connect($server, $username, $password, $database);
?>
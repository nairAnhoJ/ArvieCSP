<?php
    $server = "localhost";
    $username = "root";
    $password = "happykidd0";
    $database = "ArvieDS";

    if(!$conn = mysqli_connect($server, $username, $password, $database)){
        die("Failed to Connect to Database!");
    } else $conn = mysqli_connect($server, $username, $password, $database);
?>
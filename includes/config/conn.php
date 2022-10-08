<?php
    $server = "localhost";
    $username = "root";
    $usernamex = "arviecsp";
    $password = "";
    $passwordx = "p@55w0rd";
    $database = "arviedsproject";
    $databaseX = "ArvieDS";

    if(!$conn = mysqli_connect($server, $username, $password, $database)){
    } elseif ($conn = mysqli_connect($server, $usernamex, $passwordx, $databasex)) {
        die("Failed to Connect to Database!");
    }
?>
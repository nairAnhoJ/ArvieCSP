<?php
    $server = "localhost";
    $username = "root";
    $password = "happykidd0";
    $database = "ArvieDS";

    if(!$conn = mysqli_connect($server, $username, $password, $database)){
        die("Failed to Connect to Database!");
    } else if ($conn = mysqli_connect($server, $username, $password, $database)){
        $test = mysqli_query($conn, "SELECT * from accounts");

    while($userRow = mysqli_fetch_assoc($test)){
        $totalBalance = $userRow['id'];
    }
    echo "$totalBalance";
    }
?>
<?php

$showAlert = false; 
$showError = false; 
$exists=false;

if(isset($_POST["register"])){
    include "./includes/config/conn.php";

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $pass = $_POST["pass"];
    $confirm_pass = $_POST["confirm_pass"];
    $email_address = $_POST["email_address"];
    $contact_number = $_POST["contact_number"];

    $create_user_select = "SELECT first_name, last_name, pass, email_address, contact_number, access FROM accounts WHERE email_address='$email_address'";
    $create_user_query = mysqli_query($conn, $create_user_select);
    $create_user_count = mysqli_num_rows($create_user_query);

    if($create_user_count == 0) {
        if(($pass == $confirm_pass)&& $exists==false) {
    
            $hash = password_hash($pass, PASSWORD_DEFAULT);

            $create_user_select2 = "INSERT INTO `accounts` (`first_name`, `last_name`, `pass`, `email_address`, `contact_number`, `access`, `date`) VALUES ('$first_name', '$last_name', '$hash', '$email_address', '$contact_number', false, current_timestamp())";
    
            $result = mysqli_query($conn, $create_user_select2);
    
            if ($result) {
                $showAlert = true; 
            }
            else {
                $showError = "Passwords do not match"; 
            }
        }
       if($create_user_count>0) {
          $exists="Username already taken"; 
       } 
    }
}
?>
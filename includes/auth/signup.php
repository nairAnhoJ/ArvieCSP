<?php

$showAlert = false; 
$showError = false; 
$exists=false;
    
if(isset($_POST["register"])){
      
    include_once ("./config/conn.php");

    $member_id = $_POST["member_id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $user = $_POST["user"]; 
    $pass = $_POST["pass"];
    $confirm_pass = $_POST["confirm_pass"];
    $email_address = $_POST["email_address"];
    $contact_number = $_POST["contact_number"];
    
            
    $create_user_select = "SELECT member_id, first_name, last_name, user, pass, confirm_pass, email_address, contact_number FROM accounts WHERE member_id='$member_id'";
    $create_user_query = mysqli_query($conn, $create_user_select);
    $create_user_count = mysqli_num_rows($create_user_query); 

    if($create_user_count == 0) {
        if(($pass == $confirm_pass) && $exists==false) {
    
            $hash = password_hash($user_pwd, PASSWORD_DEFAULT);

            $create_user_select2 = "INSERT INTO `accounts` ( `member_id`, `first_name`, `last_name`, `user`, `pass`, `email_address`, `contact_number`, `date`) VALUES ('$member_id', '$first_name', '$last_name', '$user', '$hash', '$email_address', '$contact_number', current_timestamp())";
    
            $result = mysqli_query($conn, $create_user_select2);
    
            if ($result) {
                $showAlert = true; 
            }
        }
        else {
            $showError = "Passwords do not match"; 
        }
    }
   if($create_user_count>0) {
      $exists="Username already taken"; 
   } 
}
?>
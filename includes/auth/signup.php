<?php

$showAlert = false; 
$showError = false; 
$exists=false;

if(isset($_POST["register"])){
    include "./includes/config/conn.php";


    $referralId = $_POST["ref_code"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email_address = $_POST["email_address"];
    $pass = $_POST["pass"];
    $contact_number = $_POST["contact_number"];
    $birthday = date('M d Y', strtotime($_POST["birthday"]));
    $confirm_pass = $_POST["confirm_pass"];
    $sss_num = $_POST["sss_num"];
    $tin_acct = $_POST["tin_acct"];
    $homeAddress = $_POST["homeAddress"];

    $Referral_ID = "SELECT referral_ID, referrer FROM referral_codes WHERE status = 'to_redeem'";
    $Referral_query = mysqli_query($conn, $Referral_ID);
    $Referral_count = mysqli_num_rows($Referral_query);

    if ($Referral_count > 0) {
        header("location: ./signup.php");
        echo "<script> alert('The code has already been used, sorry!')</script>";
    } else {
        
    $create_user_select = "SELECT referralId, first_name, last_name, pass, email_address, contact_number, access, sss_num, tin_acct, homeaddress FROM accounts WHERE email_address='$email_address'";
    $create_user_query = mysqli_query($conn, $create_user_select);
    $create_user_count = mysqli_num_rows($create_user_query);


    if($create_user_count == 0) {
        if(($pass == $confirm_pass)&& $exists==false) {

            $hash = password_hash($pass, PASSWORD_DEFAULT);

            $create_user_select2 = "INSERT INTO `accounts` (`admin`,`first_name`, `last_name`, `pass`, `email_address`, `contact_number`, `access`, `date`) VALUES ('0', '$first_name', '$last_name', '$hash', '$email_address', '$contact_number', false, current_timestamp)";

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
}
?>
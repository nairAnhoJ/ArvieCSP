<?php

$showAlert = false; 
$showError = false; 
$exists=false;

    include "./includes/config/conn.php";

    $referrer = $_POST["sponsor"];
    $ref_code = $_POST["ref_code"];
    $referral_check = "SELECT referrer, ref_code from referral_codes where referrer = '$referrer' and ref_code = '$ref_code'";
    $referral_query = mysqli_query($conn, $referral_check);
    $referral_count = mysqli_num_rows($referral_query);
    
    if ($referral_count == "1") {
        while ($referral_info = mysqli_fetch_assoc($referral_query)); {
            if ($referrer == $referral_info['referrer'] && $referral_codes == $referral_info['ref_code']) {

                if(isset($_POST["register"])){

                $code = "ADS";
                $get_month = date('m', strtotime("now"));
                $number = 00001;
            
                $member_id = "$code$get_month-$number";
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
            
                $Referral_ID = "SELECT ref_code, referrer FROM referral_codes WHERE status = 'to_redeem'";
                $Referral_query = mysqli_query($conn, $Referral_ID);
                $Referral_count = mysqli_num_rows($Referral_query);
            
                if ($Referral_count > 0) {
                    header("location: ./signup.php");
                    echo "<script> alert('The code has already been used, sorry!')</script>";
                } else {
                    
                    $create_user_select = "SELECT referralId, first_name, last_name, pass, email_address, contact_number, access, sss_num, tin_acct, homeaddress, member_id FROM accounts WHERE email_address='$email_address'";
                    $create_user_query = mysqli_query($conn, $create_user_select);
                    $create_user_count = mysqli_num_rows($create_user_query);
            
            
                    if($create_user_count == 0) {
                        if(($pass == $confirm_pass)&& $exists==false) {
            
                            $hash = password_hash($pass, PASSWORD_DEFAULT);
            
                            $create_user_select2 = "INSERT INTO `accounts` (`admin`,`first_name`, `last_name`, `pass`, `email_address`, `contact_number`, `access`, `date` `member_id`) VALUES ('0', '$first_name', '$last_name', '$hash', '$email_address', '$contact_number', false, current_timestamp, '$member_id')";
            
                            $result = mysqli_query($conn, $create_user_select2);
                    
                            if ($result) {
                                $showAlert = true; 
                            }
                            else {
                                $showError = "Passwords do not match"; 
                            }
                        }
                        elseif ($create_user_count>0) {
                            $exists="Username already taken"; 
                        } 
                    }
                }
            }else {
                echo "<script> alert('Your code or sponsor didn't matched')</script>";
            }
        }
    }

    
}
?>
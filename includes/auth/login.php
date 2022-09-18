<?php
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../index.php");
    exit;
    
}
include_once ("../includes/config/conn.php");
 
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
if(isset($_POST["login"])){
 
if(empty(trim($_POST["username"]))){
    $username_err = "Please enter username.";
    }else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    }else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($username_err) && empty($password_err)){
        $login_auth = "SELECT member_id, first_name, lastname, user, pass, confirm_pass, access, email_address,contact_number FROM accounts WHERE member_id = ?";
        
        if($stmt = mysqli_prepare($conn, $login_auth)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $member_id, $first_name, $last_name, $user, $hashed_password, $contact_number, $email_address, $access);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["member_id"] = $member_id;
                            $_SESSION["access"] = $access;
                            $_SESSION["email_address"] = $email_address;
                            $_SESSION["user"] = $user;
                            $_SESSION["first_name"] = $first_name;
                            $_SESSION["last_name"] = $last_name;
                            header("location: /ARVIECSP/index.php");
                        }else{
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($db_conn);
}
?>
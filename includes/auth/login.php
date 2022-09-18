<?php
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../index.php");
    exit;
    
}
    include "./includes/config/conn.php";
 
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
if(isset($_POST["login"])){

    include "./includes/config/conn.php";
    $access_select = "SELECT access from accounts where $email_address = email_address";
    $access_check = mysqli_query($conn, $access_select);
    while($access_user = mysqli_fetch_assoc($access_check)){
        $access = $access_user['access'];
    }
    if($access = false){
        echo "bye bye bitch";
    } else {
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
        $login_auth = "SELECT id, first_name, lastname, user, pass, access, email_address, contact_number FROM accounts WHERE member_id = ?";
        if($stmt = mysqli_prepare($conn, $login_auth)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, id, $first_name, $last_name, $user, $hashed_password, $contact_number, $email_address, $access);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($pass, $hashed_password)){
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["member_id"] = $member_id;
                            $_SESSION["access"] = true;
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
}
    mysqli_close($db_conn);
}
?>
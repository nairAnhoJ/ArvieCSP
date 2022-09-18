<?php
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../K/index.php");
    exit;
    
}
include_once ("../includes/D/config.php");
 
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
        $sql = "SELECT id, user_uid, user_pwd, first_name, last_name, user_level, email_address FROM accounts WHERE user_uid = ?";
        
        if($stmt = mysqli_prepare($db_conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $last_name, $first_name, $user_level, $email_address);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["user_level"] = $user_level;
                            $_SESSION["email_address"] = $email_address;
                            $_SESSION["username"] = $username;
                            $_SESSION["user_level"] = $user_level;
                            $_SESSION["first_name"] = $first_name;
                            $_SESSION["last_name"] = $last_name;
                            header("location: /RNA/K/index.php");
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
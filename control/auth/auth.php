<?php
if(!isset($_SESSION)) 
    session_start();

function checkForm($array, $keys) 
{
    foreach($keys as $key)
        if(!isset($array["$key"]) || empty($array["$key"]))
            return false;
    return true;
}

function checkUsername($array, $key) 
{
    if(strlen($array["$key"]) < 4 || strlen($array["$key"]) > 30)
        return false;
    return true;
}

function checkPass($array, $key)
{
    if(strlen($array["$key"]) < 6)
        return false;
    return true;
}

if(isset($_POST["regform"])) {
    // username, password, password_confirm
    $valid_data = checkForm($_POST, ["username", "password", "password_confirm"]);
    $valid_username = checkUsername($_POST, "username");
    $valid_pass = checkPass($_POST, "password");
    if(!$valid_data || !$valid_username || !$valid_pass)
    {
        if(!$valid_data)
            $error = "invalid Registration data!";
        else if(!$valid_username)
            $error = "username is too short!";
        else if(!$valid_pass)
            $error = "password is too short!";
        array_push($_SESSION["messages"], $error);
        header("location: /blog/pages/auth/signup.php");
        return;
    }
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_conf = $_POST["password_confirm"];
    // If account already exists, redirect to register
    if(array_key_exists($username, $_SESSION["users"])) {
        $error = "Username already exists!";
        array_push($_SESSION["messages"], $error);
        header("location: /blog/pages/auth/signup.php");
    }

    // New user
    else {
        if($password == $password_conf) {
            //add user to users list
            $_SESSION["users"]["$username"] = [
                "id" => count($_SESSION["users"]) + 1,
                "username" => $username,
                "password" => $password
            ];
            array_push($_SESSION["messages"], "Account Created successfully.");
            header("location: /blog/pages/auth/login.php");
        }
        //password doesn't match confirmed password
        else { 
            $error = "Passwords do not match!";
            array_push($_SESSION["messages"], $error);
            header("location: /blog/pages/auth/signup.php");
        }
    }
}


if(isset($_POST["loginform"])) {
    $data_is_valid = checkForm($_POST, ["username", "password"]);
    if(!$data_is_valid)
    {
        $error = "Log-in data is invalid.";
        array_push($_SESSION["messages"], $error);
        header("location: /blog/pages/auth/login.php");
    }
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Has user registered an account ?
    if(array_key_exists($username, $_SESSION["users"])) {
        if($password == $_SESSION["users"]["$username"]["password"]) {
            $message = "You have logged-in successfully.";
            array_push($_SESSION["messages"], $message);
            $_SESSION["current_user"] = $_SESSION["users"]["$username"];
            header("location: /blog/");
        }
        //username exists but wrong password
        else {
            $error = "Incorrect password";
            array_push($_SESSION["messages"], $error);
            header("location: /blog/pages/auth/login.php");
        }
    }
    //username doesn't exist which means no account has been created yet
    else {
        $error = "Create an account first.";
        array_push($_SESSION["messages"], $error);
        header("location: /blog/pages/auth/signup.php");
    }     
}
?>

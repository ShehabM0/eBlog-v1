<?php
    if(!isset($_SESSION))
        session_start();

    // remove user from session 
    unset($_SESSION['current_user']);

    $message = "You have logged-out successfully";
    array_push($_SESSION['messages'], $message);
    header('location: /blog/');
?>

<?php
    if(!isset($_SESSION))
        session_start();
?>

<?php
    // remove user from session 
    unset($_SESSION['current_user']);

    //& send a message & redirect to home
    $message="You have logged-out successfully";
    array_push($_SESSION['messages'],$message);
    header('location: /blog/');
?>

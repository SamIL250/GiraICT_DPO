<?php
    session_start();
    //clear the JWT token 
    setcookie("token", "", time() - 3600, "/", "", true, true);
    $_SESSION['token_expired'] = "Your token has expired!, please login again.";
    header('location:../index.php');

?>
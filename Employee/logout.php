<?php ob_start(); ?>
<?php session_start(); ?>
<?php include("../DB/functions.php"); ?>
<?php
    //$_SESSION['username'] = null;
    $_SESSION['password'] = null;
    $_SESSION['error_login'] = null;
    $_SESSION['userID'] = null;
    




    $_SESSION['logout_message'] = 'Logged out. Thank you for using the system.';
    redirect_to("../Login/index.php");

    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
?>
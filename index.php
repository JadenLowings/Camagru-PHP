<?php
    session_start();

    if (!$_SESSION['username']) {
        header ("location: landing/landing.php");
        exit;
    };
    
    header("Location:home/main.php");
?>
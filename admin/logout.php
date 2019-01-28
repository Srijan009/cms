<?php 
    session_start();
    unset($_SESSION['adminKey']);
    setcookie("adminName",NULL,time()-1);
    header("location: login.php");
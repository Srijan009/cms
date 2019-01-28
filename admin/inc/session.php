<?php
    session_start();
    if(isset($_COOKIE['adminName'])){
        $_SESSION['adminKey'] = $_COOKIE['adminName'];
    }
    if(!isset($_SESSION['adminKey'])){
        header("location: login.php");
    }
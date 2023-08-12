<?php
// include 'destroy.php';
    session_start();
    // Destroy session
session_destroy();
// session_unset();
if(!isset($_SESSION['username'])){
    header("Location:home.php");
}else{
    header("Location:login.php");
    
}
?>
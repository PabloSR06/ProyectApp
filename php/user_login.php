<?php
    session_start();
    if($_SESSION == null){
        header("location: ../forms/login.html");
    }else{
        header("location: ../pages/user.php");
    }
?>

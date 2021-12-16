<?php
    session_start();
    if($_SESSION == null){
        header("location: ../forms/login.php");
    }else{
        header("location: ../pages/user.php");
    }
?>

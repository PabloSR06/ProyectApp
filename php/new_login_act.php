<?php
    $email = $_POST['login_email'];
    $login_password = password_hash( $_POST['login_password'], PASSWORD_DEFAULT); 

    require 'conectDB.php';
    

    $db = conectDB();

    $sql = $db-> prepare("INSERT INTO client (email, login_password) VALUES (:email, :login_password)");
    $sql -> bindValue(':email', $email);
    $sql -> bindValue(':login_password', $login_password);
    $sql->execute();


?>
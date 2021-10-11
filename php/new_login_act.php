<?php
    $emailClient = $_POST['emailClient'];
    $passwordClient = password_hash( $_POST['passwordClient'], PASSWORD_DEFAULT); 

    require 'conectDB.php';
    

    $db = conectDB();

    $sql = $db-> prepare("INSERT INTO clients (emailClient, passwordClient) VALUES (:emailClient, :passwordClient)");
    $sql -> bindValue(':emailClient', $emailClient);
    $sql -> bindValue(':passwordClient', $passwordClient);
    $sql->execute();


?>
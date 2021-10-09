<?php
    $emailWorker = $_POST['emailWorker'];
    $passwordWorker = password_hash( $_POST['passwordWorker'], PASSWORD_DEFAULT); 

    require 'conectDB.php';
    

    $db = conectDB();

    $sql = $db-> prepare("INSERT INTO workers (emailWorker, passwordWorker) VALUES (:emailWorker, :passwordWorker)");
    $sql -> bindValue(':emailWorker', $emailWorker);
    $sql -> bindValue(':passwordWorker', $passwordWorker);
    $sql->execute();
    header("location: /proyectapp/admin/index.php");
?>
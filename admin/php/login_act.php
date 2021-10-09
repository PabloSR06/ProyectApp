<?php
    $emailWorker = $_POST['emailWorker'];
    $passwordWorker = $_POST['passwordWorker']; 

    require 'conectDB.php';
    $db = conectDB();
    
    try {
    
        $sql = $db-> prepare("SELECT * FROM workers WHERE emailWorker = :emailWorker");
        $sql -> bindValue(':emailWorker', $emailWorker);
        $sql->execute();
    
        $row = $sql ->fetch();
    
        if(password_verify($passwordWorker, $row['passwordWorker'])){
            echo "bien";
            session_start();
            $_SESSION['idWorker'] = $row['idWorker'];
            $_SESSION['emailWorker'] = $row['emailWorker'];
            $_SESSION['session_id'] = session_id();
            print_r($_SESSION);
            header("location: /proyectapp/admin/index.php");

        }else{
            echo "no bien";

        }   

        $db = null; 
    
    } catch (\Throwable $th) {
        echo $sql . "<br>" . $th->getMessage();
    }
    


    


?>
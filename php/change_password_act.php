<?php
    $emailClient = $_POST['emailClient'];
    $idClient = $_POST['idClient']; 
    $passwordClientNew = $_POST['passwordClientNew']; 

    require 'conectDB.php';
    $db = conectDB();
    
    try {
    
        $sql = $db-> prepare("UPDATE clients SET passwordClient = :new_password WHERE idClient = :idClient");
        $sql -> bindValue(':idClient', $idClient);
        $sql -> bindValue(':new_password', md5($passwordClientNew));
        $sql->execute();

  
        header("location: ../forms/change_password.php?done=true");
        
        

        $db = null; 
    
    } catch (\Throwable $th) {
        echo $sql . "<br>" . $th->getMessage();
    }
?>
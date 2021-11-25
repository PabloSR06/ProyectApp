<?php
    $emailClient = $_POST['emailClient'];
    $passwordClient = $_POST['passwordClient']; 

    require 'conectDB.php';
    $db = conectDB();
    
    try {
    
        $sql = $db-> prepare("SELECT * FROM clients WHERE emailClient = :emailClient");
        $sql -> bindValue(':emailClient', $emailClient);
        $sql->execute();
    
        $row = $sql ->fetch();
    
        if(md5($passwordClient) == $row['passwordClient']){
            session_start();
            $_SESSION['idClient'] = $row['idClient'];
            $_SESSION['name'] = $row['nameClient']; 
            $_SESSION['email'] = $row['emailClient'];
            $_SESSION['session_id'] = session_id();
            header("location: ../index.php");
        }else{
            ?>
            
            <script>
            alert("Contraseña incorrecta");
            
            </script>

            <?php
            header("location: ../forms/login.html");

        }

        $db = null; 
    
    } catch (\Throwable $th) {
        echo $sql . "<br>" . $th->getMessage();
    }
?>
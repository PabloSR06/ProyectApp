<?php
    $email = $_POST['login_email'];
    $simple_password = $_POST['login_password']; 

    require 'conectDB.php';
    $db = conectDB();
    
    try {
    
        $sql = $db-> prepare("SELECT * FROM client WHERE email = :email");
        $sql -> bindValue(':email', $email);
        $sql->execute();
    
        $row = $sql ->fetch();
    
        if(password_verify($simple_password, $row['login_password'])){
            echo "bien";
            session_start();
            $_SESSION['codClient'] = $row['codClient'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['session_id'] = session_id();
            print_r($_SESSION);
            header("location: ../index.php");

        }else{
            echo "no bien";

        }   

        $db = null; 
    
    } catch (\Throwable $th) {
        echo $sql . "<br>" . $th->getMessage();
    }
    


    


?>
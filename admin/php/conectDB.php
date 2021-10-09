<?php
    function conectDB(){
        try {

            $dbname = 'dbworkshop';
            $user = 'root';
            $pass = '';
            $host = 'localhost';

            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user, $pass);

            $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 

        } catch (PDOException $e) {
            echo $e ->getMessage();
        }

        return $pdo;
    }
?>
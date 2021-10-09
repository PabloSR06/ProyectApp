<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Cliente</title>
</head>
<body>
    <?php
        require 'conectDB.php';
        $db = conectDB();

        $nameClient = $_POST['name'];
        $surnameClient = $_POST['surname'];
        $emailClient = $_POST['email'];
        $licensePlate = $_POST['license'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];

        $sql = $db -> prepare("
        INSERT INTO clients 
        (nameClient, surnameClient, emailClient) VALUES
        (:nameClient, :surnameClient , :emailClient)
        ");

        $sql -> bindValue(':nameClient', $nameClient);
        $sql -> bindValue(':surnameClient', $surnameClient);
        $sql -> bindValue(':emailClient', $emailClient);

        $sql -> execute();

        $sql = $db -> prepare("SELECT idClient FROM clients WHERE emailClient = :emailClient");
        $sql -> bindValue(':emailClient', $emailClient);
        $sql -> execute();
        $idClient = $sql ->fetch();
        $idClient = $idClient['idClient'];
        $sql = null;

        $sql = $db -> prepare("
        INSERT INTO cars 
        (licensePlate, brand, model, idClient) VALUES
        (:licensePlate, :brand , :model, :idClient)
        ");
        $sql -> bindValue(':licensePlate', $licensePlate);
        $sql -> bindValue(':brand', $brand);
        $sql -> bindValue(':model', $model);
        $sql -> bindValue(':idClient', $idClient);
        $sql -> execute();



    ?>
    
</body>
</html>
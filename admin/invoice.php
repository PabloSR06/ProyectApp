<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas</title>

    <link rel="stylesheet" href="/proyectapp/admin/style/style.css">
</head>
<body>
    <?php
        session_start();

        require 'php/conectDB.php';
        $db = conectDB();
    ?>
  
    <?php
    
    if($_SESSION == null){
        header("location: /proyectapp/admin/index.php");

    }else{  

    ?>
   <div class='header'>
        <header class='nav_bar'>
            <nav class='nav_link_nav '>
            <!--Btn from the navbar-->
                <ul class='nav_link_ul'>
                    <li class='nav_link_li'>
                        <a class='nav_link ' href='/proyectapp/admin/invoice.php'>Facturas</a>
                    </li>

                    <li class='nav_link_li'>
                        <a class='nav_link' href='/proyectapp/admin/newClient.php'>Ver/Borrar</a>
                    </li>

                    <li class='nav_link_li'>
                        <a class='nav_link' href='Functions.php'>Modificar</a>
                    </li>
                    
                </ul> 
               

            </nav>
            <?php
                    echo "
                    <form  method='post' action='".$_SERVER['PHP_SELF']."'>   
                        <button class='close nav_link ' name='close_session'>Cerrar Sesión </button>
                    </form>";
                    if(isset($_POST['close_session'])){
                        session_unset();
                        session_destroy();
                    }
                    ?>
        </header>
    </div>

    <div>
        <table class='invoice_view'>
            <tr>
                <th>Matricula</th>
                <th>Precio</th>
                <th>Nombre Cliente</th>
            </tr>
            <tr>

        <?php


            $sql = $db -> prepare("SELECT*FROM invoice INNER JOIN clients ON invoice.idClient = clients.idClient
            INNER JOIN cars ON clients.idClient = cars.idClient");
            $sql -> execute();
            $row = $sql->fetch();
        

            echo "<td>".$row['licensePlate']."</td>";
            echo "<td>".$row['priceInvoice']."</td>";
            echo "<td>".$row['nameClient']."</td>";

            $db = null;
        ?>


            </tr>   
        </table>
        

    </div>



    <?php
    } 
    ?>
    

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Cliente</title>

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
        <h1>Nuevo cliente</h1>
        <div class="mid_page">
            <div class="div_insert">   
                
                <form method="POST" action="/proyectapp/admin/php/insertClient.php">
                
                    <label class="labelname">Nombre</label>
                    <input class="entrada" type="text" name="name">

                    <label class="labelname">Apellidos</label>
                    <input class="entrada" type="text" name="surname">

                    <label class="labelname">Correo</label>
                    <input class="entrada" type="email" name="email">

                
                    <label class="labelname">Matricula</label>
                    <input class="entrada" type="text" name="license"> 

                    <label class="labelname">Marca</label>
                    <input class="entrada" type="text" name="brand">   

                    <label class="labelname">Modelo</label>
                    <input class="entrada" type="text" name="model">         
                    
                    <input class="entrada" class="btn" type="submit">
                </form>
            </div>
        </div>
    </div>


    <?php
    } 
    ?>
    

</body>
</html>
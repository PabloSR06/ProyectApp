<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="/proyectapp/admin/style/style.css">
</head>
<body>
    <?php
        session_start();
    ?>
  
    <?php
    
    if($_SESSION == null){
    ?>
        <div class="upper_page">
        <h1> Iniciar sesión </h1>
        <h4>ADMIN</h4>
    
        </div>
        <div class="mid_page">
            <div class="login_form">
                <form action="/proyectapp/admin/php/login_act.php" method="post">
                    <label>
                        Correo <span class="req">*</span>
                    </label>
                    <input class="login_input" type="email" placeholder='Correo' name="emailWorker"/>
                    <label>
                        Contraseña <span class="req">*</span>
                    </label>
                    <input class="login_input" type="password" placeholder='Contraseña' name="passwordWorker"/>
                    <input class="login_btn" type="submit" value="Submit"/>
                </form>
            </div>
        </div>
    <?php
    } else{
    ?>
    <div class='header'>
        <header class='nav_bar'>
            <a class="brand_name" href="#">PabloSR</a>
            <nav class='nav_link_nav '>
            <!--Btn from the navbar-->
                <ul class='nav_link_ul'>
                    <li class='nav_link_li'>
                        <a class='nav_link ' href='/proyectapp/admin/invoice.php'>Facturas</a>
                    </li>

                    <li class='nav_link_li'>
                        <a class='nav_link' href='/proyectapp/admin/newClient.php'>Nuevo cliente</a>
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

    <?php
    } 
    ?>
    

</body>
</html>
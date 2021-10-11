<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="/proyectapp/style/style.css">

</head>
<body>


    <div class="mid_page ">

        <div>
            <?php  echo "<p>".$_SESSION['name']."</p>" ?>
        </div>
        
        <div class="options">
                
                <a href=""><p >sdf</p></a>
           
        </div>
        
        <div class="options">
            <a href="" >
                <p >sdf</p>
            </a>
        </div> 

        <div>
            
                <?php
                    echo "
                    <form  method='post' action='".$_SERVER['PHP_SELF']."'>   
                        <button class='options btn_options'  name='close_session'>Cerrar</button>
                    </form>";
                    session_start();

                    if(isset($_POST['close_session'])){
                        session_unset();
                        session_destroy();
                    }
                    print_r($_SESSION);

                ?>
            
        </div> 

    </div>



    <div>
        <footer class='footer_nav'>
            <nav class='nav_links'>
                <a href='/proyectapp/cars.php' class='nav_link'>
                    <svg class='nav_img nav_img_tool' xmlns="http://www.w3.org/2000/svg" fill="currentColor"  viewBox="0 0 16 16">
                        <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z"/>
                    </svg>
                </a>
                <a href="/proyectapp/index.php" class='nav_link'>
                    <svg class='nav_img nav_img_house' xmlns="http://www.w3.org/2000/svg" fill="currentColor"  viewBox="0 0 16 16">
                        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                    </svg>
                </a>
                <a href="/proyectapp/user_login.php" class='nav_link'>
                    <svg class='nav_img nav_img_user' xmlns="http://www.w3.org/2000/svg" fill="currentColor"  viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    </svg>
                </a>
                
            </nav>
        </footer>
    </div>
</body>
</html>